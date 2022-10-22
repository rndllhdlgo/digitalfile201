//Personal Information
//Validation of minimum input
$('#first_name').on('keyup',function(){ 
    if($('#first_name').val().length < 2){
        $('#first_name_validation').show();
    }
    else{
        $('#first_name_validation').hide();
    }
});

$('#last_name').on('keyup',function(){
    if($('#last_name').val().length < 2){
        $('#last_name_validation').show();
    }
    else{
        $('#last_name_validation').hide();
    }
});

$('#middle_name').on('keyup',function(){
    if($('#middle_name').val().length < 2){
        $('#middle_name_validation').show();
    }
    else{
        $('#middle_name_validation').hide();
    }
});

$('#father_name').on('keyup',function(){
    if($('#father_name').val().length < 2){
        $('#father_name_validation').show();
    }
    else{
        $('#father_name_validation').hide();
    }
});

$('#mother_name').on('keyup',function(){
    if($('#mother_name').val().length < 2){
        $('#mother_name_validation').show();
    }
    else{
        $('#mother_name_validation').hide();
    }
});

$('#emergency_contact_name').on('keyup',function(){
    if($('#emergency_contact_name').val().length < 2){
        $('#emergency_contact_name_validation').show();
    }
    else{
        $('#emergency_contact_name_validation').hide();
    }
});

$('#child_name').on('keyup',function(){
    if($('#child_name').val().length < 2){
        $('#child_name_validation').show();
    }
    else{
        $('#child_name_validation').hide();
    }
});

$('#spouse_name').on('keyup',function(){
    if($('#spouse_name').val().length < 2){
        $('#spouse_name_validation').show();
    }
    else{
        $('#spouse_name_validation').hide();
    }
});

//Cellphone Number
$('#cellphone_number').on('keyup',function(){
    if($('#cellphone_number').val().length < 11){
        $('#cellphone_number_validation').show();
    }
    else{
        $('#cellphone_number_validation').hide();
    }
});

$('#cellphone_number').on('focusin',function(){
      $('#cellphone_number').attr('placeholder','09xx-xxx-xxxx');
});
$('#cellphone_number').on('focusout',function(){
      $('#cellphone_number').attr('placeholder',' ');
});

//Father Number
$('#father_contact_number').on('keyup',function(){
    if($('#father_contact_number').val().length < 11){
        $('#father_contact_number_validation').show();
    }
    else{
        $('#father_contact_number_validation').hide();
    }
});
$('#father_contact_number').on('focusin',function(){
      $('#father_contact_number').attr('placeholder','09xx-xxx-xxxx');
});
$('#father_contact_number').on('focusout',function(){
      $('#father_contact_number_validation').hide();
      $('#father_contact_number').attr('placeholder',' ');
});

//Mother Number
$('#mother_contact_number').on('keyup',function(){
    if($('#mother_contact_number').val().length < 11){
        $('#mother_contact_number_validation').show();
    }
    else{
        $('#mother_contact_number_validation').hide();
    }
});
$('#mother_contact_number').on('focusin',function(){
      $('#mother_contact_number').attr('placeholder','09xx-xxx-xxxx');
});
$('#mother_contact_number').on('focusout',function(){
      $('#mother_contact_number_validation').hide();
      $('#mother_contact_number').attr('placeholder',' ');
});

//Emergency Number
$('#emergency_contact_number').on('keyup',function(){
    if($('#emergency_contact_number').val().length < 11){
        $('#emergency_contact_number_validation').show();
    }
    else{
        $('#emergency_contact_number_validation').hide();
    }
});

$('#emergency_contact_number').on('focusin',function(){
      $('#emergency_contact_number').attr('placeholder','09xx-xxx-xxxx');
});
$('#emergency_contact_number').on('focusout',function(){
      $('#emergency_contact_number').attr('placeholder',' ');
});

//Employee Contact Number
$('#employee_contact_number').on('keyup',function(){
    if($('#employee_contact_number').val().length < 11){
        $('#employee_contact_number_validation').show();
    }
    else{
        $('#employee_contact_number_validation').hide();
    }
});

$('#employee_contact_number').on('focusin',function(){
      $('#employee_contact_number').attr('placeholder','09xx-xxx-xxxx');
});
$('#employee_contact_number').on('focusout',function(){
      $('#employee_contact_number').attr('placeholder',' ');
});

//Spouse Contact Number
$('#spouse_contact_number').on('keyup',function(){
    if($('#spouse_contact_number').val().length < 11){
        $('#spouse_contact_number_validation').show();
    }
    else{
        $('#spouse_contact_number_validation').hide();
    }
});

