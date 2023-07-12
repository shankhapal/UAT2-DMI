$(document).ready(function () {
  var form_section_id = $("#form_section_id").val();

  add_function();
  edit_function();
  delete_function();
  save_function();

  // ADD FUNCTION
  // Description : this is used to on the click of add button
  // @AUTHOR : SHANKHPAL SHENDE
  // DATE : 16-01-2023
  function add_function() {
    $("#add_revenue_details").click(function (e) {
      e.preventDefault();

      var commodity = $("#commodity").val();
      var approved_tbl_brand = $("#approved_tbl_brand").val();
      var grade_designation = $("#grade_designation").val();
      var bmlt_no = $("#bmlt_no").val();
      var pack_size = $("#pack_size").val();
      var total_quantity = $("#total_quantity").val();
      var total_estimated_value = $("#total_estimated_value").val();
      var agmark_advance_rc = $("#agmark_advance_rc").val();
      var agmark_rc_fresh_amt_received = $(
        "#agmark_rc_fresh_amt_received"
      ).val();
      var total_amount = $("#total_amount").val();
      var agmark_Revenue_closing_balance = $(
        "#agmark_Revenue_closing_balance"
      ).val();
      var remarks = $("#remarks").val();

      var form_data = $("#" + form_section_id).serializeArray();

      form_data.push(
        { name: "commodity", value: commodity },
        { name: "approved_tbl_brand", value: approved_tbl_brand },
        { name: "grade_designation", value: grade_designation },
        { name: "bmlt_no", value: bmlt_no },
        { name: "pack_size", value: pack_size },
        { name: "total_quantity", value: total_quantity },
        { name: "total_estimated_value", value: total_estimated_value },
        { name: "agmark_advance_rc", value: agmark_advance_rc },
        {
          name: "agmark_rc_fresh_amt_received",
          value: agmark_rc_fresh_amt_received,
        },
        { name: "total_amount", value: total_amount },
        {
          name: "agmark_Revenue_closing_balance",
          value: agmark_Revenue_closing_balance,
        },
        { name: "remarks", value: remarks }
      );

      if (validate_revenue_details_section() == true) {
        $.ajax({
          type: "POST",
          url: "../AjaxFunctions/add_revenue_details",
          data: form_data,
          beforeSend: function (xhr) {
            // Add this line
            xhr.setRequestHeader(
              "X-CSRF-Token",
              $('[name="_csrfToken"]').val()
            );
          },
          success: function (response) {
            $("#revenue_table").html(response);
            $("#revenue_table :input[type='text']").val("");

            add_function();
            edit_function();
            delete_function();
            save_function();
          },
        });
      }
    });
  }

  // EDIT FUNCTION
  // Description : this is used to on the click of EDIT button
  // @AUTHOR :SHANKHPAL SHENDE
  // DATE : 16-01-2023

  function edit_function() {
    $(".edit_statement_id").click(function (e) {
      e.preventDefault();

      var statement_id = $(this).attr("id");
      var form_data = $("#" + form_section_id).serializeArray();

      form_data.push({ name: "edit_statement_id", value: statement_id });

      $.ajax({
        type: "POST",
        url: "../AjaxFunctions/edit_revenue_id",
        data: form_data,
        beforeSend: function (xhr) {
          // Add this line
          xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());
        },
        success: function (response) {
          $("#revenue_table").html(response);

          add_function();
          edit_function();
          delete_function();
          save_function();
        },
      });
    });
  }

  function save_function() {
    $("#save_statement_details").click(function (e) {
      e.preventDefault();

      var edit_statement_id = "";
      var save_statement_id = $(this).attr("id");
      var commodity = $("#commodity").val();
      var approved_tbl_brand = $("#approved_tbl_brand").val();
      var grade_designation = $("#grade_designation").val();
      var bmlt_no = $("#bmlt_no").val();
      var total_quantity = $("#total_quantity").val();
      var total_estimated_value = $("#total_estimated_value").val();
      var agmark_advance_rc = $("#agmark_advance_rc").val();
      var agmark_rc_fresh_amt = $("#agmark_rc_fresh_amt").val();
      var total_amount = $("#total_amount").val();
      var agmark_close_balance = $("#agmark_close_balance").val();
      var remarks = $("#remarks").val();
      var pack_size = $("#pack_size").val();

      var form_data = $("#" + form_section_id).serializeArray();

      form_data.push(
        { name: "save_statement_id", value: save_statement_id },
        { name: "commodity", value: commodity },
        { name: "approved_tbl_brand", value: approved_tbl_brand },
        { name: "grade_designation", value: grade_designation },
        { name: "bmlt_no", value: bmlt_no },
        { name: "total_quantity", value: total_quantity },
        { name: "total_estimated_value", value: total_estimated_value },
        { name: "agmark_advance_rc", value: agmark_advance_rc },
        { name: "agmark_rc_fresh_amt", value: agmark_rc_fresh_amt },
        { name: "total_amount", value: total_amount },
        { name: "approved_tbl_brand", value: approved_tbl_brand },
        { name: "agmark_close_balance", value: agmark_close_balance },
        { name: "pack_size", value: pack_size },
        { name: "remarks", value: remarks },
        { name: "edit_statement_id", value: edit_statement_id }
      );

      if (validate_revenue_details_section() == true) {
        $.ajax({
          type: "POST",
          url: "../AjaxFunctions/edit_revenue_id",
          data: form_data,
          beforeSend: function (xhr) {
            // Add this line
            xhr.setRequestHeader(
              "X-CSRF-Token",
              $('[name="_csrfToken"]').val()
            );
          },
          success: function (response) {
            $("#revenue_table").html(response);
            $("#revenue_table :input[type='text']").val("");

            add_function();
            edit_function();
            delete_function();
            save_function();
          },
        });
      }
    });
  }

  function delete_function() {
    $(".delete_statement_id").click(function (e) {
      e.preventDefault();

      var statement_id = $(this).attr("id");
      var form_data = $("#" + form_section_id).serializeArray();

      form_data.push({ name: "delete_statement_id", value: statement_id });

      $.ajax({
        type: "POST",
        url: "../AjaxFunctions/delete_revenue_id",
        data: form_data,
        beforeSend: function (xhr) {
          // Add this line
          xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());
        },
        success: function (response) {
          $("#revenue_table").html(response);

          add_function();
          edit_function();
          delete_function();
          save_function();
        },
      });
    });
  }
});

