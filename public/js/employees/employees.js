var employeesTable,employee_image_change;
$(document).ready(function(){
    if(current_location == '/employees?employment_status=probationary'){
        $('#head_title').html('- PROBATIONARY');
        var filter = 'probationary';
    }
    else if(current_location == '/employees?employment_status=regular'){
        $('#head_title').html('- REGULAR');
        var filter = 'regular';
    }
    else if(current_location == '/employees?employment_status=part_time'){
        $('#head_title').html('- PART TIME');
        var filter = 'part_time';
    }
    else if(current_location == '/employees?employment_status=agency'){
        $('#head_title').html('- AGENCY');
        var filter = 'agency';
    }
    else if(current_location == '/employees?employment_status=intern'){
        $('#head_title').html('- INTERN');
        var filter = 'intern';
    }
     
    var iLength = current_user_level == 'EMPLOYEE' ? -1 : 10;
    
    employeesTable = $('table.employeesTable').DataTable({
        dom:'l<"breakspace">trip',
        language:{
            info: "\"Showing _START_ to _END_ of _TOTAL_ Employees\"",
            lengthMenu:"Show _MENU_ Employees",
            emptyTable:"No Employees Data Found!",
            loadingRecords: "Loading Employee Records...",
        },
        aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        iDisplayLength: iLength,
        processing:true,
        serverSide:false,
        ajax: {
            url: '/employees/listOfEmployees',
            data:{
                filter:filter
            },
        },
        // order:[1,'asc'],
        order:[0,'desc'],
        columns:[
            {
                data: 'employee_number',
                "render": function(data, type, row){
                    return "<span class="+row.employee_number+">"+row.employee_number+"</span>";
                }
            },
            {
                data: null,
                "render": function(data,type,row){
                    return row.last_name + ', ' + row.first_name + ' ' + row.middle_name;
                }
            },
            // {data: 'employee_number'},
            // {data: 'last_name'},
            // {data: 'first_name'},
            // {data: 'middle_name'},
            {data: 'employee_position'},
            {data: 'employee_branch'},
            {data: 'employment_status'}
        ],
        initComplete: function(){
            if(current_user_level == 'EMPLOYEE'){
                $.ajax({
                    url: "/employees/status",
                    success: function(data){
                        if(data == 'PENDING'){
                            $('#loading').hide();
                            Swal.fire({
                                title: "PENDING UPDATE",
                                html: '<div style="font-family: Century Gothic, cursive;">You have a pending update. Please contact HR for the approval or cancellation of your pending update.</div>',
                                icon: "warning",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'LOGOUT'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/logout';
                                }
                            });
                        }
                        else{
                            $('.'+current_employee_number).closest('tr').click();
                        }
                    }
                });
            }
            else{
                $('#employees_list').show();
                $('#loading').hide();
            }
        }
    });
    $('div.breakspace').html('<br><br>');
});

$('.filter-input').on('keyup search', function(){
    employeesTable.column($(this).data('column')).search($(this).val()).draw();
});

$('#addEmployeeBtn').on('click',function(){
    $('#employee_information').fadeIn();
    $('#employees_list').hide();
    $('#addEmployeeBtn').hide();
    $('#btnUpdate').hide();
    $('#btnSummary').hide();
    $('#navigation').show();
    $('#tab1').addClass('tabactive');
    $('#spouse_contact_number').val('');

    $('#employee_shift').chosen();
    $('#employee_shift_chosen').css({
        'width':'100%',
        'font-weight':'500',
        'font-size':'13px',
        'font-family':'Arial, Helvetica, sans-serif'
    });

    $('#employee_company').chosen();
    $('#employee_company_chosen').css({
        'width':'100%',
        'font-weight':'500',
        'font-size':'13px',
        'font-family':'Arial, Helvetica, sans-serif'
    });

    $('#employee_branch').chosen();
    $('#employee_branch_chosen').css({
        'width':'100%',
        'font-weight':'500',
        'font-size':'13px',
        'font-family':'Arial, Helvetica, sans-serif'
    });

    $('#employee_department').chosen();
    $('#employee_department_chosen').css({
        'width':'100%',
        'font-weight':'500',
        'font-size':'13px',
        'font-family':'Arial, Helvetica, sans-serif'
    });

    $('#employee_position').chosen();
    $('#employee_position_chosen').css({
        'width':'100%',
        'font-weight':'500',
        'font-size':'13px',
        'font-family':'Arial, Helvetica, sans-serif'
    });

    $('#employment_status').chosen();
    $('#employment_status_chosen').css({
        'width':'100%',
        'font-weight':'500',
        'font-size':'13px',
        'font-family':'Arial, Helvetica, sans-serif'
    });

    $('#employment_origin').chosen();
    $('#employment_origin_chosen').css({
        'width':'100%',
        'font-weight':'500',
        'font-size':'13px',
        'font-family':'Arial, Helvetica, sans-serif'
    });

    // $('.input-file-text').addClass('required_field');
});

