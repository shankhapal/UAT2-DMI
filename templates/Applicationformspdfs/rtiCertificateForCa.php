
<?php //echo $rti_ca_data;die; ?>
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
			<td align="center" style="padding:5px;"><h4>Routine Inspection Report (CA-Packer)</h4></td>
			</tr>
	</table>

  <table width="100%" border="1">
	
		<tr>
			  <td style="padding:10px; vertical-align:top;">Date of Last Inspection :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['date_last_inspection']; ?></td>
		</tr>
    <tr>
			  <td style="padding:10px; vertical-align:top;">Date & Time of present Inspection :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['date_p_inspection']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Name of Authorized Packer :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $firm_details['firm_name']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Address of the Authorized Premises :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $firm_details['street_address']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Contact details of the packer Mobile:</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo 'Mobile :'. base64_decode($firm_details['mobile_no'])." , ".'Email ID :'.base64_decode($firm_details['email']); ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Certificate of Authorization No :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $firm_details['customer_id']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">valid upto :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $certificate_valid_upto; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Commodity (ies) for which CA is granted :</td>
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
        <td style="padding:10px; vertical-align:top;">Name of the grading Laboratory :</td>
			  <td style="padding:10px; vertical-align:top;">
         <?php 
            $i=0;
            foreach ($lab_list as $value) {
                $comma = ($i!=0)?', ':'';
                echo $comma.$value;
                $i++;
            } 
        ?>
      </td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Name of approved Printing press :</td>
			  <td style="padding:10px; vertical-align:top;"><?php 
            $i=0;
            foreach ($printers_list as $value) {
                $comma = ($i!=0)?', ':'';
                echo $comma.$value;
                $i++;
            }  ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Record of invoice of print Agmark replica is upto date or not? :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['record_of_invice']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Name of the chemist Incharge Whether present at the time of Inspection :</td>
			  <td style="padding:10px; vertical-align:top;"><?php 
           if(!empty($self_registered_chemist)){
               echo $self_registered_chemist[0]['chemist_fname']." ".$self_registered_chemist[0]['chemist_lname'];
           }else{
            echo "NULL";
           }
      ?></td>
		</tr>
     <tr>
        <td style="padding:10px; vertical-align:top;">Is the premises adequately lighted, ventilated & hygienic :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['premises_adequately']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Is the laboratory properly equipped :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['lab_properly_equipped']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Are they up to date</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['are_you_upto_date']; ?></td>
		</tr>
     <tr>
        <td style="padding:10px; vertical-align:top;">Are they being forwarded to the concerned offices in time?</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['concerned_offices']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Last lot No. dated And its analytical results.</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['last_lot_no']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Quantity graded during current month Upto </td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['quantity_graded']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Is the Agmark Replica account correct?</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['replica_account_correct']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Is the packer getting its lots tested by FSSAI approved Lab for food safety parameters every 6 months?</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['fssai_approved']; ?></td>
		</tr>
     <tr>
        <td style="padding:10px; vertical-align:top;">Enumerate briefly suggestions given during last inspection and state, if carried out:</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['e_briefly_suggestions_radio']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Shortcomings noticed in present inspection:</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['shortcomings_noticed']; ?></td>
		</tr>
    
    <tr>
        <td style="padding:10px; vertical-align:top;">Signature of the Packer or his representative:</td>
			  <td style="padding:10px; vertical-align:top;">
           <?php if(!empty($rti_ca_data['signature'])){ $split_file_path = explode("/",$rti_ca_data['signature']);$file_name = $split_file_path[count($split_file_path) - 1];?>
																<a href="<?php echo $rti_ca_data['signature']; ?>"><?php echo substr($file_name,23); ?></a><?php }else{ echo 'NA'; } ?>
        </td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Name of the Packer or his representative:</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['name_of_packer']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Signature of the Inspecting Officer:</td>
			  <td style="padding:10px; vertical-align:top;"><?php if(!empty($rti_ca_data['signature_name'])){ $split_file_path = explode("/",$rti_ca_data['signature_name']);$file_name = $split_file_path[count($split_file_path) - 1];?>
																<a href="<?php echo $rti_ca_data['signature_name']; ?>"><?php echo substr($file_name,23); ?></a><?php }else{ echo 'NA'; } ?></td>
		</tr>
     <tr>
        <td style="padding:10px; vertical-align:top;">Name of the Inspecting Officer:</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['name_inspecting_officer']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Designation:</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_ca_data['designation_inspecting_officer']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Place:</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $firm_district_name.', '; echo $firm_state_name.'.';?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Date:</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $pdf_date;?></td>
		</tr>
    <table>					
	 <tr>
		<td  align="left"><br><br><br>
		
		</td>
	</tr>
</table>
    <table width="100%" border="1">
          <tr>
              <td align="center" style="padding:5px;"><h4>Collection of check samples : -</h4></td>
          </tr>
    </table>
    <table width="100%" border="1">
        <tr>
             <th align="center" style="padding:5px;">S.No</th>
             <th align="center" style="padding:5px;">Commodity</th>
             <th align="center" style="padding:5px;">Pack Size</th>
             <th align="center" style="padding:5px;">Lot No</th>
             <th align="center" style="padding:5px;">Date of Packing</th>
             <th align="center" style="padding:5px;">Best Before</th>
             <th align="center" style="padding:5px;">Replica Sl. No</th>
        </tr>
        <?php 
            $i=1; 
            foreach($added_sample_details as $sample_detail){ ?>    
        <tr>
            <td align="center" style="padding:5px;"><?php echo $i; ?></td>
            <td align="center" style="padding:5px;"><?php echo $sample_detail['commodity_name'];?></td>
            <td align="center" style="padding:5px;"><?php echo $sample_detail['pack_size'];?></td>
            <td align="center" style="padding:5px;"><?php echo $sample_detail['lot_no'];?></td>
            <td align="center" style="padding:5px;"><?php echo $sample_detail['date_of_packing'];?></td>
            <td align="center" style="padding:5px;"><?php echo $sample_detail['best_before'];?></td>
            <td align="center" style="padding:5px;"><?php echo $sample_detail['replica_si_no'];?></td>
        </tr>   
        <?php $i=$i+1; } ?>
    </table>

</table>