$('#spouse_contact_number').on('focusin',function(){
      $('#spouse_contact_number').attr('placeholder','09xx-xxx-xxxx');
});
$('#spouse_contact_number').on('focusout',function(){
      $('#spouse_contact_number').attr('placeholder',' ');
});

//Remove (Required) Label on Keyup
$(document).on('keyup',function(){
    if($('#first_name').val()){
        $('.span_first_name').hide();
    }
    else{
        $('.span_first_name').show();
    }

    if($('#last_name').val()){
        $('.span_last_name').hide();
    }
    else{
        $('.span_last_name').show();
    }

    if($('#middle_name').val()){
        $('.span_middle_name').hide();
    }
    else{
        $('.span_middle_name').show();
    }

    if($('#suffix').val()){
        $('.span_suffix').hide();
    }
    else{
        $('.span_suffix').show();
    }

    if($('#street').val()){
        $('.span_street').hide();
    }
    else{
        $('.span_street').show();
    }

    if($('#email_address').val()){
        $('.span_email_address').hide();
    }
    else{
        $('.span_email_address').show();
    }

    if($('#telephone_number').val()){
        $('.span_telephone_number').hide();
    }
    else{
        $('.span_telephone_number').show();
    }

    if($('#cellphone_number').val()){
        $('.span_cellphone_number').hide();
    }
    else{
        $('.span_cellphone_number').show();
    }

    if($('#spouse_name').val()){
        $('.span_spouse_name').hide();
    }
    else{
        $('.span_spouse_name').show();
    }
    
    if($('#spouse_contact_number').val()){
        $('.span_spouse_number').hide();
    }
    else{
        $('.span_spouse_number').show();
    }

    if($('#spouse_profession').val()){
        $('.span_spouse_profession').hide();
    }
    else{
        $('.span_spouse_profession').show();
    }

    if($('#father_name').val()){
        $('.span_father_name').hide();
    }
    else{
        $('.span_father_name').show();
    }

    if($('#father_contact_number').val()){
        $('.span_father_contact_number').hide();
    }
    else{
        $('.span_father_contact_number').show();
    }

    if($('#father_profession').val()){
        $('.span_father_profession').hide();
    }
    else{
        $('.span_father_profession').show();
    }
    
    if($('#mother_name').val()){
        $('.span_mother_name').hide();
    }
    else{
        $('.span_mother_name').show();
    }
    
    if($('#mother_contact_number').val()){
        $('.span_mother_contact_number').hide();
    }
    else{
        $('.span_mother_contact_number').show();
    }
    
    if($('#mother_profession').val()){
        $('.span_mother_profession').hide();
    }
    else{
        $('.span_mother_profession').show();
    }

    if($('#emergency_contact_name').val()){
        $('.span_emergency_contact_name').hide();
    }
    else{
        $('.span_emergency_contact_name').show();
    }

    if($('#emergency_contact_relationship').val()){
        $('.span_emergency_contact_relationship').hide();
    }
    else{
        $('.span_emergency_contact_relationship').show();
    }

    if($('#emergency_contact_number').val()){
        $('.span_emergency_contact_number').hide();
    }
    else{
        $('.span_emergency_contact_number').show();
    }

    if($('#child_name').val()){
        $('.span_child_name').hide();
    }
    else{
        $('.span_child_name').show();
    }
    
//Work Information
    if($('#employee_number').val()){
        $('.span_employee_number').hide();
    }
    else{
        $('.span_employee_number').show();
    }

    if($('#branch_of_employee').val()){
        $('.span_branch_of_employee').hide();
    }
    else{
        $('.span_branch_of_employee').show();
    }
    
    if($('#employee_email_address').val()){
        $('.span_employee_email_address').hide();
    }
    else{
        $('.span_employee_email_address').show();
    }

    if($('#employee_contact_number').val()){
        $('.span_employee_contact_number').hide();
    }
    else{
        $('.span_employee_contact_number').show();
    }

    if($('#sss_number').val()){
        $('.span_sss_number').hide();
    }
    else{
        $('.span_sss_number').show();
    }

    if($('#pag_ibig_number').val()){
        $('.span_pag-ibig_number').hide();
    }
    else{
        $('.span_pag-ibig_number').show();
    }

    if($('#philhealth_number').val()){
        $('.span_philhealth_number').hide();
    }
    else{
        $('.span_philhealth_number').show();
    }

    if($('#tin_number').val()){
        $('.span_tin_number').hide();
    }
    else{
        $('.span_tin_number').show();
    }

    if($('#account_number').val()){
        $('.span_account_number').hide();
    }
    else{
        $('.span_account_number').show();
    }

//Educational and Trainings Background
    if($('#college_name').val()){
        $('.span_college_name').hide();
    }
    else{
        $('.span_college_name').show();
    }

    if($('#college_degree').val()){
        $('.span_college_degree').hide();
    }
    else{
        $('.span_college_degree').show();
    }

    if($('#college_inclusive_years').val()){
        $('.span_college_inclusive_years').hide();
    }
    else{
        $('.span_college_inclusive_years').show();
    }
    
    if($('#training_name').val()){
        $('.span_training_name').hide();
    }
    else{
        $('.span_training_name').show();
    }

    if($('#training_title').val()){
        $('.span_training_title').hide();
    }
    else{
        $('.span_training_title').show();
    }

    if($('#training_inclusive_years').val()){
        $('.span_training_inclusive_years').hide();
    }
    else{
        $('.span_training_inclusive_years').show();
    }

    if($('#vocational_name').val()){
        $('.span_vocational_name').hide();
    }
    else{
        $('.span_vocational_name').show();
    }

    if($('#vocational_course').val()){
        $('.span_vocational_course').hide();
    }
    else{
        $('.span_vocational_course').show();
    }

    if($('#vocational_inclusive_years').val()){
        $('.span_vocational_inclusive_years').hide();
    }
    else{
        $('.span_vocational_inclusive_years').show();
    }

    if($('#secondary_school_name').val()){
        $('.span_secondary_school_name').hide();
    }
    else{
        $('.span_secondary_school_name').show();
    }

    if($('#secondary_school_address').val()){
        $('.span_secondary_school_address').hide();
    }
    else{
        $('.span_secondary_school_address').show();
    }

    if($('#secondary_school_inclusive_years').val()){
        $('.span_secondary_school_inclusive_years').hide();
    }
    else{
        $('.span_secondary_school_inclusive_years').show();
    }

    if($('#primary_school_name').val()){
        $('.span_primary_school_name').hide();
    }
    else{
        $('.span_primary_school_name').show();
    }

    if($('#primary_school_address').val()){
        $('.span_primary_school_address').hide();
    }
    else{
        $('.span_primary_school_address').show();
    }

    if($('#primary_school_inclusive_years').val()){
        $('.span_primary_school_inclusive_years').hide();
    }
    else{
        $('.span_primary_school_inclusive_years').show();
    }

//Job History
    if($('#job_name').val()){
        $('.span_job_name').hide();
    }
    else{
        $('.span_job_name').show();
    }

    if($('#job_position').val()){
        $('.span_job_position').hide();
    }
    else{
        $('.span_job_position').show();
    }

    if($('#job_address').val()){
        $('.span_job_address').hide();
    }
    else{
        $('.span_job_address').show();
    }

    if($('#job_contact_details').val()){
        $('.span_job_contact_details').hide();
    }
    else{
        $('.span_job_contact_details').show();
    }

    if($('#job_inclusive_years').val()){
        $('.span_job_inclusive_years').hide();
    }
    else{
        $('.span_job_inclusive_years').show();
    }

//Documents
    if($('#memo_subject').val()){
        $('.span_memo_subject').hide();
    }
    else{
        $('.span_memo_subject').show();
    }

    if($('#evaluation_reason').val()){
        $('.span_evaluation_reason').hide();
    }
    else{
        $('.span_evaluation_reason').show();
    }

    if($('#evaluation_evaluated_by').val()){
        $('.span_evaluation_evaluated_by').hide();
    }
    else{
        $('.span_evaluation_evaluated_by').show();
    }

    if($('#contracts_type').val()){
        $('.span_contracts_type').hide();
    }
    else{
        $('.span_contracts_type').show();
    }

    if($('#resignation_letter').val()){
        $('.span_resignation_letter').hide();
    }
    else{
        $('.span_resignation_letter').show();
    }

    if($('#termination_letter').val()){
        $('.span_termination_letter').hide();
    }
    else{
        $('.span_termination_letter').show();
    }
});

