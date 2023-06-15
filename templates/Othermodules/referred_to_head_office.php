<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6"><?php echo $this->Html->link('Back', array('controller' => 'dashboard', 'action' => 'home'), array('class' => 'add_btn btn btn-secondary')); ?>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><?php echo $this->Html->link('Dashboard', array('controller' => 'dashboard', 'action' => 'home')); ?></li>
					<li class="breadcrumb-item active">Misgrade Reports</li>
				</ol>
			</div>
		</div>
	</div>
	<section class="content form-middle">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-header"><h3 class="card-title-new">Misgrade Reports Reffered to Head Office</h3></div>
						<div class="form-horizontal">
							<div class="card-body">
								<table id="allocation_table" class="table table-striped table-hover table-sm table-bordered">
									<caption>Misgrade Reports Reffered to Head Office</caption>
									<thead class="tableHead">
										<tr>
											<th>Sr No</th>
											<th>Customer ID</th>	
											<th>Forwarded By</th>	
											<th>Misgrade Category</th>	
											<th>Misgrade Level</th>	
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody class="tableBody">
										<?php

										if (isset($referDetails)) {
											$i = 0;
											foreach ($referDetails as $each) :
												$i++;
											?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $each['customer_id'] ?></td>
												<td>
													<?php 
														echo $each['by_user'] . "<br> <p class='badge'>". $each['office_details'][1]." - " .$each['office_details'][0];

													?>
												</td>
												<td><?php echo $each['misgrade_category_name'] ?></td>
												<td><?php echo $each['misgrade_level_name'] ?></td>
												<td>
													<?php 
														$date = $each['modified'];
														$dateTime = DateTime::createFromFormat('d/m/Y H:i:s', $date);
														$forwarded_date = $dateTime->format('d/m/Y');
														echo $forwarded_date;
													?>
												</td>
												<td>
													<?php 
													if ($each['available_to'] == 'ho') {
														echo $this->Html->link(
															'',
															['controller' => 'Othermodules', 'action' => 'communicationWithHeadOffice', '?' => ['id' => $each['id'], 'customer_id' => $each['customer_id'],'current_level' => 'level_4','mode' => 'edit']],
															['class' => 'fas fa-long-arrow-alt-right', 'title' => 'Edit']
														); 
														
													}else{
														echo $this->Html->link(
															'',
															['controller' => 'Othermodules', 'action' => 'communicationWithHeadOffice', '?' => ['id' => $each['id'], 'customer_id' => $each['customer_id'],'current_level' => 'level_4','mode' => 'view']],
															['class' => 'fas fa-eye', 'title' => 'View']
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