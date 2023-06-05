<div class="col-6">
    <label class="col-form-label">Enter Misgrading Action<span class="cRed">*</span></label>
    <?php echo $this->Form->control('misgrade_action_name', array('type'=>'textarea', 'id'=>'misgrade_action_name','label'=>false, 'value'=>$record_details['misgrade_action_name'],'class'=>'form-control')); ?>	
    <span id="error_misgrade_action_name" class="error invalid-feedback"></span>
</div>
<div class="col-6">
    <label class="col-form-label">Enter Description<span class="cRed">*</span></label>
    <?php echo $this->Form->control('misgrade_action_dscp', array('type'=>'textarea', 'id'=>'misgrade_action_dscp','label'=>false, 'value'=>$record_details['misgrade_action_dscp'],'class'=>'form-control')); ?>	
    <span id="error_misgrade_action_dscp" class="error invalid-feedback"></span>
</div>