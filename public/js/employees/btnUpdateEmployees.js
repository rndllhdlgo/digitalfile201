$('#btnUpdate').on('click',function(){
    $('#personal_info').css('zoom','95%');
    var id = $('#hidden_id').val();
    var first_name = $('#first_name').val();
    var last_name_orig = $('#last_name_orig').val();
    var last_name_new = $('#last_name').val();
    var middle_name_orig = $('#middle_name_orig').val();
    var middle_name_new = $('#middle_name').val();
    var suffix = $('#suffix').val();
    var nickname = $('#nickname').val();
    var birthday = $('#birthday').val();
    var gender = $('#gender').val();
    var civil_status_orig = $('#civil_status_orig').val();
    var civil_status_new = $('#civil_status').val();
    var unit_orig = $('#unit_orig').val();
    var unit_new = $('#unit').val();
    var lot_orig = $('#lot_orig').val();
    var lot_new = $('#lot').val();
    var barangay_orig = $('#barangay_orig').val();
    var barangay_new = $('#barangay').val();
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
    var father_name = $('#father_name').val();
    var father_contact_number_orig = $('#father_contact_number_orig').val();
    var father_contact_number_new = $('#father_contact_number').val();
    var father_profession_orig = $('#father_profession_orig').val();
    var father_profession_new = $('#father_profession').val();
    var mother_name = $('#mother_name').val();
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
            $('#personal_info').css('zoom','100%');
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
                    first_name:first_name,
                    last_name_orig:last_name_orig,
                    last_name_new:last_name_new,
                    middle_name_orig:middle_name_orig,
                    middle_name_new:middle_name_new,
                    suffix:suffix,
                    nickname:nickname,
                    birthday:birthday,
                    gender:gender,
                    civil_status_orig:civil_status_orig,
                    civil_status_new:civil_status_new,
                    unit_orig:unit_orig,
                    unit_new:unit_new,
                    lot_orig:lot_orig,
                    lot_new:lot_new,
                    barangay_orig:barangay_orig,
                    barangay_new:barangay_new,
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
                    father_name:father_name,
                    father_contact_number_orig:father_contact_number_orig,
                    father_contact_number_new:father_contact_number_new,
                    father_profession_orig:father_profession_orig,
                    father_profession_new:father_profession_new,
                    mother_name:mother_name,
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
                        var employee_number = $('#employee_number').val();
                        var employee_company = $('#employee_company').val();
                        var employee_department = $('#employee_department').val();
                        var employee_branch = $('#employee_branch').val();
                        var employment_status = $('#employment_status').val();
                        var employment_origin = $('#employment_origin').val();
                        var employee_salary = $('#employee_salary').val();
                        var employee_shift = $('#employee_shift').val();
                        var employee_position = $('#employee_position').val();
                        var employee_supervisor = $('#employee_supervisor').val();
                        var date_hired = $('#date_hired').val();
                        var company_email_address = $('#company_email_address').val();
                        var company_contact_number = $('#company_contact_number').val();
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
                                employee_company:employee_company,
                                employee_department:employee_department,
                                employee_branch:employee_branch,
                                employment_status:employment_status,
                                employment_origin:employment_origin,
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
                            },
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
                            },
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
                        $('#documents_form').submit();
                        $('#personal_info').css('zoom','98%');
                        Swal.fire('UPDATE SUCCESS','','success');
                        $('#loading').hide();
                    }
                    else{
                        $('#loading').hide();
                        Swal.fire('UPDATE FAILED','','success');
                        console.log('failed');
                    }
                }
            });
        }
        else if(update.isDenied){
            $('#personal_info').css('zoom','98%');
            Swal.fire('UPDATE CANCELLED','','info');
        }
    });
    
});