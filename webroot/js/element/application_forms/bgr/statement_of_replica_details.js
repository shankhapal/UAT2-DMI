function biannually_grading_report() {
  var value_return = "true";

  if ($("#replica_table tr td:first").text() == "") {
    $("#error_replica")
      .show()
      .text("Sorry. There should be minimum 1 TBL details added.");
    $("#error_tbls").css({
      color: "red",
      "font-size": "14px",
      "font-weight": "500",
      "text-align": "right",
    });
    setTimeout(function () {
      $("#error_tbls").fadeOut();
    }, 8000);
    value_return = "false";
  }

  if (value_return == "false") {
    var msg = "Please check some fields are missing or not proper.";
    renderToast("error", msg);
    return false;
  } else {
    exit();
  }
}

$(document).ready(function () {
  var form_section_id = $("#form_section_id").val();
  var replica_table = $("#replica_table").val();
  // addition of two numbers
  $(function () {
    $("#total_a, #total_b").keyup(function () {
      var total_a = parseFloat($("#total_a").val()) || 0;
      var total_b = parseFloat($("#total_b").val()) || 0;
      $("#total_c").val(total_a + total_b);
    });
  });

  $("#replica_table").on("input", "#total_d", function () {
    var total_c = parseFloat($("#total_c").val()) || 0;
    var total_d = parseFloat($("#total_d").val()) || 0;
    $("#total_e").val(total_c - total_d);
  });

  $("#date").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $("#from_a").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $("#to_a").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $("#from_b").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $("#to_b").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $("#from_c").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $("#to_c").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $("#from_d").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $("#to_d").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $("#from_e").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });
  $("#to_e").datepicker({
    format: "dd/mm/yyyy",
    autoclose: true,
  });

  add_function();
  edit_function();
  delete_function();
  save_function();

  // ADD FUNCTION
  // Description : this is used to on the click of add button
  // @AUTHOR : SHANKHPAL SHENDE
  // DATE : 16-01-2023
  function add_function() {
    $("#add_replica_details").click(function (e) {
      e.preventDefault();

      var date = $("#date").val();
      var commodity = $("#commodity").val();
      var approved_tbl_brand = $("#approved_tbl_brand").val();
      var agmark_grade = $("#agmark_grade").val();
      var pack_size = $("#pack_size").val();
      var from_a = $("#from_a").val();
      var from_b = $("#from_b").val();
      var from_c = $("#from_c").val();
      var from_d = $("#from_d").val();
      var from_e = $("#from_e").val();
      var to_a = $("#to_a").val();
      var to_b = $("#to_b").val();
      var to_c = $("#to_c").val();
      var to_d = $("#to_d").val();
      var to_e = $("#to_e").val();
      var total_a = $("#total_a").val();
      var total_b = $("#total_b").val();
      var total_c = $("#total_c").val();
      var total_d = $("#total_d").val();
      var total_e = $("#total_e").val();
      var total_q = $("#total_q").val();
      var remark = $("#remark").val();

      var form_data = $("#" + form_section_id).serializeArray();

      form_data.push(
        { name: "date", value: date },
        { name: "commodity", value: commodity },
        { name: "approved_tbl_brand", value: approved_tbl_brand },
        { name: "agmark_grade", value: agmark_grade },
        { name: "pack_size", value: pack_size },
        { name: "from_a", value: from_a },
        { name: "from_b", value: from_b },
        { name: "from_c", value: from_c },
        { name: "from_d", value: from_d },
        { name: "from_e", value: from_e },
        { name: "to_a", value: to_a },
        { name: "to_b", value: to_b },
        { name: "to_c", value: to_c },
        { name: "to_d", value: to_d },
        { name: "to_e", value: to_e },
        { name: "total_a", value: total_a },
        { name: "total_b", value: total_b },
        { name: "total_c", value: total_c },
        { name: "total_d", value: total_d },
        { name: "total_e", value: total_e },
        { name: "total_q", value: total_q },
        { name: "remark", value: remark }
      );

      if (validate_replica_details_section() == true) {
        $.ajax({
          type: "POST",
          url: "../AjaxFunctions/add_statement_details",
          data: form_data,
          beforeSend: function (xhr) {
            // Add this line
            xhr.setRequestHeader(
              "X-CSRF-Token",
              $('[name="_csrfToken"]').val()
            );
          },
          success: function (response) {
            $("#replica_table").html(response);
            $("#replica_table :input[type='text']").val("");

            add_function();
            edit_function();
            delete_function();
            save_function();
            $("#date").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#from_a").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#to_a").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#from_b").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#to_b").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#from_c").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#to_c").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#from_d").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#to_d").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#from_e").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#to_e").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
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
        url: "../AjaxFunctions/edit_statement_id",
        data: form_data,
        beforeSend: function (xhr) {
          // Add this line
          xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());
        },
        success: function (response) {
          $("#replica_table").html(response);

          add_function();
          edit_function();
          delete_function();
          save_function();
          $("#date").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#from_a").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#to_a").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#from_b").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#to_b").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#from_c").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#to_c").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#from_d").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#to_d").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#from_e").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#to_e").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
        },
      });
    });
  }

  // SAVE FUNCTION
  // Description : this is used to on the click of SAVE button
  // @AUTHOR : AKASH THAKRE
  // DATE : 24-03-2022 (M)

  function save_function() {
    $("#save_statement_details").click(function (e) {
      e.preventDefault();

      var edit_statement_id = "";
      var save_statement_id = $(this).attr("id");
      var date = $("#date").val();
      var commodity = $("#commodity").val();
      var approved_tbl_brand = $("#approved_tbl_brand").val();
      var agmark_grade = $("#agmark_grade").val();
      var pack_size = $("#pack_size").val();
      var from_a = $("#from_a").val();
      var from_b = $("#from_b").val();
      var from_c = $("#from_c").val();
      var from_d = $("#from_d").val();
      var from_e = $("#from_e").val();
      var to_a = $("#to_a").val();
      var to_b = $("#to_b").val();
      var to_c = $("#to_c").val();
      var to_d = $("#to_d").val();
      var to_e = $("#to_e").val();
      var total_a = $("#total_a").val();
      var total_b = $("#total_b").val();
      var total_c = $("#total_c").val();
      var total_d = $("#total_d").val();
      var total_e = $("#total_e").val();
      var total_q = $("#total_q").val();
      var remark = $("#remark").val();
      var form_data = $("#" + form_section_id).serializeArray();

      form_data.push(
        { name: "save_statement_id", value: save_statement_id },
        { name: "date", value: date },
        { name: "commodity", value: commodity },
        { name: "approved_tbl_brand", value: approved_tbl_brand },
        { name: "agmark_grade", value: agmark_grade },
        { name: "pack_size", value: pack_size },
        { name: "from_a", value: from_a },
        { name: "from_b", value: from_b },
        { name: "from_c", value: from_c },
        { name: "from_d", value: from_d },
        { name: "from_e", value: from_e },
        { name: "to_a", value: to_a },
        { name: "to_b", value: to_b },
        { name: "to_c", value: to_c },
        { name: "to_d", value: to_d },
        { name: "to_e", value: to_e },
        { name: "total_a", value: total_a },
        { name: "total_b", value: total_b },
        { name: "total_c", value: total_c },
        { name: "total_d", value: total_d },
        { name: "total_e", value: total_e },
        { name: "total_q", value: total_q },
        { name: "remark", value: remark },
        { name: "edit_statement_id", value: edit_statement_id }
      );

      if (validate_replica_details_section() == true) {
        $.ajax({
          type: "POST",
          url: "../AjaxFunctions/edit_statement_id",
          data: form_data,
          beforeSend: function (xhr) {
            // Add this line
            xhr.setRequestHeader(
              "X-CSRF-Token",
              $('[name="_csrfToken"]').val()
            );
          },
          success: function (response) {
            $("#replica_table").html(response);
            $("#replica_table :input[type='text']").val("");

            add_function();
            edit_function();
            delete_function();
            save_function();
            $("#date").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#from_a").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#to_a").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#from_b").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#to_b").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#from_c").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#to_c").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#from_d").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#to_d").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#from_e").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
            $("#to_e").datepicker({
              format: "dd/mm/yyyy",
              autoclose: true,
            });
          },
        });
      }
    });
  }

  // DELETE FUNCTION
  // Description : this is used to on the click of DELETE button
  // @AUTHOR : SHANKHPAL SHENDE
  // DATE : 17/01/2023

  function delete_function() {
    $(".delete_statement_id").click(function (e) {
      e.preventDefault();

      var statement_id = $(this).attr("id");
      var form_data = $("#" + form_section_id).serializeArray();

      form_data.push({ name: "delete_statement_id", value: statement_id });

      $.ajax({
        type: "POST",
        url: "../AjaxFunctions/delete_statement_id",
        data: form_data,
        beforeSend: function (xhr) {
          // Add this line
          xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());
        },
        success: function (response) {
          $("#replica_table").html(response);

          add_function();
          edit_function();
          delete_function();
          save_function();
          $("#date").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#from_a").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#to_a").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#from_b").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#to_b").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#from_c").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#to_c").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#from_d").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#to_d").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#from_e").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
          $("#to_e").datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
          });
        },
      });
    });
  }
});

