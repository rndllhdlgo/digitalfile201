$('#btnUpdate').on('click',function(){
    var id = $('#hidden_id').val();
    var first_name = $('#first_name').val();
    var middle_name = $('#middle_name').val();
    var last_name = $('#last_name').val();
    var suffix = $('#suffix').val();
    var nickname = $('#nickname').val();
    var birthday = $('#birthday').val();
    var gender = $('#gender').val();
    var address = $('#address').val();
    var ownership = $('#ownership').val();
    var province = $('#province option:selected').text();
    var city = $('#city option:selected').text();
    var region = $('#region').val();
    var height = $('#height').val();
    var weight = $('#weight').val();
    var religion = $('#religion').val();
    var civil_status = $('#civil_status').val();
    var email_address = $('#email_address').val();
    var telephone_number = $('#telephone_number').val();
    var cellphone_number = $('#cellphone_number').val();
    var father_name = $('#father_name').val();
    var father_contact_number = $('#father_contact_number').val();
    var father_profession = $('#father_profession').val();
    var mother_name = $('#mother_name').val();
    var mother_contact_number = $('#mother_contact_number').val();
    var mother_profession = $('#mother_profession').val();
    var emergency_contact_name = $('#emergency_contact_name').val();
    var emergency_contact_relationship = $('#emergency_contact_relationship').val();
    var emergency_contact_number = $('#emergency_contact_number').val();
    console.log($('#filename_delete').val());
    // var college_hange = college_tr_add == 'true' ? '<b class="text-danger">WARNING: Currently addeed POS will be DELETED upon update!</b>' : '';

    Swal.fire({
        title: 'Do you want to Update?',
        // html:college_warning,
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
            $('#loading').show();
            if(!$('#filename').val() && $('#employee_image').val()){
                employee_image_save();
                console.log('s');
            }
            else if(!$('#filename').val() && !$('#employee_image').val()){
                employee_image = 'N/A';
                console.log('d');
            }
            else{
                employee_image = $('#filename').val();
                console.log(employee_image);
                console.log('v');
            }

            $.ajax({
                url:"/employees/updatePersonalInformation",
                type:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    id:id,
                    employee_image:employee_image,
                    filename_delete:$('#filename_delete').val(),
                    employee_image_change:employee_image_change,
                    first_name:first_name,
                    middle_name:middle_name,
                    last_name:last_name,
                    suffix:suffix,
                    nickname:nickname,
                    birthday:birthday,
                    gender:gender,
                    address:address,
                    ownership:ownership,
                    province:province,
                    city:city,
                    region:region,
                    height:height,
                    weight:weight,
                    religion:religion,
                    civil_status:civil_status,
                    email_address:email_address,
                    telephone_number:telephone_number,
                    cellphone_number:cellphone_number,
                    father_name:father_name,
                    father_contact_number:father_contact_number,
                    father_profession:father_profession,
                    mother_name:mother_name,
                    mother_contact_number:mother_contact_number,
                    mother_profession:mother_profession,
                    emergency_contact_name:emergency_contact_name,
                    emergency_contact_relationship:emergency_contact_relationship,
                    emergency_contact_number:emergency_contact_number,
                },
                success:function(data){
                    if(data.result == 'true'){
                        var employee_id = $('#employee_id').val(data.id);
                        var employee_number = $('#employee_number').val();
                        var date_hired = $('#date_hired').val();
                        var employee_shift = $('#employee_shift').val();
                        var employee_company = $('#employee_company').val();
                        var employee_branch = $('#employee_branch').val();
                        var employee_department = $('#employee_department').val();
                        var employee_position = $('#employee_position').val();
                        var employment_status = $('#employment_status').val();
                        var employment_origin = $('#employment_origin').val();
                        var company_email_address = $('#company_email_address').val();
                        var company_contact_number = $('#company_contact_number').val();
                        var hmo_number = $('#hmo_number').val();
                        var sss_number = $('#sss_number').val();
                        var pag_ibig_number = $('#pag_ibig_number').val();
                        var philhealth_number = $('#philhealth_number').val();
                        var tin_number = $('#tin_number').val();
                        var account_number = $('#account_number').val();
                        $.ajax({
                            url:"/employees/updateWorkInformation",
                            type:"POST",
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id:id,
                                employee_id:data.id,
                                employee_number:employee_number,
                                date_hired:date_hired,
                                employee_shift:employee_shift,
                                employee_company:employee_company,
                                employee_branch:employee_branch,
                                employee_department:employee_department,
                                employee_position:employee_position,
                                employment_status:employment_status,
                                employment_origin:employment_origin,
                                company_email_address:company_email_address,
                                company_contact_number:company_contact_number,
                                hmo_number:hmo_number,
                                sss_number:sss_number,
                                pag_ibig_number:pag_ibig_number,
                                philhealth_number:philhealth_number,
                                tin_number:tin_number,
                                account_number:account_number,
                            },
                        });

                        var empno = $('#employee_number').val();
                        var secondary_school_name = $('#secondary_school_name').val();
                        var secondary_school_address = $('#secondary_school_address').val();
                        var secondary_school_inclusive_years_from = $('#secondary_school_inclusive_years_from').val();
                        var secondary_school_inclusive_years_to = $('#secondary_school_inclusive_years_to').val();
                        var primary_school_name = $('#primary_school_name').val();
                        var primary_school_address = $('#primary_school_address').val();
                        var primary_school_inclusive_years_from = $('#primary_school_inclusive_years_from').val();
                        var primary_school_inclusive_years_to = $('#primary_school_inclusive_years_to').val();

                        $.ajax({
                            url:"/employees/updateEducationalAttainment",
                            type:"POST",
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id:id,
                                employee_id:data.id,
                                empno:empno,
                                secondary_school_name:secondary_school_name,
                                secondary_school_address:secondary_school_address,
                                secondary_school_inclusive_years_from:secondary_school_inclusive_years_from,
                                secondary_school_inclusive_years_to:secondary_school_inclusive_years_to,
                                primary_school_name:primary_school_name,
                                primary_school_address:primary_school_address,
                                primary_school_inclusive_years_from:primary_school_inclusive_years_from,
                                primary_school_inclusive_years_to:primary_school_inclusive_years_to
                            }
                        });

                        var past_medical_condition = $('#past_medical_condition').val();
                        var allergies = $('#allergies').val();
                        var medication = $('#medication').val();
                        var psychological_history = $('#psychological_history').val();

                        $.ajax({
                            url:"/employees/updateMedicalHistory",
                            type:"POST",
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id:id,
                                employee_id:data.id,
                                past_medical_condition:past_medical_condition,
                                allergies:allergies,
                                medication:medication,
                                psychological_history:psychological_history,
                            }
                        });

                        var employee_salary = $('#employee_salary').val();
                        var employee_incentives = $('#employee_incentives').val();
                        var employee_overtime_pay = $('#employee_overtime_pay').val();
                        var employee_bonus = $('#employee_bonus').val();
                        var employee_insurance = $('#employee_insurance').val()

                        $.ajax({
                            url:"/employees/updateCompensationBenefits",
                            type:"POST",
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id:id,
                                employee_id:data.id,
                                employee_salary:employee_salary,
                                employee_incentives:employee_incentives,
                                employee_overtime_pay:employee_overtime_pay,
                                employee_bonus:employee_bonus,
                                employee_insurance:employee_insurance
                            }
                        });

                        $('.college_tr').each(function(){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/saveCollege',
                                async: false,
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    employee_id : data.id,
                                    college_name : $(this).children('.td_1').html(),
                                    college_degree : $(this).children('.td_2').html(),
                                    college_inclusive_years_from: $(this).children('.td_3').html(),
                                    college_inclusive_years_to: $(this).children('.td_4').html(),
                                    college_change:college_change
                                },
                            });
                        });

                        $('.children_tr').each(function(){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/saveChildren',
                                async: false,
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    employee_id : data.id,
                                    child_name : $(this).children('.td_1').html(),
                                    child_birthday: $(this).children('.td_2').html(),
                                    child_gender  : $(this).children('.td_4').html()
                                },
                            });
                        });

                        $('.training_tr').each(function(){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/saveTraining',
                                async: false,
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    employee_id : data.id,
                                    training_name : $(this).children('.td_1').html(),
                                    training_title :  $(this).children('.td_2').html(),
                                    training_inclusive_years_from : $(this).children('.td_3').html(),
                                    training_inclusive_years_to : $(this).children('.td_4').html(),
                                    training_change:training_change
                                },
                            });
                        });

                        $('.vocational_tr').each(function(){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/saveVocational',
                                async: false,
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    employee_id : data.id,
                                    vocational_name : $(this).children('.td_1').html(),
                                    vocational_course : $(this).children('.td_2').html(),
                                    vocational_inclusive_years_from: $(this).children('.td_3').html(),
                                    vocational_inclusive_years_to: $(this).children('.td_4').html(),
                                    vocational_change:vocational_change,
                                },
                            });
                        });

                        $('.job_history_tr').each(function(){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/saveJobHistory',
                                async: false,
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    employee_id : data.id,
                                    job_company_name : $(this).children('.td_1').html(),
                                    job_description : $(this).children('.td_2').html(),
                                    job_position : $(this).children('.td_3').html(),
                                    job_contact_number : $(this).children('.td_4').html(),
                                    job_inclusive_years_from : $(this).children('.td_5').html(),
                                    job_inclusive_years_to : $(this).children('.td_6').html(),
                                    job_history_change:job_history_change,
                                },
                            });
                        });

                        $.ajax({
                            type: 'POST',
                            url: '/employees/children_delete',
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id: children_id.toString()
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            url: '/employees/college_delete',
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id: college_id.toString()
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            url: '/employees/training_delete',
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id: training_id.toString()
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            url: '/employees/vocational_delete',
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id: vocational_id.toString()
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            url: '/employees/job_history_delete',
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id: job_history_id.toString()
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            url: '/employees/memo_delete',
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id: memo_id.toString()
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            url: '/employees/evaluation_delete',
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id: evaluation_id.toString()
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            url: '/employees/contracts_delete',
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id: contracts_id.toString()
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            url: '/employees/resignation_delete',
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id: resignation_id.toString()
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            url: '/employees/termination_delete',
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id: termination_id.toString()
                            }
                        });

                        $('#memo_subject').attr('name','');
                        $('#memo_date').attr('name','');
                        $('#memo_penalty').attr('name','');
                        $('#memo_file').attr('name','');
                        $('#evaluation_reason').attr('name','');
                        $('#evaluation_date').attr('name','');
                        $('#evaluation_evaluated_by').attr('name','');
                        $('#evaluation_file').attr('name','');
                        $('#contracts_type').attr('name','');
                        $('#contracts_date').attr('name','');
                        $('#contracts_file').attr('name','');
                        $('#resignation_reason').attr('name','');
                        $('#resignation_date').attr('name','');
                        $('#resignation_file').attr('name','');
                        $('#termination_reason').attr('name','');
                        $('#termination_date').attr('name','');
                        $('#termination_file').attr('name','');
                        if(current_user_level != 'EMPLOYEE'){
                            $('#documents_form').submit();
                        }

                        $('#loading').hide();
                        if(current_user_level == 'EMPLOYEE'){
                            // Swal.fire({
                            //     icon: 'success',
                            //     title: 'REQUEST SUCCESS',
                            //     text: 'You have requested that your information be updated, Please wait for HR to approve it.'
                            // });

                            // Swal.fire({
                            //     title: 'REQUEST SUCCESS',
                            //     text: 'You have requested that your information be updated, Please wait for HR to approve it.',
                            //     icon: 'success',
                            //     timer: 5000,
                            //     timerProgressBar: true,
                            //     showConfirmButton: false,
                            //     allowOutsideClick: false
                            // }).then((result) => {
                            //     if (result.dismiss === Swal.DismissReason.timer || result.dismiss === Swal.DismissReason.backdrop || result.dismiss === Swal.DismissReason.esc) {
                            //         window.location.href = '/logout';
                            //     }
                            // });
                            $('#employee_information').hide();
                            Swal.fire({
                                title: 'REQUEST SUCCESS',
                                html: '<div style="font-family: Century Gothic, cursive;">You have requested to update your information. Please wait for HR to approve it.<br><br>For the meantime, you will not be able to request another update if you have pending updates.</div>',
                                icon: 'success',
                                showCancelButton: false,
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'LOGOUT'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/logout';
                                }
                            });
                        }
                        else{
                            Swal.fire({
                                icon: 'success',
                                title: 'UPDATE SUCCESS'
                            });
                        }

                        // Swal.fire('UPDATE SUCCESS','','success');
                        // setTimeout(function(){window.location.reload();}, 2000);
                    }
                    else{
                        $('#loading').hide();
                        Swal.fire('UPDATE FAILED','','success');
                        setTimeout(function(){window.location.reload();}, 2000);
                    }
                }
            });
        }
        else if(update.isDenied){
            Swal.fire('UPDATE CANCELLED','','info');
        }
    });
});