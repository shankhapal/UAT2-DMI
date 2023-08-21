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

					
									<div class="form-horizontal border">
										<div class="card-body">
												<div class="row">
														<div class="col-md-3">
																<div class="form-group row">
																		<label for="field3" class="col-sm col-form-label">
																			<span>
																				<?php
																					if ($_SESSION['current_level'] == 'level_2'
																					 && $application_mode == 'edit' )
																					 {echo 'Other Upload Docs'; }
																					else { echo 'Other Upload Docs'; }
																					?>
																				</span>
																		</label>

																				<span class="float-left">
																					<?php if ($_SESSION['current_level'] == 'level_2'
																					&& $application_mode == 'edit'
																					&& empty($section_form_details[0]
																					['other_upload_docs']))
																					{ echo 'Attach docs'; }else{ echo 'Attached docs'; } ?> :
																				<?php
																				if (!empty($section_form_details[0]['other_upload_docs'])) { ?>
																						<a id="other_upload_docs_value"
																						target="blank"
																						href="<?php
																						echo str_replace("D:/xampp/htdocs","",
																						$section_form_details[0]
																						['other_upload_docs']);
																						?>">
																						<?=$str2 = substr(array_values(array_slice((explode("/",$section_form_details[0]
																						['other_upload_docs'])), -1))[0],23);?></a>
																				<?php }else{ echo "No Document Provided" ;} ?>
																		</div>
																</div>
																<div class="col-md-3">
																		<div class="form-group row">
																				<div class="custom-file col-sm">
																							<input
																							type="file" name="other_upload_docs"
																							class="form-control" id="other_upload_docs" multiple='multiple'>
																							<span id="error_other_upload_docs" class="error invalid-feedback"></span>
																							<span id="error_type_other_upload_docs" class="error invalid-feedback"></span>
																							<span id="error_size_other_upload_docs" class="error warning"></span>
																					</div>
																		</div>
																			<p class="lab_form_note float-right mt-3">
																				<i class="fa fa-info-circle"></i> File type: PDF, jpg &amp; max size upto 2 MB</p>
														</div>
										</div>
								</div>
						</div>
             

      </div>
    </div>
  <?php
		echo $this->Html->script('element/application_forms/bgr/commodity_wise_report_crud');
    echo $this->Html->script('element/application_forms/bgr/commodity_wise_report_form_script');
    echo $this->Html->css('element/application_forms/bgr/bianually_report_style');
		echo $this->Html->script('element/application_forms/bgr/bgr_file_uploads_validation');
  ?>
