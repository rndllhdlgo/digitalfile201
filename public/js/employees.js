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

    $('#title_details').removeClass('alert-info');
    $('#title_details').addClass('alert-warning');
    $('#title_details').html('<i class="fas fa-exclamation"></i> <b> NOTE:</b> Please fill all the required fields');
});

//Image Upload
var fileName;
function sendFile() {//This function will trigger if the btnSave click
    var formData = new FormData();
    var file = $('#cover_image').prop('files')[0];

    formData.append('file', file);
    // Don't use serialize here, as it is used when we want to send the data of entire form in a query string way and that will not work for file upload
    $.ajax({
        url: '/employees/insertImage',
        method: 'post',
        data: formData,
        contentType : false,
        processData : false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
          console.log(response);
          fileName = response;
            // Do what ever you want to do on success
        }
    });
}

//Fill all required fields/ Check required fields
setInterval(checkforblank,0);
function checkforblank(){
    if($('.required_field').filter(function(){ return !!this.value; }).length != (41 + addRequiredField) || $('#email_validation').is(":visible") || $('#cellphone_number_validation').is(":visible") || $('#emergency_contact_number_validation').is(":visible") || $("#spouse_contact_number_validation").is(":visible") || $("#employee_email_validation").is(":visible") || $("#employee_contact_number_validation").is(":visible") || $('#check_duplicate').is(":visible")){
    // if($('.required_field').filter(function(){ return !!this.value; }).length != (20 + addRequiredField) || $('#email_validation').is(":visible") || $('#cellphone_number_validation').is(":visible") || $('#emergency_contact_number_validation').is(":visible") || $("#spouse_contact_number_validation").is(":visible") || $("#employee_email_validation").is(":visible") || $("#employee_contact_number_validation").is(":visible") || $('#check_duplicate').is(":visible")){
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
$('#single_parent').hide();
$('#spouse').hide();
    function changeStatus(){
      var status = document.getElementById("civil_status");

      if(status.value == "Married"){
          $('#spouse').show();
          $('#single_parent').hide();
          $('#spouse_name').addClass('required_field');
          $('#spouse_contact_number').addClass('required_field');
          $('#spouse_profession').addClass('required_field');
          addRequiredField+=3;
      }
      else if(status.value == "Single Parent"){
          $('#spouse').hide();
          $('#single_parent').show();
      }
      else{
          $('#single_parent').hide();
          $('#spouse').hide();
          $('#spouse_name').removeClass('required_field');
          $('#spouse_contact_number').removeClass('required_field');
          $('#spouse_profession').removeClass('required_field');
          addRequiredField-=3;
      }
    }

//Navigation Active Pills
$('#tab1').on('click',function(){
    $('#tab1').addClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#personal_information').fadeIn();
    $('#work_information').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#documents').hide();
});
$('#tab2').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').addClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#personal_information').hide();
    $('#work_information').show();
    $('#educational_background').hide();
    $('#documents').hide();
});
$('#tab3').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').addClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#personal_information').hide();
    $('#work_information').hide();
    $('#educational_background').show();
    $('#documents').hide();
});
$('#tab4').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').addClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#personal_information').hide();
    $('#work_information').hide();
    $('#educational_background').hide();
    $('#job_history').show();
    $('#documents').hide();
});
$('#tab5').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').addClass('tabactive');
    $('#personal_information').hide();
    $('#work_information').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#documents').show();
});

//This function is to calculate age
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
    $('#output').attr('src',''); //Remove current preview
    $('#output').hide();
    $('#image_close').hide();
    $('#image_user').show();
    $('#image_button').show();
    $('.column-1').css("height","250px");
    $('#image_button').css("margin-top","198px");
    $('#cover_image').click();
});


//Display Image and Validation
function ValidateFileUpload() {
    var fuData = document.getElementById('cover_image');
    var FileUploadPath = fuData.value;
    var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

    if (Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "gif") {
        if (fuData.files && fuData.files[0]) {
          var reader = new FileReader();
            reader.onload = function(e) {
                $('#output').attr('src', e.target.result);
            }
            reader.readAsDataURL(fuData.files[0]);
            $('#image_user').hide();
            $('#image_button').hide();
            $('#image_close').show();
            $('.column-1').css("height","300px");
            $('#output').show();
        }
    } 
    else {
      Swal.fire({
          title: 'UNSUPPORTED FILE SELECTED',
          icon: 'error',
          text: 'Please upload file with an extension of (.jpg, .jpeg, .png, .gif)',
          allowOutsideClick: false,
          allowEscapeKey: false
      });
  }
}

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
