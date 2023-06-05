<?php 
	#Save/Update Buttons
	if ($_SESSION['role'] == 'RO/SO OIC' && empty($isSampleAllocated) ) {
		echo $this->Form->submit('Save Details', array('name'=>'save_details', 'id'=>'save_details', 'label'=>false,'class'=>'btn btn-success float-left'));
	}
	#Allocate Button
	if (isset($isSampleSaved['is_attached_packer_sample']) && $isSampleSaved['is_attached_packer_sample'] != 'N') {		//Scrutiny Button
		
		//Hide the Allocation Button if the Sample Report is allocated
		if (empty($isSampleAllocated)) {
			echo $this->Form->submit('Allocate Report', array('name'=>'allocate_report', 'id'=>'allocate_report', 'label'=>false,'class'=>'btn btn-info float-left ml-2','title'=>'Allocate this Report for Scrutiny'));
		}
		
		if ($_SESSION['current_level'] == 'level_3') {
			
			echo $this->Form->submit('Scrutiny', array('name'=>'scrutiny', 'id'=>'scrutiny', 'label'=>false,'class'=>'btn btn-primary float-left ml-2','title'=>'Scrutiny this Report'));
			
			echo $this->Html->link('Take Action', ['controller' => 'othermodules', 'action' => 'misgrading_home'], ['class' => 'ml-2 btn btn-outline-dark float-left']);
		}
	}

	if ($isAllocatd == 'yes') {
		//Send Comment Button
		if(isset($_SESSION['application_mode']) &&  $_SESSION['application_mode'] == 'edit'){
			echo $this->Form->submit('Send Comment', array('name'=>'send_comment', 'id'=>'send_comment_btn', 'label'=>false,'class'=>'ml-2 float-left btn btn-success'));
		}
	}
	
	echo $this->Html->link('Cancel', ['controller' => 'dashboard', 'action' => 'home'], ['class' => 'btn btn-danger float-right']);
?>