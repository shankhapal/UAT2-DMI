<?php ?>
<div class="content-wrapper">
	<div class="content-header">
  		<div class="container-fluid">
    		<div class="row mb-2">
			<div class="col-sm-6"><label class="badge badge-primary">Add Master Records</label></div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><?php echo $this->Html->link('Dashboard', array('controller' => 'dashboard', 'action'=>'home'));?></li>
						<li class="breadcrumb-item"><?php echo $this->Html->link('Masters Home', array('controller' => 'masters', 'action'=>'masters-home'));?></li>
						<li class="breadcrumb-item active"><?php echo $masterAddTitle ?></li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content form-middle">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10">
					<?php echo $this->Form->create(null,array('class'=>'form-group','id'=>$form_id)); ?>
						<div class="card">
							<div class="card-header card-master"><h4 class="card-title-new"><?php echo $masterAddTitle ?></h4></div>
							<div class="form-horizontal">
								<div class="card-body">
									<div class="row">
										<?php
											if ($masterId=='1') {

												echo $this->element('masters_management_elements/add_master_elements/add_state');

											} elseif ($masterId=='2') {

												echo $this->element('masters_management_elements/add_master_elements/add_district');

											} elseif ($masterId=='3') {

												echo $this->element('masters_management_elements/add_master_elements/add_business_type');

											} elseif ($masterId=='4') {

												echo $this->element('masters_management_elements/add_master_elements/add_packing_type');

											} elseif ($masterId=='5') {

												echo $this->element('masters_management_elements/add_master_elements/add_laboratory_type');

											} elseif ($masterId=='6') {

												echo $this->element('masters_management_elements/add_master_elements/add_machine_type');

											} elseif ($masterId=='7') {

												echo $this->element('masters_management_elements/add_master_elements/add_tank_shape');

											} elseif ($masterId=='8') {

												echo $this->element('masters_management_elements/add_master_elements/add_charge');

											} elseif ($masterId=='9') {

												echo $this->element('masters_management_elements/add_master_elements/add_business_year');

											} elseif ($masterId=='10') {

												echo $this->element('masters_management_elements/add_master_elements/add_office');

											} elseif ($masterId=='11') {

												echo $this->element('masters_management_elements/add_master_elements/add_template');

											} elseif ($masterId=='12') {

												echo $this->element('masters_management_elements/add_master_elements/add_pao');

											} elseif ($masterId=='15') {

												echo $this->element('masters_management_elements/add_master_elements/add_feedback_type');

											} elseif ($masterId=='16') {

												echo $this->element('masters_management_elements/add_master_elements/add_replica_charges');

											} elseif  ($masterId=='17') {

													echo $this->element('masters_management_elements/add_master_elements/add_education_type');

											} elseif  ($masterId=='18') {

												echo $this->element('masters_management_elements/add_master_elements/add_division_type');

											} elseif  ($masterId=='19') {

												echo $this->element('masters_management_elements/add_master_elements/add_document_type');
											
											} elseif ($masterId=='20') {
												// For Routine Inspection (RTI) added by shankhpal shende on 06/11/2022
												echo $this->element('masters_management_elements/add_master_elements/add_period');

											} elseif ($masterId=='21') {
												// For Management of Misgrading's Action's Masters (MMR) -> Akash [05-06-2023]
												echo $this->element('masters_management_elements/add_master_elements/add_misgrade_category');
											
											} elseif  ($masterId=='22') {
												// For Management of Misgrading's Action's Masters (MMR) -> Akash [05-06-2023]
												echo $this->element('masters_management_elements/add_master_elements/add_misgrade_levels');

											} elseif ($masterId == '23') {
												// For Management of Misgrading's Action's Masters (MMR) -> Akash [05-06-2023]
												echo $this->element('masters_management_elements/add_master_elements/add_misgrade_actions');
											}
										?>
									</div>
								</div>
							</div>
							<div class="card-footer cardFooterBackground">
								<?php echo $this->element('masters_management_elements/button_elements/add_submit_common_btn'); ?>
								<?php echo $this->Html->link('Back', array('controller' => 'masters', 'action'=>'list_master_records'),array('class'=>'add_btn btn btn-secondary float-right')); ?>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</section>
</div>


<input type="hidden" id="form_id" value="<?php echo $form_id; ?>">
<input type="hidden" id="masterId" value="<?php echo $masterId; ?>">

<?php echo $this->Html->script('Masters/add_master_record'); ?>
