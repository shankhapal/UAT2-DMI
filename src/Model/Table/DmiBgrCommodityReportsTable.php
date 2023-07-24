<?php 
	namespace app\Model\Table;
	use Cake\ORM\Table;
	use App\Model\Model;
	use Cake\ORM\TableRegistry;
	use App\Controller\AppController;
	use App\Controller\CustomersController;
	
	class DmiBgrCommodityReportsTable extends Table{
	
	var $name = "DmiBgrCommodityReports";
	
	
	public function sectionFormDetails($customer_id){

			$latest_id = $this->find('list', array('valueField'=>'id', 'conditions'=>array('customer_id IS'=>$customer_id)))->toArray();
				
			if($latest_id != null){
				$form_fields = $this->find('all', array('conditions'=>array('id'=>MAX($latest_id))))->first();		
				
				$form_fields_details = $form_fields;
				
			}else{
				
				$form_fields_details = Array ( 'id'=>"", 'customer_id' => "",
				'reffered_back_comment' => "",
				'reffered_back_date' => "", 'form_status' =>"", 'customer_reply' =>"", 'customer_reply_date' =>"", 'approved_date' => "",
				'current_level' => "",'mo_comment' =>"", 'mo_comment_date' => "", 'ro_reply_comment' =>"", 'ro_reply_comment_date' =>"", 'delete_mo_comment' =>"", 'delete_ro_reply' => "",'delete_ro_referred_back' => "", 'delete_customer_reply' => "", 'ro_current_comment_to' => "",
				'rb_comment_ul'=>"",'mo_comment_ul'=>"",'rr_comment_ul'=>"",'cr_comment_ul'=>""); 
				
			}

			return array($form_fields_details);

	}
	
		
}

?>