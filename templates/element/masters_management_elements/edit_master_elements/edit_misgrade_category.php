<div class="col-6">
    <label class="col-form-label">Enter Misgrading Category<span class="cRed">*</span></label>
    <?php echo $this->Form->control('misgrade_category_name', array('type'=>'text', 'id'=>'misgrade_category_name','label'=>false, 'value'=>$record_details['misgrade_category_name'],'class'=>'form-control')); ?>	
    <span id="error_misgrade_category_name" class="error invalid-feedback"></span>
</div>
<div class="col-6">
    <label class="col-form-label">Enter Misgrading Description<span class="cRed">*</span></label>
    <?php echo $this->Form->control('misgrade_category_dscp', array('type'=>'textarea', 'id'=>'misgrade_category_dscp','label'=>false, 'value'=>$record_details['misgrade_category_dscp'],'class'=>'form-control')); ?>	
    <span id="error_misgrade_category_dscp" class="error invalid-feedback"></span>
</div>