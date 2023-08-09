$(document).ready(function () {
  function fetch_data() {
    $.ajax({
      url: "../AjaxFunctions/added_bgr_details",
      method: "POST",
      dataType: "json",
      success: function (data) {
        console.log(data);
        const tableBody = document.querySelector("#dataTable tbody");

        // // Clear existing rows within the tbody element
        // while (tableBody.firstChild) {
        //   tableBody.removeChild(tableBody.firstChild);
        // }

        function createCell(content) {
          const cell = document.createElement("td");
          cell.textContent = content;
          return cell;
        }

        function createButtonCell(text, onClick, classes) {
          const button = document.createElement("button");
          button.textContent = text;

          // Add Bootstrap classes to the button
          if (classes && classes.length > 0) {
            button.classList.add(...classes.split(" "));
          }

          button.addEventListener("click", function (event) {
            event.preventDefault(); // Stop the default button behavior
            onClick();
          });
          return button;
        }

        data.forEach((datas, counter) => {
          const row = document.createElement("tr");

          const properties = [
            "commodity",
            "lotno",
            "datesampling",
            "dateofpacking",
            "gradeasign",
            "packetsize",
            "totalnoofpackets",
            "totalqtyquintal",
            "estimatedvalue",
            "agmarkreplicafrom",
            "agmarkreplicato",
            "agmarkreplicatotal",
            "replicacharges",
            "laboratoryname",
            "reportno",
            "reportdate",
            "remarks",
          ];
          row.appendChild(createCell(counter + 1)); // Add counter value
          properties.forEach((property) => {
            row.appendChild(createCell(datas[property]));
          });

          // Create a single cell to contain both the edit and delete buttons
          const actionsCell = document.createElement("td");

          actionsCell.appendChild(
            createButtonCell(
              "Edit",
              function () {
                handleEditClick(datas.id);
              },
              "btn btn-primary"
            )
          );
          actionsCell.appendChild(
            createButtonCell(
              "Delete",
              function () {
                handleDeleteClick(datas.id);
              },
              "btn btn-danger"
            )
          );

          row.appendChild(actionsCell);

          tableBody.appendChild(row);
        });
      },
    });
  }

  function handleEditClick(id) {
    $("#update_bgr_details").show(); // Show Edit button
    $("#add_bgr_details").hide();
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

        // $("#dataTable").html(response);
        // Set the values of the input elements using jQuery
        $("#record_id").val(id);
        $("#update_bgr_details").val(id);
        $("#ta-commodity-").val(commodity);
        $("#lot_no_tf_no_m_no").val(lotno);
        $("#date_of_sampling").val(datesampling);
        $("#date_of_packing").val(dateofpacking);
        $("#grade").val(gradeasign);
        $("#ta-packet_size-").val(packetsize);
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
  }
  function handleDeleteClick(id) {
    if (confirm("Are you sure you want to delete this record?")) {
      $.ajax({
        url: "../AjaxFunctions/delete_bgr_details",
        method: "POST",
        data: { id: id },
        success: function (data) {
          alert("Data Deleted");
          // fetch_data();
          location.reload();
        },
      });
    } else {
      return false;
    }
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
    const form_data = $("#" + form_section_id).serializeArray();
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
    // console.log("abc" + form_data);
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
          // location.reload(); // Refresh the entire page
          fetch_data();
          $(
            "#record_id, #ta-commodity-, #lot_no_tf_no_m_no, #date_of_sampling, #date_of_packing, #grade, #ta-packet_size-, #ta-packet_size_unit-, #ta-no_of_packets-, #total_qty_graded_quintal, #estimated_value, #agmark_replica_from, #agmark_replica_to, #agmark_replica_total, #replica_charges, #report_no, #report_date, #remarks"
          ).val("");
          location.reload();
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
      console.log(formField);
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
