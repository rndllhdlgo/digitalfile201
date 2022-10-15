var addRequiredField = 0;
// var go = true, $lvl = $('.lvl');
// $(window).bind("beforeunload",function(event) {
//     if(go) return "You have unsaved changes";
// });

setInterval(dateTime,0)
function dateTime(){
  //Display current date and time
  const d = new Date().toDateString();
  const t = new Date().toLocaleTimeString();
  document.getElementById("date").innerHTML = d + ' ' + t;
}

//Go to top button
var btn = $('#button');
$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});
btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});


// $(document).ready(function () {
//     // Setup - add a text input to each footer cell
//     $('#employeesTable thead th').each(function () {
//         var title = $(this).text();
//         $(this).html('<input type="text" placeholder="Search ' + title + '" />');
//     });
 
//     // DataTable
//     var employeesTable = $('#employeesTable').DataTable({
//             dom:'lrtip',//layout of the table
//             language: {
//             "info": "\"_START_ to _END_ of _TOTAL_ Employees\"",
//             "lengthMenu":"Show _MENU_ Employees",
//             "emptyTable":"No Employees data found!"
//             },
//             processing:true,//loading processing
//             serverSide:false,//Source of data
//             scrollX: true,//Horizontal Scroll
//             ajax: {
//                 url: '/employees/listOfEmployees',//route-name/To Display data in JSON format
//             },
//         columns: [
//             {data: 'employee_number'},//data column name
//             {data: 'first_name'},
//             {data: 'last_name'},
//             {data: 'middle_name'},
//             {data: 'position_of_employee'},
//             {data: 'branch_of_employee'},
//             {data: 'status_of_employee'},
//         ],
        
//         initComplete: function () {
//             // Apply the search
//             this.api()
//                 .columns()
//                 .every(function () {
//                     var that = this;
 
//                     $('input', this.header()).on('keyup change clear', function () {
//                         if (that.search() !== this.value) {
//                             that.search(this.value).draw();
//                         }
//                     });
//                 });
//         },
//     });
// });

// $(document).ready( function () { //The ready() method specifies what happens when a ready event occurs.
//     $('#employeesTable').DataTable(
//       {
//         dom:'lfrtip',
//         processing:true,
//         serverSide:false,
//         ajax: {
//         //route-name
//         url: '/employees/listOfEmployees',
//       },
//       //data column name
//       columns: [
//           {data: 'employee_number'},
//           {data: 'first_name'},
//           {data: 'last_name'},
//           {data: 'middle_name'},
//           {data: 'position_of_employee'},
//           {data: 'branch_of_employee'},
//           {data: 'status_of_employee'},
//       ]
//       }
//   );    
// });

// To Display Data Tables with filter
var employeesTable;

$(document).ready(function () {    
  $('#employeesTable thead tr')// Setup - add a text input to each footer cell
      .clone(true)
      .addClass('filters')
      .appendTo('#employeesTable thead');
  
  $('#employeesTable').dataTable().fnDestroy();//To destroy datatable
  employeesTable = $('#employeesTable').DataTable({
      dom:'lrtip',//layout of the table
      language: {
        "info": "\"_START_ to _END_ of _TOTAL_ Employees\"",
        "lengthMenu":"Show _MENU_ Employees",
        "emptyTable":"No Employees data found!"
      },
      processing:true,//loading processing
      serverSide:false,//Source of data
      scrollX: true,//Horizontal Scroll
      ajax: {
          url: '/employees/listOfEmployees',//route-name/To Display data in JSON format
      },
    columns: [
        {data: 'employee_number'},//data column name
        {data: 'first_name'},
        {data: 'last_name'},
        {data: 'middle_name'},
        {data: 'position_of_employee'},
        {data: 'branch_of_employee'},
        {data: 'status_of_employee'},
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
              $(cell).html('<input type="text" style="border:none;border-radius:5px;width:100%;"/>');// On every keypress in this input

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
          setTimeout(function(){$('#employeesTable').DataTable().ajax.reload();}, 0);//To reload the table/page
      },
  });
});

//Hide first form
$('#employee_personal_information').hide();

