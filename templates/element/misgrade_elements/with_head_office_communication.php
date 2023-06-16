<div class="form-horizontal">
	<div class="card card-Lightblue">
		<div class="card-header"><h3 class="card-title">Communication between Regional Office and Sub Office</h3></div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12"><label>Previous Comments History</label>
					<div class="remark-history">
						<table class="table m-0 table-bordered table-hover table-striped table-sm">
							<thead class="tablehead">
								<tr>
									<th>Date</th>
									<th>Comment By</th>
									<th>Comment To</th>
									<th>Comment</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(!empty($ho_comment_details)){
									$last_comment_by = null;
									foreach($ho_comment_details as $comment_detail){

										//view only rows with values.
										if(!empty($comment_detail['comment_date'])){?>

										<tr>
										<td><?php echo $comment_detail['comment_date']; ?></td>
										<td><?php echo base64_decode($comment_detail['comment_by']); ?></td>
										<td><?php echo base64_decode($comment_detail['comment_to']); ?></td>
										<td><?php echo $comment_detail['comment']; ?></td>
										</tr>

								<?php }
									//added on 25-09-2017 to get last comment by to apply in condition below
									$last_comment_by = $comment_detail['comment_by'];
									$last_comment_to = $comment_detail['comment_to'];
									}
								}else{ ?>
									<tr><td>Currently there is no comments regarding this application.</td></tr>

								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="form-horizontal">
			<div class="card-body">
				<div class="col-sm-12">
					<div id="comment_box_with_btn">
						<div id="commentBox">
							<div class="row">
								<?php if ($mode == 'edit') { ?>

									<div class="col-sm-6">
										<div class="remark-current">
											<label>Current Comment : </label>
											<?php echo $this->Form->control('comment', array('type'=>'textarea', 'id'=>'check_save_reply', 'class'=>'form-control','escape'=>false, 'label'=>false, )); ?>
											<div id="error_save_reply"></div>
										</div>
									</div>
									<div class="col-sm-6">
										<div id="comment_to">
											<label>Comment To : </label>
											<?php
												if($current_level=='level_3'){
												
													$options=array('ho'=>' Head Office');
													$attributes=array('legend'=>false, 'id'=>'comment_to', 'value'=>'ho', 'label'=>true,);
													echo $this->Form->radio('comment_to',$options,$attributes);

												}else{

													$options=array('ro'=>' Regional officer');
													$attributes=array('legend'=>false, 'id'=>'comment_to', 'value'=>'ro', 'label'=>true,);
													echo $this->Form->radio('comment_to',$options,$attributes);
												}
											?>
											<div id="error_mo_allocation"></div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>