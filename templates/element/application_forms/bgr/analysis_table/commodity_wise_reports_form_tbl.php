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


// == pr($section_form_details);die;
 // Define the constant with the message
use Cake\Datasource\ConnectionManager;

define('DATE_FORMAT_MESSAGE', 'Enter DD/MM/YYYY');
define('INPUT_FIELD_CLASSES', 'form-control input-field wd120');
$placeholder = DATE_FORMAT_MESSAGE;
$class1 = INPUT_FIELD_CLASSES;?>
 
<div class="row">
  <div class="col-md-12 ">
    <div class="table-format">
       <table id="dataTable" class="table table-bordered table-striped table-responsive">
          <thead>
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
                    colspan="6"
                    class="border-bottom"
                    scope="col">Address :
                    <?php echo isset($section_form_details[3])?$section_form_details[3]:"NA" ?></th>
              </tr>
              <tr>
                  <th
                    colspan="6"
                    class="border-bottom"
                    scope="col">Period: From
                    <?php echo $section_form_details[7]; ?>
                    to <?php echo $section_form_details[8]; ?>
                 </th>
                  <th
                    colspan="7"
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
                 
              </tr>
               <tr>
                  <th colspan="6" class="border-bottom" scope="col">
                    Total Revenue (In. Rs.): <span id="totalRevenueHeader"></span>
                  </th>
                  <th colspan="6" class="border-bottom" scope="col">Progressive Revenue (In Rs.):</th>
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
             </thead>
              <tbody>
               
                  <?php
                  $i=1;
                  foreach ($section_form_details[12] as  $eachrow) {
                    $conn = ConnectionManager::get('default');
                    $numericValue = $eachrow['packetsizeunit'];
                    $unitName = "";
                    if(!empty($numericValue)){
                       $query = "SELECT unit FROM dmi_replica_unit_details WHERE id = $numericValue";
                       $q = $conn->execute($query);

                       if ($q->rowCount() > 0) {
                        $row = $q->fetch();
                        if (isset($row[0])) { // Check if index 0 exists
                            $unitName = $row[0]; // Use index 0 to access the value
                        }
                       }
                    }

                    $gradeasign = $eachrow['gradeasign'];
                    $query2 = "SELECT grade_desc from m_grade_desc WHERE grade_code = $gradeasign";
                    $q2 = $conn->execute($query2);
                    $row2 = $q2->fetch();
                    $gradename = '';
                    if (isset($row2[0])) { // Check if index 0 exists
                      $gradename = $row2[0]; // Use index 0 to access the value
                    }
                   
                    ?>
                    <tr  id="custom_row<?php echo $eachrow['id'];?>">
                      <td><?php echo $i; ?></td>
                      <td><?php echo $eachrow['commodity'];?></td>
                      <td><?php echo $eachrow['lotno'];?></td>
                      <td><?php echo $eachrow['datesampling'];?></td>
                      <td><?php echo $eachrow['dateofpacking'];?></td>
                      <td><?php echo $gradename; ?></td>
                      <td><?php echo $eachrow['packetsize'];?></td>
                      <td><?php echo $unitName; ?></td>
                      <td><?php echo $eachrow['totalnoofpackets'];?></td>
                      <td><?php echo $eachrow['totalqtyquintal'];?></td>
                      <td><?php echo $eachrow['estimatedvalue'];?></td>
                      <td><?php echo $eachrow['agmarkreplicafrom'];?></td>
                      <td><?php echo $eachrow['agmarkreplicato'];?></td>
                      <td><?php echo $eachrow['agmarkreplicatotal'];?></td>
                      <td><?php echo $eachrow['replicacharges'];?></td>
                      <td><?php echo $eachrow['laboratoryname'];?></td>
                      <td><?php echo $eachrow['reportno'];?></td>
                      <td><?php echo $eachrow['reportdate'];?></td>
                      <td><?php echo $eachrow['remarks'];?></td>
                      <td>
                       <a href="#"
                       class="edit_bgr_id glyphicon glyphicon-edit"
                       id="<?php echo $eachrow['id']; ?>" ></a> |
                        <a href="#"
                        class="delete_bgr_id glyphicon glyphicon-remove-sign machine_delete"
                        id="<?php echo $eachrow['id']; ?>" ></a>
                      </td>
                    </tr>
                 <?php $i++; }?>
                  
                  
               
                <tr id="add_new_row">
                       <td>
                         <?php echo $this->Form->control('record_id', array(
                              'type' => 'hidden',
                              'id' => 'record_id',
                              'value' => '',
                              'label' => false,
                              'class' => 'form-control wd120'
                          )); ?>
                      </td>
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
                            'options'=>$section_form_details[10],
                            'label'=>false,
                            'class'=>$class1,
                            'placeholder'=>'Enter Pack Size'
                          )); ?>
                          <div class="error-message" id="error-ta-packet_size-"></div>
                      </td>
                          
                      <td>


                      <?php echo $this->Form->control('ta-packet_size_unit-', array(
                        'type'=>'select',
                        'empty'=>'Select Unit',
                        'id'=>'ta-packet_size_unit-',
                        'options'=>$section_form_details[13],
                        'label'=>false,
                        'class'=>$class1,
                      )); ?>
                      <div class="error-message" id="error-ta-packet_size_unit-"></div>
                     </td>
                      
                     
                      <td>
                          <?php echo $this->Form->control('ta-no_of_packets-', array(
                            'type'=>'number',
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
                            'type'=>'textarea',
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
                           <a href="#" id="update_bgr_details" class="btn btn-info btn-sm">Save</a>
                        </div>
                      </td>
                    </tr>
     
          </tbody>
        </table>
        <div class="col-md-3 float-right">
            <?php echo $this->Form->control('overall_total_chrg',
            array(
                'type'=>'number',
                'id'=>'overall_total_chrg',
                'value'=>'0',
                'class'=>'form-control',
                'readonly'=>true,
                'label'=>'Total Replica Charges (Rs.):',
                'required'=>true
            )); ?>
            <span id="bal_amt_exceeds_msg"></span>
        </div>


      </div>
    </div>
  </div>
  

<?php if(!empty($_SESSION['packer_id']) || isset($_SESSION['packer_id'])){
			$customer_id = $_SESSION['packer_id'];
		}else{
			$customer_id = $_SESSION['customer_id'];
		} ?>
<input type="hidden" id="custemer_id" value='<?php echo $customer_id; ?>'>
<!-- end table -->
