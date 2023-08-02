var current_location = $(location).attr('pathname')+window.location.search;
var current_user = $('#current_user').val();
var current_user_level = $('#current_user_level').val();
var current_employee_number = $('#current_employee_number').val();
var current_email = $('#current_email').val();
var data_update, standby = true;

setInterval(checkRequiredFields, 0);
function checkRequiredFields(){
    if($(".required_field:visible").length > 0){
        $('.required_field').each(function(){
            if(!$(this).val()){
                $(this).addClass('border border-danger');
            }
            else{
                $(this).removeClass('border border-danger');
            }
        });
    }
}

setInterval(() => {
    if($('#changePassword').is(':visible')){
        if($('#pass2').val().length < 8){
            if(!$('#validation1').hasClass('text-danger')){
                $('#validation1').addClass('text-danger');
            }
            $('#validation1').removeClass('text-success');

            if(!$('#validicon1').hasClass('fa-times-circle')){
                $('#validicon1').addClass('fa-times-circle');
            }
            $('#validicon1').removeClass('fa-check-circle');
        }
        else{
            if(!$('#validation1').hasClass('text-success')){
                $('#validation1').addClass('text-success');
            }
            $('#validation1').removeClass('text-danger');

            if(!$('#validicon1').hasClass('fa-check-circle')){
                $('#validicon1').addClass('fa-check-circle');
            }
            $('#validicon1').removeClass('fa-times-circle');
        }

        if(/\d/.test($('#pass2').val()) != true){
            if(!$('#validation2').hasClass('text-danger')){
                $('#validation2').addClass('text-danger');
            }
            $('#validation2').removeClass('text-success');

            if(!$('#validicon2').hasClass('fa-times-circle')){
                $('#validicon2').addClass('fa-times-circle');
            }
            $('#validicon2').removeClass('fa-check-circle');
        }
        else{
            if(!$('#validation2').hasClass('text-success')){
                $('#validation2').addClass('text-success');
            }
            $('#validation2').removeClass('text-danger');

            if(!$('#validicon2').hasClass('fa-check-circle')){
                $('#validicon2').addClass('fa-check-circle');
            }
            $('#validicon2').removeClass('fa-times-circle');
        }

        if(/[A-Z]/.test($('#pass2').val()) != true){
            if(!$('#validation3').hasClass('text-danger')){
                $('#validation3').addClass('text-danger');
            }
            $('#validation3').removeClass('text-success');

            if(!$('#validicon3').hasClass('fa-times-circle')){
                $('#validicon3').addClass('fa-times-circle');
            }
            $('#validicon3').removeClass('fa-check-circle');
        }
        else{
            if(!$('#validation3').hasClass('text-success')){
                $('#validation3').addClass('text-success');
            }
            $('#validation3').removeClass('text-danger');

            if(!$('#validicon3').hasClass('fa-check-circle')){
                $('#validicon3').addClass('fa-check-circle');
            }
            $('#validicon3').removeClass('fa-times-circle');
        }

        if(/[a-z]/.test($('#pass2').val()) != true){
            if(!$('#validation4').hasClass('text-danger')){
                $('#validation4').addClass('text-danger');
            }
            $('#validation4').removeClass('text-success');

            if(!$('#validicon4').hasClass('fa-times-circle')){
                $('#validicon4').addClass('fa-times-circle');
            }
            $('#validicon4').removeClass('fa-check-circle');
        }
        else{
            if(!$('#validation4').hasClass('text-success')){
                $('#validation4').addClass('text-success');
            }
            $('#validation4').removeClass('text-danger');

            if(!$('#validicon4').hasClass('fa-check-circle')){
                $('#validicon4').addClass('fa-check-circle');
            }
            $('#validicon4').removeClass('fa-times-circle');
        }

        if(/[!@#$%^&*(),.?":{}|<>]/.test($('#pass2').val()) != true){
            if(!$('#validation5').hasClass('text-danger')){
                $('#validation5').addClass('text-danger');
            }
            $('#validation5').removeClass('text-success');

            if(!$('#validicon5').hasClass('fa-times-circle')){
                $('#validicon5').addClass('fa-times-circle');
            }
            $('#validicon5').removeClass('fa-check-circle');
        }
        else{
            if(!$('#validation5').hasClass('text-success')){
                $('#validation5').addClass('text-success');
            }
            $('#validation5').removeClass('text-danger');

            if(!$('#validicon5').hasClass('fa-check-circle')){
                $('#validicon5').addClass('fa-check-circle');
            }
            $('#validicon5').removeClass('fa-times-circle');
        }

        if($('.fa-times-circle').is(':visible')){
            if(!$('#pass2').hasClass('invalidInput')){
                $('#pass2').addClass('invalidInput');
            }
            $('#pass2').removeClass('defaultInput');
        }
        else{
            if(!$('#pass2').hasClass('defaultInput')){
                $('#pass2').addClass('defaultInput');
            }
            $('#pass2').removeClass('invalidInput');
        }
    }
}, 0);

$('#pass3').on('keyup',function(){
    if($('#pass2').val() != $('#pass3').val()){
        $('#password_match').show();
        if(!$('#pass3').hasClass('invalidInput')){
            $('#pass3').addClass('invalidInput');
        }
        $('#pass3').removeClass('defaultInput');
    }
    else{
        $('#password_match').hide();
        if(!$('#pass3').hasClass('defaultInput')){
            $('#pass3').addClass('defaultInput');
        }
        $('#pass3').removeClass('invalidInput');
    }
});

$(document).ready(function(){
    $('#show_password_eye').click(function(){
        $('#show_password').click();
        if($('#show_password').is(':checked')){
            $('#show_password_text').text('HIDE PASSWORD');
            $('#show_password_eye').removeClass('fa-eye').addClass('fa-eye-slash');
            $('#pass1').attr('type','text');
            $('#pass2').attr('type', 'text');
            $('#pass3').attr('type', 'text');
        }
        else{
            $('#show_password_text').text('SHOW PASSWORD');
            $('#show_password_eye').addClass('fa-eye').removeClass('fa-eye-slash');
            $('#pass1').attr('type','password');
            $('#pass2').attr('type', 'password');
            $('#pass3').attr('type', 'password');
        }
    });
    $('#show_password_text').click(function(){
        $('#show_password_eye').click();
    });
});

setInterval(() => {
    if(!$('#employee_position').val()){
        $('#viewJobDescriptionBtn').prop('disabled',true);
    }
    else{
        $('#viewJobDescriptionBtn').prop('disabled',false);
    }
}, 0);

$("textarea").keypress(function() {
    if ($(this).val() === '') {
        $(this).val('• ');
    }
});

$("textarea").keyup(function(event) {
    var textarea = (event.keyCode ? event.keyCode : event.which);
    if (textarea == '13') {
        $(this).val(function(index, value) {
            return value + '• ';
        });
    }
    var textarea_val = $(this).val();
    if(textarea_val.substr(textarea_val.length - 1) == '\n'){
        $(this).val(textarea_val.substring(0, textarea_val.length - 1));
    }
});

var app_timeout = $('#APP_TIMEOUT').val();

function decodeHtml(str){
    var map = {'&amp;': '&', '&lt;': '<', '&gt;': '>', '&quot;': '"', '&#039;': "'"};
    return str.replace(/&amp;|&lt;|&gt;|&quot;|&#039;/g, function(m){return map[m];});
}

$('body').on('cut paste', function(){
    setTimeout(function(){
        $(':focus').keyup();
    }, app_timeout);
});

$(document).ready(function(){
    setInterval(() => {
        if($('#current_datetime').is(":visible")){
            var today_Date = new Date();
            var today_Month = today_Date.getMonth() + 1;
            var today_Day = today_Date.getDate();
            var today_Year = today_Date.getFullYear();
            var today_Time = new Date().toLocaleTimeString();

            if(today_Month < 10) today_Month = '0' + today_Month.toString();
            if(today_Day < 10) today_Day = '0' + today_Day.toString();

            var today_DateFormat = today_Year + '-' + today_Month + '-' + today_Day;
            today_DateFormat = moment(today_DateFormat, 'YYYY-MM-DD').format('dddd, MMMM DD, YYYY');
            current_datetime.textContent = today_DateFormat + ', ' + today_Time;
        }
    }, 0);
});

function idleLogout(){
    var timer;
    window.onload = resetTimer;
    window.onmousedown = resetTimer;
    window.onmousemove = resetTimer;
    window.onclick = resetTimer;
    window.oncontextmenu = resetTimer;
    window.onwheel = resetTimer;
    window.onkeydown = resetTimer;
    function resetTimer(){
        clearTimeout(timer);
        timer = setTimeout(() => {
            $('#loading').show();
            window.location.href = '/logout';
        }, 3600000);
    }
}
idleLogout();

function idleStandby(){
    var timeout;
    window.onmousemove = resetStandby;
    window.onclick = resetStandby;
    window.oncontextmenu = resetStandby;
    window.onwheel = resetStandby;
    window.onkeydown = resetStandby;
    function resetStandby(){
        standby = false;
        clearTimeout(timeout);
        timeout = setTimeout(function(){
            if($('#loading').is(':hidden')){
                standby = true;
            }
        }, 3000);
    }
}
idleStandby();

$('#changePasswordSpan').on('click',function(){
    $('#changePasswordModal').modal('show');
});

var checkRequired = true, checkChanges = true, checkInvalid = true, checkDuplicate = true;
setInterval(checkReqFields, 0);
function checkReqFields(){
    if($('#loading').is(':hidden')){
        if($(".req_field:visible").length > 0){
            $('.req_field').each(function(){
                if(!$.trim($(this).val())){
                    $(this).addClass('requiredInput');
                }
                else{
                    $(this).removeClass('requiredInput');
                }
            });
        }
        if($(".requiredInput:visible").length > 0 || $(".requiredAlert:visible").length > 0){
            checkRequired = false;
            $('.requiredNote').show();
        }
        else{
            checkRequired = true;
            $('.requiredNote').hide();
        }
        if($(".changesNote:visible").length > 0){
            checkChanges = false;
        }
        else{
            checkChanges = true;
        }
        if($(".invalidInput:visible").length > 0){
            $('.invalidNote').show();
            checkInvalid = false;
        }
        else{
            $('.invalidNote').hide();
            checkInvalid = true;
        }
        if($(".duplicateInput:visible").length > 0){
            $('.duplicateNote').show();
            checkDuplicate = false;
        }
        else{
            $('.duplicateNote').hide();
            checkDuplicate = true;
        }
         if(checkRequired == true && checkChanges == true && checkInvalid == true && checkDuplicate == true){
            $('.btnRequired').prop('disabled', false);
        }
        else{
            $('.btnRequired').prop('disabled', true);
        }
    }
}

$(document).ready(function() {
    var headerText = $('.my-header').text();
    if(!headerText){
        $('title').text('201 FILING SYSTEM');
    }
    else{
        $('title').text('201 FILING SYSTEM | ' + headerText);
    }
});

function formatDate(dateString) {
    var date = new Date(dateString);
    var monthNames = [
      "Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.", "Jul.", "Aug.", "Sep.", "Oct.", "Nov.", "Dec."
    ];
    var monthIndex = date.getMonth();
    var day = date.getDate();
    var year = date.getFullYear();

    return monthNames[monthIndex] + ' ' + ('0' + day).slice(-2) + ', ' + year;
  }


$('#btnCancel').on('click', function() {
    Swal.fire({
        title: 'Do you want to exit?',
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
    }).then((cancel) => {
      if(cancel.isConfirmed){
        setTimeout(function(){location.href= "/employees";}, 1000);
        $('#loading').show();
      }
      else if(cancel.isDenied){
      }
    });
});

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

$(document).on('keyup','.name_validation',function(){
    if($(this).val().length < 2){
        $(this).next('.validation').show();
    }
    else{
        $(this).next('.validation').hide();
    }
});

$("input[type='date']").keydown(function (event) { event.preventDefault(); });

$(document).ready(function() {
    var currentDate = new Date();

    $('.max_month').attr('max', currentDate.toISOString().substring(0, 7));
});

$(document).ready(function(){
    $('#btnPdf').click(function(){
        $('#see_more').click();
        $('#print_file').printThis({
            importCSS: true
        });
    });
});

$(function(){
    var dtTodays = new Date();
    var months = dtTodays.getMonth() + 1;
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

//Employees
$('#tab1').on('click',function(){
    $(this).blur();
    $('#tab1').addClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_info').fadeIn();
    $('#work_info').hide();
    $('#education_trainings').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').hide();
    $('#evaluation').hide();
    $('#compensation_benefits').hide();
    $('#logs').hide();
});

$('#tab2').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').addClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_info').hide();
    $('#work_info').show();
    $('#education_trainings').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').hide();
    $('#evaluation').hide();
    $('#compensation_benefits').hide();
    $('#logs').hide();
    $('.keyup').keyup();
});

$('#tab3').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').addClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_info').hide();
    $('#work_info').hide();
    $('#education_trainings').show();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').hide();
    $('#evaluation').hide();
    $('#compensation_benefits').hide();
    $('#logs').hide();
});

