$(".submit_btn").click(function (e) {
  if (validate_password() == false) {
    e.preventDefault();
  } else {
    $("#common_user_redirect_login_form").submit();
  }
});

return_error_msg = $("#return_error_msg").val();
if (return_error_msg != "") {
  $.alert(return_error_msg);
  $("#common_user_redirect_login_form").trigger("reset");
}

function validate_password() {
  var password = $("#passwordValidation").val();
  let captchacode = $("#captchacode").val();

  if (password == "") {
    $("#error_password").show().text("Please enter your password.");
    $("#passwordValidation").addClass("is-invalid");
    $("#passwordValidation").click(function () {
      $("#error_password").hide().text;
      $("#passwordValidation").removeClass("is-invalid");
    });
    return false;
  }

  if (captchacode == "") {
    $("#error_captcha").show().text("Please enter captcha");

    $("#captchacode").addClass("is-invalid");
    $("#captchacode").click(function () {
      $("#error_captcha").hide().text("");
      $("#captchacode").removeClass("is-invalid");
    });
    return false;
  }

  var PasswordValue = document.getElementById("passwordValidation").value;
  var SaltValue = document.getElementById("hiddenSaltvalue").value;
  var EncryptPass = sha512(PasswordValue);
  var SaltedPass = SaltValue.concat(EncryptPass);
  var Saltedsha512pass = sha512(SaltedPass);
  document.getElementById("passwordValidation").value = Saltedsha512pass;
  exit();
}

// added by shankhpal shende on 17/07/2023 for captcha code
$("#new_captcha").click(function (e) {
  get_new_captcha();
});

function get_new_captcha() {
  $.ajax({
    type: "POST",
    async: true,
    url: "../refresh_captcha_code",
    beforeSend: function (xhr) {
      // Add this line
      xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());
    },
    success: function (data) {
      $("#captcha_img").html(data);
    },
  });
}
