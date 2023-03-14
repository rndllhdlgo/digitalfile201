var current_location = $(location).attr('pathname')+window.location.search;
var current_user = $('#current_user').val();
var current_user_level = $('#current_user_level').val();
var current_employee_number = $('#current_employee_number').val();
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

    // if($('#employee_information').is(":visible")){
    //     $('.formlabel').each(function(){
    //         var id = '#'+$(this).attr('for');
    //         var icon = '.'+$(this).attr('for')+'_icon';
    //         var icon_class = $(this).attr('for')+'_icon';
    //         var span = '.span_'+$(this).attr('for');
    //         if(!$(icon)[0] && $(id).hasClass('required_field')){
    //             $(span).append('<i class="fa-solid fa-triangle-exclamation '+icon_class+'" style="zoom: 125%;" title="Required"></i>');
    //         }
    //         if(!$(id).val()){
    //             $(icon).addClass('text-danger');
    //             $(icon).removeClass('text-default');
    //         }
    //         else{
    //             $(icon).removeClass('text-danger');
    //             $(icon).addClass('text-default');
    //         }
    //     });
    // }
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

setInterval(checkJobDescription, 0);
function checkJobDescription(){
    if(!$('#employee_position').val()){
        $('#viewJobDescriptionBtn').prop('disabled',true);
    }
    else{
        $('#viewJobDescriptionBtn').prop('disabled',false);
    }
}

//Add bullet in textarea
$(".textarea_job_description").focus(function() {
    if(document.getElementById('job_description').value === ''){
        document.getElementById('job_description').value +='• ';
	}
});
$(".textarea_job_description").keyup(function(event){
	var keycode_job_description = (event.keyCode ? event.keyCode : event.which);
    if(keycode_job_description == '13'){
        document.getElementById('job_description').value +='• ';
	}
	var job_description_txt_val = document.getElementById('job_description').value;
	if(job_description_txt_val.substr(job_description_txt_val.length - 1) == '\n'){
		document.getElementById('job_description').value = job_description_txt_val.substring(0,job_description_txt_val.length - 1);
	}
});

$(".textarea_job_description_new").focus(function() {
    if(document.getElementById('job_description_new').value === ''){
        document.getElementById('job_description_new').value +='• ';
	}
});
$(".textarea_job_description_new").keyup(function(event){
	var keycode_job_description_new = (event.keyCode ? event.keyCode : event.which);
    if(keycode_job_description_new == '13'){
        document.getElementById('job_description_new').value +='• ';
	}
	var job_description_new_txt_val = document.getElementById('job_description_new').value;
	if(job_description_new_txt_val.substr(job_description_new_txt_val.length - 1) == '\n'){
		document.getElementById('job_description_new').value = job_description_new_txt_val.substring(0,job_description_new_txt_val.length - 1);
	}
});

$(".textarea_job_requirements").focus(function() {
    if(document.getElementById('job_requirements').value === ''){
        document.getElementById('job_requirements').value +='• ';
	}
});
$(".textarea_job_requirements").keyup(function(event){
	var keycode_job_requirements = (event.keyCode ? event.keyCode : event.which);
    if(keycode_job_requirements == '13'){
        document.getElementById('job_requirements').value +='• ';
	}
	var job_requirements_txt_val = document.getElementById('job_requirements').value;
	if(job_requirements_txt_val.substr(job_requirements_txt_val.length - 1) == '\n'){
		document.getElementById('job_requirements').value = job_requirements_txt_val.substring(0,job_requirements_txt_val.length - 1);
	}
});

$(".textarea_job_requirements_new").focus(function() {
    if(document.getElementById('job_requirements_new').value === ''){
        document.getElementById('job_requirements_new').value +='• ';
	}
});
$(".textarea_job_requirements_new").keyup(function(event){
	var keycode_job_requirements_new = (event.keyCode ? event.keyCode : event.which);
    if(keycode_job_requirements_new == '13'){
        document.getElementById('job_requirements_new').value +='• ';
	}
	var job_requirements_new_txt_val = document.getElementById('job_requirements_new').value;
	if(job_requirements_new_txt_val.substr(job_requirements_new_txt_val.length - 1) == '\n'){
		document.getElementById('job_requirements_new').value = job_requirements_new_txt_val.substring(0,job_requirements_new_txt_val.length - 1);
	}
});

