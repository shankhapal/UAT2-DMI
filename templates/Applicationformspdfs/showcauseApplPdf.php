<?php ?>
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
			<h4>Show Cause Notice on Migrading</h4>
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
			<br><strong><?php echo $firmData['firm_name']; ?></strong><br>
			<?php echo $firmData['street_address']; ?>,<br>
			<?php echo $firm_district_name; ?>,<br>
			<?php echo $firm_state_name; ?> - <?php echo $firmData['postal_code']; ?><br>
		</td>
	</tr>
		
	<tr>
		<td><br>Subject: Issue of show cause notice on misgrading the Sample <?php echo $sampleArray['sample_code'] ?>.</td><br>
	</tr>

	<tr>
		<td><br>Dear Sir,</td><br>
	</tr>

	<tr>
		<td>
			<br>Please refer to above cited subject in which Sample Code : <?php echo $sampleArray['sample_code']; ?> Sample Type : <?php echo $sampleArray['sample_type']; ?> Commodity : <?php echo $sampleArray['commodity'] ?> graded under AGMARK found
				misgraded. The said samples was analyzed and declared misgraded on account of not
				confirming to the prescribed AGMARK standard from <?php echo $get_office['ro_office']; ?> region.
		</td>
	</tr>
</table>

<?php if (!empty($actionAarray)) { ?>
	<table width="100%" border="1">
		<tr>
			<td>Name of the Commodity with details</td>
			<td>Lat No./ Date of Packing</td>
			<td>Grade Assigned by the Grading Chemist</td>
			<td>Quality Factor on which Sample Misgraded</td>
			<td>Replica Number</td>
			<td>TBL</td>
			<td>Pack Size</td>
			<td>Packing Material</td>
		</tr>
	</table>
	<table width="100%" border="1">
		<tr>
			<td><?php echo $sampleArray['commodity']; ?></td>
			<td><?php echo $sampleDetails['received_date']; ?></td>
			<td><?php echo $sampleArray['grade_desc']; ?></td>
			<td><?php echo $sampleArray['misgrade_category']; ?></td>
			<td><?php echo $sampleArray['replica_serial_no']; ?></td>
			<td><?php echo $sampleArray['tbl']; ?></td>
			<td><?php echo $sampleArray['pack_size']; ?></td>
			<td>N/A</td>
		</tr>
	</table>
<?php } ?>




<table  width="100%">
	<?php if (!empty($actionAarray)) { ?>
		<tr>
			<td>It is the <b><?php echo $sampleArray['misgrade_level_name']; ?></b> misgrading of category <b><?php echo $sampleArray['misgrade_category']; ?></b> in calendar year <?php echo date('Y'); ?>. </td>
		</tr>
	<?php } ?>
	<tr>
		<td>
			<br>Accordingly, you are instructed to immediately withdraw the material from the market and
			remove the AGMARK label / AGMARK replica from the body of containers available with
			you / dealer etc. 
			<br>To whom the above lots have sold. 
			<br>After careful examination of your case, it
			has been conclusively proved that you have violated the provisions of the GGM rules 1998
			and compliance of the existing instruction of the competent authority, a show cause notice
			is hereby issued to you.
		</td>
	</tr>
	<tr>
		<td>
			<br>Your reply on the show cause notice should reach in the office within 14 days from the date
				of receipt of this letter, failing which it will be presumed that you have no explanation to
				offer an ex-parte decision will be taken by this office.
		</td>
	</tr>
</table>

	
<table>
	<tr>
		<td  align="left"><br><br><br>
			Place: <?php echo $firm_district_name.', '; echo $firm_state_name.'.';?><br>
			Date: <?php echo $pdf_date;?>
		</td>
	</tr>
</table>

<table>
	<tr>
		<td align="right">Authorized Signatory<br>
			<?php if ($designation['ro_inspection'] == 'yes') {
					echo 'Regional Office'.'<br> ';
				} elseif ($designation['so_inspection'] == 'yes'){
					echo 'Sub Office'.'<br> ';
				}
				echo $get_office['ro_office'];
			?>
		</td>
	</tr>
</table>