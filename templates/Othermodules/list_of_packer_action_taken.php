<div class="content-wrapper">
    <div class="content-header">
        <!-- Rest of the code -->
    </div>
    <section class="content form-middle ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <?php echo $this->Form->create(); ?>
                    <div class="card card-teal">
                        <div class="card-header">
                            <h3 class="card-title-new">Suspension/Cancellation</h3>
                        </div>
                        <div class="form-horizontal">
                            <div class="card-body">
                                <div class="row">
                                    <p class="alert alert-info">
                                        Note: <br>
                                        1. Select the packer id from the dropdown. <br>
                                        Please note only those packers will appear in the dropdown whose actions are saved in the action misgarding module<br>
                                        2. After selection of the packer id, click on the GO button<br>
                                    </p>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="field3">Application Id <span class="cRed">*</span></label>
                                            <?php 
                                            echo $this->Form->control('customer_id', array('type'=>'select', 'id'=>'customer_id', 'class'=>'form-control','options' => $customer_list, 'label'=>false, 'empty'=>'--Select--', 'required'=>true)); 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer cardFooterBackground">
                            <?php echo $this->Form->submit('Go', array('name'=>'go_button', 'id'=>'go_button','label'=>false, 'class'=>'btn btn-success')); ?>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                    <!-- Add the following hidden input field -->
                    <?php if ($this->request->is('post')): ?>
                        <?php
                        $selectedValue = $this->request->getData('customer_id');
                        if (isset($customer_list[$selectedValue])) {
                            $sample_code = substr($customer_list[$selectedValue], strrpos($customer_list[$selectedValue], '(') + 1, -1);
                        } else {
                            $sample_code = '';
                        }
                        ?>
                        <input type="hidden" name="sample_code" value="<?php echo $sample_code; ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>
