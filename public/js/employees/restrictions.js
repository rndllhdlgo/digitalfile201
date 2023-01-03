function lettersOnly(input){
    var letters_only = /[^- ñ a-z]/gi;
    input.value = input.value.replace(letters_only,"");
}

function firstNameField(input){
    var firstNameField = /[^- ñ a-z 0-9]/gi;
    input.value = input.value.replace(firstNameField,"");
}

function numbersOnly(input){
    var numbers_only = /[^- 0-9]/g;
    input.value = input.value.replace(numbers_only,"");
}

function salaryField(input){
    var salaryField = /[^0-9]/g;
    input.value = input.value.replace(salaryField,"");
}

function contactNumberOnly(input){
    var contact_number = /[^. 0-9]/g; 
    input.value = input.value.replace(contact_number,"");
}

function telephoneNumberField(input){
    var telephoneNumberField = /[^- +()0-9]/g; 
    input.value = input.value.replace(telephoneNumberField,"");
}

$('.required_field').keypress(function(e){
    if(e.which == 13)
    return false;
});

$('.optional_field').keypress(function(e){
    if(e.which == 13)
    return false;
});

$('.multiple_field').keypress(function(e){
    if(e.which == 13)
    return false;
});

$('#email_address').keypress(function(e){
    if(e.which == 32)
    return false;
});

$('#company_email_address').keypress(function(e){
    if(e.which == 32)
    return false;
});

var email_address = document.querySelector('#email_address');
var email_validation = document.querySelector('#email_validation');
let regExp = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

$('#email_address').on('keyup',function(){
    if(email_address.value.match(regExp)){
        $('#email_validation').hide();
    }
    else{
        $('#email_validation').show();
    }
});
    
var company_email_address = document.querySelector('#company_email_address');
var company_email_validation = document.querySelector('#company_email_validation');
let regExpr = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

$('#company_email_address').on('keyup',function(){
    if(company_email_address.value.match(regExp)){
        $('#company_email_validation').hide();
    }
    else{
        $('#company_email_validation').show();
    }
});

//Disable future dates/ Date Hired Function
$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;    
    $('#child_birthday').attr('max', maxDate);
    $('#date_hired').attr('max', maxDate);
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
