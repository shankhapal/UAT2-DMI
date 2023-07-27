<?php



$list_status = array('Srno','Submission Date','Application Type','Application ID','Pending With','Posted Office','User ID','Reason For Delay','Action Taken For Completion/Disposal of Pending Application');	

//added this foreach to show heading & month wise data with month format 
//*****************done by shreeya on date [10-07-2023]******************
$srno = 1;
 $j = 0 ;


 foreach ($orders as $order)
{   

	$ax = $order;
	$axx = $application_type[$j];
	$axxx = $application_id[$j];
	$aiv = $user_roles[$j];
	$av	= $user_office[$j];
	$avi	= $user_email_id[$j];

	
	$split_selected_month = explode('/', $order);
	
	$day = $split_selected_month[0];
	$monthNumber = $split_selected_month[1];
	$year = $split_selected_month[2];

	// Convert month number to alphabetic format  by shreeya [10-07-2023]
	$month = date('F', mktime(0, 0, 0, $monthNumber, 1));

	$header = "<table style='border: 5px solid black;'>
			<tr styel='border: 2px solid black'>
				<th colspan='3'>Name Of Regional Office $user_office[$j] <br>AQCMS Pendancy MPR For The Month Of  $month</th>
				
			</tr>";
		
	
	$srno++;
	
	$j++;
	
}
//**************** date [10-07-2023]*******************

//show listing records
$header .= "
			<tr styel='border: 2px solid black'>
				<th >Srno</th>
				<th styel='border: 2px solid black'>Date</th>
				<th styel='border: 2px solid black'>Application Type</th>
				<th styel='border: 2px solid black'>Application ID</th>
				<th styel='border: 2px solid black'>Pending With</th>
				<th styel='border: 2px solid black'>Posted Office</th>
				<th styel='border: 2px solid black'>User ID</th>
				<th styel='border: 2px solid black'>Reason For Delay</th>
				<th styel='border: 2px solid black'>Action Taken For Completion/Disposal of Pending Application</th>
			</tr>";
 
 $srno=1;
 $i = 0 ;
 foreach ($orders as $order)
 {   
	$ax = $order;
	$axx = $application_type[$i];
	$axxx = $application_id[$i];
	$aiv = $user_roles[$i];
	$av	= $user_office[$i];
	$avi	= $user_email_id[$i];
	
	$header .= "<tr>
 					<td styel='border: 1px solid black'>$srno</td>
 					<td styel='border: 1px solid black'>$ax</td>
 					<td styel='border: 1px solid black'>$axx</td>
 					<td styel='border: 1px solid black'>$axxx</td>
 					<td styel='border: 1px solid black'>$aiv</td>
 					<td styel='border: 1px solid black'>$av</td>
 					<td styel='border: 1px solid black'>$avi</td> 
					 <td styel='border: 1px solid black'></td> 
					 <td styel='border: 1px solid black'></td> 					
 				</tr>";	

	  $srno=$srno+1;
	  $i=$i+1;
 }

 $header .= "</table>";
 $filename='Pending_Mpr_Report.xls';
 header ( "Content-type: application/vnd.ms-excel" );
 header ( "Content-Disposition: attachment; filename=".$filename);
 echo $header;
 
?>