$('#tab4').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').addClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_info').hide();
    $('#work_info').hide();
    $('#education_trainings').hide();
    $('#job_history').show();
    $('#medical_history').hide();
    $('#documents').hide();
    $('#evaluation').hide();
    $('#compensation_benefits').hide();
    $('#logs').hide();
});

$('#tab5').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').addClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_info').hide();
    $('#work_info').hide();
    $('#education_trainings').hide();
    $('#job_history').hide();
    $('#medical_history').show();
    $('#documents').hide();
    $('#evaluation').hide();
    $('#compensation_benefits').hide();
    $('#logs').hide();
});

$('#tab6').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').addClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_info').hide();
    $('#work_info').hide();
    $('#education_trainings').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').show();
    $('#evaluation').hide();
    $('#compensation_benefits').hide();
    $('#logs').hide();
});

$('#tab7').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').addClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_info').hide();
    $('#work_info').hide();
    $('#education_trainings').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').hide();
    $('#evaluation').show();
    $('#compensation_benefits').hide();
    $('#logs').hide();
});

$('#tab8').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').addClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_info').hide();
    $('#work_info').hide();
    $('#education_trainings').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').hide();
    $('#evaluation').hide();
    $('#compensation_benefits').show();
    $('#logs').hide();
});

