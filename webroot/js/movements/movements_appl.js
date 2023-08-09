//added new file by Laxmi Bhadade for movement of application on 20-07-2023
$(window).on('load', function () {
	$("#appl_type").find('option:selected').removeAttr("selected");
});
$("#get_movement").click(function(e){
    if(movement_appl_validation() == false){
       
        e.preventDefault(); 
    }else{ 
        $('#movement_application').submit();
       
    }
});


//application type field not empty validations function
function movement_appl_validation(){
  
    var appl_type = $('#appl_type').val();
    var appl_id = $('#appl_id').val();
    var value_return = true;
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
    if(value_return == 'false'){ 
        var msg = "Please check some fields are missing or not proper.";
        renderToast('error', msg);
        return false;
    }else{
        
        
       
    }
}



//to fetch application id list for specific appl type .
$('#appl_type').change(function(){	
    $('#appl_id').val('');//reset 'application ID' dropdown
    var appl_type = $('#appl_type').val();
    
    if(appl_type != ''){
        $.ajax({
            type: "POST",
            url:"../movements/get_appl_id",
            data: {appl_type:appl_type},
            beforeSend: function (xhr) { // Add this line
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
            }, 
       
            success: function (data) {
              
                $("#appl_id").html('');
                // var resArray = data.match(/~([^']+)~/)[1];//getting data bitween ~..~ from response
                
                var  resArray = JSON.parse(data);//response is JSOn encoded to parse JSON
                $("#appl_id").append("<input type= 'text' placeholder='search.' />");
                $("#appl_id").append("<option value=''>--Select--</option>");//for first option with value blank
                //taking each customer id and firm_name from array and creating options tag with value and text.
               
                $.each(resArray, function(value, value) {
                    if(appl_type != 4){
                    $("#appl_id").append($("<option></option>")
                    .attr("value", this.customer_id).text(this.customer_id +  "  "  + this.firm_name));
                    }else{
                        $("#appl_id").append($("<option></option>")
                        .attr("value", this.chemist_id).text(this.chemist_id +  "  "  + this.chemist_fname + "  " + this.chemist_lname));
                    }
                });
               
                $(function () {
                    $("#appl_id").select2();
                  });
            }
        });
    }
});





$(document).ready(function (){
     
 $('#movement_history').dataTable({
    
});
});



