<?php
	namespace app\Model\Table;
	use Cake\ORM\Table;
	use App\Model\Model;
	use Cake\ORM\TableRegistry;

class DmiCommonScrutinyFlowDetailsTable extends Table{
	
	var $name = "DmiCommonScrutinyFlowDetails";

		
	public function currentSectionDetails($application_type,$office_type,$firm_type,$form_type,$section_id){
	//=print_r($application_type."\n".$office_type."\n".$firm_type."\n".$form_type."\n".$section_id); exit;
		$sectionDetails = $this->find('all',array('conditions'=>array('application_type IS'=>$application_type,'office_type IS'=>$office_type,'firm_type IS'=>$firm_type,
													  'form_type IS'=>$form_type,'section_id IS'=>$section_id)))->first();	
															
		return $sectionDetails;
	}
	
	public function allSectionList($application_type,$office_type,$firm_type,$form_type){ 
		
		$paymentForChange = $_SESSION['paymentforchange'];
		//for chemist home if oldapplication not in session occured error , so added condtion and above set empty by laxmi B. on 30-05-2023
		$oldapplication = '';
		if(!empty($_SESSION['oldapplication'])){
			$oldapplication = $_SESSION['oldapplication'];
		}
		$paymentSection = 'available';
		
		$allSectionDetails = $this->find('all',array('conditions'=>array('application_type IS'=>$application_type,'office_type IS'=>$office_type,'firm_type IS'=>$firm_type,
													  'form_type IS'=>$form_type),'order'=>'section_id'))->toArray();		
			
		/* Below logic for change flow */		
		foreach($allSectionDetails as $key => $value)
		{
		  $payment = $allSectionDetails[$key]['payment_section'];
		  
		  if($payment == NULL || $paymentForChange == 'NA' || $oldapplication == 'yes'){			 
			  $paymentSection = 'NA';
			  $allSectionDetails[$key]['payment_section'] = NULL;
		  }		
		}
		
		$_SESSION['paymentSection'] = $paymentSection;
		 //check if chemist is alredy registerd if yes then payment form not include
		// added by laxmi B. on 13-12-2022
		  if($application_type == 4){
			  
			 $client = TableRegistry::get('DmiChemistRegistrations');
			 if(!empty($_SESSION['customer_id'])){
				$checkClient = $client->find('all')->where(array('chemist_id IS'=>$_SESSION['customer_id']))->first();
			 }

			if(!empty($_SESSION['username'] && $_SESSION['application_dashboard'] == 'chemist')){
				$checkClient = $client->find('all')->where(array('chemist_id IS'=>$_SESSION['username']))->first();
			}
			
			if (!empty($checkClient) && ($checkClient['is_training_completed']=='yes' || $checkClient['is_training_completed']== NULL)) {
				
				$_SESSION['paymentSection'] = NULL;
			}
		  }
		
		return $allSectionDetails;
	}
}

?>