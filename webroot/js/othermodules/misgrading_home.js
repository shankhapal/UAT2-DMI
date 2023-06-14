$('#loat').DataTable();
$('#los').DataTable();
$('#lof').DataTable();

 $(document).ready(function() {
    $(".btn").click(function() {
        var val = parseInt($('#group').find('.badge').text());
        // Check for the button clicked
        if ($(this).hasClass('btn-danger')) {
            $('#group').find('.badge').text(val - 1);
        } else if ($(this).hasClass('btn-success')) {
            $('#group').find('.badge').text(val + 1);
        }
    });
});