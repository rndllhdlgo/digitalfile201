
// var go = true, $lvl = $('.lvl');
// $(window).bind("beforeunload",function(event) {
//     if(go) return "You have unsaved changes";
// });

//Create New Employee Function
$('#addEmployeeBtn').on('click',function(){
    $('#employee_information').fadeIn();
    $('#employees_list').hide();
    $('#addEmployeeBtn').hide();
    $('#btnEnableEdit').hide();
    $('#navigation').show();
    $('#tab1').addClass('tabactive');
    $('#resigned').hide();
    $('#spouse_contact_number').val('');

    $('#title_details').removeClass('alert-info');
    $('#title_details').addClass('alert-warning');
    $('#title_details').html('<i class="fa-solid fa-triangle-exclamation"></i> <b> NOTE:</b> All fields are <b>required</b> unless specified <b>optional</b>.');
});

//Check all required field function
setInterval(checkforblank,0);
function checkforblank(){
    if($('.required_field').filter(function(){ return !!this.value; }).length < $(".required_field").length 
    || $('#first_name').val().length < 2
    || $('#middle_name').val().length < 2
    || $('#last_name').val().length < 2
    || $('#father_name').val().length < 2
    || $('#mother_name').val().length < 2
    || $('#emergency_contact_name').val().length < 2
    || $('#cellphone_number').val().length < 11
    && $('#father_contact_number').val().length < 11
    && $('#mother_contact_number').val().length < 11
    || $('#emergency_contact_number').val().length < 11
    && $('#company_contact_number').val().length < 11
    || !email_address.value.match(regExp)
    && !company_email_address.value.match(regExp)
    || $('#employee_number').hasClass('duplicate_field')
    || $('#email_address').hasClass('duplicate_field')
    || $('#telephone_number').hasClass('duplicate_field')
    || $('#cellphone_number').hasClass('duplicate_field')
    || $('#father_contact_number').hasClass('duplicate_field')
    || $('#mother_contact_number').hasClass('duplicate_field')
    || $('#spouse_contact_number').hasClass('duplicate_field')
    || $('#emergency_contact_number').hasClass('duplicate_field')
    || $('#company_email_address').hasClass('duplicate_field')
    || $('#company_contact_number').hasClass('duplicate_field')
    )
    {
        $('#title_details').show();
        $('#btnSave').prop("disabled",true);    
    }
    else{
        $('#title_details').hide();
        $('#btnSave').prop("disabled",false);
    }
}

// if($('.requiredField:visible').filter(function(){ return !!this.value; }).length < $(".requiredField:visible").length )


//Hide/Show (Civil Status, Solo Parent) Section Function
    function changeCivilStatus(){
        var status = $('#civil_status');

        if($('#civil_status').val() == "Married"){
            $('#spouse').show();
            $('#spouse_name').addClass('required_field');
            $('#spouse_contact_number').addClass('required_field');
            $('#spouse_profession').addClass('required_field');
            $('#solo_parent').hide();
            $('#solo_parent_data_table').hide();
        }
        else if($('#civil_status').val() == "Solo Parent"){
            $('#spouse').hide();
            $('#solo_parent').show();
            $('#spouse_name').val("");
            $('#spouse_contact_number').val("");
            $('#spouse_profession').val("");
        }
        else{
            $('#solo_parent').hide();
            $('#spouse').hide();
            $('#spouse_name').removeClass('required_field');
            $('#spouse_contact_number').removeClass('required_field');
            $('#spouse_profession').removeClass('required_field');
        }
    }

    function changeEmploymentStatus(){
        var employment_status = $('#employee_status');
  
        if($('#employee_status').val() == "Regular" 
        || $('#employee_status').val() == "Intern" 
        || $('#employee_status').val() == 'Probationary'
        || $('#employee_status').val() == 'Part Time'
        || $('#employee_status').val() == 'Retired'
        ){
            $('#benefits').show();
            $('#resignation_div').hide();
            $('#termination_div').hide();
        }
        else if($('#employee_status').val() == 'Resign'){
                $('#resignation_div').show();
                $('#termination_div').hide();
                $('#benefits').hide();
        }
        else if($('#employee_status').val() == 'Terminate'){
                $('#termination_div').show();
                $('#resignation_div').hide();
                $('#benefits').hide();
        }
        else{
            $('#benefits').hide();
        }
    }

