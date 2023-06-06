$(document).ready(function() {

    //This is for attach the description
    $('#misgrade_category').on('click', 'option', function() {
        var selectedValue = $(this).val();
        var description = "";
    
        if (selectedValue === "1") {
            description = "Misgrade where samples conform to lower grade.";
        } else if (selectedValue === "2") {
            description = "Misgrade where samples do not conform to lower grade.";
        } else if (selectedValue === "3") {
            description = "Misgrading category with intentional adulteration.";
        } else if (selectedValue === "4") {
            description = "Misgrading due to substances injurious to health.";
        }
        
        $('#mis_cat_desc').text("Category - "+ selectedValue + " : " + description);
    });


});
    
    

$(document).ready(function() {
    $('#time_period_div').show(); 
    $('#misgrade_category').on('change', function() {
        updateMisgradeLevels();
    });

    $('#misgrade_level').on('change', function() {
        updateMisgradeActions();
    });

    $('#misgrade_action').on('change', function() {
        updateMisgradePeriod();
    });

    updateMisgradeLevels(); // Call the function initially to set the options based on the default selected category
    updateMisgradeActions(); // Call the function initially to set the options based on the default selected category and level
    updateMisgradePeriod();
});

function updateMisgradeLevels() {

    var selectedCategory = $('#misgrade_category').val();
    var $misgradeLevel = $('#misgrade_level');

    // Clear existing options in misgrade_level dropdown
    $misgradeLevel.empty();

    // Add the empty option as the first option
    $misgradeLevel.append($('<option>', {
        value: '',
        text: '-- Select Misgrading Level --'
    }));

    // Add new options based on the selected category
    if (selectedCategory === '1') {
        // Append options for category 1
        $misgradeLevel.append($('<option>', {
            value: '1',
            text: 'First Misgrading'
        }));
        $misgradeLevel.append($('<option>', {
            value: '2',
            text: 'Second Misgrading'
        }));
        $misgradeLevel.append($('<option>', {
            value: '3',
            text: 'Third Misgrading'
        }));
        $misgradeLevel.append($('<option>', {
            value: '4',
            text: 'Fourth Misgrading'
        }));
        $misgradeLevel.append($('<option>', {
            value: '5',
            text: 'Fifth Misgrading'
        }));
    } else if (selectedCategory === '2') {
        // Append options for category 2
        $misgradeLevel.append($('<option>', {
            value: '1',
            text: 'First Misgrading'
        }));
        $misgradeLevel.append($('<option>', {
            value: '2',
            text: 'Second Misgrading'
        }));
        $misgradeLevel.append($('<option>', {
            value: '3',
            text: 'Third Misgrading'
        }));
        $misgradeLevel.append($('<option>', {
            value: '4',
            text: 'Fourth Misgrading'
        }));
    } else if (selectedCategory === '3') {
        // Append options for category 3
        $misgradeLevel.append($('<option>', {
            value: '1',
            text: 'First Misgrading'
        }));
        $misgradeLevel.append($('<option>', {
            value: '2',
            text: 'Second Misgrading'
        }));
    } else if (selectedCategory === '4') {
        // Append options for category 4
        $misgradeLevel.append($('<option>', {
            value: '1',
            text: 'First Misgrading'
        }));
        $misgradeLevel.append($('<option>', {
            value: '2',
            text: 'Second Misgrading'
        }));
    }
   
    updateMisgradeActions();
}



