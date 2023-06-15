<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6"><?php echo $this->Html->link('Back', array('controller' => 'dashboard', 'action'=>'home'),array('class'=>'add_btn btn btn-secondary')); ?></div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><?php echo $this->Html->link('Dashboard', array('controller' => 'dashboard', 'action'=>'home')); ?></li>
					<li class="breadcrumb-item active">Finalized Test Reports</li>
				</ol>
			</div>
		</div>
	</div>

	<section class="content form-middle">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php echo $this->Form->create(null,array('class'=>'form-group')); ?>
						<div class="card card-primary">
							<div class="card-header"><h3 class="card-title-new">LIMS Reports</h3></div>
							<div class="card-body">
								<div class="col-md-12 radio_options">
									<label class="radio-inline "><input class="type validate[required] radio" type="radio" id="type"  name="type" value="A" checked="checked"> Pending Reports</label>
									<label class="radio-inline "><input class="type validate[required] radio" type="radio" id="type" name="type" value="B"> Scrutinized Report</label>
								</div>
								<div class="clear"></div>

								<!-- list of sample to allocate for test -->
								<div id="A_list">
									<p class="alert">NOTE :: This is a list of the finalized reports from LIMS that are currently awaiting further processing, including attachment of packer, optional allocation, scrutiny, or action-taking. </p>
									<h3 class="card-title-new text-bold">Pending Reports</h3>
									<table id="pending_report_table"  class="table table-bordered table-hover table-striped table-sm">
										<thead class="tablehead">
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
										<tbody>
											<?php
											if (!empty($final_reports)) {
												$sr_no = 1;
												foreach ($final_reports as $each) {
										
													if ($each['report_status'] == 'Packer Attached') {
														$status = 'Packer is Attached';
													}elseif ($each['report_status'] == 'Allocated'){
														$status = 'This Report is Allocated to Scrutinizer.';
													}elseif($each['report_status'] == 'MO Replied'){
														$status = 'Scrutinizer Replied on this Report.';
													}elseif ($each['report_status'] == 'Showcause'){
														$status = 'Showcause Notice Sent';
													}elseif ($each['report_status'] == 'RO Replied') {
														$status = 'Refferred Back to the Scrutinizer.';
													}
													else{
														$status = 'N/A';
													}
													?>
												<tr>
													<td><?php echo $sr_no; ?></td>
													<td><?php echo $each['org_sample_code']; ?></td>
													<td><?php echo date('d-m-Y', strtotime($each['tran_date'])); ?></td>
													<td><?php echo $each['category_name']; ?></td>
													<td><?php echo $each['commodity_name']; ?></td>
													<td><?php echo $each['sample_type_desc']; ?></td>
													<td><?php echo $status; ?></td>
													<td><?php 
															if (
																$each['report_status'] != 'Allocated' && 
																$each['report_status'] != 'Scrutinized' && 
																$each['report_status'] != 'Showcause' && 
																$each['report_status'] != 'RO Replied'
															) {
																echo $this->Html->link(
																	'',
																	['controller' => 'misgrading', 'action' => 'redirectToAllocate', $each['org_sample_code'], 'level_3', 'edit'],
																	['class' => 'fas fa-long-arrow-alt-right', 'title' => 'Scrutiny Report']
																);
															} else {
																echo $this->Html->link(
																	'',
																	['controller' => 'misgrading', 'action' => 'redirectToAllocate', $each['org_sample_code'], 'level_3', 'view'],
																	['class' => 'fas fa-eye', 'title' => 'View']
																);
															}
															
														?>
													</td>
												</tr>
											<?php $sr_no++; } } ?>
										</tbody>
									</table>
								</div>

								<!-- list of sample to Forward to lab incharge -->
								<div id="B_list">
									<p class="alert">NOTE :: This is a list of reports that have been scrutinized by the office in-charge and found to have no issues. </p>
									<h3 class="card-title-new text-bold">Scrutinized Reports</h3>
									<table id="scrutinized_report_table"  class="table table-bordered table-hover table-striped">
										<thead class="tablehead">
											<tr>
												<th>Sr No</th>
												<th>Customer ID</th>
												<th>Sample Code</th>
												<th>Date</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (!empty($scrutinyDone)) {
												$sr_no = 1;
												foreach ($scrutinyDone as $each) { ?>
												<tr>
													<td><?php echo $sr_no; ?></td>
													<td><?php echo $each['customer_id']; ?></td>
													<td><?php echo $each['sample_code'];  ?></td>
													<td><?php echo $each['date'];  ?></td>
												</tr>
											<?php $sr_no++; } } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php echo $this->Html->script('misgrading/report_listing_for_allocation'); ?>