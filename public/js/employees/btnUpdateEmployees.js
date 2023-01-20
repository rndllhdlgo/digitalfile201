$('#btnUpdate').on('click',function(){
    var id = $('#hidden_id').val();
    var first_name_orig = $('#first_name_orig').val();
    var first_name_new = $('#first_name').val();
    var last_name_orig = $('#last_name_orig').val();
    var last_name_new = $('#last_name').val();
    var middle_name_orig = $('#middle_name_orig').val();
    var middle_name_new = $('#middle_name').val();
    var suffix_orig = $('#suffix_orig').val();
    var suffix_new = $('#suffix').val();
    var nickname_orig = $('#nickname_orig').val();
    var nickname_new = $('#nickname').val();
    var birthday_orig = $('#birthday_orig').val();
    var birthday_new = $('#birthday').val();
    var gender_orig = $('#gender_orig').val();
    var gender_new = $('#gender').val();
    var civil_status_orig = $('#civil_status_orig').val();
    var civil_status_new = $('#civil_status').val();
    var address_orig = $('#address_orig').val();
    var address_new = $('#address').val();
    var house_orig = $('#house_orig').val();
    var house_new = $('input[name=house]:checked').val();
    var province_orig = $("#province_orig").val();
    var province_new = $("#province option:selected").text();
    var city_orig = $("#city_orig").val();
    var city_new = $("#city option:selected").text();
    var region_orig = $("#region_orig").val();
    var region_new = $("#region").val();
    var height_orig = $("#height_orig").val();
    var height_new = $("#height").val();
    var weight_orig = $("#weight_orig").val();
    var weight_new = $("#weight").val();
    var religion_orig = $("#religion_orig").val();
    var religion_new = $("#religion").val();
    var email_address_orig = $('#email_address_orig').val();
    var email_address_new = $('#email_address').val();
    var telephone_number_orig = $('#telephone_number_orig').val();
    var telephone_number_new = $('#telephone_number').val();
    var cellphone_number_orig = $('#cellphone_number_orig').val();
    var cellphone_number_new = $('#cellphone_number').val();
    var spouse_name = $('#spouse_name').val();
    var spouse_contact_number_orig = $('#spouse_contact_number_orig').val();
    var spouse_contact_number_new = $('#spouse_contact_number').val();
    var spouse_profession_orig = $('#spouse_profession_orig').val();
    var spouse_profession_new = $('#spouse_profession').val();
    var father_name_orig = $('#father_name_orig').val();
    var father_name_new = $('#father_name').val();
    var father_contact_number_orig = $('#father_contact_number_orig').val();
    var father_contact_number_new = $('#father_contact_number').val();
    var father_profession_orig = $('#father_profession_orig').val();
    var father_profession_new = $('#father_profession').val();
    var mother_name_orig = $('#mother_name_orig').val();
    var mother_name_new = $('#mother_name').val();
    var mother_contact_number_orig = $('#mother_contact_number_orig').val();
    var mother_contact_number_new = $('#mother_contact_number').val();
    var mother_profession_orig = $('#mother_profession_orig').val();
    var mother_profession_new = $('#mother_profession').val();
    var emergency_contact_name_orig = $('#emergency_contact_name_orig').val();
    var emergency_contact_name_new = $('#emergency_contact_name').val();
    var emergency_contact_relationship_orig = $('#emergency_contact_relationship_orig').val();
    var emergency_contact_relationship_new = $('#emergency_contact_relationship').val();
    var emergency_contact_number_orig = $('#emergency_contact_number_orig').val();
    var emergency_contact_number_new = $('#emergency_contact_number').val();

    Swal.fire({
        title: 'Do you want to Update?',
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
            }
            else if(!$('#filename').val() && !$('#employee_image').val()){
                employee_image = 'N/A';
            }
            else{
                employee_image = $('#filename').val();
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
                    filename_delete: $('#filename_delete').val(),
                    first_name_orig:first_name_orig,
                    first_name_new:first_name_new,
                    last_name_orig:last_name_orig,
                    last_name_new:last_name_new,
                    middle_name_orig:middle_name_orig,
                    middle_name_new:middle_name_new,
                    suffix_orig:suffix_orig,
                    suffix_new:suffix_new,
                    nickname_orig:nickname_orig,
                    nickname_new:nickname_new,
                    birthday_orig:birthday_orig,
                    birthday_new:birthday_new,
                    gender_orig:gender_orig,
                    gender_new:gender_new,
                    civil_status_orig:civil_status_orig,
                    civil_status_new:civil_status_new,
                    address_orig:address_orig,
                    address_new:address_new,
                    house_orig:house_orig,
                    house_new:house_new,
                    region_orig:region_orig,
                    region_new:region_new,
                    province_orig:province_orig,
                    province_new:province_new,
                    city_orig:city_orig,
                    city_new:city_new,
                    height_orig:height_orig,
                    height_new:height_new,
                    weight_orig:weight_orig,
                    weight_new:weight_new,
                    religion_orig:religion_orig,
                    religion_new:religion_new,
                    email_address_orig:email_address_orig,
                    email_address_new:email_address_new,
                    telephone_number_orig:telephone_number_orig,
                    telephone_number_new:telephone_number_new,
                    cellphone_number_orig:cellphone_number_orig,
                    cellphone_number_new:cellphone_number_new,
                    spouse_name:spouse_name,
                    spouse_contact_number_orig:spouse_contact_number_orig,
                    spouse_contact_number_new:spouse_contact_number_new,
                    spouse_profession_orig:spouse_profession_orig,
                    spouse_profession_new:spouse_profession_new,
                    father_name_orig:father_name_orig,
                    father_name_new:father_name_new,
                    father_contact_number_orig:father_contact_number_orig,
                    father_contact_number_new:father_contact_number_new,
                    father_profession_orig:father_profession_orig,
                    father_profession_new:father_profession_new,
                    mother_name_orig:mother_name_orig,
                    mother_name_new:mother_name_new,
                    mother_contact_number_orig:mother_contact_number_orig,
                    mother_contact_number_new:mother_contact_number_new,
                    mother_profession_orig:mother_profession_orig,
                    mother_profession_new:mother_profession_new,
                    emergency_contact_name_orig:emergency_contact_name_orig,
                    emergency_contact_name_new:emergency_contact_name_new,
                    emergency_contact_relationship_orig:emergency_contact_relationship_orig,
                    emergency_contact_relationship_new:emergency_contact_relationship_new,
                    emergency_contact_number_orig:emergency_contact_number_orig,
                    emergency_contact_number_new:emergency_contact_number_new
                },
                success:function(data){
                    if(data.result == 'true'){
                        var employee_id = $('#employee_id').val(data.id);
                        var employee_number_orig = $('#employee_number_orig').val();
                        var employee_number_new = $('#employee_number').val();
                        var date_hired_orig = $('#date_hired_orig').val();
                        var date_hired_new = $('#date_hired').val();
                        var employee_shift_orig = $('#employee_shift_orig').val();
                        var employee_shift_new = $('#employee_shift').val();
                        var employee_company_orig = $('#employee_company_orig').val();
                        var employee_company_new = $('#employee_company').val();
                        var employee_branch_orig = $('#employee_branch_orig').val();
                        var employee_branch_new = $('#employee_branch').val();
                        var employee_department_orig = $('#employee_department_orig').val();
                        var employee_department_new = $('#employee_department').val();
                        var employee_position_orig = $('#employee_position_orig').val();
                        var employee_position_new = $('#employee_position').val();
                        var employment_status_orig = $('#employment_status_orig').val();
                        var employment_status_new = $('#employment_status').val();
                        var employment_origin_orig = $('#employment_origin_orig').val();
                        var employment_origin_new = $('#employment_origin').val();
                        // var employee_supervisor = $('#employee_supervisor').val();
                        var company_email_address_orig = $('#company_email_address_orig').val();
                        var company_email_address_new = $('#company_email_address').val();
                        var company_contact_number_orig = $('#company_contact_number_orig').val();
                        var company_contact_number_new = $('#company_contact_number').val();
                        var hmo_number = $('#hmo_number').val();
                        var sss_number_orig = $('#sss_number_orig').val();
                        var sss_number_new = $('#sss_number').val();
                        var pag_ibig_number_orig = $('#pag_ibig_number_orig').val();
                        var pag_ibig_number_new = $('#pag_ibig_number').val();
                        var philhealth_number_orig = $('#philhealth_number_orig').val();
                        var philhealth_number_new = $('#philhealth_number').val();
                        var tin_number_orig = $('#tin_number_orig').val();
                        var tin_number_new = $('#tin_number').val();
                        var account_number_orig = $('#account_number_orig').val();
                        var account_number_new = $('#account_number').val();
        
                        $.ajax({
                            url:"/employees/updateWorkInformation",
                            type:"POST",
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id:id,
                                employee_id:data.id,
                                employee_number_orig:employee_number_orig,
                                employee_number_new:employee_number_new,
                                date_hired_orig:date_hired_orig,
                                date_hired_new:date_hired_new,
                                employee_shift_orig:employee_shift_orig,
                                employee_shift_new:employee_shift_new,
                                employee_company_orig:employee_company_orig,
                                employee_company_new:employee_company_new,
                                employee_branch_orig:employee_branch_orig,
                                employee_branch_new:employee_branch_new,
                                employee_department_orig:employee_department_orig,
                                employee_department_new:employee_department_new,
                                employee_position_orig:employee_position_orig,
                                employee_position_new:employee_position_new,
                                employment_status_orig:employment_status_orig,
                                employment_status_new:employment_status_new,
                                employment_origin_orig:employment_origin_orig,
                                employment_origin_new:employment_origin_new,
                                // employee_supervisor:employee_supervisor,
                                company_email_address_orig:company_email_address_orig,
                                company_email_address_new:company_email_address_new,
                                company_contact_number_orig:company_contact_number_orig,
                                company_contact_number_new:company_contact_number_new,
                                hmo_number:hmo_number,
                                sss_number_orig:sss_number_orig,
                                sss_number_new:sss_number_new,
                                pag_ibig_number_orig:pag_ibig_number_orig,
                                pag_ibig_number_new:pag_ibig_number_new,
                                philhealth_number_orig:philhealth_number_orig,
                                philhealth_number_new:philhealth_number_new,
                                tin_number_orig:tin_number_orig,
                                tin_number_new:tin_number_new,
                                account_number_orig:account_number_orig,
                                account_number_new:account_number_new
                            },
                        });

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
        
                        var past_medical_condition = $('#past_medical_condition').val().split("\n").join(' \n');
                        var allergies = $('#allergies').val().split("\n").join(' \n');
                        var medication = $('#medication').val().split("\n").join(' \n');
                        var psychological_history = $('#psychological_history').val().split("\n").join(' \n');
        
                        $.ajax({
                            url:"/employees/updateMedicalHistory",
                            type:"POST",
                            headers:{
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{
                                id:id,
                                employee_id:data.id,
                                allergies:allergies,
                                past_medical_condition:past_medical_condition,
                                medication:medication,
                                psychological_history:psychological_history
                            }
                        });

                        var employee_salary = $('#employee_salary').val();
                        var employee_incentives = $('#employee_incentives').val();
                        var employee_overtime_pay = $('#employee_overtime_pay').val();
                        var employee_bonus = $('#employee_bonus').val();
                        var employee_insurance = $('#employee_insurance').val().split("\n").join(' \n');
        
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
                        setTimeout(function(){window.location.reload();}, 2000);
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