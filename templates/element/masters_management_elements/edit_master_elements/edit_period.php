
<div class="col-md-6">
<label>Firm Type 	<span class="cRed">*</span></label>
<?php echo $this->Form->control('firm_type', array('type'=>'select', 'id'=>'firm_type', 'options'=>$certificate_type, 'value'=>$period_details['period'], 'label'=>false,'empty'=>'--Select State--','class'=>'form-control')); ?>

<div id="error_firm_type"></div>
</div>

<div class="col-md-6">
<label>Period <span class="cRed">*</span></label>
<?php echo $this->Form->control('period', array('type'=>'select', 'id'=>'period', 'options'=>array('1','2','3','4','5','6','7','8','9','10','11','12'),'value'=>$period_details['firm_type'], 'label'=>false,'empty'=>'--Select State--','class'=>'form-control')); ?>
<span id="error_period" class="error invalid-feedback"></span>
</div>
