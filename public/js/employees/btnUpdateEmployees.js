var employee_image;

function employee_image_save(){
    var file = $('#employee_image')[0].files[0];
    var extension = file.name.split('.').pop().toLowerCase();
    var date = new Date();

    employee_image = $('#employee_number').val().substring(2) + '_' + $('#last_name').val().toUpperCase() + '_' + $('#first_name').val().toUpperCase() + '_' +
                date.getFullYear().toString().slice(-2) +
                ("0" + (date.getMonth() + 1)).slice(-2) +
                ("0" + date.getDate()).slice(-2) +
                ("0" + date.getHours()).slice(-2) +
                ("0" + date.getMinutes()).slice(-2) +
                ("0" + date.getSeconds()).slice(-2) + '.' + extension;


    var croppedImageData = $('#image_preview').attr('src');
    $.ajax({
        url: '/employees/insertImage',
        method: 'post',
        data: {
                employee_image: employee_image,
                image_data: croppedImageData
              },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
            $('#filename').val(response);
        }
    });
}

$('#btnUpdate').on('click',function(){
    if($('.required_field').filter(function(){ return !!this.value; }).length < $(".required_field").length){
        var completed = '1';
    }
    else{
        var completed = '';
    }

    var fields = ['date_hired', 'employee_company', 'employee_branch', 'employee_department', 'employee_position', 'employment_status'];
    var emptyFields = [];

    fields.forEach(function(elementId){
        if(!$('#' + elementId).val()){
            emptyFields.push(elementId);
        }
    });

    if(emptyFields.length > 0){
        var resultString = emptyFields.map(function(field){
            return field.replace(/_/g, ' ').replace(/\b\w/g, function(firstLetter){
                return firstLetter.toUpperCase();
            });
        }).join('</li><li>');

        Swal.fire({
            title: '',
            html: `<span class="text-center fs-3 fw-bolder">Please fill out the fields!</span><br>
                        <span class="text-center fs-4 fw-bold">(Work Info)</span><br><br>
                            <ul style="text-align: left !important; font-weight: 600 !important;">
                                <li>${resultString}</li>
                            </ul>`,
            icon: 'error',
            confirmButtonText: "OK"
        })
        .then((result) => {
            if(result.isConfirmed){
                setTimeout(() => {
                    $('#tab2').click();
                    $('#work_info').addClass('active show');
                }, 100);
            }
        });
        return false;
    }

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
    var province = $('#province option:selected').text() === "SELECT PROVINCE" ? province = null : $('#province option:selected').text();
    var city = $('#city option:selected').text() === "SELECT CITY" ? city = null : $('#city option:selected').text();
    var region = $('#region').val();
    var height = $('#height').val();
    var weight = $('#weight').val();
    var religion = $('#religion').val();
    var civil_status = $('#civil_status').val();
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
    var blood_type = $('#blood_type').val();

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
        if(update.isConfirmed){
            $('#loading').show();
            if(!$('#filename').val() && $('#employee_image').val()){
                employee_image_save();
            }
            else if(!$('#filename').val() && !$('#employee_image').val()){
                employee_image = '';
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
                    completed:completed,
                    employee_image:employee_image,
                    filename_delete:$('#filename_delete').val(),
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
                    blood_type:blood_type
                },
                success:function(data){
                    if(data.result == 'true'){
                        var employee_id = $('#employee_id').val(data.id);
                        var employee_number = $('#employee_number').val();
                        var date_hired = $('#date_hired').val();
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
                            }
                        });

                        var past_medical_condition = $('#past_medical_condition').val();
                        var allergies = $('#allergies').val();
                        var medication = $('#medication').val();
                        var psychological_history = $('#psychological_history').val();

                        if(past_medical_condition || allergies || medication || psychological_history){
                            $.ajax({
                                url:"/employees/updateMedicalHistory",
                                type:"POST",
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    id:id,
                                    employee_id:data.id,
                                    employee_number:$('#employee_number').val(),
                                    past_medical_condition:past_medical_condition,
                                    allergies:allergies,
                                    medication:medication,
                                    psychological_history:psychological_history,
                                }
                            });
                        }

                        // Save Multiple
                        $('.children_tr').each(function(){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/saveChildren',
                                async: false,
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    employee_id     : data.id,
                                    child_name      : $(this).children('.td_1').html(),
                                    child_birthday  : $(this).children('.td_2').html(),
                                    child_gender    : $(this).children('.td_4').html(),
                                    children_change : children_change
                                }
                            });
                            children_change = '';
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
                                    employee_id                  : data.id,
                                    college_name                 : $(this).children('.td_1').html(),
                                    college_degree               : $(this).children('.td_2').html(),
                                    college_inclusive_years_from : $(this).children('.td_3').html().substring(5),
                                    college_inclusive_years_to   : $(this).children('.td_4').html().substring(3),
                                    college_change               : college_change
                                }
                            });
                            college_change = '';
                        });

                        $('.secondary_tr').each(function(){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/saveSecondary',
                                async: false,
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    employee_id       : data.id,
                                    secondary_name    : $(this).children('.td_1').html(),
                                    secondary_address : $(this).children('.td_2').html(),
                                    secondary_from    : $(this).children('.td_3').html().substring(5),
                                    secondary_to      : $(this).children('.td_4').html().substring(3),
                                    secondary_change  : secondary_change
                                }
                            });
                            secondary_change = '';
                        });

                        $('.primary_tr').each(function(){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/savePrimary',
                                async: false,
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    employee_id : data.id,
                                    primary_name    : $(this).children('.td_1').html(),
                                    primary_address : $(this).children('.td_2').html(),
                                    primary_from    : $(this).children('.td_3').html().substring(5),
                                    primary_to      : $(this).children('.td_4').html().substring(3),
                                    primary_change  : primary_change
                                }
                            });
                            primary_change = '';
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
                                    employee_id                   : data.id,
                                    training_name                 : $(this).children('.td_1').html(),
                                    training_title                : $(this).children('.td_2').html(),
                                    training_inclusive_years_from : $(this).children('.td_3').html().substring(5),
                                    training_inclusive_years_to   : $(this).children('.td_4').html().substring(3),
                                    training_change               : training_change
                                }
                            });
                            training_change = '';
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
                                    employee_id                     : data.id,
                                    vocational_name                 : $(this).children('.td_1').html(),
                                    vocational_course               : $(this).children('.td_2').html(),
                                    vocational_inclusive_years_from : $(this).children('.td_3').html().substring(5),
                                    vocational_inclusive_years_to   : $(this).children('.td_4').html().substring(3),
                                    vocational_change               : vocational_change,
                                }
                            });
                            vocational_change = '';
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
                                    employee_id              : data.id,
                                    job_company_name         : $(this).children('.td_1').html(),
                                    job_description          : $(this).children('.td_2').html(),
                                    job_position             : $(this).children('.td_3').html(),
                                    job_contact_number       : $(this).children('.td_4').html(),
                                    job_inclusive_years_from : $(this).children('.td_5').html().substring(5),
                                    job_inclusive_years_to   : $(this).children('.td_6').html().substring(3),
                                    job_history_change       : job_history_change
                                }
                            });
                            job_history_change = '';
                        });

                        // $('.hmo_tr').each(function(){
                        //     $.ajax({
                        //         type: 'POST',
                        //         url: '/employees/saveHmo',
                        //         async: false,
                        //         headers:{
                        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        //         },
                        //         data:{
                        //             employee_id      : data.id,
                        //             hmo              : $(this).children('.td_1').html(),
                        //             coverage         : $(this).children('.td_2').html(),
                        //             particulars      : $(this).children('.td_3').html(),
                        //             room             : $(this).children('.td_4').html(),
                        //             effectivity_date : $(this).children('.td_5').html(),
                        //             expiration_date  : $(this).children('.td_6').html(),
                        //             hmo_change       : hmo_change
                        //         }
                        //     });
                        //     hmo_change = '';
                        // });

                        $('.tr_hmo').each(function(){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/saveHmo',
                                async: false,
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    employee_id      : data.id,
                                    hmo              : $(this).find('input[name="hmo"]').val(),
                                    coverage         : $(this).find('input[name="coverage"]').val(),
                                    particulars      : $(this).find('input[name="particulars"]').val(),
                                    room             : $(this).find('input[name="room"]').val(),
                                    effectivity_date : $(this).find('input[name="effectivity_date"]').val(),
                                    expiration_date  : $(this).find('input[name="expiration_date"]').val(),
                                    hmo_change       : hmo_change
                                }
                            });
                            hmo_change = '';
                        });

                        // Delete Multiple
                        if(children_id.length > 0){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/children_delete',
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    id: children_id.toString(),
                                    employee_id: data.id,
                                    children_change:children_change
                                }
                            });
                            children_id = [];
                        }

                        if(college_id.length > 0){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/college_delete',
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    id: college_id.toString(),
                                    employee_id: data.id,
                                    college_change:college_change
                                }
                            });
                            college_id = [];
                        }

                        if(secondary_id.length > 0){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/secondary_delete',
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    id               : secondary_id.toString(),
                                    employee_id      : data.id,
                                    secondary_change : secondary_change
                                }
                            });
                            secondary_id = [];
                        }

                        if(primary_id.length > 0){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/primary_delete',
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    id             : primary_id.toString(),
                                    employee_id    : data.id,
                                    primary_change : primary_change
                                }
                            });
                            primary_id = [];
                        }

                        if(training_id.length > 0){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/training_delete',
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    id: training_id.toString(),
                                    employee_id: data.id,
                                    training_change:training_change
                                }
                            });
                            training_id = [];
                        }

                        if(vocational_id.length > 0){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/vocational_delete',
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    id: vocational_id.toString(),
                                    employee_id:data.id,
                                    vocational_change:vocational_change
                                }
                            });
                            vocational_id = [];
                        }

                        if(job_history_id.length > 0){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/job_history_delete',
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    id: job_history_id.toString(),
                                    employee_id: data.id,
                                    job_history_change:job_history_change
                                }
                            });
                            job_history_id = [];
                        }

                        if(memo_id.length > 0){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/memo_delete',
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    id: memo_id.toString(),
                                    employee_id: data.id,
                                    memo_change:memo_change
                                }
                            });
                            memo_id = [];
                        }

                        if(evaluation_id.length > 0){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/evaluation_delete',
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    id: evaluation_id.toString(),
                                    employee_id: data.id,
                                    evaluation_change:evaluation_change
                                }
                            });
                            evaluation_id = [];
                        }

                        if(contracts_id.length > 0){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/contracts_delete',
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    id: contracts_id.toString(),
                                    employee_id: data.id,
                                    contracts_change: contracts_change
                                }
                            });
                            contracts_id = [];
                        }

                        if(resignation_id.length > 0){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/resignation_delete',
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    id: resignation_id.toString(),
                                    employee_id: data.id,
                                    resignation_change: resignation_change
                                }
                            });
                            resignation_id = [];
                        }

                        if(termination_id.length > 0){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/termination_delete',
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    id: termination_id.toString(),
                                    employee_id: data.id,
                                    termination_change: termination_change
                                }
                            });
                            termination_id = [];
                        }

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

                        var formData = new FormData($('#documents_form').get(0));
                        formData.append('employee_id', data.id);
                        if(memo_change){
                            formData.append('memo_change', memo_change);
                        }
                        if(evaluation_change){
                            formData.append('evaluation_change', evaluation_change);
                        }
                        if(contracts_change){
                            formData.append('contracts_change', contracts_change);
                        }
                        if(resignation_change){
                            formData.append('resignation_change', resignation_change);
                        }
                        if(termination_change){
                            formData.append('termination_change', termination_change);
                        }

                        $.ajax({
                            url: '/employees/updateDocuments',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $('#loading').hide();
                        Swal.fire('UPDATE SUCCESS','','success');
                        setTimeout(() => {
                            if(tblChildren == 'tblChildren'){
                                children_table(data.id);
                                $('.btn_children').parent().parent().remove();
                                tblChildren = '';
                            }

                            if(tblCollege == 'tblCollege'){
                                college_table(data.id);
                                $('.btn_college').parent().parent().remove();
                                tblCollege = '';
                            }

                            if(tblSecondary == 'tblSecondary'){
                                secondary_table(data.id);
                                $('.btn_secondary').parent().parent().remove();
                                tblSecondary = '';
                            }

                            if(tblPrimary == 'tblPrimary'){
                                primary_table(data.id);
                                $('.btn_primary').parent().parent().remove();
                                tblPrimary = '';
                            }

                            if(tblTraining == 'tblTraining'){
                                training_table(data.id);
                                $('.btn_training').parent().parent().remove();
                                tblTraining = '';
                            }

                            if(tblVocational == 'tblVocational'){
                                vocational_table(data.id);
                                $('.btn_vocational').parent().parent().remove();
                                tblVocational = '';
                            }

                            if(tblJob == 'tblJob'){
                                job_history_table(data.id);
                                $('.btn_job').parent().parent().remove();
                                tblJob = '';
                            }

                            if(tblHmo == 'tblHmo'){
                                hmo_table(data.id);
                                $('.btn_hmo').parent().parent().remove();
                                tblHmo = '';
                            }

                            if(tblMemo == 'tblMemo'){
                                memo_table(data.id, employee_number, last_name, first_name);
                                $('.btn_memo').parent().parent().remove();
                                $('#memo_subject').attr('name','memo_subject[]');
                                $('#memo_date').attr('name','memo_date[]');
                                $('#memo_penalty').attr('name','memo_penalty[]');
                                $('#memo_file').attr('name','memo_file[]');
                                tblMemo = '';
                            }

                            if(tblEvaluation == 'tblEvaluation'){
                                evaluation_table(data.id, employee_number, last_name, first_name);
                                $('.btn_evaluation').parent().parent().remove();
                                $('#evaluation_reason').attr('name','evaluation_reason[]');
                                $('#evaluation_date').attr('name','evaluation_date[]');
                                $('#evaluation_evaluated_by').attr('name','evaluation_evaluated_by[]');
                                $('#evaluation_file').attr('name','evaluation_file[]');
                                tblEvaluation = '';
                            }

                            if(tblContracts == 'tblContracts'){
                                contracts_table(data.id, employee_number, last_name, first_name);
                                $('.btn_contracts').parent().parent().remove();
                                $('#contracts_type').attr('name','contracts_type[]');
                                $('#contracts_date').attr('name','contracts_date[]');
                                $('#contracts_file').attr('name','contracts_file[]');
                                tblContracts = '';
                            }

                            if(tblResignation == 'tblResignation'){
                                resignation_table(data.id, employee_number, last_name, first_name);
                                $('.btn_resignation').parent().parent().remove();
                                $('#resignation_reason').attr('name','resignation_reason[]');
                                $('#resignation_date').attr('name','resignation_date[]');
                                $('#resignation_file').attr('name','resignation_file[]');
                                tblResignation = '';
                            }

                            if(tblTermination == 'tblTermination'){
                                termination_table(data.id, employee_number, last_name, first_name);
                                $('.btn_termination').parent().parent().remove();
                                $('#termination_reason').attr('name','termination_reason[]');
                                $('#termination_date').attr('name','termination_date[]');
                                $('#termination_file').attr('name','termination_file[]');
                                tblTermination = '';
                            }
                        }, 2000);

                        setTimeout(() => {
                            Swal.fire({
                                title: 'Are you finished editing?',
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
                            }).then((edit) => {
                                if(edit.isConfirmed){
                                    $('#loading').show();
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 2000);
                                }
                                else if(edit.isDenied){
                                    disableUpdate('', 0, true);
                                }
                            });
                        }, 2000);
                    }
                    else{
                        $('#loading').hide();
                        Swal.fire('UPDATE FAILED','','error');
                    }
                }
            });
        }
        else if(update.isDenied){
            Swal.fire('UPDATE CANCELLED','','info');
        }
    });
});

