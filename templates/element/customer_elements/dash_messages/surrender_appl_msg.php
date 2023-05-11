<?php if ($soc_final_submit_status == 'approved' && $soc_final_submit_level == 'level_3') { ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Please Note !</h5>
                Your Application is Surrendered on Date: <?php echo $isSurrender; ?>.
                As the Application is Surrendered you cannot to access the Menus.
            </div>
        </div>  
    </div>

<?php } elseif ($soc_final_submit_status == 'referred_back') { ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Please Note !</h5>
                Your Application for Surrender is referred back from DMI . Please Check and Reply . Go from <b>Apply For -> Surrender</b>. Thank You.
            </div>
        </div>  
    </div>

<?php } elseif ($soc_final_submit_status == 'replied') { ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Please Note !</h5>
                Your Application for Surrender is referred back to DMI . Thank You.
            </div>
        </div>  
    </div>
    
 
<?php } else {  ?>

  <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Please Note !</h5>
                Your Application for Surrender is successfully submitted to AGMARK. Thank You.
            </div>
        </div>  
    </div>

<?php } ?>

