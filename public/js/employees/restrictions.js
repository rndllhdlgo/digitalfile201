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

var orig_value = {};

function duplicateCheck(inputId) {
    var inputValue = $(`#${inputId}`).val();
    var validationId = `validation_${inputId}`;

    if(!(inputId in orig_value)){
        orig_value[inputId] = inputValue;
    }

    if(orig_value[inputId].toUpperCase() !== inputValue.toUpperCase()){
        $.ajax({
            url: "/checkDuplicate",
            data: {
                inputColumn: inputId,
                inputValue: inputValue,
            },
            success: function (response) {
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

// function duplicateCheck(inputId, inputColumn, inputTable, inputStatus){
//     var orig_value = $(`#${inputId}`).attr('orig_value');
//     var inputValue = $(`#${inputId}`).val();
//     var validationId = `validation_${inputId}`;

//     if(orig_value.toUpperCase().trim() == inputValue.toUpperCase().trim()){
//         return false;
//     }
//     else{
//         $.ajax({
//             url: "/checkDuplicate",
//             data: {
//                 inputColumn: inputColumn,
//                 inputValue: inputValue,
//                 inputTable: inputTable,
//                 inputStatus: inputStatus
//             },
//             success: function(response){
//                 var validationElement = $(`#${validationId}`);
//                 if(response === 'true'){
//                     if(validationElement.length === 0){
//                         $(`#${inputId}`).addClass('redBorder');
//                         $(`#${inputId}`).after(`<p class="validation" id="${validationId}"><i class="fas fa-exclamation-triangle mx-2"></i>ALREADY EXIST!</p>`);
//                         $(`#${validationId}`).show();
//                     }
//                 }
//                 else{
//                     $(`#${inputId}`).removeClass('redBorder');
//                     validationElement.remove();
//                 }
//             }
//         });
//     }
// }

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

var origContainer = {};

function checkChange(element){
    if(!(element.id in origContainer)){
        origContainer[element.id] = element.value;
    }

    var enableUpdateButton = Object.keys(origContainer).some(function(id){
        return origContainer[id] !== document.getElementById(id).value;
    });

    disableUpdate(enableUpdateButton, 0);
}

function disableUpdate(fieldCheck, changeCounter){
    console.log(changeCounter);
    if(fieldCheck == true || changeCounter != 0){
        $('#btnUpdate').prop('disabled', false);
    }
    else{
        $('#btnUpdate').prop('disabled', true);
    }
}