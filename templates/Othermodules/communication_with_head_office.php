<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6"><label class="badge badge-info">Referred to Head Office</label></div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><?php echo $this->Html->link('Dashboard', array('controller' => 'dashboard', 'action'=>'home'));?></a></li>
						<li class="breadcrumb-item active">Misgrade Actions</li>
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
						<div class="card card-primary">
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
												</dl>
											</div>
										</div>
									</div>

									<div class="col-6">
										<div class="form-group">
											<label class="col-form-label">Reason <span class="cRed">*</span></label>
											<?php echo $this->Form->control('reason', array('type'=>'textarea','id'=>'reason', 'value'=>$reason,'label'=>false, 'class'=>'form-control rOnly')); ?>
											<span id="error_reason" class="error invalid-feedback"></span>
										</div>
									</div>
				
									<div class="col-6">
										<div class="card">
											<div class="card-header bg-lightblue"><h3 class="card-title">Other Details</h3></div>
											<div class="card-body">
												<dl class="row">
													<dt class="col-sm-4">Report : </dt>
													<dd class="col-sm-8"><a href="<?php echo $this->request->getAttribute('webroot'); ?>misgrading/sample_test_report_code/<?php echo trim($sample_code) . '/' . $commodity_code; ?>" target='_blank' class="far fa-file-pdf">	View</a></dd>
													<dt class="col-sm-4">ShowCause Notice : </dt>
													<dd class="col-sm-8">
														<?php 
															if ($is_showcause == 'Yes') {
															
																$filePath = str_replace("D:/xampp/htdocs", "", $scn_pdf); 
																$fileName = basename($filePath);
																$link = '<a id="lab_equipped_docs_value" target="_blank" href="' . $filePath . '">' . $fileName . '</a>';
																echo $link;
													
															} else {
																echo "N/A";
															}
														?>
													 </dd>
												</dl>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<?php echo $this->element('misgrade_elements/with_head_office_communication'); ?>
								<div class="card-footer cardFooterBackground">
									
									<?php
									if ($mode !== 'view') {
										
										echo $this->Form->submit('Send Comment', array('name'=>'send_comment', 'id'=>'send_comment_btn', 'label'=>false,'class'=>'btn btn-success float-left'));

										if ($current_level == 'level_3') {
										
											echo $this->Html->link('Take Action',
												['controller' => 'Othermodules','action' => 'fetchIdForAction','?' => ['id' => $table_id,'customer_id' => $customer_id,'sample_code' => $sample_code]],
												['class' => 'ml-2 btn btn-outline-dark float-right']
											);
											

										}
									} 
									if ($current_level == 'level_3') {
										echo $this->Html->link('Cancel',
											['controller' => 'Othermodules','action' => 'misgrading_home'],
											['class' => 'btn btn-danger float-right']
										);
									}else{
										echo $this->Html->link('Cancel',
											['controller' => 'Othermodules','action' => 'referred_to_head_office'],
											['class' => 'btn btn-danger float-right']
										);
									}
									?>
								</div>
						</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</section>
</div>

