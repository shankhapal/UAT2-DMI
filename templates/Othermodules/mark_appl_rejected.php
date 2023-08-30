<div class="content-wrapper">

	<?php if (!empty($returnFalseMessage)) {
		echo "<div class='alert alert-danger'>$returnFalseMessage</div>";
	} ?>
	
	<?php echo $this->Form->create(null,array('id'=>'reject_appl_form','class'=>'form-group')); ?>
		<section class="content form-middle">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-Lightblue">
							<div class="card-header"><h3 class="card-title-new">To Mark Application as Rejected/Junked</h3></div>
							<div class="form-horizontal">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<b>Please Note:</b><br>
											1. The purpose of this module is to mark the application as rejected/junked.<br>
											2. Once the application marked as rejected, there is no provision to revert back<br>
											3. Kindly select the application type with application id, to reject appl. under specific process.<br>
										</div>
										<div class="col-md-12 row">
											<div class="col-md-3">
												<div class="form-group">
													<label>Application type <span class="cRed">*</span></label>
													<?php echo $this->Form->control('appl_type', array('type'=>'select', 'id'=>'appl_type', 'label'=>false, 'options'=>$applTypesList, 'empty'=>'--Select--','class'=>'form-control')); ?>
													<span id="error_appl_type" class="error invalid-feedback"></span>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label>Application Id <span class="cRed">*</span></label>
													<?php echo $this->Form->control('appl_id', array('type'=>'text', 'id'=>'appl_id', 'label'=>false, 'placeholder'=>'Enter Appl Id', 'class'=>'form-control')); ?>
													<span id="error_appl_id" class="error invalid-feedback"></span>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Remark/Reason <span class="cRed">*</span></label>
													<?php echo $this->Form->textarea('remark', array('id'=>'remark','label'=>false,'class'=>'form-control')); ?>
													<span id="error_remark" class="error invalid-feedback"></span>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">														
													<?php echo $this->Form->submit('Get Details', array('name'=>'get_details', 'id'=>'get_details_btn', 'label'=>false,'class'=>'float-left btn btn-success form-control')); ?>
												</div>
											</div>
										</div>
										<div class="col-md-12" id="appl_status"><!-- Appl Details will be loaded through ajax --></div>
										
										<div class="col-md-2">
											<?php echo $this->Form->submit('Mark as Rejected', array('name'=>'submit', 'id'=>'submit_btn', 'label'=>false,'class'=>'float-left btn btn-success form-control')); ?>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer cardFooterBackground">
								<?php 
									echo $this->Html->link('Back', array('controller' => 'dashboard', 'action'=>'home'),array('class'=>'float-right btn btn-secondary')); 
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php echo $this->Form->end(); ?>
</div>

<?php echo $this->Html->script('othermodules/mark_appl_reject');  ?>
