<div class="col-6">
    <label class="col-form-label">Enter Misgrading Level<span class="cRed">*</span></label>
    <?php echo $this->Form->control('misgrade_level_name', array('type'=>'text', 'id'=>'misgrade_level_name', 'label'=>false, 'placeholder'=>'Enter Misgrading Level Name Here', 'class'=>'form-control','required'=>true)); ?>
    <span id="error_misgrade_level_name" class="error invalid-feedback"></span>
</div>
<div class="col-6">
    <label class="col-form-label">Enter Description<span class="cRed">*</span></label>
    <?php echo $this->Form->control('misgrade_level_dscp', array('type'=>'textarea', 'id'=>'misgrade_level_dscp', 'label'=>false, 'placeholder'=>'Enter Misgrading Level Description Here', 'class'=>'form-control','required'=>true)); ?>
    <span id="error_misgrade_level_dscp" class="error invalid-feedback"></span>
</div>