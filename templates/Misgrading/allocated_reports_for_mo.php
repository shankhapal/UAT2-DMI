<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6"><span class="badge badge-success">Management of Misgrading</span></div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><?php echo $this->Html->link('Dashboard', array('controller' => 'dashboard', 'action' => 'home')); ?></li>
					<li class="breadcrumb-item active">Allocated LIMS Reports</li>
				</ol>
			</div>
		</div>
	</div>
	
	<section class="content form-middle">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-header"><h3 class="card-title-new">Allocated Reports</h3></div>
						<div class="form-horizontal">
							<div class="card-body">
								<p>NOTE :: These LIMS reports have been assigned to you for review. 
										provide any necessary comments or feedback.
								</p>
								<table id="allocation_table" class="table table-striped table-hover table-sm table-bordered">
								<caption>Allocated Reports</caption>
									<thead class="tableHead">
										<tr>
											<th>Sr No</th>
											<th>Sample Code</th>
											<th>Packer ID</th>	
											<th>Allocated By</th>	
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody class="tableBody">
										<?php

										if (isset($allocationDetails)) {
											$i = 0;
											foreach ($allocationDetails as $each) :
												$i++;
											?>
											<tr>
												<td><?php echo $i; ?></td>
												<td>
													<?php 
														echo $each['sample_code'] ."<br>".
														"[For Commodity : ". $each['MCommodity']['commodity_name'] ."]"; 
													?>
												</td>
												<td>
													<?php 
														echo $each['customer_id'] ."<br>".
														"Firm Name : ". $each['DmiFirms']['firm_name'] ."<br>".
														"Email :	". base64_decode($each['DmiFirms']['email']) .""; 
													?>
													</td>
												<td>
													<?php 
														echo $each['DmiUsers']['f_name']. " ".$each['DmiUsers']['l_name'] ."<br>".
														"Office :	"	. $each['DmiRoOffices']['office_type'] . " 	" . $each['DmiRoOffices']['ro_office'] ."<br>".
														"Email :	"	. base64_decode($each['DmiUsers']['email']) .""; 
													?>
												</td>
												<td>
													<?php 
														if ($each['available_to'] == null) {
															echo 'N/A';
														} else {
															if ($each['SampleInward']['report_status'] == 'RO Replied') {
																echo 'RO refferred back on this report';
															} elseif ($each['SampleInward']['report_status'] == 'MO Replied') {
																echo 'You Replied to RO';
															}
														}
													 ?>
												</td>
												<td>
													<?php 
													if ($each['available_to'] == 'ro') {
														echo $this->Html->link(
															'',
															['controller' => 'misgrading', 'action' => 'redirectToAllocate', $each['sample_code'], 'level_1','view'],
															['class' => 'fas fa-eye', 'title' => 'View']
														); 
													}else{
														echo $this->Html->link(
															'',
															['controller' => 'misgrading', 'action' => 'redirectToAllocate', $each['sample_code'], 'level_1','edit'],
															['class' => 'fas fa-long-arrow-alt-right', 'title' => 'Edit']
														); 
													}
													?> 
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
	</section>
</div>
<?php echo $this->Html->script('misgrading/allocated_reports_for_mo'); ?>