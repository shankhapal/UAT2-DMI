	
	$("#submit_btn").hide();
	$("#submit_btn").click(function(e){
		if(transfer_appl_validation() == false){
			e.preventDefault(); 
		}else{
			var customer_id = $('#appl_id').val();
			var appl_type = $('#appl_type').val();
			var remark = $('#remark').val();
			
			$.ajax({
				type: "POST",
				url:"../Dashboard/reject_application",
				data: {customer_id:customer_id,appl_type:appl_type,remark:remark},
				beforeSend: function (xhr) { // Add this line
					xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
				}, 
				success: function (response) {
					
					if(response!='' || response!=null){
						$("#appl_status").html('<h5>The selected application has been marked as rejected successfully</h5>');
						$("#submit_btn").hide();
					}
					
					$("#get_details_btn").show();
					
				}
			});
			e.preventDefault();
		}
	});
	
	$("#get_details_btn").click(function(e){

		if(transfer_appl_validation() == false){
			e.preventDefault(); 
		}else{
			var customer_id = $('#appl_id').val();
			var appl_type = $('#appl_type').val();
			
			$.ajax({
				type: "POST",
				url:"../Othermodules/get_appl_details_to_mark_reject",
				data: {customer_id:customer_id,appl_type:appl_type},
				beforeSend: function (xhr) { // Add this line
					xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
				}, 
				success: function (response) {
					
					$("#appl_status").html(response);
					$("#submit_btn").show();
					$("#get_details_btn").hide();
					
				}
			});
			e.preventDefault();
		}
	});



	//form field not empty validations function
	function transfer_appl_validation(){

		var appl_type = $('#appl_type').val();
		var appl_id = $('#appl_id').val();
		var remark = $('#remark').val();
		var value_return = 'true';
		
		if(appl_type==''){

			$("#error_appl_type").show().text("Please Select Application type");
			$("#appl_type").addClass("is-invalid");
			$("#appl_type").click(function(){$("#error_appl_type").hide().text;$("#appl_type").removeClass("is-invalid");});
			value_return = 'false';
		}

		if(appl_id==''){	

			$("#error_appl_id").show().text("Please Select Application Id");
			$("#appl_id").addClass("is-invalid");
			$("#appl_id").click(function(){$("#error_appl_id").hide().text;$("#appl_id").removeClass("is-invalid");});
			value_return = 'false';
		}

		if(remark==''){	

			$("#error_remark").show().text("Please write Remark/Reason");
			$("#remark").addClass("is-invalid");
			$("#remark").click(function(){$("#error_remark").hide().text;$("#remark").removeClass("is-invalid");});
			value_return = 'false';
		}

		if(value_return == 'false'){
			var msg = "Please check some fields are missing or not proper.";
			renderToast('error', msg);
			return false;
		}
	}
