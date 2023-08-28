<?php
	namespace app\Model\Table;
	use Cake\ORM\Table;
	use App\Model\Model;
	use Cake\ORM\TableRegistry;
    use App\Controller\CustomersController;

     enum AppealStatus: string
    {
        case InProcess = 'In Process';
        case Granted  ='granted';
        case Rejected = 'rejected';
    }

	class DmiAplFormDetailsTable extends Table{

	var $name = "DmiAplFormDetails";

	public function applicationCurrentUsers($customer_id)
	{
		$fetch_data = $this->find('all',array('fields'=>'current_user_email_id','conditions'=>array('customer_id IS'=>$customer_id),'order'=>array('id DESC')))->first();

		return $fetch_data;
	}



	public function userCurrentApplications($user_email_id)
	{
		$fetch_data = $this->find('all',array('conditions'=>array('current_user_email_id IS'=>$user_email_id)))->toArray();

		return $fetch_data;
	}


	public function currentUserEntry($customer_id,$user_email_id,$current_level)
	{
		$Entity = $this->newEntity(array(
			'customer_id'=>$customer_id,
			'current_level'=>$current_level,
			'current_user_email_id'=>$user_email_id,
			'created'=>date('Y-m-d H:i:s')
		 ));
		 $this->save($Entity);

	}


	public function currentUserUpdate($customer_id,$user_email_id,$current_level)
	{

		$find_row_id = $this->find('all',array('fields'=>'id', 'conditions'=>array('customer_id IS'=>$customer_id),'order'=>array('id DESC')))->first();
		$row_id = $find_row_id['id'];

		$newEntity = $this->newEntity(array(
			'id'=>$row_id,
			'current_level'=>$current_level,
			'current_user_email_id'=>$user_email_id,
			'modified'=>date('Y-m-d H:i:s')
		 ));

		 $this->save($newEntity);
		return true;
	}

    	// Fetch form section all details
	public function sectionFormDetails($customer_id){

		$latest_id = $this->find('list', array('valueField'=>'id', 'conditions'=>array('customer_id IS'=>$customer_id)))->toArray();

		if($latest_id != null){
			$form_fields_details = $this->find('all', array('conditions'=>array('id'=>MAX($latest_id))))->first();

		}else{
			$form_fields_details = Array ( 'id'=>"",'created' => "", 'modified' =>"", 'customer_id' => "", 'reffered_back_comment' => "",
											'reffered_back_date' => "", 'form_status' =>"", 'customer_reply' =>"", 'customer_reply_date' =>"",
											'approved_date' => "",'current_level' => "",'mo_comment' =>"", 'mo_comment_date' => "",
											'ro_reply_comment' =>"", 'ro_reply_comment_date' =>"", 'delete_mo_comment' =>"", 'delete_ro_reply' => "",
											'delete_ro_referred_back' => "", 'delete_customer_reply' => "", 'ro_current_comment_to' => "",
											'rb_comment_ul'=>"",'mo_comment_ul'=>"",'rr_comment_ul'=>"",'cr_comment_ul'=>"",
											'reason' =>"",'appeal_id'=>"",'supported_document'=>"",'status'=>""

										);

		}
		return array($form_fields_details);

	}

    // save or update form data and comment reply by applicant
	public function saveFormDetails($customer_id,$forms_data){

		if ($this->postDataValidation($customer_id,$forms_data)) {

			$CustomersController = new CustomersController;
			$firmType = $CustomersController->Customfunctions->firmType($customer_id);
			$section_form_details = $this->sectionFormDetails($customer_id);
			//Fields details to save
			$reason = htmlentities($forms_data['reason'], ENT_QUOTES);

			if(!empty($forms_data['supported_document']->getClientFilename())){

				$file_name = $forms_data['supported_document']->getClientFilename();
				$file_size = $forms_data['supported_document']->getSize();
				$file_type = $forms_data['supported_document']->getClientMediaType();
				$file_local_path = $forms_data['supported_document']->getStream()->getMetadata('uri');
				$required_document = $CustomersController->Customfunctions->fileUploadLib($file_name,$file_size,$file_type,$file_local_path); // calling file uploading function

			} else { $required_document = $section_form_details[0]['supported_document'];}


			// If applicant have referred back on give section
			if ($section_form_details[0]['form_status'] == 'referred_back') {

				$max_id = $section_form_details[0]['id'];
				$htmlencoded_reply = htmlentities($forms_data['customer_reply'], ENT_QUOTES);
				$customer_reply_date = date('Y-m-d H:i:s');

				if (!empty($forms_data['cr_comment_ul']->getClientFilename())) {

					$file_name = $forms_data['cr_comment_ul']->getClientFilename();
					$file_size = $forms_data['cr_comment_ul']->getSize();
					$file_type = $forms_data['cr_comment_ul']->getClientMediaType();
					$file_local_path = $forms_data['cr_comment_ul']->getStream()->getMetadata('uri');

					$cr_comment_ul = $CustomersController->Customfunctions->fileUploadLib($file_name,$file_size,$file_type,$file_local_path); // calling file uploading function

				} else { $cr_comment_ul = null; }

			} else {

				$htmlencoded_reply = '';
				$max_id = '';
				$customer_reply_date = '';
				$cr_comment_ul = null;
			}
            $appealStatus='';
			if (empty($section_form_details[0]['created'])) {
				$created = date('Y-m-d H:i:s');
                $appealStatus = "In Process";
            } else {
				//added date function on 31-05-2021 by Amol to convert date format, as saving null
				$created = $CustomersController->Customfunctions->changeDateFormat($section_form_details[0]['created']);
			}

            $appealId=$section_form_details[0]['appeal_id'];
            $appealId=empty($appealId)?$this->generateAppealID($customer_id):$appealId;

            //In Case of Update, Need to put ID, at above lines we are fetching Max ID in case of referred back,
            //however we have to keep track of id for update case as well.
            if(empty($max_id) &&  !(empty($this->$section_form_details) || empty($this->$section_form_details[0])))
            {
                $max_id= $this->$section_form_details[0]['id'];
            }
            $newEntity = $this->newEntity(array(

				'id'=>$max_id,
				'customer_id'=>$customer_id,
				'reason'=>$reason,
				'supported_document'=>$required_document,
				'form_status'=>'saved',
				'customer_reply'=>$htmlencoded_reply,
				'customer_reply_date'=>$customer_reply_date,
				'cr_comment_ul'=>$cr_comment_ul,
				'created'=>$created,
				'modified'=>date('Y-m-d H:i:s'),
                'appeal_id'=>$appealId,
                'status'=>$appealStatus
			));

			if ($this->save($newEntity)) {
                $rejectApplicationDetails = $CustomersController->Customfunctions->isApplicationRejected($customer_id);
                if(empty($rejectApplicationDetails['appeal_id']))
                {
                return $this->addAppealInfoInRejectLogTable($rejectApplicationDetails['id'],$appealId)?1:0;
                }
                else{
                    return 1;
                }
            }
		} else {
         return false;
        }

	}
	public function postDataValidation($customer_id,$forms_data){
		$returnValue = true;
		return $returnValue;

	}

    private function addAppealInfoInRejectLogTable($rejection_id,$appeal_id){
        $dmiRejectedApplLogs = TableRegistry::getTableLocator()->get('DmiRejectedApplLogs');
        $newEntity = $dmiRejectedApplLogs->newEntity(array(
            'id'=>$rejection_id,
            'appeal_id'=>$appeal_id
        ));
        return $dmiRejectedApplLogs->save($newEntity);
    }
    public function generateAppealID($customer_id){
        return 'APL-'.$customer_id;
    }


    public function updateAppealStatus($appealID, $status)
    {
        $newEntity = $this->newEntity(array(
            'id'=>$appealID,
            'status'=>$status,
            'modified'=>date('Y-m-d H:i:s')
        ));
        return $this->save($newEntity);
    }


	// To save 	RO/SO referred back  and MO reply comment
	public function saveReferredBackComment ($customer_id,$forms_data,$comment,$comment_upload,$reffered_back_to) {
		// Import another model in this model

		$logged_in_user = $_SESSION['username'];
		$current_level = $_SESSION['current_level'];

		$DmiOldApplicationDetails = TableRegistry::getTableLocator()->get('DmiOldApplicationCertificateDetails');

		$CustomersController = new CustomersController;
		$oldapplication = $CustomersController->Customfunctions->isOldApplication($customer_id);

		//added date function on 31-05-2021 by Amol to convert date format, as saving null
		$created_date = $CustomersController->Customfunctions->changeDateFormat($forms_data['created']);

		if ($reffered_back_to == 'Level3ToApplicant') {

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

		} elseif ($reffered_back_to == 'Level1ToLevel3') {

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

		} elseif ($reffered_back_to == 'Level3ToLevel1') { // this '1' is added to 'level' as it was not there for RO - MO communication on AKASH [19-08-2022]

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

		$newEntity = $this->newEntity(array(

			'customer_id'=>$customer_id,
			'reason'=>$forms_data['reason'],
			'reffered_back_comment'=>$reffered_back_comment,
			'reffered_back_date'=>$reffered_back_date,
			'form_status'=>$form_status,
			'rb_comment_ul'=>$rb_comment_ul,
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
            'appeal_id' =>$forms_data['appeal_id'],
            'status' => $forms_data['status'],
            'supported_documents' => $forms_data['supported_documents']
		));

		if($this->save($newEntity)){

			if($oldapplication == 'yes'){

				$old_certificate_details = $DmiOldApplicationDetails->oldApplicationCertificationDetails($customer_id);

				$DmiOldApplicationDetailsEntity = $DmiOldApplicationDetails->newEntity(array(
										'id'=>$old_certificate_details['id'],
										'old_certificate_pdf'=>$old_certificate_details['old_certificate_pdf'],
										'old_application_docs'=>$old_certificate_details['old_application_docs'],
				));

				if($DmiOldApplicationDetails->save($DmiOldApplicationDetailsEntity)){ return true;  }

			}else{ return true; }
		}

	}

}
