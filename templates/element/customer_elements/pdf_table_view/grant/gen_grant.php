<div class="row">
    <section class="col-lg-12 connectedSortable">
        <div class="card card-success">
            <div class="card-header"><h3 class="card-title">Granted Certificate Versions</h3></div>
            <div class="card-body">
                <table id="example2" class="table m-0 table-bordered">
                    <thead class="tablehead">
                        <tr>
                            <th>Applicant Id</th>
                            <th>Certificate Pdf</th>
                            <th>Grant Date</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <?php foreach ($grant_certificate_pdf as $each_record) { ?>
                            <tr>
                                <td class="boldtext"><?php echo $each_record['customer_id']; ?></td>
                                <td><?php $split_file_path = explode("/",$each_record['pdf_file']); $file_name = $split_file_path[count($split_file_path) - 1]; ?>
                                    <a target="blank" href="<?php echo $each_record['pdf_file']; ?>"><?php echo $file_name; ?></a>
                                </td>
                                <td><?php echo substr($each_record['date'],0,-9); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
           <!-- Comment: Added as per suggestion: 
           Suggestion: One Copy of inspection report needs to be sent to 
           packer for information and compliance of shortcomings after submission by inspection Officer.
           Author: Shankhpal Shende
           Date:17/05/2023 -->
            <?php if(!empty($approved_routine_inspection_pdf)){ ?> 
            <div class="card-header"><h3 class="card-title">Routine Inspection Report:</h3></div>
            <div class="card-body">
                <!-- // condition added for rti module if approved_routine_inspection_pdf is empty then table not display 
                // added by shankhpal on 21/06/2023 -->
                <table id="example2" class="table m-0 table-bordered">
                    <thead class="tablehead">
                        <tr>
                            <th>Applicant Id</th>
                            <th>Report Pdf</th>
                            <th>Approved Date</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <?php foreach ($approved_routine_inspection_pdf as $each_record) { ?>
                            <tr>
                                <td class="boldtext"><?php echo $each_record['customer_id']; ?></td>
                                <td><?php $split_file_path = explode("/",$each_record['pdf_file']); $file_name = $split_file_path[count($split_file_path) - 1]; ?>
                                    <a target="blank" href="<?php echo $each_record['pdf_file']; ?>"><?php echo $file_name; ?></a>
                                </td>
                                <td><?php echo substr($each_record['date'],0,-9); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>  
         <?php } ?>
    </section>
</div>