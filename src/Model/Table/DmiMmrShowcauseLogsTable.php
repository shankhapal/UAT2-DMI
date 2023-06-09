<?php

namespace app\Model\Table;
use Cake\ORM\Table;
use App\Model\Model;
use App\Controller\AppController;
use App\Controller\CustomersController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

class DmiMmrShowcauseLogsTable extends Table{

	var $name = "DmiMmrShowcauseLogs";

    // For : Action on Misgrading / Suspension / Cancellation / Management of Misgrading Reports

	public function getInformation($id){
		return $this->find('all')->where(['customer_id IS' => $id])->order('id DESC')->first();
	}



	public function saveLog($postData){

		$DmiUsers = TableRegistry::getTableLocator()->get('DmiUsers');

		$customer_id = $_SESSION['firm_id'];
		$username = $_SESSION['username'];
		$sample_code = $_SESSION['sample_code'];

		$postedOffice = $DmiUsers->getPostedOffId($username);
		
		$log_entity = $this->newEntity(array(
			
			'customer_id'=>$customer_id,
			'reason'=>htmlentities($postData['reason']),
			'status'=>'saved',
			'date'=>date('Y-m-d H:i:s'),
			'created'=>date('Y-m-d H:i:s'),
			'modified'=>date('Y-m-d H:i:s'),
			'by_user'=>$username,
			'posted_ro_office'=> (int) $postedOffice,
			'sample_code' => $sample_code
		));

		if($this->save($log_entity)){

			return true;
		}
	}

	public function updateLog($postData){

		$record_id = $this->getInformation($_SESSION['firm_id']);
		$customer_id = $_SESSION['firm_id'];
		$username = $_SESSION['username'];
		$sample_code = $_SESSION['sample_code'];

		$log_entity = $this->newEntity(array(

			'id'=>$record_id['id'],
			'customer_id'=>$customer_id,
			'reason'=>htmlentities($postData['reason']),
			'status'=>'saved',
			'date'=>date('Y-m-d H:i:s'),
			'created'=>$record_id['created'],
			'modified'=>date('Y-m-d H:i:s'),
			'by_user'=>$username,
			'posted_ro_office'=>$record_id['posted_ro_office'],
			'sample_code' => $sample_code
		));

		if($this->save($log_entity)){
			return true;
		}
	}



	public function sendFinalNotice($postData){

		$DmiUsers = TableRegistry::getTableLocator()->get('DmiUsers');
		$DmiMmrShowcauseComments = TableRegistry::getTableLocator()->get('DmiMmrShowcauseComments');

		$customer_id = $_SESSION['firm_id'];
		$username = $_SESSION['username'];
		$sample_code = $_SESSION['sample_code'];

		$date = date('Y-m-d H:i:s');
		$postedOffice = $DmiUsers->getPostedOffId($username);

		$log_entity = $this->newEntity(array(

			'customer_id'=>$customer_id,
			'reason'=>htmlentities($postData['reason']),
			'status'=>'sent',
			'date'=>$date,
			'created'=>$date,
			'modified'=>$date,
			'by_user'=>$username,
			'start_date'=>$date,
			'end_date'=>date('Y-m-d H:i:s', strtotime($date. ' + 14 days')),
			'posted_ro_office'=>$postedOffice,
			'sample_code'=>$sample_code
		));

		if($this->save($log_entity)){

			$comment = htmlentities($postData['reason']);
			
			if($_SESSION['whichUser'] == 'dmiuser'){

				$from_user = 'ro';
				$to_user = 'applicant';
				$comment_by = $username;
				$comment_to = $customer_id;

			}elseif ($_SESSION['whichUser'] == 'applicant') {

				$from_user = 'applicant';
				$to_user = 'ro';
				$comment_by = $username;
				$comment_to = $customer_id;
			}

			//update the sample code in the sample_inward table for showcause notice sent
			$SampleInward = TableRegistry::getTableLocator()->get('SampleInward');
			$this->SampleInward->updateAll(['report_status' => 'Showcause', 'packer_id' => $customer_id],['org_sample_code' => $sample_code]);

			//$DmiMmrShowcauseComments->saveCommentDetails($customer_id,$sample_code,$comment_by,$comment_to,$comment,$from_user,$to_user);
			return true;
		}
	}



}
?>