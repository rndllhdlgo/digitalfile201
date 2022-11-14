
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

//Display Data Table Function
var employeesTable;
$(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#employeesTable thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#employeesTable thead');

        employeesTable = $('#employeesTable').DataTable({
            dom:'l<"breakspace">trip',
            language:{
                "info": "\"_START_ to _END_ of _TOTAL_ Employees\"",
                "lengthMenu":"Show _MENU_ Employees",
                "emptyTable":"No Employees Data Found!",
                "loadingRecords": "Loading Employee Records...",
            },
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            processing:true,
            serverSide:false,
            orderCellsTop: true,
            fixedHeader: true,
            ajax:{
                url: '/employees/listOfEmployees',
            },
            columns:[
                {data: 'employee_number'},//data column name
                {data: 'first_name'},
                {data: 'middle_name'},
                {data: 'last_name'},
                {data: 'employee_position'},
                {data: 'employee_branch'},
                {data: 'employee_status'},
            ],
            initComplete: function () {
                var api = this.api();
    
                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function (colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html('<input type="text" class="text-capitalize" style="border:none;border-radius:5px;width:100%;"/>');
    
                        // On every keypress in this input
                        $(
                            'input',
                            $('.filters th').eq($(api.column(colIdx).header()).index())
                        )
                            .off('keyup change')
                            .on('change', function (e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();
    
                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != ''
                                            ? regexr.replace('{search}', '(((' + this.value + ')))')
                                            : '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function (e) {
                                e.stopPropagation();
    
                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
        });
    $('div.breakspace').html('<br><br>');
});

//Hide Employee fill up form

//Create New Employee Function
$('#addEmployeeBtn').on('click',function(){
    $('#employee_personal_information').fadeIn();
    $('#employees_list').hide();
    $('#addEmployeeBtn').hide();
    $('#btnEnableEdit').hide();
    $('#navigation').show();
    $('#tab1').click();
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
    || $('#cellphone_number').val().length < 14
    || $('#father_contact_number').val().length < 14
    || $('#mother_contact_number').val().length < 14
    || $('#emergency_contact_number').val().length < 14
    || $('#employee_contact_number').val().length < 14
    || !email_address.value.match(regExp)
    || !employee_email_address.value.match(regExp)
    ){
        $('#title_details').show();
        $('#btnSave').prop("disabled",true);
    }
    else{
        $('#title_details').hide();
        $('#btnSave').prop("disabled",false);
    }
}

//Clear Form (Current Page,All Pages)
setInterval(checkclearform,0);
function checkclearform(){
    if($('.required_field').filter(function(){ return !!this.value; }).length < 1 && $('.multiple_field').filter(function(){ return !!this.value; }).length < 1) {
        $('#btnClear').prop("disabled",true);
    }
    else{
        $('#btnClear').prop("disabled",false);
    }
}


$('#btnUpdate').hide();
$('#btnCancelEdit').hide();
$('#solo_parent').hide();//Hide solo parent section
$('#spouse').hide();//Hide spouse section

//Hide/Show (Civil Status, Solo Parent) Section Function
    function changeStatus(){
        // var status = document.getElementById("civil_status");
        var status = $('#civil_status');

        if($('#civil_status').val() == "Married"){
            $('#spouse').show();
            $('#spouse_name').addClass('required_field');
            $('#spouse_contact_number').addClass('required_field');
            $('#spouse_profession').addClass('required_field');
            // $('#spouse_contact_number').val('+63 9');
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

$('#benefits').hide();
//Hide/Show (employment status) Section Function
    function changeEmploymentStatus(){
        // var employment_status = document.getElementById("employee_status");
        var employment_status = $('#employee_status');
  
        if($('#employee_status').val() == "Regular" || $('#employee_status').val() == "Intern"){
            $('#benefits').show();
            $('#sss_number').addClass('required_field');
            $('#pag_ibig_number').addClass('required_field');
            $('#philhealth_number').addClass('required_field');
            $('#tin_number').addClass('required_field');
            $('#account_number').addClass('required_field');
        }
        else if($('#employee_status').val() == 'Probationary'){
                $('#benefits').show();
                $('#sss_number').removeClass('required_field');
                $('#pag_ibig_number').removeClass('required_field');
                $('#philhealth_number').removeClass('required_field');
                $('#tin_number').removeClass('required_field');
                $('#account_number').removeClass('required_field');

                $('#sss_number').removeClass('requiredInput');
                $('#pag_ibig_number').removeClass('requiredInput');
                $('#philhealth_number').removeClass('requiredInput');
                $('#tin_number').removeClass('requiredInput');
                $('#account_number').removeClass('requiredInput');
        }
        else if($('#employee_status').val() == 'Resign'){
                $('.resignation-table').show();
                $('.termination-table').hide();
                $('#benefits').hide();
                $('#sss_number').removeClass('required_field');
                $('#pag_ibig_number').removeClass('required_field');
                $('#philhealth_number').removeClass('required_field');
                $('#tin_number').removeClass('required_field');
                $('#account_number').removeClass('required_field');
        }
        else if($('#employee_status').val() == 'Terminate'){
                $('.termination-table').show();
                $('.resignation-table').hide();
                $('#benefits').hide();
                $('#sss_number').removeClass('required_field');
                $('#pag_ibig_number').removeClass('required_field');
                $('#philhealth_number').removeClass('required_field');
                $('#tin_number').removeClass('required_field');
                $('#account_number').removeClass('required_field');
        }
        else{
            $('#benefits').hide();
            $('#sss_number').removeClass('required_field');
            $('#pag_ibig_number').removeClass('required_field');
            $('#philhealth_number').removeClass('required_field');
            $('#tin_number').removeClass('required_field');
            $('#account_number').removeClass('required_field');
        }
    }

//Nav pill Function
$('#tab1').on('click',function(){
    $('#tab1').addClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_information').fadeIn();
    $('#work_information').hide();
    $('#compensation_and_benefits').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#performance_evaluation').hide();
    $('#documents').hide();
    $('#logs').hide();
});

$('#tab2').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').addClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');
    
    $('#personal_information').hide();
    $('#work_information').show();
    $('#compensation_and_benefits').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#performance_evaluation').hide();
    $('#documents').hide();
    $('#logs').hide();

});

$('#tab3').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').addClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_information').hide();
    $('#work_information').hide();
    $('#compensation_and_benefits').show();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#performance_evaluation').hide();
    $('#documents').hide();
    $('#logs').hide();
});

