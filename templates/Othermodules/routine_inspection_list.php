<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6"><label class="badge badge-primary">Application Pdf</label></div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><?php echo $this->Html->link('Dashboard', array('controller' => 'dashboard', 'action'=>'home'));?></a></li>
						<li class="breadcrumb-item active">Application Pdf</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<section class="col-lg-12 connectedSortable">
					<?php echo $this->Form->create(); ?>
						<div class="card card-cyan">
							<div class="card-header"><h3 class="card-title-new">List of Report for Routine Inspection</h3></div>
							<div class="card-body">
								<div class="container">
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group row ">
												<?php
													$options=array('ca'=>' Certificate Of Authorisation');
													$attributes=array('legend'=>false, 'value'=>'yes', 'id'=>'ca');
													echo $this->form->radio('pdf',$options,$attributes); 
												?>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group row ">
												<?php
													$options=array('pp'=>' Printing Permission');
													$attributes=array('legend'=>false, 'value'=>'', 'id'=>'pp');
													echo $this->form->radio('pdf',$options,$attributes); 
												?>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group row ">
												<?php
													$options=array('lab'=>' Approval Of Laboratory');
													$attributes=array('legend'=>false, 'value'=>'', 'id'=>'lab');
													echo $this->form->radio('pdf',$options,$attributes); ?>
											</div>
										</div>
									</div>
								</div>

								<table id = "ca_pdf_table" class="table table-hover table-bordered table-striped">
									<thead class="tablehead">
										<tr>
											<th>Sr. No.</th>
											<th>Applicant Id</th>
											<th>Approved Date</th>
											<th>Report. | Pdf</th>
											<th>Version</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$i=0;
											if (!empty($appl_array_ca)) {

											foreach ($appl_array_ca as $each) { ?>
						
												<tr>
													<td><?php echo $i+1;?></td>
													<td id="customer_id<?php echo $i; ?>"><?php echo $each['customer_id'];?></td>
													<td id="customer_id<?php echo $i; ?>"><?php echo $each['on_date'];?></td>
													<td><?php $report_pdf_path = explode("/",$each['report_pdf']);
															$report_pdf_name = $report_pdf_path[count($report_pdf_path) - 1]; ?>

														<a target="_blank" href="<?php echo $each['report_link']; ?>">
															<?php echo 'View'; ?>
														</a>
														|
														<a target="_blank" href="<?php echo $each['report_pdf']; ?>">
															<?php echo 'Pdf'; ?>
														</a>
													</td>
													<td><?php echo $each['pdf_version']; ?></td>
												</tr>
											<?php	$i=$i+1; } } ?>
									</tbody>
								</table>

								<table id = "pp_pdf_table" class="table table-hover table-bordered table-striped">
									<thead class="tablehead">
										<tr>
											<th>Sr. No.</th>
											<th>Applicant Id</th>
											<th>Approved Date</th>
											<th>Report. | Pdf</th>
											<th>Version</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$i=0;
											if (!empty($appl_array_pp)) {

												foreach ($appl_array_pp as $each) { ?>

												<tr>
													<td><?php echo $i+1;?></td>
													<td id="customer_id<?php echo $i; ?>"><?php echo $each['customer_id'];?></td>
													<td id="customer_id<?php echo $i; ?>"><?php echo $each['on_date'];?></td>
													<td><?php $report_pdf_path = explode("/",$each['report_pdf']);
															$report_pdf_name = $report_pdf_path[count($report_pdf_path) - 1]; ?>

														<a target="_blank" href="<?php echo $each['report_link']; ?>">
															<?php echo 'View'; ?>
														</a>
														|
														<a target="_blank" href="<?php echo $each['report_pdf']; ?>">
															<?php echo 'Pdf'; ?>
														</a>
													</td>
													<td><?php echo $each['pdf_version']; ?></td>
												</tr>
											<?php	$i=$i+1; } } ?>
									</tbody>
								</table>

								<table id = "lab_pdf_table" class="table table-hover table-bordered table-striped">
									<thead class="tablehead">
										<tr>
											<th>Sr. No.</th>
											<th>Applicant Id</th>
											<th>Approved Date</th>
											<th>Report. | Pdf</th>
											<th>Version</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$i=0;
											if (!empty($appl_array_lab)) {

												foreach ($appl_array_lab as $each) { ?>

												<tr>
													<td><?php echo $i+1;?></td>
													<td id="customer_id<?php echo $i; ?>"><?php echo $each['customer_id'];?></td>
													<td id="customer_id<?php echo $i; ?>"><?php echo $each['on_date'];?></td>
													<td><?php $report_pdf_path = explode("/",$each['report_pdf']);
															$report_pdf_name = $report_pdf_path[count($report_pdf_path) - 1]; ?>

														<a target="_blank" href="<?php echo $each['report_link']; ?>">
															<?php echo 'View'; ?>
														</a>
														|
														<a target="_blank" href="<?php echo $each['report_pdf']; ?>">
															<?php echo 'Pdf'; ?>
														</a>
													</td>
													<td><?php echo $each['pdf_version']; ?></td>
												</tr>
										<?php	$i=$i+1; } } ?>
									</tbody>
								</table>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
				</section>
			</div>
		</div>
	</section>
</div>


<?php echo $this->Form->end(); ?>
<?php echo $this->Html->script('othermodules/application_pdf_rti'); ?>
