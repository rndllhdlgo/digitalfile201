var employeesTable;
$(document).ready(function(){
    employeesTable = $('table.employeesTable').DataTable({
        dom:'l<"breakspace">trip',
        language:{
            info: "\"Showing _START_ to _END_ of _TOTAL_ Employees\"",
            lengthMenu:"Show _MENU_ Employees",
            emptyTable:"No Employees Data Found!",
            loadingRecords: "Loading Employee Records...",
        },
        aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        processing:true,
        serverSide:false,
        ajax:{
            url: '/employees/listOfEmployees',
        },
        order: [],
        columns:[
            // {
            //     data: 'employee_number',
            //     // "render": function(data, type, row){
            //     //     return "<span class="+row.employee_number+">"+row.employee_number+"</span>";
            //     // }
            // },
            {data: 'employee_number'},
            {data: 'first_name'},
            {data: 'middle_name'},
            {data: 'last_name'},
            {data: 'employee_position'},
            {data: 'employee_branch'},
            {data: 'employment_status'}
        ],
        initComplete: function(){
            // if(window.location.search.includes('employee_number') == true){
            //     var url = new URL(window.location.href);
            //     var employee_number = url.searchParams.get("employee_number");
            //     $('.'+employee_number).closest('tr').click();
            //     // $('#loading').show();
            // }
            $('#loading').hide();
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
    $('#btnEnableEdit').hide();
    $('#btnUpdate').hide();
    $('#btnSummary').hide();
    $('#navigation').show();
    $('#tab1').addClass('tabactive');
    $('#resigned').hide();
    $('#spouse_contact_number').val('');
    $('#region').val('AUTOFILL');
    $('.input-file-text').addClass('required_field');
});

function changeCivilStatus(){
    var status = $('#civil_status');

    if($('#civil_status').val() == "Married"){
        $('#spouse').show();
        $('#spouse_name').addClass('required_field');
        $('#spouse_contact_number').addClass('required_field');
        $('.children_information').hide();
        $('#children_table').hide();
        
        $('#spouse_summary_div').show();
    }
    else if($('#civil_status').val() == "Solo Parent"){
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

    if($('#employment_status').val() == "Regular" 
    || $('#employment_status').val() == 'Probationary'
    || $('#employment_status').val() == 'Part_Time'
    || $('#employment_status').val() == 'Retired'
    ){
        $('#benefits').show();
        $('#benefits_summary').show();
        $('#resignation_div').hide();
        $('#termination_div').hide();
        
    }
    // else if($('#employment_status').val() == 'Resign'){
    //         $('#resignation_div').show();
    //         $('#termination_div').hide();
    //         $('#benefits').hide();
    //         $('#benefits_summary').addClass();
    // }
    // else if($('#employment_status').val() == 'Terminate'){
    //         $('#termination_div').show();
    //         $('#resignation_div').hide();
    //         $('#benefits').hide();
    //         $('#benefits_summary').hide();
    // }
    else{
        $('#sss_number').val('');
        $('#pag_ibig_number').val('');
        $('#philhealth_number').val('');
        $('#tin_number').val('');
        $('#account_number').val('');
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
    // $('#personal_info').css('zoom','95%');
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
            // $('#personal_info').css('zoom','100%');
            $('#filename_delete').val($('#filename').val());
            $('#filename').val('');
            $('#employee_image').val('');
            $('#image_preview').attr('src','');
            $('#image_preview').hide();
            $('#image_close').hide();
            $('#image_user').show();
            $('#image_button').show();
            $('#image_instruction').show();
            // $('.column-1').css("height","280px");
            $('#employee_image').addClass('required_field');
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
    $('#region').val('AUTOFILL');
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
//Required Field
    //Personal Info
    $('#first_name').val('Rendell');
    $('#middle_name').val('Mendez');
    $('#last_name').val('Hidalgo');
    $('#nickname').val('Dell');
    $('#unit').val('1');
    $('#lot').val('519 West Antipolo Street Gagalangin Tondo Manila');
    $('#barangay').val('169');
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
    $('#employment_origin').val('Newly Hired');
    $('#employee_shift').val('1');
    $('#employee_supervisor').val('1');
    $('#employee_position').val('2');
    $('#company_email_address').val('rendellhidalgo11@gmail.com');
    $('#company_contact_number').val('09322003718');
    $('#sss_number').val('1');
    $('#pag_ibig_number').val('2');
    $('#philhealth_number').val('3');
    $('#tin_number').val('4');
    $('#account_number').val('5');

    //Education/Trainings
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

    //Job History
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

$("input[type='date']").keydown(function (event) { event.preventDefault(); });

setInterval(() => {
    if($('#btnSave').is(":visible")){
        $('#resign').hide();
        $('#terminate').hide();
        $('#retired').hide();
    }
    else{
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

$(document).on('click', '#btnPdf', function(){
    var printContents=document.getElementById('print_file').innerHTML;
    var originalContents=document.body.innerHTML;
    document.body.innerHTML=printContents;
    window.print();
    document.body.innerHTML=originalContents;
});

// $(document).ready(function(){
//     var divContent = $("#print_file").html();
//     var pdf = new jsPDF();
//     pdf.text(divContent, 10, 10);
//     pdf.save("Sample.pdf");
// });

// $(document).on('click', '#btnPdf', function(){
    // Swal.fire({
    //     title: "SAVE AS PDF?",
    //     html: "You are about to SAVE this Stock Transfer as PDF!",
    //     icon: "warning",
    //     showCancelButton: true,
    //     cancelButtonColor: '#3085d6',
    //     confirmButtonColor: '#d33',
    //     confirmButtonText: 'Confirm',
    //     allowOutsideClick: false
    // })
    // .then((result) => {
    //     if(result.isConfirmed){
            // var content = document.getElementById('print_file');
            // var options = {
            //     margin:       [0.1, 0.1],
            //     filename:     $('#employee_number').val() + " " + $('#first_name').val() + " " + $('#middle_name').val() + " " + $('#last_name').val()+ '.pdf',
            //     image:        { type: 'jpeg', quality: 0.98 },
            //     html2canvas:  { scale: 1.75 },
            //     jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
            // };
            // html2pdf(content, options);
        // }
    // });
// });

