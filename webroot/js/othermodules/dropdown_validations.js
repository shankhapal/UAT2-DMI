
var is_ghee_comm = $('#is_ghee_comm').val();
var misCatId_val = $('#misCatId_val').val();
var misActId_val = $('#misActId_val').val();
var misLvlId_val = $('#misLvlId_val').val();
var periodId_val = $('#periodId_val').val();


  
  
$(document).ready(function() {
    $('#misgrade_category').on('click', 'option', function() {
        var selectedValue = $(this).val();
        var cat_description = "";
    
        if (selectedValue === "1") {
            cat_description = "Category I : Misgrade where samples conform to lower grade.";
        } else if (selectedValue === "2") {
            cat_description = "Category II : Misgrade where samples do not conform to lower grade.";
        } else if (selectedValue === "3") {
            cat_description = "Category III : Misgrading category with intentional adulteration.";
        } else if (selectedValue === "4") {
            cat_description = "Category IV : Misgrading due to substances injurious to health.";
        }
        

        $('#mis_cat_desc').text(cat_description);
     
    });

    $('#misgrade_level').on('click', 'option', function() {

        var selectedValue = $(this).val();
        var level_description = "";
    
        if (selectedValue === "1") {
            level_description = "First Misgrading";
        } else if (selectedValue === "2") {
            level_description = "Second Misgrading";
        } else if (selectedValue === "3") {
            level_description = "Third Misgrading";
        } else if (selectedValue === "4") {
            level_description = "Fourth Misgrading";
        }else if (selectedValue === "5") {
            level_description = "Fifth Misgrading";
        }
        
        $('#mis_level_desc').text(level_description);
      
    });

    $('#misgrade_action').on('click', 'option', function() {
       
        var selectedValue = $.trim($(this).val());
       
        var action_description = "";
    
        if (selectedValue === "1") {
            action_description = "Suspension";
        } else if (selectedValue === "2") {
            action_description = "Canellation";
        } else if (selectedValue === "3") {
            action_description = "Refer to Head Office.";
        } else if (selectedValue === "4") { 
            action_description = "Cancellation of CA if Lot pertains to Period after suspension of CA.";
        }else if (selectedValue === "5") {
            action_description = "Suspension of CA for Six months if Lot pertains to period prior to suspension.";
        }else if (selectedValue === "6") {
            action_description = "Show cause notice.";
        }else if (selectedValue === "7") {
            action_description = "Immediate Suspension and Simulatanoues Show Cause Notice";
        }
    
        $('#mis_action_desc').text(action_description);

    });

    $('#time_period').on('click', 'option', function() {

        var selectedValue = $(this).val();
        var period_description = "";
    
        if (selectedValue === "1") {
            period_description = "For Period : 1 Month.";
        } else if (selectedValue === "2") {
            period_description = "For Period : 2 Months.";
        } else if (selectedValue === "3") {
            period_description = "For Period : 3 Months.";
        } else if (selectedValue === "6") {
            period_description = "For Period : 4 Months.";
        }

        $('#mis_period_desc').text(period_description);
    });
});


   
   

    $(document).ready(function() {

        $('#misgrade_category').on('change', function() {
            updateMisgradeLevels();
        });

        $('#misgrade_level').on('change', function() {
            updateMisgradeActions();
        });

        $('#misgrade_action').on('change', function() {
            updateTimePeriod();
        });
        
        updateMisgradeLevels(); // Call the function initially to set the options based on the default selected category
        updateMisgradeActions(); // Call the function initially to set the options based on the default selected category and level
        updateTimePeriod();
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
            
            //check if the category is ghee
            if (is_ghee_comm == 'yes') {

                $misgradeAction.append($('<option>', {
                    value: '1',
                    text: 'Suspension'
                }));
    
                $misgradeAction.append($('<option>', {
                    value: '6',
                    text: 'Show Cause Notice'
                }));

            } else {

                $misgradeAction.append($('<option>', {
                    value: '6',
                    text: 'Show Cause Notice'
                }));
            }
           

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
        
       

        // This is for the Category II Level 1-4
        else if (selectedCategory === '2' && selectedLevel === '1') {
            
            if (is_ghee_comm == 'yes') {

                $misgradeAction.append($('<option>', {
                    value: '1',
                    text: 'Suspension'
                }));
    
                $misgradeAction.append($('<option>', {
                    value: '6',
                    text: 'Show Cause Notice'
                }));

            } else {
                $misgradeAction.append($('<option>', {
                    value: '6',
                    text: 'Show Cause Notice'
                }));
            }
            

        } 
        else if (selectedCategory === '2' && selectedLevel === '2') {

            $misgradeAction.append($('<option>', {
                value: '1',
                text: 'Suspension'
            }));

        } 
        else if (selectedCategory === '2' && selectedLevel === '3') {

            $misgradeAction.append($('<option>', {
                value: '1',
                text: 'Suspension'
            }));

        } 
        else if (selectedCategory === '2' && selectedLevel === '4') {

            $misgradeAction.append($('<option>', {
                value: '2',
                text: 'Canellation'
            }));

        }


        // This is for the Category III Level 1-2
        else if (selectedCategory === '3' && selectedLevel === '1') {

            $misgradeAction.append($('<option>', {
                value: '1',
                text: 'Suspension'
            }));

        } 
        else if (selectedCategory === '3' && selectedLevel === '2') {

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
        else if (selectedCategory === '4' && selectedLevel === '1') {

            $misgradeAction.append($('<option>', {
                value: '7',
                text: 'Immediate Suspension and Simulatanoues Show Cause Notice'
            }));

        } 
        else if (selectedCategory === '4' && selectedLevel === '2') {

            $misgradeAction.append($('<option>', {
                value: '3',
                text: 'Refer to Head Office'
            }));

        } 


    }

    function updateTimePeriod() {
    
        var selectedCategory = $.trim($('#misgrade_category').val());
        var selectedLevel = $.trim($('#misgrade_level').val());
        var selectedAction = $.trim($('#misgrade_action').val());
        var $timePeriod = $('#time_period');
     
        $timePeriod.empty();

        $timePeriod.append($('<option>', {
            value: '',
            text: '-- Select Period --'
        }));
    
        // Reset the visibility of the time_period_div
         $('#time_period_div').show();

        //alert(selectedCategory); alert(selectedLevel); alert(selectedAction);
        // This is the Catgory I, Level 1 to 5, 

        if (selectedCategory === '1' && selectedLevel === '1' && selectedAction === '6') {
            
            $('#time_period_div').hide(); 
            
        }
        else if (selectedCategory === '1' && selectedLevel === '2' && selectedAction === '1') {
            
            $timePeriod.append($('<option>', {
                value: '1',
                text: '1 Month'
            }));
            
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

            $('#time_period_div').hide(); 
        } 


        //This is for category II
        else if (selectedCategory === '2' && selectedLevel === '2' && selectedAction === '1') {
            $timePeriod.append($('<option>', {
                value: '3',
                text: '3 Months'
            }));
        }

        else if (selectedCategory === '2' && selectedLevel === '3' && selectedAction === '1') {
           
            $timePeriod.append($('<option>', {
                value: '6',
                text: '6 Months'
            }));
        }

        else if (selectedCategory === '2' && selectedLevel === '4' && selectedAction === '2') {

            $('#time_period_div').hide(); 
        } 


        //For Category III

        else if (selectedCategory === '3' && selectedLevel === '1' && selectedAction === '1') {
           
            if (is_ghee_comm == 'yes') {

                $timePeriod.append($('<option>', {
                    value: '6',
                    text: '6 Months'
                }));

            } else {

                $timePeriod.append($('<option>', {
                    value: '3',
                    text: '3 Months'
                }));
            }
           
        }

        else if (selectedCategory === '3' && selectedLevel === '2' && selectedAction === '4') {
           
            $('#time_period_div').hide(); 
           
        }

        else if (selectedCategory === '3' && selectedLevel === '2' && selectedAction === '5') {
           
            $('#time_period_div').hide();
           
        }
   
        //For Category IV

        else if (selectedCategory === '4' && selectedLevel === '1' && selectedAction === '7') {
           
            if (is_ghee_comm == 'yes') {

                $timePeriod.append($('<option>', {
                    value: '6',
                    text: '6 Months'
                }));

            } else {

                $timePeriod.append($('<option>', {
                    value: '2',
                    text: '2 Months'
                }));
            }
           
        }
        else if (selectedCategory === '4' && selectedLevel === '2' && selectedAction === '3') {
           
            $('#time_period_div').hide(); 
           
        }
    }
    