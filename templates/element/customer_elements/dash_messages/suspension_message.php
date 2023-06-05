<div class="row">
	<div class="col-lg-12">
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h5><i class="icon fas fa-info"></i> Please Note !</h5>
			<?php 
				// Convert string dates to DateTime objects
				$fromDate = new DateTime($suspension_record['from_date']);
				$toDate = new DateTime($suspension_record['to_date']);
				$toDate = new DateTime($suspension_record['to_date']);
				$sus_date = new DateTime($suspension_record['suspended_on']);
				
				$message = <<<EOD
					This Firm is Suspended by the competent Agmark Authority 
					For the reason of  <b>{$misgrading_details['misgrade_level']}</b> : <b>{$misgrading_details['misgarde_details']}</b> 
					on dated <b>{$sus_date->format('d-m-Y')}</b>.
					For the <b><i> Period of {$suspension_record['time_period']} </i></b> <b> From: {$fromDate->format('d/m/Y')} To: {$toDate->format('d/m/Y')} </b> . Therefore, for the stated 
					period of time Applicant should not grade and mark '<span class="badge">{$commoditiesDetails}</span>' 
					commodity/ies under AGMARK. If a violation is observed, action shall be taken as per APGM Act and GGM Rule.
					EOD;

				echo $message;
			?> 
		</div>
	</div>  
</div>