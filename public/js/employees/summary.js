$('#btnSummary').on('click',function(){
    $('#summaryModal').modal({
        backdrop: 'static',
        keyboard: false
    });

    $('.first_name').html($('#first_name').val());
    $('.middle_name').html($('#middle_name').val());
    $('.last_name').html($('#last_name').val());
    $('.suffix').html($('#suffix').val() ? $('#suffix').val() : 'N/A');
    $('.nickname').html($('#nickname').val());
    $('.birthday').val($('#birthday').val());
    $('#birthday_summary').html(moment($('#birthday').val()).format('MMM. DD, YYYY'));
    setInterval(() => {
        $('.birthday').change();
    }, app_timeout);
    $('.gender').html($('#gender').val());
    $('.barangay').html($('#barangay').val());
    $('.unit').html($('#unit').val() ? $('#unit').val() : 'N/A' );
    $('.lot').html($('#lot').val());
    $('.height').html($('#height').val());
    $('.weight').html($('#weight').val());
    $('.religion').html($('#religion').val());
    $('#civil_status_content').html($('#civil_status').val());
    $('.email_address').html($('#email_address').val());
    $('.telephone_number').html($('#telephone_number').val() ? $('#telephone_number').val() : 'N/A');
    $('.cellphone_number').html($('#cellphone_number').val());
    $('.spouse_name').html($('#spouse_name').val());
    $('.spouse_contact_number').html($('#spouse_contact_number').val());
    $('.spouse_profession').html($('#spouse_profession').val());
    $('.father_name').html($('#father_name').val());
    $('.father_contact_number').html($('#father_contact_number').val());
    $('.father_profession').html($('#father_profession').val() ? $('#father_profession').val() : 'N/A');
    $('.mother_name').html($('#mother_name').val());
    $('.mother_contact_number').html($('#mother_contact_number').val());
    $('.mother_profession').html($('#mother_profession').val() ? $('#mother_profession').val() : 'N/A');
    $('.emergency_contact_name').html($('#emergency_contact_name').val());
    $('.emergency_contact_relationship').html($('#emergency_contact_relationship').val());
    $('.emergency_contact_number').html($('#emergency_contact_number').val());

    //Work Information
    $('.employee_number').html($('#employee_number').val());
    $('.employee_company').html($('#employee_company option:selected').text());
    $('.employee_department').html($('#employee_department option:selected').text());
    $('.employee_branch').html($('#employee_branch option:selected').text());
    $('.employee_shift').html($('#employee_shift option:selected').text());
    $('.employee_supervisor').html($('#employee_supervisor option:selected').text());
    $('.employee_position').html($('#employee_position option:selected').text());

    $('.employment_status').html($('#employment_status').val());
    $('.employment_origin').html($('#employment_origin').val());
    $('#date_hired_summary').html(moment($('#date_hired').val()).format('MMM. DD, YYYY'));
    $('.company_email_address').html($('#company_email_address').val() ? $('#company_email_address').val() : 'N/A');
    $('.company_contact_number').html($('#company_contact_number').val() ? $('#company_contact_number').val() : 'N/A');

    $('#summaryModal').modal('show');
});

$(document).on('click','#close_summary',function(){
    
    // window.location.href = "/employees?employee_number="+$('#current_employee').val();
});