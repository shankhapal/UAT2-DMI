<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Please Note !</h5>
            The AGMARK Office has issued an Show Cause Notice against your Firm on <b>Date: <?php echo date("d-m-Y",strtotime($showCauseNotice['date'])); ?></b>. 
            Your reply on the show cause notice should reach in the office within 14 days. ie : <b><?php echo date("d-m-Y",strtotime($showCauseNotice['end_date'])); ?>.</b>
        </div>
    </div>  
</div>