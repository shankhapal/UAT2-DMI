$(document).ready(function () {
  function fetch_data() {
    $.ajax({
      url: "../AjaxFunctions/added_bgr_details",
      method: "POST",
      dataType: "json",
      success: function (data) {
        const tableBody = document.querySelector("#dataTable tbody");

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

        function handleEditClick(id) {
          $.ajax({
            url: "../AjaxFunctions/edit_bgr_details",
            method: "POST",
            dataType: "json",
            data: { id: id }, // send ID in the request data
            success: function (response) {
              console.log(response);

              // Define an array of input field details
              const inputFields = [
                {
                  label: "Commodity",
                  id: "editCommodityInput",
                  value: response.commodity,
                },
                {
                  label: "Lot Number",
                  id: "editLotnoInput",
                  value: response.lotno,
                },
                // Add other input fields for other properties as needed
              ];

              // Generate the modal body content dynamically
              let modalBodyContent = "";
              inputFields.forEach((field) => {
                modalBodyContent += `
                    <div class="form-row">
                      <div class="form-group ml-4">
                        <label for="${field.id}">${field.label}:</label>
                        <input type="text" id="${field.id}" class="form-control ml-2" value="${field.value}">
                      </div>
                    </div>
                  `;
              });

              // Get the modal body element and set the content
              const modalBody = $("#editModal").find(".modal-body");
              modalBody.html(modalBodyContent);

              // Add other input fields for other properties as needed

              // Show the modal
              $("#editModal").modal("show");
            },
            error: function (error) {
              // Handle any errors that occur during the AJAX request
              console.error("Error:", error);
            },
          });
        }

        function handleDeleteClick(id) {
          // Handle the delete action for the row with the given ID
          console.log(`Delete button clicked for ID: ${id}`);
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
            "packetsizeunit",
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
