<div class="card-body">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header bg-olive"><h3 class="card-title">Firm Details</h3></div>
				<div class="card-body">
					<dl class="row">
						<dt class="col-sm-4">Firm ID: </dt>
						<dd class="col-sm-8"><?php echo $customer_id; ?></dd>
						<dt class="col-sm-4">Firm Name: </dt>
						<dd class="col-sm-8"><?php echo $firmDetails['firm_name']; ?></dd>
						<dt class="col-sm-4">Category: </dt>
						<dd class="col-sm-8"><?php echo $category; ?></dd>
						<dt class="col-sm-4">Commodity</dt>
						<dd class="col-sm-8"><?php echo implode(',', $sub_commodity_value); ?></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header bg-olive"><h3 class="card-title">Reason</h3></div>
				<div class="card-body">
					<?php echo $this->Form->control('reason', array('type'=>'textarea','id'=>'reason', 'value'=>$reason,'label'=>false, 'class'=>'form-control')); ?>
					<span id="error_reason" class="error invalid-feedback"></span>
				</div>
			</div>
		</div>
		<div class="col-md-6" id="sample_details">
			<div class="card">
				<div class="card-header bg-olive"><h3 class="card-title">Misgrading Details</h3></div>
				<div class="card-body">
					<dl class="row">
						<dt class="col-sm-4">Sample : </dt>
						<dd class="col-sm-8"><?php echo $sampleArray['sample_code']; ?></dd>
						<dt class="col-sm-4">Sample Type: </dt>
						<dd class="col-sm-8"><?php echo $sampleArray['sample_type']; ?></dd>
						<dt class="col-sm-4">Commodity: </dt>
						<dd class="col-sm-8"><?php echo $sampleArray['commodity']; ?></dd>
						<dt class="col-sm-4">Sample Details: </dt>
						<dd class="col-sm-8"><?php echo $sampleArray['grade_desc']; ?></dd>	
					</dl>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<?php if(!empty($scn_pdf_path)){?>
				<label class=""> Show Cause Notice PDF :
					<a id="scn_pdf_path" target="blank" href="<?php echo str_replace("D:/xampp/htdocs","",$scn_pdf_path); ?>">Preview</a>
				</label>
			<?php } ?>
		</div>
	</div>
</div>