//Remove (Required) Text on change
$('#birthday').on('change',function(){
    $('.span_birthday').hide();
});

$('#gender').on('change',function(){
    $('.span_gender').hide();
});

$('#region').on('change',function(){
    $('.span_region').hide();
});

$('#city').on('change',function(){
    $('.span_city').hide();
});

$('#province').on('change',function(){
    $('.span_province').hide();
});

$('#company_of_employee').on('change',function(){
    $('.span_company_of_employee').hide();
});

$('#branch_of_employee').on('change',function(){
    $('.span_branch_of_employee').hide();
});

$('#status_of_employee').on('change',function(){
    $('.span_status_of_employee').hide();
});

$('#civil_status').on('change',function(){
    $('.span_civil_status').hide();
});

$('#shift_of_employee').on('change',function(){
    $('.span_shift_of_employee').hide();
});

$('#position_of_employee').on('change',function(){
    $('.span_position_of_employee').hide();
});

$('#supervisor_of_employee').on('change',function(){
    $('.span_supervisor_of_employee').hide();
});

$('#date_hired').on('change',function(){
    $('.span_date_hired').hide();
});

$('#memo_date').on('change',function(){
    $('.span_memo_date').hide();
});

$('#memo_option').on('change',function(){
    $('.span_memo_option').hide();
});

