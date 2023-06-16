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

		$postedOffice = $DmiUsers->getPostedOffId($_SESSION['username']);
		
		$log_entity = $this->newEntity(array(
			
			'customer_id'=>$_SESSION['firm_id'],
			'reason'=>htmlentities($postData['reason']),
			'status'=>'saved',
			'date'=>date('Y-m-d H:i:s'),
			'created'=>date('Y-m-d H:i:s'),
			'modified'=>date('Y-m-d H:i:s'),
			'by_user'=>$_SESSION['username'],
			'posted_ro_office'=> (int) $postedOffice,
			'sample_code' => $_SESSION['sample_code']
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
			'created'=>date('Y-m-d H:i:s'),
			'modified'=>date('Y-m-d H:i:s'),
			'by_user'=>$username,
			'posted_ro_office'=>$record_id['posted_ro_office'],
			'sample_code' => $sample_code,
			'start_date'=>date('Y-m-d H:i:s'),
			'end_date'=>date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'). ' + 14 days')),
		));

		if($this->save($log_entity)){
			return true;
		}
	}



	public function sendFinalNotice($postData){

		$DmiUsers = TableRegistry::getTableLocator()->get('DmiUsers');

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

			//update the sample code in the sample_inward table for showcause notice sent
			$SampleInward = TableRegistry::getTableLocator()->get('SampleInward');
			$SampleInward->updateAll(['report_status' => 'Showcause', 'packer_id' => $customer_id],['org_sample_code' => $sample_code]);

			return true;
		}
	}



}
?>