<?php 
use Cake\Datasource\ConnectionManager;
?>

<style>
	h4 {
		padding: 5px;
		font-family: times;
		font-size: 13pt;
	}
							 

	table{
		padding: 5px;
		font-size: 12pt;
		font-family: times;
	}
				
</style>

	<table width="100%" border="1">
		<tr>
		<td align="center" style="padding:5px;">
			<h4>Application Bianually Grading returns of <?php echo $periodStartDisplay; ?> to <?php echo $periodEndDisplay; ?></h4>
		</td>
		</tr>
	</table>

  <table width="100%"><br><br>
		<tr>
			<td><br>To,</td><br>
		</tr>
	</table>

  <table  width="100%">
		<tr>
			<td>
				<br>The Marketing officer,<br>
				Directorate of Marketing & Inspection<br>
				(Ministry of Agriculture & Farmers Welfare)<br>
				<?php echo $get_office['ro_office']; ?>,<?php echo $firm_state_name; ?>
			</td>
		</tr>
			
		<tr>
			<td><br>Subject: Submission of Biannual grading returns of <?php echo $periodStartDisplay; ?> to <?php echo $periodEndDisplay; ?> -regarding.</td><br>
		</tr>

		<tr>
			<td><br>Dear Sir,</td><br>
		</tr>

		<tr>
			<td>
				<br>I,	<?php echo $chemist_fname." ".$chemist_lname; ?> Agmark approved chemist in-charge of the firm <?php echo $firmData['firm_name'].', ';
								echo $firmData['street_address'].',';
								echo $firm_district_name.', ';
								echo $firm_state_name.', ';
								echo $firmData['postal_code'];
						?>
					bearing C.A No <?php echo $customer_id; ?>, Valid up to <?php echo $certificate_valid_upto; ?> for undertaking <?php echo $commaSeparatedCommodity; ?> grading work under Agmark.<br>
			</td>
		</tr>
	</table>

		<table>
			<tr>
				<td align="left">
						I, hereby submitting Agmark Biannual grading returns for the month of <?php echo $periodStartDisplay; ?> to <?php echo $periodEndDisplay; ?> along with following verified and self attested documents for perusal and necessary action please.
				</td>
			</tr>
	</table>

	<table>
			<tr>
				<td  align="left">
					Place: <?php echo $firm_district_name.', '; echo $firm_state_name.'.';?><br>
					Date: <?php echo $pdf_date;?>
				</td>
			</tr>
	</table>
	
	<table align="right">
			<tr>
			<td>Your's Faithfully<br>
				<?php echo $customer_firm_data['firm_name']; ?><br>
				<?php echo $customer_firm_data['street_address'].', <br>';
						echo $firm_district_name.', ';
						echo $firm_state_name.', ';
						echo $customer_firm_data['postal_code'].'.<br>';?>
			</td>
			</tr>
	</table>
	<br pagebreak="true" />

	<table width="100%" border="1">
			<tr>
			<td align="center" style="padding:5px;"><h4>Commodity-wise report of Grading under Agmark to be submitted biannualy</h4></td>
			</tr>
	</table>