setInterval(() => {
    if(!$('#employee_shift').val()){
        $('#employee_shift_chosen').addClass('required_field');
        $('#employee_shift').addClass('required_field');
    }
    else{
        $('#employee_shift_chosen').removeClass('required_field border border-danger');
        $('#employee_shift').removeClass('required_field');
    }

    if(!$('#employee_company').val()){
        $('#employee_company_chosen').addClass('required_field');
        $('#employee_company').addClass('required_field');
    }
    else{
        $('#employee_company_chosen').removeClass('required_field border border-danger');
        $('#employee_company').removeClass('required_field');
    }

    if(!$('#employee_branch').val()){
        $('#employee_branch_chosen').addClass('required_field');
        $('#employee_branch').addClass('required_field');
    }
    else{
        $('#employee_branch_chosen').removeClass('required_field border border-danger');
        $('#employee_branch').removeClass('required_field');
    }

    if(!$('#employee_department').val()){
        $('#employee_department_chosen').addClass('required_field');
        $('#employee_department').addClass('required_field');
    }
    else{
        $('#employee_department_chosen').removeClass('required_field border border-danger');
        $('#employee_department').removeClass('required_field');
    }

    if(!$('#employee_position').val()){
        $('#employee_position_chosen').addClass('required_field');
        $('#employee_position').addClass('required_field');
    }
    else{
        $('#employee_position_chosen').removeClass('required_field border border-danger');
        $('#employee_position').removeClass('required_field');
    }

    if(!$('#employment_status').val()){
        $('#employment_status_chosen').addClass('required_field');
        $('#employment_status').addClass('required_field');
    }
    else{
        $('#employment_status_chosen').removeClass('required_field border border-danger');
        $('#employment_status').removeClass('required_field');
    }

    if(!$('#employment_origin').val()){
        $('#employment_origin_chosen').addClass('required_field');
        $('#employment_origin').addClass('required_field');
    }
    else{
        $('#employment_origin_chosen').removeClass('required_field border border-danger');
        $('#employment_origin').removeClass('required_field');
    }
}, 0);

function changeCivilStatus(){
    var status = $('#civil_status');
    if($('#civil_status').val() == "MARRIED"){
        $('#spouse').show();
        $('#spouse_name').addClass('required_field');
        $('#spouse_contact_number').addClass('required_field');
        $('.children_information').hide();
        $('#children_table').hide();
        
        $('#spouse_summary_div').show();
    }
    else if($('#civil_status').val() == "SOLO PARENT"){
        $('#spouse').hide();
        $('.children_information').show();
        $('#spouse_name').val("");
        $('#spouse_contact_number').val("");
        $('#spouse_profession').val("");

        $('#spouse_summary_div').hide();
    }
    else{
        $('.children_information').hide();
        $('#spouse').hide();
        $('#spouse_name').removeClass('required_field');
        $('#spouse_contact_number').removeClass('required_field');
        $('#spouse_profession').removeClass('required_field');
    }
}

