$(function () {
  $("#ca_pdf_table").hide();
  $("#pp_pdf_table").hide();
  $("#lab_pdf_table").hide();
  $("input:radio[name=pdf]").change(function () {
    if ($(this).attr("value") == "ca") {
      $("#ca_pdf_table").show();
      $("#pp_pdf_table").hide();
      $("#lab_pdf_table").hide();
    }
    if ($(this).attr("value") == "pp") {
      $("#pp_pdf_table").show();
      $("#ca_pdf_table").hide();
      $("#lab_pdf_table").hide();
    }
    if ($(this).attr("value") == "lab") {
      $("#lab_pdf_table").show();
      $("#pp_pdf_table").hide();
      $("#ca_pdf_table").hide();
    }
  });
});
