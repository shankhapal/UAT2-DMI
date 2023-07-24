 <!-- start table -->
 <?php 
 //set bydefault null
 //$editstatementid = $this->request->getSession()->read('edit_statement_id');
 //$editstatementid = $_SESSION['edit_statement_id'];
//  if(!empty($_SESSION['edit_statement_id'])){
//   $_SESSION['edit_statement_id'] = null;
//  }
// $edfsd = $this->request->getSession()->write('edit_statement_id') = null;
  
 ?>
<div class="row">
  <div class="col-md-12 ">
    <div class="table-format">
        <table id="replica_table" class="table table-bordered table-striped table-responsive">
              <tr>
                  <th colspan="6" class="border-bottom">Regional Office/Sub-Office:</th>
                  <th colspan="6" class="border-bottom">State:</th>
              </tr>
              <tr>
                  <th colspan="6" class="border-bottom">Name of Packer with address and e-mail id:</th>
              </tr>
              <tr>
                  <th colspan="6" class="border-bottom">Period: From mmddyy to mmddyy:</th>
                  <th colspan="6" class="border-bottom">Type: Domestic/export:</th>
              </tr>
               <tr>
                  <th colspan="6" class="border-bottom">Total Revenue (In. Rs.):</th>
                  <th colspan="6" class="border-bottom">Progressive Revenue (In Rs.):</th>
              </tr>
              <tr>
                <th class="tablehead">Sr.No.</th>
                <th class="tablehead">Date</th>
                <th class="tablehead">Commodity</th>
                <th class="tablehead">Name of Approved TBL (Brand)</th>
                <th class="tablehead">Agmark Grade</th>
                <th class="tablehead">Pack Size</th>
                <th class="tablehead">From</th>
                <th class="tablehead">To</th>
                <th class="tablehead">Total</th>
                <th class="tablehead">From</th>
                <th class="tablehead">To</th>
                <th class="tablehead">Action</th>
              </tr>
          <div id="statement_each_row">
            <?php 
              $i=1;
              //foreach ($section_form_details[1] as $each_statement) { ?>
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
                  <td>
                    <a href="#" class="edit_statement_id glyphicon glyphicon-edit machine_edit" id="<?php //echo $each_statement['id']; ?>" ></a> |
                    <a href="#" class="delete_statement_id glyphicon glyphicon-remove-sign machine_delete" id="<?php //echo $each_statement['id']; ?>" ></a>
                  </td>
                </tr>
              <?php //$i=$i+1; } ?>
            
              <div id="error_replica" class="text-red float-right text-sm"></div>

              <!-- for edit machine details -->
              <?php if ($this->request->getSession()->read('edit_statement_id') != null) { ?>
                <tr>
                  <td></td>
                  <td><?php //echo $this->Form->control('date', array('type'=>'text', 'id'=>'date', 'value'=>$find_statement_details['date'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>

                  <td><?php //echo $this->Form->control('commodity', array('type'=>'select', 'empty'=>'Select Commodity', 'id'=>'commodity','options'=>$section_form_details[2],'value'=>$find_statement_details['commodity'], 'label'=>false, 'class'=>'form-control wd120')); ?></td>

                  <td><?php //echo $this->Form->control('approved_tbl_brand', array('type'=>'text', 'id'=>'approved_tbl_brand', 'value'=>$find_statement_details['approved_tbl_brand'], 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td><?php //echo $this->Form->control('agmark_grade', array('type'=>'text', 'id'=>'agmark_grade', 'value'=>$find_statement_details['agmark_grade'], 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td><?php //echo $this->Form->control('pack_size', array('type'=>'text', 'id'=>'pack_size', 'value'=>$find_statement_details['pack_size'], 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td><?php //echo $this->Form->control('from_a', array('type'=>'text', 'id'=>'from_a', 'value'=>$find_statement_details['from_a'], 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td><?php //echo $this->Form->control('to_a', array('type'=>'text', 'id'=>'to_a', 'value'=>$find_statement_details['to_a'], 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td><?php //echo $this->Form->control('total_a', array('type'=>'text', 'id'=>'total_a', 'value'=>$find_statement_details['total_a'], 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td><?php //echo $this->Form->control('from_b', array('type'=>'text', 'id'=>'from_b', 'value'=>$find_statement_details['from_b'], 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td><?php //echo $this->Form->control('to_b', array('type'=>'text', 'id'=>'to_b', 'value'=>$find_statement_details['to_b'], 'escape'=>false, 'class'=>'form-control input-field wd120', 'label'=>false)); ?></td>

                  <td>
                    <div class="form-buttons"><a href="#" id="save_statement_details" class="btn btn-info btn-sm">Save</a></div>
                    <?php ////echo $this->form->submit('save', array('name'=>'edit_machine_details', 'id'=>'edit_machine_details', 'onclick'=>'validate_machinery_details();return false', 'label'=>false)); ?>
                  </td>
                </tr>

              <!-- To show added and save new machine details -->
              <?php } else { ?>
                  <div id="add_new_row">
                    <tr>
                      <td></td>
                      <td >
                      <?php //echo $this->Form->control('date', array('type'=>'text', 'escape'=>false, 'id'=>'date', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'Select date')); ?>
                      <span id="error_date" class="error invalid-feedback"></span>
                  </td>
                  <td>
                        <?php //echo $this->Form->control('commodity', array('type'=>'select', 'empty'=>'Select Commodity', 'id'=>'commodity','options'=>$section_form_details[2], 'label'=>false, 'class'=>'form-control wd120')); ?>
                        <span id="error_commodity" class="error invalid-feedback"></span>
                  </td>
                  <td>
                        <?php //echo $this->Form->control('approved_tbl_brand', array('type'=>'text', 'escape'=>false, 'id'=>'approved_tbl_brand', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'Enter Approved tbl brand')); ?>
                        <span id="error_approved_tbl_brand" class="error invalid-feedback"></span>
                  </td>
                  <td>
                        <?php //echo $this->Form->control('agmark_grade', array('type'=>'text', 'escape'=>false, 'id'=>'agmark_grade', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'Enter Agmark Grade')); ?>
                        <span id="error_agmark_grade" class="error invalid-feedback"></span>
                  </td>
                  <td>
                        <?php //echo $this->Form->control('pack_size', array('type'=>'text', 'escape'=>false, 'id'=>'pack_size', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'Enter pack size')); ?>
                        <span id="error_pack_size" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php //echo $this->Form->control('from_a', array('type'=>'text', 'escape'=>false, 'id'=>'from_a', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'From')); ?>
                      <span id="error_from_a" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php //echo $this->Form->control('to_a', array('type'=>'text', 'escape'=>false, 'id'=>'to_a', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'To')); ?>
                      <span id="error_to_a" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php //echo $this->Form->control('total_a', array('type'=>'text', 'escape'=>false, 'id'=>'total_a', 'label'=>false, 'class'=>'form-control input-field txtCal wd120','placeholder'=>'0.00')); ?>
                      <span id="error_total_a" class="error invalid-feedback"></span>
                  </td>
                  <td>
                        <?php //echo $this->Form->control('from_b', array('type'=>'text', 'escape'=>false, 'id'=>'from_b', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'From')); ?>
                      <span id="error_from_b" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php //echo $this->Form->control('to_b', array('type'=>'text', 'escape'=>false, 'id'=>'to_b', 'label'=>false, 'class'=>'form-control input-field wd120','placeholder'=>'To')); ?>
                      <span id="error_to_b" class="error invalid-feedback"></span>
                  </td>
                      <td>
                        <div class="form-buttons"><a href="#" id="add_replica_details" class='table_record_add_btn btn btn-info btn-sm'><i class="fa fa-plus"></i> Add</a></div>
                        <?php ////echo $this->form->submit('Add', array('name'=>'add_machine_details', 'id'=>'add_machine_details', 'onclick'=>'validate_machinery_details();return false', 'label'=>false)); ?>
                      </td>
                    </tr>
                    <!-- <div id="error_machine_name"></div>
                    <div id="error_machine_type"></div>
                    <div id="error_machine_no"></div>
                    <div id="error_machine_capacity"></div> -->
                  </div>
            <?php } ?>
          </div>
        </table>
      </div>
    </div>
  </div>
        
<!-- end table -->