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
    
    // var college_change = college_tr_add == 'true' ? '<b class="text-danger">WARNING: Currently addeed POS will be DELETED upon update!</b>' : '';

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

            $.ajax({
                url:"/employees/updatePersonalInformation",
                type:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    id:id,
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

                            },
                        });

                        var secondary_school_name_orig = $('#secondary_school_name_orig').val();
                        var secondary_school_name_new = $('#secondary_school_name').val();
                        var secondary_school_address_orig = $('#secondary_school_address_orig').val();
                        var secondary_school_address_new = $('#secondary_school_address').val();
                        var secondary_school_inclusive_years_from_orig = $('#secondary_school_inclusive_years_from_orig').val();
                        var secondary_school_inclusive_years_from_new = $('#secondary_school_inclusive_years_from').val();
                        var secondary_school_inclusive_years_to_orig = $('#secondary_school_inclusive_years_to_orig').val();
                        var secondary_school_inclusive_years_to_new = $('#secondary_school_inclusive_years_to').val();
                        var primary_school_name_orig = $('#primary_school_name_orig').val();
                        var primary_school_name_new = $('#primary_school_name').val();
                        var primary_school_address_orig = $('#primary_school_address_orig').val();
                        var primary_school_address_new = $('#primary_school_address').val();
                        var primary_school_inclusive_years_from_orig = $('#primary_school_inclusive_years_from_orig').val();
                        var primary_school_inclusive_years_from_new = $('#primary_school_inclusive_years_from').val();
                        var primary_school_inclusive_years_to_orig = $('#primary_school_inclusive_years_to_orig').val();
                        var primary_school_inclusive_years_to_new = $('#primary_school_inclusive_years_to').val();
        
                        $.ajax({
                            url:"/employees/updateEducationalAttainment", 
                            type:"POST",
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id:id,
                                employee_id:data.id,
                                secondary_school_name_orig:secondary_school_name_orig,
                                secondary_school_name_new:secondary_school_name_new,
                                secondary_school_address_orig:secondary_school_address_orig,
                                secondary_school_address_new:secondary_school_address_new,
                                secondary_school_inclusive_years_from_orig:secondary_school_inclusive_years_from_orig,
                                secondary_school_inclusive_years_from_new:secondary_school_inclusive_years_from_new,
                                secondary_school_inclusive_years_to_orig:secondary_school_inclusive_years_to_orig,
                                secondary_school_inclusive_years_to_new:secondary_school_inclusive_years_to_new,
                                primary_school_name_orig:primary_school_name_orig,
                                primary_school_name_new:primary_school_name_new,
                                primary_school_address_orig:primary_school_address_orig,
                                primary_school_address_new:primary_school_address_new,
                                primary_school_inclusive_years_from_orig:primary_school_inclusive_years_from_orig,
                                primary_school_inclusive_years_from_new:primary_school_inclusive_years_from_new,
                                primary_school_inclusive_years_to_orig:primary_school_inclusive_years_to_orig,
                                primary_school_inclusive_years_to_new:primary_school_inclusive_years_to_new,
                            }
                        });
        
                        var past_medical_condition_orig = $('#past_medical_condition_orig').val(),
                        past_medical_condition_new = $('#past_medical_condition').val(),
                        allergies_orig = $('#allergies_orig').val(),
                        allergies_new = $('#allergies').val(),
                        medication_orig = $('#medication_orig').val(),
                        medication_new = $('#medication').val(),
                        psychological_history_orig = $('#psychological_history_orig').val(),
                        psychological_history_new = $('#psychological_history').val();
        
                        $.ajax({
                            url:"/employees/updateMedicalHistory",
                            type:"POST",
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id:id,
                                employee_id:data.id,
                                past_medical_condition_orig:past_medical_condition_orig,
                                past_medical_condition_new:past_medical_condition_new,
                                allergies_orig:allergies_orig,
                                allergies_new:allergies_new,
                                medication_orig:medication_orig,
                                medication_new:medication_new,
                                psychological_history_orig:psychological_history_orig,
                                psychological_history_new:psychological_history_new
                            }
                        });

                        var employee_salary_orig = $('#employee_salary_orig').val(),
                        employee_salary_new = $('#employee_salary').val(),
                        employee_incentives_orig = $('#employee_incentives_orig').val(),
                        employee_incentives_new = $('#employee_incentives').val(),
                        employee_overtime_pay_orig = $('#employee_overtime_pay_orig').val(),
                        employee_overtime_pay_new = $('#employee_overtime_pay').val(),
                        employee_bonus_orig = $('#employee_bonus_orig').val(),
                        employee_bonus_new = $('#employee_bonus').val(),
                        employee_insurance_orig = $('#employee_insurance_orig').val();
                        employee_insurance_new = $('#employee_insurance').val();
        
                        $.ajax({
                            url:"/employees/updateCompensationBenefits",
                            type:"POST",
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id:id,
                                employee_id:data.id,
                                employee_salary_orig:employee_salary_orig,
                                employee_salary_new:employee_salary_new,
                                employee_incentives_orig:employee_incentives_orig,
                                employee_incentives_new:employee_incentives_new,
                                employee_overtime_pay_orig:employee_overtime_pay_orig,
                                employee_overtime_pay_new:employee_overtime_pay_new,
                                employee_bonus_orig:employee_bonus_orig,
                                employee_bonus_new:employee_bonus_new,
                                employee_insurance_orig:employee_insurance_orig,
                                employee_insurance_new:employee_insurance_new
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
                                    college_inclusive_years_to: $(this).children('.td_4').html()
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
                                    training_inclusive_years_to : $(this).children('.td_4').html()
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
                                    vocational_inclusive_years_to: $(this).children('.td_4').html()
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
                                    job_inclusive_years_to : $(this).children('.td_6').html()
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
                        // $('#documents_form').submit();
                        $('#loading').hide();
                        Swal.fire('UPDATE SUCCESS','','success');
                        // setTimeout(function(){window.location.reload();}, 2000);
                    }
                    else if(data == 'nochanges'){
                        $('#loading').hide();
                        Swal.fire({
                            title: 'NO CHANGES FOUND',
                            icon: 'error',
                            timer: 2000
                        });
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