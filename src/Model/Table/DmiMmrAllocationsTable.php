<?php
namespace app\Model\Table;
use Cake\ORM\Table;
use App\Model\Model;
use Cake\ORM\TableRegistry;

class DmiMmrAllocationsTable extends Table{
	
	var $name = "DmiMmrAllocations";
	
	public function saveAllocationDetails($customer_id,$sample_code,$current_level,$level_1,$level_2) {

		// Common MO/SMO allocation logs, dirrentiate with allocation type nos
		$allocation_logs_entity = $this->newEntity(array(

			'customer_id'	=>	$customer_id,
			'sample_code'	=>	$sample_code,
			'current_level'	=>	$current_level,
			'created'	=>	date('Y-m-d H:i:s'),
			'modified'	=>	date('Y-m-d H:i:s'),
			'level_1'	=>	$level_1,
			'level_3'	=>	$level_2

		));

		if($this->save($allocation_logs_entity)){
			return true;
		}

	}

	
	public function detailsOfAllocations($sample_code){

		$DmiUsers = TableRegistry::getTableLocator()->get('DmiUsers');
		$DmiRoOffices = TableRegistry::getTableLocator()->get('DmiRoOffices');

		$details = $this->find()->where(['sample_code' => $sample_code])->order('id DESC')->first();

		if (!empty($details)){ 

			//Get MO Details
			$userDetails = $DmiUsers->getDetailsByEmail($details['level_1']);

			//Get Office Name
			$mo_Office = $DmiRoOffices->getOfficeDetailsById($userDetails['posted_ro_office']);
			
			//created date
			$resultArray = array(
				'message' => "This Sample is Allocated for Scrutinty",
				'allocated_to' => $userDetails['f_name']." ".$userDetails['l_name'],
				'email' => base64_decode($userDetails['email']),
				'office' => $mo_Office[0],
				'allocated_date' => $details['created']
			);

		} else {

			$resultArray = 'not_allocated';
		}

		return $resultArray;
	}
}

?>