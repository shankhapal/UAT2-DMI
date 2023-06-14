$(document).ready(function(){

	$('#pending_report_table').DataTable();
	$('#scrutinized_report_table').DataTable();
});
  
  $("#B_list").hide();
  $("#A_list").show();
  
  $('.type').change(function(){
  
	  var type=$(".type:checked").val();
	  if(type=='A')
	  {
		$("#B_list").hide();
		$("#A_list").show();
  
	  }else if(type=='B'){

		$("#A_list").hide();
		$("#B_list").show();
	  }
  });
  