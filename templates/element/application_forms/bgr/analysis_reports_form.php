<?php //pr($section_form_details);die;
echo $this->Form->create(null, array('type'=>'file', 'enctype'=>'multipart/form-data', 'id'=>$section)); ?>
<section id="form_outer_main" class="content form-middle">
    <div class="container-fluid">
        <h5 class="mt-1 mb-2">b) Detail Analysis Report of the Agmark Graded Commodity in Batch Wise</h5>
        <div id="form_inner_main">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header sub-card-header-firm">
                            <h3 class="card-title">Name of the packer with full address:</h3>
                        </div>
                        <div class="card-body border">
                            <div class="row">
                                <label for="date_last_inspection" class="col-md-6 col-form-label">Name of the packer <span class="cRed">*</span></label>
                                <div class="col-md-6">
                                    <?php echo $this->Form->control('date_last_inspection', array('type'=>'text', 'id'=>'date_last_inspection', 'value'=>'', 'class'=>'form-control input-field', 'placeholder'=>'Enter DD/MM/YYYY', 'label'=>false)); ?>
                                    <span id="error_date_last_inspection" class="error invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
