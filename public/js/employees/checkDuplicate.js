$('#employee_number').on('keyup',function(){
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
});

$('#email_address').on('keyup',function(){
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
});

$('#telephone_number').on('keyup',function(){
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
});

$('#cellphone_number').on('keyup',function(){
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
});

$('#father_contact_number').on('keyup',function(){
    $.ajax({
        url: "/employees/father_contact_number/checkDuplicate",
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
});

$('#mother_contact_number').on('keyup',function(){
    $.ajax({
        url: "/employees/mother_contact_number/checkDuplicate",
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
});

$('#emergency_contact_number').on('keyup',function(){
    $.ajax({
        url: "/employees/emergency_contact_number/checkDuplicate",
        data:{
            emergency_contact_number : $('#emergency_contact_number').val(),
        },
        success: function(data){
            if(data == 'duplicate_emergency_contact_number'){
                $('#duplicate_emergency_contact_number').show();
                $('#emergency_contact_number').addClass('duplicate_field');
            }
            else{
                $('#duplicate_emergency_contact_number').hide();
                $('#emergency_contact_number').removeClass('duplicate_field');
            }
        }
    });
});

$('#company_email_address').on('keyup',function(){
    $.ajax({
        url: "/employees/company_email_address/checkDuplicate",
        data:{
            company_email_address : $('#company_email_address').val(),
        },
        success: function(data){
            if(data == 'duplicate_company_email_address'){
                $('#duplicate_company_email_address').show();
                $('#company_email_address').addClass('duplicate_field');
            }
            else{
                $('#duplicate_company_email_address').hide();
                $('#company_email_address').removeClass('duplicate_field');
            }
        }
    });
});

$('#company_contact_number').on('keyup',function(){
    $.ajax({
        url: "/employees/company_contact_number/checkDuplicate",
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
});

$('#sss_number').on('keyup',function(){
    $.ajax({
        url: "/employees/sss_number/checkDuplicate",
        data:{
            sss_number : $('#sss_number').val(),
        },
        success: function(data){
            if(data == 'duplicate_sss_number'){
                $('#duplicate_sss_number').show();
                $('#sss_number').addClass('duplicate_field');
            }
            else{
                $('#duplicate_sss_number').hide();
                $('#sss_number').removeClass('duplicate_field');
            }
        }
    });
});

$('#pag_ibig_number').on('keyup',function(){
    $.ajax({
        url: "/employees/pag_ibig_number/checkDuplicate",
        data:{
            pag_ibig_number : $('#pag_ibig_number').val(),
        },
        success: function(data){
            if(data == 'duplicate_pag_ibig_number'){
                $('#duplicate_pag_ibig_number').show();
                $('#pag_ibig_number').addClass('duplicate_field');
            }
            else{
                $('#duplicate_pag_ibig_number').hide();
                $('#pag_ibig_number').removeClass('duplicate_field');
            }
        }
    });
});

$('#philhealth_number').on('keyup',function(){
    $.ajax({
        url: "/employees/philhealth_number/checkDuplicate",
        data:{
            philhealth_number : $('#philhealth_number').val(),
        },
        success: function(data){
            if(data == 'duplicate_philhealth_number'){
                $('#duplicate_philhealth_number').show();
                $('#philhealth_number').addClass('duplicate_field');
            }
            else{
                $('#duplicate_philhealth_number').hide();
                $('#philhealth_number').removeClass('duplicate_field');
            }
        }
    });
});

$('#tin_number').on('keyup',function(){
    $.ajax({
        url: "/employees/tin_number/checkDuplicate",
        data:{
            tin_number : $('#tin_number').val(),
        },
        success: function(data){
            if(data == 'duplicate_tin_number'){
                $('#duplicate_tin_number').show();
                $('#tin_number').addClass('duplicate_field');
            }
            else{
                $('#duplicate_tin_number').hide();
                $('#tin_number').removeClass('duplicate_field');
            }
        }
    });
});

$('#account_number').on('keyup',function(){
    $.ajax({
        url: "/employees/account_number/checkDuplicate",
        data:{
            account_number : $('#account_number').val(),
        },
        success: function(data){
            if(data == 'duplicate_account_number'){
                $('#duplicate_account_number').show();
                $('#account_number').addClass('duplicate_field');
            }
            else{
                $('#duplicate_account_number').hide();
                $('#account_number').removeClass('duplicate_field');
            }
        }
    });
});


