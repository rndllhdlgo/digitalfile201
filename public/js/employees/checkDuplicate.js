$('#employee_number').on('keyup',function(){
    $.ajax({
        url: "/employee_number/checkDuplicate",
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
    if(email_address_orig != $('#email_address').val()){
        $.ajax({
            url: "/email_address/checkDuplicate",
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

$('#company_email_address').on('keyup',function(){
    $.ajax({
        url: "/company_email_address/checkDuplicate",
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