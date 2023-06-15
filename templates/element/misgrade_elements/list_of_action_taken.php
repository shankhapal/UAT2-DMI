<?php echo $this->Form->create(); ?>
<div class="form-horizontal">
	<table id="list_of_action_taken" class="table table-striped table-bordered table-sm w100 caption-top">
		<label>List of Firms For Which Action is Taken</label>
		<thead class="table-dark">
			<tr>
				<th>Sr.No</th>
				<th>Applicant ID</th>
				<th>Firm Name</th>
				<th>Actions Taken</th>
				<th>Details</th>
				
		</thead>
		<tbody>
			<?php 
			$sr_no=1; 
			if (!empty($actionTaken)) {
				foreach($actionTaken as $eachdata){ ?>
				<tr>
					<td><?php echo $sr_no;?></td>
					<td><?php echo $eachdata['customer_id']; ?></td>
					<td><?php echo $eachdata['firm_name']; ?></td>
					<td>
						<?php
							if($eachdata['is_suspended'] != null && $eachdata['is_suspended'] == "Yes") { 
								echo "This Firm is Suspended ";
							} elseif ($eachdata['is_cancelled'] != null && $eachdata['is_cancelled'] == "Yes") {
								echo "This Firm is Cancelled";
							}
						?>
					</td>
					<td>
						<?php
							echo $eachdata['misgrade_level_name']. "&" . $eachdata['misgrade_category_name']. "For Period :" . $eachdata['time_period'];
						?>
					</td>
					<td><?php //    echo $this->Html->link('', array('controller' => 'othermodules', 'action'=>'fetchIdForAction', $eachdata['id']),array('class'=>'fas fa-eye','title'=>'View')); ?></td>
				</tr>
			<?php $sr_no++; } } ?>
		</tbody>
	</table>
</div>
<?php 
	echo $this->Form->end(); 
	echo $this->Html->script('misgrading/list_of_action_taken');
?>
