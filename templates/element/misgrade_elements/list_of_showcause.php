<?php echo $this->Form->create(); ?>
    <div class="form-horizontal">
        <table id="los" class="table table-striped table-bordered table-sm w100">
            <label>List of Notices Sent by this Office</label>
            <thead class="table-dark">
                <tr>
                    <th>Sr.No</th>
                    <th>Applicant ID</th>
                    <th>Firm Name</th>
                    <th>Firm Contact</th>
                    <th>Commodity</th>
                    <th>Certification Type</th>
                    <th>Notice Sent On</th>
                    <!--<th>Action</th>-->
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sr_no=1; 
                    foreach($sentNotices as $eachdata){ ?>
                        <tr>
                            <td><?php echo $sr_no;?></td>
                            <td><?php echo $eachdata['customer_id']; ?></td>
                            <td><?php echo $eachdata['firm_name']; ?></td>
                            <td>
                                <?php echo "<span class='badge'>Mobile:</span>".base64_decode($eachdata['mobile_no']); ?>
                                <br>
                                <?php echo "<span class='badge'>Email:</span>".base64_decode($eachdata['email']); ?>
                            </td>
                            <td><?php echo $eachdata['certificate_type']; ?></td>
                            <td><?php echo $eachdata['category_name']; ?></td>
                            <td><?php echo $eachdata['date']; ?></td>
                            <td>
                                <?php // echo $this->Html->link('', array('controller' => 'othermodules', 'action'=>'fetchIdForShowcause', $eachdata['id']),array('class'=>'fas fa-exclamation-circle','title'=>'View Details')); ?>
                            </td>
                        </tr>
                    <?php $sr_no++; } 
                ?>
            </tbody>
        </table>
    </div>
<?php echo $this->Form->end(); ?>
<?php echo $this->Html->script('element/misgrade_elements/list_of_showcause');?>
