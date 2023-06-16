<?php
namespace app\Model\Table;
use Cake\ORM\Table;
use App\Model\Model;
use Cake\ORM\TableRegistry;

class DmiMmrHoAllocationsTable extends Table{
	
	var $name = "DmiMmrHoAllocations";


	public function saveHoAllocation($customer_id,$sample_code){

		$DmiUserRoles = TableRegistry::getTableLocator()->get('DmiUserRoles');

		$find_dy_ama_user = $DmiUserRoles->find('all',array('fields'=>'user_email_id','conditions'=>array('dy_ama'=>'yes')))->first();
		$dy_ama_email_id = $find_dy_ama_user['user_email_id'];

		$find_jt_ama_user = $DmiUserRoles->find('all',array('fields'=>'user_email_id','conditions'=>array('jt_ama'=>'yes')))->first();
		$jt_ama_email_id = $find_jt_ama_user['user_email_id'];

		$find_ama_user = $DmiUserRoles->find('all',array('fields'=>'user_email_id','conditions'=>array('ama'=>'yes')))->first();
		$ama_email_id = $find_ama_user['user_email_id'];
			
		$Dmi_ho_allocation_Entity = $this->newEntity(array(

			'customer_id'=>$customer_id,
			'sample_code'=>$sample_code,
			'dy_ama'=>$dy_ama_email_id,
			'jt_ama'=>$jt_ama_email_id,
			'ama'=>$ama_email_id,
			'current_level'=>$dy_ama_email_id,
			'created'=>date('Y-m-d H:i:s'),
			'modified'=>date('Y-m-d H:i:s')
		)); 

		if($this->save($Dmi_ho_allocation_Entity)){
			return true;
		}
	}

}

?>