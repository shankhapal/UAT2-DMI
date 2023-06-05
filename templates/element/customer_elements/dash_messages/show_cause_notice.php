<div class="row">
    <div class="col-lg-12">
        <?php if($is_scn_replied=='yes') { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Please Note !</h5>
                You have responded to the show cause notice issued to your Firm on Date:- 
                <?php 
                    $dateTime = DateTime::createFromFormat('d/m/Y H:i:s', $is_scn_replied_details['comment_date']);
                    echo $date = $dateTime->format('d/m/Y');
                ?> .
            </div>
        <?php  } else { ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Please Note !</h5>
                The AGMARK Office has issued an Show Cause Notice against your Firm on <b>Date: <?php echo date("d-m-Y",strtotime($showCauseNotice['date'])); ?></b>. 
                Your reply on the show cause notice should reach in the office within 14 days. ie : <b><?php echo date("d-m-Y",strtotime($showCauseNotice['end_date'])); ?>.</b>
                To View the details click on the details on Action.
            </div>
        <?php } ?>
    </div>  
</div>