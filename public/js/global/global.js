//Display current date and time
setInterval(dateTime,0)
function dateTime(){
    var d = new Date().toDateString();
    var t = new Date().toLocaleTimeString();
    document.getElementById("date").innerHTML = d + ' ' + t;
}

//Verify that the user has filled out all required fields.
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

    if($('#employee_information').is(":visible")){
        $('.formlabel').each(function(){
            var id = '#'+$(this).attr('for');
            var icon = '.'+$(this).attr('for')+'_icon';
            var icon_class = $(this).attr('for')+'_icon';
            var span = '.span_'+$(this).attr('for');
            if(!$(icon)[0] && $(id).hasClass('required_field')){
                $(span).append('<i class="fa-solid fa-triangle-exclamation '+icon_class+'" style="zoom: 125%;" title="Required"></i>');
            }
            if(!$(id).val()){
                $(icon).addClass('text-danger');
                $(icon).removeClass('text-default');
            }
            else{
                $(icon).removeClass('text-danger');
                $(icon).addClass('text-default');
            }
        });
    }
}

setInterval(checkJobDescription, 0);
function checkJobDescription(){
    if(!$('#employee_position').val()){
        $('#viewJobDescriptionBtn').prop('disabled',true);
    }
    else{
        $('#viewJobDescriptionBtn').prop('disabled',false);
    }
}

// $(".textarea_bullet").focus(function() {
//     if(document.getElementById('past_medical_condition').value === ''){
//         document.getElementById('past_medical_condition').value +='• ';
// 	}
//     else if(document.getElementById('allergies').value === ''){
//         document.getElementById('allergies').value +='• ';
//     }
// });
// $(".textarea_bullet").keyup(function(event){
// 	var keycode_past_medical_condition = (event.keyCode ? event.keyCode : event.which);
// 	var keycode_allergies = (event.keyCode ? event.keyCode : event.which);
//     if(keycode_past_medical_condition == '13'){
//         document.getElementById('past_medical_condition').value +='• ';
// 	}
//     if(keycode_allergies == '13'){
//         document.getElementById('allergies').value +='• ';
//     }

// 	var past_medical_condition_txt_val = document.getElementById('past_medical_condition').value;
// 	var allergies_txt_val = document.getElementById('allergies').value;
// 	if(past_medical_condition_txt_val.substr(past_medical_condition_txt_val.length - 1) == '\n'){
// 		document.getElementById('past_medical_condition').value = past_medical_condition_txt_val.substring(0,past_medical_condition_txt_val.length - 1);
// 	}
// 	else if(allergies_txt_val.substr(allergies_txt_val.length - 1) == '\n'){
// 		document.getElementById('allergies').value = allergies_txt_val.substring(0,allergies_txt_val.length - 1);
// 	}
// });

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

$(".textarea_medical_condition").focus(function() {
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

$(".textarea_allergies").focus(function() {
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

$(".textarea_medication").focus(function() {
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

$(".textarea_psychological_history").focus(function() {
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

$(".textarea_hmo_benefits").focus(function() {
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

$(".textarea_insurance").focus(function() {
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


// $(document).on('keypress', '.separated', function(e){
//     var k;
//     document.all ? k = e.keyCode : k = e.which;
//     return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8  || k == 13 || (k >= 48 && k <= 57));
// });