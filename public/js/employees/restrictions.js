function lettersOnly(input){
    var letters_only = /[^- ñ a-z]/gi;
    input.value = input.value.replace(letters_only,"");
}

function alphaNumeric(input){
    var alphaNumeric = /[^- ñ a-z 0-9]/gi;
    input.value = input.value.replace(alphaNumeric,"");
}

function numbersOnly(input){
    var numbers_only = /[^- 0-9]/g;
    input.value = input.value.replace(numbers_only,"");
}

function contactNumberOnly(input){
    var contact_number = /[^. 0-9]/g;
    input.value = input.value.replace(contact_number,"");
}

function telephoneNumberField(input){
    var telephoneNumberField = /[^- +()0-9]/g;
    input.value = input.value.replace(telephoneNumberField,"");
}

$('.preventSpace').keypress(function(e) {
    if(e.which == 32){
        return false;
    }
});

$('.numberInput').on('input', function(){
    var inputtedValue = $(this).val();
    var formattedValue = inputtedValue.replace(/[^0-9]/g, '')// Remove non-numeric characters
    if(formattedValue.length > 4){
        formattedValue = formattedValue.slice(0, 4) + '-' + formattedValue.slice(4);
    }
    $(this).val(formattedValue);
});

var orig_value = '';
var current_input = '';
var codeExecuted = false;

function duplicateCheck(inputId){
    console.log(inputId);
    var inputValue = $(`#${inputId}`).val();
    var validationId = `validation_${inputId}`;

    if(current_input === ''){
        current_input = inputId;
    }

    if(current_input !== inputId){
        current_input = '';
        current_input = inputId;
        orig_value = '';
    }

    if(orig_value === ''){
        orig_value = inputValue;
        codeExecuted = true;
    }

    if(orig_value !== inputValue && inputValue.trim() !== ''){
        $.ajax({
            url: "/checkDuplicate",
            data: {
                inputColumn: inputId,
                inputValue: inputValue,
            },
            success: function(response){
                var validationElement = $(`#${validationId}`);
                if(response === 'true'){
                    if(validationElement.length === 0){
                        $(`#${inputId}`).after(`<p class="validation" id="${validationId}"><i class="fas fa-exclamation-triangle"></i> ALREADY EXIST! </p>`);
                        $(`#${validationId}`).show();
                    }
                }
                else{
                    validationElement.remove();
                }
            }
        });
    }
}

function emailCheck(emailId) {
    var emailValue = $(`#${emailId}`).val();
    var emailValidation = `format_${emailId}`;
    var emailValidationElement = $(`#${emailValidation}`);
    let regExp = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if(emailValue.trim() !== ''){
        if(!$(`#${emailId}`).val().match(regExp)){
            if(emailValidationElement.length === 0){
                $(`#${emailId}`).after(`<p class="validation" id="${emailValidation}"><i class="fas fa-exclamation-triangle"></i> PLEASE ENTER VALID EMAIL ADDRESS! </p>`);
                $(`#${emailValidation}`).show();
            }
        }
        else{
            emailValidationElement.remove();
        }
    }
    else{
        emailValidationElement.remove();
    }
}

var orig_values = {};

function updateCheck(inputElementId){
    var element = $(`#${inputElementId}`);

    if(!element.length){
        return; // Exit if the element doesn't exist
    }

    var value;

    if(element.is('input, textarea')){
        value = element.val();
    }
    else if(element.is('select')){
        value = element.find('option:selected').val();
    }

    if(!(inputElementId in orig_values)){
        orig_values[inputElementId] = value;
    }

    var isAnyValueChanged = Object.keys(orig_values).some(function(id){
        var originalValue = orig_values[id];
        var currentValue;
        var currentElement = $(`#${id}`);

        if(currentElement.is('input, textarea')){
            currentValue = currentElement.val();
        }
        else if(currentElement.is('select')){
            currentValue = currentElement.find('option:selected').val();
        }

        if(originalValue === null || currentValue === null){
            return false; // Skip comparison if any value is null
        }

        return originalValue.toUpperCase().trim() !== currentValue.toUpperCase().trim();
    });

    $('#btnUpdate').prop('disabled', !isAnyValueChanged);
}

setInterval(() => {
    if(tblChange == 'CHANGED_ROW' || employee_image_change == 'CHANGED'){
        $('#btnUpdate').prop('disabled', false);
    }
}, 0);