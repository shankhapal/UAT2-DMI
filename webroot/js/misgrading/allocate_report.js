	$(document).ready(function () {
		/*
		//Check if the sample is scrutinized or allocated
		var statusArray = $('#statusArray_id').val();

		if (statusArray.length > 0) {
			var sampleStatus = JSON.parse(statusArray);

			// Access the property values
			var savedValue = sampleStatus.saved; // "approved"
			var allocatedValue = sampleStatus.allocated; // null
			var scrutinzedValue = sampleStatus.scrutinzed; // "done"
		
		  }
		  */

		//This is added to initialize the custom dropdown
		create_custom_dropdowns();
		
		var current_level = $('#current_level').val();

		var isAlreadyExist = $('#packers_id').data('already-exist');
		
		var is_allocated = $('#is_allocated_id').val();

		if (Boolean(isAlreadyExist)) {
			$('.dropdown-select').addClass('read-only');
			$('#save_details').prop('disabled', false);
		} else {
			$('#save_details').prop('disabled', true);
		}

		// Check if the Save Details button is disabled
		if ($('#save_details').is(':disabled')) {
			// Hide the Scrutiny and Allocate Report buttons
			$('#scrutiny').hide();
			$('#allocate_report').hide();
		}


		//Calling this methods to show the status
		statusOfPacker();

		if (is_allocated == 'yes') {
			statusOfReportAlloactions();	
		}
	

		if (current_level == 'level_1') {

			statusForScrutinizer();
		}

		//to auto load the details it the dropdown is selected
		var selectedValue = $('#packers_id').val();
		if (selectedValue !== '') {
			attachSamplePacker();
		}

		$('#packers_id').on('change', function() {
			var selectedValue = $(this).val();
			if (selectedValue !== '') {
				attachSamplePacker();
			}
		});


		
		// To calling the ajax which will save the sample code and customer id together
		$(document).on('click', '#attach_sam_pac', function(event) {

			event.preventDefault(); 
		
			var customer_id = $(this).data('customer-id');
			var sample_code = $('#sample_code_value').val();
			
			$.ajax({
				url: '../misgrading/attach_sample_packer',
				type: 'POST',
				data: {customer_id: customer_id,sample_code: sample_code,},
				beforeSend: function (xhr) {
					xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
				},
				success: function(response) {
					var response = response.match(/~([^']+)~/)[1];
		
					$.alert({
						icon: "fas fa-exclamation-circle",
						columnClass: 'm',
						content: "The Sample Code " + sample_code + " has been successfully attached to the Packer ID: " + customer_id + ".",
						onClose: function(){
							location.reload(); // Reload the page
						}
					});
				}
			});
		
		});

		// To calling the ajax which will save the sample code and customer id together
		$(document).on('click', '#remove_sam_pac', function(event) {

			event.preventDefault(); 

			var sample_code = $('#sample_code_value').val();
			var customer_id = $('#packers_id').val();
			
			$.ajax({
				url: '../misgrading/remove_sample_packer',
				type: 'POST',
				data: {sample_code: sample_code,customer_id:customer_id},
				beforeSend: function (xhr) {
					xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
				},
				success: function(response) {
					var response = response.match(/~([^']+)~/)[1];
					$.alert({
						icon: "fas fa-exclamation-circle",
						columnClass: 'm',
						content: "The Sample Code "+sample_code+" has been successfully removed from the Packer ID "+customer_id+".",
						onClose: function(){
							location.reload(); // Reload the page
						}
					});
				
				}
			});
		
		});

		// To Allocate the Report to scrutinizer on click
		$(document).on('click', '#allocate_report', function(event) {

			event.preventDefault(); 
		
			var customer_id = $('#packer_id').val();
			var sample_code = $('#sample_code').val();
	
			$.ajax({
				url: '../misgrading/popupForScrutiny',
				type: 'POST',
				data: {customer_id: customer_id,sample_code: sample_code,},
				beforeSend: function (xhr) {

					$(".loader").show();
					$(".loadermsg").show();
					xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
				},
				success: function(data) {
					
					$(".loader").hide();$(".loadermsg").hide();
					$("#allocation_popup_box").show();
					$("#allocation_popup_box").html(data);
					$("#scrutiny_alloction_Modal").show();
				}
			});
		});

		//for scrutiny allocation
		$(document).on('click', '#scrutiny_allocate_btn', function(event) {
			event.preventDefault(); 
			
			var sample_code = $("#sample_code").val();
			var customer_id = $("#customer_id").val();
			var mo_user_id = $("#mo_users_list").val();
			
			$.ajax({
				type: "POST",
				async:true,
				url:"../misgrading/allocate_report_for_scrutiny",
				data:({sample_code:sample_code,customer_id:customer_id,mo_user_id:mo_user_id}),
				beforeSend: function (xhr) { // Add this line

					$(".loader").show();
					$(".loadermsg").show();
					xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
				}, 
				success: function (data) {
					
					$(".loader").hide();
					$(".loadermsg").hide();
					$("#scrutiny_alloction_Modal").hide();
					var allocation_to = data.match(/~([^']+)~/)[1];

					$.alert({
						icon: "fas fa-exclamation-circle",
						columnClass: 'm',
						content: "The Sample Code / Report " + sample_code + " was successfully allocated for scrutiny to Scrutiny Officer. " + allocation_to + "",
						onClose: function(){
							window.location.href = '/misgrading/report_listing_for_allocation';
						}
					});
					/*
					//to reload list after allocation
					if(allocation_by=='nodal' || allocation_by=='dy_ama'){
						$('#for_scrutiny_allocation_tab').click();
					}else if(allocation_by=='level_4_ro'){
						$('#for_scrutiny_of_so_appl_tab').click();
					}*/
				}
			});
		});	

	
	});



	//Description : To Attach the Packer Id and the Sample Code Together on the click of the Allocate button.
	//Author : Akash Thakre
	//Date : 25-05-2023
	
	function attachSamplePacker() {
		
		var customer_id = $('#packers_id').val();
		var sample_code = $('#sample_code').val();
	
		if (customer_id !== '') {

			$.ajax({
				url: '../misgrading/get_firm_details',
				type: 'POST',
				data: {customer_id: customer_id,sample_code: sample_code},
				beforeSend: function (xhr) { // Add this line
					xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
				},
				success: function(response) {

					var responseObject = JSON.parse(response.replace(/~/g, ''));
					
					// Assuming you have a div element with the id "firm_details"
					var responseDiv = document.getElementById("firm_details");

					if (responseObject.isSampleAllocated !== 'allocated') {

						// Constructing the HTML content using the firm_details object
						if (responseObject.status !== 'not_found') {
							var message = "Note: If you wish to attach a different Packer ID to the current Sample Code ("+sample_code+"), please click the <b>Remove</b> button to detach the currently attached sample code.";
						}else{
							var message = "Note: To link the Sample Code/Report (" + sample_code + ") with the Packer ID: " + customer_id + ", kindly click the <b>Attach</b> button.";
						}
					} else {
						message='';
					}
				
					var htmlContent = "<div class='card card-primary'>" +
						"<div class='card-header'><h3 class='card-title'>Firm Details</h3></div>" +
						"<div class='card-body'>" +
						"<dl class='row'>" +
						"<p>" + message + "</p>" +
						"<dt class='col-sm-4'>Firm Name: </dt>" +
						"<dd class='col-sm-8'>" + responseObject.firm_name + "</dd>" +
						"<dt class='col-sm-4'>Address: </dt>" +
						"<dd class='col-sm-8'> " + responseObject.street_address + ", " + responseObject.district_name + ", " + responseObject.state_name + ", " + responseObject.postal_code + "</dd>" +
					"</dl>";
					
						"</div>"+
						"<div class='card-footer'>";
				
						if (responseObject.isSampleAllocated !== 'allocated') {
							// Add the condition here
							if (responseObject.status !== 'not_found') {
								htmlContent += "<button type='button' class='float-right' id='remove_sam_pac' data-customer-id='" + customer_id + "'>Remove</button>";
							} else {
								htmlContent += "<button type='button' id='attach_sam_pac' data-customer-id='" + customer_id + "'>Attach</button>";
							}
						}
					

					htmlContent += "</div>";


					// Setting the HTML content of the div
					responseDiv.innerHTML = htmlContent;

				}
			});

		} else {
			$('#firm_details').hide();
		}

	}


	//Description : To Display the Status on the Dashboard
	//Author : Akash Thakre
	//Date : 25-05-2023

	function statusOfPacker(){
	
		var sample_code = $('#sample_code').val();

		$.ajax({
			url: '../misgrading/detailsOfSample',
			type: 'POST',
			data: {sample_code: sample_code},
			beforeSend: function (xhr) { // Add this line
				xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			},
			success: function(response) {
				
				var response = response.match(/~([^']+)~/)[1];
				var responseObject = JSON.parse(response);
				
				// Assuming you have a div element with the id "firm_details"
				var responseDiv = document.getElementById("status_of_packer");
			
				// Constructing the HTML content using the firm_details object
				if (responseObject !== 'not_found') { 
					var htmlContent = "Packer is Attached";
				}else{
					htmlContent = '<p>Note: Before proceeding, please ensure that you attach the provided' + "<br>" + 
					'sample code to the corresponding Packer ID selected from the dropdown menu.</p>';

				}
				
				// Setting the HTML content of the div
				responseDiv.innerHTML = htmlContent;

			}
		});
	}



	//Description : To Display the Status on the Dashboard for the Allocation
	//Author : Akash Thakre
	//Date : 25-05-2023

	function statusOfReportAlloactions(){
	
		var sample_code = $('#sample_code').val();

		$.ajax({
			url: '../misgrading/statusOfReportAlloactions',
			type: 'POST',
			data: {sample_code: sample_code},
			beforeSend: function (xhr) { // Add this line
				xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			},
			success: function(response) {
				
				var responseObject = JSON.parse(response.replace(/~/g, ''));
	
				// Assuming you have a div element with the id "firm_details"
				var responseDiv = document.getElementById("report_allocation_status");
			
				var htmlContent = 
				"<div class='card card-primary'>" +
					"<div class='card-header'><h3 class='card-title'>Allocation Details</h3></div>" +
					"<div class='card-body'>" +	
						"<dl class='row'>" +
							"<dt class='col-sm-4'>Allocated To	: </dt>" +
							"<dd class='col-sm-8'>" + responseObject.allocated_to + "</dd>" +
							"<dt class='col-sm-4'>Email	: </dt>" +
							"<dd class='col-sm-8'> " + responseObject.email + "</dd>" +
							"<dt class='col-sm-4'>Office	: </dt>" +
							"<dd class='col-sm-8'> " + responseObject.office + "</dd>" +
							"<dt class='col-sm-4'>Date		:	</dt>" +
							"<dd class='col-sm-8'> " + responseObject.allocated_date + "</dd>" +
						"</dl>"+
					"</div>"+
				"</div>";


				// Setting the HTML content of the div
				responseDiv.innerHTML = htmlContent;

			}
		});
	}



	//Description : To Display the Status on the Dashboard for the Allocation
	//Author : Akash Thakre
	//Date : 25-05-2023

	function statusForScrutinizer(){
		
		var sample_code = $('#sample_code').val();
		
		$.ajax({
			url: '../misgrading/statusForScrutinizer',
			type: 'POST',
			data: {sample_code: sample_code},
			beforeSend: function (xhr) { // Add this line
				xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			},
			success: function(response) {

				var responseObject = JSON.parse(response.replace(/~/g, ''));
				console.log(responseObject);
				// Assuming you have a div element with the id "firm_details"
				var responseDiv = document.getElementById("firm_details");

				var htmlContent = 
				"<div class='card card-primary'>" +
					"<div class='card-header'><h3 class='card-title'>Firm Details</h3></div>" +
					"<div class='card-body'>" +
						"<dl class='row'>" +
							"<dt class='col-sm-4'>Packer ID: </dt>" +
							"<dd class='col-sm-8'>" + responseObject.customer_id + "</dd>" +
							"<dt class='col-sm-4'>Packer Name: </dt>" +
							"<dd class='col-sm-8'> " + responseObject.firm_name + "</dd>" +
							"<dt class='col-sm-4'>Allocated From: </dt>" +
							"<dd class='col-sm-8'> " + responseObject.allocated_by + "</dd>" +
							"<dt class='col-sm-4'>Date: </dt>" +
							"<dd class='col-sm-8'> " + responseObject.date + "</dd>" +
						"</dl>"+
					"</div>"+
				"</div>";


				// Setting the HTML content of the div
				responseDiv.innerHTML = htmlContent;

			}
		});
	}




	