$('#evaluation_date').on('change',function(){
    $('.span_evaluation_date').hide();
});

$('#contracts_date').on('change',function(){
    $('.span_contracts_date').hide();
});

$('#resignation_date').on('change',function(){
    $('.span_resignation_date').hide();
});

$('#termination_date').on('change',function(){
    $('.span_termination_date').hide();
});

$('#child_birthday').on('change',function(){
    $('.span_child_birthday').hide();
});

$('#child_gender').on('change',function(){
    $('.span_child_gender').hide();
});


//User Form Input Fields
$(document).on('keyup',function(){
    if($('#name').val()){
        $('.span_name').hide();
    }
    else{
        $('.span_name').show();
    }

    if($('#email').val()){
        $('.span_email').hide();
    }
    else{
        $('.span_email').show();
    }

    if($('#password').val()){
        $('.span_password').hide();
    }
    else{
        $('.span_password').show();
    }

    if($('#confirm').val()){
        $('.span_confirm').hide();
    }
    else{
        $('.span_confirm').show();
    }
});

$('#user_level').on('change',function(){
    $('.span_user_level').hide();
});

$('#status').on('change',function(){
    $('.span_status').hide();
});

//
setInterval(checkRequiredFields, 0);
function checkRequiredFields(){
    if($(".required_field:visible").length > 0){
        $('.required_field').each(function(){
            if(!$.trim($(this).val())){
                $(this).addClass('requiredInput');
            }
            else{
                $(this).removeClass('requiredInput');
            }
        });
    }
}

// $('#first_name').on('keyup',function(){
//     if(!$('#first_name').val()){
//         $('#first_name').addClass('red');
//         $('#first_name').removeClass('blue');
//     }
//     else{
//         $('#first_name').removeClass('red');
//         $('#first_name').addClass('blue');
//     }
// });

// $('#last_name').on('keyup',function(){
//     if(!$('#last_name').val()){
//         $('#last_name').addClass('red');
//         $('#last_name').removeClass('blue');
//     }
//     else{
//         $('#last_name').removeClass('red');
//         $('#last_name').addClass('blue');
//     }
// });

// $('#middle_name').on('keyup',function(){
//     if(!$('#middle_name').val()){
//         $('#middle_name').addClass('red');
//         $('#middle_name').removeClass('blue');
//     }
//     else{
//         $('#middle_name').removeClass('red');
//         $('#middle_name').addClass('blue');
//     }
// });

// $('#suffix').on('keyup',function(){
//     if(!$('#suffix').val()){
//         $('#suffix').addClass('red');
//         $('#suffix').removeClass('blue');
//     }
//     else{
//         $('#suffix').removeClass('red');
//         $('#suffix').addClass('blue');
//     }
// });

// $('#birthday').on('change',function(){
//     if(!$('#birthday').val()){
//         $('#birthday').addClass('red');
//         $('#birthday').removeClass('blue');
//     }
//     else{
//         $('#birthday').removeClass('red');
//         $('#birthday').addClass('blue');
//     }
// });

// $('#gender').on('change',function(){
//     if(!$('#gender').val()){
//         $('#gender').addClass('red');
//         $('#gender').removeClass('blue');
//     }
//     else{
//         $('#gender').removeClass('red');
//         $('#gender').addClass('blue');
//     }
// });

// $('#civil_status').on('change',function(){
//     if(!$('#civil_status').val()){
//         $('#civil_status').addClass('red');
//         $('#civil_status').removeClass('blue');
//     }
//     else{
//         $('#civil_status').removeClass('red');
//         $('#civil_status').addClass('blue');
//     }
// });

