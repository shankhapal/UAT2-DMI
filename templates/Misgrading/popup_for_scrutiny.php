<?php 
echo $this->Html->css('dashboard/allocation-common-tabs-css'); 
?>

<div id="scrutiny_alloction_Modal" class="modal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<?php if($allocted=='not_allocated'){ ?>
					<h4 class="modal-title">LIMS Report Allocation for Scrutiny</h4>
				<?php }else{ ?>
					<h4 class="modal-title">LIMS Report Re-allocation for Scrutiny</h4>
				<?php } ?>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
			<p class="text-light bg-dark">Note: If your scrutinizer does not have the role permission "Allocation of LIMS Reports," it will not appear in the dropdown. In such a case, please contact the administrator and request the appropriate role assignment.</p>

				<?php echo $this->Form->create(null,array('id'=>'common_scrutiny_allocation_form')); ?>
					<table id="scrutiny-alloc-table" class="table table-striped table-bordered wd100">
						<thead>
							<tr>
								<th>Sample Code</th>
								<th>Packer ID</th>
								<th>Scrutiny Officers</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $this->Form->control('sample_code',array('type'=>'text', 'id'=>'sample_code', 'value'=>$sample_code, 'label'=>false, 'readonly'=>true)); ?></td>
								<td><?php echo $this->Form->control('customer_id',array('type'=>'text', 'id'=>'customer_id', 'value'=>$customer_id, 'label'=>false, 'readonly'=>true)); ?></td>
								<td><?php echo $this->Form->control('mo_users_list', array('type'=>'select', 'id'=>'mo_users_list', 'options'=>$mo_users_list,'label'=>false, 'empty'=>'--Select--', 'required'=>true));
								//echo $this->Form->control('mo_users_list',array('type'=>'select', 'id'=>'mo_users_list', 'options'=> $mo_users_list, 'label'=>false,)); ?></td>
								<td>
									<?php if($allocted=='not_allocated'){ ?>
										<a href="#" class="allocate_btn"  id="scrutiny_allocate_btn">Allocate</a>
										
									<?php }else{ ?>
										<a href="#" class="allocate_btn"  id="scrutiny_allocate_btn">Reallocate</a>
									<?php } ?>
								</td>
							</tr>
						</tbody>
					</table>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>

<?php 
	//commented script call, now all script is in common-count-js.js file as function call, changed on 21-10-2021 by Amol
	//echo $this->Html->script('dashboard/scrutiny-alloc-js'); 
	exit; //intensionally added exit; on 07-10-2021 by Amol, as CSRF blocking the next request after rendering the view through ajax 
?>	