$(document).on('click','#btnUpdateHmo',function(){
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
        if(update.isConfirmed){
            $('#loading').show();
            $.ajax({
                url:"/employees/updateHmo",
                type:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id               : $('#hmoId').val(),
                    employee_id      : $('#hidden_id').val(),
                    hmo              : $('#hmoName').val(),
                    coverage         : $('#hmoCoverage').val(),
                    particulars      : $('#hmoParticulars').val(),
                    room             : $('#hmoRoom').val(),
                    effectivity_date : $('#hmoEffecitivityDate').val(),
                    expiration_date  : $('#hmoExpirationDate').val(),
                    status           : $('#hmoStatus').val()
                },
                success:function(response){
                    $('#loading').hide();
                    if(response == 'true'){
                        Swal.fire('UPDATE SUCCESS','','success');
                        changeCounter++;
                        disableUpdate('', changeCounter, true);
                        setTimeout(() => {
                            $('#hmoTable').DataTable().ajax.reload();
                        }, 1000);
                        $('#editHmoModal').modal('hide');
                    }
                    else if(response == 'no changes'){
                        Swal.fire('NO CHANGES FOUND', '', 'error');
                    }
                    else{
                        Swal.fire('UPDATE FAILED', '', 'error');
                    }
                }
            });
        }
    });
});