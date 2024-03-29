$('.name_validation').keyup(function(){
    var inputValue        = $(this).val();
    var validationId      = `validation_${$(this).attr('id')}`;
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

$('.letterNumber').keyup(function(){
    $(this).val($(this).val().replace(/[^a-zA-Z0-9\s]/g, ''));
});

$('.numberDash').keyup(function(){
    $(this).val($(this).val().replace(/[^0-9-]/g, ''));
});

$("input[type='date']").keydown(function(e){
    e.preventDefault();
});

function cellphoneFormat(id){
    $(`#${id}`).val($(`#${id}`).val().replace(/[^0-9]/g, '').replace(/(\d{4})/, '$1-'));
}

function emailCheck(emailId){
    var emailValue             = $(`#${emailId}`).val();
    var emailValidation        = `format_${emailId}`;
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

var origContainer = {};
function checkChange(element){
    if(!(element.id in origContainer)){
        origContainer[element.id] = element.value;
    }

    var enableUpdateButton = Object.keys(origContainer).some(function(id){
        return origContainer[id] !== document.getElementById(id).value;
    });

    disableUpdate(enableUpdateButton, 0, true);
}

function disableUpdate(fieldCheck, changeCounter, duplicate){
    return false;
    if(fieldCheck || changeCounter != 0 || !duplicate){
        $('#btnUpdate').prop('disabled', false);
    }
    else{
        $('#btnUpdate').prop('disabled', true);
    }
}

function duplicateCheck(table_name, column_name, id){
    var orig_value    = $(`#${id}`).attr('orig_value') ? $(`#${id}`).attr('orig_value').toLowerCase().trim() : '';
    var current_value = $(`#${id}`).val().toLowerCase().trim();

    if(orig_value === current_value || !$(`#${id}`).val().trim()){
        return false;
    }

    $.ajax({
        url: '/duplicateCheck',
        data:{
            table_name  : table_name,
            column_name : column_name,
            value       : $(`#${id}`).val()
        },
        success:function(response){
            if(response == 'true'){
                if(!$(`#${id}_validation`).length){
                    $(`#${id}`).after(`<p class="validation" id="${id}_validation"> <i class="fas fa-exclamation-triangle"></i> ALREADY EXIST! </p>`);
                    $(`#${id}_validation`).show();
                    disableUpdate('', '', true);
                }
            }
            else{
                disableUpdate('', '', false);
                $(`#${id}_validation`).remove();
            }
        }
    });
}