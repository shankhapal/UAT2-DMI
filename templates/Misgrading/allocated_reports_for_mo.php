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
						<div class="card-header"><h3 class="card-title-new">Allocated Reports</h3></div>
						<div class="form-horizontal">
							<div class="card-body">
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
												<td><?php echo $each['sample_code']; ?></td>
												<td><?php echo $each['customer_id'] ?></td>
												<td><?php echo $each['DmiUsers']['f_name']. " ".$each['DmiUsers']['l_name'] ?></td>
												<td>
													<?php 
														if ($each['available_to'] == null) {
															echo 'N/A';
														} else {
															if ($each['available_to'] == 'ro') {
																echo 'Replied to RO';
															} elseif ($each['available_to'] == 'mo') {
																echo 'N/A';
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