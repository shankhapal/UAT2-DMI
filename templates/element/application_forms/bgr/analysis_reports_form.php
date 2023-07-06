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
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name_packer" class="col-form-label">
                                        Name of the packer <span class="cRed">*</span>
                                      </label>
                                      <?php echo $this->Form->control('name_packer', array('
                                        type'=>'text', 
                                        'id'=>'name_packer', 
                                        'value'=>'', 
                                        'class'=>'form-control input-field', 
                                        'placeholder'=>'Enter packer name', 
                                        'label'=>false)); ?>
                                      <span id="error_name_packer" class="error invalid-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name_packer" class="col-form-label">Address <span class="cRed">*</span></label>
                                      <?php echo $this->Form->control('name_packer', array('type'=>'text', 'id'=>'name_packer', 'value'=>'', 'class'=>'form-control input-field', 'placeholder'=>'Enter packer name', 'label'=>false)); ?>
                                      <span id="error_name_packer" class="error invalid-feedback"></span>
                                  </div>
                              </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name_packer" class="col-form-label">
                                        Name of the firm <span class="cRed">*</span>
                                      </label>
                                       <?php echo $this->Form->control('name_packer', array(
                                            'type' => 'text',
                                            'id' => 'name_packer',
                                            'value' => '',
                                            'class' => 'form-control input-field',
                                            'placeholder' => 'Enter packer name',
                                            'label' => false
                                        )); ?>

                                      <span id="error_name_packer" class="error invalid-feedback"></span>
                                  </div>
                              </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name_packer" class="col-form-label">
                                        Valid upto <span class="cRed">*</span>
                                      </label>
                                       <?php echo $this->Form->control('name_packer', array(
                                            'type' => 'text',
                                            'id' => 'name_packer',
                                            'value' => '',
                                            'class' => 'form-control input-field',
                                            'placeholder' => 'Enter packer name',
                                            'label' => false
                                        )); ?>

                                      <span id="error_name_packer" class="error invalid-feedback"></span>
                                  </div>
                              </div>
                          </div>
                      </div>

                       <div class="card-body border">
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name_packer" class="col-form-label">
                                        Commodity <span class="cRed">*</span>
                                      </label>
                                       <?php echo $this->Form->control('name_packer', array(
                                            'type' => 'text',
                                            'id' => 'name_packer',
                                            'value' => '',
                                            'class' => 'form-control input-field',
                                            'placeholder' => 'Enter packer name',
                                            'label' => false
                                        )); ?>

                                      <span id="error_name_packer" class="error invalid-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name_packer" class="col-form-label">
                                        C.A. No. of the packer <span class="cRed">*</span>
                                      </label>
                                        <?php echo $this->Form->control('name_packer', array(
                                            'type' => 'text',
                                            'id' => 'name_packer',
                                            'value' => '',
                                            'class' => 'form-control input-field',
                                            'placeholder' => 'Enter packer name',
                                            'label' => false
                                        )); ?>

                                      <span id="error_name_packer" class="error invalid-feedback"></span>
                                  </div>
                              </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name_packer" class="col-form-label">
                                        Dated <span class="cRed">*</span>
                                      </label>
                                      <?php echo $this->Form->control('name_packer', array(
                                          'type' => 'text',
                                          'id' => 'name_packer',
                                          'value' => '',
                                          'class' => 'form-control input-field',
                                          'placeholder' => 'Enter packer name',
                                          'label' => false
                                      )); ?>

                                      <span id="error_name_packer" class="error invalid-feedback"></span>
                                  </div>
                              </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name_packer" class="col-form-label">
                                           Authorized Chemist: <span class="cRed">*</span>
                                      </label>
                                      <?php echo $this->Form->control('name_packer', array(
                                          'type' => 'text',
                                          'id' => 'name_packer',
                                          'value' => '',
                                          'class' => 'form-control input-field',
                                          'placeholder' => 'Enter packer name',
                                          'label' => false
                                      )); ?>
                                      <span id="error_name_packer" class="error invalid-feedback"></span>
                                  </div>
                              </div>

                          </div>
                      </div>

                       <div class="card-body border">
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name_packer" class="col-form-label">Period of statement from: <span class="cRed">*</span></label>
                                      <?php echo $this->Form->control('name_packer', array('type'=>'text', 'id'=>'name_packer', 'value'=>'', 'class'=>'form-control input-field', 'placeholder'=>'Enter packer name', 'label'=>false)); ?>
                                      <span id="error_name_packer" class="error invalid-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="name_packer" class="col-form-label">To: <span class="cRed">*</span></label>
                                      <?php echo $this->Form->control('name_packer', array('type'=>'text', 'id'=>'name_packer', 'value'=>'', 'class'=>'form-control input-field', 'placeholder'=>'Enter packer name', 'label'=>false)); ?>
                                      <span id="error_name_packer" class="error invalid-feedback"></span>
                                  </div>
                              </div>
                          </div>
                      </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
