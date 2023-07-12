 <!-- start table -->
<div class="row">
  <div class="col-md-12 ">
    <div class="table-format">
        <table id="revenue_table" class="table table-bordered table-striped table-responsive">
              <tr>
                <th class="tablehead">Sr.No.</th>
                <th class="tablehead">Commodity</th>
                <th class="tablehead">Name of Approved TBL (Brand)</th>
                <th class="tablehead">Grade Designation</th>
                <th class="tablehead">Batch No./Melt No./Lot No./T.F. No.</th>
                <th class="tablehead">Pack Size</th>
                <th class="tablehead">Total Quantity (in kg/ltr)</th>
                <th class="tablehead">Total Estimated Value (Rs)</th>
                <th class="tablehead">Agmark Opening Advance Replica Charges (in Rs.)</th>
                <th class="tablehead">Agmark Advance Replica Charges Fresh Amount Received (Rs.)</th>
                <th class="tablehead">Total Amount of Agmark Grading Charges adjusted for this lots/months (Rs.)</th>
                <th class="tablehead">Agmark Revenue closing balance of amount at credit (Rs.)</th>
                <th class="tablehead">Remarks (Bharat kosh/D.D. No./Bank Details with dates)</th>
                <th class="tablehead">Action</th>
              </tr>
          <div id="statement_each_row">
            <?php 
              $i=1;
              foreach ($section_form_details[1] as $each_statement) { ?>
                <tr>
                  <td><?php echo $i; ?></td>
                   <td><?php echo isset($section_form_details[2][$each_statement['commodity']])?$section_form_details[2][$each_statement['commodity']]:"-"; ?></td>
                  <td><?php echo $each_statement['approved_tbl_brand']; ?></td>
                  <td><?php echo $each_statement['grade_designation']; ?></td>
                  <td><?php echo $each_statement['bmlt_no']; ?></td>
                  <td><?php echo $each_statement['pack_size']; ?></td>
                  <td><?php echo $each_statement['total_quantity']; ?></td>
                  <td><?php echo $each_statement['total_estimated_value']; ?></td>
                  <td><?php echo $each_statement['agmark_advance_rc']; ?></td>
                  <td><?php echo $each_statement['agmark_rc_fresh_amt']; ?></td>
                  <td><?php echo $each_statement['total_amount']; ?></td>
                  <td><?php echo $each_statement['agmark_close_balance']; ?></td>
                  <td><?php echo $each_statement['remarks']; ?></td>
                  <td>
                    <a href="#" class="edit_statement_id glyphicon glyphicon-edit machine_edit" id="<?php echo $each_statement['id']; ?>" ></a> |
                    <a href="#" class="delete_statement_id glyphicon glyphicon-remove-sign machine_delete" id="<?php echo $each_statement['id']; ?>" ></a>
                  </td>
                </tr>
              <?php $i=$i+1; } ?>
            
              <div id="error_replica" class="text-red float-right text-sm"></div>

              <!-- for edit machine details -->
              <?php if ($this->request->getSession()->read('edit_statement_id') != null) { ?>
                <tr>
                  <td></td>
                  <td><?php echo $this->Form->control('commodity', array('type'=>'select', 'empty'=>'Select Commodity', 'id'=>'commodity','options'=>$section_form_details[2],'value'=>isset($find_statement_details['commodity'])?$find_statement_details['commodity']:"", 'label'=>false, 'class'=>'form-control wd120')); ?></td>
                  
                  

                  <td><?php echo $this->Form->control('approved_tbl_brand', array('type'=>'text', 'id'=>'approved_tbl_brand', 'value'=>$find_statement_details['approved_tbl_brand'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>

                  <td><?php echo $this->Form->control('grade_designation', array('type'=>'text', 'id'=>'grade_designation', 'value'=>$find_statement_details['grade_designation'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>

                  <td><?php echo $this->Form->control('bmlt_no', array('type'=>'text', 'id'=>'bmlt_no', 'value'=>$find_statement_details['bmlt_no'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>

                   <td><?php echo $this->Form->control('pack_size', array('type'=>'text', 'id'=>'pack_size', 'value'=>$find_statement_details['pack_size'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>

                   <td><?php echo $this->Form->control('total_quantity', array('type'=>'text', 'id'=>'total_quantity', 'value'=>$find_statement_details['total_quantity'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>
                 
                   <td><?php echo $this->Form->control('total_estimated_value', array('type'=>'text', 'id'=>'total_estimated_value', 'value'=>$find_statement_details['total_estimated_value'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>

                   <td><?php echo $this->Form->control('agmark_advance_rc', array('type'=>'text', 'id'=>'agmark_advance_rc', 'value'=>$find_statement_details['agmark_advance_rc'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>

                   <td><?php echo $this->Form->control('agmark_rc_fresh_amt', array('type'=>'text', 'id'=>'agmark_rc_fresh_amt', 'value'=>$find_statement_details['agmark_rc_fresh_amt'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>

                   <td><?php echo $this->Form->control('total_amount', array('type'=>'text', 'id'=>'total_amount', 'value'=>$find_statement_details['total_amount'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>

                   <td><?php echo $this->Form->control('agmark_close_balance', array('type'=>'text', 'id'=>'agmark_close_balance', 'value'=>$find_statement_details['agmark_close_balance'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>

                   <td><?php echo $this->Form->control('remarks', array('type'=>'text', 'id'=>'remarks', 'value'=>$find_statement_details['remarks'], 'escape'=>false, 'class'=>'form-control wd120 input-field', 'label'=>false)); ?></td>

                  <td>
                    <div class="form-buttons"><a href="#" id="save_statement_details" class="btn btn-info btn-sm">Save</a></div>
                    <?php //echo $this->form->submit('save', array('name'=>'edit_machine_details', 'id'=>'edit_machine_details', 'onclick'=>'validate_machinery_details();return false', 'label'=>false)); ?>
                  </td>
                </tr>

              <!-- To show added and save new machine details -->
              <?php } else { ?>
                  <div id="add_new_row">
                    <tr>
                      <td></td>
                  <td>
                        <?php
                        echo $this->Form->control('commodity', array('type'=>'select', 'empty'=>'Select Commodity', 'id'=>'commodity','options'=>$section_form_details[2], 'label'=>false, 'class'=>'form-control wd120')); ?>
                        <span id="error_commodity" class="error invalid-feedback"></span>
                  </td>
                  <td>
                        <?php echo $this->Form->control('approved_tbl_brand', array('type'=>'text', 'escape'=>false, 'id'=>'approved_tbl_brand', 'label'=>false, 'class'=>'form-control wd120 input-field','placeholder'=>'Enter Approved tbl brand')); ?>
                        <span id="error_approved_tbl_brand" class="error invalid-feedback"></span>
                  </td>
                  <td>
                        <?php echo $this->Form->control('grade_designation', array('type'=>'text', 'escape'=>false, 'id'=>'grade_designation', 'label'=>false, 'class'=>'form-control wd120 input-field','placeholder'=>'Enter Grade Designation')); ?>
                        <span id="error_grade_designation" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php echo $this->Form->control('bmlt_no', array('type'=>'text', 'escape'=>false, 'id'=>'bmlt_no', 'label'=>false, 'class'=>'form-control wd120 input-field ','placeholder'=>'Batch No./Melt No./Lot No./T.F. No')); ?>
                      <span id="error_bmlt_no" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php echo $this->Form->control('pack_size', array('type'=>'text', 'escape'=>false, 'id'=>'pack_size', 'label'=>false, 'class'=>'form-control wd120 input-field','placeholder'=>'Enter pack size')); ?>
                      <span id="error_pack_size" class="error invalid-feedback"></span>
                  </td>
                  
                  <td>
                      <?php echo $this->Form->control('total_quantity', array('type'=>'text', 'escape'=>false, 'id'=>'total_quantity', 'label'=>false, 'class'=>'form-control wd120 input-field ','placeholder'=>'Total Quantity')); ?>
                      <span id="error_total_quantity" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php echo $this->Form->control('total_estimated_value', array('type'=>'text', 'escape'=>false, 'id'=>'total_estimated_value', 'label'=>false, 'class'=>'form-control wd120 input-field txtCal','placeholder'=>'Total Estimated Value')); ?>
                      <span id="error_total_estimated_value" class="error invalid-feedback"></span>
                  </td>
                  <td>
                        <?php echo $this->Form->control('agmark_advance_rc', array('type'=>'text', 'escape'=>false, 'id'=>'agmark_advance_rc', 'label'=>false, 'class'=>'form-control wd120 input-field','placeholder'=>'Agmark Opening Advance Replica Charges')); ?>
                      <span id="error_agmark_advance_rc" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php echo $this->Form->control('agmark_rc_fresh_amt_received', array('type'=>'text', 'escape'=>false, 'id'=>'agmark_rc_fresh_amt_received', 'label'=>false, 'class'=>'form-control wd120 input-field','placeholder'=>'Agmark Advance Replica Charges Fresh Amount Received')); ?>
                      <span id="error_agmark_rc_fresh_amt_received" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php echo $this->Form->control('total_amount', array('type'=>'text', 'escape'=>false, 'id'=>'total_amount', 'label'=>false, 'class'=>'form-control wd120 input-field txtCal','placeholder'=>'Total Amount')); ?>
                      <span id="error_total_amount" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php echo $this->Form->control('agmark_Revenue_closing_balance', array('type'=>'text', 'escape'=>false, 'id'=>'agmark_Revenue_closing_balance', 'label'=>false, 'class'=>'form-control wd120 input-field','placeholder'=>'Agmark Revenue closing balance')); ?>
                      <span id="error_agmark_Revenue_closing_balance" class="error invalid-feedback"></span>
                  </td>
                  <td>
                      <?php echo $this->Form->control('remarks', array('type'=>'text', 'escape'=>false, 'id'=>'remarks', 'label'=>false, 'class'=>'form-control wd120 input-field','placeholder'=>'Remarks (Bharat kosh/D.D. No./Bank Details with dates)')); ?>
                      <span id="error_remarks" class="error invalid-feedback"></span>
                  </td>
                  <td>
                    <div class="form-buttons"><a href="#" id="add_revenue_details" class='table_record_add_btn btn btn-info btn-sm'><i class="fa fa-plus"></i> Add</a></div>
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