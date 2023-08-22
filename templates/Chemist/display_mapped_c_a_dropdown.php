
	<?php
  define('INPUT_FIELD_CLASSES', 'form-control input-field');
  $class1 = INPUT_FIELD_CLASSES;
  ?>
	<section class="content form-middle">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8">
					<?php echo $this->Form->create(null,(array(
        'id' => 'mappedca',
        'url' => array('controller' => 'application', 'action' => 'application-type', 11),
        'method' => 'POST'
    ))); ?>
						<div class="card card-secondary mt-5">
							<div class="card-header"><h3 class="card-title-new">Select Packer</h3></div>
							<div class="form-horizontal">
								<div class="card-body">
									<div class="form-group row">
										<label for="inputEmail3" class="col-sm-3 col-form-label">Select Packer <span class="cRed">*</span></label>
										<div class="col-sm-6">
											<?php echo $this->Form->control('packerlist[]', array(
                        'type'=>'select',
                        'empty'=>'Select Packer',
                        'id'=>'packerlist',
                        'options'=>$alloted_chemist,
                        'label'=>false,
                        'class'=>$class1,
                        )); ?>
											<span id="error_oldpass" class="error invalid-feedback"></span>
										</div>
									</div>
								<div class="card-footer cardFooterBackground">
                  <?php echo $this->Form->control('Submit', array('type'=>'submit', 'name'=>'submit', 'label'=>false,'class'=>'btn btn-success ')); ?>

                  <!-- <a id="next_btn" class="btn btn-success" href="<?php //echo $this->request->getAttribute('webroot');?>application/application-type/11">Processed</a> -->
								</div>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</section>
</div>

<?php echo $this->Html->script('Common/change_password'); ?>
