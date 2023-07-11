$(document).ready(function () {
  var form_section_id = $("#form_section_id").val();
  var analysis_tbl = $("#analysis_tbl").val();

  $("#date").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $("#analysis_date").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $("#chemical_parameters").multiselect({
    maxWidth: 200,
    placeholder: "Select Option",
  });
  add_function();
  edit_function();
  delete_function();
  save_function();

  // ADD FUNCTION
  // Description : this is used to on the click of add button
  // @AUTHOR : SHANKHPAL SHENDE
  // DATE : 06-01-2023
  function add_function() {
    $("#add_analysis_details").click(function (e) {
      e.preventDefault();

      var date = $("#date").val();
      var commodity = $("#commodity").val();
      var batch_no = $("#batch_no").val();
      var quantity = $("#quantity").val();
      var chemical_parameters = $("#chemical_parameters").val();
      var grade = $("#grade").val();
      var analysis_date = $("#analysis_date").val();
      var remark = $("#remark").val();

      var form_data = $("#" + form_section_id).serializeArray();

      form_data.push(
        { name: "date", value: date },
        { name: "commodity", value: commodity },
        { name: "batch_no", value: batch_no },
        { name: "quantity", value: quantity },
        { name: "chemical_parameters", value: chemical_parameters },
        { name: "grade", value: grade },
        { name: "analysis_date", value: analysis_date },
        { name: "remark", value: remark }
      );

      if (validate_analysis_reports_section() == true) {
        $.ajax({
          type: "POST",
          url: "../AjaxFunctions/add_bgr_analysis_details",
          data: form_data,
          beforeSend: function (xhr) {
            // Add this line
            xhr.setRequestHeader(
              "X-CSRF-Token",
              $('[name="_csrfToken"]').val()
            );
          },
          success: function (response) {
            $("#analysis_table").html(response);
            $("#analysis_table :input[type='text']").val("");
            // $("#analysis_table #commodity").val("");
            // $(".ms-options").ready(function () {
            //   $("#analysis_table .ms-options li").removeClass("selected");
            // });

            add_function();
            edit_function();
            delete_function();
            save_function();
            $("#date").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#analysis_date").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#chemical_parameters").multiselect({
              maxWidth: 200,
              placeholder: "Select Option",
            });
          },
        });
      }
    });
  }

  // EDIT FUNCTION
  // Description : this is used to on the click of Edit button
  // @AUTHOR : SHANKHPAL SHENDE
  // DATE : 06-01-2023
  function edit_function() {
    $(".edit_analysis_id").click(function (e) {
      e.preventDefault();

      var analysis_id = $(this).attr("id");
      var form_data = $("#" + form_section_id).serializeArray();

      form_data.push({ name: "edit_analysis_id", value: analysis_id });

      $.ajax({
        type: "POST",
        url: "../AjaxFunctions/edit_analysis_id",
        data: form_data,
        beforeSend: function (xhr) {
          // Add this line
          xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());
        },
        success: function (response) {
          $("#analysis_table").html(response);
          add_function();
          edit_function();
          delete_function();
          save_function();
          $("#date").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#analysis_date").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#chemical_parameters").multiselect({
            maxWidth: 200,
            placeholder: "Select Option",
          });
        },
      });
    });
  }
  function delete_function() {
    $(".delete_analysis_id").click(function (e) {
      e.preventDefault();

      var analysis_id = $(this).attr("id");
      var form_data = $("#" + form_section_id).serializeArray();

      form_data.push({ name: "delete_analysis_id", value: analysis_id });

      $.ajax({
        type: "POST",
        url: "../AjaxFunctions/delete_analysis_id",
        data: form_data,
        beforeSend: function (xhr) {
          // Add this line
          xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());
        },
        success: function (response) {
          $("#analysis_table").html(response);

          add_function();
          edit_function();
          delete_function();
          save_function();
          $("#date").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#analysis_date").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#chemical_parameters").multiselect({
            maxWidth: 200,
            placeholder: "Select Option",
          });
        },
      });
    });
  }

  // ADD FUNCTION
  // Description : this is used to on the click of SAVE button
  // @AUTHOR : SHANKHPAL SHENDE
  // DATE : 06-01-2023
  function save_function() {
    $("#save_analysis_details").click(function (e) {
      e.preventDefault();

      var edit_analysis_id = "";
      var save_analysis_id = $(this).attr("id");
      var date = $("#date").val();
      var commodity = $("#commodity").val();
      var batch_no = $("#batch_no").val();
      var quantity = $("#quantity").val();
      var chemical_parameters = $("#chemical_parameters").val();
      var grade = $("#grade").val();
      var analysis_date = $("#analysis_date").val();
      var remark = $("#remark").val();
      var form_data = $("#" + form_section_id).serializeArray();

      form_data.push(
        { name: "save_analysis_id", value: save_analysis_id },
        { name: "date", value: date },
        { name: "commodity", value: commodity },
        { name: "batch_no", value: batch_no },
        { name: "quantity", value: quantity },
        { name: "chemical_parameters", value: chemical_parameters },
        { name: "grade", value: grade },
        { name: "analysis_date", value: analysis_date },
        { name: "remark", value: remark },
        { name: "edit_analysis_id", value: edit_analysis_id }
      );

      if (validate_analysis_reports_section() == true) {
        $.ajax({
          type: "POST",
          url: "../AjaxFunctions/edit_analysis_id",
          data: form_data,
          beforeSend: function (xhr) {
            // Add this line
            xhr.setRequestHeader(
              "X-CSRF-Token",
              $('[name="_csrfToken"]').val()
            );
          },
          success: function (response) {
            $("#analysis_table").html(response);
            $("#analysis_table :input[type='text']").val("");

            add_function();
            edit_function();
            delete_function();
            save_function();
            $("#date").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#analysis_date").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#chemical_parameters").multiselect({
              maxWidth: 200,
              placeholder: "Select Option",
            });
          },
        });
      }
    });
  }
});

