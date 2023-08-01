<?php
	echo $this->Html->css('../multiselect/jquery.multiselect');
	echo $this->Html->script('../multiselect/jquery.multiselect');
?>

<?php echo $this->Form->create(null,array('type'=>'file', 'enctype'=>'multipart/form-data', 'id'=>$section)); ?>
	<div id="form_outer_main" class="col-md-12">
		<h5 class="mt-1 mb-2 tacfw700">Commodity wise Grading Data Entery Form</h5>
			<div id="form_inner_main" class="card card-success">
					<div class="card-header"><h3 class="card-title">Commodity wise Grading Data Entery Form</h3></div>
						 <div class="tank_table form-horizontal " >
							<div class="card-body">
                   <!-- call table view form element with ajax call -->
										<?php echo $this->element('application_forms/bgr/analysis_table/commodity_wise_reports_form_tbl'); ?>
                </div>
						</div>
         </div>
    </div>
		
  <?php
		echo $this->Html->script('element/application_forms/bgr/commodity_wise_report_crud');
    echo $this->Html->script('element/application_forms/bgr/commodity_wise_report_form_script');
    echo $this->Html->css('element/application_forms/bgr/bianually_report_style');
  ?>