//Calculate Age Function
$('#birthday').on('change',function(){
    var today = new Date();
    var birthDate = new Date($('#birthday').val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
    return $('#age').val(age);
});

$('#child_birthday').on('change',function(){
    var today = new Date();
    var birthDate = new Date($('#child_birthday').val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
    return $('#child_age').val(age);
});

$('#image_close').on('click',function(){
    Swal.fire({
        title: 'Do you want to remove image?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((save) => {
        if (save.isConfirmed) {
            $('#employee_image').val(''); //Remove the image inserted
            $('#image_preview').attr('src',''); //Remove current preview
            $('#image_preview').hide();
            $('#image_close').hide();
            $('#image_user').show();
            $('#image_button').show();
            $('.column-1').css("height","250px");
        }
    });
});

//Region,Province,City DropDown Function
$('#region').on('change', function(){
    $('#province').val('');
    $('#city').val('');
    $('#city').find('option').remove().end()
    $('#city').append($('<option value="" selected disabled>SELECT CITY</option>'));
    $.ajax({
        type: 'GET',
        url: '/setprovince',
        data:{
            'regCode': $('#region').val()
        },
        success: function(data){
            $('#province').find('option').remove().end()
            $('#province').append($('<option value="" selected disabled>SELECT PROVINCE</option>'));
            var list = $.map(data, function(value, index){
                return [value];
            });
            list.forEach(value => {
                $('#province').append($('<option>', {
                    value: value.provCode,
                    text: value.provDesc.toUpperCase()
                }));
            });
        }
    });
});

$('#province').on('change', function(){
    $('#city').val('');
    $.ajax({
        type: 'GET',
        url: '/setcity',
        data:{
            'provCode': $('#province').val()
        },
        success: function(data){
            $('#city').find('option').remove().end()
            $('#city').append($('<option value="" selected disabled>SELECT CITY</option>'));
            var list = $.map(data, function(value, index){
                return [value];
            });
            list.forEach(value => {
                $('#city').append($('<option>', {
                    value: value.citymunCode,
                    text: value.citymunDesc.toUpperCase()
                }));
            });
        }
    });
});

$('#viewJobDescriptionBtn').on('click',function(){
    $('ul.job_description_div').empty();
    $('ul.job_requirements_div').empty();
    $('#jobDescriptionModalTitle').empty();

    $.ajax({
        type: 'GET',
        url: '/setJobDescription',
        data:{
            'id': $('#employee_position').val()
        },
        success: function(data){
            var job_description = data[0].job_description;
            var job_requirements = data[0].job_requirements;
            var job_description_details = job_description.split('•');
            var job_requirements_details = job_requirements.split('•');
            for(var i=0; i < job_description_details.length; i++){
                if(job_description_details[i]){
                    $('.job_description_div').append('<li>' + job_description_details[i].replace(/\"/g,'') + '</li>');
                }
            }
            for(var j=0; j < job_requirements_details.length; j++){
                if(job_requirements_details[j]){
                    $('.job_requirements_div').append('<li>' + job_requirements_details[j].replace(/\"/g,'') + '</li>');
                }
            }
        }
    });

    $.ajax({
        type: 'GET',
        url: '/setJobPosition',
        data:{
            'id': $('#employee_position').val()
        },
        success: function(data){
            var list = $.map(data, function(value, index){
                return [value];
            });
            list.forEach(value => {
                $('#jobDescriptionModalTitle').append(value.job_position_name);
            });
        }
    });
    $('#viewJobDescriptionModal').modal({
        backdrop: 'static',
        keyboard: false
    });

    $('#viewJobDescriptionModal').modal('show');
});


//Fill All Function
$('#title_details').on('click',function(){
//Required Field
    $('#first_name').val('Rendell');
    $('#middle_name').val('Mendez');
    $('#last_name').val('Hidalgo');
    $('#nickname').val('Dell');
    $('#street').val('West Antipolo Street');
    $('#gender').val('Male');
    $('#height').val('5"3');
    $('#weight').val('55kgs');
    $('#religion').val('Catholic');
    $('#civil_status').val('Single');
    $('#email_address').val('rendellhidalgo11@gmail.com');
    $('#cellphone_number').val('09322003718');
    $('#father_name').val('Reynaldo Hidalgo');
    $('#father_profession').val('Utility Worker');
    $('#mother_name').val('Marlyn Hidalgo');
    $('#mother_profession').val('House Wife');
    $('#emergency_contact_name').val('Marlyn Hidalgo');
    $('#emergency_contact_relationship').val('Mother');
    $('#emergency_contact_number').val('09322003718');
    // $('#employee_number').val('50006');
    // $('#employee_company').val('Phillogix Systems, Inc.');
    // $('#employee_branch').val('San Juan');
    // $('#employee_position').val('Web Developer');
    // $('#employee_supervisor').val('Gerard Mallari');
    // $('#employee_shift').val('A9 08:30AM-17:30PM WITH BREAK 11:30AM-12:30PM');
    // $('#company_email_address').val('rendellhidalgo11@gmail.com');
    // $('#company_contact_number').val('09322003718');
    // $('#employee_salary').val('15,000');
    // $('#employee_incentives').val('1');
    // $('#employee_overtime_pay').val('1');
    // $('#employee_bonus').val('1');
    // $('#sss_number').val('1');
    // $('#pag_ibig_number').val('2');
    // $('#philhealth_number').val('3');
    // $('#tin_number').val('4');
    // $('#account_number').val('5');
    // $('#primary_school_name').val('Lakandula Elementary School');
    // $('#primary_school_address').val('Lakandula');
    // $('#primary_school_inclusive_years').val('2006-2012');
//Optional Field
    // $('#telephone_number').val('1231243');
    $('#father_contact_number').val('09322003718');
    $('#mother_contact_number').val('09322003718');
    $('#college_name').val('Universidad De Manila');
    $('#college_degree').val('BTVTE Major in CPT');
    $('#college_inclusive_years').val('2018-2022');
    $('#secondary_school_name').val('Florentino Torres High School');
    $('#secondary_school_address').val('Torres');
    $('#secondary_school_inclusive_years').val('2012-2016');
    // $('#training_name').val('Sample');
    // $('#training_title').val('Sample');
    // $('#training_inclusive_years').val('1');
    // $('#vocational_name').val('Sample');
    // $('#vocational_course').val('Sample');
    // $('#vocational_inclusive_years').val('1');
    // $('#job_name').val('Sample');
    // $('#job_position').val('Sample');
    // $('#job_address').val('Sample');
    // $('#job_contact_details').val('1');
    // $('#job_inclusive_years').val('1');
    
});

// $('input#employee_bonus').on('blur', function() {
//     const value = this.value.replace(/,/g, '');
//     this.value = parseFloat(value).toLocaleString('en-PH', {
//         style: 'decimal',
//         maximumFractionDigits: 2,
//         minimumFractionDigits: 2
//     });
// });

//Currency Format
var formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'PHP',
  });
  
  $('#employee_salary').on('change', (e)=>{
      e.target.value = formatter.format(e.target.value);
  });
  $('#employee_incentives').on('change', (e)=>{
      e.target.value = formatter.format(e.target.value);
  });
  $('#employee_overtime_pay').on('change', (e)=>{
      e.target.value = formatter.format(e.target.value);
  });
  $('#employee_bonus').on('change', (e)=>{
      e.target.value = formatter.format(e.target.value);
  });

// $(function(){
//     $('#employee_salary').inputmask({
//         alias: 'currency',
//         digits: 0,
//         rightAlign: 0,
//         placeholder: '',
//         clearMaskOnLostFocus: true
//       });
// });

$("input[type='date']").keydown(function (event) { event.preventDefault(); });