// $('#street').on('keyup',function(){
//     if(!$('#street').val()){
//         $('#street').addClass('red');
//         $('#street').removeClass('blue');
//     }
//     else{
//         $('#street').removeClass('red');
//         $('#street').addClass('blue');
//     }
// });

// $('#region').on('change',function(){
//     if(!$('#region').val()){
//         $('#region').addClass('red');
//         $('#region').removeClass('blue');
//     }
//     else{
//         $('#region').removeClass('red');
//         $('#region').addClass('blue');
//     }
// });

// $('#province').on('change',function(){
//     if(!$('#province').val()){
//         $('#province').addClass('red');
//         $('#province').removeClass('blue');
//     }
//     else{
//         $('#province').removeClass('red');
//         $('#province').addClass('blue');
//     }
// });

// $('#city').on('change',function(){
//     if(!$('#city').val()){
//         $('#city').addClass('red');
//         $('#city').removeClass('blue');
//     }
//     else{
//         $('#city').removeClass('red');
//         $('#city').addClass('blue');
//     }
// });

// $('#email_address').on('keyup',function(){
//     if(!$('#email_address').val()){
//         $('#email_address').addClass('red');
//         $('#email_address').removeClass('blue');
//     }
//     else{
//         $('#email_address').removeClass('red');
//         $('#email_address').addClass('blue');
//     }
// });

// $('#telephone_number').on('keyup',function(){
//     if(!$('#telephone_number').val()){
//         $('#telephone_number').addClass('red');
//         $('#telephone_number').removeClass('blue');
//     }
//     else{
//         $('#telephone_number').removeClass('red');
//         $('#telephone_number').addClass('blue');
//     }
// });

// $('#cellphone_number').on('keyup',function(){
//     if(!$('#cellphone_number').val()){
//         $('#cellphone_number').addClass('red');
//         $('#cellphone_number').removeClass('blue');
//     }
//     else{
//         $('#cellphone_number').removeClass('red');
//         $('#cellphone_number').addClass('blue');
//     }
// });

// $('#father_name').on('keyup',function(){
//     if(!$('#father_name').val()){
//         $('#father_name').addClass('red');
//         $('#father_name').removeClass('blue');
//     }
//     else{
//         $('#father_name').removeClass('red');
//         $('#father_name').addClass('blue');
//     }
// });

// $('#father_contact_number').on('keyup',function(){
//     if(!$('#father_contact_number').val()){
//         $('#father_contact_number').addClass('red');
//         $('#father_contact_number').removeClass('blue');
//     }
//     else{
//         $('#father_contact_number').removeClass('red');
//         $('#father_contact_number').addClass('blue');
//     }
// });

// $('#father_contact_number').on('keyup',function(){
//     if(!$('#father_contact_number').val()){
//         $('#father_contact_number').addClass('red');
//         $('#father_contact_number').removeClass('blue');
//     }
//     else{
//         $('#father_contact_number').removeClass('red');
//         $('#father_contact_number').addClass('blue');
//     }
// });

// $('#father_profession').on('keyup',function(){
//     if(!$('#father_profession').val()){
//         $('#father_profession').addClass('red');
//         $('#father_profession').removeClass('blue');
//     }
//     else{
//         $('#father_profession').removeClass('red');
//         $('#father_profession').addClass('blue');
//     }
// });

// $('#mother_name').on('keyup',function(){
//     if(!$('#mother_name').val()){
//         $('#mother_name').addClass('red');
//         $('#mother_name').removeClass('blue');
//     }
//     else{
//         $('#mother_name').removeClass('red');
//         $('#mother_name').addClass('blue');
//     }
// });

// $('#mother_contact_number').on('keyup',function(){
//     if(!$('#mother_contact_number').val()){
//         $('#mother_contact_number').addClass('red');
//         $('#mother_contact_number').removeClass('blue');
//     }
//     else{
//         $('#mother_contact_number').removeClass('red');
//         $('#mother_contact_number').addClass('blue');
//     }
// });

// $('#mother_profession').on('keyup',function(){
//     if(!$('#mother_profession').val()){
//         $('#mother_profession').addClass('red');
//         $('#mother_profession').removeClass('blue');
//     }
//     else{
//         $('#mother_profession').removeClass('red');
//         $('#mother_profession').addClass('blue');
//     }
// });

// $('#emergency_contact_name').on('keyup',function(){
//     if(!$('#emergency_contact_name').val()){
//         $('#emergency_contact_name').addClass('red');
//         $('#emergency_contact_name').removeClass('blue');
//     }
//     else{
//         $('#emergency_contact_name').removeClass('red');
//         $('#emergency_contact_name').addClass('blue');
//     }
// });

