$(document).ready(function() {
	$('.table').DataTable(); // For DataTable initialization
	
	// Hide scrutinized_report_table on page load
	$('#scrutinized_report_table').hide();
	
	// Show pending_report_table by default
	$('#pending_report_table').show();

	// Hide allocated_report_table on page load
	$('#allocated_report_table').hide();
	
		// Handle change event for radio buttons
		$('input[name="report_type"]').change(function() {
			var selectedValue = $(this).attr('id');

			if (selectedValue === 'pending_report') {

				$('#pending_report_table').show();
				$('#scrutinized_report_table').hide();
				$('#allocated_report_table').hide();

			} else if (selectedValue === 'scrutinized_report') {

				$('#pending_report_table').hide();
				$('#scrutinized_report_table').show();
				$('#allocated_report_table').hide();

			} else if (selectedValue === 'allocate_report') {

				$('#pending_report_table').hide();
				$('#scrutinized_report_table').hide();
				$('#allocated_report_table').show();

			}
		});
});
