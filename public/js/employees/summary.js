$('#btnSummary').on('click',function(){
    $('ul.job_desc_div').empty();
    $('ul.job_req_div').empty();
    
    $.ajax({
        type: 'GET',
        url: '/setJobDescription',
        data:{
            id: $('#employee_position').val()
        },
        success: function(data){
            var job_description = data[0].job_description;
            var job_description_details = job_description.split('•');
            for(var i=0; i < job_description_details.length; i++){
                if(job_description_details[i]){
                    $('.job_desc_div').append('<p>' + job_description_details[i] + '</p>');
                }
            }
            $('.job_desc_div p:not(:first-child)').hide();
            $('.job_desc_div').append('<button type="button" class="button print-only" id="see_more"> <span id="see_more_span"> </span> <i class="fa-solid fa-arrow-right"></i> </button>');
            $('#see_more_span').html('SEE MORE');

            var job_requirements = data[0].job_requirements;
            var job_requirements_details = job_requirements.split('•');
            for(var j=0; j < job_requirements_details.length; j++){
                if(job_requirements_details[j]){
                    $('.job_req_div').append('<p>' + job_requirements_details[j] + '</p>');
                }
            }
            $('.job_req_div p:not(:first-child)').hide();
        }
    });

    $(document).on('click','#see_more',function() {
        $('#see_more').attr('id','see_less');
        $('#see_more_span').html('SEE LESS');
        $('.fa-arrow-right').removeClass('fa-arrow-right').addClass('fa-arrow-up');
        $('.job_desc_div p:not(:first-child)').fadeIn();
        $('.job_req_div p:not(:first-child)').fadeIn();
    });
    $(document).on('click','#see_less',function(){
        $('#see_less').attr('id','see_more');
        $('#see_more_span').html('SEE MORE');
        $('.fa-arrow-up').removeClass('fa-arrow-up').addClass('fa-arrow-right');
        $('.job_desc_div p:not(:first-child)').fadeOut();
        $('.job_req_div p:not(:first-child)').fadeOut();
    });

    $('.first_name').html($('#first_name').val());
    $('.middle_name').html($('#middle_name').val());
    $('.last_name').html($('#last_name').val());
    // $('.suffix').html($('#suffix').val() ? $('#suffix').val() : 'N/A');
    if ($('#suffix').val()){
        $('.suffix').html($('#suffix').val());
    }
    else{
        $('#suffix_div').hide();
        $('.suffix').hide();
    }
    $('.nickname').html($('#nickname').val());
    $('.birthday').val($('#birthday').val());
    $('#birthday_summary').html(moment($('#birthday').val()).format('MMM. DD, YYYY'));
    setTimeout(() => {
        $('.birthday').change();
    }, app_timeout);
    $('.gender').html($('#gender').val());
    $('.address').html($('#address').val());
    $('.height').html($('#height').val());
    $('.weight').html($('#weight').val());
    $('.religion').html($('#religion').val());
    $('#civil_status_content').html($('#civil_status').val());
    $('.email_address').html($('#email_address').val());
    // $('.telephone_number').html($('#telephone_number').val() ? $('#telephone_number').val() : $('#telephone_number_div').show());
    if ($('#telephone_number').val()){
        $('.telephone_number').html($('#telephone_number').val());
    }
    else{
        $('#telephone_number_div').css("visibility", "hidden");
        $('.telephone_number').hide();
    }
      
    $('.cellphone_number').html($('#cellphone_number').val());
    $('.spouse_name').html($('#spouse_name').val());
    $('.spouse_contact_number').html($('#spouse_contact_number').val());
    $('.spouse_profession').html($('#spouse_profession').val());
    $('.father_name').html($('#father_name').val());
    $('.father_contact_number').html($('#father_contact_number').val());
    // $('.father_profession').html($('#father_profession').val() ? $('#father_profession').val() : 'N/A');
    if ($('#father_profession').val()){
        $('.father_profession').html($('#father_profession').val());
    }
    else{
        $('#father_profession_div').css("visibility", "hidden");;
        $('.father_profession').hide();
    }
    $('.mother_name').html($('#mother_name').val());
    $('.mother_contact_number').html($('#mother_contact_number').val());
    // $('.mother_profession').html($('#mother_profession').val() ? $('#mother_profession').val() : 'N/A');
    if ($('#mother_profession').val()){
        $('.mother_profession').html($('#mother_profession').val());
    }
    else{
        $('#mother_profession_div').css("visibility", "hidden");;
        $('.mother_profession').hide();
    }
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

    $('.hmo_number').html($('#hmo_number').val() ? $('#hmo_number').val() : 'N/A');
    $('.sss_number').html($('#sss_number').val());
    $('.pag_ibig_number').html($('#pag_ibig_number').val());
    $('.philhealth_number').html($('#philhealth_number').val());
    $('.tin_number').html($('#tin_number').val());
    $('.account_number').html($('#account_number').val());

    $('#summaryModal').modal('show');
});



// $(document).on('click','#close_summary',function(){
//     window.location.href = "/employees?employee_number="+$('#current_employee').val();
// });
