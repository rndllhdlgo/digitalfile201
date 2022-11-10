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