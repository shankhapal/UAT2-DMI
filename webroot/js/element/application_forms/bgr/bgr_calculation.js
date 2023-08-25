$(document).ready(function () {
  var totalQty; // Declare totalQty in the outer scope

  $("#ta-no_of_packets-").on("keyup", function () {
    calculateQty();
  });

  function calculateQty() {
    var packSize = parseFloat($("#ta-packet_size-").val());
    var unit = $("#ta-packet_size_unit-").val();

    var totalPackages = parseFloat($("#ta-no_of_packets-").val());

    if (isNaN(packSize) || isNaN(totalPackages)) {
      $("#total_qty_graded_quintal").text("Invalid input");
      return;
    }

    var unitConversions = {
      quintal: 1,
      kg: 0.01,
      gm: 0.00001,
      ml: 0.000001,
      ltr: 0.1,
      Nos: 0.01,
      // Add more units and their conversion factors if needed
    };

    if (unitConversions[unit] === undefined) {
      $("#total_qty_graded_quintal").text("Invalid unit");
      return;
    }

    var conversionFactor = unitConversions[unit];
    totalQty = packSize * totalPackages * conversionFactor; // Assign to the outer totalQty

    $("#total_qty_graded_quintal").text(totalQty + " quintal");
  }
});
