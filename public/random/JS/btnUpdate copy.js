//Update Employee Data
$('#btnUpdate').on('click',function(){
    var id = $('#hidden_id').val();
    // Personal Information
    sendFile();
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var middle_name = $('#middle_name').val();
    var suffix = $('#suffix').val();
    var birthday = $('#birthday').val();
    var gender = $('#gender').val();
    var civil_status = $('#civil_status').val();
    var home_address = $('#home_address').val();
    var email_address = $('#email_address').val();
    var telephone_number = $('#telephone_number').val();
    var cellphone_number = $('#cellphone_number').val();
    var spouse_name = $('#spouse_name').val();
    var spouse_contact_number = $('#spouse_contact_number').val();
    var spouse_profession = $('#spouse_profession').val();
    var father_name = $('#father_name').val();
    var father_contact_number = $('#father_contact_number').val();
    var father_profession = $('#father_profession').val();
    var mother_name = $('#mother_name').val();
    var mother_contact_number = $('#mother_contact_number').val();
    var mother_profession = $('#mother_profession').val();
    var emergency_contact_name = $('#emergency_contact_name').val();
    var emergency_contact_relationship = $('#emergency_contact_relationship').val();
    var emergency_contact_number = $('#emergency_contact_number').val();
    var cover_image = $('#cover_image').prop('files')[0];
    console.log(cover_image);
    //Work Information
    var employee_number = $('#employee_number').val();
    var company_of_employee = $('#company_of_employee').val();
    var branch_of_employee = $('#branch_of_employee').val();
    var status_of_employee = $('#status_of_employee').val();
    var shift_of_employee = $('#shift_of_employee').val();
    var position_of_employee = $('#position_of_employee').val();
    var supervisor_of_employee = $('#supervisor_of_employee').val();
    var date_hired = $('#date_hired').val();
    var company_email_address = $('#company_email_address').val();
    var company_contact_number = $('#company_contact_number').val();
    var sss_number = $('#sss_number').val();
    var pag_ibig_number = $('#pag_ibig_number').val();
    var philhealth_number = $('#philhealth_number').val();
    var tin_number = $('#tin_number').val();
    var account_number = $('#account_number').val();
    //School Information
    var secondary_school_name = $('#secondary_school_name').val();
    var secondary_school_address = $('#secondary_school_address').val();
    var secondary_school_inclusive_years = $('#secondary_school_inclusive_years').val();
    var primary_school_name = $('#primary_school_name').val();
    var primary_school_address = $('#primary_school_address').val();
    var primary_school_inclusive_years = $('#primary_school_inclusive_years').val();

    Swal.fire({
        title: 'Do you want to finish editing?',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((update) => {
        if (update.isConfirmed) {
            $.ajax({
                url:"/employees/update", //route name (web.php)
                type:"POST",
                headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//For anti forgery
                },
                data:{
                //Personal Information
                    id:id,
                    first_name:first_name,
                    last_name:last_name,
                    middle_name:middle_name,
                    suffix:suffix,
                    birthday:birthday,
                    gender:gender,
                    civil_status:civil_status,
                    home_address:home_address,
                    email_address:email_address,
                    telephone_number:telephone_number,
                    cellphone_number:cellphone_number,
                    spouse_name:spouse_name,
                    spouse_contact_number:spouse_contact_number,
                    spouse_profession:spouse_profession,
                    father_name:father_name,
                    father_contact_number:father_contact_number,
                    father_profession:father_profession,
                    mother_name:mother_name,
                    mother_contact_number:mother_contact_number,
                    mother_profession:mother_profession,
                    emergency_contact_name:emergency_contact_name,
                    emergency_contact_relationship:emergency_contact_relationship,
                    emergency_contact_number:emergency_contact_number,
                    fileName:fileName,
                //Work Information
                    employee_number: employee_number,
                    company_of_employee:company_of_employee,
                    branch_of_employee:branch_of_employee,
                    status_of_employee:status_of_employee,
                    shift_of_employee:shift_of_employee,
                    position_of_employee:position_of_employee,
                    supervisor_of_employee:supervisor_of_employee,
                    date_hired:date_hired,
                    company_email_address:company_email_address,
                    company_contact_number:company_contact_number,
                    sss_number:sss_number,
                    pag_ibig_number:pag_ibig_number,
                    philhealth_number:philhealth_number,
                    tin_number:tin_number,
                    account_number:account_number,
                //School Information
                    secondary_school_name:secondary_school_name,
                    secondary_school_address:secondary_school_address,
                    secondary_school_inclusive_years:secondary_school_inclusive_years,
                    primary_school_name:primary_school_name,
                    primary_school_address:primary_school_address,
                    primary_school_inclusive_years:primary_school_inclusive_years
                },
                success: function(data){
                    if(data == 'true'){
                        Swal.fire("EDIT SUCCESS"," ","success");
                        setTimeout(function(){window.location.reload()}, 2000);
                    }
                    else{
                        Swal.fire("EDIT FAILED"," ","error");
                    }
                },
                error: function(data){
                    if(data.status == 401){
                        window.location.reload();
                    }
                    alert(data.responseText);
                }
            });
        } 
        else if (update.isDenied) {
            Swal.fire("EDIT CANCELLED"," ","error");
        }
    });
});

//Update User Data
$('#btnUserUpdate').on('click',function(){
    var id = $('#user_id').val();
    var user_level = $('#user_level').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var status = $('#status').val();

    Swal.fire({
        title:'Do you want to update details?',
        allowOutsideClick : false,
        allowEscapeKey: false,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
        customClass: {
        actions: 'my-actions',
        confirmButton: 'order-2',
        denyButton: 'order-3',
        }
    }).then((update) =>{
        if(update.isConfirmed){
            $.ajax({
                url: "/users/updateUser",
                type:"POST",
                headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//For anti forgery
                },
                data:{
                    id:id,
                    user_level:user_level,
                    name:name,
                    email:email,
                    status:status
                },
                success: function(data){
                    if(data == 'true'){
                        $('#usersModal').modal('hide');
                        Swal.fire("EDIT SUCCESS","","success");
                        setTimeout(function(){$('#usersTable').DataTable().ajax.reload();}, 2000);
                    }
                    else{
                        $('#usersModal').modal('hide');
                        Swal.fire("EDIT FAILED","","error");
                        setTimeout(function(){$('#usersTable').DataTable().ajax.reload();}, 2000);
                    }  
                },
                error: function(data){
                    if(data.status == 401){
                        window.location.reload();
                    }
                    alert(data.responseText);
                }
            });
        }
        else if (update.isDenied) {
            Swal.fire("EDIT CANCELLED"," ","error");
        }
    });
});