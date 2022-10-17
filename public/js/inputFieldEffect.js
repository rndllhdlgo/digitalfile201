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
        $('.span_street_address').hide();
    }
    else{
        $('.span_street_address').show();
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
