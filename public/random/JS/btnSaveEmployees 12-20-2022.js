var employee_image;
function sendFile() {
    var formData = new FormData();
    var file = $('#employee_image').prop('files')[0];

    formData.append('employee_image', file);
    $.ajax({
        url: '/employees/insertImage',
        method: 'post',
        data: formData,
        contentType : false,
        processData : false,
        async: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
          console.log(response);
          employee_image = response;
        }
    });
}

$('#btnSave').on('click', function(){
        
        // var employee_number = $.trim($('#employee_number').val());//.trim()function removes all newlines, spaces (including non-breaking spaces)
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
        var telephone_number = $('#telephone_number').val();
        var cellphone_number = $('#cellphone_number').val();
        var spouse_name = $('#spouse_name').val();
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
            sendFile();
            $.ajax({
                url:"/employees/savePersonalInformation",
                type:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    // employee_number:employee_number,
                    employee_image:employee_image,
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
                    emergency_contact_number:emergency_contact_number
                },
                success: function(data){
                        if(data.result == 'true'){
                            $('#employee_id').val(data.id);
                            var employee_number = $('#employee_number').val();
                            var employee_company = $('#employee_company').val();
                            var employee_department = $('#employee_department').val();
                            var employee_branch = $('#employee_branch').val();
                            var employee_status = $('#employee_status').val();
                            var employment_origin = $('#employment_origin option:selected').text();
                            var employee_salary = $('#employee_salary').val();
                            var employee_shift = $('#employee_shift').val();
                            var employee_position = $('#employee_position').val();
                            var employee_supervisor = $('#employee_supervisor').val();
                            var date_hired = $('#date_hired').val();
                            var company_email_address = $.trim($('#company_email_address').val());
                            var company_contact_number = $.trim($('#company_contact_number').val());
                            var sss_number = $.trim($('#sss_number').val());
                            var pag_ibig_number = $.trim($('#pag_ibig_number').val());
                            var philhealth_number = $.trim($('#philhealth_number').val());
                            var tin_number = $.trim($('#tin_number').val());
                            var account_number = $.trim($('#account_number').val());

                            $.ajax({
                                url:"/employees/saveWorkInformation",
                                type:"POST",
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    employee_id:data.id,
                                    employee_number:employee_number,
                                    employee_company:employee_company,
                                    employee_department:employee_department,
                                    employee_branch:employee_branch,
                                    employee_status:employee_status,
                                    employment_origin:employment_origin,
                                    employee_salary:employee_salary,
                                    employee_shift:employee_shift,
                                    employee_position:employee_position,
                                    employee_supervisor:employee_supervisor,
                                    date_hired:date_hired,
                                    company_email_address:company_email_address,
                                    company_contact_number:company_contact_number,
                                    sss_number:sss_number,
                                    pag_ibig_number:pag_ibig_number,
                                    philhealth_number:philhealth_number,
                                    tin_number:tin_number,
                                    account_number:account_number
                                },
                            });

                            var employee_salary = $('#employee_salary').val();
                            var employee_incentives = $('#employee_incentives').val();
                            var employee_overtime_pay = $('#employee_overtime_pay').val();
                            var employee_bonus = $('#employee_bonus').val();
                            var employee_insurance = $('#employee_insurance').val().split("\n").join(' \n');

                            $.ajax({
                                url:"/employees/saveCompensationBenefits",
                                type:"POST",
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    employee_id:data.id,
                                    employee_salary:employee_salary,
                                    employee_incentives:employee_incentives,
                                    employee_overtime_pay:employee_overtime_pay,
                                    employee_bonus:employee_bonus,
                                    employee_insurance:employee_insurance
                                },
                            });

                            var secondary_school_name = $('#secondary_school_name').val();
                            var secondary_school_address = $('#secondary_school_address').val();
                            var secondary_school_inclusive_years = $('#secondary_school_inclusive_years').val();
                            var primary_school_name = $('#primary_school_name').val();
                            var primary_school_address = $('#primary_school_address').val();
                            var primary_school_inclusive_years = $('#primary_school_inclusive_years').val();

                            $.ajax({
                                url:"/employees/saveEducationalAttainment", 
                                type:"POST",
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    employee_id:data.id,
                                    secondary_school_name:secondary_school_name,
                                    secondary_school_address:secondary_school_address,
                                    secondary_school_inclusive_years:secondary_school_inclusive_years,
                                    primary_school_name:primary_school_name,
                                    primary_school_address:primary_school_address,
                                    primary_school_inclusive_years:primary_school_inclusive_years
                                },
                            });

                            var past_medical_condition = $('#past_medical_condition').val().split("\n").join(' \n');
                            var allergies = $('#allergies').val().split("\n").join(' \n');
                            var medication = $('#medication').val().split("\n").join(' \n');
                            var psychological_history = $('#psychological_history').val().split("\n").join(' \n');

                            $.ajax({
                                url:"/employees/saveMedicalHistory",
                                type:"POST",
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    employee_id:data.id,
                                    allergies:allergies,
                                    past_medical_condition:past_medical_condition,
                                    medication:medication,
                                    psychological_history:psychological_history
                                },
                            });

                            //This code is to save the data in multiple rows
                                var soloParent_data  = $('#solo_parent_data_table').DataTable().rows().data();
                                $.each(soloParent_data, function(key, value){
                                    $.ajax({
                                        type: 'POST',
                                        url: '/employees/saveChildren',
                                        async: false,
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data:{
                                            employee_id : data.id,
                                            child_name : value[0],
                                            child_birthday: value[1],
                                            child_gender  : value[3]
                                        },
                                    });
                                });
                                
                                var college_data  = $('#college_data_table').DataTable().rows().data();
                                $.each(college_data, function(key, value){
                                    $.ajax({
                                        type: 'POST',
                                        url: '/employees/saveCollege',
                                        async: false,
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data:{
                                            employee_id : data.id,
                                            college_name : value[0],
                                            college_degree : value[1],
                                            college_inclusive_years: value[2]
                                        },
                                    });
                                });

                                var training_data  = $('#training_data_table').DataTable().rows().data();
                                $.each(training_data, function(key, value){
                                    $.ajax({
                                        type: 'POST',
                                        url: '/employees/saveTraining',
                                        async: false,
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data:{
                                            employee_id : data.id,
                                            training_name : value[0],
                                            training_title : value[1],
                                            training_inclusive_years: value[2]
                                        },
                                    });
                                });

                                var vocational_data  = $('#vocational_data_table').DataTable().rows().data();
                                $.each(vocational_data, function(key, value){
                                    $.ajax({
                                        type: 'POST',
                                        url: '/employees/saveVocational',
                                        async: false,
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data:{
                                            employee_id : data.id,
                                            vocational_name : value[0],
                                            vocational_course : value[1],
                                            vocational_inclusive_years: value[2]
                                        },
                                    });
                                });

                                var job_data  = $('#job_data_table').DataTable().rows().data();
                                $.each(job_data, function(key, value){
                                    $.ajax({
                                        type: 'POST',
                                        url: '/employees/saveJobHistory',
                                        async: false,
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data:{
                                            employee_id : data.id,
                                            job_name : value[0],
                                            job_position : value[1],
                                            job_address: value[2],
                                            job_contact_details : value[3],
                                            job_inclusive_years : value[4]
                                        },
                                    });
                                });

                                $('#documents_form').submit();
                                Swal.fire("SAVE SUCCESS", "", "success");
                                setTimeout(function(){window.location.reload();}, 2000);
                        }
                        else{
                            Swal.fire("SAVE FAILED", "", "error");
                            setTimeout(function(){window.location.reload();}, 2000);
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