$('#tab4').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').addClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_information').hide();
    $('#work_information').hide();
    $('#compensation_and_benefits').hide();
    $('#educational_background').show();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#performance_evaluation').hide();
    $('#documents').hide();
    $('#logs').hide();
});

$('#tab5').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').addClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_information').hide();
    $('#work_information').hide();
    $('#compensation_and_benefits').hide();
    $('#educational_background').hide();
    $('#job_history').show();
    $('#medical_history').hide();
    $('#performance_evaluation').hide();
    $('#documents').hide();
    $('#logs').hide();
});

$('#tab6').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').addClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_information').hide();
    $('#work_information').hide();
    $('#compensation_and_benefits').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#medical_history').show();
    $('#performance_evaluation').hide();
    $('#documents').hide();
    $('#logs').hide();
});

$('#tab7').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').addClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_information').hide();
    $('#work_information').hide();
    $('#compensation_and_benefits').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#performance_evaluation').show();
    $('#documents').hide();
    $('#logs').hide();
});

$('#tab8').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').addClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_information').hide();
    $('#work_information').hide();
    $('#compensation_and_benefits').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#performance_evaluation').hide();
    $('#documents').show();
    $('#logs').hide();
});

$('#tab9').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').addClass('tabactive');

    $('#personal_information').hide();
    $('#work_information').hide();
    $('#compensation_and_benefits').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#performance_evaluation').hide();
    $('#documents').hide();
    $('#logs').show();
});

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
    $('#cover_image').val(''); //Remove the image inserted
    $('#image_preview').attr('src',''); //Remove current preview
    $('#image_preview').hide();
    $('#image_close').hide();
    $('#image_user').show();
    $('#image_button').show();
    $('.column-1').css("height","250px");
    $('#cover_image').click();
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
    $('#jobDescriptionModalTitle').empty();

    $.ajax({
        type: 'GET',
        url: '/setJobDescription',
        data:{
            'id': $('#employee_position').val()
        },
        success: function(data){
            var list = $.map(data, function(value, index){
                return [value];
            });
            list.forEach(value => {
                $('ul.job_description_div').append('<li>' + value.job_description + '</li>');
            });
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
    })

    $('#viewJobDescriptionModal').modal('show');
});

//Fill All Function
$('#title_details').on('click',function(){
//Required Field
    $('#first_name').val('Rendell');
    $('#last_name').val('Hidalgo');
    $('#middle_name').val('Mendez');
    $('#nickname').val('Dell');
    $('#street').val('West Antipolo Street');
    $('#gender').val('Male');
    $('#height').val('5"3');
    $('#weight').val('55kgs');
    $('#religion').val('Catholic');
    $('#civil_status').val('Single');
    $('#email_address').val('rendellhidalgo11@gmail.com');
    $('#cellphone_number').val('+63 9322003718');
    $('#father_name').val('Reynaldo Hidalgo');
    $('#father_profession').val('Utility Worker');
    $('#mother_name').val('Marlyn Hidalgo');
    $('#mother_profession').val('House Wife');
    $('#emergency_contact_name').val('Marlyn Hidalgo');
    $('#emergency_contact_relationship').val('Mother');
    $('#emergency_contact_number').val('+63 9322003718');
    $('#employee_number').val('1');
    $('#employee_company').val('PHILLOGIX SYSTEMS INC.');
    $('#employee_branch').val('SAN JUAN');
    $('#employee_status').val('Probationary');
    $('#employee_position').val('Jr. Programmer');
    $('#employee_supervisor').val('Gerard Mallari');
    $('#employee_shift').val('A9 08:30AM-17:30PM WITH BREAK 11:30AM-12:30PM');
    $('#employee_email_address').val('rendellhidalgo111@gmail.com');
    $('#employee_contact_number').val('+63 9322003718');
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
    $('#father_contact_number').val('+63 9322003718');
    $('#mother_contact_number').val('+63 9322003718');
});