//Create New Employee Button
$('#addEmployeeBtn').on('click',function(){
    $('#employee_personal_information').fadeIn();
    $('#employees_list').hide();
    $('#addEmployeeBtn').hide();
    $('#btnEnableEdit').hide();
    $('#navigation').show();
    $('#tab1').click();
    $('#resigned').hide();

    $('#title_details').removeClass('alert-info');
    $('#title_details').addClass('alert-warning');
    $('#title_details').html('<i class="fas fa-exclamation"></i> <b> NOTE:</b> Please fill all the required fields');
});

//Function for Image Upload
// var fileName;
// function sendFile() {//This function will trigger if the btnSave click
//     var formData = new FormData();
//     var file = $('#cover_image').prop('files')[0];

//     formData.append('file', file);
//     // Don't use serialize here, as it is used when we want to send the data of entire form in a query string way and that will not work for file upload
//     $.ajax({
//         url: '/employees/insertImage',
//         method: 'post',
//         data: formData,
//         contentType : false,
//         processData : false,
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         success: function(response){
//           console.log(response);
//           fileName = response;
//             // Do what ever you want to do on success
//         }
//     });
// }

// $('#btnSave').prop("disabled",true);

//Fill all required fields/ Check required fields
// setInterval(checkforblank,0);
// function checkforblank(){
//     if($('.required_field').filter(function(){ return !!this.value; }).length != (41 + addRequiredField) || $('#email_validation').is(":visible") || $('#cellphone_number_validation').is(":visible") || $('#emergency_contact_number_validation').is(":visible") || $("#spouse_contact_number_validation").is(":visible") || $("#employee_email_validation").is(":visible") || $("#employee_contact_number_validation").is(":visible") || $('#check_duplicate').is(":visible")){
//     // if($('.required_field').filter(function(){ return !!this.value; }).length != (20 + addRequiredField) || $('#email_validation').is(":visible") || $('#cellphone_number_validation').is(":visible") || $('#emergency_contact_number_validation').is(":visible") || $("#spouse_contact_number_validation").is(":visible") || $("#employee_email_validation").is(":visible") || $("#employee_contact_number_validation").is(":visible") || $('#check_duplicate').is(":visible")){
//         $('#title_details').show();
//         $('#btnSave').prop("disabled",true);
//     }
//     else{
//         $('#title_details').hide();
//         $('#btnSave').prop("disabled",false);
//     }
// }
// setInterval(checkforblank,0);
// function checkforblank(){
//     if($('.required_field').filter(function(){ return !!this.value; }).length != (23 + addRequiredField)){
//         $('#title_details').show();
//         $('#btnSave').prop("disabled",true);
//     }
//     else{
//         $('#title_details').hide();
//         $('#btnSave').prop("disabled",false);
//     }
// }
setInterval(checkforblank,0);
function checkforblank(){
    if($('.required_field').filter(function(){ return !!this.value; }).length < $(".required_field").length){
        $('#title_details').show();
        $('#btnSave').prop("disabled",true);
    }
    else{
        $('#title_details').hide();
        $('#btnSave').prop("disabled",false);
    }
}

// //Clear Form
// setInterval(checkclearform,0);
// function checkclearform(){
//     if($('.required_field').filter(function(){ return !!this.value; }).length < 1){
//         $('#btnClear').prop("disabled",true);
//     }
//     else{
//         $('#btnClear').prop("disabled",false);
//     }
// }

$('#btnUpdate').hide();
$('#btnCancelEdit').hide();

// Civil Status
$('#solo_parent').hide();
$('#spouse').hide();

    function changeStatus(){
      var status = document.getElementById("civil_status");

      if(status.value == "Married"){
          $('#spouse').show();
          $('#spouse_name').addClass('required_field');
          $('#spouse_contact_number').addClass('required_field');
          $('#spouse_profession').addClass('required_field');
          $('#solo_parent').hide();
          $('#solo_parent_data_table').hide();
      }
      else if(status.value == "Solo Parent"){
          $('#spouse').hide();
          $('#solo_parent').show();
          $('#child_name').addClass('required_field');
          $('#child_birthday').addClass('required_field');
          $('#child_gender').addClass('required_field');
        //   $('#solo_parent_data_table').show();
      }
      else{
          $('#solo_parent').hide();
          $('#spouse').hide();
          $('#spouse_name').removeClass('required_field');
          $('#spouse_contact_number').removeClass('required_field');
          $('#spouse_profession').removeClass('required_field');
          $('#child_name').removeClass('required_field');
          $('#child_birthday').removeClass('required_field');
          $('#child_gender').removeClass('required_field');
          $('#spouse_name').val("");
          $('#spouse_contact_number').val("");
          $('#spouse_profession').val("");
      }
    }

$('#benefits').hide();
//Employment Status
    function changeEmploymentStatus(){
        var employment_status = document.getElementById("status_of_employee");
  
        if(employment_status.value == "Regular" || employment_status.value == "Intern" || employment_status.value == "Probationary"){
            $('#benefits').show();
            $('#sss_number').addClass('required_field');
            $('#pag_ibig_number').addClass('required_field');
            $('#philhealth_number').addClass('required_field');
            $('#tin_number').addClass('required_field');
            $('#bank_account_number').addClass('required_field');
        }
        else{
            $('#benefits').hide();
            $('#sss_number').removeClass('required_field');
            $('#pag_ibig_number').removeClass('required_field');
            $('#philhealth_number').removeClass('required_field');
            $('#tin_number').removeClass('required_field');
            $('#bank_account_number').removeClass('required_field');
        }
    }

//Navigation Active Pills
$('#tab1').on('click',function(){
    $('#tab1').addClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#personal_information').fadeIn();
    $('#work_information').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#documents').hide();
    $('#performance_evaluation').hide();
});
$('#tab2').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').addClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#personal_information').hide();
    $('#work_information').show();
    $('#educational_background').hide();
    $('#documents').hide();
    $('#performance_evaluation').hide();
});
$('#tab3').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').addClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#personal_information').hide();
    $('#work_information').hide();
    $('#educational_background').show();
    $('#documents').hide();
    $('#performance_evaluation').hide();
});
$('#tab4').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').addClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#personal_information').hide();
    $('#work_information').hide();
    $('#educational_background').hide();
    $('#job_history').show();
    $('#documents').hide();
    $('#performance_evaluation').hide();
});
$('#tab5').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').addClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#personal_information').hide();
    $('#work_information').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#documents').show();
    $('#performance_evaluation').hide();
});
$('#tab6').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').addClass('tabactive');
    $('#personal_information').hide();
    $('#work_information').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#documents').hide();
    $('#performance_evaluation').show();
});