$('#tab9').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').addClass('tabactive');

    $('#personal_info').hide();
    $('#work_info').hide();
    $('#education_trainings').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').hide();
    $('#evaluation').hide();
    $('#compensation_benefits').hide();
    $('#logs').show();
    $('.keyup').keyup();
});

//Maintenance
$('#company_tab').addClass('tabactive');
$('#maintenance-span').text('- COMPANY');

$('#company_tab').on('click',function(){
    $(this).blur();
    $('#maintenance-span').text('- COMPANY');
    $('#company_tab').addClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#department_tab').removeClass('tabactive');
    $('#position_tab').removeClass('tabactive');

    $('#company_div').fadeIn();
    $('#branch_div').hide();
    $('#shift_div').hide();
    $('#supervisor_div').hide();
    $('#department_div').hide();
    $('#position_div').hide();

    $('#addPositionBtn').hide();
});

$('#department_tab').on('click',function(){
    $(this).blur();
    $('#maintenance-span').text('- DEPARTMENT');
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#department_tab').addClass('tabactive');
    $('#position_tab').removeClass('tabactive');

    $('#company_div').hide();
    $('#branch_div').hide();
    $('#shift_div').hide();
    $('#supervisor_div').hide();
    $('#department_div').show();
    $('#position_div').hide();

    $('#addPositionBtn').hide();
});

