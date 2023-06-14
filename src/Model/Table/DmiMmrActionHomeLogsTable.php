<?php
namespace app\Model\Table;
use Cake\ORM\Table;
use App\Model\Model;
use Cake\ORM\TableRegistry;

class DmiMmrActionHomeLogsTable extends Table{
	
	var $name = "DmiMmrActionHomeLogs";
	
	public function getMisgradingActionList(){
		return $this->find('list', array('keyField'=>'id','valueField' => 'misgrade_action_name', 'conditions' => array('OR' => array('delete_status IS NULL', 'delete_status =' => 'no')), 'order' => array('id')))->toArray();
	}

	public function saveMisgradeAction($postData){

		if ($postData['time_period'] == null) {
			$time_period = 0;
		} else {
			$time_period = $postData['time_period'];
		}

		$enity = $this->newEntity(array(

			'customer_id'=>$_SESSION['firm_id'],
			'misgrade_category'=>$postData['misgrade_category'],
			'misgrade_level'=>$postData['misgrade_level'],
			'misgrade_action'=>$postData['misgrade_action'],
			'reason'=>htmlentities($postData['reason'], ENT_QUOTES),
			'user_email'=>$_SESSION['username'],
			'created'=>date('Y-m-d H:i:s'),
			'modified'=>date('Y-m-d H:i:s'),
			'status'=>'saved',
			'time_period'=>$time_period,
			'sample_code'=>$_SESSION['sample_code']
		));

		if ($this->save($enity)) {
			return true;
		}
	}

	public function updateMisgradeAction($postData){

		$enity = $this->newEntity(array(

			'customer_id'=>$postData['customer_id'],
			'misgrade_category'=>$postData['misgrade_category'],
			'misgrade_level'=>$postData['misgrade_level'],
			'misgrade_action'=>$postData['misgrade_action'],
			'reason'=>htmlentities($postData['reason'], ENT_QUOTES),
			'user_email'=>$_SESSION['username'],
			'created'=>date('Y-m-d H:i:s'),
			'modified'=>date('Y-m-d H:i:s'),
			'status'=>'saved',
			'sample_code'=>$_SESSION['sample_code']
		));

		if ($this->save($enity)) {
			return true;
		}
	}

	public function getInformation($customer_id,$sample_code=null){

		return $this->find()->where(['customer_id' => $customer_id,'sample_code IS'=>$sample_code])->order('id DESC')->first();
	}

	public function applicationFinalSubmit($postData) {
		
			
		$finalSubmitEntity = $this->newEntity(array('customer_id'=>$postData['customer_id'],
													'misgrade_category'=>$postData['misgrade_category'],
													'misgrade_level'=>$postData['misgrade_level'],
													'misgrade_action'=>$postData['misgrade_action'],
													'reason'=>htmlentities($postData['reason'], ENT_QUOTES),
													'user_email'=>$_SESSION['username'],
													'created'=>date('Y-m-d H:i:s'),
													'modified'=>date('Y-m-d H:i:s'),
													'status'=>'submitted',
													'time_period'=>$postData['time_period'],
													'sample_code'=>$postData['sample_code']));

		if ($this->save($finalSubmitEntity)) {

			$DmiMmrActionFinalSubmits = TableRegistry::getTableLocator()->get('DmiMmrActionFinalSubmits');

			$enitity = $DmiMmrActionFinalSubmits->newEntity(array(

				'customer_id'=>$postData['customer_id'],
				'misgrade_category'=>$postData['misgrade_category'],
				'misgrade_level'=>$postData['misgrade_level'],
				'misgrade_action'=>$postData['misgrade_action'],
				'status'=>'submitted',
				'time_period'=>$postData['time_period'],
				'showcause'=>null,
				'is_suspended'=>null,
				'created'=>date('Y-m-d H:i:s'),
				'modified'=>date('Y-m-d H:i:s'),
				'applicant_response'=>null,
				'reason'=>$postData['reason'],
				'by_user'=>$_SESSION['username'],
				'is_cancelled'=>null
			));
				
			if($DmiMmrActionFinalSubmits->save($enitity)){
				return true;
			}
		}
		
	}
	
}

?>