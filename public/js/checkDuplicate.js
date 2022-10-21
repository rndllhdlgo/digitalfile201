//Check Duplication on Input Field
setInterval(checkEmployeeNumberDuplicate,200);
    function checkEmployeeNumberDuplicate(){
        if($('#employee_number').val()){
            $.ajax({
                url: "/employees/checkDuplicate",
                data:{
                    employee_number : $('#employee_number').val(),
                },
                success: function(data){
                    if(data == 'employee_number_duplicate_true'){
                        $('#check_duplicate').show();
                    }
                    else{
                        $('#check_duplicate').hide();
                    }
                }
            });
        }
    };

//Check Email Address Duplicate Function
setInterval(checkEmailAddress,200)
function checkEmailAddress(){
    if($('#email_address').val()){
        $.ajax({
            url: "/employees/checkEmailDuplicate",
            data:{
                email_address : $('#email_address').val(),
            },
            success: function(data){
                if(data == 'email_address_duplicate_true'){
                    $('#duplicate_email_address').show();
                }
                else{
                    $('#duplicate_email_address').hide();
                }
            }
        });
    }
};

//Check Telephone Number Duplicate Function
setInterval(checkTelephoneNumber,200)
function checkTelephoneNumber(){
    if($('#telephone_number').val()){
        $.ajax({
            url: "/employees/checkTelephoneNumberDuplicate",
            data:{
                telephone_number : $('#telephone_number').val(),
            },
            success: function(data){
                if(data == 'telephone_number_duplicate_true'){
                    $('#duplicate_telephone_number').show();
                }
                else{
                    $('#duplicate_telephone_number').hide();
                }
            }
        });
    }
};
// //Check Cellphone Number Duplicate Function
setInterval(checkCellphoneNumber,200)
function checkCellphoneNumber(){
    if($('#cellphone_number').val()){
        $.ajax({
            url: "/employees/checkCellphoneNumberDuplicate",
            data:{
                cellphone_number : $('#cellphone_number').val(),
            },
            success: function(data){
                if(data == 'cellphone_number_duplicate_true'){
                    $('#duplicate_cellphone_number').show();
                }
                else{
                    $('#duplicate_cellphone_number').hide();
                }
            }
        });
    }
};

//Check Father Contact Number Duplicate Function
setInterval(checkFatherContactNumber,200)
function checkFatherContactNumber(){
    if($('#father_contact_number').val()){
        $.ajax({
            url: "/employees/checkFatherCellphoneNumberDuplicate",
            data:{
                father_contact_number : $('#father_contact_number').val(),
            },
            success: function(data){
                if(data == 'father_contact_number_duplicate_true'){
                    $('#duplicate_father_contact_number').show();
                }
                else{
                    $('#duplicate_father_contact_number').hide();
                }
            }
        });
    }
};

//Check Mother Contact Number Duplicate Function
setInterval(checkMotherContactNumber,200)
function checkMotherContactNumber(){
    if($('#mother_contact_number').val()){
        $.ajax({
            url: "/employees/checkMotherCellphoneNumberDuplicate",
            data:{
                mother_contact_number : $('#mother_contact_number').val(),
            },
            success: function(data){
                if(data == 'mother_contact_number_duplicate_true'){
                    $('#duplicate_mother_contact_number').show();
                }
                else{
                    $('#duplicate_mother_contact_number').hide();
                }
            }
        });
    }
};

//Check Mother Contact Number Duplicate Function
setInterval(checkEmergencyContactNumber,200)
function checkEmergencyContactNumber(){
    if($('#emergency_contact_number').val()){
        $.ajax({
            url: "/employees/checkEmergencyContactNumberDuplicate",
            data:{
                emergency_contact_number : $('#emergency_contact_number').val(),
            },
            success: function(data){
                if(data == 'emergency_contact_number_duplicate_true'){
                    $('#duplicate_emergency_contact_number').show();
                }
                else{
                    $('#duplicate_emergency_contact_number').hide();
                }
            }
        });
    }
};

//Check Company Email Address Duplicate Function
setInterval(checkCompanyEmailAddress,200)
function checkCompanyEmailAddress(){
    if($('#employee_email_address').val()){
        $.ajax({
            url: "/employees/checkEmployeeEmailAddressDuplicate",
            data:{
                employee_email_address : $('#employee_email_address').val(),
            },
            success: function(data){
                if(data == 'employee_email_address_duplicate_true'){
                    $('#duplicate_employee_email').show();
                }
                else{
                    $('#duplicate_employee_email').hide();
                }
            }
        });
    }
};
//Check Employee Contact Number Duplicate Function
setInterval(checkCompanyEmployeeNumber,200)
function checkCompanyEmployeeNumber(){
    if($('#employee_contact_number').val()){
        $.ajax({
            url: "/employees/checkEmployeeContactNumberDuplicate",
            data:{
                employee_contact_number : $('#employee_contact_number').val(),
            },
            success: function(data){
                if(data == 'employee_contact_number_duplicate_true'){
                    $('#duplicate_employee_contact_number').show();
                }
                else{
                    $('#duplicate_employee_contact_number').hide();
                }
            }
        });
    }
};