function updateMisgradeActions() {
    
    var selectedCategory = $('#misgrade_category').val();
    var selectedLevel = $('#misgrade_level').val();
    var selectedAction = $('#misgrade_action').val();
    var $misgradeAction = $('#misgrade_action');
   
    // Clear existing options in third dropdown
    $misgradeAction.empty();
    
     // Add the empty option as the first option
     $misgradeAction.append($('<option>', {
        value: '',
        text: '-- Select Misgrading Action --'
    }));


    // This is for the Category I Level 1-5
    if (selectedCategory === '1' && selectedLevel === '1') {

        $misgradeAction.append($('<option>', {
            value: '1',
            text: 'Suspension'
        }));

        $misgradeAction.append($('<option>', {
            value: '6',
            text: 'Show Cause Notice'
        }));

    } else if (selectedCategory === '1' && selectedLevel === '2') {

        $misgradeAction.append($('<option>', {
            value: '1',
            text: 'Suspension'
        }));

    } else if (selectedCategory === '1' && selectedLevel === '3') {

        $misgradeAction.append($('<option>', {
            value: '1',
            text: 'Suspension'
        }));

    } else if (selectedCategory === '1' && selectedLevel === '4') {

        $misgradeAction.append($('<option>', {
            value: '1',
            text: 'Suspension'
        }));

    } else if (selectedCategory === '1' && selectedLevel === '5') {

        $misgradeAction.append($('<option>', {
            value: '2',
            text: 'Canellation'
        }));
    }
    
    // Set the default selected option if needed
    // $thirdDropdown.val('');


    // This is for the Category II Level 1-4
    if (selectedCategory === '2' && selectedLevel === '1') {

        $misgradeAction.append($('<option>', {
            value: '1',
            text: 'Suspension'
        }));

        $misgradeAction.append($('<option>', {
            value: '6',
            text: 'Show Cause Notice'
        }));

    } else if (selectedCategory === '2' && selectedLevel === '2') {

        $misgradeAction.append($('<option>', {
            value: '1',
            text: 'Suspension'
        }));

    } else if (selectedCategory === '2' && selectedLevel === '3') {

        $misgradeAction.append($('<option>', {
            value: '1',
            text: 'Suspension'
        }));

    } else if (selectedCategory === '2' && selectedLevel === '4') {

        $misgradeAction.append($('<option>', {
            value: '2',
            text: 'Canellation'
        }));

    }


    // This is for the Category III Level 1-2
    if (selectedCategory === '3' && selectedLevel === '1') {

        $misgradeAction.append($('<option>', {
            value: '1',
            text: 'Suspension'
        }));

    } else if (selectedCategory === '3' && selectedLevel === '2') {

        $misgradeAction.append($('<option>', {
            value: '4 ',
            text: 'Cancellation of CA if Lot pertains to Period after suspension of CA.'
        }));

        $misgradeAction.append($('<option>', {
            value: '5',
            text: 'Suspension of CA for Six months if Lot pertains to period prior to suspension'
        }));

    } 


    // This is for the Category IV Level 1-2
    if (selectedCategory === '4' && selectedLevel === '1') {

        $misgradeAction.append($('<option>', {
            value: '7',
            text: 'Immediate Suspension and Simulatanoues Show Cause Notice'
        }));

    } 


}


function updateMisgradePeriod() {
    var selectedCategory = $('#misgrade_category').val();
    var selectedLevel = $('#misgrade_level').val();
    var selectedAction = $('#misgrade_action').val();
    var $timePeriod = $('#time_period');

    $timePeriod.empty();
    $timePeriod.append($('<option>', {
        value: '',
        text: '-- Select Misgrading Reason --'
    }));

    // Add logic here to populate the misgrade_reason dropdown based on the selected values
    //This is for the Category I , Level 1 - 5 , Action 1 - 2
    if (selectedCategory === '1' && selectedLevel === '1' && selectedAction === '1') {
        $timePeriod.append($('<option>', {  
            value: '6',
            text: '6 Months'
        }));
       
    } else if (selectedCategory === '1' && selectedLevel === '2' && selectedAction === '1') {
        $timePeriod.append($('<option>', {
            value: '1',
            text: '1 Month'
        }));
        // Add more options as needed
    } else if (selectedCategory === '1' && selectedLevel === '3' && selectedAction === '1') {
        $timePeriod.append($('<option>', {
            value: '3',
            text: '3 Months'
        }));
       
    } else if (selectedCategory === '1' && selectedLevel === '4' && selectedAction === '1') {
        $timePeriod.append($('<option>', {
            value: '6',
            text: '6 Months'
        }));
       
    } else if (selectedCategory === '1' && selectedLevel === '5' && selectedAction === '2') { 
        $('#time_period_div').hide(); // Hide the misgrade_reason dropdown
    }
    

    //This is for the Category II , Level 1 - 4 , Action 1 - 2
    if (selectedCategory === '2' && selectedLevel === '1' && selectedAction === '1') {
        $timePeriod.append($('<option>', {  
            value: '6',
            text: '6 Months'
        }));
       
    } else if (selectedCategory === '2' && selectedLevel === '2' && selectedAction === '1') {
        $timePeriod.append($('<option>', {
            value: '1',
            text: '1 Month'
        }));
        // Add more options as needed
    } else if (selectedCategory === '2' && selectedLevel === '3' && selectedAction === '1') {
        $timePeriod.append($('<option>', {
            value: '3',
            text: '3 Months'
        }));
       
    } else if (selectedCategory === '2' && selectedLevel === '4' && selectedAction === '1') {
        $timePeriod.append($('<option>', {
            value: '6',
            text: '6 Months'
        }));
       
    } 

    // $misgradeReason.val('');
}