function a_tbl_details_section() {
  var value_return = "true";

  if ($("#analysis_table tr td:first").text() == "") {
    $("#error_analysis")
      .show()
      .text("Sorry. There should be minimum 1 TBL details added.");
    $("#error_tbls").css({
      color: "red",
      "font-size": "14px",
      "font-weight": "500",
      "text-align": "right",
    });
    setTimeout(function () {
      $("#error_tbls").fadeOut();
    }, 8000);
    value_return = "false";
  }

  if (value_return == "false") {
    var msg = "Please check some fields are missing or not proper.";
    renderToast("error", msg);
    return false;
  } else {
    exit();
  }
}
//function to check empty fields of machinery details table on add/edit button

function validate_analysis_reports_section() {
  let date = $("#date").val();
  let commodity = $("#commodity").val();
  let batch_no = $("#batch_no").val();
  let quantity = $("#quantity").val();
  let chemical_parameters = $("#chemical_parameters").val();
  let grade = $("#grade").val();
  let analysis_date = $("#analysis_date").val();
  let remark = $("#remark").val();

  let value_return = "true";

  if (date == "") {
    $("#error_date").show().text("Please Select date");
    setTimeout(function () {
      $("#error_date").fadeOut();
    }, 5000);
    $("#date").addClass("is-invalid");
    $("#date").click(function () {
      $("#error_date").hide().text;
      $("#date").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (commodity == "") {
    $("#error_commodity").show().text("Please Select commodity");
    setTimeout(function () {
      $("#error_commodity").fadeOut();
    }, 5000);
    $("#commodity").addClass("is-invalid");
    $("#commodity").click(function () {
      $("#error_commodity").hide().text;
      $("#commodity").removeClass("is-invalid");
    });

    value_return = "false";
  }

  if (batch_no == "") {
    $("#error_batch_no").show().text("Please enter batch no");
    setTimeout(function () {
      $("#error_batch_no").fadeOut();
    }, 5000);
    $("#batch_no").addClass("is-invalid");
    $("#batch_no").click(function () {
      $("#error_batch_no").hide().text;
      $("#batch_no").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (quantity == "") {
    $("#error_quantity").show().text("Please enter quantity");
    setTimeout(function () {
      $("#error_quantity").fadeOut();
    }, 5000);
    $("#quantity").addClass("is-invalid");
    $("#quantity").click(function () {
      $("#error_quantity").hide().text;
      $("#quantity").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (chemical_parameters == "") {
    $("#error_chemical_parameters")
      .show()
      .text("Please select chemical parameters");
    setTimeout(function () {
      $("#error_chemical_parameters").fadeOut();
    }, 5000);
    $("#chemical_parameters").addClass("is-invalid");
    $("#chemical_parameters").click(function () {
      $("#error_chemical_parameters").hide().text;
      $("#chemical_parameters").removeClass("is-invalid");
    });

    value_return = "false";
  }

  if (grade == "") {
    $("#error_grade").show().text("Please enter grade");
    setTimeout(function () {
      $("#error_grade").fadeOut();
    }, 5000);
    $("#grade").addClass("is-invalid");
    $("#grade").click(function () {
      $("#error_grade").hide().text;
      $("#grade").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (analysis_date == "") {
    $("#error_analysis_date").show().text("Please slect analysis date");
    setTimeout(function () {
      $("#error_analysis_date").fadeOut();
    }, 5000);
    $("#analysis_date").addClass("is-invalid");
    $("#analysis_date").click(function () {
      $("#error_analysis_date").hide().text;
      $("#analysis_date").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (remark == "") {
    $("#error_remark").show().text("Please enter remark");
    setTimeout(function () {
      $("#error_remark").fadeOut();
    }, 5000);
    $("#remark").addClass("is-invalid");
    $("#remark").click(function () {
      $("#error_remark").hide().text;
      $("#remark").removeClass("is-invalid");
    });

    value_return = "false";
  }

  if (value_return == "false") {
    var msg = "Please check some fields are missing or not proper.";
    renderToast("error", msg);
    return false;
  } else {
    return true;
  }
}

$("#chemical_parameters").multiselect({
  maxWidth: 200,
  placeholder: "Select Option",
});

$("#authorized_chemist").multiselect({
  maxWidth: 200,
  placeholder: "Select Option",
});
