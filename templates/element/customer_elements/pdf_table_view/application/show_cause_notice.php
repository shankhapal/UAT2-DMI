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
                        <a target="blank" href="<?php echo $showCauseNotice['pdf_file']; ?>"><?php echo $file_name; ?></a>
                    </td>
                    <td><?php echo $this->Html->link('', array('controller' => 'othermodules', 'action'=>'fetchIdFromScnAppl', $showCauseNotice['id']),array('class'=>'fas fa-arrow-right','title'=>'Go To Action Home')); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>  
</section>
