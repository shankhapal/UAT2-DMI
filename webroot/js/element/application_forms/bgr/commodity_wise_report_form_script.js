$(document).ready(function () {
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
          alert(response);
          $("#replica_charges" + id_No).val(response["charge"]);
          $("#total_qty_graded_quintal" + id_No).val(response["min_qty"]);
        }
      },
    });
  });
});