function changeEmploymentStatus(){
    var employment_status = $('#employment_status');

    if($('#employment_status').val() == "REGULAR" 
    || $('#employment_status').val() == 'PROBATIONARY'
    || $('#employment_status').val() == 'PART TIME'
    || $('#employment_status').val() == 'RETIRED'
    ){
        $('#benefits').show();
        $('#benefits_summary').show();
        $('#resignation_div').hide();
        $('#termination_div').hide();
        
    }
    else if($('#employment_status').val() == 'RESIGN'){
            $('#resignation_div').show();
            $('.hr-resignation').show();
            $('#termination_div').hide();
            $('#benefits').hide();
            $('#benefits_summary').hide();

    }
    else if($('#employment_status').val() == 'TERMINATE'){
            $('#termination_div').show();
            $('.hr-termination').show();
            $('#resignation_div').hide();
            $('#benefits').hide();
            $('#benefits_summary').hide();
    }
    else{
        // $('#sss_number').val('');
        // $('#pag_ibig_number').val('');
        // $('#philhealth_number').val('');
        // $('#tin_number').val('');
        // $('#account_number').val('');
        $('#resignation_div').hide();
        $('#termination_div').hide();

        $('#benefits').hide();
        $('#benefits_summary').hide();
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

$('.birthday').on('change',function(){
    var today = new Date();
    var birthDate = new Date($('.birthday').val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
    return $('.age').html(age);
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
            $('#filename_delete').val($('#filename').val());
            $('#filename').val('');
            $('#employee_image').val('');
            // $('#image_preview').attr('src','');
            $('#image_preview').hide();
            $('#image_close').hide();
            $('#image_user').show();
            $('#image_button').show();
            $('#image_instruction').show();
            $('#image_crop_settings').hide();
            $('#employee_image').addClass('required_field');
            employee_image_change = 'CHANGED';
            console.log(employee_image_change);
        }
    });
});

//Region,Province,City DropDown Function
// $('#region').on('change', function(){
//     $('#province').val('');
//     $('#city').val('');
//     $('#city').find('option').remove().end()
//     $('#city').append($('<option value="" selected disabled>SELECT CITY</option>'));
//     $.ajax({
//         type: 'GET',
//         url: '/setprovince',
//         data:{
//             'regCode': $('#region').val()
//         },
//         success: function(data){
//             $('#province').find('option').remove().end()
//             $('#province').append($('<option value="" selected disabled>SELECT PROVINCE</option>'));
//             var list = $.map(data, function(value, index){
//                 return [value];
//             });
//             list.forEach(value => {
//                 $('#province').append($('<option>', {
//                     value: value.provCode,
//                     text: value.provDesc.toUpperCase(),
//                     class:'province'
//                 }));
//             });
//         }
//     });
// });

// $('#province').on('change', function(){
//     $('#city').val('');
//     $.ajax({
//         type: 'GET',
//         url: '/setcity',
//         data:{
//             'provCode': $('#province').val()
//         },
//         success: function(data){
//             $('#city').find('option').remove().end()
//             $('#city').append($('<option value="" selected disabled>SELECT CITY</option>'));
//             var list = $.map(data, function(value, index){
//                 return [value];
//             });
//             list.forEach(value => {
//                 $('#city').append($('<option>', {
//                     value: value.citymunCode,
//                     text: value.citymunDesc.toUpperCase(),
//                     class:'city'
//                 }));
//             });
//         }
//     });
// });

$(document).on('change', '#province', function(){
    var citiesOption = " ";
    // $('#region').attr('placeholder','AUTOFILL');
    $.ajax({
        url:"/getCities",
        type:"get",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            provCode:$(this).val(),
        },
        success:function(data){
            var cities = $.map(data, function(value, index) {
                return [value];
            });
            citiesOption+='<option selected disabled>SELECT CITY/MUNICIPALITY</option>';
            cities.forEach(value => {
                citiesOption+='<option class="city" value="'+value.citymunCode+'">'+value.citymunDesc+'</option>';
            });
            $("#city").find('option').remove().end().append(citiesOption);
        }
    });
    $("#city").prop('disabled', false);
});

