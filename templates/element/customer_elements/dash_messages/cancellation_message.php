<div class="row">
	<div class="col-lg-12">
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-info"></i> Please Note !</h5>
			<?php 
                $date = $cancelled_record['date'];
                $dateTime = DateTime::createFromFormat('d/m/Y H:i:s', $date);
                $cancelled_date = $dateTime->format('d/m/Y');
        
				$message = <<<EOD
					This Firm is CANCELLED by the competent Agmark Authority 
					For the reason of  <b>{$misgrading_details['misgrade_level']}</b> : <b>{$misgrading_details['misgarde_details']}</b> 
					on dated <b>{$cancelled_date}</b>.
					Therefore, for this certificate is cancelled, Therefore, Applicant should not grade and mark '<span class="badge">{$commoditiesDetails}</span>' 
					commodity/ies under AGMARK. If a violation is observed, action shall be taken as per APGM Act and GGM Rule.
					EOD;

				echo $message;
			?> 
		</div>
	</div>  
</div>