$(document).ready(function() {
    $('#customer_id').change(function() {
        var selectedValue = $(this).val();
        var sampleCode = customerList[selectedValue]['sample_code'];
        $('#sample_code').val(sampleCode);
    });
});
