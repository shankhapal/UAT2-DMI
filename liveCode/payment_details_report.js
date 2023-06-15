
		$('.search_field').val('');

		//create the dynamic path for ajax url (Done by pravin 03/11/2017) - added by Ankur Jangid 20/05/2021
		var host = location.hostname;
		var paths = window.location.pathname;
		var split_paths = paths.split("/");
		var path = "/"+split_paths[1]+"/"+split_paths[2];

		$('#state').change(function(e){

			var state = $('#state').val();

			var form_data = $("#newly_added_firm").serializeArray();
			form_data.push({name: "state", value: state});

			$.ajax({
				type: "POST",
				url: path+"/showDistrictDropdown",
				data: form_data,
				success: function(response){
					$("#district").html(response);
				}
			});
		});

		$(document).ready(function () {

			$('#fromdate').datepicker({format: "dd/mm/yyyy",orientation: "left top",autoclose: true,});
			$('#todate').datepicker({ format: "dd/mm/yyyy", orientation: "left top", autoclose: true, });
			$('#payment_details_report_table').DataTable();

			$('#search_btn').click(function(){

				var from = $("#fromdate").val().split("/");
				var fromdate = new Date(from[2], from[1] - 1, from[0]);

				var from = $("#todate").val().split("/");
				var todate = new Date(from[2], from[1] - 1, from[0]);

				if(todate < fromdate){

					alert('Invalid Date Range Selection');
					return false;
				}
			});

			$('html, body').animate({
        		scrollTop: $('#page-load').offset().top
    		}, 'slow');
			 //added new js for click radio button in revenue reports by shankhpal shinde
			$('input[type="radio"]').click(function () {
				var inputValue = $(this).attr("value");
			
				if (inputValue == "yes") {
				  $(".reportlst").show();
				  $(".reportCnt").hide();
				  // $("#payment_details_report_table_count").hide();
				}
				if (inputValue == "no") {
				  $(".reportlst").hide();
				  $(".reportCnt").show();
				}
			  });
			});
			
			$(".plusIcon").on("click", function () {
			  var obj = $(this);
			  if (obj.hasClass("glyphicon-plus")) {
				obj.hide();
				obj.next().show();
				obj.parent().parent().next().show();
			  } else {
				obj.hide();
				obj.prev().show();
				obj.parent().parent().next().hide();
			  }
			});
