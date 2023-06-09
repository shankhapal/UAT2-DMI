<?php ?>
<?php echo $this->Form->create(null, array()); ?>
	<div class="card card-info">
		<div class="card-header"><h3 class="card-title-new">List of Suspended Firms</h3></div>
		<table id="suspended_firms" class="table m-0 table-bordered table-striped table-hover">
			<thead class="tablehead">
				<tr>
					<th>Sr. No.</th>
					<th>Firm Name</th>
					<th>Firm Contact</th>
					<th>Applicant Id</th>
					<th>Suspended Date</th>
					<th>Time Period</th>
					<th>Cert. Pdf</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$i=0;
					if (!empty($suspended_firms)) {

						foreach ($suspended_firms as $each) { ?>

						<tr>
							<td><?php echo $i+1;?></td>
							<td><?php echo $each['firm_name'];?></td>
							<td>
								<?php echo "<span class='badge'>Mobile:</span>".base64_decode($each['mobile_no']); ?>
								<br>
								<?php echo "<span class='badge'>Email:</span>".base64_decode($each['email']); ?>
							</td>
							<td><?php echo $each['customer_id'];?></td>
							<td>
								<?php 
									$date = $each['from_date'];
									$from_date = DateTime::createFromFormat('d/m/Y H:i:s', $date)->format('d/m/Y');
									echo $from_date;
								?>
							</td>
							<td>
								
								<?php echo $each['time_period']; ?>
								<br>
								<?php 
									$date = $each['from_date'];
									$from_date = DateTime::createFromFormat('d/m/Y H:i:s', $date)->format('d/m/Y');
									echo "<span class='badge'>From:" .$from_date. "</span>";
								?>
								<br>
								<?php 
									$date = $each['to_date'];
									$to_date = DateTime::createFromFormat('d/m/Y H:i:s', $date)->format('d/m/Y');
									echo "<span class='badge'>To:" .$to_date. "</span>";
								?>
							</td>
							<td><?php $cert_pdf_path = explode("/",$each['pdf_file']);
										$cert_pdf_name = $cert_pdf_path[count($cert_pdf_path) - 1]; ?>
										<a id="pdf_link<?php echo $i; ?>" target="_blank" href="<?php echo $each['pdf_file']; ?>">
										<?php echo 'Certificate'; ?>
									</a>
							</td>
						</tr>
						<?php	$i=$i+1;
						}
					} 
				?>
			</tbody>
		</table>
	</div>
<?php echo $this->Form->end(); ?>
<?php echo $this->Html->script('othermodules/list_of_suspended_firms'); ?>
