$(document).ready(function () {
  $("#rpl_datesampling").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $("#rpl_dateofpacking").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });

  $("#rpl_reportdate").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });

  $(".replica_allotment_btn").each(function () {
    $(this).click(function () {
      var buttonID = $(this).attr("id");
      var index = buttonID.split("_")[3];

      $("#rpl_datesampling_" + index).datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
      });
      $("#rpl_dateofpacking_" + index).datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
      });

      $("#rpl_reportdate_" + index).datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
      });

      var isValid = true;

      // Function to show error message and add invalid class
      function showErrorAndMarkInvalid($element, errorMessage) {
        $element.addClass("is-invalid");
        $element.siblings(".error-message").show().text(errorMessage);
        setTimeout(function () {
          $element.removeClass("is-invalid");
          $element.siblings(".error-message").fadeOut();
        }, 8000);
        isValid = false;
      }

      // Validate Lot No./M. No. field
      var $rpl_lotno = $("#rpl_lotno_" + index);
      var rpl_lotno = $rpl_lotno.val().trim();
      if (rpl_lotno === "") {
        showErrorAndMarkInvalid(
          $rpl_lotno,
          "Please Enter Lot No.TF No./M. No."
        );
      }

      // Validate Date of sampling field
      var $rpl_datesampling = $("#rpl_datesampling_" + index);
      var rpl_datesampling = $rpl_datesampling.val().trim();
      if (rpl_datesampling === "") {
        showErrorAndMarkInvalid(
          $rpl_datesampling,
          "Please Select Date of sampling"
        );
      }

      // Validate Date of date of packing field
      var $rpl_dateofpacking = $("#rpl_dateofpacking_" + index);
      var rpl_dateofpacking = $rpl_dateofpacking.val().trim();
      if (rpl_dateofpacking === "") {
        showErrorAndMarkInvalid(
          $rpl_dateofpacking,
          "Please Select Date of packing"
        );
      }

      // Validation for Total Qty. graded in Quintal field
      var $rpl_qty_quantal = $("#rpl_qty_quantal_" + index);
      var rpl_qty_quantal = $rpl_qty_quantal.val().trim();
      if (rpl_qty_quantal === "") {
        showErrorAndMarkInvalid($rpl_qty_quantal, "Please Enter Total Qty");
      }

      // Validation for Estimated value (in Rs.)
      var $rpl_estimatedvalue = $("#rpl_estimatedvalue_" + index);
      var rpl_estimatedvalue = $rpl_estimatedvalue.val().trim();
      if (rpl_estimatedvalue === "") {
        showErrorAndMarkInvalid(
          $rpl_estimatedvalue,
          "Please Enter Estimated value (in Rs.)"
        );
      }

      // Validation for Report no

      // Validation for Total Qty. graded in Quintal field
      var $rpl_reportno = $("#rpl_reportno_" + index);
      var rpl_reportno = $rpl_reportno.val().trim();
      if (rpl_reportno === "") {
        showErrorAndMarkInvalid($rpl_reportno, "Please Enter Report no");
      }

      // Validation for Report Date
      var $rpl_reportdate = $("#rpl_reportdate_" + index);
      var rpl_reportdate = $rpl_reportdate.val().trim();
      if (rpl_reportdate === "") {
        showErrorAndMarkInvalid($rpl_reportdate, "Please Select Report Date");
      }

      // Validation for remarks
      var $rpl_remarks = $("#rpl_remarks_" + index);
      var rpl_remarks = $rpl_remarks.val().trim();
      if (rpl_remarks === "") {
        showErrorAndMarkInvalid($rpl_remarks, "Please Enter Remark");
      }

      if (!isValid) {
        renderToast(
          "error",
          "Please check some fields are missing or not proper."
        );
        return false;
      } else {
        var formData = {
          // Construct your data object with field values here
          rpl_commodity: $("#rpl_commodity_" + index).val(),
          rpl_lotno: $("#rpl_lotno_" + index).val(),
          rpl_datesampling: $("#rpl_datesampling_" + index).val(),
          rpl_dateofpacking: $("#rpl_dateofpacking_" + index).val(),
          rpl_grade: $("#rpl_grade_" + index).val(),
          rpl_packet_size: $("#rpl_packet_size_" + index).val(),
          rpl_packet_size_unit: $("#rpl_packet_size_unit_" + index).val(),
          rpl_no_of_packets: $("#rpl_no_of_packets_" + index).val(),
          rpl_qty_quantal: $("#rpl_qty_quantal_" + index).val(),
          rpl_estimatedvalue: $("#rpl_estimatedvalue_" + index).val(),
          rpl_alloted_rep_from: $("#rpl_alloted_rep_from_" + index).val(),
          rpl_alloted_rep_to: $("#rpl_alloted_rep_to_" + index).val(),
          rpl_total_quantity: $("#rpl_total_quantity_" + index).val(),
          rpl_replicacharges: $("#rpl_replicacharges_" + index).val(),
          rpl_grading_lab: $("#rpl_grading_lab_" + index).val(),
          rpl_reportno: $("#rpl_reportno_" + index).val(),
          rpl_reportdate: $("#rpl_reportdate_" + index).val(),
          rpl_remarks: $("#rpl_remarks_" + index).val(),

          // Add more fields as needed
        };

        $.ajax({
          url: "../AjaxFunctions/add_replica_allotment_data",
          type: "POST",
          data: formData,
          success: function (response) {
            if (response == "added")
              // Handle success response here
              renderToast("success", "Data inserted successfully!");
            location.reload(); // Reload the page
            // Optionally, you might want to reset form fields here
          },
          error: function (error) {
            // Handle error response here
            renderToast("error", "Error inserting data.");
          },
        });
      }
    });
  });

  // Function to display toast messages
  function renderToast(theme, msgTxt) {
    $("#toast-msg-" + theme).html(msgTxt);
    $("#toast-msg-box-" + theme).fadeIn("slow");
    $("#toast-msg-box-" + theme)
      .delay(3000)
      .fadeOut("slow");
  }
});
