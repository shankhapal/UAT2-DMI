<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6"><label class="badge badge-info"><?php echo $for_module; ?> Module</label></div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><?php echo $this->Html->link('Dashboard', array('controller' => 'dashboard', 'action'=>'home'));?></a></li>
						<li class="breadcrumb-item active"><?php echo $for_module; ?> Module</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content form-middle ">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php echo $this->Form->create(); ?>
						<div class="card card-gray">
							<div class="card-header"><h3 class="card-title-new"><?php echo $for_module; ?> Module</h3></div>
							<div class="form-horizontal">
								<div class="card-body">
									<div class="row">
										<p class="alert alert-info col-md-12"><?php echo $dashMessage; ?></p>
									
										<div class="col-md-12 row">
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
															<dd class="col-sm-8"><?php echo $sample_code; ?></dd>
															<dt class="col-sm-4">Commodity</dt>
															<dd class="col-sm-8"><?php echo implode(',', $sub_commodity_value); ?></dd>
														</dl>
													</div>
												</div>
											</div>	
											<div class="col-md-6">
												<div class="card">
													<div class="card-header bg-olive"><h3 class="card-title">Actions</h3></div>
													<div class="card-body">
														<dl class="row">
															<dt class="col-sm-4">Misgrade Category: </dt>
															<dd class="col-sm-8"><?php echo $misgradeCategory; ?>
															<dt class="col-sm-4">Misgrade Level: </dt>
															<dd class="col-sm-8"><?php echo $levelName;?></dd>
															<dt class="col-sm-4">Action: </dt>
															<dd class="col-sm-8"><?php echo $actionName; ?></dd>
															<dt class="col-sm-4">Period: </dt>
															<dd class="col-sm-8"><?php echo $periodMonth; ?></dd>
														</dl>
													</div>
												</div>
											</div>	
										</div>
										<div class="col-md-6">
										<?php 
											if(!empty($btn_to_re_esign)) { 
												echo $this->Form->control('re_esign_concent', array('type'=>'checkbox', 'id'=>'re_esign_concent', 'label'=>'	I confirm the changes and proceed to re-esign','escape'=>false));
											} 
										?>
										</div>
									</div>
								</div>
								
							</div>
							<div class="card-footer">
								<?php 
									if(!empty($btn_to_re_esign)) { 
										echo $this->form->submit('Proceed', array('name'=>'proceed_btn','id'=>'proceed_btn', 'label'=>false,'class'=>'float-left btn btn-success'));
									} 
								 ?>
								<a href="../dashboard/home" class="btn btn-secondary float-right">Back</a>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
				</div>
				<!-- moved out of form tag on 28-05-2021 for Form Based Esign method -->
				<?php echo $this->element('esign_views/re_esign_pdf_popup'); ?>
			</div>
		</div>
	</section>
</div>
<input type="hidden" id="appl_id" value="<?php echo $customer_id; ?>">
<?php echo $this->Html->script('othermodules/suspension_home'); ?>