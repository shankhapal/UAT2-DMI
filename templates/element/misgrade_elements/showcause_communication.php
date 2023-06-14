<div class="comment_bx_container">
	<div class="form-horizontal">
		<div class="card-header bg-dark"><h3 class="comment_bx_title card-title-new">Communications With Agmark</h3></div>
		<table class="table table-sm m-0 table-striped table-hover table-bordered">
			<thead class="tablehead">
				<tr>
					<th>Date</th>
					<th>Comment</th>
					<th>From</th>
				</tr>	
			</thead>
			<tbody>
			<?php
				if(!empty($showcause_comments)){
					$last_comment_by = null;
					foreach($showcause_comments as $comment_detail){

						//view only rows with values.
						if(!empty($comment_detail['comment_date'])){?>

						<tr>
						<td><?php echo $comment_detail['comment_date']; ?></td>
						<td><?php echo $comment_detail['comment']; ?></td>
						<td>
							<?php
								if ($comment_detail['from_user'] == 'applicant') {
									echo 'Applicant';
								}

								if($comment_detail['from_user'] == 'ro'){
									echo 'Agmark';
								}
								
							
							?>
						</td>
						</tr>

				<?php } } } else { ?>
					<tr><td>Currently there is no comments regarding this application.</td></tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="card-body row">
		<div class="col-sm-6" id="comment_box_with_btn">
			<div class="remark-current comment_bx_body">
				<?php 
				echo $this->Form->control('reffered_back_comment', array('type'=>'textarea', 'id'=>'reffered_back_comment_bx', 'escape'=>false, 'class'=>'cvOn cvReq form-control comment_bx', 'label'=>false, 'placeholder'=>'Write Your Referred Back Comment For Applicant Here')); ?>
				<div class="err_cv"></div>
			</div>
		</div>
	</div>
</div>



