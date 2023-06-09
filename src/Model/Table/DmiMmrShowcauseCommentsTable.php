<?php
	
namespace app\Model\Table;
use Cake\ORM\Table;
use App\Model\Model;
use App\Controller\AppController;
use App\Controller\CustomersController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

class DmiMmrShowcauseCommentsTable extends Table{

	var $name = "DmiMmrShowcauseComments";

	public function saveCommentDetails($customer_id,$sample_code,$comment_by,$comment_to,$comment,$from_user,$to_user) {
		
		$dataArray = $this->newEntity(array(

			'customer_id'=>$customer_id,
			'sample_code'=>$sample_code,
			'comment_by'=>$comment_by,
			'comment_to'=>$comment_to,
			'comment_date'=>date('Y-m-d H:i:s'),
			'comment'=>$comment,
			'created'=>date('Y-m-d H:i:s'),
			'modified'=>date('Y-m-d H:i:s'),
			'from_user'=>$from_user,
			'to_user'=>$to_user
		));

		if($this->save($dataArray)){
			return true;
		}
	}


	public function replyFromApplicant ($customer_id,$sample_code,$comment_by,$comment_to,$comment,$from_user,$to_user) {
		
		

		$dataArray = $this->newEntity(array(

			'customer_id'=>$customer_id,
			'sample_code'=>$sample_code,
			'comment_by'=>$comment_by,
			'comment_to'=>$comment_to,
			'comment_date'=>date('Y-m-d H:i:s'),
			'comment'=>$comment,
			'created'=>date('Y-m-d H:i:s'),
			'modified'=>date('Y-m-d H:i:s'),
			'from_user'=>$from_user,
			'to_user'=>$to_user
		));

		if($this->save($dataArray)){

			$DmiMmrShowcauseLogs = TableRegistry::getTableLocator()->get('DmiMmrShowcauseLogs');
			$getDetails = $DmiMmrShowcauseLogs->getInformation($customer_id);
			
			if ($_SESSION['whichUser'] == 'dmiuser') {
				$status = 'ref_back';
			}else{
				$status = 'replied';
			}

			$CustomersController = new CustomersController;

			//added date function on 31-05-2021 by Amol to convert date format, as saving null
			$created = $CustomersController->Customfunctions->changeDateFormat($getDetails['created']);
			$date = $CustomersController->Customfunctions->changeDateFormat($getDetails['date']);
			$start_date = $CustomersController->Customfunctions->changeDateFormat($getDetails['start_date']);
			$end_date = $CustomersController->Customfunctions->changeDateFormat($getDetails['end_date']);

			$log_entity = $DmiMmrShowcauseLogs->newEntity(array(

				'customer_id'=>$customer_id,
				'reason'=>$getDetails['reason'],
				'status'=>$status,
				'created'=>$created,
				'modified'=>date('Y-m-d H:i:s'),
				'by_user'=>$getDetails['by_user'],
				'posted_ro_office'=>$getDetails['posted_ro_office'],
				'sample_code' => $sample_code,
				'date'=>$date,
				'start_date'=>$start_date,
				'end_date'=>$end_date
				
			));

			if($DmiMmrShowcauseLogs->save($log_entity)){
				return true;
			}
		}
	}


}


?>