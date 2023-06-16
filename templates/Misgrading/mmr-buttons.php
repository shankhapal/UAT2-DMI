<?php 
	#Save/Update Buttons
	if ($_SESSION['role'] == 'RO/SO OIC' && empty($isSampleAllocated) ) {

		if(isset($_SESSION['application_mode']) &&  $_SESSION['application_mode'] == 'edit'){
			echo $this->Form->submit('Save Details', array('name'=>'save_details', 'id'=>'save_details', 'label'=>false,'class'=>'btn btn-success float-left','title'=>'Click to Save the Attachement and To Proceed Further'));
		}
	}
	#Allocate Button
	if (isset($isSampleSaved['is_attached_packer_sample']) && $isSampleSaved['is_attached_packer_sample'] != 'N') {		//Scrutiny Button
		
		//Hide the Allocation Button if the Sample Report is allocated
		if (empty($isSampleAllocated)) { 
			if(isset($_SESSION['application_mode']) &&  $_SESSION['application_mode'] == 'edit'){
				echo $this->Form->submit('Allocate Report', array('name'=>'allocate_report', 'id'=>'allocate_report', 'label'=>false,'class'=>'btn btn-info float-left ml-2','title'=>'Allocate this Report for Review to Scrutinizer'));
			}
		}
		
		if ($_SESSION['current_level'] == 'level_3') {
		
			if ( $_SESSION['application_mode'] == 'edit') {
				echo $this->Form->submit('Scrutiny', array('name'=>'scrutiny', 'id'=>'scrutiny', 'label'=>false,'class'=>'btn btn-primary float-left ml-2','title'=>'Scrutinize this report. Note : If Scrutinized You cannot take any actions.'));
			
				echo $this->Html->link('Take Action', ['controller' => 'othermodules', 'action' => 'misgrading_home'], ['class' => 'ml-2 btn btn-outline-dark float-left','title'=>'Take Action on this Report, Go to Action Module']);
			}
		}
	}

	if ($isAllocatd == 'yes') {
		//Send Comment Button
		if(isset($_SESSION['application_mode']) &&  $_SESSION['application_mode'] == 'edit'){
			echo $this->Form->submit('Send Comment', array('name'=>'send_comment', 'id'=>'send_comment_btn', 'label'=>false,'class'=>'ml-2 float-left btn btn-success','title' => 'Send the Comment'));
		}
	}

	echo $this->Html->link('Cancel', ['controller' => 'dashboard', 'action' => 'home'], ['class' => 'btn btn-danger float-right','title' => 'Go To Home']);

	if ($_SESSION['current_level'] == 'level_1') {
		echo $this->Html->link('Back', array('controller' => 'misgrading', 'action'=>'allocated_reports_for_mo'),array('class'=>'add_btn btn btn-secondary float-right mr-2')); 
	}else{
		echo $this->Html->link('Back', array('controller' => 'misgrading', 'action'=>'report_listing_for_allocation'),array('class'=>'add_btn btn btn-secondary float-right mr-2')); 
	}

	
?>