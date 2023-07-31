$(document).ready(function () {
  $("#date_of_sampling").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $("#date_of_packing").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });

  $("#report_date").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });

  $("#table_1").on("change", ".commodity", function () {
    let id_No = this.id.split("-"); // Corrected method name from splite() to split()
    id_No = id_No[2];

    let commodity_id = $("#ta-commodity-" + id_No).val();

    $.ajax({
      type: "POST",
      url: "../AjaxFunctions/get_commodity_wise_charge",
      data: { commodity_id: commodity_id },
      beforeSend: function (xhr) {
        xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());
      },
      success: function (response) {
        var response = response.match(/~([^']+)~/)[1]; //getting data bitween ~..~ from response

        if (response == "No Charge") {
          $("#replica_charges" + id_No).val("");
          $("#total_qty_graded_quintal" + id_No).val();
        } else {
          response = JSON.parse(response); //response is JSOn encoded to parse JSON
          // Assuming response is a valid JSON object containing the "unit" property
          //$("#ta-label_charge-" + id_No).val(response["charge"]);

          let unit_list = response["unit_list"];
          let unit_option = "<option value=''>--Select--</option>";
          $.each(unit_list, function (index, value) {
            unit_option +=
              "<option value='" + index + "'>" + value + "</option>";
          });

          // Assuming id_No is set correctly and refers to the correct element ID
          $("#ta-packet_size_unit-" + id_No).html(unit_option);
          $("#replica_charges" + id_No).val(response["charge"]);
          $("#total_qty_graded_quintal" + id_No).val(response["min_qty"]);
        }
      },
    });
  });

  //to get gross quantity and total charges
  $("#table_1").on("focusout", ".total_no_packages", function () {
    var id_No = this.id.split("-"); //to get dynamic id of element for each row, and split to get no.
    id_No = id_No[2];

    var packet_size = $("#ta-packet_size-" + id_No).val();
    var sub_unit_id = $("#ta-packet_size_unit-" + id_No).val();
    var no_of_packets = $("#ta-no_of_packets-" + id_No).val();

    var commodity_id = $("#ta-commodity-" + id_No).val();

    $.ajax({
      type: "POST",
      url: "../AjaxFunctions/get_gross_quantity_and_total_charge",
      data: {
        packet_size: packet_size,
        sub_unit_id: sub_unit_id,
        no_of_packets: no_of_packets,
        commodity_id: commodity_id,
      },
      beforeSend: function (xhr) {
        // Add this line
        xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());
      },
      success: function (response) {
        var response = response.match(/~([^']+)~/)[1]; //getting data bitween ~..~ from response
        response = JSON.parse(response); //response is JSOn encoded to parse JSON

        $("#ta-total_quantity-" + id_No).val(response["gross_quantity"]);
        $("#ta-total_label_charges-" + id_No).val(response["total_charges"]);
      },
    });
  });

  // $("#from_input, #to_input").on("change", function () {
  //   let from_input = $("#from_input").val();
  //   let to_input = $("#to_input").val();

  //   if (from_input != "" && to_input != "") {
  //     let custemer_id = $("#custemer_id").val();

  //     $.ajax({
  //       type: "POST",
  //       url: "../AjaxFunctions/get_replica_allotment_details",
  //       data: {
  //         from_input: from_input,
  //         to_input: to_input,
  //         custemer_id: custemer_id,
  //       },
  //       beforeSend: function (xhr) {
  //         xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());
  //       },
  //       success: function (response) {},
  //     });
  //   }
  // });
});
