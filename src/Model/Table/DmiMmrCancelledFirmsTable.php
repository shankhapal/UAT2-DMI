<?php
	
namespace app\Model\Table;
use Cake\ORM\Table;
use App\Model\Model;
use App\Controller\AppController;
use App\Controller\CustomersController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

class DmiMmrCancelledFirmsTable extends Table{

	var $name = "DmiMmrCancelledFirms";

	public function saveLog($customer_id,$newpath,$pdfversion) {
		
		$dataArray = $this->newEntity(array(

			'customer_id'=>$customer_id,
			'created'=>date('Y-m-d H:i:s'),
			'by_user'=>$_SESSION['username'],
			'pdf_file'=>$newpath,
			'date'=>date('Y-m-d H:i:s'),
			'pdf_version'=>$pdfversion
		));

		if($this->save($dataArray)){

			// Update the Flags In the Sample Inward table for packer_attached and packer_id
			$DmiMmrActionFinalSubmits = TableRegistry::getTableLocator()->get('DmiMmrActionFinalSubmits');
			$details = $DmiMmrActionFinalSubmits->find()->where(['customer_id' => $customer_id])->order('id DESC')->first();
			
			$conditions = [
				'sample_code' => $details['sample_code'],
				'customer_id' => $customer_id
			];
			
			$DmiMmrActionFinalSubmits->updateAll(
				['is_cancelled' => 'Yes',
				'status' => 'action_taken'],
				$conditions
			);
			
			//Update the sample inward table report status 
			$SampleInward = TableRegistry::getTableLocator()->get('SampleInward');
			$SampleInward->updateAll(
				['report_status' => 'Action Taken', 'packer_id' => $customer_id],
				['org_sample_code' => $details['sample_code']]
			);

			return true;
		}
	}
}

?>