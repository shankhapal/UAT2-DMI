 <!-- start table -->
<div class="row">
  <div class="col-md-12 ">
    <div class="table-format">
        <table id="food_safety_table" class="table table-bordered table-striped table-responsive">
              <tr>
                <th class="tablehead">Sr.No.</th>
                <th class="tablehead">Lot No.</th>
                <th class="tablehead">Packing Date</th>
                <th class="tablehead">Name of Laboratory which tested the samples</th>
                <th class="tablehead">Report no. and Date</th>
                <th class="tablehead">Remarks (if any)</th>
                <th class="tablehead">Action</th>
              </tr>
          <div id="statement_each_row">
            <?php 
                $i=1;
              foreach ($section_form_details[1] as $each_food) { ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $each_food['lot_no']; ?></td>
                  <td><?php echo $each_food['packing_date']; ?></td>
                  <td><?php echo $each_food['name_of_lab']; ?></td>
                  <td><?php echo $each_food['report_no_date']; ?></td>
                  <td><?php echo $each_food['remarks']; ?></td>
                  <td>
                    <a href="#" class="edit_food_id glyphicon glyphicon-edit machine_edit" id="<?php echo $each_food['id']; ?>" ></a> |
                    <a href="#" class="delete_food_id glyphicon glyphicon-remove-sign machine_delete" id="<?php echo $each_food['id']; ?>" ></a>
                  </td>
                </tr>
              <?php $i=$i+1; } ?>
            
              <div id="error_food" class="text-red float-right text-sm"></div>

              <!-- for edit machine details -->
              <?php if ($this->request->getSession()->read('edit_food_id') != null) { ?>
                <tr>
                  <td></td>
                  <td><?php echo $this->Form->control('lot_no', array('type'=>'text', 'id'=>'lot_no', 'value'=>$find_food_safety_details['lot_no'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>

                  <td><?php echo $this->Form->control('packing_date', array('type'=>'text', 'id'=>'packing_date', 'value'=>$find_food_safety_details['packing_date'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>

                  <td><?php echo $this->Form->control('name_of_lab', array('type'=>'text', 'id'=>'name_of_lab', 'value'=>$find_food_safety_details['name_of_lab'], 'escape'=>false, 'class'=>'form-control input-field', 'label'=>false)); ?></td>

                   <td><?php echo $this->Form->control('report_no_date', array('type'=>'text', 'id'=>'report_no_date', 'value'=>$find_food_safety_details['report_no_date'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>

                   <td><?php echo $this->Form->control('remarks', array('type'=>'textarea', 'id'=>'remarks', 'value'=>$find_food_safety_details['remarks'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>
                  <td>
                    <div class="form-buttons"><a href="#" id="save_food_details" class="btn btn-info btn-sm">Save</a></div>
                  </td>
                </tr>

              <!-- To show added and save new machine details -->
              <?php } else { ?>
                  <div id="add_new_row">
                    <tr>
                      <td></td>
                      <td>
                            <?php echo $this->Form->control('lot_no', array('type'=>'text', 'escape'=>false, 'id'=>'lot_no', 'label'=>false, 'class'=>'form-control wd120 input-field','placeholder'=>'Enter Lot No')); ?>
                            <span id="error_lot_no" class="error invalid-feedback"></span>
                      </td>
                      <td>
                            <?php echo $this->Form->control('packing_date', array('type'=>'text', 'escape'=>false, 'id'=>'packing_date', 'label'=>false, 'class'=>'form-control wd120 input-field','placeholder'=>'Select Packing Date')); ?>
                            <span id="error_packing_date" class="error invalid-feedback"></span>
                      </td>
                      <td>
                          <?php echo $this->Form->control('name_of_lab', array('type'=>'text', 'escape'=>false, 'id'=>'name_of_lab', 'label'=>false, 'class'=>'form-control  input-field ','placeholder'=>'Enter Name of Laboratory which tested the samples')); ?>
                          <span id="error_name_of_lab" class="error invalid-feedback"></span>
                      </td>
                      <td>
                          <?php echo $this->Form->control('report_no_date', array('type'=>'text', 'escape'=>false, 'id'=>'report_no_date', 'label'=>false, 'class'=>'form-control wd120 input-field','placeholder'=>'Enter Report no. and Date')); ?>
                          <span id="error_report_no_date" class="error invalid-feedback"></span>
                      </td>
                      <td>
                          <?php echo $this->Form->control('remarks', array('type'=>'textarea', 'escape'=>false, 'id'=>'remarks', 'label'=>false, 'class'=>'form-control wd120 input-field ','placeholder'=>'Enter Remarks')); ?>
                          <span id="error_remarks" class="error invalid-feedback"></span>
                      </td>
                  <td>
                    <div class="form-buttons"><a href="#" id="add_food_details" class='table_record_add_btn btn btn-info btn-sm'><i class="fa fa-plus"></i> Add</a></div>
                  </td>
                    </tr>
                  </div>
            <?php } ?>
          </div>
        </table>
      </div>
    </div>
  </div>
        
<!-- end table -->