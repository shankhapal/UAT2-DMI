
<?php echo $this->Form->create(null,array('type'=>'file', 'enctype'=>'multipart/form-data', 'id'=>$section)); ?>
	<div id="form_outer_main" class="col-md-12 form-middle">
		<h5 class="mt-1 mb-2 tacfw700">Analysis of Food Safety Parameters</h5>
			<div id="form_inner_main" class="card card-success">
					<div class="card-header"><h3 class="card-title">Details of Analysis of Food Safety Parameters Done from NABL Accredited Laboratory During..........</h3></div>
						 <div class="tank_table form-horizontal " >
							<div class="card-body">
								<? echo $year; ?>
                    <!-- call table view form element with ajax call -->
										<?php echo $this->element('application_forms/bgr/analysis_table/analysis_food_safety_form_tbl'); ?>
                </div>
						</div>
         </div>
    </div>
<?php echo $this->Html->script('element/application_forms/bgr/analysis_food_safety_form'); ?>
