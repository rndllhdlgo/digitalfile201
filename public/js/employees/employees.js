
// $(document).ready( function () { //The ready() method specifies what happens when a ready event occurs.
//     $('#childrenDataTable').DataTable(
//       {
//         dom:'lfrtip',
//         processing:true,
//         serverSide:false,
//         ajax: {
//         //route-name
//         url: '/employees/childrenDataTable',
//       },
//       //data column name
//       columns: [
//           {data: 'child_name'},
//           {data: 'child_birthday'},
//           {data: 'child_gender'}
//       ]
//       }
//   );    
// });

// var go = true, $lvl = $('.lvl');
// $(window).bind("beforeunload",function(event) {
//     if(go) return "You have unsaved changes";
// });

//Create New Employee Function
$('#addEmployeeBtn').on('click',function(){
    $('#employee_personal_information').fadeIn();
    $('#employees_list').hide();
    $('#addEmployeeBtn').hide();
    $('#btnEnableEdit').hide();
    $('#navigation').show();
    $('#tab1').addClass('tabactive');
    $('#resigned').hide();
    $('#spouse_contact_number').val('');

    $('#title_details').removeClass('alert-info');
    $('#title_details').addClass('alert-warning');
    $('#title_details').html('<i class="fa-solid fa-circle-exclamation"></i> <b> NOTE:</b> All fields are <b>required</b> unless specified <b>optional</b>.');
});

//Check all required field function
setInterval(checkforblank,0);
function checkforblank(){
    if($('.required_field').filter(function(){ return !!this.value; }).length < $(".required_field").length 
    || $('#first_name').val().length < 2
    || $('#last_name').val().length < 2
    || $('#middle_name').val().length < 2
    || $('#father_name').val().length < 2
    || $('#mother_name').val().length < 2
    || $('#emergency_contact_name').val().length < 2
    || $('#cellphone_number').val().length < 11
    // || $('#father_contact_number').val().length < 11
    // || $('#mother_contact_number').val().length < 11
    || $('#emergency_contact_number').val().length < 11
    // || $('#company_contact_number').val().length < 11
    || !email_address.value.match(regExp)
    // || !company_email_address.value.match(regExp)
    || $('#employee_number').hasClass('check_duplicate')
    || $('#email_address').hasClass('check_duplicate')
    || $('#telephone_number').hasClass('check_duplicate')
    || $('#cellphone_number').hasClass('check_duplicate')
    || $('#father_contact_number').hasClass('check_duplicate')
    || $('#mother_contact_number').hasClass('check_duplicate')
    || $('#spouse_contact_number').hasClass('check_duplicate')
    || $('#emergency_contact_number').hasClass('check_duplicate')
    || $('#company_email_address').hasClass('check_duplicate')
    || $('#company_contact_number').hasClass('check_duplicate')
    ){
        $('#title_details').show();
        $('#btnSave').prop("disabled",true);
    }
    else{
        $('#title_details').hide();
        $('#btnSave').prop("disabled",false);
    }
}

//Hide/Show (Civil Status, Solo Parent) Section Function
    function changeStatus(){
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
  
        if($('#employee_status').val() == "Regular" || $('#employee_status').val() == "Intern" || $('#employee_status').val() == 'Probationary'){
            $('#benefits').show();
        }
        else if($('#employee_status').val() == 'Resign'){
                $('.resignation-table').show();
                $('.termination-table').hide();
                $('#benefits').hide();
        }
        else if($('#employee_status').val() == 'Terminate'){
                $('.termination-table').show();
                $('.resignation-table').hide();
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

//Close Preview Image Function
$('#image_close').on('click',function(){
    $('#employee_image').val(''); //Remove the image inserted
    $('#image_preview').attr('src',''); //Remove current preview
    $('#image_preview').hide();
    $('#image_close').hide();
    $('#image_user').show();
    $('#image_button').show();
    $('.column-1').css("height","250px");
    $('#employee_image').click();
});

//Disable future dates/ Date Hired Function
$(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 0){
        month = '0' + month.toString();
    }
    if(day < 10){
        day = '0' + day.toString();
    }
    var maxDate = year + '-' + month + '-' + day;
    $('#date_hired').attr('max', maxDate);
    $('#child_birthday').attr('max', maxDate);
    $('#memo_date').attr('max', maxDate);
    $('#evaluation_date').attr('max', maxDate);
    $('#contracts_date').attr('max', maxDate);
    $('#resignation_date').attr('max', maxDate);
    $('#termination_date').attr('max', maxDate);
});

//Disable Birthday Under 18
$(function(){
    var dtTodays = new Date();
    var months = dtTodays.getMonth() + 1;// jan=0; feb=1
    var days = dtTodays.getDate();
    var years = dtTodays.getFullYear() - 18;
    if(months < 10)
        months = '0' + months.toString();
    if(days < 10)
        days = '0' + days.toString();
    var minDates = years + '-' + months + '-' + days;
    var maxDates = years + '-' + months + '-' + days;
    $('#birthday').attr('max', maxDates);
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
                // $('ul.job_description_div').append('<p class="h3"> <br>'+value.job_position_name+'</p>');
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
    $('#employee_number').val('50006');
    $('#employee_company').val('Phillogix Systems, Inc.');
    $('#employee_branch').val('San Juan');
    $('#employee_status').val('Probationary');
    $('#employee_position').val('Web Developer');
    $('#employee_supervisor').val('Gerard Mallari');
    $('#employee_shift').val('A9 08:30AM-17:30PM WITH BREAK 11:30AM-12:30PM');
    $('#company_email_address').val('rendellhidalgo11@gmail.com');
    $('#company_contact_number').val('09322003718');
    $('#employee_salary').val('15,000');
    $('#employee_incentives').val('1');
    $('#employee_overtime_pay').val('1');
    $('#employee_bonus').val('1');
    $('#sss_number').val('1');
    $('#pag_ibig_number').val('2');
    $('#philhealth_number').val('3');
    $('#tin_number').val('4');
    $('#account_number').val('5');
    $('#secondary_school_name').val('Florentino Torres High School');
    $('#secondary_school_address').val('Torres');
    $('#secondary_school_inclusive_years').val('2012-2016');
    $('#primary_school_name').val('Lakandula Elementary School');
    $('#primary_school_address').val('Lakandula');
    $('#primary_school_inclusive_years').val('2006-2012');
//Optional Field
    $('#telephone_number').val('1231243');
    $('#father_contact_number').val('09322003718');
    $('#mother_contact_number').val('09322003718');
    $('#college_name').val('Universidad De Manila');
    $('#college_degree').val('BTVTE Major in CPT');
    $('#college_inclusive_years').val('2018-2022');
});
