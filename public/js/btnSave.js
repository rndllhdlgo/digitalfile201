//This JS page is to save all the data

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

//Save Employee Function
$('#btnSave').on('click', function(){
        sendFile();
        var employee_number = $.trim($('#employee_number').val());//.trim()function removes all newlines, spaces (including non-breaking spaces)
        var first_name = $.trim($('#first_name').val());
        var last_name = $.trim($('#last_name').val());
        var middle_name = $.trim($('#middle_name').val());
        var suffix = $.trim($('#suffix').val());
        var nickname = $.trim($('#nickname').val());
        var birthday = $('#birthday').val();
        var gender = $('#gender').val();
        var civil_status = $('#civil_status').val();
        var street = $('#street').val();
        var region = $("#region option:selected").text();
        var province = $("#province option:selected").text();
        var city = $("#city option:selected").text();
        var height = $("#height").val();
        var weight = $("#weight").val();
        var religion = $("#religion").val();
        var email_address = $('#email_address').val();
        var telephone_number = $.trim($('#telephone_number').val());
        var cellphone_number = $.trim($('#cellphone_number').val());
        var spouse_name = $.trim($('#spouse_name').val());
        var spouse_contact_number = $.trim($('#spouse_contact_number').val());
        var spouse_profession = $.trim($('#spouse_profession').val());
        var father_name = $.trim($('#father_name').val());
        var father_contact_number = $.trim($('#father_contact_number').val());
        var father_profession = $.trim($('#father_profession').val());
        var mother_name = $.trim($('#mother_name').val());
        var mother_contact_number = $.trim($('#mother_contact_number').val());
        var mother_profession = $.trim($('#mother_profession').val());
        var emergency_contact_name = $.trim($('#emergency_contact_name').val());
        var emergency_contact_relationship = $.trim($('#emergency_contact_relationship').val());
        var emergency_contact_number = $.trim($('#emergency_contact_number').val());
        var employee_company = $('#employee_company').val();
        var employee_branch = $('#employee_branch').val();
        var employee_status = $('#employee_status').val();
        var employee_salary = $('#employee_salary').val();
        var employee_shift = $('#employee_shift').val();
        var employee_position = $('#employee_position').val();
        var employee_supervisor = $('#employee_supervisor').val();
        var date_hired = $('#date_hired').val();
        var employee_email_address = $.trim($('#employee_email_address').val());
        var employee_contact_number = $.trim($('#employee_contact_number').val());
        var sss_number = $.trim($('#sss_number').val());
        var pag_ibig_number = $.trim($('#pag_ibig_number').val());
        var philhealth_number = $.trim($('#philhealth_number').val());
        var tin_number = $.trim($('#tin_number').val());
        var account_number = $.trim($('#account_number').val());
        var cover_image = $('#cover_image').prop('files')[0];
        console.log(cover_image);
        var secondary_school_name = $.trim($('#secondary_school_name').val());
        var secondary_school_address = $.trim($('#secondary_school_address').val());
        var secondary_school_inclusive_years = $.trim($('#secondary_school_inclusive_years').val());
        var primary_school_name = $.trim($('#primary_school_name').val());
        var primary_school_address = $.trim($('#primary_school_address').val());
        var primary_school_inclusive_years = $.trim($('#primary_school_inclusive_years').val());

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
                //Personal Information Tab
                    employee_number:employee_number,
                    fileName:fileName,
                    first_name:first_name,
                    last_name:last_name,
                    middle_name:middle_name,
                    suffix:suffix,
                    nickname:nickname,
                    birthday:birthday,
                    gender:gender,
                    civil_status:civil_status,
                    street:street,
                    region:region,
                    province:province,
                    city:city,
                    height:height,
                    weight:weight,
                    religion:religion,
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
                //Work Information Tab
                    employee_company:employee_company,
                    employee_branch:employee_branch,
                    employee_status:employee_status,
                    employee_salary:employee_salary,
                    employee_shift:employee_shift,
                    employee_position:employee_position,
                    employee_supervisor:employee_supervisor,
                    date_hired:date_hired,
                    employee_email_address:employee_email_address,
                    employee_contact_number:employee_contact_number,
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
                        if(data.result == 'true'){
                            $('#employee_id').val(data.id);
                            //This code is to save the data in multiple rows
                                var soloParentTable = $('#solo_parent_data_table').DataTable({
                                    dom:'t',
                                });
                                var soloParent_data  = soloParentTable.rows().data();
                                $.each(soloParent_data, function(key, value){
                                    $.ajax({
                                        type: 'POST',
                                        url: '/employees/childrenSave',
                                        async: false,
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data:{
                                            'employee_id' : data.id,
                                            'child_name' : value[0],
                                            'child_birthday': value[1],
                                            'child_gender'  : value[3]
                                        },
                                    });
                                });
                                var collegeTable = $('#college_data_table').DataTable({
                                    dom:'t',
                                });
                                var college_data  = collegeTable.rows().data();
                                $.each(college_data, function(key, value){
                                    $.ajax({
                                        type: 'POST',
                                        url: '/employees/collegeSave',
                                        async: false,
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data:{
                                            'employee_id' : data.id,
                                            'college_name' : value[0],
                                            'college_degree' : value[1],
                                            'college_inclusive_years': value[2]
                                        },
                                    });
                                });
                                var trainingTable = $('#training_data_table').DataTable({
                                    dom:'t',
                                });
                                var training_data  = trainingTable.rows().data();
                                $.each(training_data, function(key, value){
                                    $.ajax({
                                        type: 'POST',
                                        url: '/employees/trainingSave',
                                        async: false,
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data:{
                                            'employee_id' : data.id,
                                            'training_name' : value[0],
                                            'training_title' : value[1],
                                            'training_inclusive_years': value[2]
                                        },
                                    });
                                });
                                var vocationalTable = $('#vocational_data_table').DataTable({
                                    dom:'t',
                                });
                                var vocational_data  = vocationalTable.rows().data();
                                $.each(vocational_data, function(key, value){
                                    $.ajax({
                                        type: 'POST',
                                        url: '/employees/vocationalSave',
                                        async: false,
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data:{
                                            'employee_id' : data.id,
                                            'vocational_name' : value[0],
                                            'vocational_course' : value[1],
                                            'vocational_inclusive_years': value[2]
                                        },
                                    });
                                });
                                var jobTable = $('#job_data_table').DataTable({
                                    dom:'t',
                                });
                                var job_data  = jobTable.rows().data();
                                $.each(job_data, function(key, value){
                                    $.ajax({
                                        type: 'POST',
                                        url: '/employees/jobSave',
                                        async: false,
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data:{
                                            'employee_id' : data.id,
                                            'job_name' : value[0],
                                            'job_position' : value[1],
                                            'job_address': value[2],
                                            'job_contact_details' : value[3],
                                            'job_inclusive_years' : value[4]
                                        },
                                    });
                                });
                                var memoTable = $('#memo_data_table').DataTable({
                                    dom:'t',
                                });
                                var memo_data  = memoTable.rows().data();
                                $.each(memo_data, function(key, value){
                                    $.ajax({
                                        type: 'POST',
                                        url: '/employees/memoSave',
                                        async: false,
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data:{
                                            'employee_id' : data.id,
                                            'memo_subject' : value[0],
                                            'memo_date' : value[1],
                                            'memo_penalty': value[2]
                                        },
                                    });
                                });
                                // var memoTable = $('#memo_data_table').DataTable({
                                //     dom:'t',
                                // });
                                // var memo_data  = memoTable.rows().data();
                                // $.each(memo_data, function(key, value){
                                //     $.ajax({
                                //         type: 'POST',
                                //         url: '/employees/storeRequirements',
                                //         async: false,
                                //         headers:{
                                //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                //         },
                                //         data:{
                                //             'employee_id' : data.id,
                                //             'memo_subject' : value[0],
                                //             'memo_date' : value[1],
                                //             'memo_penalty': value[2],
                                //             'memo_file': value[3]
                                //         },
                                //     });
                                // });
                                var evaluationTable = $('#evaluation_data_table').DataTable({
                                    dom:'t',
                                });
                                var evaluation_data  = evaluationTable.rows().data();
                                $.each(evaluation_data, function(key, value){
                                    $.ajax({
                                        type: 'POST',
                                        url: '/employees/evaluationSave',
                                        async: false,
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data:{
                                            'employee_id' : data.id,
                                            'evaluation_reason' : value[0],
                                            'evaluation_date' : value[1],
                                            'evaluation_evaluated_by': value[2] 
                                        },
                                    });
                                });
                                var contractsTable = $('#contracts_data_table').DataTable({
                                    dom:'t',
                                });
                                var contracts_data  = contractsTable.rows().data();
                                $.each(contracts_data, function(key, value){
                                    $.ajax({
                                        type: 'POST',
                                        url: '/employees/contractsSave',
                                        async: false,
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data:{
                                            'employee_id' : data.id,
                                            'contracts_type' : value[0],
                                            'contracts_date' : value[1]
                                        },
                                    });
                                }); 

                                // var past_medical_condition = $('#past_medical_condition').val();
                                var past_medical_condition = ($.trim($('#past_medical_condition').val()).split("\n")).join(', ');
                                var allergies = ($.trim($('#allergies').val()).split("\n")).join(', ');
                                // var match = /\r|\n/.exec(past_medical_condition);
                                    $.ajax({
                                        url:"/employees/medicalHistorySave", //route name (web.php)
                                        type:"POST",
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//For anti forgery
                                        },
                                        data:{
                                            'employee_id':data.id,
                                            allergies:allergies,
                                            past_medical_condition:past_medical_condition
                                        },
                                    });

                                // $('#requirements_form').submit();
                                Swal.fire("SAVE SUCCESS", "", "success");
                                $('#solo_parent_data_table').hide();
                                $('#college_data_table').hide();
                                $('#training_data_table').hide();
                                $('#vocational_data_table').hide();
                                $('#job_data_table').hide();
                                $('#memo_data_table').hide();
                                $('#evaluation_data_table').hide();
                                $('#contracts_data_table').hide();
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
            Swal.fire("SAVE CANCELLED", "", "info");
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
                    error: function(data){
                      if(data.status == 401){
                          window.location.reload();
                      }
                      alert(data.responseText);
                    }
                });
            }
        });   
    }
    else{
        Swal.fire("REQUIRED", "Please fill all required fields!", "error");
    }
});