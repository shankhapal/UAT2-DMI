$(document).ready(function () {
  function updateOverallTotalCharges() {
    $.ajax({
      type: "GET",
      url: "../AjaxFunctions/get_total_replica_charge",
      success: function (response) {
        // Update the overall_total_chrg element with the response value
        $("#overall_total_chrg").val(response);
        $("#totalRevenueHeader").html(response);
        var totalRevenueValue = response;
        $("#totalRevenueHidden").val(totalRevenueValue);
      },
    });
    $.ajax({
      type: "GET",
      url: "../AjaxFunctions/get_total_progressive_revenue",
      success: function (response) {
        // Update the overall_total_chrg element with the response value
        $("#progresiveRevenue").html(response);

        var progresiveRevenue = response;
        $("#progresiveRevenueHidden").val(progresiveRevenue);
      },
    });
  }
  updateOverallTotalCharges();
  $(".delete_bgr_id").click(function (e) {
    e.preventDefault();
    var id = $(this).attr("id");
    if (confirm("Are you sure you want to delete this record?")) {
      $.ajax({
        url: "../AjaxFunctions/delete_bgr_details",
        method: "POST",
        data: { id: id },
        success: function (response) {
          // alert(response);
          if (response == "success") {
            var custom_row = document.getElementById("custom_row" + id);
            custom_row.parentNode.removeChild(custom_row);
            alert("Record deleted successfully."); // Display the success message
          } else {
            alert("An error occurred while deleting the record."); // Display an error message
          }
        },
      });
      updateOverallTotalCharges();
    }
  });

  $(".edit_bgr_id").click(function (e) {
    $("#update_bgr_details").show(); // Show Edit button
    $("#add_bgr_details").hide();
    e.preventDefault();

    var id = $(this).attr("id");

    $.ajax({
      url: "../AjaxFunctions/edit_bgr_details",
      method: "POST",
      dataType: "json",
      data: { id: id }, // send ID in the request data
      beforeSend: function (xhr) {
        // Add this line
        xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());
      },
      success: function (response) {
        console.log(response);
        const {
          id,
          commodity,
          lotno,
          datesampling,
          dateofpacking,
          gradeasign,
          packetsize,
          packetsizeunit,
          totalnoofpackets,
          totalqtyquintal,
          estimatedvalue,
          agmarkreplicafrom,
          agmarkreplicato,
          agmarkreplicatotal,
          replicacharges,
          laboratoryname,
          reportno,
          reportdate,
          remarks,
        } = response;

        $("#record_id").val(id);
        $("#update_bgr_details").val(id);
        $("#ta-commodity-").val(commodity);
        $("#lot_no_tf_no_m_no").val(lotno);
        $("#date_of_sampling").val(datesampling);
        $("#date_of_packing").val(dateofpacking);
        $("#grade").val(gradeasign);
        $("#ta-packet_size-").val(packetsize);
        $("#ta-packet_size_unit-").val(packetsizeunit);

        $("#ta-no_of_packets-").val(totalnoofpackets);
        $("#total_qty_graded_quintal").val(totalqtyquintal);
        $("#estimated_value").val(estimatedvalue);
        $("#agmark_replica_from").val(agmarkreplicafrom);
        $("#agmark_replica_to").val(agmarkreplicato);
        $("#agmark_replica_total").val(agmarkreplicatotal);
        $("#replica_charges").val(replicacharges);
        $("#laboratory_name").val(laboratoryname);
        $("#report_no").val(reportno);
        $("#report_date").val(reportdate);
        $("#remarks").val(remarks);
      },
      error: function (error) {
        // Handle any errors that occur during the AJAX request
        console.error("Error:", error);
      },
    });
    updateOverallTotalCharges();
  });

  const form_section_id = $("#form_section_id").val();

  const labNablAccreditedInput = document.getElementById(
    "lab_nabl_accredited"
  ).value;

  const requiredFields = {
    "ta-commodity-": "Commodity",
    lot_no_tf_no_m_no: "Lot No/TF No/M No",
    date_of_sampling: "Date of Sampling",
    date_of_packing: "Date of Packing",
    grade: "Grade",
    "ta-packet_size-": "Pack Size",
    replica_charges: "Replica Charges",
    "ta-no_of_packets-": "Total No. of Packages",
    total_qty_graded_quintal: "Total Qty Graded (Quintal)",
    estimated_value: "Estimated Value",
    agmark_replica_from: "Agmark Replica From",
    agmark_replica_to: "Agmark Replica To",
    agmark_replica_total: "Agmark Replica Total",
    laboratory_name: "Laboratory Name",
    report_no: "Report No",
    report_date: "Report Date",
    remarks: "Remarks",
  };

  $("#add_bgr_details").on("click", function (e) {
    e.preventDefault();
    handleFormAction("add");
  });
  $("#update_bgr_details").on("click", function (e) {
    e.preventDefault();
    handleFormAction("update");
  });

  // You can similarly add event handlers for other actions (edit, delete, save) if needed.

  async function handleFormAction(action) {
    const labNablAccreditedInput = document.getElementById(
      "lab_nabl_accredited"
    ).value;
    let form_data = $("#" + form_section_id).serializeArray();
    let itemsToRemove = [
      "report_date",
      "remarks",
      "report_no",
      "progresive_revenue",
      "record_id",
    ];
    form_data = form_data.filter((item) => !itemsToRemove.includes(item.name));
    if (labNablAccreditedInput !== "") {
    }
    console.log(form_data);
    const validationStatus = await bgr_report_validation(form_data);

    if (validationStatus.isValid) {
      // Proceed with further actions if validation is successful
      try {
        const response = await sendFormToServer(form_data);
      } catch (error) {
        console.error("Error while submitting the form:", error);
      }
    } else {
      // Display error messages to the user
      alert("Please fill in all the required fields");
      highlightEmptyFields(validationStatus.emptyFields);
    }
  }

  async function sendFormToServer(form_data) {
    let recordId = null;

    for (const item of form_data) {
      if (item.name === "record_id") {
        recordId = item.value;
        break; // No need to continue searching
      }
    }

    return new Promise((resolve, reject) => {
      $.ajax({
        type: "POST",
        url: "../AjaxFunctions/add_bgr_details",
        data: form_data,
        beforeSend: function (xhr) {
          xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());
        },
        success: function (response) {
          console.log(response);
          if (response === "updated" || response === "added") {
            // Clear input fields
            $(
              "#record_id, #ta-commodity-, #lot_no_tf_no_m_no, #date_of_sampling, #date_of_packing, #grade, #ta-packet_size-, #ta-packet_size_unit-, #ta-no_of_packets-, #total_qty_graded_quintal, #estimated_value, #agmark_replica_from, #agmark_replica_to, #agmark_replica_total, #replica_charges, #report_no, #report_date, #remarks"
            ).val("");

            location.reload(); // Reload the page
            alert(
              "Record " +
                (response === "updated" ? "updated" : "added") +
                " successfully."
            );
          } else {
            alert("An error occurred."); // Display an error message
          }
        },
      });
    });
  }

  async function bgr_report_validation(form_data) {
    let emptyFields = [];

    console.log(form_data);
    for (const field of Object.keys(requiredFields)) {
      const formField = form_data.find((item) => item.name === field);
      // console.log(formField);
      if (formField && formField?.value.trim() === "") {
        emptyFields.push(field);
      }
    }
    debugger;
    return {
      isValid: emptyFields.length === 0,
      emptyFields: emptyFields,
    };
  }

  function highlightEmptyFields(emptyFields) {
    // Remove existing highlights
    $("input")
      .removeClass("highlight-empty")
      .on("focus", function () {
        $(this).removeClass("highlight-empty");
        const fieldId = $(this).attr("id");
        $(`#error-${fieldId}`).empty();
      })
      .on("click", function () {
        $(this).removeClass("highlight-empty");
        const fieldId = $(this).attr("id");
        $(`#error-${fieldId}`).empty();
      });

    // Add highlight class to empty fields
    for (const field of emptyFields) {
      const fieldName = requiredFields[field];
      const labNablAccreditedInput = document.getElementById(
        "lab_nabl_accredited"
      ).value;

      if (
        labNablAccreditedInput === "" &&
        (field === "report_no" ||
          field === "report_date" ||
          field === "remarks")
      ) {
        continue; // Skip validation for specific fields if labNablAccreditedInput is empty
      }

      // Additional check to skip validation for certain field names
      if (
        fieldName === "report_no" ||
        fieldName === "report_date" ||
        fieldName === "remarks"
      ) {
        continue; // Skip validation for these specific field names
      }

      const fieldValue = $(`#${field}`).val().trim();

      if (!fieldValue) {
        $(`#${field}`).addClass("highlight-empty");
        const errorMessage = `<span class="error">${fieldName} is required.</span>`;
        $(`#error-${field}`).html(errorMessage);

        setTimeout(() => {
          $(`#error-${field}`).empty();
        }, 5000);
      }
    }
  }
});