// $('#emergency_contact_relationship').on('keyup',function(){
//     if(!$('#emergency_contact_relationship').val()){
//         $('#emergency_contact_relationship').addClass('red');
//         $('#emergency_contact_relationship').removeClass('blue');
//     }
//     else{
//         $('#emergency_contact_relationship').removeClass('red');
//         $('#emergency_contact_relationship').addClass('blue');
//     }
// });

// $('#emergency_contact_number').on('keyup',function(){
//     if(!$('#emergency_contact_number').val()){
//         $('#emergency_contact_number').addClass('red');
//         $('#emergency_contact_number').removeClass('blue');
//     }
//     else{
//         $('#emergency_contact_number').removeClass('red');
//         $('#emergency_contact_number').addClass('blue');
//     }
// });

// $('#spouse_name').on('keyup',function(){
//     if(!$('#spouse_name').val()){
//         $('#spouse_name').addClass('red');
//         $('#spouse_name').removeClass('blue');
//     }
//     else{
//         $('#spouse_name').removeClass('red');
//         $('#spouse_name').addClass('blue');
//     }
// });

// $('#spouse_contact_number').on('keyup',function(){
//     if(!$('#spouse_contact_number').val()){
//         $('#spouse_contact_number').addClass('red');
//         $('#spouse_contact_number').removeClass('blue');
//     }
//     else{
//         $('#spouse_contact_number').removeClass('red');
//         $('#spouse_contact_number').addClass('blue');
//     }
// });

// $('#spouse_profession').on('keyup',function(){
//     if(!$('#spouse_profession').val()){
//         $('#spouse_profession').addClass('red');
//         $('#spouse_profession').removeClass('blue');
//     }
//     else{
//         $('#spouse_profession').removeClass('red');
//         $('#spouse_profession').addClass('blue');
//     }
// });

// //Work Information

// $('#employee_number').on('keyup',function(){
//     if(!$('#employee_number').val()){
//         $('#employee_number').addClass('red');
//         $('#employee_number').removeClass('blue');
//     }
//     else{
//         $('#employee_number').removeClass('red');
//         $('#employee_number').addClass('blue');
//     }
// });

// $('#company_of_employee').on('change',function(){
//     if(!$('#company_of_employee').val()){
//         $('#company_of_employee').addClass('red');
//         $('#company_of_employee').removeClass('blue');
//     }
//     else{
//         $('#company_of_employee').removeClass('red');
//         $('#company_of_employee').addClass('blue');
//     }
// });

// $('#branch_of_employee').on('change',function(){
//     if(!$('#branch_of_employee').val()){
//         $('#branch_of_employee').addClass('red');
//         $('#branch_of_employee').removeClass('blue');
//     }
//     else{
//         $('#branch_of_employee').removeClass('red');
//         $('#branch_of_employee').addClass('blue');
//     }
// });

// $('#status_of_employee').on('change',function(){
//     if(!$('#status_of_employee').val()){
//         $('#status_of_employee').addClass('red');
//         $('#status_of_employee').removeClass('blue');
//     }
//     else{
//         $('#status_of_employee').removeClass('red');
//         $('#status_of_employee').addClass('blue');
//     }
// });

// $('#shift_of_employee').on('change',function(){
//     if(!$('#shift_of_employee').val()){
//         $('#shift_of_employee').addClass('red');
//         $('#shift_of_employee').removeClass('blue');
//     }
//     else{
//         $('#shift_of_employee').removeClass('red');
//         $('#shift_of_employee').addClass('blue');
//     }
// });

// $('#position_of_employee').on('change',function(){
//     if(!$('#position_of_employee').val()){
//         $('#position_of_employee').addClass('red');
//         $('#position_of_employee').removeClass('blue');
//     }
//     else{
//         $('#position_of_employee').removeClass('red');
//         $('#position_of_employee').addClass('blue');
//     }
// });

// $('#supervisor_of_employee').on('change',function(){
//     if(!$('#supervisor_of_employee').val()){
//         $('#supervisor_of_employee').addClass('red');
//         $('#supervisor_of_employee').removeClass('blue');
//     }
//     else{
//         $('#supervisor_of_employee').removeClass('red');
//         $('#supervisor_of_employee').addClass('blue');
//     }
// });

// $('#date_hired').on('change',function(){
//     if(!$('#date_hired').val()){
//         $('#date_hired').addClass('red');
//         $('#date_hired').removeClass('blue');
//     }
//     else{
//         $('#date_hired').removeClass('red');
//         $('#date_hired').addClass('blue');
//     }
// });

