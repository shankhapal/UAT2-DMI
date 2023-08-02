$(document).ready(function () {
  function fetch_data() {
    $.ajax({
      url: "../AjaxFunctions/added_bgr_details",
      method: "POST",
      dataType: "json",
      success: function (data) {
        var tableBody = $("#data_row");
        tableBody.empty(); // Clear the existing table rows

        var rowHtml = ""; // Initialize an empty string to hold the HTML for all rows

        data.map((rowData) => {
          rowHtml = `
       
            <td>${rowData.id}</td>
            <td>${rowData.customer_id}</td>
            <td>${rowData.commodity}</td>
            <td>${rowData.totalrevenue}</td>
            <td>${rowData.progressiverevenue}</td>
            <!-- Add more table cells for other columns in your data -->
            <td>
              <a href="#" class="edit_bgr_id glyphicon glyphicon-edit machine_edit" id="${rowData.id}"></a> |
              <a href="#" class="delete_bgr_id glyphicon glyphicon-remove-sign machine_delete" id="${rowData.id}"></a>
            </td>
      
        `;
        });

        tableBody.html(rowHtml); // Append all rows to the table body
      },
    });
  }

  fetch_data();

  const form_section_id = $("#form_section_id").val();
  const requiredFields = {
    "ta-commodity-": "Commodity",
    lot_no_tf_no_m_no: "Lot No/TF No/M No",
    date_of_sampling: "Date of Sampling",
    date_of_packing: "Date of Packing",
    grade: "Grade",
    "ta-packet_size-": "Pack Size",
    replica_charges: "Replica Charges",
    "ta-packet_size_unit-": "Packet Size Unit",
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

  // You can similarly add event handlers for other actions (edit, delete, save) if needed.

  async function handleFormAction(action) {
    const form_data = $("#" + form_section_id).serializeArray();
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
    return new Promise((resolve, reject) => {
      $.ajax({
        type: "POST",
        url: "../AjaxFunctions/add_bgr_details",
        data: form_data,
        beforeSend: function (xhr) {
          xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());
        },
        success: function (response) {
          resolve(response);
          fetch_data();
        },
        error: function (error) {
          reject(error);
        },
      });
    });
  }

  async function bgr_report_validation(form_data) {
    let emptyFields = [];

    for (const field of Object.keys(requiredFields)) {
      const formField = form_data.find((item) => item.name === field);

      if (!formField || formField.value.trim() === "") {
        emptyFields.push(field);
      }
    }
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
      console.log(field);
      $(`#${field}`).addClass("highlight-empty");
      const errorMessage = `<span class="error">${fieldName} is required.</span>`;
      $(`#error-${field}`).html(errorMessage);

      setTimeout(() => {
        $(`#error-${field}`).empty();
      }, 5000);
    }
  }
});
