<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6"><?php echo $this->Html->link('Back', array('controller' => 'dashboard', 'action' => 'home'), array('class' => 'add_btn btn btn-secondary')); ?>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><?php echo $this->Html->link('Dashboard', array('controller' => 'dashboard', 'action' => 'home')); ?></li>
					<li class="breadcrumb-item active">Finalized Test Reports</li>
				</ol>
			</div>
		</div>
	</div>
	
	<section class="content form-middle">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-header"><h3 class="card-title-new">Finalized Test Reports</h3></div>
						<div class="form-horizontal">
							<div class="col-sm-12">
								<div class="col-sm-6 offset-4 mt-4 row">
									<div class="custom-control custom-radio">
										<input class="custom-control-input" type="radio" id="pending_report" name="report_type" checked>
										<label class="custom-control-label" for="pending_report">Pending Reports</label>
									</div>
									<div class="custom-control custom-radio ml-2">
										<input class="custom-control-input" type="radio" id="scrutinized_report" name="report_type">
										<label class="custom-control-label" for="scrutinized_report">Scrutinized Report</label>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div id="pending_report_table">

									<p class="alert">NOTE :: This is a list of the finalized reports from LIMS that are currently awaiting further processing, including attachment of packer, optional allocation, scrutiny, or action-taking. </p>
									<h3 class="card-title-new text-bold">Pending Reports</h3>
									<table class="table table-striped table-sm table-hover table-bordered">
									<caption>Pending Reports</caption>
										<thead class="tableHead">
											<tr>
												<th>Sr No</th>
												<th>Sample Code</th>
												<th>Finalized Date</th>
												<th>Category</th>
												<th>Commodity</th>
												<th>Sample Type</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody class="tableBody">
										<?php
											if (isset($final_reports)) {
												$i = 0;
												foreach ($final_reports as $each) :
													$i++;

													if ($each['packer_attached'] == null && $each['action_final_submit'] == null && $each['scrutiny_status']) {
														$status = 'N/A';
													}else{
														if ($each['packer_attached'] == 'Y') {
															$status = 'Packer is Attached';
														}elseif ($each['scrutiny_status'] == 'Yes') {
															$status = 'N/A';
														}else {
															$status = 'N/A';
														}
													}
													?>

													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $each['org_sample_code']; ?></td>
														<td><?php echo date('d-m-Y', strtotime($each['tran_date'])); ?></td>
														<td><?php echo $each['category_name']; ?></td>
														<td><?php echo $each['commodity_name']; ?></td>
														<td><?php echo $each['sample_type_desc']; ?></td>
														<td><?php echo $status; ?></td>
														<td><?php /* echo $this->Html->link(
																'',
																['controller' => 'misgrading', 'action' => 'redirectToAllocate', $each['org_sample_code'], 'level_3','view'],
																['class' => 'fas fa-eye', 'title' => 'Scrutiny Report']
															); */?> 
															<?php echo $this->Html->link(
																'',
																['controller' => 'misgrading', 'action' => 'redirectToAllocate', $each['org_sample_code'], 'level_3','edit'],
																['class' => 'fas fa-long-arrow-alt-right', 'title' => 'Scrutiny Report']
															); ?>
														</td>
													</tr>
													<?php
												endforeach;
											}
											?>

										</tbody>
									</table>
								</div>

								<div id="scrutinized_report_table">
									<p class="alert">NOTE :: This is a list of reports that have been scrutinized by the office in-charge and found to have no issues. </p>
									<h3 class="card-title-new text-bold">Scrutinized Reports</h3>
									<table class="table table-striped table-hover table-sm table-bordered">
									<caption>Scrutinized Reports</caption>
										<thead class="tableHead">
											<tr>
												<th>Sr No</th>
												<th>Sample Code</th>
												<th>Finalized Date</th>
												<th>Category</th>
												<th>Commodity</th>
												<th>Sample Type</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody class="tableBody">
											<?php

											if (isset($scrutinyDone)) {
												$i = 0;
												foreach ($scrutinyDone as $each) :
													$i++; ?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $each['org_sample_code']; ?></td>
														<td><?php echo $each['sample_type_desc'] ?></td>
														<td><?php echo $this->Html->link(
																'',
																['controller' => 'misgrading', 'action' => 'redirectToAllocate', $each['org_sample_code'], 'level_3'],
																['class' => 'fas fa-long-arrow-alt-right', 'title' => 'Scrutiny Report']
															); ?>
														</td>
													</tr>
											<?php endforeach; } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php echo $this->Html->script('misgrading/report_listing_for_allocation'); ?>