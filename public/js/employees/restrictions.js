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
    var salaryField = /[^- ₱ , . 0-9]/g;
    input.value = input.value.replace(salaryField,"");
}

function contactNumberOnly(input){
    var contact_number = /[^ +()0-9]/g; 
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

    function emailValidation(){
        if(email_address.value.match(regExp)){
            $('#email_validation').hide();
        }
        else{
            $('#email_validation').show();
        }
    }

var company_email_address = document.querySelector('#company_email_address');
var company_email_validation = document.querySelector('#company_email_validation');
let regExpr = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    function companyEmailValidation(){
        if(company_email_address.value.match(regExp)){
            $('#company_email_validation').hide();
        }
        else{
            $('#company_email_validation').show();
        }
    }
