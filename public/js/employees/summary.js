$('#btnSummary').on('click',function(){
    $('#summaryModal').modal({
        backdrop: 'static',
        keyboard: false
    });

    $('.first_name').html($('#first_name').val());
    $('.middle_name').html($('#middle_name').val());
    $('.last_name').html($('#last_name').val());
    $('.suffix').html($('#suffix').val());
    $('.nickname').html($('#nickname').val());
    $('.birthday').val($('#birthday').val());
    setInterval(() => {
        $('.birthday').change();
    }, app_timeout);
    $('.gender').html($('#gender').val());
    $('.barangay').html($('#barangay').val());
    $('.unit').html($('#unit').val());
    $('.lot').html($('#lot').val());
    $('.height').html($('#height').val());
    $('.weight').html($('#weight').val());
    $('.religion').html($('#religion').val());
    $('.civil_status').val($('#civil_status').val());
    setInterval(() => {
        $('.civil_status').change();
    }, app_timeout);

    $('.email_address').html($('#email_address').val());
    $('.telephone_number').html($('#telephone_number').val());
    $('.cellphone_number').html($('#cellphone_number').val());
    $('.spouse_name').html($('#spouse_name').val());
    $('.spouse_contact_number').html($('#spouse_contact_number').val());
    $('.spouse_profession').html($('#spouse_profession').val());
    $('.father_name').html($('#father_name').val());
    $('.father_contact_number').html($('#father_contact_number').val());
    $('.father_profession').html($('#father_profession').val());
    $('.mother_name').html($('#mother_name').val());
    $('.mother_contact_number').html($('#mother_contact_number').val());
    $('.mother_profession').html($('#mother_profession').val());
    $('.emergency_contact_name').html($('#emergency_contact_name').val());
    $('.emergency_contact_relationship').html($('#emergency_contact_relationship').val());
    $('.emergency_contact_number').html($('#emergency_contact_number').val());

    $('#summaryModal').modal('show');
    
    
});