 <!-- start table -->
 <?php
  //  pr($section_form_details);die;
 ?>
<div class="row">
  <div class="col-md-12 ">
    <div class="table-format">
        <table id="grading_table" class="table table-bordered table-striped table-responsive">
              <tr>
                  <th colspan="6" class="border-bottom">Regional Office/Sub-Office: <?php echo isset($section_form_details[5])?$section_form_details[5]:"NA"; ?></th>
                  <th colspan="6" class="border-bottom">State : <?php echo isset($section_form_details[4])?$section_form_details[4]:"NA"; ?></th>
                  <th colspan="6" class="border-bottom"></th>
              </tr>
              <tr>
                  <th colspan="3" class="border-bottom">Name of Packer with address and e-mail id:</th>
                  <th colspan="3" class="border-bottom ">Name : <?php echo isset($section_form_details[1])?$section_form_details[1]:"NA"; ?></th>
                  <th colspan="3" class="border-bottom ">Email : <?php echo base64_decode(isset($section_form_details[2])?$section_form_details[2]:"NA"); ?></th>
                  <th colspan="3" class="border-bottom ">Address : <?php echo isset($section_form_details[3])?$section_form_details[3]:"NA" ?></th>
              </tr>
              <tr>
                  <th colspan="3" class="border-bottom">Period: From <?php echo $section_form_details[7]; ?> </th>
                  <th colspan="3" class="border-bottom">Period: To <?php echo $section_form_details[7]; ?> </th>
                  <th colspan="6" class="border-bottom">
                     Type: <?php echo ($section_form_details[6] == "yes") ? "Export" : "Domestic"; ?>
                  </th>
                  </th>
                  <th></th>
              </tr>
               <tr>
                  <th colspan="6" class="border-bottom">Total Revenue (In. Rs.):</th>
                  <th colspan="6" class="border-bottom">Progressive Revenue (In Rs.):</th>
                  <th></th>
              </tr>
              
              <tr>
                <th class="tablehead">Sr.No.</th>
                <th class="tablehead wdth">Commodity</th>
                <th class="tablehead wdth">Lot No.TF No./M. No.</th>
                <th class="tablehead wdth">Date of sampling</th>
                <th class="tablehead wdth">Date of packing</th>
                <th class="tablehead wdth">Grade assigned</th>
                <th class="tablehead wdth">Pack Size</th>
                <th class="tablehead wdth">Total No. of packages</th>
                <th class="tablehead wdth">Total Qty. graded in Quintal</th>
                <th class="tablehead wdth">Estimated value (in Rs.)</th>
                <th class="tablehead wdth">No. of Agmark Replica/labels issued</th>
                <th class="tablehead wdth">Replica Charges</th>
                <th class="tablehead wdth">Action</th>
              </tr>
          <div id="statement_each_row">
            <?php 
              $i=1;$section_form_details[1] = [];
              foreach ($section_form_details[1] as $each_statement) { ?>
                <tr>
                  <td><?php //echo $i; ?></td>
                  <td><?php //echo $each_statement['date']; ?></td>
                  <td><?php //echo isset($section_form_details[2][$each_statement['commodity']])?$section_form_details[2][$each_statement['commodity']]:"-"; ?></td>
                  <td><?php //echo $each_statement['approved_tbl_brand']; ?></td>
                  <td><?php //echo $each_statement['agmark_grade']; ?></td>
                  <td><?php //echo $each_statement['pack_size']; ?></td>
                  <td><?php //echo $each_statement['from_a']; ?></td>
                  <td><?php //echo $each_statement['to_a']; ?></td>
                  <td><?php //echo $each_statement['total_a']; ?></td>
                  <td><?php //echo $each_statement['from_b']; ?></td>
                  <td><?php //echo $each_statement['to_b']; ?></td>
                  <td><?php //echo $each_statement['to_b']; ?></td>
                  <td>
                    <a href="#" class="edit_bgr_id glyphicon glyphicon-edit machine_edit" id="<?php //echo $each_statement['id']; ?>" ></a> |
                    <a href="#" class="delete_bgr_id glyphicon glyphicon-remove-sign machine_delete" id="<?php //echo $each_statement['id']; ?>" ></a>
                  </td>
                </tr>
              <?php $i=$i+1; } ?>
            
              <div id="error_replica" class="text-red float-right text-sm"></div>

              <!-- for edit bgr details -->
              <?php if ($this->request->getSession()->read('edit_bgr_id') != null) { ?>
                <tr>
                  <td></td>
                  <td><?php echo $this->Form->control('date', array('type'=>'text', 'id'=>'date', 'value'=>'', 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>

                  <td><?php $abc = ['asd','asdasd'];
                  echo $this->Form->control('commodity', array('type'=>'select', 'empty'=>'Select Commodity', 'id'=>'commodity','options'=>$abc,'value'=>'', 'label'=>false, 'class'=>'form-control wd120')); ?></td>

                  <td><?php echo $this->Form->control('approved_tbl_brand', array('type'=>'text', 'id'=>'approved_tbl_brand', 'value'=>'', 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td><?php echo $this->Form->control('agmark_grade', array('type'=>'text', 'id'=>'agmark_grade', 'value'=>'', 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td><?php echo $this->Form->control('pack_size', array('type'=>'text', 'id'=>'pack_size', 'value'=>'', 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td><?php echo $this->Form->control('from_a', array('type'=>'text', 'id'=>'from_a', 'value'=>'', 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td><?php echo $this->Form->control('to_a', array('type'=>'text', 'id'=>'to_a', 'value'=>'', 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td><?php echo $this->Form->control('total_a', array('type'=>'text', 'id'=>'total_a', 'value'=>'', 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td><?php echo $this->Form->control('from_b', array('type'=>'text', 'id'=>'from_b', 'value'=>'', 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td><?php echo $this->Form->control('to_b', array('type'=>'text', 'id'=>'to_b', 'value'=>'', 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td>
                    <div class="form-buttons"><a href="#" id="save_statement_details" class="btn btn-info btn-sm">Save</a></div>
                    <?php echo $this->form->submit('save', array('name'=>'edit_machine_details', 'id'=>'edit_machine_details', 'onclick'=>'validate_machinery_details();return false', 'label'=>false)); ?>
                  </td>
                </tr>

              <!-- To show added and save new bgr details -->
              <?php } else { ?>
                  <div id="add_new_row">
                    <tr>
                      <td></td>
                      <td >
                      <?php echo $this->Form->control('date', array('type'=>'text', 'escape'=>false, 'id'=>'date', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'Select date')); ?>
                      <span id="error_date" class="error invalid-feedback"></span>
                  </td>
                  <td>
                        <?php $section_form_details[2] = ['abc'];
                        echo $this->Form->control('commodity', array('type'=>'select', 'empty'=>'Select Commodity', 'id'=>'commodity','options'=>$section_form_details[2], 'label'=>false, 'class'=>'form-control wd120')); ?>
                        <span id="error_commodity" class="error invalid-feedback"></span>
                  </td>
                  <td>
                        <?php echo $this->Form->control('approved_tbl_brand', array('type'=>'text', 'escape'=>false, 'id'=>'approved_tbl_brand', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'Enter Approved tbl brand')); ?>
                        <span id="error_approved_tbl_brand" class="error invalid-feedback"></span>
                  </td>
                  <td>
                        <?php echo $this->Form->control('agmark_grade', array('type'=>'text', 'escape'=>false, 'id'=>'agmark_grade', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'Enter Agmark Grade')); ?>
                        <span id="error_agmark_grade" class="error invalid-feedback"></span>
                  </td>
                  <td>
                        <?php echo $this->Form->control('pack_size', array('type'=>'text', 'escape'=>false, 'id'=>'pack_size', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'Enter pack size')); ?>
                        <span id="error_pack_size" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php echo $this->Form->control('from_a', array('type'=>'text', 'escape'=>false, 'id'=>'from_a', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'From')); ?>
                      <span id="error_from_a" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php echo $this->Form->control('to_a', array('type'=>'text', 'escape'=>false, 'id'=>'to_a', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'To')); ?>
                      <span id="error_to_a" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php echo $this->Form->control('total_a', array('type'=>'text', 'escape'=>false, 'id'=>'total_a', 'label'=>false, 'class'=>'form-control input-field txtCal wd120','placeholder'=>'0.00')); ?>
                      <span id="error_total_a" class="error invalid-feedback"></span>
                  </td>
                  <td>
                        <?php echo $this->Form->control('from_b', array('type'=>'text', 'escape'=>false, 'id'=>'from_b', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'From')); ?>
                      <span id="error_from_b" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php echo $this->Form->control('to_b', array('type'=>'text', 'escape'=>false, 'id'=>'to_b', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'To')); ?>
                      <span id="error_to_b" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php echo $this->Form->control('to_b', array('type'=>'text', 'escape'=>false, 'id'=>'to_b', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'To')); ?>
                      <span id="error_to_b" class="error invalid-feedback"></span>
                  </td>
                      <td>
                        <div class="form-buttons"><a href="#" id="add_replica_details" class='table_record_add_btn btn btn-info btn-sm'><i class="fa fa-plus"></i> Add</a></div>
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