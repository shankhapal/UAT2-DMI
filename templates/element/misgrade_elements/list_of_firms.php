<?php echo $this->Form->create(); ?>
<div class="form-horizontal">
	<table id="list_of_firms" class="table caption-top table-striped table-bordered table-sm w100">
		<label>List of Firms Under this Office</label>
		<thead class="table-dark">
			<tr>
				<th>Sr.No</th>
				<th>Packer ID</th>
				<th>Sample Code</th>
				<th>Firm Name</th>
				<th>Firm Contact</th>
				<th>Commodity</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$sr_no=1; 
			foreach($underThisOffice as $eachdata){ ?>
			<tr>
				<td><?php echo $sr_no;?></td>
				<td><?php echo $eachdata['customer_id']; ?></td>
				<td><?php echo $eachdata['sample_code']; ?></td>
				<td><?php echo $eachdata['firm_name']; ?></td>
				<td>
					<?php echo "<span class='badge'>Mobile:</span>".base64_decode($eachdata['mobile_no']); ?>
					<br>
					<?php echo "<span class='badge'>Email:</span>".base64_decode($eachdata['email']); ?>
				</td>
				<td><?php echo $eachdata['commodity_name']; ?></td>
				<td>
					<?php 
						if ($eachdata['action_final_submit_status'] == 'submitted') {
							if ($eachdata['ho_stats'] == 'ro') {
								echo 'Head Office Replied';
							} elseif ($eachdata['ho_stats'] == 'ho') {
								echo 'Refferred to Head Office';
							} else {
								echo 'Action Final Submitted';
							}
							
						} else {
							if ($eachdata['showcause_status'] == 'sent') {
								echo 'The Showcause notice is sent to the packer.';
							} elseif ($eachdata['showcause_status'] == 'replied') {
								echo 'Applicant has been replied to issued Showcause notice';
							} elseif ($eachdata['showcause_status'] == 'ref_back') {
								echo 'Refferred Back on the issued Showcause notice';
							} 
							else {
								echo 'N/A';
							}
						}
					?>
				</td>
				<td>
					<?php //Check if the Values 
					//check if the action is final submitted 
					if ($eachdata['action_final_submit_status'] !== null && $eachdata['action_final_submit_status'] == 'submitted') { 

						if ($eachdata['ho_stats'] =='ro') {
							
							echo $this->Html->link(
								'', 
								['controller' => 'othermodules', 'action'=>'communicationWithHeadOffice','?' => ['id' => $eachdata['id'], 'customer_id' => $eachdata['customer_id'],'sample_code' => $eachdata['sample_code'],'current_level' => 'level_3','mode'=>'edit']],
								['class'=>'fas far fa-eye','title' => 'View']
							); 
						}
						elseif ($eachdata['ho_stats'] =='ho') {
							
							echo $this->Html->link(
								'', 
								['controller' => 'othermodules', 'action'=>'communicationWithHeadOffice','?' => ['id' => $eachdata['id'], 'customer_id' => $eachdata['customer_id'],'sample_code' => $eachdata['sample_code'],'current_level' => 'level_3','mode'=>'view']],
								['class'=>'fas far fa-eye','title' => 'View']
							);

						} else {
							echo $this->Html->link(
								'', 
								['controller' => 'othermodules', 'action'=>'fetchIdForAction','?' => ['id' => $eachdata['id'], 'customer_id' => $eachdata['customer_id'],'sample_code' => $eachdata['sample_code']]],
								['class'=>'fas far fa-eye','title' => 'View']
							); 
						}

						
					} else {

						if ($eachdata['showcause_status'] =='sent' || $eachdata['showcause_status'] == 'ref_back') {
							
							$link1 = '<a href="' . $this->Url->build(['controller' => 'Othermodules','action' => 'fetchIdForAction','?' => ['id' => $eachdata['id'],'customer_id' => $eachdata['customer_id'],'sample_code' => $eachdata['sample_code']]]) . 
							'" class="fas fad fa-exclamation-triangle" title="Take Action"></a>';
							
							$divider = ' | ';
							
							$link2 = '<a href="' . $this->Url->build(['controller' => 'othermodules','action' => 'fetchIdForShowcause','?' => ['id' => $eachdata['showcause_table_id'],'customer_id' => $eachdata['customer_id'],'sample_code' => $eachdata['sample_code'],'scn_mode' => 'view']]) . 
							'" class="fas far fa-eye" title="View Sent Cause Notice"></a>';
							
							echo $link1 . $divider . $link2;

						} elseif ($eachdata['showcause_status'] =='replied') {

							echo $this->Html->link(
								'', 
								['controller' => 'othermodules', 'action'=>'fetchIdForShowcause','?' => ['id' => $eachdata['showcause_table_id'], 'customer_id' => $eachdata['customer_id'],'sample_code' => $eachdata['sample_code'],'scn_mode'=>'replied','action_table_id' => $eachdata['id']]],
								['class'=>'fas far fa-eye','title' => 'View Sent Cause Notice']
							); 

						}
						else {

							$link1 = '<a href="' . $this->Url->build(['controller' => 'Othermodules','action' => 'fetchIdForAction','?' => ['id' => $eachdata['id'],'customer_id' => $eachdata['customer_id'],'sample_code' => $eachdata['sample_code']]]) . 
							'" class="fas fad fa-exclamation-triangle" title="Take Action"></a>';
							
							$divider = ' | ';
							
							$link2 = '<a href="' . $this->Url->build(['controller' => 'othermodules','action' => 'fetchIdForShowcause','?' => ['id' => $eachdata['id'],'customer_id' => $eachdata['customer_id'],'sample_code' => $eachdata['sample_code'],'scn_mode' => 'edit']]) . 
							'" class="fas fa-file-export" title="Send Showcause Notice"></a>';
							
							echo $link1 . $divider . $link2;
						}
					}
						
						
					?>

				</td>
			</tr>
			<?php $sr_no++; } ?>
		</tbody>
	</table>
</div>
<?php 
	echo $this->Form->end(); 
	echo $this->Html->script('misgrading/list_of_firms');

?>
