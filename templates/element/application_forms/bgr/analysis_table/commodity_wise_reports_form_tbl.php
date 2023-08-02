 <?php
//  <!--
// File: bianually_grading_report.php
// Created by: Shankhpal Shende
// Creation Date: 28/07/2023
// Module: Bianually Grading Report

// Description:
// This file contains the code for generating a Bianually Grading Report table.
//The table includes details related to regional offices, states,
//packer information, period, revenue, and grading data for different commodities.
//The table is designed to display and manage grading reports on a biannual basis.

// Please note that this is a dynamic table with editable fields for
//adding, editing, and deleting grading report entries.
//The table utilizes PHP functions to optimize code reusability and maintainability.

// Developed by Shankhpal Shende on 28/07/2023 for the Bianually Grading Report module of the application.
// -->


//  pr($section_form_details);die;
 // Define the constant with the message
define('DATE_FORMAT_MESSAGE', 'Enter DD/MM/YYYY');
define('INPUT_FIELD_CLASSES', 'form-control input-field wd120');
$placeholder = DATE_FORMAT_MESSAGE;
$class1 = INPUT_FIELD_CLASSES;


 ?>
<div class="row">
  <div class="col-md-12 ">
    <div class="table-format">
       <table id="live_data" class="table table-bordered table-striped table-responsive">
         <caption></caption>
              <tr>
                  <th
                    colspan="6"
                    scope="col"
                    class="border-bottom">
                    Regional Office/Sub-Office:
                    <?php echo isset($section_form_details[5])?$section_form_details[5]:"NA"; ?></th>
                  <th
                    colspan="8"
                    class="border-bottom"
                    scope="col">State :
                    <?php echo isset($section_form_details[4])?$section_form_details[4]:"NA"; ?></th>
                  <th colspan="6" class="border-bottom" scope="col"></th>
              </tr>
              <tr>
                  <th colspan="3" class="border-bottom" scope="col">Name of Packer with address and e-mail id:</th>
                  <th
                    colspan="3"
                    class="border-bottom"
                    scope="col">Name :
                    <?php echo isset($section_form_details[1])?$section_form_details[1]:"NA"; ?></th>
                  <th
                    colspan="3"
                    class="border-bottom"
                    scope="col">Email :
                    <?php echo base64_decode(isset($section_form_details[2])?$section_form_details[2]:"NA"); ?></th>
                  <th
                    colspan="3"
                    class="border-bottom"
                    scope="col">Address :
                    <?php echo isset($section_form_details[3])?$section_form_details[3]:"NA" ?></th>
              </tr>
              <tr>
                  <th
                    colspan="3"
                    class="border-bottom"
                    scope="col">Period: From
                    <?php echo $section_form_details[7]; ?>
                 </th>
                  <th
                    colspan="3"
                    class="border-bottom" scope="col">Period: To
                    <?php echo $section_form_details[7]; ?> </th>
                  <th
                    colspan="6"
                    class="border-bottom"
                    scope="col">Type:
                    <?php echo ($section_form_details[6] == "yes") ? "Export" : "Domestic"; ?>
                  </th>
                  </th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
              </tr>
               <tr>
                  <th colspan="6" class="border-bottom" scope="col">Total Revenue (In. Rs.):</th>
                  <th colspan="6" class="border-bottom" scope="col">Progressive Revenue (In Rs.):</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
              </tr>
              
              <tr>
                <th class="tablehead" scope="col">Sr.No.</th>
                <th class="tablehead wdth" scope="col">Commodity</th>
                <th class="tablehead wdth" scope="col">Lot No.TF No./M. No.</th>
                <th class="tablehead wdth" scope="col">Date of sampling</th>
                <th class="tablehead wdth" scope="col">Date of packing</th>
                <th class="tablehead wdth" scope="col">Grade assigned</th>
                <th class="tablehead wdth" scope="col" colspan="2">Pack Size</th>
                <th class="tablehead wdth" scope="col">Total No. of packages</th>
                <th class="tablehead wdth" scope="col">Total Qty. graded in Quintal</th>
                <th class="tablehead wdth" scope="col">Estimated value (in Rs.)</th>
                <th class="tablehead wdth" scope="col" colspan="3">No. of Agmark Replica/labels issued</th>
                <th class="tablehead wdth" scope="col">Replica Charges</th>
                <th class="tablehead wdth" scope="col">Name of Laboratory which tested the samples</th>
                <th class="tablehead wdth" scope="col" colspan="2">Report no. and Date</th>
                <th class="tablehead wdth" scope="col">Remark</th>
                <th class="tablehead wdth" scope="col">Action</th>
              </tr>
              <tr>
                <th class="tablehead wdth" scope="col"></th>
                <th class="tablehead wdth" scope="col"></th>
                <th class="tablehead wdth" scope="col"></th>
                <th class="tablehead wdth" scope="col"></th>
                <th class="tablehead wdth" scope="col"></th>
                <th class="tablehead wdth" scope="col"></th>
                <th class="tablehead wdth" scope="col">Size</th>
                <th class="tablehead wdth" scope="col">Unit</th>
                <th class="tablehead wdth" scope="col"></th>
                <th class="tablehead wdth" scope="col"></th>
                <th class="tablehead wdth" scope="col"></th>
                <th class="tablehead wdth" scope="col">From</th>
                <th class="tablehead wdth" scope="col">To</th>
                <th class="tablehead wdth" scope="col">Total</th>
                <th class="tablehead wdth" scope="col"></th>
                <th class="tablehead wdth" scope="col"></th>
                <th class="tablehead wdth" scope="col">Report no</th>
                <th class="tablehead wdth" scope="col">Report Date</th>
                <th class="tablehead wdth" scope="col"></th>
                <th class="tablehead wdth" scope="col"></th>
              </tr>

              <!-- to display record -->
              <tr id="data_row"></tr>

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
                  <td><?php //echo $each_statement['to_b']; ?></td>
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
                  <td>
                    <?php echo $this->Form->control('date', array(
                      'type'=>'text',
                      'id'=>'date',
                      'value'=>'',
                      'escape'=>false,
                      'class'=>$class1,
                      'label'=>false
                    )); ?>
                  </td>

                  <td>
                    <?php echo $this->Form->control('date', array(
                      'type'=>'text',
                      'id'=>'date',
                      'value'=>'',
                      'escape'=>false,
                      'class'=>$class1,
                      'label'=>false
                    )); ?>
                  </td>

                  <td>
                    <?php echo $this->Form->control('date', array(
                      'type'=>'text',
                      'id'=>'date',
                      'value'=>'',
                      'escape'=>false,
                      'class'=>$class1,
                      'label'=>false
                    )); ?>
                  </td>

                  <td>
                    <?php echo $this->Form->control('date', array(
                      'type'=>'text',
                      'id'=>'date',
                      'value'=>'',
                      'escape'=>false,
                      'class'=>$class1,
                      'label'=>false
                    )); ?>
                  </td>

                  <td>
                    <?php echo $this->Form->control('date', array(
                      'type'=>'text',
                      'id'=>'date',
                      'value'=>'',
                      'escape'=>false,
                      'class'=>$class1,
                      'label'=>false
                    )); ?>
                  </td>

                  <td>
                    <?php echo $this->Form->control('date', array(
                      'type'=>'text',
                      'id'=>'date',
                      'value'=>'',
                      'escape'=>false,
                      'class'=>$class1,
                      'label'=>false
                    )); ?>
                  </td>

                  <td>
                    <?php echo $this->Form->control('date', array(
                      'type'=>'text',
                      'id'=>'date',
                      'value'=>'',
                      'escape'=>false,
                      'class'=>$class1,
                      'label'=>false
                    )); ?>
                  </td>

                  <td>
                    <?php echo $this->Form->control('date', array(
                      'type'=>'text',
                      'id'=>'date',
                      'value'=>'',
                      'escape'=>false,
                      'class'=>$class1,
                      'label'=>false
                    )); ?>
                  </td>

                  <td>
                    <?php echo $this->Form->control('date', array(
                      'type'=>'text',
                      'id'=>'date',
                      'value'=>'',
                      'escape'=>false,
                      'class'=>$class1,
                      'label'=>false
                    )); ?>
                  </td>

                  <td>
                    <?php echo $this->Form->control('date', array(
                      'type'=>'text',
                      'id'=>'date',
                      'value'=>'',
                      'escape'=>false,
                      'class'=>$class1,
                      'label'=>false
                    )); ?>
                  </td>

                  <td>
                    <?php echo $this->Form->control('date', array(
                      'type'=>'text',
                      'id'=>'date',
                      'value'=>'',
                      'escape'=>false,
                      'class'=>$class1,
                      'label'=>false
                    )); ?>
                  </td>

                  <td>
                    <?php echo $this->Form->control('date', array(
                      'type'=>'text',
                      'id'=>'date',
                      'value'=>'',
                      'escape'=>false,
                      'class'=>$class1,
                      'label'=>false
                    )); ?>
                  </td>

                  <td>
                    <?php echo $this->Form->control('date', array(
                      'type'=>'text',
                      'id'=>'date',
                      'value'=>'',
                      'escape'=>false,
                      'class'=>$class1,
                      'label'=>false
                    )); ?>
                  </td>

                  <td>
                    <div class="form-buttons">
                      <a href="#" id="save_statement_details" class="btn btn-info btn-sm">Save</a>
                    </div>
                    <?php echo $this->form->submit('save', array(
                      'name'=>'edit_machine_details',
                      'id'=>'edit_machine_details',
                      'label'=>false));
                    ?>
                  </td>
                </tr>

              <!-- To show added and save new bgr details -->
              <?php } else { ?>
                  <div id="add_new_row">
                    <tr>
                      <td></td>
                      <td >
                      <?php
                        echo $this->Form->control('ta-commodity-', array(
                          'type'=>'select',
                          'empty'=>'Select Commodity',
                          'id'=>'ta-commodity-',
                          'options'=>$section_form_details[9],
                          'label'=>false,
                          'class'=>'form-control wd120 commodity'
                        )); ?>
                        <div class="error-message" id="error-ta-commodity-"></div>
                  </td>
                  <td>
                        <?php echo $this->Form->control('lot_no_tf_no_m_no', array(
                          'type'=>'text',
                          'escape'=>false,
                          'id'=>'lot_no_tf_no_m_no',
                          'label'=>false,
                          'class'=>$class1,
                          'placeholder'=>'Enter Lot No.TF No./M. No.'
                        )); ?>
                        <div class="error-message" id="error-lot_no_tf_no_m_no"></div>
                  </td>
                  <td>
                        <?php echo $this->Form->control('date_of_sampling', array(
                          'type'=>'text',
                          'escape'=>false,
                          'id'=>'date_of_sampling',
                          'label'=>false,
                          'class'=>$class1,
                          'placeholder'=>$placeholder
                        )); ?>
                        <div class="error-message" id="error-date_of_sampling"></div>
                  </td>
                  <td>
                        <?php echo $this->Form->control('date_of_packing', array(
                          'type'=>'text',
                          'escape'=>false,
                          'id'=>'date_of_packing',
                          'label'=>false,
                          'class'=>$class1,
                          'placeholder'=>$placeholder
                        )); ?>
                        <div class="error-message" id="error-date_of_packing"></div>
                  </td>
                  <td>
                       <?php
                        echo $this->Form->control('grade', array(
                          'type'=>'select',
                          'empty'=>'Select grade',
                          'id'=>'grade',
                          'options'=>$section_form_details[10],
                          'label'=>false,
                          'class'=>'form-control wd120'
                        )); ?>
                        <div class="error-message" id="error-grade"></div>
                  </td>
                  <td>
                      <?php echo $this->Form->control('ta-packet_size-', array(
                        'type'=>'text',
                        'escape'=>false,
                        'id'=>'ta-packet_size-',
                        'label'=>false,
                        'class'=>$class1,
                        'placeholder'=>'Enter Pack Size'
                      )); ?>
                      <div class="error-message" id="error-ta-packet_size-"></div>
                  </td>
                  <td>
                      <?php echo $this->Form->control('ta-packet_size_unit-', array(
                        'type'=>'select',
                        'escape'=>false,
                        'empty'=>'Select Unit',
                        'id'=>'ta-packet_size_unit-',
                        'label'=>false,
                        'class'=>$class1,
                      )); ?>
                      <div class="error-message" id="error-ta-packet_size_unit-"></div>
                  </td>
                  <td>
                      <?php echo $this->Form->control('ta-no_of_packets-', array(
                        'type'=>'text',
                        'escape'=>false,
                        'id'=>'ta-no_of_packets-',
                        'label'=>false,
                        'class'=>'total_no_packages form-control input-field wd120',
                        'placeholder'=>'Enter Total No. of packages'
                      )); ?>
                      <div class="error-message" id="error-ta-no_of_packets-"></div>
                  </td>
                  <td>
                      <?php echo $this->Form->control('total_qty_graded_quintal', array(
                        'type'=>'text',
                        'escape'=>false,
                        'id'=>'total_qty_graded_quintal',
                        'label'=>false,
                        'class'=>'form-control input-field txtCal wd120',
                        // 'readonly'=>'readonly',
                        'placeholder'=>'0.00'
                      )); ?>
                     <div class="error-message" id="error-total_qty_graded_quintal"></div>
                  </td>
                  <td>
                        <?php echo $this->Form->control('estimated_value', array(
                          'type'=>'text',
                          'escape'=>false,
                          'id'=>'estimated_value',
                          'label'=>false,
                          'class'=>$class1,
                          'placeholder'=>'0.00'
                        )); ?>
                        <div class="error-message" id="error-estimated_value"></div>
                  </td>
                  <td>
                      <?php echo $this->Form->control('agmark_replica_from', array(
                          'type'=>'text',
                          'escape'=>false,
                          'id'=>'agmark_replica_from',
                          'label'=>false,
                          'placeholder'=>'',
                          'class'=>$class1,
                        )); ?>
                        <div class="error-message" id="error-agmark_replica_from"></div>
                  </td>
                  <td>
                      <?php echo $this->Form->control('agmark_replica_to', array(
                          'type'=>'text',
                          'escape'=>false,
                          'id'=>'agmark_replica_to',
                          'placeholder'=>'',
                          'label'=>false,
                          'class'=>$class1,
                        )); ?>
                        <div class="error-message" id="error-agmark_replica_to"></div>
                  </td>
                  <td>
                      <?php echo $this->Form->control('agmark_replica_total', array(
                          'type'=>'text',
                          'escape'=>false,
                          'id'=>'agmark_replica_total',
                          'label'=>false,
                          // 'readonly'=>'readonly',
                          // 'placeholder'=>'0.00',
                          'class'=>$class1,
                        )); ?>
                        <div class="error-message" id="error-agmark_replica_total"></div>
                  </td>
                  <td>
                      <?php echo $this->Form->control('replica_charges', array(
                          'type'=>'text',
                          'escape'=>false,
                          'id'=>'replica_charges',
                          'label'=>false,
                          'class'=>$class1,
                          // 'readonly'=>'readonly',
                          'placeholder'=>'0.00'
                        )); ?>
                      <div class="error-message" id="error-replica_charges"></div>
                  </td>
                  <td>
                     <?php echo $this->Form->control('laboratory_name', array(
                          'type'=>'text',
                          'escape'=>false,
                          'id'=>'laboratory_name',
                          'readonly'=>'readonly',
                          'value'=>$section_form_details[11],
                          'label'=>false,
                          'class'=>$class1,
                        )); ?>
                      <div class="error-message" id="error-laboratory_name"></div>
                  </td>
                  <td>
                      <?php echo $this->Form->control('report_no', array(
                        'type'=>'text',
                        'escape'=>false,
                        'id'=>'report_no',
                        'label'=>false,
                        'class'=>$class1,
                        'placeholder'=>'Enter Report No.'
                      )); ?>
                      <div class="error-message" id="error-report_no"></div>
                  </td>
                  <td>
                      <?php echo $this->Form->control('report_date', array(
                          'type'=>'text',
                          'escape'=>false,
                          'id'=>'report_date',
                          'label'=>false,
                          'class'=>$class1,
                          'placeholder'=>$placeholder
                        )); ?>
                       <div class="error-message" id="error-report_date"></div>
                  </td>
                  <td>
                      <?php echo $this->Form->control('remarks', array(
                        'type'=>'text',
                        'escape'=>false,
                        'id'=>'remarks',
                        'label'=>false,
                        'class'=>$class1,
                        'placeholder'=>'Enter Remarks'
                      )); ?>
                      <div class="error-message" id="error-remarks"></div>
                  </td>
                      <td>
                        <div class="form-buttons">
                          <a href="#" id="add_bgr_details" class='table_record_add_btn btn btn-info btn-sm'>
                          <i class="fa fa-plus"></i> Add</a>
                        </div>
                      </td>
                    </tr>
                  </div>
            <?php } ?>
          </div>
        </table>
      </div>
    </div>
  </div>
<input type="hidden" id="custemer_id" value='<?php echo $_SESSION['packer_id']; ?>'>
<!-- end table -->