function validate_replica_details_section() {
  var date = $("#date").val();
  var commodity = $("#commodity").val();
  var approved_tbl_brand = $("#approved_tbl_brand").val();
  var agmark_grade = $("#agmark_grade").val();
  var pack_size = $("#pack_size").val();
  var from_a = $("#from_a").val();
  var to_a = $("#to_a").val();
  var total_a = $("#total_a").val();
  var from_b = $("#from_b").val();
  var to_b = $("#to_b").val();
  var total_b = $("#total_b").val();
  var from_c = $("#from_c").val();
  var to_c = $("#to_c").val();
  var total_c = $("#total_c").val();
  var from_d = $("#from_d").val();
  var to_d = $("#to_d").val();
  var total_d = $("#total_d").val();
  var from_e = $("#from_e").val();
  var to_e = $("#to_e").val();
  var total_e = $("#total_e").val();
  var total_q = $("#total_q").val();
  var remark = $("#remark").val();

  var value_return = "true";

  if (date == "") {
    $("#error_date").show().text("Please Select date");
    setTimeout(function () {
      $("#error_date").fadeOut();
    }, 5000);
    $("#date").addClass("is-invalid");
    $("#date").click(function () {
      $("#error_date").hide().text;
      $("#date").removeClass("is-invalid");
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

  if (agmark_grade == "") {
    $("#error_agmark_grade").show().text("Please enter agmark grade");
    setTimeout(function () {
      $("#error_agmark_grade").fadeOut();
    }, 5000);
    $("#agmark_grade").addClass("is-invalid");
    $("#agmark_grade").click(function () {
      $("#error_agmark_grade").hide().text;
      $("#agmark_grade").removeClass("is-invalid");
    });

    value_return = "false";
  }

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
  if (from_a == "") {
    $("#error_from_a").show().text("Please select from date");
    setTimeout(function () {
      $("#error_from_a").fadeOut();
    }, 5000);
    $("#from_a").addClass("is-invalid");
    $("#from_a").click(function () {
      $("#error_from_a").hide().text;
      $("#from_a").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (from_b == "") {
    $("#error_from_b").show().text("Please select from date");
    setTimeout(function () {
      $("#error_from_b").fadeOut();
    }, 5000);
    $("#from_b").addClass("is-invalid");
    $("#from_b").click(function () {
      $("#error_from_b").hide().text;
      $("#from_b").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (from_c == "") {
    $("#error_from_c").show().text("Please select from date");
    setTimeout(function () {
      $("#error_from_c").fadeOut();
    }, 5000);
    $("#from_c").addClass("is-invalid");
    $("#from_c").click(function () {
      $("#error_from_c").hide().text;
      $("#from_c").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (from_d == "") {
    $("#error_from_d").show().text("Please select from date");
    setTimeout(function () {
      $("#error_from_d").fadeOut();
    }, 5000);
    $("#from_d").addClass("is-invalid");
    $("#from_d").click(function () {
      $("#error_from_d").hide().text;
      $("#from_d").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (from_e == "") {
    $("#error_from_e").show().text("Please select from date");
    setTimeout(function () {
      $("#error_from_e").fadeOut();
    }, 5000);
    $("#from_e").addClass("is-invalid");
    $("#from_e").click(function () {
      $("#error_from_e").hide().text;
      $("#from_e").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (to_a == "") {
    $("#error_to_a").show().text("Please select to date");
    setTimeout(function () {
      $("#error_to_a").fadeOut();
    }, 5000);
    $("#to_a").addClass("is-invalid");
    $("#to_a").click(function () {
      $("#error_to_a").hide().text;
      $("#to_a").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (to_b == "") {
    $("#error_to_b").show().text("Please select to date");
    setTimeout(function () {
      $("#error_to_b").fadeOut();
    }, 5000);
    $("#to_b").addClass("is-invalid");
    $("#to_b").click(function () {
      $("#error_to_b").hide().text;
      $("#to_b").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (to_c == "") {
    $("#error_to_c").show().text("Please select to date");
    setTimeout(function () {
      $("#error_to_c").fadeOut();
    }, 5000);
    $("#to_c").addClass("is-invalid");
    $("#to_c").click(function () {
      $("#error_to_c").hide().text;
      $("#to_c").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (to_d == "") {
    $("#error_to_d").show().text("Please select to date");
    setTimeout(function () {
      $("#error_to_d").fadeOut();
    }, 5000);
    $("#to_d").addClass("is-invalid");
    $("#to_d").click(function () {
      $("#error_to_d").hide().text;
      $("#to_d").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (to_e == "") {
    $("#error_to_e").show().text("Please select to date");
    setTimeout(function () {
      $("#error_to_e").fadeOut();
    }, 5000);
    $("#to_e").addClass("is-invalid");
    $("#to_e").click(function () {
      $("#error_to_e").hide().text;
      $("#to_e").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (total_a == "") {
    $("#error_total_a").show().text("Please Enter Total");
    setTimeout(function () {
      $("#error_total_a").fadeOut();
    }, 5000);
    $("#total_a").addClass("is-invalid");
    $("#total_a").click(function () {
      $("#error_total_a").hide().text;
      $("#total_a").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (total_b == "") {
    $("#error_total_b").show().text("Please Enter Total");
    setTimeout(function () {
      $("#error_total_b").fadeOut();
    }, 5000);
    $("#total_b").addClass("is-invalid");
    $("#total_b").click(function () {
      $("#error_total_b").hide().text;
      $("#total_b").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (total_c == "") {
    $("#error_total_c").show().text("Please Enter Total");
    setTimeout(function () {
      $("#error_total_c").fadeOut();
    }, 5000);
    $("#total_c").addClass("is-invalid");
    $("#total_c").click(function () {
      $("#error_total_c").hide().text;
      $("#total_c").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (total_d == "") {
    $("#error_total_d").show().text("Please Enter Total");
    setTimeout(function () {
      $("#error_total_d").fadeOut();
    }, 5000);
    $("#total_d").addClass("is-invalid");
    $("#total_d").click(function () {
      $("#error_total_d").hide().text;
      $("#total_d").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (total_e == "") {
    $("#error_total_e").show().text("Please Enter Total");
    setTimeout(function () {
      $("#error_total_e").fadeOut();
    }, 5000);
    $("#total_e").addClass("is-invalid");
    $("#total_e").click(function () {
      $("#error_total_e").hide().text;
      $("#total_e").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (total_q == "") {
    $("#error_total_q")
      .show()
      .text("Please Enter Total Qqantity Graded in Kg/Ltr/Qntl.");
    setTimeout(function () {
      $("#error_total_q").fadeOut();
    }, 5000);
    $("#total_q").addClass("is-invalid");
    $("#total_q").click(function () {
      $("#error_total_q").hide().text;
      $("#total_q").removeClass("is-invalid");
    });

    value_return = "false";
  }
  if (remark == "") {
    $("#error_remark").show().text("Please Enter Remark");
    setTimeout(function () {
      $("#error_remark").fadeOut();
    }, 5000);
    $("#remark").addClass("is-invalid");
    $("#remark").click(function () {
      $("#error_remark").hide().text;
      $("#remark").removeClass("is-invalid");
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
