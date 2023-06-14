<?php

namespace app\Model\Table;
use Cake\ORM\Table;
use App\Model\Model;
use Cake\ORM\TableRegistry;

class DmiMmrSamplePackerLogsTable  extends Table{
	


	// To check wheather the status of the sample code
	// Author : Akash Thakre
	// Date : 23-05-2023
	// For : MMR
	
	public function detailsOfSample($sample_code){

		// Check if sample_code already exists for customer_id
		$existingRecord = $this->find()->where(['sample_code' => $sample_code])->order('id DESC')->first();
		
		if ($existingRecord && $existingRecord['delete_status'] != 'Y') {

			$DmiFirms = TableRegistry::getTableLocator()->get('DmiFirms');
			$firm_details = $DmiFirms->firmDetails(trim($existingRecord['customer_id']));
			
			$DmiUsers = TableRegistry::getTableLocator()->get('DmiUsers');
			$userDetails = $DmiUsers->getDetailsByEmail($existingRecord['attached_by']);

			$statusArray = array(
				'customer_id' => $existingRecord['customer_id'],
				'firm_name' => $firm_details['firm_name'],
				'ro_name' => $userDetails['f_name']." ".$userDetails['l_name'],
				'email' => $userDetails['email']
			);
			
			return $statusArray;

		} else {
			return 'not_found';
		}


	}


	// To attached customer id with sample code 
	// Author : Akash Thakre
	// Date : 23-05-2023
	// For : MMR

	public function attachSampleWithPacker($postData){

		$customer_id = htmlentities($postData['customer_id'], ENT_QUOTES);
		$sample_code	= htmlentities($postData['sample_code'], ENT_QUOTES);
		$attached_by	= htmlentities($postData['attached_by'], ENT_QUOTES);
		$office	= htmlentities($postData['office'], ENT_QUOTES);
		
		//add array
		$data_array = array(	

			'customer_id'=>$customer_id,
			'sample_code'=>$sample_code,
			'attached_by'=>$attached_by,
			'office'=>$office,
			'created'=>date('Y-m-d H:i:s'),
			'modified'=>date('Y-m-d H:i:s')
		);
		
		$saveEntity = $this->newEntity($data_array);

		if ($this->save($saveEntity)) {

			return 1;
		}
	

	}


	// To remove the attached customer id with sample code 
	// Author : Akash Thakre
	// Date : 23-05-2023
	// For : MMR

	public function removeSampleWithPacker($postData)
	{
		$customer_id = htmlentities($postData['customer_id'], ENT_QUOTES);
		$sample_code = htmlentities($postData['sample_code'], ENT_QUOTES);
		$attached_by = htmlentities($postData['attached_by'], ENT_QUOTES);
		$office = htmlentities($postData['office'], ENT_QUOTES);

		// Find the last record by table ID
		$entity = $this->find()
			->where(['customer_id' => $customer_id, 'sample_code' => $sample_code])
			->order(['id' => 'DESC'])
			->first();

		if ($entity) {
			// Update the last record
			$entity->attached_by = $attached_by;
			$entity->office = $office;
			$entity->modified = date('Y-m-d H:i:s');
			$entity->delete_status = 'Y';

			if ($this->save($entity)) {
				return true;
			}
		}

		return false;
	}


	

}
?>