<?php echo $this->Html->css('dropdowncustom');?>

<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6"><span class="badge badge-success">Management of Misgrading</span></div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><?php echo $this->Html->link('Dashboard', array('controller' => 'dashboard', 'action'=>'home')); ?></li>
					<li class="breadcrumb-item active">Report Allocate</li>
				</ol>
			</div>
		</div>
	</div>

	<section class="content form-middle">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php echo $this->Form->create(null, array('id'=>'frm_sample_forward','class'=>'form-group')); ?>
						<div class="card card-info">
							<div class="card-header"><h3 class="card-title-new">Report Details</h3></div>
							<div class="form-horizontal mb-3">
								<div class="card-body">
									<?php if(!empty($validate_err)){ ?><div class="alert alert-danger textAlignCenter text-danger"><?php echo $validate_err; ?></div><?php } ?>
									<div class="row">
										<div class="col-md-12 row">
											<div class="col-md-3">
												<label class="col-form-label">Sample Code <span class="cRed">*</span></label>
												<?php echo $this->Form->control('sample_code', array('type'=>'text', 'id'=>'sample_code', 'value'=>$sample_code, 'label'=>false,'class'=>'form-control readOnly','required'=>true,'readonly'=>'true')); ?>
												<span class="error invalid-feedback" id="error_sample_code"></span>
											</div>
											<div class="col-md-3">
												<label class="col-form-label">Category Name <span class="cRed">*</span></label>
												<?php echo $this->Form->control('category_name', array('type'=>'text', 'id'=>'category_name','value'=>$category_name, 'label'=>false,'class'=>'form-control readOnly','required'=>true,'readonly'=>'true')); ?>
												<span class="error invalid-feedback" id="error_commodity_code"></span>
												<input type="hidden" class="form-control" id="type" name="type"  hidden>
											</div>
											<div class="col-md-3">
												<label class="col-form-label">Commodity Name <span class="cRed">*</span></label>
												<?php echo $this->Form->control('commodity_name', array('type'=>'text', 'id'=>'commodity_name','value'=>$commodity_name, 'label'=>false,'class'=>'form-control readOnly','required'=>true,'readonly'=>'true')); ?>
												<span class="error invalid-feedback" id="error_commodity_code"></span>
												<input type="hidden" class="form-control" id="type" name="type"  hidden>
											</div>
											<div class="col-md-3">
												<label class="col-form-label">Sample Type <span class="cRed">*</span></label>
												<?php echo $this->Form->control('sample_type', array('type'=>'text', 'id'=>'sample_type', 'value'=>$sample_type, 'label'=>false,'class'=>'form-control readOnly','required'=>true,'readonly'=>'true')); ?>
												<span class="error invalid-feedback" id="error_sample_type"></span>
											</div>
										</div>
										<div class="col-md-12 row mt-3">
											<div class="col-md-3">
												<label class="col-form-label">Packer ID <span class="cRed">*</span></label>
													<?php 
														$defaultValue = isset($isAlreadyExist['customer_id']) ? $isAlreadyExist['customer_id'] : '';
														
														if ($_SESSION['current_level'] == 'level_3') {
														
															echo $this->Form->control(

																'packers_id', array('type'=>'select', 
																'id'=>'packers_id', 
																'options'=>$customer_list, 
																'value'=>$defaultValue, 
																'label'=>false, 
																'empty'=>'--Select--', 
																'required'=>true,
																'data-already-exist' => isset($isAlreadyExist['customer_id']) ? 'true' : 'false')
															);
														}
														
													?>
												<div id="error_dst_loc_id"></div>
											</div>
											<div class="col-md-3">
												<label class="badge" id="status_of_packer"></label>
											</div>
											<div class="offset-10">
												<label class="col-form-label">Report : <span class="cRed">*</span></label>
												<td><a href="<?php echo $this->request->getAttribute('webroot'); ?>misgrading/sample_test_report_code/<?php echo trim($sample_code) . '/' . $commodity_code; ?>" target='_blank' class="far fa-file-pdf">	View</a></td>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="allocation_popup_box"></div>
							<div class="form-horizontal">
								<div class="row">
								<div class="col-sm-6"><div id="firm_details"></div></div> <!--This is For the Firm Details -->
								<div class="col-sm-6"><div id="report_allocation_status"></div></div> <!--This is For the Report Status -->
								</div>
							</div>

							<?php if ($isAllocatd == 'yes') { ?>
					
								<div id="mmr_communication">
									<?php echo $this->element('../Misgrading/mmr_communication'); ?>
								</div>
								
							<?php } ?>
							
							<div class="card-footer">
								<?php echo $this->element('../Misgrading/mmr-buttons'); ?>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</section>
</div>

<input type="hidden" id="sample_code_value" value="<?php echo $sample_code; ?>">
<input type="hidden" id="current_level" value="<?php echo $_SESSION['current_level']; ?>">
<input type="hidden" id="is_allocated_id" value="<?php echo $isAllocatd; ?>">
<input type="hidden" id="application_mode_id" value="<?php echo $_SESSION['application_mode']; ?>">



<?php
	echo $this->Html->script('dropdowncustom');
	echo $this->Html->script('misgrading/allocate_report');
	unset($_SESSION['sample']);
	unset($_SESSION['stage_sample_code']);
?>
