<?php
	echo $this->Html->css('../multiselect/jquery.multiselect');
	echo $this->Html->script('../multiselect/jquery.multiselect');
?>

<?php echo $this->Form->create(null,array('type'=>'file', 'enctype'=>'multipart/form-data', 'id'=>$section)); ?>
	<div id="form_outer_main" class="col-md-12 form-middle">
		<h5 class="mt-1 mb-2 tacfw700">Commodity wise Grading Data Entery Form</h5>
			<div id="form_inner_main" class="card card-success">
					<div class="card-header"><h3 class="card-title">Commodity wise Grading Data Entery Form</h3></div>
						 <div class="tank_table form-horizontal " >
							<div class="card-body">
                   <!-- call table view form element with ajax call -->
										<?php echo $this->element('application_forms/bgr/analysis_table/commodity_wise_reports_form_tbl'); ?>
								
                </div>
						</div>

					
									
             
						<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Help</h5>
										</div>
										<div class="modal-body">
											<div class="note">
											<div class="note">
												<p class="important"><strong>Note for Users:</strong> </p>
												<h5>Food Safety Parameters Report System</h5>
												<p>This system follows specific criteria for displaying certain fields based on the laboratory's NABL accreditation status.</p>
													<p>If the laboratory is not NABL accredited, then the system is not allowed to enter data of food safety parameters report. The system will not display fields:</p>
											<ul>
													<li>"Name of Laboratory which tested the sample"</li>
													<li>"Report no. and Date"</li>
													<li>"Remarks"</li>
											</ul>
											<p>When the laboratory is NABL accredited, the system will display these fields.</p>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>

      </div>
    </div>
  <?php
		echo $this->Html->script('element/application_forms/bgr/commodity_wise_report_crud');
    echo $this->Html->script('element/application_forms/bgr/commodity_wise_report_form_script');
		echo $this->Html->script('element/application_forms/bgr/bgr_calculation');
    echo $this->Html->css('element/application_forms/bgr/bianually_report_style');
		echo $this->Html->script('element/application_forms/bgr/bgr_file_uploads_validation');
		echo $this->Html->script('element/application_forms/bgr/bgr_replica_allotment_validation');
		
  ?>