// $('#employee_email_address').on('keyup',function(){
//     if(!$('#employee_email_address').val()){
//         $('#employee_email_address').addClass('red');
//         $('#employee_email_address').removeClass('blue');
//     }
//     else{
//         $('#employee_email_address').removeClass('red');
//         $('#employee_email_address').addClass('blue');
//     }
// });

// $('#employee_contact_number').on('keyup',function(){
//     if(!$('#employee_contact_number').val()){
//         $('#employee_contact_number').addClass('red');
//         $('#employee_contact_number').removeClass('blue');
//     }
//     else{
//         $('#employee_contact_number').removeClass('red');
//         $('#employee_contact_number').addClass('blue');
//     }
// });

// $('#sss_number').on('keyup',function(){
//     if(!$('#sss_number').val()){
//         $('#sss_number').addClass('red');
//         $('#sss_number').removeClass('blue');
//     }
//     else{
//         $('#sss_number').removeClass('red');
//         $('#sss_number').addClass('blue');
//     }
// });

// $('#pag_ibig_number').on('keyup',function(){
//     if(!$('#pag_ibig_number').val()){
//         $('#pag_ibig_number').addClass('red');
//         $('#pag_ibig_number').removeClass('blue');
//     }
//     else{
//         $('#pag_ibig_number').removeClass('red');
//         $('#pag_ibig_number').addClass('blue');
//     }
// });

// $('#philhealth_number').on('keyup',function(){
//     if(!$('#philhealth_number').val()){
//         $('#philhealth_number').addClass('red');
//         $('#philhealth_number').removeClass('blue');
//     }
//     else{
//         $('#philhealth_number').removeClass('red');
//         $('#philhealth_number').addClass('blue');
//     }
// });

// $('#tin_number').on('keyup',function(){
//     if(!$('#tin_number').val()){
//         $('#tin_number').addClass('red');
//         $('#tin_number').removeClass('blue');
//     }
//     else{
//         $('#tin_number').removeClass('red');
//         $('#tin_number').addClass('blue');
//     }
// });

// $('#account_number').on('keyup',function(){
//     if(!$('#account_number').val()){
//         $('#account_number').addClass('red');
//         $('#account_number').removeClass('blue');
//     }
//     else{
//         $('#account_number').removeClass('red');
//         $('#account_number').addClass('blue');
//     }
// });

// //Educational and Training

// $('#college_name').on('keyup',function(){
//     if(!$('#college_name').val()){
//         $('#college_name').addClass('red');
//         $('#college_name').removeClass('blue');
//     }
//     else{
//         $('#college_name').removeClass('red');
//         $('#college_name').addClass('blue');
//     }
// });

// $('#college_degree').on('keyup',function(){
//     if(!$('#college_degree').val()){
//         $('#college_degree').addClass('red');
//         $('#college_degree').removeClass('blue');
//     }
//     else{
//         $('#college_degree').removeClass('red');
//         $('#college_degree').addClass('blue');
//     }
// });

// $('#secondary_school_name').on('keyup',function(){
//     if(!$('#secondary_school_name').val()){
//         $('#secondary_school_name').addClass('red');
//         $('#secondary_school_name').removeClass('blue');
//     }
//     else{
//         $('#secondary_school_name').removeClass('red');
//         $('#secondary_school_name').addClass('blue');
//     }
// });

// $('#secondary_school_address').on('keyup',function(){
//     if(!$('#secondary_school_address').val()){
//         $('#secondary_school_address').addClass('red');
//         $('#secondary_school_address').removeClass('blue');
//     }
//     else{
//         $('#secondary_school_address').removeClass('red');
//         $('#secondary_school_address').addClass('blue');
//     }
// });

// $('#secondary_school_inclusive_years').on('keyup',function(){
//     if(!$('#secondary_school_inclusive_years').val()){
//         $('#secondary_school_inclusive_years').addClass('red');
//         $('#secondary_school_inclusive_years').removeClass('blue');
//     }
//     else{
//         $('#secondary_school_inclusive_years').removeClass('red');
//         $('#secondary_school_inclusive_years').addClass('blue');
//     }
// });

// $('#primary_school_name').on('keyup',function(){
//     if(!$('#primary_school_name').val()){
//         $('#primary_school_name').addClass('red');
//         $('#primary_school_name').removeClass('blue');
//     }
//     else{
//         $('#primary_school_name').removeClass('red');
//         $('#primary_school_name').addClass('blue');
//     }
// });

