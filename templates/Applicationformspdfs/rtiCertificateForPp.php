<?php //pr($rti_pp_data);die; ?>
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
			<td align="center" style="padding:5px;"><h4>Routine Inspection Report (Printing Press)</h4></td>
			</tr>
	</table>

  <table width="100%" border="1">
	
		<tr>
			  <td style="padding:10px; vertical-align:top;">Date of Last Inspection :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['date_p_inspection']; ?></td>
		</tr>
    <tr>
			  <td style="padding:10px; vertical-align:top;">Date & Time of present Inspection :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['date_last_inspection']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Name of the Printing Press :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $firm_details['firm_name']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Permitted packaging material :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['packaging_material']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Email Id:</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo 'Email ID :'.base64_decode($firm_details['email']); ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Mobile No :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo 'Mobile no :'.base64_decode($firm_details['mobile_no']); ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Permission valid upto :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['valid_upto']; ?></td>
		</tr>
    
    <tr>
        <td style="padding:10px; vertical-align:top;">Address :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['street_address']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Registered Office :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['registered_office']; ?></td>
		</tr>
     <tr>
        <td style="padding:10px; vertical-align:top;">Printing Press premises. :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['press_premises']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Whether the printed material as in column 6 above is in order as per physical check :</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['physical_check']; ?></td>
		</tr>
     <tr>
        <td style="padding:10px; vertical-align:top;">Whether the printing press is printing </td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['is_printing']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Details of in – house storage facilities for security and safe custody of printing and printed material.</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['storage_facilities']; ?></td>
		</tr>
     <tr>
        <td style="padding:10px; vertical-align:top;">Whether the printing press maintains proper accounts for printing orders received, executed and send monthly invoice records to concerned RO/SO. </td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['maintains_proper']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Whether press is using right quality of printing ink and food grade packaging material. (Check Certificates)</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['right_quality_of_printing']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Whether the printing press is marking logo of printing unit on packaging material.</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['press_is_marking_logo']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Suggestions given during the last inspection, If any & whether corrective actions taken</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['last_insp_suggestion']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Shortcomings observed during the present Inspection.</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['short_obserd']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Suggestions, if any.</td>
			  <td style="padding:10px; vertical-align:top;"><?php echo $rti_pp_data['if_any_sugg']; ?></td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Signature of the the authorized person:</td>
			  <td style="padding:10px; vertical-align:top;">
           <?php if(!empty($rti_pp_data['signature'])){ $split_file_path = explode("/",$rti_pp_data['signature']);$file_name = $split_file_path[count($split_file_path) - 1];?>
																<a href="<?php echo $rti_pp_data['signature']; ?>"><?php echo substr($file_name,23); ?></a><?php }else{ echo 'NA'; } ?>
        </td>
		</tr>
    <tr>
        <td style="padding:10px; vertical-align:top;">Signature of Inspection with official Stamp:</td>
			  <td style="padding:10px; vertical-align:top;">
           <?php if(!empty($rti_pp_data['signature_name'])){ $split_file_path = explode("/",$rti_pp_data['signature_name']);$file_name = $split_file_path[count($split_file_path) - 1];?>
																<a href="<?php echo $rti_pp_data['signature_name']; ?>"><?php echo substr($file_name,23); ?></a><?php }else{ echo 'NA'; } ?>
        </td>
		</tr>
    <table width="100%" border="1">
          <tr>
              <td align="center" style="padding:5px;"><h4>List of packers granted permission to print Agmark Replica by the printing press</h4></td>
          </tr>
    </table>
    <table width="100%" border="1">
      
      <tr>
          
          <th align="center" style="padding:5px;">Sr.No</th>
          <th align="center" style="padding:5px;">Packer</th>
          <th align="center" style="padding:5px;">CA No.</th>
          <th align="center" style="padding:5px;">Validity</th>
          <th align="center" style="padding:5px;">Commodities</th>
          <th align="center" style="padding:5px;">TBL</th>
      </tr> 
     

        <?php 
            $i=1; 
            foreach($all_packers_value as $packer_detail){ ?>    
        <tr>
            <td align="center" style="padding:5px;"><?php echo $i; ?></td>
            <td align="center" style="padding:5px;"><?php echo $packer_detail['firm_name'];?></td>
            <td align="center" style="padding:5px;"><?php echo $packer_detail['customer_id'];?></td>
            <td align="center" style="padding:5px;"><?php echo $packer_detail['validupto'];?></td>
            <td align="center" style="padding:5px;"><?php 
            $j = 0;
            foreach($packer_detail['sub_commodity'] as $sub_commodity){
                 echo $j==0?$sub_commodity:", ".$sub_commodity;
	               $j=$j+1;
            }
            ?></td>
            <td align="center" style="padding:5px;"  colspan="2"><?php 
            $k=0;
            foreach($packer_detail['tbl_name'] as $tbl_name){
                echo $k==0?$tbl_name:", ".$tbl_name;
                $k++;
            }?></td>
        </tr>   
        <?php $i=$i+1; } ?>
    </table>

    <table width="100%" border="1">
          <tr>
              <td align="center" style="padding:5px;"><h4>Available stock of printed packaging material with Agmark replica (packer wise)</h4></td>
          </tr>
    </table>
    <table width="100%" border="1">
       <tr>
          <th colspan="2"></th>
          <th align="center" style="padding:5px;" colspan="3" class="text-center">Quantity /Nos.</th>
          <th colspan="2"></th>
      </tr>
      <tr>
          <th align="center" style="padding:5px;">Sr.No</th>
          <th align="center" style="padding:5px;">Packer Id</th>
          <th align="center" style="padding:5px;">Indent</th>
          <th align="center" style="padding:5px;">Supplied</th>
          <th align="center" style="padding:5px;">Balance</th>
          <th align="center" style="padding:5px;" colspan="3" >TBL</th>
      </tr>
        <?php 
            $i=1; 
            foreach($added_packers_details as $p_detail){ ?>    
        <tr>
            <td align="center" style="padding:5px;"><?php echo $i; ?></td>
            <td align="center" style="padding:5px;"><?php echo $p_detail['packer_id'];?></td>
            <td align="center" style="padding:5px;"><?php echo $p_detail['indent'];?></td>
            <td align="center" style="padding:5px;"><?php echo $p_detail['supplied'];?></td>
            <td align="center" style="padding:5px;"><?php echo $p_detail['balance'];?></td>
            <td align="center" style="padding:5px;" colspan="3" ><?php echo $p_detail['tbl'];?></td>
        </tr>   
        <?php $i=$i+1; } ?>
    </table>

    

</table>