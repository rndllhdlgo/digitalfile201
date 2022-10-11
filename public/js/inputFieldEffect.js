//Validation

$('#first_name').on('keyup',function(){
    if($('#first_name').val().length < 2){
        $('#first_name_validation').show();
        // $('#personal_information').css('height','510px');
        // $('#6th-row').css('margin-top','70px');
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
        $('#first_name').css('border','2px solid #0d1a80');
        $('.span_first_name').hide();
    }
    else{
        $('.span_first_name').show();
    }

    if($('#last_name').val()){
        $('#last_name').css('border','2px solid #0d1a80');
        $('.span_last_name').hide();
    }
    else{
        $('.span_last_name').show();
    }

    if($('#middle_name').val()){
        $('#middle_name').css('border','2px solid #0d1a80');
        $('.span_middle_name').hide();
    }
    else{
        $('.span_middle_name').show();
    }

    if($('#suffix').val()){
        $('#suffix').css('border','2px solid #0d1a80');
        $('.span_suffix').hide();
    }
    else{
        $('.span_suffix').show();
    }

    if($('#street').val()){
        $('#street').css('border','2px solid #0d1a80');
        $('.span_street_address').hide();
    }
    else{
        $('.span_street_address').show();
    }

    if($('#email_address').val()){
        $('#email_address').css('border','2px solid #0d1a80');
        $('.span_email_address').hide();
    }
    else{
        $('.span_email_address').show();
    }

    if($('#telephone_number').val()){
        $('#telephone_number').css('border','2px solid #0d1a80');
        $('.span_telephone_number').hide();
    }
    else{
        $('.span_telephone_number').show();
    }

    if($('#cellphone_number').val()){
        $('#cellphone_number').css('border','2px solid #0d1a80');
        $('.span_cellphone_number').hide();
    }
    else{
        $('.span_cellphone_number').show();
    }

    if($('#spouse_name').val()){
        $('#spouse_name').css('border','2px solid #0d1a80');
        $('.span_spouse_name').hide();
    }
    else{
        $('.span_spouse_name').show();
    }
    
    if($('#spouse_contact_number').val()){
        $('#spouse_contact_number').css('border','2px solid #0d1a80');
        $('.span_spouse_number').hide();
    }
    else{
        $('.span_spouse_number').show();
    }

    if($('#spouse_profession').val()){
        $('#spouse_profession').css('border','2px solid #0d1a80');
        $('.span_spouse_profession').hide();
    }
    else{
        $('.span_spouse_profession').show();
    }

    if($('#father_name').val()){
        $('#father_name').css('border','2px solid #0d1a80');
        $('.span_father_name').hide();
    }
    else{
        $('.span_father_name').show();
    }

    if($('#father_contact_number').val()){
        $('#father_contact_number').css('border','2px solid #0d1a80');
        $('.span_father_contact_number').hide();
    }
    else{
        $('.span_father_contact_number').show();
    }

    if($('#father_profession').val()){
        $('#father_profession').css('border','2px solid #0d1a80');
        $('.span_father_profession').hide();
    }
    else{
        $('.span_father_profession').show();
    }
    
    if($('#mother_name').val()){
        $('#mother_name').css('border','2px solid #0d1a80');
        $('.span_mother_name').hide();
    }
    else{
        $('.span_mother_name').show();
    }
    
    if($('#mother_contact_number').val()){
        $('#mother_contact_number').css('border','2px solid #0d1a80');
        $('.span_mother_contact_number').hide();
    }
    else{
        $('.span_mother_contact_number').show();
    }
    
    if($('#mother_profession').val()){
        $('#mother_profession').css('border','2px solid #0d1a80');
        $('.span_mother_profession').hide();
    }
    else{
        $('.span_mother_profession').show();
    }

    if($('#emergency_contact_name').val()){
        $('#emergency_contact_name').css('border','2px solid #0d1a80');
        $('.span_emergency_contact_name').hide();
    }
    else{
        $('.span_emergency_contact_name').show();
    }

    if($('#emergency_contact_relationship').val()){
        $('#emergency_contact_relationship').css('border','2px solid #0d1a80');
        $('.span_emergency_contact_relationship').hide();
    }
    else{
        $('.span_emergency_contact_relationship').show();
    }

    if($('#emergency_contact_number').val()){
        $('#emergency_contact_number').css('border','2px solid #0d1a80');
        $('.span_emergency_contact_number').hide();
    }
    else{
        $('.span_emergency_contact_number').show();
    }
    
//Work Information
    if($('#employee_number').val()){
        $('#employee_number').css('border','2px solid #0d1a80');
        $('.span_employee_number').hide();
    }
    else{
        $('.span_employee_number').show();
    }

    // if($('#company_of_employee').val()){
    //     $('#company_of_employee').css('border','2px solid #0d1a80');
    //     $('.span_company_of_employee').hide();
    // }
    // else{
    //     $('.span_company_of_employee').show();
    // }

    if($('#branch_of_employee').val()){
        $('#branch_of_employee').css('border','2px solid #0d1a80');
        $('.span_branch_of_employee').hide();
    }
    else{
        $('.span_branch_of_employee').show();
    }

    // if($('#position_of_employee').val()){
    //     $('#position_of_employee').css('border','2px solid #0d1a80');
    //     $('.span_position_of_employee').hide();
    // }
    // else{
    //     $('.span_position_of_employee').show();
    // }
    
    if($('#employee_email_address').val()){
        $('#employee_email_address').css('border','2px solid #0d1a80');
        $('.span_employee_email_address').hide();
    }
    else{
        $('.span_employee_email_address').show();
    }

    if($('#employee_contact_number').val()){
        $('#employee_contact_number').css('border','2px solid #0d1a80');
        $('.span_employee_contact_number').hide();
    }
    else{
        $('.span_employee_contact_number').show();
    }

    if($('#sss_number').val()){
        $('#sss_number').css('border','2px solid #0d1a80');
        $('.span_sss_number').hide();
    }
    else{
        $('.span_sss_number').show();
    }

    if($('#pag_ibig_number').val()){
        $('#pag_ibig_number').css('border','2px solid #0d1a80');
        $('.span_pag-ibig_number').hide();
    }
    else{
        $('.span_pag-ibig_number').show();
    }

    if($('#philhealth_number').val()){
        $('#philhealth_number').css('border','2px solid #0d1a80');
        $('.span_philhealth_number').hide();
    }
    else{
        $('.span_philhealth_number').show();
    }

    if($('#tin_number').val()){
        $('#tin_number').css('border','2px solid #0d1a80');
        $('.span_tin_number').hide();
    }
    else{
        $('.span_tin_number').show();
    }

    if($('#account_number').val()){
        $('#account_number').css('border','2px solid #0d1a80');
        $('.span_account_number').hide();
    }
    else{
        $('.span_account_number').show();
    }

    if($('#college_name').val()){
        $('#college_name').css('border','2px solid #0d1a80');
        $('.span_college_name').hide();
    }
    else{
        $('.span_college_name').show();
    }

    if($('#college_degree').val()){
        $('#college_degree').css('border','2px solid #0d1a80');
        $('.span_college_degree').hide();
    }
    else{
        $('.span_college_degree').show();
    }

    if($('#college_inclusive_years').val()){
        $('#college_inclusive_years').css('border','2px solid #0d1a80');
        $('.span_college_inclusive_years').hide();
    }
    else{
        $('.span_college_inclusive_years').show();
    }

    if($('#secondary_school_name').val()){
        $('#secondary_school_name').css('border','2px solid #0d1a80');
        $('.span_secondary_school_name').hide();
    }
    else{
        $('.span_secondary_school_name').show();
    }

    if($('#secondary_school_address').val()){
        $('#secondary_school_address').css('border','2px solid #0d1a80');
        $('.span_secondary_school_address').hide();
    }
    else{
        $('.span_secondary_school_address').show();
    }

    if($('#secondary_school_inclusive_years').val()){
        $('#secondary_school_inclusive_years').css('border','2px solid #0d1a80');
        $('.span_secondary_school_inclusive_years').hide();
    }
    else{
        $('.span_secondary_school_inclusive_years').show();
    }

    if($('#primary_school_name').val()){
        $('#primary_school_name').css('border','2px solid #0d1a80');
        $('.span_primary_school_name').hide();
    }
    else{
        $('.span_primary_school_name').show();
    }

    if($('#primary_school_address').val()){
        $('#primary_school_address').css('border','2px solid #0d1a80');
        $('.span_primary_school_address').hide();
    }
    else{
        $('.span_primary_school_address').show();
    }

    if($('#primary_school_inclusive_years').val()){
        $('#primary_school_inclusive_years').css('border','2px solid #0d1a80');
        $('.span_primary_school_inclusive_years').hide();
    }
    else{
        $('.span_primary_school_inclusive_years').show();
    }
});

