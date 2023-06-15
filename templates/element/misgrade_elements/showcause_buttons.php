<?php 
	if (!empty($status)){
		if ($status == 'saved') {
			echo $this->Form->submit('Update', array('name'=>'update_action','id'=>'update_action','label'=>false,'class'=>'float-left btn btn-success'));
			echo $this->Form->control('Send Notice',array('type'=>'button','name'=>'send_notice','class'=>'btn btn-primary ml-2 float-left', 'data-toggle'=>'modal','data-target'=>'#confirm_action','label'=>false));
		} elseif($status == 'replied' && $_SESSION['whichUser'] == 'dmiuser') {
			echo $this->Form->control('Reply to Applicant', array('name'=>'reply_to_applicant','type'=>'submit','id'=>'reply_to_applicant', 'class'=>'btn btn-success mr-5px btn_w_auto btn_save_remark float-left ml-2','label'=>false));
			
			echo $this->Html->link('Take Action',
				['controller' => 'Othermodules','action' => 'fetchIdForAction','?' => ['id' => $_SESSION['action_table_id'],'customer_id' => $customer_id,'sample_code' => $_SESSION['sample_code']]],
				['class' => 'ml-2 btn btn-outline-dark float-left']
			);
		}
	} else {
		echo $this->Form->submit('Save', array('name'=>'save_action','id'=>'save_action','label'=>false,'class'=>'float-left btn btn-success'));
	}

	if ($_SESSION['whichUser'] == 'applicant') {

		if ($_SESSION['scn_mode'] != 'view') {
			echo $this->Form->control('Send Comment', array('name'=>'save_applicant_comment','type'=>'submit','id'=>'save_applicant_comment', 'class'=>'btn btn-success mr-5px btn_w_auto btn_save_remark float-left ml-2','label'=>false));
		}
		
		echo $this->Html->link('Cancel', array('controller' => 'customers', 'action'=>'secondary-home'),array('class'=>'add_btn btn btn-danger float-right')); 

	}elseif($_SESSION['whichUser'] == 'dmiuser'){

		echo $this->Html->link('Cancel', array('controller' => 'othermodules', 'action'=>'misgrading_home'),array('class'=>'add_btn btn btn-danger float-right')); 

	}


?> 