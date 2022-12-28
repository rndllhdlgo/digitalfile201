
//Function for Image Upload
var fileName;
function sendFile() {//This function will trigger if the btnSave click
    var formData = new FormData();
    var file = $('#cover_image').prop('files')[0];

    formData.append('file', file);
    // Don't use serialize here, as it is used when we want to send the data of entire form in a query string way and that will not work for file upload
    $.ajax({
        url: '/employees/insertImage',
        method: 'post',
        data: formData,
        contentType : false,
        processData : false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
          console.log(response);
          fileName = response;
            // Do what ever you want to do on success
        }
    });
}

//Save Employee Form
$('#btnSave').on('click', function(){
        //Personal Information
        sendFile();
        var employee_number = $.trim($('#employee_number').val());//.trim()function removes all newlines, spaces (including non-breaking spaces)
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var middle_name = $('#middle_name').val();
        var suffix = $('#suffix').val();
        var birthday = $('#birthday').val();
        var gender = $('#gender').val();
        var civil_status = $('#civil_status').val();

        var region = $("#region option:selected").text();
        var province = $("#province option:selected").text();
        var city = $("#city option:selected").text();

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
        //Work Information
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
        var cover_image = $('#cover_image').prop('files')[0];
        console.log(cover_image);

        // go = false,
        
        Swal.fire({
        title: 'Do you want to save?',
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
    }).then((save) => {
        if (save.isConfirmed) {
            $.ajax({
                url:"/employees/save", //route name (web.php)
                type:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//For anti forgery
                },
                data:{
                    //Personal Information
                    employee_number:employee_number,
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
                    //Work Information
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
                    secondary_school_name:secondary_school_name,
                    secondary_school_address:secondary_school_address,
                    secondary_school_inclusive_years:secondary_school_inclusive_years,
                    primary_school_name:primary_school_name,
                    primary_school_address:primary_school_address,
                    primary_school_inclusive_years:primary_school_inclusive_years,
                    fileName:fileName
                },
                success: function(data){
                        if(data != ''){
                            if($('#college_education_table').is(":visible") || $('#vocational_table').is(":visible") || $('#trainings_table').is(":visible") || $('#job_table').is(":visible") || $('#memos_table').is(":visible") || $('#evaluation_table').is(":visible") || $('#contracts_table').is(":visible") || $('#resignation_table').is(":visible") || $('#termination_table').is(":visible")){//Check if the element is visible base on its id
                                $('#employee_id').val(data);
                                $('#multiple_data_insert_form').submit();//Submit function of multiple_data_insert_form will trigger
                            }
                            else{
                                Swal.fire("SAVE SUCCESS", "", "success");
                                setTimeout(function(){$('#employeesTable').DataTable().ajax.reload();}, 2000);//used to reload the table based on its id
                                setTimeout(function(){location.reload();}, 2000);                        
                            }
                    }
                    else{
                        Swal.fire("SAVE FAILED", "", "error");
                        setTimeout(function(){$('#employeesTable').DataTable().ajax.reload();}, 2000);
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
        else if (save.isDenied) {

        }
    });
});

//Save User Form
$('#btnUserSave').on('click',function(){
    var user_level = $('#user_level').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var status = $('#status').val();
    var password = $('#password').val();
    var confirm = $('#confirm').val();

    if(user_level && name && email && status && password && confirm){
        if(password != confirm){
            Swal.fire("ERROR","Password does not match!","error");
            return false;
        }
        Swal.fire({
            title: 'Do you want to save?',
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
        }).then((save) => {
            if(save.isConfirmed){
                $.ajax({
                    url: '/users/saveUser',
                    type: "POST",
                    headers:{
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{
                        user_level:user_level,
                        name:name,
                        email:email,
                        status:status,
                        password:password
                    },
                    success: function(data){
                        if(data == 'true'){
                            $('#usersModal').modal('hide');
                            Swal.fire("USER ADD SUCCESSFULLY","","success");
                            setTimeout(function(){window.location.reload()}, 2000);
                        }
                        else if(data == 'duplicate'){
                            Swal.fire("DUPLICATE EMAIL", "Email address already exists!", "error");
                            return false;
                        }
                        else{
                            $('#usersModal').modal('hide');
                            Swal.fire("SAVE FAILED", "New user save failed!", "error");
                            setTimeout(function(){window.location.reload()}, 2000);
                        }
                    },
                });
            }
        });   
    }
    else{
        Swal.fire("REQUIRED", "Please fill all required fields!", "error");
    }
});