<table width="100%" border="1">
		<tr>
				<th
					colspan="6"
					scope="col"
					class="border-bottom">
					Regional Office/Sub-Office:
					<?php echo isset($region)?$region:"NA"; ?></th>
				<th
					colspan="8"
					scope="col"
					class="border-bottom">
					State :
					<?php echo isset($state_name)?$state_name:"NA"; ?></th>
		</tr>

		<tr>
				<th colspan="6" class="border-bottom" scope="col">Name of Packer with address and e-mail id:</th>
				<th colspan="8">Name:<?php echo isset($firmname)?$firmname:"NA"; ?>, Email:<?php echo base64_decode($email); ?>, Address:<?php echo isset($address)?$address:"NA"; ?></th>
		</tr>
		<tr>
				<th colspan="6" class="border-bottom" scope="col">Period:
					 <?php if ($periodStartDisplay && $periodEndDisplay) : ?>
       		 Period: From <?php echo $periodStartDisplay; ?> to <?php echo $periodEndDisplay; ?>
  		  <?php else : ?>
        Period: Not within a defined biannual period
   		 <?php endif; ?>
				</th>
				<th colspan="8" class="border-bottom" scope="col">Type:<?php echo ($export_unit_status == "yes") ? "Export" : "Domestic"; ?></th>
		</tr>
	
			<tr>
					<th colspan="6" class="border-bottom" scope="col">Total Revenue (In. Rs.):<?php echo $totalReplicaCharges; ?></th>
					<th colspan="8" class="border-bottom" scope="col">Progressive Revenue (In Rs.):</th>
      </tr>
              
			<tr>
				<th class="tablehead wdth" scope="col">Sr.No.</th>
				<th class="tablehead wdth" scope="col">Commodity</th>
				<th class="tablehead wdth" scope="col">Lot No.TF No./M. No.</th>
				<th class="tablehead wdth" scope="col">Date of sampling</th>
				<th class="tablehead wdth" scope="col">Date of packing</th>
				<th class="tablehead wdth" scope="col">Grade assigned</th>
				<th class="tablehead wdth" scope="col">Pack Size</th>
				<th class="tablehead wdth" scope="col">Total No. of packages</th>
				<th class="tablehead wdth" scope="col">Total Qty. graded in Quintal</th>
				<th class="tablehead wdth" scope="col">Estimated value (in Rs.)</th>
				<th class="tablehead wdth" scope="col" colspan="3">No. of Agmark Replica/labels issued</th>
				<th class="tablehead wdth" scope="col">Replica Charges</th>
			</tr>
				<tr>
					<th class="tablehead wdth" scope="col"></th>
					<th class="tablehead wdth" scope="col"></th>
					<th class="tablehead wdth" scope="col"></th>
					<th class="tablehead wdth" scope="col"></th>
					<th class="tablehead wdth" scope="col"></th>
					<th class="tablehead wdth" scope="col"></th>
					<th class="tablehead wdth" scope="col"></th>
					<th class="tablehead wdth" scope="col"></th>
					<th class="tablehead wdth" scope="col"></th>
					<th class="tablehead wdth" scope="col"></th>
					<th class="tablehead wdth" scope="col">From</th>
					<th class="tablehead wdth" scope="col">To</th>
					<th class="tablehead wdth" scope="col">Total</th>
					<th class="tablehead wdth" scope="col"></th>
			</tr>
	   <?php

				if (!empty($bgrReportData)) {
						$i=1;
					  foreach ($bgrReportData as $row) {
							
							$conn = ConnectionManager::get('default');
							$gradeasign = $row['gradeasign'];
							$query2 = "SELECT grade_desc from m_grade_desc WHERE grade_code = $gradeasign";
							$q2 = $conn->execute($query2);
							$row2 = $q2->fetch();
							$gradename = '';
							if (isset($row2[0])) { // Check if index 0 exists
								$gradename = $row2[0]; // Use index 0 to access the value
							}
							
							echo "<tr>";
							echo "<td>" . $i . "</td>";
            	echo "<td>" . $row['commodity'] . "</td>";
           		echo "<td>" . $row['lotno'] . "</td>";
							echo "<td>" . $row['datesampling'] . "</td>";
          		echo "<td>" . $row['dateofpacking'] . "</td>";
							echo "<td>" . $gradename . "</td>";
							echo "<td>" . $row['packetsize'] . "</td>";
							echo "<td>" . $row['totalnoofpackets'] . "</td>";
							echo "<td>" . $row['totalqtyquintal'] . "</td>";
							echo "<td>" . $row['estimatedvalue'] . "</td>";
							echo "<td>" . $row['agmarkreplicafrom'] . "</td>";
							echo "<td>" . $row['agmarkreplicato'] . "</td>";
							echo "<td>" . $row['agmarkreplicatotal'] . "</td>";
							echo "<td>" . $row['replicacharges'] . "</td>";
            	echo "</tr>";
							$i++;
						}
				}

		
	
    ?>
</table>
<table width="100%" border="1">
			<tr>
			<td align="right" style="padding:5px;"><h5>Total Replica Charges (Rs.): <?php echo $totalReplicaCharges;?></h5></td>
			</tr>
	</table>

<br pagebreak="true" />

<?php if($NablDate !== null){ ?>

<table width="100%" border="1">
	<tr>
			<td align="center" style="padding:5px;"><h4>Details of Analysis of Food Safety Parameters Done from NABL Accredited Laboratory During <?php echo $periodStartDisplay; ?> to <?php echo $periodEndDisplay; ?></h4></td>
	</tr>
</table>

	<table width="100%" border="1">
		<tr>
			<th class="tablehead wdth" scope="col">Sr.No.</th>
			<th class="tablehead wdth" scope="col">Lot No.</th>
			<th class="tablehead wdth" scope="col">Packing Date</th>
			<th class="tablehead wdth" scope="col">Name of Laboratory which tested the samples</th>
			<th class="tablehead wdth" scope="col" colspan="2">Report no. and Date</th>
			<th class="tablehead wdth" scope="col">Remarks</th>
		</tr>
		<?php
				if (!empty($bgrReportData)) {
				
						$i=1;
					  foreach ($bgrReportData as $row) {
							echo "<tr>";
							echo "<td>" . $i . "</td>";
           		echo "<td>" . $row['lotno'] . "</td>";
          		echo "<td>" . $row['dateofpacking'] . "</td>";
							echo "<td>" . $row['laboratoryname'] . "</td>";
							echo "<td>" . $row['reportno'] . "</td>";
							echo "<td>" . $row['reportdate'] . "</td>";
							echo "<td>" . $row['remarks'] . "</td>";
            	echo "</tr>";
							$i++;
						}
				}
    ?>
	</table>

<?php } ?>