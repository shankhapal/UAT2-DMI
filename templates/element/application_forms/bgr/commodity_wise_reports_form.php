<?php

	echo $this->Html->css('../multiselect/jquery.multiselect');
	echo $this->Html->script('../multiselect/jquery.multiselect');
?>

<?php echo $this->Form->create(null,array('type'=>'file', 'enctype'=>'multipart/form-data', 'id'=>$section)); ?>
	<div id="form_outer_main" class="col-md-12 form-middle">
		<?php if($section_form_details[0]['form_status'] === "approved"){?>
			<h5 class="mt-1 mb-2 tacfw700">Report Download Section</h5>
		<?php }else{ ?>
				
        		<h5 class="mt-1 mb-2 tacfw700 header-text">Commodity wise Grading Data Entry Form</h5>
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary downloadButton" data-toggle="modal"  data-target="#exampleModal">
							Help
						</button>
		<?php } ?>
			<div id="form_inner_main" class="card card-success">
					<div class="card-header">
						<?php if($section_form_details[0]['form_status'] === "approved"){?>
							<h3 class="card-title">Note: Your Report is Already Applied</h3>
						<?php }else{ ?>
								<h3 class="card-title">Commodity wise Grading Data Entery Form</h3>
						<?php } ?>
						
					</div>
						 <div class="tank_table form-horizontal " >
							<div class="card-body">
								<div id="downloadDiv">
									<table class="table">
											<thead>
												<tr>
													<th scope="col">#</th>
													<th scope="col">Tenure</th>
													<th scope="col">Download Report</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th scope="row">1</th>
													<td><?php echo $_SESSION['financialYear']; ?></td>
													<td><?php
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
															<?php }else{ echo "No Document Provided" ;} ?></td>
												</tr>
											</tbody>
										</table>
								</div>
                   <!-- call table view form element with ajax call -->
										<?php echo $this->element('application_forms/bgr/analysis_table/commodity_wise_reports_form_tbl'); ?>
								
                </div>
						</div>

					
									<div class="form-horizontal border file_upload">
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
             
						<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Help</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
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
