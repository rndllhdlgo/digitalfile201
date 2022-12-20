$('#employee_number').on('keyup',function(){
    if($('#employee_number').val()){
        $.ajax({
            url: "/employees/employee_number/checkDuplicate",
            data:{
                employee_number : $('#employee_number').val(),
            },
            success: function(data){
                if(data == 'duplicate_employee_number'){
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
            url: "/employees/email_address/checkDuplicate",
            data:{
                email_address : $('#email_address').val(),
            },
            success: function(data){
                if(data == 'duplicate_email_address'){
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
            url: "/employees/telephone_number/checkDuplicate",
            data:{
                telephone_number : $('#telephone_number').val(),
            },
            success: function(data){
                if(data == 'duplicate_telephone_number'){
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
            url: "/employees/cellphone_number/checkDuplicate",
            data:{
                cellphone_number : $('#cellphone_number').val(),
            },
            success: function(data){
                if(data == 'duplicate_cellphone_number'){
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
            url: "/employees/father_cellphone_number/checkDuplicate",
            data:{
                father_contact_number : $('#father_contact_number').val(),
            },
            success: function(data){
                if(data == 'duplicate_father_contact_number'){
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
            url: "/employees/mother_cellphone_number/checkDuplicate",
            data:{
                mother_contact_number : $('#mother_contact_number').val(),
            },
            success: function(data){
                if(data == 'duplicate_mother_contact_number'){
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
            url: "/employees/spouse_cellphone_number/checkDuplicate",
            data:{
                spouse_contact_number : $('#spouse_contact_number').val(),
            },
            success: function(data){
                if(data == 'duplicate_spouse_contact_number'){
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
            url: "/employees/emergency_cellphone_number/checkDuplicate",
            data:{
                emergency_contact_number : $('#emergency_contact_number').val(),
            },
            success: function(data){
                if(data == 'duplicate_contact_number'){
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
            url: "/employees/company_email/checkDuplicate",
            data:{
                company_email_address : $('#company_email_address').val(),
            },
            success: function(data){
                if(data == 'duplicate_company_email_address'){
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
            url: "/employees/company_cellphone_number/checkDuplicate",
            data:{
                company_contact_number : $('#company_contact_number').val(),
            },
            success: function(data){
                if(data == 'duplicate_company_contact_number'){
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
