<?php //pr($rti_lab_data);die; ?>
<style>
	h4 {
		padding: 5px;
		font-family: times;
		font-size: 12pt;
	}						 

	table{
		padding: 5px;
		font-size: 10pt;
		font-family: times;
	}
</style>
	<table width="100%" border="1">
			<tr>
			<td align="center" style="padding:5px;"><h4>Routine Inspection Report (Approved Laboratory)</h4></td>
			</tr>
	</table>

  <table width="100%" border="1">
	
		<tr>
			  <td style="padding:10px; vertical-align:top;">Date of Last Inspection :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_lab_data['date_p_inspection']; ?></td>
		</tr>
    <tr>
			  <td style="padding:10px; vertical-align:top;">Date & Time of present Inspection :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_lab_data['date_last_inspection']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">1. Name of the laboratory :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $firm_details['firm_name']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">2. Certificate No :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $firm_details['customer_id']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">3. Email Id:</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo base64_decode($firm_details['email']); ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">4. Mobile No :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo base64_decode($firm_details['mobile_no']); ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">5. Commodities for which approved :</td>
			  <td style="padding:10px; vertical-align:top;">
          <?php 
            $i=0;
            foreach ($sub_commodity_value as $value) {
                $comma = ($i!=0)?', ':'';
                echo $comma.$value;
                $i++;
            } 
          ?>
        </td>
		</tr>
    
    <tr>
        <td style="padding:10px; vertical-align:top;">6. Address :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $firm_details['street_address']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">7) Name of the approved chemist Present at the time of inspection :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_lab_data['approved_chemist']; ?></td>
		</tr>
     <tr>
        <td style="padding:10px; vertical-align:top;">8) Is the laboratory well lighted Ventilated and hygienic :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_lab_data['properly_equipped']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">9)Is the Laboratory properly equipped for the grading of the commodities:</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_lab_data['is_equipment']; ?></td>
		</tr>
     <tr>
        <td style="padding:10px; vertical-align:top;">10) Commodities </td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_lab_data['commodity']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">11)Is the equipment is in working order.</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_lab_data['eq_working_order']; ?></td>
		</tr>
     <tr>
        <td style="padding:10px; vertical-align:top;">12) Is the analytical register properly Maintained. </td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_lab_data['lab_properly_maintain']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">13) Are they being forwarded to Concerned offices in time</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_lab_data['fwd_concerned_offices']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">14) Last lot analyzed Lot No.</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_lab_data['last_lot_no']; ?></td>
		</tr>
    
    <tr>
        <td style="padding:10px; vertical-align:top;">16) Name of the Packers and it’s Analytical results.</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_lab_data['p_analytical_reg']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">16) Shortcomings noticed in present Inspection.</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_lab_data['short_noticed']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">16) Suggestions.</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_lab_data['suggestions']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">16) Suggestions given during last.</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_lab_data['suggestion_during_last']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Signature of the authorized person Officerof the printing press or any representative</td>
			  <td style="padding:10px; vertical-align:top;">
           <?php if(!empty($rti_lab_data['signature'])){ $split_file_path = explode("/",$rti_lab_data['signature']);$file_name = $split_file_path[count($split_file_path) - 1];?>
																<a href="<?php echo $rti_lab_data['signature']; ?>"><?php echo substr($file_name,23); ?></a><?php }else{ echo 'NA'; } ?>
        </td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Signature of Inspection with official Stamp:</td>
			  <td style="padding:10px; vertical-align:top;">
           <?php if(!empty($rti_lab_data['signature_name'])){ $split_file_path = explode("/",$rti_lab_data['signature_name']);$file_name = $split_file_path[count($split_file_path) - 1];?>
																<a href="<?php echo $rti_lab_data['signature_name']; ?>"><?php echo substr($file_name,23); ?></a><?php }else{ echo 'NA'; } ?>
        </td>
		</tr>
    
    

</table>