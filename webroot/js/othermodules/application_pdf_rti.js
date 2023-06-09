// added data table on 09/06/2023 by shankhpal shende
$(document).ready(function () {
  $(function () {
    $("#ca_pdf_table").hide();
    $("#pp_pdf_table").hide();
    $("#lab_pdf_table").hide();
    $("input:radio[name=pdf]").change(function () {
      if ($(this).attr("value") == "ca") {
        var dataTablepp = $("#pp_pdf_table").DataTable();
        var dataTablelab = $("#lab_pdf_table").DataTable();
        dataTablepp.destroy();
        dataTablelab.destroy();

        $("#ca_pdf_table").DataTable();
        $("#ca_pdf_table").show();
        $("#pp_pdf_table").hide();
        $("#lab_pdf_table").hide();
      }
      if ($(this).attr("value") == "pp") {
        var dataTableca = $("#ca_pdf_table").DataTable();
        var dataTablelab = $("#lab_pdf_table").DataTable();
        dataTableca.destroy();
        dataTablelab.destroy();
        $("#pp_pdf_table").DataTable();
        $("#pp_pdf_table").show();
        $("#ca_pdf_table").hide();
        $("#lab_pdf_table").hide();
      }
      if ($(this).attr("value") == "lab") {
        var dataTableca = $("#ca_pdf_table").DataTable();
        var dataTablepp = $("#pp_pdf_table").DataTable();
        dataTableca.destroy();
        dataTablepp.destroy();
        $("#lab_pdf_table").DataTable();
        $("#lab_pdf_table").show();
        $("#pp_pdf_table").hide();
        $("#ca_pdf_table").hide();
      }
    });
  });
});
