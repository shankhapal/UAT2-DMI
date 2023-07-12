<?php //pr($section_form_details);die;
echo $this->Html->css('../multiselect/jquery.multiselect');
echo $this->Html->script('../multiselect/jquery.multiselect');
define('INPUT_CLASS', 'form-control input-field');
define('PLACEHOLDER_TEXT', 'Enter Valid upto');
echo $this->Form->create(null, array('type'=>'file', 'enctype'=>'multipart/form-data', 'id'=>$section)); ?>
<section id="form_outer_main" class="content form-middle">
    <div class="container-fluid">
      <?php $year = date("Y");$month = date("m");?>
					<div class="card-header"><h5 class="mt-1 mb-2">d) Revenue Statement for the Months of [<?php echo $month; ?>] , [<?php echo $year; ?>]</h5></div>
        <div id="form_inner_main">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header sub-card-header-firm">
                            <h3 class="card-title">Name of the packer with full address:</h3>
                        </div>
                        <div class="card-body border">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="name_packer" class="col-form-label">
                                        Name of the packer:
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <?php echo $this->Form->control('name_packer', array(
                                        'type' => 'text',
                                        'id' => 'name_packer',
                                        'value' => $firm_details['firm_name'],
                                        'class' => 'form-control input-field readOnly',
                                        'label' => false
                                    )); ?>
                                    <span id="error_name_packer" class="error invalid-feedback"></span>
                                </div>
                                <div class="col-md-2">
                                    <label for="address" class="col-form-label">
                                        Address:
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <?php echo $this->Form->control('address', array(
                                        'type' => 'textarea',
                                        'id' => 'address',
                                        'value' => $firm_details['street_address'],
                                        'class' => 'form-control input-field readOnly',
                                        'label' => false
                                    )); ?>
                                    <span id="error_address" class="error invalid-feedback"></span>
                                </div>
                            </div>
                        </div>


                        <div class="card-body border">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group row">
                                        <label for="name_packer" class="col-form-label">
                                                Valid upto:
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <?php echo $this->Form->control('valid_up_to', array(
                                        'type' => 'text',
                                        'id' => 'valid_up_to',
                                        'value' => $section_form_details[4],
                                        'class' => 'form-control input-field readOnly',
                                        'label' => false
                                        )); ?>
                                        <span id="error_valid_up_to" class="error invalid-feedback"></span>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group row">
                                            <label for="address" class="col-form-label">
                                            Commodity:
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <?php echo $this->Form->control('commodity', array(
                                        'type' => 'select',
                                        'id' => '',
                                        'multiple'=>true,
                                        'escape'=>false,
                                        'options'=>$section_form_details[2],
                                        'class' => 'form-control input-field',
                                        'label' => false,
                                        'readonly' => true
                                    )); ?>
                                </div>
                            </div>
                        </div>

                        <div class="card-body border">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group row">
                                        <label for="name_packer" class="col-form-label">
                                                C.A. No. of the packer:
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <?php echo $this->Form->control('ca_no', array(
                                        'type' => 'text',
                                        'id' => 'ca_no',
                                        'value' => $firm_details['customer_id'],
                                        'class' => 'form-control input-field readOnly',
                                        'label' => false
                                        )); ?>
                                        <span id="error_ca_no" class="error invalid-feedback"></span>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group row">
                                            <label for="authorized_chemist" class="col-form-label">
                                           Dated:
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <?php echo $this->Form->control('dated', array(
                                        'type' => 'text',
                                        'id' => 'dated',
                                        'value' => $section_form_details[0]['dated'],
                                        'class' => INPUT_CLASS,
                                        'placeholder' => 'Please Select dated',
                                        'label' => false
                                    )); ?>
                                    <span id="error_dated" class="error invalid-feedback"></span>
                                </div>
                            </div>
                        </div>

                         <div class="card-body border">
                            <div class="row">
                                   <div class="col-md-2">
                                    <div class="form-group row">
                                        <label for="name_packer" class="col-form-label">
                                            Authorized Chemist: <span class="cRed">*</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                   <?php
                                    $chemst = $section_form_details[5];
                                    $selectedOptions = explode(',', $section_form_details[0]['authorized_chemist']);
                                    $selectedValues = [];

                                    if (!empty($chemst)) {
                                        foreach ($selectedOptions as $option) {
                                            foreach ($chemst as $key => $value) {
                                               if ($option == $key) {
                                                    $selectedValues[] = $option;
                                                    break; // Exit the inner loop since the value has been found
                                                }
                                            }
                                        }
                                    }
                                   
                                   echo $this->Form->control('authorized_chemist', array(
                                        'type' => 'select',
                                        'id' => 'authorized_chemist',
                                        'options' => $section_form_details[5],
                                        'default' => $selectedValues,
                                        'multiple' => 'multiple',
                                        'escape' => false,
                                        'class' => 'form-control input-field',
                                        'label' => false
                                    ));?>

                                    <span id="error_authorized_chemist" class="error invalid-feedback"></span>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group row">
                                        <label for="name_packer" class="col-form-label">
                                            Period of statement from: <span class="cRed">*</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                   <?php echo $this->Form->control('period_from', array(
                                        'type' => 'text',
                                        'id' => 'period_form',
                                        'value' => $section_form_details[0]['period_from'],
                                        'class' => INPUT_CLASS,
                                        'placeholder' => 'Please Select Period from',
                                        'label' => false
                                    )); ?>
                                    <span id="error_period_form" class="error invalid-feedback"></span>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group row">
                                        <label for="authorized_chemist" class="col-form-label">
                                            Period of statement To: <span class="cRed">*</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <?php echo $this->Form->control('period_to', array(
                                        'type' => 'text',
                                        'id' => 'period_to',
                                        'value' => $section_form_details[0]['period_to'],
                                        'class' => INPUT_CLASS,
                                        'placeholder' => 'Enter period to',
                                        'label' => false
                                    )); ?>
                                    <span id="error_period_to" class="error invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                       
                        <div class="card card-success border p-2">
                          	<?php echo $this->element(
                                'application_forms/bgr/bgr_addmore_tbl/revenue_statement_form_tbl'
                            ); ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php
    echo $this->Html->script('element/application_forms/bgr/bianually_grading_validation');
    echo $this->Html->script('element/application_forms/bgr/analysis_reports');
    echo $this->Html->script('element/application_forms/bgr/proceed_to_update.js');
	  echo $this->Html->script('element/application_forms/bgr/revenue_statement_form');
?>