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

		$latest_id = $this->find('list', array(
			'valueField'=>'id',
			'conditions'=>array('customer_id IS'=>$customer_id)))->toArray();

		$DmiBgrCommodityReportsAddmore = TableRegistry::getTableLocator()->get('DmiBgrCommodityReportsAddmore');

		
		
		if($latest_id != null){
			$form_fields = $this->find('all', array(
				'conditions'=>array('id'=>MAX($latest_id))))->first();
			
			$form_fields_details = $form_fields;
			
		}else{
			
			$form_fields_details = array (
				'id'=>"", 'customer_id' => "",
				'reffered_back_comment' => "",
				'reffered_back_date' => "",
				'form_status' =>"",
				'customer_reply' =>"",
				'customer_reply_date' =>"",
				'approved_date' => "",
				'current_level' => "",
				'mo_comment' =>"",
				'mo_comment_date' => "",
				'ro_reply_comment' =>"",
				'ro_reply_comment_date' =>"",
				'delete_mo_comment' =>"",
				'delete_ro_reply' => "",
				'delete_ro_referred_back' => "",
				'delete_customer_reply' => "",
				'ro_current_comment_to' => "",
				'rb_comment_ul'=>"",
				'mo_comment_ul'=>"",
				'rr_comment_ul'=>"",
				'cr_comment_ul'=>""
			);
			
		}

		// to fetch CA details: Name of Packer with address and e-mail id
		if(!empty($_SESSION['packer_id']) || isset($_SESSION['packer_id'])){
			$customer_id = $_SESSION['packer_id'];
		}else{
			$customer_id = $_SESSION['customer_id'];
		}
		
		
		$DmiFirms = TableRegistry::getTableLocator()->get('DmiFirms');
		$DmiStates = TableRegistry::getTableLocator()->get('DmiStates');
		$Dmi_ro_office = TableRegistry::getTableLocator()->get('DmiRoOffices');
		$DmiApplWithRoMappings = TableRegistry::getTableLocator()->get('DmiApplWithRoMappings');
		$MCommodity = TableRegistry::getTableLocator()->get('MCommodity');
		$CommGrade = TableRegistry::getTableLocator()->get('CommGrade');
		$MGradeDesc = TableRegistry::getTableLocator()->get('MGradeDesc');
		$DmiCaPpLabMapings = TableRegistry::getTableLocator()->get('DmiCaPpLabMapings');
		$DmiCustomerLaboratoryDetails = TableRegistry::getTableLocator()->get('DmiCustomerLaboratoryDetails');

		$firm_details = $DmiFirms->firmDetails($customer_id);
	
		$state_id = $firm_details['state'];

		$fetch_state_name = $DmiStates->find('all',array(
			'fields'=>'state_name',
			'conditions'=>array(
				'id IS'=>$state_id,
				'OR'=>array(
					'delete_status IS NULL',
					'delete_status ='=>'no'
		))))->first();

		$state_name = $fetch_state_name['state_name'];
		
		$firmname = $firm_details['firm_name'];
		$email = $firm_details['email'];
		$address = $firm_details['street_address'];

		// to get RO/SO office
		$get_office = $DmiApplWithRoMappings->getOfficeDetails($customer_id);
		$region = $get_office['ro_office'];
		
		$CustomersController = new CustomersController;
		$export_unit_status = $CustomersController->Customfunctions->checkApplicantExportUnit($customer_id);
	
		
		// Get the current year
		$currentYear = date('Y');
		$currentDate = date('Y-m-d');

		// Calculate the start and end dates of the first biannual period (April 1st to September 30th)
		$firstPeriodStartDate = $currentYear . '-04-01';
		$firstPeriodEndDate = $currentYear . '-09-30';

		// Assuming you have a model named DmiBgrCommodityReportsAddmore
		$DmiBgrCommodityReportsAddmore = TableRegistry::getTableLocator()->get('DmiBgrCommodityReportsAddmore');

		// Fetch data for the first period (April 1st to September 30th)
		$firstPeriodData = $DmiBgrCommodityReportsAddmore->find()
				->where([
						'created >=' => $firstPeriodStartDate,
						'created <=' => $firstPeriodEndDate
				])->toArray();


		// Calculate the start and end dates of the second biannual period (October 1st to March 31st)
		$secondPeriodStartDate = $currentYear . '-10-01';
		$secondPeriodEndDate = ($currentYear + 1) . '-03-31';


		if ($currentDate >= $firstPeriodStartDate && $currentDate <= $firstPeriodEndDate) {
					$periodStartDisplay = date('m/d/y', strtotime($secondPeriodStartDate));
					$periodEndDisplay = date('m/d/y', strtotime($secondPeriodEndDate));
			} elseif ($currentDate >= $secondPeriodStartDate && $currentDate <= $secondPeriodEndDate) {
					$periodStartDisplay = date('m/d/y', strtotime($firstPeriodStartDate));
					$periodEndDisplay = date('m/d/y', strtotime($firstPeriodEndDate));
			} else {
					$periodStartDisplay = '';
					$periodEndDisplay = '';
			}

		

		
		$added_firm = $DmiFirms->find('all', ['conditions' => ['customer_id' => $customer_id]])->first();
			
		if ($added_firm) {
				$sub_comm_ids = explode(',', $added_firm['sub_commodity']);
				
				$sub_commodity_value = $MCommodity
						->find('list', ['keyField' => 'commodity_code', 'valueField' => 'commodity_name'])
						->where(['commodity_code IN' => $sub_comm_ids])
						->toArray();

				$get_grade = $CommGrade->find('all',array(
					'fields'=>'grade_code',
					'conditions'=>array('commodity_code IN'=>$sub_comm_ids),'group'=>'grade_code'
				))->toArray();
				
				$grade_list = [];
				foreach($get_grade as $each_grade){

					$get_grade_desc = $MGradeDesc->find('all',array(
						'fields'=>array('grade_code','grade_desc'),'conditions'=>array(
							'grade_code IN'=>$each_grade['grade_code']),'group'=>array('grade_code','grade_desc'
					)))->first();
					
					$grade_list[$get_grade_desc['grade_code']] = $get_grade_desc['grade_desc'];
				}
		} else {
				$sub_commodity_value = [];
				$grade_list = [];
		}
		// attached laboratory
		$attached_laboratory = $DmiCaPpLabMapings->find('all', [
				'conditions' => ['customer_id' => $customer_id,'map_type'=>'lab', 'delete_status IS NULL'],
				'order' => ['id' => 'DESC']
		])->first();
			
		if(!empty($attached_laboratory)){
			$lab_id = $attached_laboratory['lab_id'];
		
			if(strpos($lab_id,"/Own") !== false){
				$recordidArray = explode("/", $lab_id);
				$ownlabId = $recordidArray[0];
				$form_laboratory_data = $DmiCustomerLaboratoryDetails->find('all', [
				'conditions' => ['id' => $ownlabId]])->first();
				$laboratory_name = $form_laboratory_data['laboratory_name'];
			}else{
				$form_laboratory_data = $DmiCustomerLaboratoryDetails->find('all', [
				'conditions' => ['id' => $lab_id]])->first();
				$laboratory_name = $form_laboratory_data['laboratory_name'];
			}
			
		}else{
			$laboratory_name = "";
		}
		

		
			
		$bgraAddedRecord = $DmiBgrCommodityReportsAddmore->find('all',array(
			'conditions'=>array(
			'customer_id IS'=>$customer_id)))->toArray();

			 $query = $DmiBgrCommodityReportsAddmore->find()
        ->where([
            'customer_id' => $customer_id,
            'delete_status IS NULL' // Records where delete_status is NULL
        ])
        ->order(['id' => 'desc']);

    $bgrReportData = $query->toArray();

    foreach ($bgrReportData as $eachvalue) { // Note the "&" before $eachvalue
        $commodity_code = $eachvalue['commodity'];

        $result = $MCommodity->find()
            ->select('commodity_name')
            ->where(['commodity_code' => $commodity_code]);

        $commodityArray = $result->first();
        $eachvalue['commodity'] = $commodityArray ? $commodityArray->commodity_name : '';
    }

		$DmiReplicaUnitDetails = TableRegistry::getTableLocator()->get('DmiReplicaUnitDetails');
		
		$unit_list = $DmiReplicaUnitDetails
    ->find('list', [
        'keyField' => 'id',
        'valueField' => 'sub_unit',
        'conditions' => [],
        'order' => 'id asc'
    ])
    ->toArray();
		
		return array(
			$form_fields_details,
			$firmname,$email,
			$address,
			$state_name,
			$region,
			$export_unit_status,
			$periodStartDisplay,
			$periodEndDisplay,
			$sub_commodity_value,
			$grade_list,
			$laboratory_name,
			$bgrReportData,
			$unit_list
		);

	}
	
	

	public function saveFormDetails($customer_id,$forms_data){


			$dataValidatation = $this->postDataValidation($customer_id,$forms_data);

			if($dataValidatation == 1 ){

				$CustomersController = new CustomersController;
				$section_form_details = $this->sectionFormDetails($customer_id);

								// file upload
				if(!empty($forms_data['other_upload_docs']->getClientFilename())){

					$file_name = $forms_data['other_upload_docs']->getClientFilename();
					$file_size = $forms_data['other_upload_docs']->getSize();
					$file_type = $forms_data['other_upload_docs']->getClientMediaType();
					$file_local_path = $forms_data['other_upload_docs']->getStream()->getMetadata('uri');

					$other_upload_docs = $CustomersController->Customfunctions->fileUploadLib($file_name,$file_size,$file_type,$file_local_path); // calling file uploading function

				}else{
					$other_upload_docs = null;
				}

				 if(!empty($section_form_details[0]['id'])){
					if(empty($other_upload_docs)){
						$other_upload_docs = $section_form_details[0]['other_upload_docs'];
					}
    		 }
				
				 // If applicant have referred back on give section
				if($section_form_details[0]['form_status'] == 'referred_back'){
					$max_id = $section_form_details[0]['id'];
					$htmlencoded_reply = htmlentities($forms_data['customer_reply'], ENT_QUOTES);
					$customer_reply_date = date('Y-m-d H:i:s');

					if(!empty($forms_data['cr_comment_ul']->getClientFilename())){
						
						$file_name = $forms_data['cr_comment_ul']->getClientFilename();
						$file_size = $forms_data['cr_comment_ul']->getSize();
						$file_type = $forms_data['cr_comment_ul']->getClientMediaType();
						$file_local_path = $forms_data['cr_comment_ul']->getStream()->getMetadata('uri');
						
						$cr_comment_ul = $CustomersController->Customfunctions->fileUploadLib($file_name,$file_size,$file_type,$file_local_path); // calling file uploading function
				
					}else{ $cr_comment_ul = null; }
				}else{
						$htmlencoded_reply = '';
						$max_id = '';
						$customer_reply_date = '';
						$cr_comment_ul = null;
				}

				if(empty($section_form_details[0]['created'])){  $created = date('Y-m-d H:i:s'); }
				//added date function on 31-05-2021 by Amol to convert date format, as saving null
				else{ $created = $CustomersController->Customfunctions->changeDateFormat($section_form_details[0]['created']); }

				$newEntity = $this->newEntity(array(
					'id'=>$max_id,
					'customer_id'=>$customer_id,
					'other_upload_docs'=>$other_upload_docs,
					'form_status'=>'saved',
					'customer_reply'=>$htmlencoded_reply,
					'customer_reply_date'=>$customer_reply_date,
					'cr_comment_ul'=>$cr_comment_ul,
					'created'=>$created,
					'modified'=>date('Y-m-d H:i:s'
				)));
				

				if ($this->save($newEntity)){
					
					return 1;
					
				};

			}else{	return false; }


		 


			
   

			

			
	}

	// To save 	RO/SO referred back  and MO reply comment
	public function saveReferredBackComment ($customer_id,$forms_data,$comment,$comment_upload,$reffered_back_to){
		
		$logged_in_user = $_SESSION['username'];
		$current_level = $_SESSION['current_level'];

		$CustomersController = new CustomersController;

		//added date function on 31-05-2021 by Amol to convert date format, as saving null
		$created_date = $CustomersController->Customfunctions->changeDateFormat($forms_data['created']);
		
		if($reffered_back_to == 'Level3ToApplicant'){
			
			$form_status = 'referred_back';
			$reffered_back_comment = $comment;
			$reffered_back_date = date('Y-m-d H:i:s');
			$rb_comment_ul = $comment_upload;
			$ro_current_comment_to = 'applicant';
			$mo_comment = null;
			$mo_comment_date = null;
			$mo_comment_ul = null;
			$ro_reply_comment = null;
			$ro_reply_comment_date = null;
			$rr_comment_ul = null;
			
		}elseif($reffered_back_to == 'Level1ToLevel3'){
			
			$form_status = $forms_data['form_status'];
			$reffered_back_comment = null;
			$reffered_back_date = null;
			$rb_comment_ul = null;
			$ro_current_comment_to = null;
			$mo_comment = $comment;
			$mo_comment_date = date('Y-m-d H:i:s');
			$mo_comment_ul = $comment_upload;
			$ro_reply_comment = null;
			$ro_reply_comment_date = null;
			$rr_comment_ul = null;
			
		}elseif($reffered_back_to == 'Level3ToLevel'){
			
			$form_status = $forms_data['form_status'];
			$reffered_back_comment = $forms_data['reffered_back_comment'];
			$reffered_back_date = $forms_data['reffered_back_date'];
			$rb_comment_ul = $forms_data['rb_comment_ul'];
			$ro_current_comment_to = 'mo';
			$mo_comment = null;
			$mo_comment_date = null;
			$mo_comment_ul = null;
			$ro_reply_comment = $comment;
			$ro_reply_comment_date = date('Y-m-d H:i:s');
			$rr_comment_ul = $comment_upload;
			
		}

		$formSavedEntity = $this->newEntity(array(
			'customer_id'=>$customer_id,
			'other_upload_docs'=>$forms_data['other_upload_docs'],
			'form_status'=>$form_status,
			'reffered_back_comment'=>$reffered_back_comment,
			'reffered_back_date'=>$reffered_back_date,
			'rb_comment_ul'=>$rb_comment_ul,
			'user_email_id'=>$_SESSION['username'],
			'current_level'=>$current_level,
			'ro_current_comment_to'=>$ro_current_comment_to,
			'mo_comment'=>$mo_comment,
			'mo_comment_date'=>$mo_comment_date,
			'mo_comment_ul'=>$mo_comment_ul,
			'ro_reply_comment'=>$ro_reply_comment,
			'ro_reply_comment_date'=>$ro_reply_comment_date,
			'rr_comment_ul'=>$rr_comment_ul,
			'created'=>$created_date,
			'modified'=>date('Y-m-d H:i:s'),
		));
		if($this->save($formSavedEntity)){
			
			return 1;
		}else{
			
			return 0;
		}
	}

		public function postDataValidation($customer_id,$forms_data){
		//	print_r($forms_data); exit;
			$returnValue = true;
			$section_form_details = $this->sectionFormDetails($customer_id);
			$CustomersController = new CustomersController;


			if(empty($section_form_details[0]['id'])){

				if(empty($forms_data['other_upload_docs']->getClientFilename())){ $returnValue = null ; }
			
			}

			if(empty($forms_data['other_upload_docs'])){ $returnValue = null ; }
			
			
			return $returnValue;
			
		}
		
}
