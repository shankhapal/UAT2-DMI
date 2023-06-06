<div class="col-6">
    <label class="col-form-label">Enter Misgrading Level<span class="cRed">*</span></label>
    <?php echo $this->Form->control('misgrade_level_name', array('type'=>'text', 'id'=>'misgrade_level_name','label'=>false, 'value'=>$record_details['misgrade_level_name'],'class'=>'form-control')); ?>	
    <span id="error_misgrade_level_name" class="error invalid-feedback"></span>
</div>
<div class="col-6">
    <label class="col-form-label">Enter Description<span class="cRed">*</span></label>
    <?php echo $this->Form->control('misgrade_level_dscp', array('type'=>'textarea', 'id'=>'misgrade_level_dscp','label'=>false, 'value'=>$record_details['misgrade_level_dscp'],'class'=>'form-control')); ?>	
    <span id="error_misgrade_level_dscp" class="error invalid-feedback"></span>
</div>