// $('#primary_school_address').on('keyup',function(){
//     if(!$('#primary_school_address').val()){
//         $('#primary_school_address').addClass('red');
//         $('#primary_school_address').removeClass('blue');
//     }
//     else{
//         $('#primary_school_address').removeClass('red');
//         $('#primary_school_address').addClass('blue');
//     }
// });

// $('#primary_school_inclusive_years').on('keyup',function(){
//     if(!$('#primary_school_inclusive_years').val()){
//         $('#primary_school_inclusive_years').addClass('red');
//         $('#primary_school_inclusive_years').removeClass('blue');
//     }
//     else{
//         $('#primary_school_inclusive_years').removeClass('red');
//         $('#primary_school_inclusive_years').addClass('blue');
//     }
// });

// $('#training_name').on('keyup',function(){
//     if(!$('#training_name').val()){
//         $('#training_name').addClass('red');
//         $('#training_name').removeClass('blue');
//     }
//     else{
//         $('#training_name').removeClass('red');
//         $('#training_name').addClass('blue');
//     }
// });

// $('#training_title').on('keyup',function(){
//     if(!$('#training_title').val()){
//         $('#training_title').addClass('red');
//         $('#training_title').removeClass('blue');
//     }
//     else{
//         $('#training_title').removeClass('red');
//         $('#training_title').addClass('blue');
//     }
// });

// $('#training_inclusive_years').on('keyup',function(){
//     if(!$('#training_inclusive_years').val()){
//         $('#training_inclusive_years').addClass('red');
//         $('#training_inclusive_years').removeClass('blue');
//     }
//     else{
//         $('#training_inclusive_years').removeClass('red');
//         $('#training_inclusive_years').addClass('blue');
//     }
// });

// $('#vocational_name').on('keyup',function(){
//     if(!$('#vocational_name').val()){
//         $('#vocational_name').addClass('red');
//         $('#vocational_name').removeClass('blue');
//     }
//     else{
//         $('#vocational_name').removeClass('red');
//         $('#vocational_name').addClass('blue');
//     }
// });

// $('#vocational_course').on('keyup',function(){
//     if(!$('#vocational_course').val()){
//         $('#vocational_course').addClass('red');
//         $('#vocational_course').removeClass('blue');
//     }
//     else{
//         $('#vocational_course').removeClass('red');
//         $('#vocational_course').addClass('blue');
//     }
// });

// $('#vocational_inclusive_years').on('keyup',function(){
//     if(!$('#vocational_inclusive_years').val()){
//         $('#vocational_inclusive_years').addClass('red');
//         $('#vocational_inclusive_years').removeClass('blue');
//     }
//     else{
//         $('#vocational_inclusive_years').removeClass('red');
//         $('#vocational_inclusive_years').addClass('blue');
//     }
// });

// //Job History

// $('#vocational_name').on('keyup',function(){
//     if(!$('#vocational_name').val()){
//         $('#vocational_name').addClass('red');
//         $('#vocational_name').removeClass('blue');
//     }
//     else{
//         $('#vocational_name').removeClass('red');
//         $('#vocational_name').addClass('blue');
//     }
// });

// $('#vocational_course').on('keyup',function(){
//     if(!$('#vocational_course').val()){
//         $('#vocational_course').addClass('red');
//         $('#vocational_course').removeClass('blue');
//     }
//     else{
//         $('#vocational_course').removeClass('red');
//         $('#vocational_course').addClass('blue');
//     }
// });

// $('#vocational_inclusive_years').on('keyup',function(){
//     if(!$('#vocational_inclusive_years').val()){
//         $('#vocational_inclusive_years').addClass('red');
//         $('#vocational_inclusive_years').removeClass('blue');
//     }
//     else{
//         $('#vocational_inclusive_years').removeClass('red');
//         $('#vocational_inclusive_years').addClass('blue');
//     }
// });

// $('#vocational_course').on('keyup',function(){
//     if(!$('#vocational_course').val()){
//         $('#vocational_course').addClass('red');
//         $('#vocational_course').removeClass('blue');
//     }
//     else{
//         $('#vocational_course').removeClass('red');
//         $('#vocational_course').addClass('blue');
//     }
// });

// $('#vocational_inclusive_years').on('keyup',function(){
//     if(!$('#vocational_inclusive_years').val()){
//         $('#vocational_inclusive_years').addClass('red');
//         $('#vocational_inclusive_years').removeClass('blue');
//     }
//     else{
//         $('#vocational_inclusive_years').removeClass('red');
//         $('#vocational_inclusive_years').addClass('blue');
//     }
// });