//Remove (Required) Text
$('#birthday').on('change',function(){
    $('#birthday').css('border','2px solid #0d1a80');
    $('.span_birthday').hide();
});

$('#gender').on('change',function(){
    $('#gender').css('border','2px solid #0d1a80');
    $('.span_gender').hide();
});

$('#region').on('change',function(){
    $('#region').css('border','2px solid #0d1a80');
    $('.span_region').hide();
});

$('#city').on('change',function(){
    $('#city').css('border','2px solid #0d1a80');
    $('.span_city').hide();
});

$('#province').on('change',function(){
    $('#province').css('border','2px solid #0d1a80');
    $('.span_province').hide();
});

$('#company_of_employee').on('change',function(){
    $('#company_of_employee').css('border','2px solid #0d1a80');
    $('.span_company_of_employee').hide();
});

$('#branch_of_employee').on('change',function(){
    $('#branch_of_employee').css('border','2px solid #0d1a80');
    $('.span_branch_of_employee').hide();
});

$('#status_of_employee').on('change',function(){
    $('#status_of_employee').css('border','2px solid #0d1a80');
    $('.span_status_of_employee').hide();
});

$('#civil_status').on('change',function(){
    $('#civil_status').css('border','2px solid #0d1a80');
    $('.span_civil_status').hide();
});

$('#shift_of_employee').on('change',function(){
    $('#shift_of_employee').css('border','2px solid #0d1a80');
    $('.span_shift_of_employee').hide();
});

$('#position_of_employee').on('change',function(){
    $('#position_of_employee').css('border','2px solid #0d1a80');
    $('.span_position_of_employee').hide();
});

$('#supervisor_of_employee').on('change',function(){
    $('#supervisor_of_employee').css('border','2px solid #0d1a80');
    $('.span_supervisor_of_employee').hide();
});

$('#date_hired').on('change',function(){
    $('#date_hired').css('border','2px solid #0d1a80');
    $('.span_date_hired').hide();
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
