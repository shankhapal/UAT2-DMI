alert("hi");

var status_id = $('#status_id').val();
if (status_id == 'submmitted') {
	$('#actions_div').show();
}

$('#save').on('shown.bs.modal', function () {
	$('#myInput').trigger('focus')
})


//call to login validations
$('#save_action').click(function (e) {
	if (validation() == false) { 
		e.preventDefault();
	} else {
		$('#misgrading_action_home').submit();
	}
});


$("#final_submit").click(function(){

	var customer_id = $("#customer_id_value").val();
	var sample_code = $("#sample_code_id").val();

	$.ajax({
		type: "POST",
		url: "../othermodules/final_submit_actions",
		data: {
			customer_id:customer_id,sample_code:sample_code,
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
		},
		success: function(response){

			response = response.match(/~([^']+)~/)[1];

			if($.trim(response) != ''){

				var action = '';
				var redirect_to = '';
				
				if (response == 'Suspension') {
					action = 'suspension, this firm will be Suspended for a period of time. This will be now redirecting to the suspension module for consent and e-sign.';
					redirect_to = '../othermodules/suspensionHome?customer_id=' + encodeURIComponent(customer_id) + '&sample_code=' + encodeURIComponent(sample_code) + '&for_module=' + encodeURIComponent(response);
				} else if (response == 'Cancellation') {
					action = 'cancellation, this firm will be Cancelled. This will be now redirecting to the suspension module for consent and e-sign.';
					redirect_to = '../othermodules/suspensionHome?customer_id=' + encodeURIComponent(customer_id) + '&sample_code=' + encodeURIComponent(sample_code) + '&for_module=' + encodeURIComponent(response);
				} else if (response == 'Refer') {
					action = 'This is now referring to Head Office';
					// No redirection needed
				} else if (response == 'Showcause') {
					action = 'Showcause Notice, The Show cause notice will be sent to the firm.';
					redirect_to = '../othermodules/showcause-home?customer_id=' + encodeURIComponent(customer_id) + '&sample_code=' + encodeURIComponent(sample_code) + '&scn_mode=' + 'edit';
				}


				$.alert({
					title : '',
					columnClass: 'l',
					type: 'blue',
					content:"The Actions on Misgrading is final submitted as " + response + " for Packer ID: " + customer_id + " as selection for " + action + "",
					buttons: {
						Proceed: {
							btnClass: 'btn-green',
							action: function(){

								window.location.href = redirect_to;
							}
						}
					}	
				});
			}
		}
	});
});


function validation(){

	var misgrade_category=$("#misgrade_category").val();
	var misgrade_level=$("#misgrade_level").val();
	var misgrade_action=$("#misgrade_action").val();
	var reason =$("#reason").val();

	var value_return = 'true';


	if(misgrade_category==""){

		$("#error_misgrade_category").show().text("Please Select the misgrade category !");
		$("#misgrade_category").addClass("is-invalid");
		$("#misgrade_category").click(function(){$("#error_misgrade_category").hide().text;$("#misgrade_category").removeClass("is-invalid");});
		value_return = 'false';
	}

	if(misgrade_level==""){

		$("#error_misgrade_level").show().text("Please Select the misgrade level.");
		$("#misgrade_level").addClass("is-invalid");
		$("#misgrade_level").click(function(){$("#error_misgrade_level").hide().text;$("#misgrade_level").removeClass("is-invalid");});
		value_return = 'false';
	}

	if(misgrade_action==""){

		$("#error_misgrade_action").show().text("Please Select the misgrade action !");
		$("#misgrade_action").addClass("is-invalid");
		$("#misgrade_action").click(function(){$("#error_misgrade_action").hide().text;$("#misgrade_action").removeClass("is-invalid");});
		value_return = 'false';
	}

	if(reason==""){

		$("#error_reason").show().text("Please enter valid reason !");
		$("#reason").addClass("is-invalid");
		$("#reason").click(function(){$("#error_reason").hide().text;$("#reason").removeClass("is-invalid");});
		value_return = 'false';
	}

	if(value_return == 'false'){
		var msg = "Please check some fields are missing or not proper.";
		renderToast('error', msg);
		return false;
	}else{

	}
}