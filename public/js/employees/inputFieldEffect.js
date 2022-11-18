//This JS page is for the input field effects and validations

//Personal Information Tab
//Input field minimum length validation
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

//Input type number
$('#spouse_contact_number').on('keyup',function(){
    if($('#spouse_contact_number').val().length < 11){
        $('#spouse_contact_number_validation').show();
    }
    else{
        $('#spouse_contact_number_validation').hide();
    }
});

$('#cellphone_number').on('keyup',function(){
    if($('#cellphone_number').val().length < 11){
        $('#cellphone_number_validation').show();
    }
    else{
        $('#cellphone_number_validation').hide();
    }
});

$('#father_contact_number').on('keyup',function(){
    if($('#father_contact_number').val().length < 11){
        $('#father_contact_number_validation').show();
    }
    else{
        $('#father_contact_number_validation').hide();
    }
});

$('#mother_contact_number').on('keyup',function(){
    if($('#mother_contact_number').val().length < 11){
        $('#mother_contact_number_validation').show();
    }
    else{
        $('#mother_contact_number_validation').hide();
    }
});

$('#emergency_contact_number').on('keyup',function(){
    if($('#emergency_contact_number').val().length < 11){
        $('#emergency_contact_number_validation').show();
    }
    else{
        $('#emergency_contact_number_validation').hide();
    }
});

$('#employee_contact_number').on('keyup',function(){
    if($('#employee_contact_number').val().length < 11){
        $('#employee_contact_number_validation').show();
    }
    else{
        $('#employee_contact_number_validation').hide();
    }
});