function validate_revenue_details_section() {
  var commodity = $("#commodity").val();
  var approved_tbl_brand = $("#approved_tbl_brand").val();
  var grade_designation = $("#grade_designation").val();
  var bmlt_no = $("#bmlt_no").val();
  var pack_size = $("#pack_size").val();
  var total_quantity = $("#total_quantity").val();
  var total_estimated_value = $("#total_estimated_value").val();
  var agmark_advance_rc = $("#agmark_advance_rc").val();
  var agmark_rc_fresh_amt_received = $("#agmark_rc_fresh_amt_received").val();
  var total_amount = $("#total_amount").val();
  var agmark_Revenue_closing_balance = $(
    "#agmark_Revenue_closing_balance"
  ).val();
  var remarks = $("#remarks").val();

  var value_return = "true";

  if (pack_size == "") {
    $("#error_pack_size").show().text("Please enter pack size");
    setTimeout(function () {
      $("#error_pack_size").fadeOut();
    }, 5000);
    $("#pack_size").addClass("is-invalid");
    $("#pack_size").click(function () {
      $("#error_pack_size").hide().text;
      $("#pack_size").removeClass("is-invalid");
    });

    value_return = "false";
  }

  if (remarks == "") {
    $("#error_remarks")
      .show()
      .text(
        "Please Enter Remarks (Bharat kosh/D.D. No./Bank Details with dates)"
      );
    setTimeout(function () {
      $("#error_remarks").fadeOut();
    }, 5000);
    $("#remarks").addClass("is-invalid");
    $("#remarks").click(function () {
      $("#error_remarks").hide().text;
      $("#remarks").removeClass("is-invalid");
    });

    value_return = "false";
  }

  if (agmark_Revenue_closing_balance == "") {
    $("#error_agmark_Revenue_closing_balance")
      .show()
      .text(
        "Please Enter Agmark Revenue closing balance of amount at credit (Rs.)"
      );
    setTimeout(function () {
      $("#error_agmark_Revenue_closing_balance").fadeOut();
    }, 5000);
    $("#agmark_Revenue_closing_balance").addClass("is-invalid");
    $("#agmark_Revenue_closing_balance").click(function () {
      $("#error_agmark_Revenue_closing_balance").hide().text;
      $("#agmark_Revenue_closing_balance").removeClass("is-invalid");
    });

    value_return = "false";
  }

  if (total_amount == "") {
    $("#error_total_amount")
      .show()
      .text(
        "Please Enter Total Amount of Agmark Grading Charges adjusted for this lots/months (Rs.)"
      );
    setTimeout(function () {
      $("#error_total_amount").fadeOut();
    }, 5000);
    $("#total_amount").addClass("is-invalid");
    $("#total_amount").click(function () {
      $("#error_total_amount").hide().text;
      $("#total_amount").removeClass("is-invalid");
    });

    value_return = "false";
  }

  if (agmark_rc_fresh_amt_received == "") {
    $("#error_agmark_rc_fresh_amt_received")
      .show()
      .text(
        "Please Enter Agmark Advance Replica Charges Fresh Amount Received (Rs.)"
      );
    setTimeout(function () {
      $("#error_agmark_rc_fresh_amt_received").fadeOut();
    }, 5000);
    $("#agmark_rc_fresh_amt_received").addClass("is-invalid");
    $("#agmark_rc_fresh_amt_received").click(function () {
      $("#error_agmark_rc_fresh_amt_received").hide().text;
      $("#agmark_rc_fresh_amt_received").removeClass("is-invalid");
    });

    value_return = "false";
  }

  if (agmark_advance_rc == "") {
    $("#error_agmark_advance_rc")
      .show()
      .text("Please Enter Agmark Opening Advance Replica Charges (in Rs.)");
    setTimeout(function () {
      $("#error_agmark_advance_rc").fadeOut();
    }, 5000);
    $("#agmark_advance_rc").addClass("is-invalid");
    $("#agmark_advance_rc").click(function () {
      $("#error_agmark_advance_rc").hide().text;
      $("#agmark_advance_rc").removeClass("is-invalid");
    });

    value_return = "false";
  }

  if (total_estimated_value == "") {
    $("#error_total_estimated_value")
      .show()
      .text("Please Enter Total Estimated Value (Rs)");
    setTimeout(function () {
      $("#error_total_estimated_value").fadeOut();
    }, 5000);
    $("#total_estimated_value").addClass("is-invalid");
    $("#total_estimated_value").click(function () {
      $("#error_total_estimated_value").hide().text;
      $("#total_estimated_value").removeClass("is-invalid");
    });

    value_return = "false";
  }

  if (total_quantity == "") {
    $("#error_total_quantity")
      .show()
      .text("Please Enter Total Quantity (in kg/ltr)");
    setTimeout(function () {
      $("#error_total_quantity").fadeOut();
    }, 5000);
    $("#total_quantity").addClass("is-invalid");
    $("#total_quantity").click(function () {
      $("#error_total_quantity").hide().text;
      $("#total_quantity").removeClass("is-invalid");
    });

    value_return = "false";
  }

  if (bmlt_no == "") {
    $("#error_bmlt_no")
      .show()
      .text("Please Enter Batch No./Melt No./Lot No./T.F. No.");
    setTimeout(function () {
      $("#error_bmlt_no").fadeOut();
    }, 5000);
    $("#bmlt_no").addClass("is-invalid");
    $("#bmlt_no").click(function () {
      $("#error_bmlt_no").hide().text;
      $("#bmlt_no").removeClass("is-invalid");
    });

    value_return = "false";
  }

  if (grade_designation == "") {
    $("#error_grade_designation").show().text("Please Enter Grade Designation");
    setTimeout(function () {
      $("#error_grade_designation").fadeOut();
    }, 5000);
    $("#grade_designation").addClass("is-invalid");
    $("#grade_designation").click(function () {
      $("#error_grade_designation").hide().text;
      $("#grade_designation").removeClass("is-invalid");
    });

    value_return = "false";
  }

  if (approved_tbl_brand == "") {
    $("#error_approved_tbl_brand")
      .show()
      .text("Please enter approved tbl brand");
    setTimeout(function () {
      $("#error_approved_tbl_brand").fadeOut();
    }, 5000);
    $("#approved_tbl_brand").addClass("is-invalid");
    $("#approved_tbl_brand").click(function () {
      $("#error_approved_tbl_brand").hide().text;
      $("#approved_tbl_brand").removeClass("is-invalid");
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

  if (value_return == "false") {
    var msg = "Please check some fields are missing or not proper.";
    renderToast("error", msg);
    return false;
  } else {
    return true;
  }
}
