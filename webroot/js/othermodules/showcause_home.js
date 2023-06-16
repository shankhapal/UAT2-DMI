
var whichUser = $('#which_user').val();
var status_id = $('#status_id').val();
var scn_mode = $('#scn_mode_id').val();

if(scn_mode == 'view'){
    $('#comment_box_with_btn').css('display','none');
}


if(whichUser == 'applicant' || status_id == 'sent'){
    $("#reason").prop( "disabled", true );
}


$("#final_submit").click(function(){

    var customer_id = $("#customer_id_value").val();
    var sample_code = $("#sample_code_id").val();

    $.ajax({
        type: "POST",
        url: "../othermodules/final_send_notice",
        data: {customer_id:customer_id,sample_code:sample_code},
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
        },
        success: function(response){
            response = response.match(/~([^']+)~/)[1];
            if($.trim(response)=='done'){
                $.alert({
                    content:"The Show Cause Notice is Sent To the Firms.",
                    onClose: function(){
                        location.replace("../othermodules/misgrading_home");
                      
                    }
                });
            }
        }
    });
});