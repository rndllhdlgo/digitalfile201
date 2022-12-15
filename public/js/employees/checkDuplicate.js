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
                    $('#employee_number').addClass('duplicate_field');
                }
                else{
                    $('#check_duplicate').hide();
                    $('#employee_number').removeClass('duplicate_field');
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
                    $('#email_address').addClass('duplicate_field');
                }
                else{
                    $('#duplicate_email_address').hide();
                    $('#email_address').removeClass('duplicate_field');
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
                    $('#telephone_number').addClass('duplicate_field');
                }
                else{
                    $('#duplicate_telephone_number').hide();
                    $('#telephone_number').removeClass('duplicate_field');
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
                    $('#cellphone_number').addClass('duplicate_field');
                }
                else{
                    $('#duplicate_cellphone_number').hide();
                    $('#cellphone_number').removeClass('duplicate_field');
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
                    $('#father_contact_number').addClass('duplicate_field');
                }
                else{
                    $('#duplicate_father_contact_number').hide();
                    $('#father_contact_number').removeClass('duplicate_field');
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
                    $('#mother_contact_number').addClass('duplicate_field');
                }
                else{
                    $('#duplicate_mother_contact_number').hide();
                    $('#mother_contact_number').removeClass('duplicate_field');
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
                    $('#spouse_contact_number').addClass('duplicate_field');
                }
                else{
                    $('#duplicate_spouse_contact_number').hide();
                    $('#spouse_contact_number').removeClass('duplicate_field');
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
                    $('#emergency_contact_number').addClass('duplicate_field');
                }
                else{
                    $('#duplicate_emergency_contact_number').hide();
                    $('#emergency_contact_number').removeClass('duplicate_field');
                }
            }
        });
    }
});

$('#company_email_address').on('keyup',function(){
    if($('#company_email_address').val()){
        $.ajax({
            url: "/employees/checkEmployeeEmailAddressDuplicate",
            data:{
                company_email_address : $('#company_email_address').val(),
            },
            success: function(data){
                if(data == 'true'){
                    $('#duplicate_employee_email').show();
                    $('#company_email_address').addClass('duplicate_field');
                }
                else{
                    $('#duplicate_employee_email').hide();
                    $('#company_email_address').removeClass('duplicate_field');
                }
            }
        });
    }
});

$('#company_contact_number').on('keyup',function(){
    if($('#company_contact_number').val()){
        $.ajax({
            url: "/employees/checkEmployeeContactNumberDuplicate",
            data:{
                company_contact_number : $('#company_contact_number').val(),
            },
            success: function(data){
                if(data == 'true'){
                    $('#duplicate_company_contact_number').show();
                    $('#company_contact_number').addClass('duplicate_field');
                }
                else{
                    $('#duplicate_company_contact_number').hide();
                    $('#company_contact_number').removeClass('duplicate_field');
                }
            }
        });
    }
});
