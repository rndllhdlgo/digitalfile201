$('#btnSummary').on('click',function(){
    $('#summaryModalForm').modal('show');
    // $('.font_weight').css('text-transform','uppercase');
});

$('#viewSummary').on('click', function(){
    $('.job_desc_div, .job_req_div').empty();
    $('.college_school_name, .college_school_degree, .college_years').empty();
    $('.training_school_name, .training_title, .training_years').empty();
    $('.vocational_school_name, .vocational_course, .vocational_years').empty();
    $('.job_history_summary_div').empty();

        $.ajax({
            type: 'GET',
            url: '/setJobDescription',
            data:{
                id: $('#employee_position').val()
            },
            success: function(data){
                if(data.length > 0){
                    var job_description = data[0].job_description;
                    var job_description_details = job_description.split('•');
                    for(var i=0; i < job_description_details.length; i++){
                        if(job_description_details[i]){
                            $('.job_desc_div').append('<p>' + job_description_details[i] + '</p>');
                        }
                    }
                    $('.job_desc_div p:not(:first-child)').hide();
                    // $('.job_desc_div').append('<button type="button" class="button print-only" id="see_more" style="zoom:80%;"> <span id="see_more_span"> </span> <i class="fa-solid fa-arrow-right"></i> </button>');
                    // $('#see_more_span').html('SEE MORE');

                    var job_requirements = data[0].job_requirements;
                    var job_requirements_details = job_requirements.split('•');
                    for(var j=0; j < job_requirements_details.length; j++){
                        if(job_requirements_details[j]){
                            $('.job_req_div').append('<p>' + job_requirements_details[j] + '</p>');
                        }
                    }
                    $('.job_req_div p:not(:first-child)').hide();
                }
            }
        });

        $.ajax({
            method: 'GET',
            url: '/college_summary/data',
            data: {
                id: $('#hidden_id').val(),
            },
            success: function (data) {
                if(data.length > 0){
                    for(var college_content = 0; college_content < data.length; college_content++){
                        var college_name = data[college_content].college_name;
                        var college_degree = data[college_content].college_degree;
                        var college_from = data[college_content].college_inclusive_years_from;
                        var college_to = data[college_content].college_inclusive_years_to;

                        var college_school_name = $('.college_school_name').append(college_name + "<br>");
                        var college_school_degree = $('.college_school_degree').append(college_degree + "<br>");
                        var college_years = $('.college_years').append(moment(college_from).format('MMM. YYYY') + "<b> -> </b>" + moment(college_to).format('MMM. YYYY') + "<br>");
                    }
                    $('.college_div').show();
                }
                else{
                    $('.college_div').hide();
                }
            }
        });

        $.ajax({
            method: 'GET',
            url: '/training_summary/data',
            data: {
                id: $('#hidden_id').val(),
            },
            success: function (data){
                if(data.length > 0){
                    for(var training_content = 0; training_content < data.length; training_content++){
                        var training_name = data[training_content].training_name;
                        var training_title = data[training_content].training_title;
                        var training_from = data[training_content].training_inclusive_years_from;
                        var training_to = data[training_content].training_inclusive_years_to;

                        var training_school_name = $('.training_school_name').append(training_name + "<br>");
                        var training_school_title = $('.training_title').append(training_title + "<br>");
                        var training_years = $('.training_years').append(moment(training_from).format('MMM. YYYY') + "<b> -> </b>" + moment(training_to).format('MMM. YYYY') + "<br>");
                    }
                    $('.training_div').show();
                }
                else{
                    $('.training_div').hide();
                }
            }
        });

        $.ajax({
            method: 'GET',
            url: '/vocational_summary/data',
            data: {
                id: $('#hidden_id').val(),
            },
            success: function (data) {
                if(data.length > 0){
                    for(var vocational_content = 0; vocational_content < data.length; vocational_content++){
                        var vocational_name = data[vocational_content].vocational_name;
                        var vocational_course= data[vocational_content].vocational_course;
                        var vocational_from = data[vocational_content].vocational_inclusive_years_from;
                        var vocational_to = data[vocational_content].vocational_inclusive_years_to;

                        var vocational_school_name = $('.vocational_school_name').append(vocational_name + "<br>");
                        var vocational_school_course = $('.vocational_course').append(vocational_course + "<br>");
                        var vocational_years = $('.vocational_years').append(moment(vocational_from).format('MMM. YYYY') + "<b> -> </b>" + moment(vocational_to).format('MMM. YYYY') + "<br>");
                    }
                    $('.vocational_div').show();
                }
                else{
                    $('.vocational_div').hide();
                }
            }
        });

        $.ajax({
            method: 'GET',
            url: '/job_history_summary/data',
            data: {
                id: $('#hidden_id').val(),
            },
            success: function (data) {
                if(data.length > 0){
                    for(var job_content = 0; job_content < data.length; job_content++){
                        var job_company_name = data[job_content].job_company_name;
                        var job_description = data[job_content].job_description;
                        var job_position = data[job_content].job_position;
                        var job_contact_number = data[job_content].job_contact_number;
                        var job_inclusive_years_from = data[job_content].job_inclusive_years_from;
                        var job_inclusive_years_to = data[job_content].job_inclusive_years_to;

                        var job_years = $('<div class="col-3">').append($('<b><span>').html(moment(job_inclusive_years_from).format('MMM. YYYY') + " - ").append($('<span>').html(moment(job_inclusive_years_to).format('MMM. YYYY') + " -> </b>")));
                        var job_details = $('<div class="col-3 mb-2">').html("<b>" + job_company_name + "</b><br><i>" + job_position + "</i><br>" + job_contact_number + "<br> - " + job_description);
                        $('#job_history_summary_div').append(job_years,job_details);
                    }
                    $('.column_nine').show();
                }
                else{
                    $('.column_nine').hide();
                }
            }
        });

    $(document).on('click','#see_more',function(){
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

    // Personal Information
    $('.first_name').html($('#first_name').val());
    $('.middle_name').html($('#middle_name').val());
    $('.last_name').html($('#last_name').val());
    $('.suffix').html($('#suffix').val());
    $('.nickname').html($('#nickname').val());
    $('.gender').html($('#gender').val());
    $('.birthday').val($('#birthday').val());
    $('#birthday_summary').html(moment($('#birthday').val()).format('MMM. DD, YYYY'));
    setTimeout(() => {$('.birthday').change();}, app_timeout);
    $('.height').html($('#height').val());
    $('.weight').html($('#weight').val());
    $('#civil_status_content').html($('#civil_status').val());
    $('.religion').html($('#religion').val());

    // Home Address
    $('.address').html($('#address').val());

    // Contact Details
    $('.email_address').html($('#email_address').val());
    $('.telephone_number').html($('#telephone_number').val());
    $('.cellphone_number').html($('#cellphone_number').val());
    $('.father_name').html($('#father_name').val());
    $('.father_contact_number').html($('#father_contact_number').val());
    $('.father_profession').html($('#father_profession').val());
    $('.mother_name').html($('#mother_name').val());
    $('.mother_contact_number').html($('#mother_contact_number').val());
    $('.mother_profession').html($('#mother_profession').val());
    $('.spouse_name').html($('#spouse_name').val());
    $('.spouse_contact_number').html($('#spouse_contact_number').val());
    $('.spouse_profession').html($('#spouse_profession').val());
    $('.emergency_contact_name').html($('#emergency_contact_name').val());
    $('.emergency_contact_relationship').html($('#emergency_contact_relationship').val());
    $('.emergency_contact_number').html($('#emergency_contact_number').val());

    //Work Information
    $('.employee_number').html($('#employee_number').val());
    $('#date_hired_summary').html(moment($('#date_hired').val()).format('MMM. DD, YYYY'));
    $('#date_hired_summary').html($('#date_hired_summary').html() === 'Invalid date' ? '' : $('#date_hired_summary').html());
    $('.employee_company').html($('#employee_company option:selected').text());
    $('.employee_company').html($('.employee_company').html() === 'SELECT COMPANY' ? '' : $('.employee_company').html());
    $('.employee_branch').html($('#employee_branch option:selected').text());
    $('.employee_branch').html($('.employee_branch').html() === 'SELECT BRANCH' ? '' : $('.employee_branch').html());
    $('.employee_department').html($('#employee_department option:selected').text());
    $('.employee_department').html($('.employee_department').html() === 'SELECT DEPARTMENT' ? '' : $('.employee_department').html().toUpperCase());
    $('.employee_position').html($.trim($('#employee_position option:selected').text()));
    $('.employee_position').html($('.employee_position').html() === 'SELECT POSITION' ? '' : $('.employee_position').html());
    $('.employment_status').html($('#employment_status').val());
    $('.employment_origin').html($('#employment_origin').val());
    $('.company_email_address').html($('#company_email_address').val());
    $('.company_contact_number').html($('#company_contact_number').val());
    $('.sss_number').html($('#sss_number').val());
    $('.pag_ibig_number').html($('#pag_ibig_number').val());
    $('.philhealth_number').html($('#philhealth_number').val());
    $('.tin_number').html($('#tin_number').val());

    $('.past_medical_condition').html($('#past_medical_condition').val());
    $('.past_medical_condition').attr('rows', $('.past_medical_condition').val().split('\n').length);
    $('.allergies').html($('#allergies').val());
    $('.allergies').attr('rows', $('.allergies').val().split('\n').length);
    $('.medication').html($('#medication').val());
    $('.medication').attr('rows', $('.medication').val().split('\n').length);
    $('.psychological_history').html($('#psychological_history').val());
    $('.psychological_history').attr('rows', $('.psychological_history').val().split('\n').length);

    $('.secondary_school_name').html($('#secondary_school_name').val());
    $('.secondary_school_address').html($('#secondary_school_address').val());
    $('.secondary_from').html(moment($('#secondary_school_inclusive_years_from').val()).format('MMM. YYYY') + "<b> -> </b>");
    $('.secondary_to').html(moment($('#secondary_school_inclusive_years_to').val()).format('MMM. YYYY'));
    $('.primary_school_name').html($('#primary_school_name').val());
    $('.primary_school_address').html($('#primary_school_address').val());
    $('.primary_from').html(moment($('#primary_school_inclusive_years_from').val()).format('MMM. YYYY') + "<b> -> </b>");
    $('.primary_to').html(moment($('#primary_school_inclusive_years_to').val()).format('MMM. YYYY'));

    $('#summaryModal').modal('show');
    $('#summaryModalForm').modal('hide');
});

$(document).ready(function(){
    $("#checkbox4").change(function(){
        if($("#checkbox4").is(":checked")){
            $(".column_seven").show();
        }
        else{
            $(".column_seven").hide();
        }
    });
    $("#checkbox5").change(function(){
        if($("#checkbox5").is(":checked")){
            $(".column_eight").show();
        }
        else{
            $(".column_eight").hide();
        }
    });
    $("#checkbox6").change(function(){
        if($("#checkbox6").is(":checked")){
            $(".column_nine").show();
        }
        else{
            $(".column_nine").hide();
        }
    });
    $("#checkbox7").change(function(){
        if($("#checkbox7").is(":checked")){
            $(".column_ten").show();
        }
        else{
            $(".column_ten").hide();
        }
    });
});

$('#btnSection').on('click',function(){
    $('#summaryModalForm').modal('show');
    $('#summaryModal').modal('hide');
});

// Print in summary
$(document).ready(function(){
    $('#btnPdf').click(function(){
        $('#see_more').click();
        $('#print_file').printThis({
            importCSS: true,
            beforePrint:function(){
                var printTitleName = $('#employee_number').val() + '_' + $('#last_name').val() + ', ' + $('#first_name').val() + ' ' + ($('#middle_name').val() ? $('#middle_name').val() : '');
                $('title').text(printTitleName);
            },
            afterPrint:function(){
                var headerText = $('.my-header').text();
                $('title').text('201 FILING SYSTEM | ' + headerText);
            }
        });
    });
});