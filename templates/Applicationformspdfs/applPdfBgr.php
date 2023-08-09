<?php  ?>

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
			<h4>Application Bianually Grading returns of [month & year]</h4>
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
			<td><br>Subject: Application for approval of Surrender of Certificate.</td><br>
		</tr>

		<tr>
			<td><br>Dear Sir,</td><br>
		</tr>

		<tr>
			<td>
				<br>I,	<?php echo $customerData['f_name']." ".$customerData['l_name']; ?> of 
					  <?php 
							echo $firmData['firm_name'].', '; 
							echo $firmData['street_address'].','; 
							echo $firm_district_name.', '; 
							echo $firm_state_name.', '; 
							echo $firmData['postal_code']; 
						?>  
					seek approval for surrender the certificate of authorisation of agricultural commodities for 
					<?php echo $firmData['firm_name']; ?> in accordance with the provision of agriculture produce (Grading and Marking) Act, 
					1937 and rules made there under.
			</td>
		</tr>
	</table>

	
	
	