$(document).on('change', '#city', function(){
    var RegionOption = " ";
    $.ajax({
        url:"/getRegion",
        type:"get",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            citymunCode:$(this).val(),
        },
        success:function(data){
            $('#region').val(data[0].regDesc);
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
            id: $('#employee_position').val()
        },
        success: function(data){
            var job_description = data[0].job_description;
            var job_requirements = data[0].job_requirements;
            var job_description_details = job_description.split('•');
            var job_requirements_details = job_requirements.split('•');
            for(var i=0; i < job_description_details.length; i++){
                if(job_description_details[i]){
                    // $('.job_description_div').append('<li>' + job_description_details[i].replace(/\"/g,'') + '</li>');
                    $('.job_description_div').append('<li>' + job_description_details[i] + '</li>');
                }
            }
            for(var j=0; j < job_requirements_details.length; j++){
                if(job_requirements_details[j]){
                    $('.job_requirements_div').append('<li>' + job_requirements_details[j] + '</li>');
                }
            }
        }
    });

    $.ajax({
        type: 'GET',
        url: '/setJobPosition',
        data:{
            id: $('#employee_position').val()
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
$('#note_required').on('click',function(){
    //Personal Info
    $('#first_name').val('Rendell');
    $('#middle_name').val('Mendez');
    $('#last_name').val('Hidalgo');
    $('#nickname').val('Dell');
    $('#address').val('sample');
    $('#gender').val('Male');
    $('#height').val('5"3');
    $('#weight').val('55kgs');
    $('#religion').val('Catholic');
    $('#civil_status').val('Single');
    $('#email_address').val('rendellhidalgo11@gmail.com');
    $('#cellphone_number').val('09322003718');
    $('#father_name').val('Reynaldo Hidalgo');
    $('#father_contact_number').val('09322003718');
    $('#father_profession').val('Utility Worker');
    $('#mother_name').val('Marlyn Hidalgo');
    $('#mother_contact_number').val('09324207239');
    $('#mother_profession').val('House Wife');
    $('#emergency_contact_name').val('Marlyn Hidalgo');
    $('#emergency_contact_relationship').val('Mother');
    $('#emergency_contact_number').val('09322003718');

    //Work Info
    $('#employee_number').val('50006');
    $('#employee_company').val('4');
    $('#employee_department').val('1');
    $('#employee_branch').val('3');
    $('#employment_status').val('Probationary');
    $('#employee_shift').val('1');
    // $('#employee_supervisor').val('1');
    $('#employee_position').val('2');
    $('#company_email_address').val('rdhidalgo@ideaserv.com.ph');
    $('#company_contact_number').val('09322003718');
    $('#sss_number').val('35-2192659-2');
    $('#pag_ibig_number').val('121305024402');
    $('#philhealth_number').val('022005294391');
    $('#tin_number').val('398-758-866');
    $('#account_number').val('5');

    // //Education/Trainings
    $('#college_name').val('Universidad De Manila');
    $('#college_degree').val('BTVTE Major in CPT');
    $('#college_inclusive_years_from').val('2018-06');
    $('#college_inclusive_years_to').val('2022-07');
    $('#collegeAdd').click();
    $('#secondary_school_name').val('Florentino Torres High School');
    $('#secondary_school_address').val('Torres');
    $('#secondary_school_inclusive_years_from').val('2012-06');
    $('#secondary_school_inclusive_years_to').val('2016-04');
    $('#primary_school_name').val('Lakandula Elementary School');
    $('#primary_school_address').val('Lakandula');
    $('#primary_school_inclusive_years_from').val('2006-06');
    $('#primary_school_inclusive_years_to').val('2012-04');
    $('#training_name').val('A');
    $('#training_title').val('A');
    $('#training_inclusive_years_from').val('2020-01');
    $('#training_inclusive_years_to').val('2020-02');
    $('#trainingAdd').click();
    $('#vocational_name').val('A');
    $('#vocational_course').val('A');
    $('#vocational_inclusive_years_from').val('2020-01');
    $('#vocational_inclusive_years_to').val('2020-02'); 
    $('#vocationalAdd').click();

    // Job History
    $('#job_company_name').val('A');
    $('#job_description').val('A');
    $('#job_position').val('A');
    $('#job_contact_number').val('1');
    $('#job_inclusive_years_from').val('2022-01');
    $('#job_inclusive_years_to').val('2023-01');
    $('#jobHistoryAdd').click();
    // Medical History
    $('#past_medical_condition').val('• A');
    $('#allergies').val('• A');
    $('#medication').val('• A');
    $('#psychological_history').val('• A');
    // Compensation/Benefits
    $('#employee_salary').val('₱15,000');
    $('#employee_incentives').val('₱1.00');
    $('#employee_overtime_pay').val('₱1.00');
    $('#employee_bonus').val('₱1.00');
    $('#employee_insurance').val('• A');
});

$("input[type='date']").keydown(function (event) { event.preventDefault(); });

setInterval(() => {
    if($('#btnSave').is(":visible")){
        $('#employee_history_div').hide();
        $('#resign').hide();
        $('#terminate').hide();
        $('#retired').hide();
    }
    else{
        $('#employee_history_div').show();
        $('#resign').show();
        $('#terminate').show();
        $('#retired').show();
    }
}, 0);

setInterval(() => {
    // Check all required field function
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
        $('#btnSave').prop("disabled",true);    
    }
    else{
        $('#btnSave').prop("disabled",false);
    }
}, 0);

setInterval(() => {
    // Check all required field function
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
        $('#btnUpdate').prop("disabled",true);    
       
    }
    else{
        $('#btnUpdate').prop("disabled",false);
    }
}, 0);

setInterval(() => {
    if($('#btnSave').is(":visible")){
        $('#tab9').hide();
    }
    else{
        $('#tab9').show();
    }
}, 0);

$(document).ready(function() {
    // Get current date
    var currentDate = new Date();
    
    // Set the maximum value for the month to the current month
    $('#college_inclusive_years_from').attr('max', currentDate.toISOString().substring(0, 7));
    $('#college_inclusive_years_to').attr('max', currentDate.toISOString().substring(0, 7));
    $('#secondary_school_inclusive_years_from').attr('max', currentDate.toISOString().substring(0, 7));
    $('#secondary_school_inclusive_years_to').attr('max', currentDate.toISOString().substring(0, 7));
    $('#primary_school_inclusive_years_from').attr('max', currentDate.toISOString().substring(0, 7));
    $('#primary_school_inclusive_years_to').attr('max', currentDate.toISOString().substring(0, 7));
    $('#training_inclusive_years_from').attr('max', currentDate.toISOString().substring(0, 7));
    $('#training_inclusive_years_to').attr('max', currentDate.toISOString().substring(0, 7));
    $('#vocational_inclusive_years_from').attr('max', currentDate.toISOString().substring(0, 7));
    $('#vocational_inclusive_years_to').attr('max', currentDate.toISOString().substring(0, 7));
    $('#job_inclusive_years_from').attr('max', currentDate.toISOString().substring(0, 7));
    $('#job_inclusive_years_to').attr('max', currentDate.toISOString().substring(0, 7));
});

$(document).ready(function(){
    $('#btnPdf').click(function(){
        $('#print_file').printThis({
            importCSS: true,
            header: '<img src="/images/ideaserv_systems_logo.png" style="width:150px; height:100px;"/>',
        });
    });
});
// $('#btnPdf').on('click', function() {
//     var printContents = $('#print_file').html();
//     var originalContents = $('body').html();
//     $('body').html(printContents);
//     window.print();
//     $('body').html(originalContents);
//   });

function formatPesoInput(selector){
    $(selector).on('keyup', function(){
      let inputVal = $(this).val().replace(/[^\d]/g, '');
      inputVal = inputVal.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      inputVal = '₱' + inputVal;
      $(this).val(inputVal);
    });
}
  
$(document).ready(function() {
    formatPesoInput('#employee_salary');
    formatPesoInput('#employee_incentives');
    formatPesoInput('#employee_overtime_pay');
    formatPesoInput('#employee_bonus');
});