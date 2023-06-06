<div class="col-6">
    <label class="col-form-label">Enter Misgrading Action<span class="cRed">*</span></label>
    <?php echo $this->Form->control('misgrade_action_name', array('type'=>'textarea', 'id'=>'misgrade_action_name', 'label'=>false, 'placeholder'=>'Enter Misgrading Action Name Here', 'class'=>'form-control','required'=>true)); ?>
    <span id="error_misgrade_action_name" class="error invalid-feedback"></span>
</div>
<div class="col-6">
    <label class="col-form-label">Enter Description<span class="cRed">*</span></label>
    <?php echo $this->Form->control('misgrade_action_dscp', array('type'=>'textarea', 'id'=>'misgrade_action_dscp', 'label'=>false, 'placeholder'=>'Enter Misgrading Action Description Here', 'class'=>'form-control','required'=>true)); ?>
    <span id="error_misgrade_action_dscp" class="error invalid-feedback"></span>
</div>
