<div class="row">
    <div class="col-lg-12">
        <?php 
        if($showCauseNotice['status'] == 'replied') { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Please Note !</h5>
                You have responded to the show cause notice issued to your Firm on Date:- 
                <?php 
                  $date = $showCauseNotice['modified'];$dateTime = DateTime::createFromFormat('d/m/Y H:i:s', $date);
                  $reply_date = $dateTime->format('d/m/Y');
                  echo $reply_date;
                ?> .
            </div>
        <?php  } elseif ($showCauseNotice['status'] == 'ref_back') { ?>

            <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Please Note !</h5>
            Agmark has been replied on the issued show cause notice on your firm , on dated : 
            <?php 
              $date = $showCauseNotice['modified'];$dateTime = DateTime::createFromFormat('d/m/Y H:i:s', $date);
              $reply_date = $dateTime->format('d/m/Y');
              echo $reply_date;
            ?> .
        </div>

      <?php  } else { ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Please Note !</h5>
                The AGMARK Office has issued an Show Cause Notice against your Firm on <b>Date: 
                    <?php 
                        $date = $showCauseNotice['date'];$dateTime = DateTime::createFromFormat('d/m/Y H:i:s', $date);
                        $formattedDate = $dateTime->format('d/m/Y');
                        echo $formattedDate;
                    ?></b>. 
                Your reply on the show cause notice should reach in the office within 14 days. ie : <b>
                    <?php 
                        $date = $showCauseNotice['end_date'];$dateTime = DateTime::createFromFormat('d/m/Y H:i:s', $date);
                        $endDate = $dateTime->format('d/m/Y');
                        echo $endDate;
                    ?>.</b>
                To View the details click on the details on Action.
            </div>
        <?php } ?>
    </div>  
</div>