<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6"><label class="badge badge-info">Actions on Misgrading Module</label></div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><?php echo $this->Html->link('Dashboard', array('controller' => 'dashboard', 'action'=>'home'));?></a></li>
						<li class="breadcrumb-item active">List of Firms</li>
					</ol>
				</div>
			</div>
	  	</div>
	</div>
	
	<section class="content form-middle">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php echo $this->Form->create(null, array('id' => 'misgrading_action_home')); ?>
						<div class="card card-danger">
							<div class="card-header"><h3 class="card-title-new">Misgrading Actions</h3></div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="card">
											<div class="card-header bg-lightblue"><h3 class="card-title">Firm Details</h3></div>
											<div class="card-body">
												<dl class="row">
													<dt class="col-sm-4">Firm ID: </dt>
													<dd class="col-sm-8"><?php echo $customer_id; ?></dd>
													<dt class="col-sm-4">Firm Name: </dt>
													<dd class="col-sm-8"><?php echo $firmDetails['firm_name']; ?></dd>
													<dt class="col-sm-4">Sample Code: </dt>
													<dd class="col-sm-8"><?php echo $_SESSION['sample_code']; ?></dd>
													<dt class="col-sm-4">Commodity</dt>
													<dd class="col-sm-8"><?php echo implode(',', $sub_commodity_value); ?></dd>
												</dl>
											</div>
										</div>
									</div>
									<?php
										if (($status != 'submitted' && $status != 'final_submitted') || $re_action == 'yes') { ?>
										
										<div class="col-3 hide_det">
											<div class="form-group">
												<label class="col-form-label">Misgrading Category <span class="cRed">*</span></label>
												<?php echo $this->Form->control('misgrade_category', array('type'=>'select','empty'=>'-- Select Misgrading Category --','id'=>'misgrade_category','value'=>$misCatId,'options'=>$misgradingCategories, 'label'=>false, 'class'=>'form-control')); ?>
												<span id="error_misgrade_category" class="error invalid-feedback"></span>
											</div>
											
											<div class="form-group">
												<label class="col-form-label">Action To Be Taken <span class="cRed">*</span></label>
												<?php echo $this->Form->control('misgrade_action', array('type'=>'select','empty'=>'-- Select Misgrading Action --','id'=>'misgrade_action', 'value'=>$misActId,'options'=>$misgradingActions, 'label'=>false, 'class'=>'form-control')); ?>
												<span id="error_misgrade_action" class="error invalid-feedback"></span>
											</div>
										</div>
										<div class="col-3 hide_det">
											<div class="form-group">
												<label class="col-form-label">Misgrading Level <span class="cRed">*</span></label>
												<?php echo $this->Form->control('misgrade_level', array('type'=>'select','empty'=>'-- Select Misgrading Level --','id'=>'misgrade_level', 'value'=>$misLvlId,'options'=>$misgradingLevels, 'label'=>false, 'class'=>'form-control')); ?>
												<span id="error_misgrade_level" class="error invalid-feedback"></span>
											</div>
											<div class="form-group" id="time_period_div">
												<label class="col-form-label">Period <span class="cRed">*</span></label>
												<?php echo $this->Form->control('time_period', array('type'=>'select','empty'=>'-- Select Period --','id'=>'time_period', 'value'=>$periodId,'options'=>$timePeriod, 'label'=>false, 'class'=>'form-control')); ?>
												<span id="error_misgrade_action" class="error invalid-feedback"></span>
											</div>
										</div>

									<?php } ?>
									
									
									<div class="col-md-6" id="actions_div">
										<div class="card">
											<div class="card-header bg-olive"><h3 class="card-title">Actions</h3></div>
											<div class="card-body">
												<?php if ($status !== 'final_submitted' || $re_action == 'yes') { ?>
													<p>Note: If you want to update the action, please select all the dropdown options again. After making your selection, click on the update button.</p>
												<?php } ?>
												<dl class="row">
													<dt class="col-sm-4">Firm ID: </dt>
													<dd class="col-sm-8"><?php echo $customer_id; ?></dd>

													<dt class="col-sm-4">Misgrade Category: </dt>
													<dd class="col-sm-8"><?php echo $misCatName; ?> <br><label class="badge">(<?php echo $misCatDscp; ?>)</label></dd>

													<dt class="col-sm-4">Misgrade Level: </dt>
													<dd class="col-sm-8"><?php echo $misLvlName;?></dd>

													<dt class="col-sm-4">Action: </dt>
													<dd class="col-sm-8"><?php echo $misActName; ?></dd>

													<dt class="col-sm-4">Period: </dt>
													<dd class="col-sm-8"><?php echo $periodMonth; ?></dd>
												</dl>
											</div>
										</div>
									</div>
									
									<?php if (($status != 'submitted' && $status != 'final_submitted') || $re_action == 'yes') { ?>
										<div class="col-6">
											<div class="form-group">
												<label class="col-form-label">Reason <span class="cRed">*</span></label>
												<?php echo $this->Form->control('reason', array('type'=>'textarea','id'=>'reason', 'value'=>$reason,'label'=>false, 'class'=>'form-control')); ?>
												<span id="error_reason" class="error invalid-feedback"></span>
											</div>
										</div>
									<?php }?>
									<div class="col-6">
										<p id="mis_cat_desc"></p>
										<p id="mis_level_desc"></p>
										<p id="mis_action_desc"></p>
										<p id="mis_period_desc"></p>
									</div>
								</div>
							</div>
							<div class="card-footer cardFooterBackground">
								<?php 
									if (!empty($status)){
										if (($status != 'submitted' && $status != 'final_submitted') || $re_action == 'yes') {
											echo $this->Form->submit('Update', array('name'=>'save_action','id'=>'save_action','label'=>false,'class'=>'float-left btn btn-success'));
											echo $this->Form->control('Final Submit',array('type'=>'button','name'=>'take_action','class'=>'btn btn-primary ml-2 float-left', 'data-toggle'=>'modal','data-target'=>'#confirm_action','label'=>false));
										} 
									} else {
										echo $this->Form->submit('Save', array('name'=>'save_action','id'=>'save_action','label'=>false,'class'=>'float-left btn btn-success'));
									}
									echo $this->Html->link('Cancel', array('controller' => 'othermodules', 'action'=>'misgrading_home'),array('class'=>'add_btn btn btn-danger float-right'));
								?>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="confirm_action" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<table class="mt-2">
					<tbody>
						<tr>
							<td>Applicant ID : </td>
							<td><?php echo $customer_id; ?></td>
						</tr>
						<tr>
							<td>Category:</td>
							<td><?php echo $misCatName;?> (<?php echo $misCatDscp; ?>)</td>
						</tr>
						<tr>
							<td>Level :</td>
							<td><?php echo $misLvlName; ?></td>
						</tr>
						<tr>
							<td>Action :</td>
							<td><?php echo $misActName; ?></td>
						</tr>
						<tr>
							<td>Period : </td>
							<td><?php echo $periodMonth; ?></td>
						</tr>
					</tbody>
				</table>
				<div class="clearfix"></div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" id="final_submit" ><i class="fa fa-check-circle"></i> Submit</button>
				<button class="btn btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="status_id" value="<?php echo $status; ?>">
<input type="hidden" id="customer_id_value" value="<?php echo $_SESSION['firm_id']; ?>">
<input type="hidden" id="sample_code_id" value="<?php echo $_SESSION['sample_code']; ?>">
<input type="hidden" id="is_ghee_comm" value="<?php echo $isCommodityGhee; ?>">
<input type="hidden" id="misCatId_val" value="<?php echo $misCatId; ?>">
<input type="hidden" id="misActId_val" value="<?php echo $misActId; ?>">
<input type="hidden" id="misLvlId_val" value="<?php echo $misLvlId; ?>">
<input type="hidden" id="periodId_val" value="<?php echo $periodId; ?>">
<input type="hidden" id="re_action_val" value="<?php echo $re_action; ?>">

<?php 
	echo $this->Html->script('othermodules/misgrading_actions_home'); 
	echo $this->Html->script('othermodules/dropdown_validations'); 
?>
