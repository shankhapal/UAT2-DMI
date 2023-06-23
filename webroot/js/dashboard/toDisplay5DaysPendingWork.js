$(document).ready(function () {
  $.ajax({
    type: "POST",
    async: true,
    url: "../AjaxFunctions/toDisplay5DaysPendingWork",
    beforeSend: function (xhr) {
      xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());
    },
    success: function (response) {
      var tableRows = "";

      // Parse the JSON response
      var data = JSON.parse(response);

      // Iterate through each row and create table rows
      for (var i = 0; i < data.length; i++) {
        var row = data[i];
        tableRows +=
          "<tr>" +
          "<td>" +
          row[0] +
          "</td>" +
          "<td>" +
          row[1] +
          "</td>" +
          "<td>" +
          row[2] +
          "</td>" +
          "<td>" +
          row[3] +
          "</td>" +
          "<td>" +
          row[4] +
          "</td>" +
          "</tr>";
      }

      // Insert the table rows into the table body
      $("#myPendingWorkModel tbody").html(tableRows);

      // Display the modal
      $("#myPendingWorkModel").modal("show");
    },
    error: function (xhr, textStatus, errorThrown) {
      console.log("Error: " + errorThrown);
      // Handle any errors that occur during the Ajax request
    },
  });
});
