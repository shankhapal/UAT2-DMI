<section class="col-lg-12 connectedSortable">
    <div class="card card-danger">
        <div class="card-header"><h3 class="card-title-new">Show Cause Notice Details</h3></div>
            <div class="card-body">
            <table id="example2" class="table m-0 table-bordered">
                <thead class="tablehead">
                <tr>
                    <th>Applicant Id</th>
                    <th>Sent On</th>
                    <th>Last Date to Reply</th>
                    <th>PDF</th>
                    <th>Action</th>
                </tr>
                </thead>  
                <tbody>
                <tr>
                    <td class="boldtext"><?php echo $showCauseNotice['customer_id']; ?></td>
                    <td class="boldtext"><?php echo date("d-m-Y",strtotime($showCauseNotice['date'])); ?></td>
                    <td class="boldtext"><?php echo date("d-m-Y",strtotime($showCauseNotice['end_date'])); ?></td>
                    <td>
                        <?php $split_file_path = explode("/",$showCauseNotice['pdf_file']); $file_name = $split_file_path[count($split_file_path) - 1]; ?>
                        <a target="_blank" href="<?php echo $showCauseNotice['pdf_file']; ?>"><?php echo $file_name; ?></a>
                    </td>
                    <td><?php // to viee in  view mode
                            if($is_scn_replied_details['to_user'] == 'ro'){
                                echo $this->Html->link(
                                    '', 
                                    ['controller' => 'othermodules', 'action'=>'fetchIdFromScnAppl','?' => ['id' => $showCauseNotice['id'], 'customer_id' => $showCauseNotice['customer_id'],'sample_code' => $showCauseNotice['sample_code'],'scn_mode'=>'view']],
                                    ['class'=>'fas far fa-eye','title' => 'View']
                                ); 
                            }else{
                                echo $this->Html->link(
                                    '', 
                                    ['controller' => 'othermodules', 'action'=>'fetchIdFromScnAppl','?' => ['id' => $showCauseNotice['id'], 'customer_id' => $showCauseNotice['customer_id'],'sample_code' => $showCauseNotice['sample_code'],'scn_mode'=>'edit']],
                                    ['class'=>'fas fa-file-export','title' => 'Notice Details']
                                ); 
                            }
                        ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