//Calculate Age
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

//Duplicate Validation
setInterval(checkEmployeeNumber,200)
function checkEmployeeNumber(){
      if($('#employee_number').val()){
        $.ajax({
            url: "/employees/checkDuplicate",
            data:{
            employee_number : $('#employee_number').val(),
            },
            success: function(data){
                if(data == 'true'){
                    $('#check_duplicate').show();
                    // $('#employee_number').css('border','2px solid #dc3545');
                }
                else{
                    $('#check_duplicate').hide();
                    // $('#employee_number').css('border','1px solid gray');
                }
            }
        });
      }
};

//Email Validation
const email_address = document.querySelector("#email_address");
const email_validation = document.querySelector("#email_validation");
let regExp = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

function emailValidation(){
    if(email_address.value.match(regExp)){
      $('#email_validation').hide();
      $('#btnSave').prop("disabled",false);
    }
    else{
      $('#email_validation').show();
      $('#btnSave').prop("disabled",true);
      // $('#title_details').show();
    }
}

//Employee Email Validation
const employee_email_address = document.querySelector("#employee_email_address");
const employee_email_validation = document.querySelector("#employee_email_validation");
let regExpr = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

function employeeEmailValidation(){
    if(employee_email_address.value.match(regExpr)){
      $('#employee_email_validation').hide();
      $('#btnSave').prop("disabled",false);
    }
    else{
      $('#employee_email_validation').show();
      $('#btnSave').prop("disabled",true);
    }
}

//Input(Letters Only)
    function lettersOnly(input){
      var letters_only = /[^- ñ a-z]/gi;//Everything (^) //Uppercase allowed (i) //Global (g)
        input.value = input.value.replace(letters_only,"");
    }
//Input(Numbers Only)
    function numbersOnly(input){
      var numbers_only = /[^- 0-9]/g;
        input.value = input.value.replace(numbers_only,"");
    }
    function contactNumberOnly(input){
      var contact_number = /[^+()0-9]/g;
        input.value = input.value.replace(contact_number,"");
    }

//Close Preview Image
$('#image_close').on('click',function(){
    $('#cover_image').val(''); //Remove the image inserted
    $('#preview_image').attr('src',''); //Remove current preview
    $('#preview_image').hide();
    $('#image_close').hide();
    $('#image_user').show();
    $('#image_button').show();
    $('.column-1').css("height","250px");
    $('#image_button').css("margin-top","198px");
    $('#cover_image').click();
});

