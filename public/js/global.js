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

$(document).on('keypress', '.separated', function(e){
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8  || k == 13 || (k >= 48 && k <= 57));
});