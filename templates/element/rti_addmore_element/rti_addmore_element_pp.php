 <?php //pr($section_form_details);die; ?>
 <div class="form-horizontal">
    <div class="card-body">
     <div class="row">
        <!-- table-->
          <table id="printed_packaging_table" class="table table-bordered table-hover table-striped">
            <thead class="tablehead">
                <tr>
                    <th colspan="2"></th>
                    <th colspan="3" class="text-center">Quantity /Nos.</th>
                    <th colspan="2"></th>
                </tr>
                <tr>
                    <th>Sr.No</th>
                    <th>Packer Id</th>
                    <th>Indent</th>
                    <th>Supplied</th>
                    <th>Balance</th>
                    <th>TBL</th>
                    <th>Action</th>
                </tr> 
              </thead>      
                <div id="packaging_each_row">
                  <?php //pr($section_form_details[3]);die;
				             	$i=1; 
                     foreach ($section_form_details[1] as $each_packer){pr($each_packer);die;
                      ?>
                          <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $each_packer['packer_id'];?></td>
                              <td><?php echo $each_packer['indent'];?></td>
                              <td><?php echo $each_packer['supplied'];?></td>
                              <td><?php echo $each_packer['balance'];?></td>
                              <td><?php echo $each_packer['tbl'];?></td>
                              <td>                                 
                                  <a href="#" class="edit_pack_id glyphicon glyphicon-edit" id="<?php echo $each_packer['id']; ?>" ></a> |
                                  <a href="#" class="delete_packer_id glyphicon glyphicon-remove-sign machine_delete" id="<?php echo $each_packer['id']; ?>" ></a>
                              </td>
                          </tr>
                          <?php $i=$i+1; } ?>   
              <div id="error_machinery" class="text-red float-right text-sm"></div>
                    <!-- for edit machine details -->
                  <?php 
                   
                  if ($this->request->getSession()->read('edit_pack_id') != null) { 
                    ?>
                    <tr>
                      <td></td>
                      <td>
                          <?php echo $this->Form->control('packer_id', array('type'=>'select', 'id'=>'packer_id', 'value'=>$find_packer_details['packer_id'], 'options'=>$section_form_details[2], 'escape'=>false, 'class'=>'form-control packer_id', 'label'=>false)); ?>
                      </td>
                       <td>
                           <?php echo $this->Form->control('indent', array('type'=>'text', 'value'=>$find_packer_details['indent'], 'escape'=>false,  'label'=>false, 'id'=>'indent', 'class'=>'form-control input-field')); ?>
                       </td>
                        <td>
                            <?php echo $this->Form->control('supplied', array('type'=>'text', 'value'=>$find_packer_details['supplied'], 'escape'=>false,  'label'=>false, 'id'=>'supplied', 'class'=>'form-control input-field')); ?>
                        </td>
                         <td>
                             <?php echo $this->Form->control('balance', array('type'=>'text', 'value'=>$find_packer_details['balance'], 'escape'=>false,  'label'=>false, 'id'=>'balance', 'class'=>'form-control input-field')); ?>
                          </td>
                          <td>
                            <?php echo $this->Form->control('tbl_name', array('type'=>'select', 'id'=>'tbl_name', 'value'=>$added_tbl_list, 'options'=>$added_tbl_list, 'escape'=>false, 'class'=>'form-control', 'label'=>false)); ?>

                          </td>
                          <td>
                              <div class="form-buttons"><a href="#" id="save_packer_details" class="btn btn-info btn-sm">Save</a></div>
                          </td>
                    </tr>
                        <!-- To show added and save new machine details -->
                        <?php } else {?>
                            <div id="add_new_row">
                              <tr>
                                <td></td>
                                <td><?php //pr($section_form_details[3][0]['tbl_name']);die; ?>
                                    <?php echo $this->Form->control('packer_id', array('type'=>'select', 'id'=>'packer_id', 'empty'=>'Select packer_id', 'options'=>$section_form_details[2],'label'=>false, 'class'=>'form-control packer_id')); ?>
                                    <span id="error_packer_id" class="error invalid-feedback"></span>
                                </td>
                                <td>
                                    <?php echo $this->Form->control('indent', array('type'=>'text', 'id'=>'indent', 'escape'=>false, 'class'=>'form-control input-field', 'label'=>false)); ?>
                                    <span id="error_indent" class="error invalid-feedback"></span>
                                </td>
                                <td>
                                    <?php echo $this->Form->control('supplied', array('type'=>'text', 'id'=>'supplied', 'escape'=>false, 'class'=>'form-control input-field', 'label'=>false)); ?>
                                    <span id="error_supplied" class="error invalid-feedback"></span>
                                </td>
                                <td> 
                                    <?php echo $this->Form->control('balance', array('type'=>'text', 'id'=>'balance', 'escape'=>false, 'class'=>'form-control input-field', 'label'=>false)); ?>
                                    <span id="error_balance" class="error invalid-feedback"></span>
                                </td>
                                <td>
                                    <?php echo $this->Form->control('tbl_name', array('type'=>'select', 'id'=>'tbl_name', 'empty'=>'Select tbl name', 'options'=>'','label'=>false, 'class'=>'form-control')); ?>
                                    <span id="error_tbl_name" class="error invalid-feedback"></span>
                                </td>
                                <td>
                                     <div class="form-buttons"><a href="#" id="add_packer_details" class='table_record_add_btn btn btn-info btn-sm'><i class="fa fa-plus"></i> Add</a></div>
                                </td>
                              </tr>
                            </div>
                      <?php } ?>
                </div>
            </table>
        </div>
    </div>
</div>                                                       