//Disable future dates/ Date Hired
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

//Disable Birthday UnderAge (18)
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

//File button design
const birthcertificate_file = $('#birthcertificate_file')[0];
const birthcertificate_button = $('#birthcertificate_button')[0];
const birthcertificate_text = $('#birthcertificate_text')[0];

$('#birthcertificate_file').on('change',function(){
    if (birthcertificate_file.value) {
        birthcertificate_text.innerHTML = "<b> File Name: </b>" + birthcertificate_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        birthcertificate_text.innerHTML = "No file chosen, yet.";
    }
});

const nbi_file = $('#nbi_file')[0];
const nbi_button = $('#nbi_button')[0];
const nbi_text = $('#nbi_text')[0];

$('#nbi_file').on('change',function(){
    if (nbi_file.value) {
        nbi_text.innerHTML = "<b> File Name: </b>" + nbi_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        nbi_text.innerHTML = "No file chosen, yet.";
    }
});

const barangay_clearance_file = $('#barangay_clearance_file')[0];
const barangay_clearance_button = $('#barangay_clearance_button')[0];
const barangay_clearance_text = $('#barangay_clearance_text')[0];

$('#barangay_clearance_file').on('change',function(){
    if (barangay_clearance_file.value) {
        barangay_clearance_text.innerHTML = "<b> File Name: </b>" + barangay_clearance_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        barangay_clearance_text.innerHTML = "No file chosen, yet.";
    }
});

const police_clearance_file = $('#police_clearance_file')[0];
const police_clearance_button = $('#police_clearance_button')[0];
const police_clearance_text = $('#police_clearance_text')[0];

$('#police_clearance_file').on('change',function(){
    if (police_clearance_file.value) {
        police_clearance_text.innerHTML = "<b> File Name: </b>" + police_clearance_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        police_clearance_text.innerHTML = "No file chosen, yet.";
    }
});

const sss_file = $('#sss_file')[0];
const sss_button = $('#sss_button')[0];
const sss_text = $('#sss_text')[0];

$('#sss_file').on('change',function(){
    if (sss_file.value) {
        sss_text.innerHTML = "<b> File Name: </b>" + sss_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        sss_text.innerHTML = "No file chosen, yet.";
    }
});

const philhealth_file = $('#philhealth_file')[0];
const philhealth_button = $('#philhealth_button')[0];
const philhealth_text = $('#philhealth_text')[0];

$('#philhealth_file').on('change',function(){
    if (philhealth_file.value) {
        philhealth_text.innerHTML = "<b> File Name: </b>" + philhealth_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        philhealth_text.innerHTML = "No file chosen, yet.";
    }
});

const pag_ibig_file = $('#pag_ibig_file')[0];
const pag_ibig_button = $('#pag_ibig_button')[0];
const pag_ibig_text = $('#pag_ibig_text')[0];

$('#pag_ibig_file').on('change',function(){
    if (pag_ibig_file.value) {
        pag_ibig_text.innerHTML = "<b> File Name: </b>" + pag_ibig_file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    } 
    else {
        pag_ibig_text.innerHTML = "No file chosen, yet.";
    }
});

//Preview of file upload in Modal
function changeImg(newSrc){
    var newSrcNow = newSrc.src;
    var largImg = document.getElementById('file_display');
    largImg.src = newSrcNow;
}

$('#preview_birthcertificate').on('click',function(){
    $('.modal-title').html('BIRTH CERTIFICATE');
});

$('#preview_nbi').on('click',function(){
    $('.modal-title').html('NBI');
});

$('#preview_barangay_clearance').on('click',function(){
    $('.modal-title').html('BARANGAY CLEARANCE');
});

$('#preview_police_clearance').on('click',function(){
    $('.modal-title').html('POLICE CLEARANCE');
});

$('#preview_police_clearance').on('click',function(){
    $('.modal-title').html('POLICE CLEARANCE');
});

$('#preview_sss').on('click',function(){
    $('.modal-title').html('SSS E1 FORM');
});

$('#preview_philhealth').on('click',function(){
    $('.modal-title').html('PHILHEALTH FORM');
});

$('#preview_pag_ibig').on('click',function(){
    $('.modal-title').html('PAGIBIG FORM');
});

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