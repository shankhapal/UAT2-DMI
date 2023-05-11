<?php //pr($section_form_details['last_insp_suggestion']);die; ?>
<?php echo $this->Form->create(null, array('type'=>'file', 'enctype'=>'multipart/form-data', 'id'=>$section)); ?>
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<label class="badge badge-info">Routine Inspection Report (Printing Press)</label>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><?php echo $this->Html->link('Dashboard', array('controller' => 'customers', 'action'=>'primary_home'));?></li>
						<li class="breadcrumb-item active">Routine Inspection Report (Printing Press)</li>
					</ol>
				</div>
			</div>
		</div>
	</div>  
 	<section id="form_outer_main" class="content form-middle">
		<div class="container-fluid">
          <div id='form_inner_main'>
			<div class="row">
				<div class="col-md-12">
                <?php echo $this->Form->create(null, array('type'=>'file', 'enctype'=>'multipart/form-data')); ?>
                    <div class="card card-success">
                            <div class="form-horizontal">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Date of Last Inspection <span class="cRed">*</span></label>
                                                <div class="col-sm-9">
                                                    <?php echo $this->Form->control('date_last_inspection', array('type'=>'text', 'id'=>'date_last_inspection','value'=>$section_form_details[0]['date_last_inspection'], 'class'=>'form-control input-field', 'placeholder'=>'Enter DD/MM/YYYY', 'label'=>false)); ?>
                                                    <span id="error_date_last_inspection" class="error invalid-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Date of present Inspection <span class="cRed">*</span></label>
                                                <div class="col-sm-9">
                                                <?php echo $this->Form->control('date_p_inspection', array('type'=>'text', 'id'=>'date_p_inspection', 'escape'=>false, 'placeholder'=>'Enter DD/MM/YYYY','value'=>$section_form_details[0]['date_p_inspection'],  'maxlength'=>'10', 'minlength'=>'10', 'class'=>'cvOn cvReq cvDate form-control', 'disabled'=>false, 'label'=>false)); ?>
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
                                                    <label for="" class="col-sm-3 col-form-label">Name of the Printing Press<span class="cRed">*</span></label>
                                                    <div class="col-sm-9">
                                                    <?php echo $this->Form->control('printing_press', array('type'=>'text', 'id'=>'printing_press','value'=>$firm_details['firm_name'],'readonly'=>true, 'placeholder'=>'Enter Name of the Printing Press', 'label'=>false, 'class'=>'form-control')); ?>
                                                    <span id="error_printing_press" class="error invalid-feedback"></span>
                                                </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Email Id <span class="cRed">*</span></label>
                                                    <div class="col-sm-9">
                                                        <?php echo $this->Form->control('email', array('type'=>'email', 'placeholder'=>'Enter firm email id','value'=>$section_form_details[0]['email'], 'id'=>'email', 'class'=>'form-control input-field', 'label'=>false)); ?>
                                                        <span id="error_email" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Mobile No. <span class="cRed">*</span></label>
                                                    <div class="col-sm-9">
                                                        <?php echo $this->Form->control('mobile_no', array('type'=>'text', 'placeholder'=>'Enter mobile no. here', 'id'=>'mobile_no','value'=>$section_form_details[0]['mobile_no'], 'class'=>'form-control input-field', 'label'=>false)); ?>
                                                        <span id="error_mobile_no" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Permitted packaging material <span class="cRed">*</span></label>
                                                    <div class="col-sm-9">
                                                        <?php echo $this->Form->control('packaging_material', array('type'=>'text', 'placeholder'=>'Enter packaging material','value'=>$section_form_details[0]['packaging_material'], 'id'=>'packaging_material', 'class'=>'form-control input-field', 'label'=>false)); ?>
                                                        <span id="error_packaging_material" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label"> Permission valid upto. 	</label>
                                                    <div class="col-sm-9">
                                                        <?php echo $this->Form->control('valid_upto', array('type'=>'text', 'id'=>'valid_upto', 'escape'=>false, 'placeholder'=>'Enter DD/MM/YYYY', 'maxlength'=>'10', 'minlength'=>'10','value'=>$section_form_details[0]['valid_upto'], 'class'=>'cvOn cvReq cvDate form-control', 'disabled'=>false, 'label'=>false)); ?>

                                                        <span id="error_valid_upto" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Address <span class="cRed">*</span></label>
                                                    <div class="col-sm-9">
                                                        <?php echo $this->Form->control('street_address', array('type'=>'textarea', 'id'=>'street_address','value'=>$section_form_details[0]['street_address'], 'placeholder'=>'Enter street address', 'class'=>'form-control input-field', 'label'=>false)); ?>
                                                        <span id="error_street_address" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Registered Office<span class="cRed">*</span></label>
                                                    <div class="col-sm-9">
                                                        <?php echo $this->Form->control('registered_office', array('type'=>'text','value'=>$section_form_details[0]['registered_office'], 'placeholder'=>'Enter registered office', 'id'=>'registered_office', 'class'=>'form-control input-field', 'label'=>false)); ?>
                                                        <span id="error_registered_office" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Printing Press premises.</label>
                                                    <div class="col-sm-9">
                                                        <?php echo $this->Form->control('press_premises', array('type'=>'text', 'placeholder'=>'Enter Printing Press premises', 'id'=>'press_premises','value'=>$section_form_details[0]['press_premises'], 'class'=>'form-control input-field', 'label'=>false)); ?>
                                                        <span id="error_press_premises" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             <div class="card-header sub-card-header-firm"><h3 class="card-title">List of packers granted permission to print Agmark Replica by the printing press</h3></div>
                             <?php echo $this->element('rti_addmore_element/rti_list_of_packers_granted_element'); ?>
                               <div class="card-header sub-card-header-firm"><h3 class="card-title">Available stock of printed packaging material with Agmark replica (packer wise)</h3></div>
                            <?php echo $this->element('rti_addmore_element/rti_addmore_element_pp'); ?>
                                <div class="card-header sub-card-header-firm"><h3 class="card-title"> </h3></div>
                                    <div class="form-horizontal">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-6 col-form-label"> Whether the printed material as in column 6 above is in order as per physical check<span class="cRed">*</span></label>
                                                        <?php
                                                            $i=1;
                                                            $physical_check = $section_form_details[0]['physical_check'];
                                                            
                                                                if($physical_check == 'yes'){
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
                                                                <input type="radio" name="physical_check" checked="" id="physical_check-yes" value="yes" <?php echo $checked_yes; ?>>
                                                                <label for="physical_check-yes">Yes
                                                                </label>
                                                            </div>
                                                            <div class=" d-inline">
                                                                <input type="radio" name="physical_check" id="physical_check-no" value="no" <?php echo $checked_no; ?>>
                                                                <label for="physical_check-no">No
                                                                </label>
                                                            </div>
                                                            <span id="error_physical_check" class="error invalid-feedback"></span>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-3 col-form-label">The printing press is printing<span class="cRed">*</span></label>
                                                        <?php
                                                            $i=1;
                                                            $is_printing = $section_form_details[0]['is_printing'];
                                                            
                                                                if($is_printing == 'Bar code'){
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
                                                                <input type="radio" name="is_printing" checked="" id="is_printing-bc" value="Bar code" <?php echo $checked_yes; ?>>
                                                                <label for="is_printing-bc">Bar code
                                                                </label>
                                                            </div>
                                                            <div class=" d-inline">
                                                                <input type="radio" name="is_printing" id="is_printing-rn" value="Agmark replica serial number" <?php echo $checked_no; ?>>
                                                                <label for="is_printing-rn">Agmark replica Sn.
                                                                </label>
                                                            </div>
                                                            <span id="error_is_printing-rn" class="error invalid-feedback"></span>
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
                                                        <label for="" class="col-sm-6 col-form-label">house storage facilities for security and safe custody of printing and printed material. <span class="cRed">*</span></label>
                                                            <?php
                                                            $i=1;
                                                            $storage_facilities = $section_form_details[0]['storage_facilities'];
                                                            
                                                                if($storage_facilities == 'yes'){
                                                                    $checked_yes = 'checked';
                                                                    $checked_no = '';
                                                                } else {

                                                                    $checked_yes = '';
                                                                    $checked_no = 'checked';
                                                                }
                                                                $i++;
                                                            ?>
                                                        <div class=" d-inline">
                                                                <input type="radio" name="storage_facilities" checked="" id="storage_facilities-yes" value="yes" <?php echo $checked_yes; ?>>
                                                                <label for="storage_facilities-yes">Yes
                                                                </label>
                                                            </div>
                                                            <div class=" d-inline">
                                                                <input type="radio" name="storage_facilities" id="storage_facilities-no" value="no" <?php echo $checked_no; ?>>
                                                                <label for="storage_facilities-no">No
                                                                </label>
                                                            </div>
                                                            <span id="error_storage_facilities" class="error invalid-feedback"></span>
                                                        </div>
                                                    </div>
                                                <div class="col-sm-6">
                                                <div class="form-group row">
                                                        <label for="" class="col-sm-6 col-form-label">Is the laboratory properly equipped<span class="cRed">*</span></label>
                                                        <?php
                                                            $i=1;
                                                            $lab_properly_equipped = $section_form_details[0]['lab_properly_equipped'];
                                                            
                                                                if($lab_properly_equipped == 'yes'){
                                                                    $checked_yes = 'checked';
                                                                    $checked_no = '';
                                                                } else {

                                                                    $checked_yes = '';
                                                                    $checked_no = 'checked';
                                                                }
                                                                $i++;
                                                            ?>
                                                        <div class=" d-inline">
                                                                <input type="radio" name="lab_properly_equipped" checked="" id="lab_properly_equipped-yes" value="yes" <?php echo $checked_yes; ?>>
                                                                <label for="lab_properly_equipped-yes">Yes
                                                                </label>
                                                            </div>
                                                            <div class=" d-inline">
                                                                <input type="radio" name="lab_properly_equipped" id="lab_properly_equipped-no" value="no" <?php echo $checked_no; ?>>
                                                                <label for="lab_properly_equipped-no">No
                                                                </label>
                                                            </div>
                                                        <span id="error_lab_properly_equipped" class="error invalid-feedback"></span>
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
                                                        <label for="" class="col-sm-9 col-form-label">The printing press maintains proper accounts for printing orders received, executed and send monthly invoice records to concerned RO/SO.<span class="cRed">*</span></label>
                                                        <?php
                                                                $i=1;
                                                                $maintains_proper = $section_form_details[0]['maintains_proper'];
                                                                
                                                                    if($maintains_proper == 'yes'){
                                                                        $checked_yes = 'checked';
                                                                        $checked_no = '';
                                                                    } else {

                                                                        $checked_yes = '';
                                                                        $checked_no = 'checked';
                                                                    }
                                                                    $i++;
                                                                ?>
                                                            <div class=" d-inline">
                                                                <input type="radio" name="maintains_proper" checked="" id="maintains_proper-yes" value="yes" <?php echo $checked_yes; ?>>
                                                                <label for="maintains_proper-yes">Yes
                                                                </label>
                                                            </div>
                                                            <div class=" d-inline">
                                                                <input type="radio" name="maintains_proper" id="maintains_proper-no" value="no" <?php echo $checked_no; ?>>
                                                                <label for="maintains_proper-no">No
                                                                </label>
                                                            </div>
                                                        <span id="error_maintains_proper" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                            <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="" class="col-sm-9 col-form-label">Whether press is using right quality of printing ink and food grade packaging material. (Check Certificates)<span class="cRed">*</span></label>
                                                            <?php
                                                                $i=1;
                                                                $right_quality_of_printing = $section_form_details[0]['right_quality_of_printing'];
                                                                
                                                                    if($right_quality_of_printing == 'yes'){
                                                                        $checked_yes = 'checked';
                                                                        $checked_no = '';
                                                                    } else {

                                                                        $checked_yes = '';
                                                                        $checked_no = 'checked';
                                                                    }
                                                                    $i++;
                                                                ?>
                                                            <div class=" d-inline">
                                                                <input type="radio" name="right_quality_of_printing" checked="" id="right_quality_of_printing-yes" value="yes" <?php echo $checked_yes; ?>>
                                                                <label for="right_quality_of_printing-yes">Yes
                                                                </label>
                                                            </div>
                                                            <div class=" d-inline">
                                                                <input type="radio" name="right_quality_of_printing" id="right_quality_of_printing-no" value="no" <?php echo $checked_no; ?>>
                                                                <label for="right_quality_of_printing-no">No
                                                                </label>
                                                            </div>
                                                        <span id="error_right_quality_of_printing" class="error invalid-feedback"></span>
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
                                                            <label for="" class="col-sm-9 col-form-label">Whether the printing press is marking logo of printing unit on packaging material.<span class="cRed">*</span></label>
                                                                <?php
                                                                    $i=1;
                                                                    $press_is_marking_logo = $section_form_details[0]['press_is_marking_logo'];
                                                                    
                                                                        if($press_is_marking_logo == 'yes'){
                                                                            $checked_yes = 'checked';
                                                                            $checked_no = '';
                                                                        } else {

                                                                            $checked_yes = '';
                                                                            $checked_no = 'checked';
                                                                        }
                                                                        $i++;
                                                                    ?>
                                                                <div class=" d-inline">
                                                                    <input type="radio" name="press_is_marking_logo" checked="" id="press_is_marking_logo-yes" value="yes" <?php echo $checked_yes; ?>>
                                                                    <label for="press_is_marking_logo-yes">Yes
                                                                    </label>
                                                                </div>
                                                                <div class=" d-inline">
                                                                    <input type="radio" name="press_is_marking_logo" id="press_is_marking_logo-no" value="no" <?php echo $checked_no; ?>>
                                                                    <label for="press_is_marking_logo-no">No
                                                                    </label>
                                                                </div>
                                                            <span id="error_press_is_marking_logo" class="error invalid-feedback"></span>
                                                        </div>
                                                    </div>
                                                <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-9 col-form-label">Suggestions given during the last inspection, If any & whether corrective actions taken<span class="cRed">*</span></label>
                                                            <div class="col-sm-9">
                                                                    <?php echo $this->Form->control('last_insp_suggestion', array('type'=>'text', 'id'=>'last_insp_suggestion', 'class'=>'form-control input-field', 'placeholder'=>'Enter Suggestions given during the last inspection','value'=>$section_form_details[0]['last_insp_suggestion'],  'label'=>false)); ?>
                                                                    <span id="error_last_insp_suggestion" class="error invalid-feedback"></span>
                                                                </div>
                                                            <span id="error_concerned_offices" class="error invalid-feedback"></span>
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
                                                            <label for="" class="col-sm- col-form-label">Shortcomings observed during the present Inspection. <span class="cRed">*</span></label>
                                                            <?php
                                                                $i=1;
                                                                $short_obserd = $section_form_details[0]['short_obserd'];
                                                                
                                                                    if($short_obserd == 'yes'){
                                                                        $checked_yes = 'checked';
                                                                        $checked_no = '';
                                                                    } else {

                                                                        $checked_yes = '';
                                                                        $checked_no = 'checked';
                                                                    }
                                                                    $i++;
                                                                ?>
                                                                <div class=" d-inline">
                                                                    <input type="radio" name="short_obserd" checked="" id="short_obserd-yes" value="yes" <?php echo $checked_yes; ?>>
                                                                    <label for="short_obserd-yes">Yes
                                                                    </label>
                                                                </div>
                                                                <div class=" d-inline">
                                                                    <input type="radio" name="short_obserd" id="short_obserd-no" value="no" <?php echo $checked_no; ?>>
                                                                    <label for="short_obserd-no">No
                                                                    </label>
                                                                </div>
                                                                    <span id="error_short_obserd" class="error invalid-feedback"></span>
                                                            </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-12 col-form-label">Suggestions, if any.<span class="cRed">*</span></label>
                                                            <div class="col-sm-9">
                                                                <?php echo $this->Form->control('if_any_sugg', array('type'=>'textarea', 'id'=>'if_any_sugg','value'=>$section_form_details[0]['if_any_sugg'], 'class'=>'form-control input-field', 'placeholder'=>'Enter Suggestions, if any', 'label'=>false)); ?>
                                                                <span id="error_if_any_sugg" class="error invalid-feedback"></span>
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
                                                                    <label for="" class="col-sm-6 col-form-label">Signature and name of the authorized person Officer of the printing press or any representative</label>
                                                                    <div class="custom-file col-sm-6">
                                                                        <?php if($section_form_details[0]['signature'] != null){?>
                                                                        <a target="blank" id="signature_docs_value" href="<?php echo str_replace("D:/xampp/htdocs","",$section_form_details[0]['signature']); ?>">Preview</a>
                                                                        <?php } ?>
                                                                        <?php echo $this->Form->control('signature',array('type'=>'file', 'id'=>'signature', 'multiple'=>'multiple', 'label'=>false, 'class'=>'form-control wd100')); ?>
                                                                        <span id="error_signature" class="error invalid-feedback"></span>
                                                                        <span id="error_size_signature" class="error invalid-feedback"></span>
                                                                        <span id="error_type_signature" class="error invalid-feedback"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group row">
                                                                    <label for="" class="col-sm-6 col-form-label">Signature of Inspection with official Stamp</label>
                                                                    <div class="custom-file col-sm-6">
                                                                        <?php if($section_form_details[0]['signature_name'] != null){?>
                                                                        <a target="blank" id="signature_name_docs_value" href="<?php echo str_replace("D:/xampp/htdocs","",$section_form_details[0]['signature']); ?>">Preview</a>
                                                                        <?php } ?>
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
<?php
	echo $this->Html->css('multiselect/jquery.multiselect');
	echo $this->Html->script('multiselect/jquery.multiselect');
	echo $this->Html->script('routininspection/routin_inspection');
    echo $this->Html->script('routininspection/routine_inspection_add_more_pp');
    
?>

