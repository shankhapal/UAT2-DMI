<?php
namespace app\Model\Table;
use Cake\ORM\Table;
use App\Model\Model;
use Cake\ORM\TableRegistry;

class DmiMmrActionFinalSubmitsTable extends Table{
	
	var $name = "DmiMmrActionFinalSubmits";
	
	public function getTimePeriodList() {
		return $this->find('list', array('keyField'=>'time_period','valueField' => 'month', 'order' => array('time_period')))->toArray();
	}

	public function getTimePeriod($id){

		return $this->find('all')->where(['time_period' => $id])->first();
	}
	


	public function saveActionFinalData($postData){
		
		if($postData['misgrade_action'] === 6){
			$opt_for_showcause = 'Yes';
		}else {
			$opt_for_showcause = 'No';
		}

		$finalSubmitEntity = $this->newEntity(array('customer_id'=>$postData['customer_id'],
													'misgrade_category'=>$postData['misgrade_category'],
													'misgrade_level'=>$postData['misgrade_level'],
													'misgrade_action'=>$postData['misgrade_action'],
													'time_period'=>$postData['time_period'],
													'showcause'=>$postData['showcause'],
													'by_user' => $_SESSION['username'],
													'for_suspension' => $postData['for_suspension'],
													'for_cancel' => $postData['for_cancel'],
													'refer_to_ho' => $postData['refer_to_ho'],
													'created'=>date('Y-m-d H:i:s'),
													'modified'=>date('Y-m-d H:i:s'),
													'status'=>'submitted',
													'sample_code'=>$postData['sample_code'],

												));

		
		if ($this->save($finalSubmitEntity)) {
			

			$DmiMmrActionHomeLogs = TableRegistry::getTableLocator()->get('DmiMmrActionHomeLogs');

			$savedDetails = $DmiMmrActionHomeLogs->getInformation($postData['customer_id'],$postData['sample_code']);


			$entity = $DmiMmrActionHomeLogs->newEntity(array(

				'customer_id'=>$_SESSION['firm_id'],
				'misgrade_category'=>$savedDetails['misgrade_category'],
				'misgrade_level'=>$savedDetails['misgrade_level'],
				'misgrade_action'=>$savedDetails['misgrade_action'],
				'reason'=>htmlentities($savedDetails['reason'], ENT_QUOTES),
				'user_email'=>$_SESSION['username'],
				'created'=>date('Y-m-d H:i:s'),
				'modified'=>date('Y-m-d H:i:s'),
				'status'=>'final_submitted',
				'time_period'=>$savedDetails['time_period'],
				'sample_code'=>$_SESSION['sample_code']
			));
			
			if($DmiMmrActionHomeLogs->save($entity)){

				//This is to update the sample flag entry in sample_inward table
				$SampleInward = TableRegistry::getTableLocator()->get('SampleInward');
				$this->SampleInward->updateAll(
					['report_status' => 'Action Submit', 'packer_id' => $_SESSION['firm_id']],
					['org_sample_code' => $_SESSION['sample_code']]
				);

				if ($postData['for_suspension'] == 'Yes') {
					$final_action = 'Suspension';
				}elseif ($postData['for_cancel'] == 'Yes') {
					$final_action = 'Cancellation';
				}elseif ($postData['for_suspension'] == 'Yes') {
					$final_action = 'Refer';
				}elseif ($opt_for_showcause == 'Yes') {
					$final_action = 'Showcause';
				}
				
				return $final_action;
			}
		}
	}


	
	public function detailsForPdf($customer_id){

		$details =	$this->find()->where(['customer_id' => $customer_id])->order('id DESC')->first();

		if (!empty($details)) {
			//Misgrade Category Info
			$DmiMmrCategories = TableRegistry::getTableLocator()->get('DmiMmrCategories');
			$misgrade_category = $DmiMmrCategories->getMisgradingCategory($details['misgrade_category']); 

			//Misgrade Category Info
			$DmiMmrLevels = TableRegistry::getTableLocator()->get('DmiMmrLevels');
			$misgrade_level = $DmiMmrLevels->getMisgradingLevel($details['misgrade_level']);
			

			//Misgrade Category Info
			$DmiMmrActions = TableRegistry::getTableLocator()->get('DmiMmrActions');
			$misgrade_action = $DmiMmrActions->getMisgradingAction($details['misgrade_action']);
			
			//Misgrade Category Info
			$DmiMmrTimePeriod = TableRegistry::getTableLocator()->get('DmiMmrTimePeriod');
			$time_period = $DmiMmrTimePeriod->getTimePeriod($details['time_period']);
			
			
			
			$detailsArray = [
				'misgarde_details' => $misgrade_category['misgrade_category_name'] . " : " . $misgrade_category['misgrade_category_dscp'],
				'misgrade_level' => $misgrade_level['misgrade_level_name'],
				'actionName' => $misgrade_action['misgrade_action_name'],
				'periodMonth' => $time_period['month']
			];
		} else {
			$detailsArray = array();
		}
	
		return $detailsArray;
		
	}



}

?>