$(".textarea_medical_condition").keypress(function() {
    if(document.getElementById('past_medical_condition').value === ''){
        document.getElementById('past_medical_condition').value +='• ';
	}
});
$(".textarea_medical_condition").keyup(function(event){
	var keycode_medical_condition = (event.keyCode ? event.keyCode : event.which);
    if(keycode_medical_condition == '13'){
        document.getElementById('past_medical_condition').value +='• ';
	}
	var medical_condition_txt_val = document.getElementById('past_medical_condition').value;
	if(medical_condition_txt_val.substr(medical_condition_txt_val.length - 1) == '\n'){
		document.getElementById('past_medical_condition').value = medical_condition_txt_val.substring(0,medical_condition_txt_val.length - 1);
	}
});

$(".textarea_allergies").keypress(function() {
    if(document.getElementById('allergies').value === ''){
        document.getElementById('allergies').value +='• ';
	}
});
$(".textarea_allergies").keyup(function(event){
	var keycode_allergies = (event.keyCode ? event.keyCode : event.which);
    if(keycode_allergies == '13'){
        document.getElementById('allergies').value +='• ';
	}
	var allergies_txt_val = document.getElementById('allergies').value;
	if(allergies_txt_val.substr(allergies_txt_val.length - 1) == '\n'){
		document.getElementById('allergies').value = allergies_txt_val.substring(0,allergies_txt_val.length - 1);
	}
});

$(".textarea_medication").keypress(function() {
    if(document.getElementById('medication').value === ''){
        document.getElementById('medication').value +='• ';
	}
});
$(".textarea_medication").keyup(function(event){
	var keycode_medication = (event.keyCode ? event.keyCode : event.which);
    if(keycode_medication == '13'){
        document.getElementById('medication').value +='• ';
	}
	var medication_txt_val = document.getElementById('medication').value;
	if(medication_txt_val.substr(medication_txt_val.length - 1) == '\n'){
		document.getElementById('medication').value = medication_txt_val.substring(0,txtval5.length - 1);
	}
});

$(".textarea_psychological_history").keypress(function() {
    if(document.getElementById('psychological_history').value === ''){
        document.getElementById('psychological_history').value +='• ';
	}
});
$(".textarea_psychological_history").keyup(function(event){
	var keycode_psychological_history = (event.keyCode ? event.keyCode : event.which);
    if(keycode_psychological_history == '13'){
        document.getElementById('psychological_history').value +='• ';
	}
	var psychological_history_txt_val = document.getElementById('psychological_history').value;
	if(psychological_history_txt_val.substr(psychological_history_txt_val.length - 1) == '\n'){
		document.getElementById('psychological_history').value = psychological_history_txt_val.substring(0,psychological_history_txt_val.length - 1);
	}
});

$(".textarea_hmo_benefits").keypress(function() {
    if(document.getElementById('hmo_benefits').value === ''){
        document.getElementById('hmo_benefits').value +='• ';
	}
});
$(".textarea_hmo_benefits").keyup(function(event){
	var keycode6 = (event.keyCode ? event.keyCode : event.which);
    if(keycode6 == '13'){
        document.getElementById('hmo_benefits').value +='• ';
	}
	var txtval6 = document.getElementById('hmo_benefits').value;
	if(txtval6.substr(txtval6.length - 1) == '\n'){
		document.getElementById('hmo_benefits').value = txtval6.substring(0,txtval6.length - 1);
	}
});

$(".textarea_hmo_benefits").keypress(function() {
    if(document.getElementById('hmo_benefits').value === ''){
        document.getElementById('hmo_benefits').value +='• ';
	}
});
$(".textarea_hmo_benefits").keyup(function(event){
	var keycode6 = (event.keyCode ? event.keyCode : event.which);
    if(keycode6 == '13'){
        document.getElementById('hmo_benefits').value +='• ';
	}
	var txtval6 = document.getElementById('hmo_benefits').value;
	if(txtval6.substr(txtval6.length - 1) == '\n'){
		document.getElementById('hmo_benefits').value = txtval6.substring(0,txtval6.length - 1);
	}
});

$(".textarea_insurance").keypress(function() {
    if(document.getElementById('employee_insurance').value === ''){
        document.getElementById('employee_insurance').value +='• ';
	}
});
$(".textarea_insurance").keyup(function(event){
	var keycode7 = (event.keyCode ? event.keyCode : event.which);
    if(keycode7 == '13'){
        document.getElementById('employee_insurance').value +='• ';
	}
	var txtval7 = document.getElementById('employee_insurance').value;
	if(txtval7.substr(txtval7.length - 1) == '\n'){
		document.getElementById('employee_insurance').value = txtval7.substring(0,txtval7.length - 1);
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
    setInterval(displayClock, 0);
    function displayClock(){
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
    }
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
    $('title').text('DIGITAL 201 FILE | ' + headerText);
});