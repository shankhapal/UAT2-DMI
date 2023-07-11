$(document).ready(function () {
  $("#period_form, #period_to, #dated").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });
});

function showError(element, errorMessage) {
  element.show().text(errorMessage);
  setTimeout(function () {
    element.fadeOut();
  }, 5000);
}

function clearError(element) {
  element.hide().text("");
}

$("#period_form").click(function () {
  clearError($("#error_period_form"));
  $("#period_form").removeClass("is-invalid");
});

$("#period_to").click(function () {
  clearError($("#error_period_to"));
  $("#period_to").removeClass("is-invalid");
});
$("#dated").click(function () {
  clearError($("#error_dated"));
  $("#dated").removeClass("is-invalid");
});

$("#authorized_chemist").click(function () {
  clearError($("#error_authorized_chemist"));
  $("#authorized_chemist").removeClass("is-invalid");
});

function biannually_grading_report() {
  const period_form = $("#period_form").val();
  const period_to = $("#period_to").val();
  const dated = $("#dated").val();
  const authorized_chemist = $("#authorized_chemist").val();

  let value_return = true;

  if (period_form == "") {
    showError($("#error_period_form"), "Please select period form");
    $("#period_form").addClass("is-invalid");
    value_return = false;
  }

  if (authorized_chemist === null || authorized_chemist.length === 0) {
    showError($("#error_authorized_chemist"), "Please select chemist");
    $("#authorized_chemist").addClass("is-invalid");
    value_return = false;
  }
  if (period_to == "") {
    showError($("#error_period_to"), "Please select period to");
    $("#period_to").addClass("is-invalid");
    value_return = false;
  }

  if (dated == "") {
    showError($("#error_dated"), "Please select dated");
    $("#dated").addClass("is-invalid");
    value_return = false;
  }

  if (!value_return) {
    let msg = "Please check some fields are missing or not proper.";
    $.alert(msg);
  }

  return value_return;
}
