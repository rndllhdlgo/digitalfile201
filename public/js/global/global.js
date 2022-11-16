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
                $(this).addClass('requiredInput');
            }
            else{
                $(this).removeClass('requiredInput');
            }
        });
    }

    if($('#employee_personal_information').is(":visible")){
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

//Add bullet in textarea
$(".textarea_job_description").focus(function() {
    if(document.getElementById('job_description').value === ''){
        document.getElementById('job_description').value +='• ';
	}
});
$(".textarea_job_description").keyup(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        document.getElementById('job_description').value +='• ';
	}
	var txtval = document.getElementById('job_description').value;
	if(txtval.substr(txtval.length - 1) == '\n'){
		document.getElementById('job_description').value = txtval.substring(0,txtval.length - 1);
	}
});

$(".textarea_job_requirements").focus(function() {
    if(document.getElementById('job_requirements').value === ''){
        document.getElementById('job_requirements').value +='• ';
	}
});
$(".textarea_job_requirements").keyup(function(event){
	var keycode2 = (event.keyCode ? event.keyCode : event.which);
    if(keycode2 == '13'){
        document.getElementById('job_requirements').value +='• ';
	}
	var txtval2 = document.getElementById('job_requirements').value;
	if(txtval2.substr(txtval2.length - 1) == '\n'){
		document.getElementById('job_requirements').value = txtval2.substring(0,txtval2.length - 1);
	}
});

$(".textarea_medical_condition").focus(function() {
    if(document.getElementById('past_medical_condition').value === ''){
        document.getElementById('past_medical_condition').value +='• ';
	}
});
$(".textarea_medical_condition").keyup(function(event){
	var keycode3 = (event.keyCode ? event.keyCode : event.which);
    if(keycode3 == '13'){
        document.getElementById('past_medical_condition').value +='• ';
	}
	var txtval3 = document.getElementById('past_medical_condition').value;
	if(txtval3.substr(txtval3.length - 1) == '\n'){
		document.getElementById('past_medical_condition').value = txtval3.substring(0,txtval3.length - 1);
	}
});

$(".textarea_allergies").focus(function() {
    if(document.getElementById('allergies').value === ''){
        document.getElementById('allergies').value +='• ';
	}
});
$(".textarea_allergies").keyup(function(event){
	var keycode4 = (event.keyCode ? event.keyCode : event.which);
    if(keycode4 == '13'){
        document.getElementById('allergies').value +='• ';
	}
	var txtval4 = document.getElementById('allergies').value;
	if(txtval4.substr(txtval4.length - 1) == '\n'){
		document.getElementById('allergies').value = txtval4.substring(0,txtval4.length - 1);
	}
});

$(".textarea_medication").focus(function() {
    if(document.getElementById('medication').value === ''){
        document.getElementById('medication').value +='• ';
	}
});
$(".textarea_medication").keyup(function(event){
	var keycode5 = (event.keyCode ? event.keyCode : event.which);
    if(keycode5 == '13'){
        document.getElementById('medication').value +='• ';
	}
	var txtval5 = document.getElementById('medication').value;
	if(txtval5.substr(txtval5.length - 1) == '\n'){
		document.getElementById('medication').value = txtval5.substring(0,txtval5.length - 1);
	}
});

$(".textarea_psychiatric_history").focus(function() {
    if(document.getElementById('psychiatric_history').value === ''){
        document.getElementById('psychiatric_history').value +='• ';
	}
});
$(".textarea_psychiatric_history").keyup(function(event){
	var keycode6 = (event.keyCode ? event.keyCode : event.which);
    if(keycode6 == '13'){
        document.getElementById('psychiatric_history').value +='• ';
	}
	var txtval6 = document.getElementById('psychiatric_history').value;
	if(txtval6.substr(txtval6.length - 1) == '\n'){
		document.getElementById('psychiatric_history').value = txtval6.substring(0,txtval6.length - 1);
	}
});


// $(document).on('keypress', '.separated', function(e){
//     var k;
//     document.all ? k = e.keyCode : k = e.which;
//     return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8  || k == 13 || (k >= 48 && k <= 57));
// });