$('#branch_tab').on('click',function(){
    $(this).blur();
    $('#maintenance-span').text('- BRANCH');
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').addClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#department_tab').removeClass('tabactive');
    $('#position_tab').removeClass('tabactive');

    $('#company_div').hide();
    $('#branch_div').show();
    $('#shift_div').hide();
    $('#supervisor_div').hide();
    $('#department_div').hide();
    $('#position_div').hide();

    $('#addPositionBtn').hide();
});

$('#shift_tab').on('click',function(){
    $(this).blur();
    $('#maintenance-span').text('- SHIFT');
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').addClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#department_tab').removeClass('tabactive');
    $('#position_tab').removeClass('tabactive');

    $('#company_div').hide();
    $('#branch_div').hide();
    $('#shift_div').show();
    $('#supervisor_div').hide();
    $('#department_div').hide();
    $('#position_div').hide();

    $('#addPositionBtn').hide();
});

$('#position_tab').on('click',function(){
    $(this).blur();
    $('#maintenance-span').text('- POSITIONS');
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#department_tab').removeClass('tabactive');
    $('#position_tab').addClass('tabactive');

    $('#company_div').hide();
    $('#branch_div').hide();
    $('#shift_div').hide();
    $('#supervisor_div').hide();
    $('#department_div').hide();
    $('#position_div').show();
    $('#filter1').keyup();
    $('#addPositionBtn').show();
});

$('#fill').on('click',function(){
    $('#college_name').val('A');
    $('#college_degree').val('A');
    $('#college_inclusive_years_from').val('2023-05');
    $('#college_inclusive_years_to').val('2023-05');
    $('#collegeAdd').click();
    $('#training_name').val('A');
    $('#training_title').val('A');
    $('#training_inclusive_years_from').val('2023-05');
    $('#training_inclusive_years_to').val('2023-05');
    $('#trainingAdd').click();
    $('#vocational_name').val('A');
    $('#vocational_course').val('A');
    $('#vocational_inclusive_years_from').val('2023-05');
    $('#vocational_inclusive_years_to').val('2023-05');
    $('#vocationalAdd').click();
    $('#job_company_name').val('A');
    $('#job_description').val('A');
    $('#job_position').val('A');
    $('#job_contact_number').val('1');
    $('#job_inclusive_years_from').val('2023-05');
    $('#job_inclusive_years_to').val('2023-05');
    $('#jobHistoryAdd').click();
    $('#employee_insurance').val('• A');
});

function getCurrentDate(){
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0');
    const day = String(today.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}
$('.future_date').attr('max', getCurrentDate());

$(document).ready(function(){
    $('.filter-input').attr('title', 'SEARCH');
});