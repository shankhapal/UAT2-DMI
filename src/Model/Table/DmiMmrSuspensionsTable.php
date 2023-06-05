<?php
	
namespace app\Model\Table;
use Cake\ORM\Table;
use App\Model\Model;
use App\Controller\AppController;
use App\Controller\CustomersController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

class DmiMmrSuspensionsTable extends Table{

	var $name = "DmiMmrSuspensions";

	public function saveSuspesion($customer_id,$pdf_file) {
		
		
		$DmiMmrActionFinalSubmits = TableRegistry::getTableLocator()->get('DmiMmrActionFinalSubmits');
		$details = $DmiMmrActionFinalSubmits->find()->where(['customer_id' => $customer_id])->order('id DESC')->first();
	
		$DmiMmrTimePeriod = TableRegistry::getTableLocator()->get('DmiMmrTimePeriod');
		$period = $DmiMmrTimePeriod->getTimePeriod($details['time_period']);

		// Get today's date
		$from_date = date('Y-m-d H:i:s');
		
		// Add the number of days to today's date
		$to_date = date('Y-m-d H:i:s', strtotime($from_date . ' + ' . $period['days'] . ' days'));
		
		//pr($details); exit;

		$dataArray = $this->newEntity(array(

			'customer_id'=>$customer_id,
			'sample_code'=>$details['sample_code'],
			'time_period'=>$period['month'],
			'from_date'=>$from_date,
			'to_date'=>$to_date,
			'suspended_before'=>null,
			'showcause_sent'=>$details['showcause'],
			'showcause_count'=>null,
			'showcause_replied'=>null,
			'suspended_on'=>$from_date,
			'suspended_by'=>$details['by_user'],
			'pdf_file'=>$pdf_file,
			'is_period_ever'=>null,
			'created'=>date('Y-m-d H:i:s'),
			'modified'=>date('Y-m-d H:i:s'),
			'days'=>$period['days']
		));


		if($this->save($dataArray)){

			$conditions = [
				'sample_code' => $details['sample_code'],
				'customer_id' => $customer_id
			];
			
			$DmiMmrActionFinalSubmits->updateAll(
				['is_suspended' => 'Yes',
				'status' => 'final_submit'],
				$conditions
			);
			
			return true;
		}
	}

}

?>