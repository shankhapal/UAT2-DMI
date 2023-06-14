$("#proceed_btn").prop('disabled',true);
//called new ajax to create re-esign session
$("#re_esign_concent").change(function() {

    if($('#re_esign_concent').prop('checked') == true) {

        var reason_to_re_esign = 'Suspension_Cancellation'

        $.ajax({
            type:'POST',
            url: "../othermodules/create_re_esign_session",
            data: {reason_to_re_esign:reason_to_re_esign},
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
            },
            success: function(response){
                $("#proceed_btn").prop('disabled',false);
            }
        });
    }

});



// When the user clicks on the button, open the modal
$("#proceed_btn").click(function(){

    var appl_id = $("#appl_id").val();
    var value_return = true;

    if($('#re_esign_concent').prop("checked") == false){

        $("#error_re_esign_concent").show().text("Check this concent to proceed");
        $("#re_esign_concent").addClass("is-invalid");
        $("#re_esign_concent").click(function(){$("#error_re_esign_concent").hide().text;$("#re_esign_concent").removeClass("is-invalid");});
        value_return = false;
    }
    if(value_return==false){

        return false;
    }else{

        //modal.style.display = "block";
        $("#declarationModal").show();

        var customer_id_split = appl_id.split("/");
        var pdf_funtion_link = null;

        if(customer_id_split[1]=='1'){
            pdf_funtion_link = '../Applicationformspdfs/grant_ca_certificate_pdf';
        }

        $("#preview_link").attr("href",pdf_funtion_link);

        return false;
    }


});