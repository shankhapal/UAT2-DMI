<?php //pr($section_form_details);die; ?>
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
          <label class="badge badge-info">Routine Inspection Report (Approved Laboratory)</label>
        </div>
     <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><?php echo $this->Html->link('Dashboard', array('controller' => 'customers', 'action'=>'primary_home'));?></li>
            <li class="breadcrumb-item active">Routine Inspection Report (Approved Laboratory)</li>
       </ol>
      </div>
     </div>
   </div>
</div>  
<?php echo $this->Form->create(null, array('type'=>'file', 'enctype'=>'multipart/form-data', 'id'=>$section)); ?>

    <section id="form_outer_main" class="content form-middle">
		<div class="container-fluid">
          <div id='form_inner_main'>
			<div class="row">
				<div class="col-md-12">
			    	<?php echo $this->Form->create(); ?>
                        <div class="card card-success">
                                <div class="form-horizontal">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Date of Last Inspection <span class="cRed">*</span></label>
                                                    <div class="col-sm-9">
                                                        <?php echo $this->Form->control('date_last_inspection', array('type'=>'text', 'id'=>'date_last_inspection', 'value'=>$section_form_details[0]['date_last_inspection'], 'class'=>'form-control input-field', 'placeholder'=>'Enter DD/MM/YYYY', 'label'=>false)); ?>
                                                        <span id="error_date_last_inspection" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Date of present Inspection <span class="cRed">*</span></label>
                                                    <div class="col-sm-9">
                                                    <?php echo $this->Form->control('date_p_inspection', array('type'=>'text', 'id'=>'date_p_inspection', 'escape'=>false, 'placeholder'=>'Enter DD/MM/YYYY', 'maxlength'=>'10',  'value'=>$section_form_details[0]['date_p_inspection'],'minlength'=>'10', 'class'=>'cvOn cvReq cvDate form-control', 'disabled'=>false, 'label'=>false)); ?>
                                                    <span id="error_date_p_inspection" class="error invalid-feedback"></span>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="card-header sub-card-header-firm"><h3 class="card-title"></h3></div>
                                    <div class="form-horizontal">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Name of the laboratory<span class="cRed">*</span></label>
                                                        <div class="col-sm-9">
                                                        <?php echo $this->Form->control('printing_press', array('type'=>'text', 'id'=>'printing_press','value'=>$firm_details['firm_name'],'readonly'=>true,'label'=>false, 'class'=>'form-control')); ?>
                                                        <span id="error_printing_press" class="error invalid-feedback"></span>
                                                    </div>
                                                 </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email Id <span class="cRed">*</span></label>
                                                    <div class="col-sm-9">
                                                        <?php echo $this->Form->control('email', array('type'=>'text', 'placeholder'=>'Enter firm email id','value'=>base64_decode($firm_details['email']),'readonly'=>true, 'id'=>'email', 'class'=>'form-control input-field', 'label'=>false)); ?>
                                                        <span id="error_email" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Mobile No. <span class="cRed">*</span></label>
                                                    <div class="col-sm-9">
                                                        <?php echo $this->Form->control('mobile_no', array('type'=>'text', 'placeholder'=>'Enter mobile no. here', 'id'=>'mobile_no','value'=>base64_decode($firm_details['mobile_no']),'readonly'=>true, 'class'=>'form-control input-field', 'label'=>false)); ?>
                                                        <span id="error_mobile_no" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Certificate No <span class="cRed">*</span></label>
                                                    <div class="col-sm-9">
                                                        <?php echo $this->Form->control('packaging_material', array('type'=>'text','value'=>$firm_details['customer_id'],'readonly'=>true,  'id'=>'customer_id', 'class'=>'form-control input-field', 'label'=>false)); ?>
                                                        <span id="error_customer_id" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Address <span class="cRed">*</span></label>
                                                    <div class="col-sm-9">
                                                        <?php echo $this->Form->control('street_address', array('type'=>'textarea', 'id'=>'street_address','value'=>$firm_details['street_address'],'readonly'=>true,'placeholder'=>'Enter street address', 'class'=>'form-control input-field', 'label'=>false)); ?>
                                                        <span id="error_street_address" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Commodities for which approved<span class="cRed">*</span></label>
                                                    <div class="col-sm-9">
                                                            <?php echo $this->Form->control('sub_commodity', array('type'=>'select', 'options'=>$section_form_details[1], 'multiple'=>'multiple', 'label'=>false, 'disabled'=>'disabled', 'class'=>'form-control')); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Name of the approved chemist Present at the time of inspection<span class="cRed">*</span></label>
                                                    <div class="col-sm-9">
                                                        <?php echo $this->Form->control('approved_chemist', array('type'=>'text', 'placeholder'=>'Enter Name of the approved chemist Present at the time of inspection','value'=>$section_form_details[0]['approved_chemist'],'id'=>'approved_chemist', 'class'=>'form-control input-field', 'label'=>false)); ?>
                                                        <span id="error_approved_chemist" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header sub-card-header-firm"><h3 class="card-title"> </h3></div>
                                        <div class="form-horizontal">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-6 col-form-label">Is the laboratory well lighted Ventilated and hygienic<span class="cRed">*</span></label>
                                                                <?php
                                                                $i=1;
                                                                $properly_equipped = $section_form_details[0]['properly_equipped'];
                                                                
                                                                    if($properly_equipped == 'yes'){
                                                                        $checked_yes = 'checked';
                                                                        $checked_no = '';
                                                                    } else {

                                                                        $checked_yes = '';
                                                                        $checked_no = 'checked';
                                                                    }
                                                                    $i++;
                                                                ?>
                                                            <div class="col-sm-6">
                                                                <div class=" d-inline">
                                                                    <input type="radio" name="properly_equipped" checked="" id="properly_equipped-yes" value="yes" <?php echo $checked_yes; ?>>
                                                                    <label for="properly_equipped-yes">Yes
                                                                    </label>
                                                                </div>
                                                                <div class=" d-inline">
                                                                    <input type="radio" name="properly_equipped" id="properly_equipped-no" value="no" <?php echo $checked_no; ?>>
                                                                    <label for="properly_equipped-no">No
                                                                    </label>
                                                                </div>
                                                                <span id="error_properly_equipped" class="error invalid-feedback"></span>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Is the Laboratory properly equipped for the grading of the commodities<span class="cRed">*</span></label>
                                                                <?php
                                                                $i=1;
                                                                $is_equipment = $section_form_details[0]['is_equipment'];
                                                                
                                                                    if($is_equipment == 'yes'){
                                                                        $checked_yes = 'checked';
                                                                        $checked_no = '';
                                                                    } else {

                                                                        $checked_yes = '';
                                                                        $checked_no = 'checked';
                                                                    }
                                                                    $i++;
                                                                ?>
                                                            <div class="col-sm-9">
                                                                <div class=" d-inline">
                                                                    <input type="radio" name="is_equipment" checked="" id="is_equipment-yes" value="yes"<?php echo $checked_yes; ?>>
                                                                    <label for="is_equipment-yes">Yes
                                                                    </label>
                                                                </div>
                                                                <div class=" d-inline">
                                                                    <input type="radio" name="is_equipment" id="is_equipment-no" value="no" <?php echo $checked_no; ?>>
                                                                    <label for="is_equipment-rn">No
                                                                    </label>
                                                                </div>
                                                                <span id="is_equipment-rn" class="error invalid-feedback"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <div class="card-header sub-card-header-firm"><h3 class="card-title"></h3></div>
                                    <div class="form-horizontal">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-6 col-form-label">Is the equipment is in working order<span class="cRed">*</span></label>
                                                            <?php
                                                            $i=1;
                                                            $eq_working_order = $section_form_details[0]['eq_working_order'];
                                                            
                                                                if($eq_working_order == 'yes'){
                                                                    $checked_yes = 'checked';
                                                                    $checked_no = '';
                                                                } else {
                                                                    $checked_yes = '';
                                                                    $checked_no = 'checked';
                                                                }
                                                                $i++;
                                                            ?>
                                                        <div class=" d-inline">
                                                                <input type="radio" name="eq_working_order" checked="" id="eq_working_order-yes" value="yes"<?php echo $checked_yes; ?>>
                                                                <label for="eq_working_order-yes">Yes
                                                                </label>
                                                            </div>
                                                            <div class=" d-inline">
                                                                <input type="radio" name="eq_working_order" id="eq_working_order-no" value="no" <?php echo $checked_no; ?>>
                                                                <label for="eq_working_order-no">No
                                                                </label>
                                                            </div>
                                                            <span id="error_eq_working_order" class="error invalid-feedback"></span>
                                                        </div>
                                                    </div>
                                                <div class="col-sm-6">
                                                <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-6 col-form-label">Is the analytical register properly Maintained<span class="cRed">*</span></label>
                                                            <?php
                                                            $i=1;
                                                            $lab_properly_maintained = $section_form_details[0]['lab_properly_maintain'];
                                                            
                                                                if($lab_properly_maintained == 'yes'){
                                                                    $checked_yes = 'checked';
                                                                    $checked_no = '';
                                                                } else {

                                                                    $checked_yes = '';
                                                                    $checked_no = 'checked';
                                                                }
                                                                $i++;
                                                            ?>
                                                        <div class=" d-inline">
                                                                <input type="radio" name="lab_properly_maintained" checked="" id="lab_properly_maintained-yes" value="yes" <?php echo $checked_yes; ?>>
                                                                <label for="lab_properly_maintained-yes">Yes
                                                                </label>
                                                            </div>
                                                            <div class=" d-inline">
                                                                <input type="radio" name="lab_properly_maintained" id="lab_properly_maintained-no" value="no"<?php echo $checked_no; ?>>
                                                                <label for="lab_properly_maintained-no">No
                                                                </label>
                                                            </div>
                                                        <span id="error_lab_properly_maintained" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <div class="card-header sub-card-header-firm"><h3 class="card-title"></h3></div>
                                    <div class="form-horizontal">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    
                                                        <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm- col-form-label">Are they being forwarded to Concerned offices in time<span class="cRed">*</span></label>
                                                        <?php
                                                            $i=1;
                                                            $concerned_offices = $section_form_details[0]['fwd_concerned_offices'];
                                                            
                                                                if($concerned_offices == 'yes'){
                                                                    $checked_yes = 'checked';
                                                                    $checked_no = '';
                                                                } else {

                                                                    $checked_yes = '';
                                                                    $checked_no = 'checked';
                                                                }
                                                                $i++;
                                                            ?>
                                                            <div class=" d-inline">
                                                                <input type="radio" name="concerned_offices" checked="" id="concerned_offices-yes" value="yes"<?php echo $checked_yes; ?>>
                                                                <label for="concerned_offices-yes">Yes
                                                                </label>
                                                            </div>
                                                            <div class=" d-inline">
                                                                <input type="radio" name="concerned_offices" id="concerned_offices-no" value="no" <?php echo $checked_no; ?>>
                                                                <label for="concerned_offices-no">No
                                                                </label>
                                                            </div>
                                                                <span id="error_concerned_offices" class="error invalid-feedback"></span>
                                                        </div>
                                                        <div class="form-group row">
                                                        <label for="inputLastlotno" class="col-sm-6 col-form-label">Last lot analyzed Lot No: <span class="cRed">*</span></label>
                                                            <div class="col-sm-9">
                                                                <?php echo $this->Form->control('last_lot_no', array('type'=>'text', 'id'=>'last_lot_no', 'class'=>'form-control input-field','value'=>$section_form_details[0]['last_lot_no'], 'placeholder'=>'Last lot No. dated And its analytical results', 'label'=>false)); ?>
                                                                <span id="error_last_lot_no" class="error invalid-feedback error_last_lot_no"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                        <label for="inputLastlotno" class="col-sm-6 col-form-label">Date: <span class="cRed">*</span></label>
                                                        <div class="col-sm-9">
                                                            <?php echo $this->Form->control('date', array('type'=>'text', 'id'=>'date', 'escape'=>false, 'placeholder'=>'Enter DD/MM/YYYY', 'value'=>$section_form_details[0]['dates'],'maxlength'=>'10', 'minlength'=>'10', 'class'=>'cvOn cvReq cvDate form-control', 'disabled'=>false, 'label'=>false)); ?>
                                                            <span id="error_date" class="error invalid-feedback"></span>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="inputLastlotno" class="col-sm-6 col-form-label">Commodity: <span class="cRed">*</span></label>
                                                    <div class="col-sm-9">
                                                        <?php echo $this->Form->control('commodity', array('type'=>'text', 'id'=>'commodity', 'class'=>'form-control input-field', 'value'=>$section_form_details[0]['commodity'],'placeholder'=>'Enter Commodity', 'label'=>false)); ?>
                                                        <span id="error_commodity" class="error invalid-feedback error_commodity"></span>
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-12 col-form-label">Name of the Packers and it’s Analytical results<span class="cRed">*</span></label>
                                                        <div class="col-sm-9">
                                                            <?php echo $this->Form->control('p_analytical_reg', array('type'=>'text', 'id'=>'p_analytical_reg','value'=>$section_form_details[0]['p_analytical_reg'], 'class'=>'form-control input-field', 'placeholder'=>'Enter Name of the Packers and it’s Analytical results', 'label'=>false)); ?>
                                                            <span id="error_p_analytical_reg" class="error invalid-feedback"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-12 col-form-label">Suggestions given during last<span class="cRed">*</span></label>
                                                        <div class="col-sm-9">
                                                            <?php echo $this->Form->control('suggestion_during_last', array('type'=>'textarea','value'=>$section_form_details[0]['suggestion_during_last'], 'id'=>'suggestion_during_last', 'class'=>'form-control input-field', 'placeholder'=>'Enter Suggestions given during last', 'label'=>false)); ?>
                                                            <span id="error_suggestion_during_last" class="error invalid-feedback"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <div class="card-header sub-card-header-firm"><h3 class="card-title"></h3></div>
                            <div class="form-horizontal">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-12 col-form-label">Shortcomings noticed in present Inspection<span class="cRed">*</span></label>
                                                <div class="col-sm-9">
                                                    <?php echo $this->Form->control('short_noticed', array('type'=>'textarea', 'id'=>'short_noticed', 'value'=>$section_form_details[0]['short_noticed'],'class'=>'form-control input-field', 'placeholder'=>'Enter Shortcomings noticed in present Inspection', 'label'=>false)); ?>
                                                    <span id="error_short_noticed" class="error invalid-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                        
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-12 col-form-label">Suggestions<span class="cRed">*</span></label>
                                                <div class="col-sm-9">
                                                    <?php echo $this->Form->control('suggestions', array('type'=>'textarea', 'id'=>'suggestions', 'value'=>$section_form_details[0]['suggestions'],'class'=>'form-control input-field', 'placeholder'=>'Enter Suggestions', 'label'=>false)); ?>
                                                    <span id="error_suggestions" class="error invalid-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <div id="total_charge_box">
                        <div class="card-header sub-card-header-firm"><h3 class="card-title"></h3></div><br>
                            <div class="form-horizontal">
                                <div class="card-body">
                                <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-6 col-form-label">Signature and name of the authorized person Officerof the printing press or any representative</label>
                                                    <?php if($section_form_details[0]['signature'] != null){?>
                                                <a target="blank" id="signature_docs_value" href="<?php echo str_replace("D:/xampp/htdocs","",$section_form_details[0]['signature']); ?>">Preview</a>
                                                <?php }?>
                                <div class="custom-file col-sm-6">
                                <?php echo $this->Form->control('signature',array('type'=>'file', 'id'=>'signature', 'multiple'=>'multiple', 'label'=>false, 'class'=>'form-control wd100')); ?>
                                    <span id="error_signature" class="error invalid-feedback"></span>
                                    <span id="error_size_signature" class="error invalid-feedback"></span>
                                    <span id="error_type_signature" class="error invalid-feedback"></span>
                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-6 col-form-label">Signature of Inspection with official Stamp</label>
                                                    <?php if($section_form_details[0]['signature_name'] != null){?>
                                <a target="blank" id="signature_name_docs_value" href="<?php echo str_replace("D:/xampp/htdocs","",$section_form_details[0]['signature_name']); ?>">Preview</a>
                                <?php } ?>
                                                <div class="custom-file col-sm-6">
                                    <?php echo $this->Form->control('signature_name',array('type'=>'file', 'id'=>'signature_name', 'multiple'=>'multiple', 'label'=>false, 'class'=>'form-control wd100')); ?>
                                    <span id="error_signature_name" class="error invalid-feedback"></span>
                                    <span id="error_size_signature_name" class="error invalid-feedback"></span>
                                    <span id="error_type_signature_name" class="error invalid-feedback"></span>

                                    </div>
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
</div>
<input type="hidden" id="final_submit_status_id" value="<?php echo $final_submit_status; ?>">
<input type="hidden" id="application_mode" value="<?php echo $_SESSION['application_mode']; ?>">
<input type="hidden" id="application_type_id" value="<?php echo $_SESSION['application_type']; ?>">                                             
<?php echo $this->Html->script('routininspection/routin_inspection'); ?>

