<?php 
?>

<div class="table-format">
  <table id="analysis_table" class="table table-bordered table-striped table-responsive ">
    <tr>
      <th class="tablehead">Sr.No.</th>
      <th class="tablehead">Date</th>
      <th class="tablehead">Commodity</th>
      <th class="tablehead">Batch No./Melt No.</th>
      <th class="tablehead">Quantity</th>
      <th class="tablehead">Physical/Chemical Parameters/Specifications of the Analysed Commodity</th>
      <th class="tablehead">Grade</th>
      <th class="tablehead">Date of Analysis</th>
      <th class="tablehead">Remarks</th>
      <th class="tablehead">Action</th>
    </tr>

    <div id="machinery_each_row">
      <?php
        $i=1;
        
        foreach ($section_form_details[1] as $each_analysis) {  ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $each_analysis['report_date']; ?></td>
            <td><?php echo isset($section_form_details[2][$each_analysis['commodity']])?$section_form_details[2][$each_analysis['commodity']]:"-"; ?></td>
            <td><?php echo $each_analysis['batch_no']; ?></td>
            <td><?php echo $each_analysis['quantity']; ?></td>
            <td><?php 
                $chemical_para = explode(',',$each_analysis['chemical_parameters']);
                $i=0;
                
                foreach ($chemical_para as $value) {
                  
                if($value != ""){
                 
                    $comma_sep = $i!=0?',':"";
                  // echo $value;die;
                    if(empty($section_form_details[3])){
                       echo "No Parameters Avalable";
                       
                    }else{
                     echo $comma_sep.$section_form_details[3][$value];
                       $i+=1;
                    }
                   
                }else{
                  echo "-";
                }
                    
                }
            ?></td>
            <td><?php echo $each_analysis['analysis_grade']; ?></td>
            <td><?php echo $each_analysis['analysis_date']; ?></td>
            <td><?php echo $each_analysis['analysis_remark']; ?></td>
            <td>
              <a href="#" class="edit_analysis_id glyphicon glyphicon-edit analysis_edit" id="<?php echo $each_analysis['id']; ?>" ></a> |
              <a href="#" class="delete_analysis_id glyphicon glyphicon-remove-sign machine_delete" id="<?php echo $each_analysis['id']; ?>" ></a>
            </td>
          </tr>
        <?php $i=$i+1; } ?>
      
        <div id="error_analysis" class="text-red float-right text-sm"></div>

        <!-- for edit machine details -->
        <?php if ($this->request->getSession()->read('edit_analysis_id') != null) { ?>
          <tr>
            <td></td>
            <td><?php echo $this->Form->control('date', array('type'=>'text', 'escape'=>false,'value'=>$find_analysis_details['report_date'], 'id'=>'date', 'label'=>false, 'class'=>'form-control input-field wd120')); ?></td>

            <td><?php echo $this->Form->control('commodity', array('type'=>'select', 'empty'=>'Select Commodity', 'id'=>'commodity','options'=>$section_form_details[2],'value'=>$find_analysis_details['commodity'], 'label'=>false, 'class'=>'form-control wd120')); ?></td>
            <td>
              <?php echo $this->Form->control('batch_no', array('type'=>'text', 'escape'=>false,'value'=>$find_analysis_details['batch_no'], 'id'=>'batch_no', 'label'=>false, 'class'=>'form-control input-field wd120')); ?>
            </td>
            <td><?php echo $this->Form->control('quantity', array('type'=>'text', 'escape'=>false,'value'=>$find_analysis_details['quantity'], 'id'=>'quantity', 'label'=>false, 'class'=>'form-control input-field wd120')); ?></td>
            <td>
            
            
             <?php echo $this->Form->control('chemical_parameters', array('type'=>'select',  'value'=>$find_analysis_details['chemical_parameters'], 'options'=>$section_form_details[3],  'multiple'=>'multiple','escape'=>false, 'id'=>'chemical_parameters', 'label'=>false, 'class'=>'form-control wd100')); ?></td>

            <td><?php echo $this->Form->control('grade', array('type'=>'text', 'escape'=>false,'value'=>$find_analysis_details['analysis_grade'], 'id'=>'grade', 'label'=>false, 'class'=>'form-control input-field wd120')); ?></td>

             <td><?php echo $this->Form->control('analysis_date', array('type'=>'text', 'escape'=>false,'value'=>$find_analysis_details['analysis_date'], 'id'=>'analysis_date', 'label'=>false, 'class'=>'form-control input-field wd120')); ?></td>

            <td><?php echo $this->Form->control('analysis_remark', array('type'=>'text', 'escape'=>false,'value'=>$find_analysis_details['analysis_remark'], 'id'=>'remark', 'label'=>false, 'class'=>'form-control input-field wd120')); ?></td>
           
            <td>
              <div class="form-buttons"><a href="#" id="save_analysis_details" class="btn btn-info btn-sm">Save</a></div>
              <?php //echo $this->form->submit('save', array('name'=>'edit_machine_details', 'id'=>'edit_machine_details', 'onclick'=>'validate_machinery_details();return false', 'label'=>false)); ?>
            </td>
          </tr>

        <!-- To show added and save new machine details -->
        <?php } else { ?>
            <div id="add_new_row">
              <tr>
                <td></td>
                <td><?php echo $this->Form->control('date', array('type'=>'text', 'escape'=>false, 'id'=>'date', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'Select date')); ?>
                  <span class="error_date invalid-feedback" id="error_date"></
                </td>

                <td>	
                  <?php 
                echo $this->Form->control('commodity', array('type'=>'select', 'empty'=>'Select Commodity', 'id'=>'commodity','options'=>$section_form_details[2], 'label'=>false, 'class'=>'form-control wd120')); ?>
                  <span id="error_commodity" class="error invalid-feedback"></span>
                </td>

                <td><?php echo $this->Form->control('batch_no', array('type'=>'text', 'id'=>'batch_no', 'escape'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'Enter batch no.', 'label'=>false)); ?>
                  <span id="error_batch_no" class="error invalid-feedback"></span>
                </td>

                <td><?php echo $this->Form->control('quantity', array('type'=>'text', 'id'=>'quantity','placeholder'=>'Enter quantity', 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?>
                  <span id="error_quantity" class="error invalid-feedback"></span>
                </td>

                  <td>
                  <?php echo $this->Form->control('chemical_parameters', array('type'=>'select',  'options'=>$section_form_details[3],  'multiple'=>'multiple','escape'=>false, 'id'=>'chemical_parameters', 'label'=>false, 'class'=>'form-control wd120')); ?>
                  <span id="error_chemical_parameters" class="error invalid-feedback"></span>
                </td>

                <td><?php echo $this->Form->control('grade', array('type'=>'text', 'id'=>'grade', 'escape'=>false,'placeholder'=>'Enter grade', 'class'=>'form-control input-field wd120', 'label'=>false)); ?>
                  <span id="error_grade" class="error invalid-feedback"></span>
                </td>

                <td><?php echo $this->Form->control('analysis_date', array('type'=>'text', 'escape'=>false, 'id'=>'analysis_date', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'Select date')); ?>
                <span id="error_analysis_date" class="error invalid-feedback"></span>
                </td>

                  <td><?php echo $this->Form->control('remark', array('type'=>'text', 'id'=>'remark', 'escape'=>false,'placeholder'=>'Enter enter remark', 'class'=>'form-control input-field wd120', 'label'=>false)); ?>
                  <span id="error_remark" class="error invalid-feedback"></span>
                </td>

                <td>
                  <div class="form-buttons"><a href="#" id="add_analysis_details" class='table_record_add_btn btn btn-info btn-sm'><i class="fa fa-plus"></i> Add</a></div>
                </td>
              </tr>
            </div>
      <?php } ?>
    </div>
  </table>
  </div>
  
