$('.name_validation').keyup(function(){
    var inputValue = $(this).val();
    var validationId = `validation_${$(this).attr('id')}`;
    var validationElement = $(`#${validationId}`);

    if(inputValue.length < 2){
        if(!validationElement.length){
            $(this).after(`<p id="${validationId}" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>`);
            $(`#${validationId}`).show();
        }
    }
    else{
        validationElement.remove();
    }
});

$('.preventSpace').keypress(function(e){
    if(e.which == 32){
        return false;
    }
});

$('.letterNumber').keyup(function() {
    var inputValue = $(this).val();
    var cleanedValue = inputValue.replace(/[^a-zA-Z0-9\s]/g, '');
    $(this).val(cleanedValue);
});

$('.numberDash').on('keyup', function(){
    var numberDash = $(this).val();
    var numberDashValue = numberDash.replace(/[^0-9-]/g, '');
    $(this).val(numberDashValue);
});

$('.numberSlice').keyup(function(){
    let inputValue = $(this).val();
        inputValue = inputValue.replace(/-/g, '');
        if(inputValue.length > 4){
            inputValue = inputValue.slice(0, 4) + '-' + inputValue.slice(4);
        }
        if(inputValue.length > 12){
            inputValue = inputValue.slice(0, 12);
        }
        $(this).val(inputValue);
});

var orig_value = '';
var current_input = '';
var codeExecuted = false;

function duplicateCheck(inputId){
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
    if(tblChange == 'CHANGED_ROW'
    || employee_image_change == 'CHANGED'
    || document_change == 'CHANGED'
    ){
        $('#btnUpdate').prop('disabled', false);
    }
}, 0);