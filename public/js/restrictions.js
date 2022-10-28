//Email Format Validation Function
var email_address = document.querySelector("#email_address");
var email_validation = document.querySelector("#email_validation");
let regExp = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; //

function emailValidation(){
    if(email_address.value.match(regExp)){
        $('#email_validation').hide();
        $('#btnSave').prop("disabled",false);
    }
    else{
        $('#email_validation').show();
        $('#btnSave').prop("disabled",true);
    }
}

//Employee Email Format Validation Function
var employee_email_address = document.querySelector("#employee_email_address");
var employee_email_validation = document.querySelector("#employee_email_validation");
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

//Input(Letters Only) Function
    function lettersOnly(input){
      var letters_only = /[^- ñ a-z]/gi;//Everything (^) //Uppercase allowed (i) //Global (g)
        input.value = input.value.replace(letters_only,"");
    }
//Input(Numbers Only) Function
    function numbersOnly(input){
      var numbers_only = /[^- 0-9]/g;
        input.value = input.value.replace(numbers_only,"");
    }
//Input(Contact Number) Function
    function contactNumberOnly(input){
      var contact_number = /[^+()0-9]/g;
        input.value = input.value.replace(contact_number,"");
    }