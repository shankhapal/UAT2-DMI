<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Routing\Router;
use Cake\Cache\Cache;
use Cake\Http\ServerRequest;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */

    public function initialize(): void {
        parent::initialize();

		if(!isset($_SESSION)){ session_start();  }


        $this->loadComponent('RequestHandler',['enableBeforeRedirect' => false,]);
        $this->loadComponent('Flash');
				$this->loadComponent('Beforepageload');
				$this->loadComponent('Createcaptcha');
				$this->loadComponent('Customfunctions');
				$this->loadComponent('Authentication');
        $this->Session = $this->getRequest()->getSession();

		//Load Model
		$this->loadModel('DmiSmsEmailTemplates');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

	//This function is used to disable Cache from browser, No history will be saved on browser
	public function beforeRender(EventInterface $event){

		// $this->response->disableCache();
		Cache::disable();
	}

	public function beforeFilter(EventInterface $event){

		parent::beforeFilter($event);
		
		//below headers are set for "Content-Security-Policy", to allow inline scripts from same origin and report the outer origin scripts calls.
		//the "Content-Security-Policy" header is commmented from httpd.conf file now and set here.
		//26-10-2021 by Amol
		//header("Report-To {'group':'default','max_age':31536000,'endpoints':[{'url':'https://10.158.81.41/DMI4.2/users/csp_report'}]}");
		//header("Content-Security-Policy-Report-Only: script-src 'self'; report-to default; report-uri https://10.158.81.41/DMI4.2/users/csp_report");

		if($this->getRequest()->getSession()->check('username')) {
			//do nothing
		} else {

			Router::url('/');
		}

		/*$this->loadComponent('Customfunctions');
		$check = $this->Customfunctions->getCertificateValidUptoDate('4894/3/SGL/002','31-07-2021 00:00:00');
		print_r($check);exit;*/


		//This Below we defined the Array for the Application Types from which dashboard will count and list will recognize 
		//the Flow for DMI users - Amol
		// # The Application type no. is given #//
		// #1- New / #2- Renewal / #3- Change / #4- Approval of Chemist(CHM)
		// #5- 15-Digit-Code (FDC) / #6- Allotment of E-Code (EC) / #7- Advance Payment (AP)
		// #8- Approval of Designated Person (ADP) / #9- Surrender of Certificate (SOC)
		// #10- Routine Inspection (RTI) / #11 - Bi-annually Grading Report (BGR)
		$this->Session->write('applTypeArray',array('1','2','3','4','5','6','8','9','10'));

		//added on 01-10-2021 by Amol
		//if not in advance payment mode
		$this->Session->write('advancepayment','no');
		$this->Session->write('forReplica','no');

	   //call to aqcms_statistics data on footer section.
		$this->loadModel('DmiFrontStatistics');
		$frontstatisctics = $this->DmiFrontStatistics->find('all',array('conditions' => array('id' => 1)))->first();
		$this->set('frontstatisctics',$frontstatisctics);


		$this->Beforepageload->setLogoutTime();
		$this->Beforepageload->fetch_visitor_count();
		//Call to get Home page contents
		$this->Beforepageload->home_page_content();
		$this->Beforepageload->set_site_menus();
		$this->Beforepageload->get_footer_content();
		$this->Beforepageload->get_all_concent_messages();
		$this->Beforepageload->checkValidRequest();
		$this->Beforepageload->current_session_status();
		$this->Beforepageload->showNotificationToApplicant();//To show notifications on applicant dashboard, on 02-12-2021
		

		$this->loadModel('DmiUserRoles');
		$this->loadModel('DmiUsers');
		$this->loadModel('DmiPaoDetails');
		$this->loadModel('DmiFinalSubmits');
		$this->loadModel('DmiRenewalFinalSubmits');
		// Check assigned roles for logged in user
		$username = $this->Session->read('username');
		$current_user_roles = $this->DmiUserRoles->find('all',array('conditions'=>array('user_email_id IS'=>$username)))->first();
		$this->set('current_user_roles',$current_user_roles);

		//created on 13-05-2017 by Amol
		//check user division to show LMIS login link on dashboard
		$current_user_division = $this->DmiUsers->find('all',array('conditions'=>array('email IS'=>$username)))->first();
		$this->set('current_user_division',$current_user_division);

		//Is Approved
		$IsApproved=null;
		$final_submit_id = $this->DmiFinalSubmits->find('all', array('conditions' => array('customer_id IS' => $username),'order'=>'id desc'))->first();
		if (!empty($final_submit_id)) {
			//get grant status		
			if ($final_submit_id['status']=='approved' && $final_submit_id['current_level']=='level_3') {
				$IsApproved='yes';
			}
			$this->Session->write('IsApproved',$IsApproved);
		}else{
			$this->Session->write('IsApproved',$IsApproved);
		}

		if(null == ($this->Session->read('paymentforchange'))){
			$this->Session->write('paymentforchange','available');
		}

		$user_last_login = $this->Customfunctions->userLastLogins();
		$this->set('user_last_login',$user_last_login);

		// this condition added for sending sms and email for daily basis 
		// the custome function call once in a day and added new entry in db 
		// added by shankhpal shende on 04/07/2023
    
		$DmiPendingSmsEmailSendStatus = TableRegistry::getTableLocator()->get('DmiPendingSmsEmailSendStatus');
		$today = date('d/m/Y'); // Get today's date in the format matching your database field (without time)

		$todayCount = $DmiPendingSmsEmailSendStatus->find()
				->where(['DATE(created)' => $today])
				->count();

		if ($todayCount == 0) {

			$json = $this->Customfunctions->getSingleOrAllUserAppliResult();

			$data = json_decode($json, true);

			if($data !== null){
				
				foreach ($data as $eachValue) {

					$userEmail = $item['userEmail'];
					$count = $item['count'];
					$phone = $item['phone'];
					$appl_id = $item['appl_id'];
					
					#SMS:
					
					

				}
			}

			$Dmi_pending_count_Entity = $DmiPendingSmsEmailSendStatus->newEntity([
					'created' => date('Y-m-d H:i:s')
			]);
			
			$DmiPendingSmsEmailSendStatus->save($Dmi_pending_count_Entity);
			
		} else {
				// nothing
		}


		
		
		
		
		
	
	
		
		


	}

	public function invalidActivities(){
		$this->customAlertPage("Sorry something wrong happened !! ");
		exit;
	}

		//to check failed attempts of user and show remaining attempts on each failed attempt to lock account
	//on 08-04-2021 by Amol
	public function showRemainingLoginAttempts($table,$user_id){

		$this->loadModel($table);
		//check in DB logs table
		if ($table == 'DmiUserLogs') {

			$get_logs_records = $this->$table->find('all',array('conditions'=>array('email_id IS'=>$user_id),'order'=>'id Desc'))->toArray();

		} elseif ($table == 'DmiCustomerLogs') {

			$get_logs_records = $this->$table->find('all',array('conditions'=>array('customer_id IS'=>$user_id),'order'=>'id Desc'))->toArray();

    	} elseif ($table == 'DmiChemistLogs') {

      		$get_logs_records = $this->$table->find('all',array('conditions'=>array('customer_id IS'=>$user_id),'order'=>'id Desc'))->toArray();
    	}

		$i = 0;
		foreach ($get_logs_records as $each) {

			$each_log_details = $this->$table->find('all',array('conditions'=>array('id IS'=>$each['id'])))->first();
			$remark[$i] = $each_log_details['remark'];
			$date[$i] = $each_log_details['date'];

			$i = $i+1;
		}

		$current_date = strtotime(date('d-m-Y'));


		$j = 0;
		$failed_count = 0;
		while ($j <= 2) {

			if (!empty($remark[$j])) {

				if ($remark[$j] == 'Failed') {
					
					$log_date = strtotime(str_replace('/','-',$date[$j]));

					//condition added on 13-02-2023
					if ($current_date == $log_date) {

						$failed_count = $failed_count+1;
					}
					
				}
			}

			$j = $j+1;
		}

		if ($failed_count == 1) {
			return 'Please note: You have 2 more attempts to login';

		} elseif ($failed_count == 2) {
			return 'Please note: You have 1 more attempt to login';

		} elseif ($failed_count == 3) {
			return 'Sorry... Your account is disabled for today, on account of 3 login failure.';
		}

  	}

  	//created/updated/added on 25-06-2021 for multiple logged in check security updates, by Amol
	//this function is called from element "already_loggedin_msg", if applicant/user proceeds.
	//common for Applicant/user side
	public function proceedEvenMultipleLogin(){


		$username = $this->Session->read('username');
		$countspecialchar = substr_count($username ,"/");
									
		if($countspecialchar == 0){
			
			$table = TableRegistry::getTableLocator()->get('DmiUsers');
			$this->Authentication->userProceedLogin($username,$table);

		}if($countspecialchar == 1){
			$table = TableRegistry::getTableLocator()->get('DmiCustomers');
			$this->Authentication->customerProceedLogin($username,$table);

		}elseif($countspecialchar == 2){			
			
			$chemistController = new ChemistController();			
			$chemistController->chemistLoginProced($username);
			$this->redirect(array('controller'=>'chemist', 'action'=>'home'));
		
		}elseif($countspecialchar == 3){			
			$table = TableRegistry::getTableLocator()->get('DmiFirms');
			$this->Authentication->customerProceedLogin($username,$table);
		}

		
	}
	
	// Custom common alert page
	// Aniket G [14-10-2022][C]
    public function customAlertPage($msg = null) {

        $this->Session->destroy();
        $homeUrl = Router::url(['controller'=>'pages','action'=>'home']);
        $msg_txt = ($msg == null) ? "Sorry something wrong happened !! " : $msg;
        $msg_icon = (in_array($msg_txt, array('Your session is expired due to inactivity','Your session has timed out due to inactivity'))) ? 'clock' : 'exclamation-circle';
        $msg_title = (in_array($msg_txt, array('Your session is expired due to inactivity','Your session has timed out due to inactivity'))) ? 'Session Expired' : 'Alert';

        $msg_content = '
			<html lang="en"><head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta http-equiv="Content-Language" content="en">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<title>'.$msg_txt.'</title>
				<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
				<meta name="description" content="'.$msg_txt.'">
				<meta name="msapplication-tap-highlight" content="no">
				<link href="'.$homeUrl.'/favicon.ico" type="image/x-icon" rel="icon"><link href="'.$homeUrl.'/favicon.ico" type="image/x-icon" rel="shortcut icon"><meta charset="utf-8"><link rel="stylesheet" href="'.$homeUrl.'/css/adminlte.min.css"><link rel="stylesheet" href="'.$homeUrl.'/css/all.min.css"><style type="text/css">/* Chart.js */
				@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}.error_div{background:#dccac8;height:100vh;display:flex;align-items:center;font-family:system-ui;}.card-header{text-transform:initial;background:#eb5d57;color:white;font-size:17px;}#error_icon{font-size:32px;color:#eb5d57;}.btn_continue{background:#eb5d57;}.font_gainsboro{color:#5c5c5c;}</style></head>
				<body> 
					<link rel="stylesheet" href="'.$homeUrl.'/css/element/session_expired.css">
					<div class="container-fluid error_div">
						<div class="card col-md-4 mx-auto p-0">
							<div class="card-header">'.$msg_title.'</div>
							<div class="card-body">
								<table class="table table-borderless font-weight-bold font_gainsboro">
									<tbody>
										<tr>
											<td rowspan="2" class="align-top"><i class="fa fa-'.$msg_icon.'" id="error_icon"></i></td>
											<td>'.$msg_txt.'</td>
										</tr>
										<tr>
											<td>Click "Continue" to redirect to the Homepage.</td>
										</tr>
									</tbody>
								</table>
								<a href="/UAT-DMI" class="btn btn_continue float-right text-white font-weight-bold">CONTINUE</a>
							</div>
						</div>
					</div>
				</body>
			</html>';

		echo $msg_content;
        exit;
	}

	//SessionDestroyAfterError
	public function sessionDestroyAfterError(){
		$this->Session->destroy();
		$this->redirect('/');
	}

}
