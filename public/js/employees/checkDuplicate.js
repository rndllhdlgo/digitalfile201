// //Check Duplication on Input Field
// setInterval(checkEmployeeNumberDuplicate,200);
//     function checkEmployeeNumberDuplicate(){
//         if($('#employee_number').val()){
//             $.ajax({
//                 url: "/employees/checkDuplicate",
//                 data:{
//                     employee_number : $('#employee_number').val(),
//                 },
//                 success: function(data){
//                     if(data == 'true'){
//                         $('#check_duplicate').show();
//                     }
//                     else{
//                         $('#check_duplicate').hide();
//                     }
//                 }
//             });
//         }
//     };

$('#employee_number').on('keyup',function(){
    if($('#employee_number').val()){
        $.ajax({
            url: "/employees/checkDuplicate",
            data:{
                employee_number : $('#employee_number').val(),
            },
            success: function(data){
                if(data == 'true'){
                    $('#check_duplicate').show();
                    $('#employee_number').addClass('check_duplicate');
                }
                else{
                    $('#check_duplicate').hide();
                    $('#employee_number').removeClass('check_duplicate');
                }
            }
        });
    }
});

$('#email_address').on('keyup',function(){
    if($('#email_address').val()){
        $.ajax({
            url: "/employees/checkEmailDuplicate",
            data:{
                email_address : $('#email_address').val(),
            },
            success: function(data){
                if(data == 'true'){
                    $('#duplicate_email_address').show();
                    $('#email_address').addClass('check_duplicate');
                }
                else{
                    $('#duplicate_email_address').hide();
                    $('#email_address').removeClass('check_duplicate');
                }
            }
        });
    }
});

$('#telephone_number').on('keyup',function(){
    if($('#telephone_number').val()){
        $.ajax({
            url: "/employees/checkTelephoneNumberDuplicate",
            data:{
                telephone_number : $('#telephone_number').val(),
            },
            success: function(data){
                if(data == 'true'){
                    $('#duplicate_telephone_number').show();
                    $('#telephone_number').addClass('check_duplicate');
                }
                else{
                    $('#duplicate_telephone_number').hide();
                    $('#telephone_number').removeClass('check_duplicate');
                }
            }
        });
    }
});

$('#cellphone_number').on('keyup',function(){
    if($('#cellphone_number').val()){
        $.ajax({
            url: "/employees/checkCellphoneNumberDuplicate",
            data:{
                cellphone_number : $('#cellphone_number').val(),
            },
            success: function(data){
                if(data == 'true'){
                    $('#duplicate_cellphone_number').show();
                    $('#cellphone_number').addClass('check_duplicate');
                }
                else{
                    $('#duplicate_cellphone_number').hide();
                    $('#cellphone_number').removeClass('check_duplicate');
                }
            }
        });
    }
});

$('#father_contact_number').on('keyup',function(){
    if($('#father_contact_number').val()){
        $.ajax({
            url: "/employees/checkFatherCellphoneNumberDuplicate",
            data:{
                father_contact_number : $('#father_contact_number').val(),
            },
            success: function(data){
                if(data == 'true'){
                    $('#duplicate_father_contact_number').show();
                    $('#father_contact_number').addClass('check_duplicate');
                }
                else{
                    $('#duplicate_father_contact_number').hide();
                    $('#father_contact_number').addClass('check_duplicate');
                }
            }
        });
    }
});

$('#mother_contact_number').on('keyup',function(){
    if($('#mother_contact_number').val()){
        $.ajax({
            url: "/employees/checkMotherCellphoneNumberDuplicate",
            data:{
                mother_contact_number : $('#mother_contact_number').val(),
            },
            success: function(data){
                if(data == 'true'){
                    $('#duplicate_mother_contact_number').show();
                    $('#mother_contact_number').addClass('check_duplicate');
                }
                else{
                    $('#duplicate_mother_contact_number').hide();
                    $('#mother_contact_number').removeClass('check_duplicate');
                }
            }
        });
    }
});

$('#spouse_contact_number').on('keyup',function(){
    if($('#spouse_contact_number').val()){
        $.ajax({
            url: "/employees/checkSpouseCellphoneNumberDuplicate",
            data:{
                spouse_contact_number : $('#spouse_contact_number').val(),
            },
            success: function(data){
                if(data == 'true'){
                    $('#duplicate_spouse_contact_number').show();
                    $('#spouse_contact_number').addClass('check_duplicate');
                }
                else{
                    $('#duplicate_spouse_contact_number').hide();
                    $('#spouse_contact_number').removeClass('check_duplicate');
                }
            }
        });
    }
});

$('#emergency_contact_number').on('keyup',function(){
    if($('#emergency_contact_number').val()){
        $.ajax({
            url: "/employees/checkEmergencyContactNumberDuplicate",
            data:{
                emergency_contact_number : $('#emergency_contact_number').val(),
            },
            success: function(data){
                if(data == 'true'){
                    $('#duplicate_emergency_contact_number').show();
                    $('#emergency_contact_number').addClass('check_duplicate');
                }
                else{
                    $('#duplicate_emergency_contact_number').hide();
                    $('#emergency_contact_number').removeClass('check_duplicate');
                }
            }
        });
    }
});

$('#employee_email_address').on('keyup',function(){
    if($('#employee_email_address').val()){
        $.ajax({
            url: "/employees/checkEmployeeEmailAddressDuplicate",
            data:{
                employee_email_address : $('#employee_email_address').val(),
            },
            success: function(data){
                if(data == 'true'){
                    $('#duplicate_employee_email').show();
                    $('#employee_email_address').addClass('check_duplicate');
                }
                else{
                    $('#duplicate_employee_email').hide();
                    $('#employee_email_address').removeClass('check_duplicate');
                }
            }
        });
    }
});

$('#employee_contact_number').on('keyup',function(){
    if($('#employee_contact_number').val()){
        $.ajax({
            url: "/employees/checkEmployeeContactNumberDuplicate",
            data:{
                employee_contact_number : $('#employee_contact_number').val(),
            },
            success: function(data){
                if(data == 'true'){
                    $('#duplicate_employee_contact_number').show();
                    $('#employee_contact_number').addClass('check_duplicate');
                }
                else{
                    $('#duplicate_employee_contact_number').hide();
                    $('#employee_contact_number').removeClass('check_duplicate');
                }
            }
        });
    }
});
