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

    var id = $('#hidden_id').val();
    var current_employee_number = $('#current_employee_number').val();
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
                    current_employee_number:current_employee_number,
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
                                    employee_id : data.id,
                                    child_name : $(this).children('.td_1').html(),
                                    child_birthday: $(this).children('.td_2').html(),
                                    child_gender  : $(this).children('.td_4').html(),
                                    children_change:children_change
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
                                    employee_id : data.id,
                                    college_name : $(this).children('.td_1').html(),
                                    college_degree : $(this).children('.td_2').html(),
                                    college_inclusive_years_from: $(this).children('.td_3').html(),
                                    college_inclusive_years_to: $(this).children('.td_4').html(),
                                    college_change:college_change
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
                                    employee_id : data.id,
                                    secondary_name : $(this).children('.td_1').html(),
                                    secondary_address : $(this).children('.td_2').html(),
                                    secondary_from: $(this).children('.td_3').html(),
                                    secondary_to: $(this).children('.td_4').html(),
                                    secondary_change:secondary_change
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
                                    primary_from    : $(this).children('.td_3').html(),
                                    primary_to      : $(this).children('.td_4').html(),
                                    primary_change  : primary_change
                                }
                            });
                            primary_change = '';
                        });

                        $('.hmo_tr').each(function(){
                            $.ajax({
                                type: 'POST',
                                url: '/employees/saveHmo',
                                async: false,
                                headers:{
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data:{
                                    employee_id      : data.id,
                                    hmo              : $(this).children('.td_1').html(),
                                    coverage         : $(this).children('.td_2').html(),
                                    particulars      : $(this).children('.td_3').html(),
                                    room             : $(this).children('.td_4').html(),
                                    effectivity_date : $(this).children('.td_5').html(),
                                    expiration_date  : $(this).children('.td_6').html(),
                                    hmo_change       : hmo_change
                                }
                            });
                            hmo_change = '';
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
                                    employee_id : data.id,
                                    vocational_name : $(this).children('.td_1').html(),
                                    vocational_course : $(this).children('.td_2').html(),
                                    vocational_inclusive_years_from: $(this).children('.td_3').html(),
                                    vocational_inclusive_years_to: $(this).children('.td_4').html(),
                                    vocational_change:vocational_change,
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
                                    employee_id : data.id,
                                    job_company_name : $(this).children('.td_1').html(),
                                    job_description : $(this).children('.td_2').html(),
                                    job_position : $(this).children('.td_3').html(),
                                    job_contact_number : $(this).children('.td_4').html(),
                                    job_inclusive_years_from : $(this).children('.td_5').html(),
                                    job_inclusive_years_to : $(this).children('.td_6').html(),
                                    job_history_change:job_history_change
                                }
                            });
                            job_history_change = '';
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
                                $('.children_table_orig').dataTable().fnDestroy();
                                $('.children_table_orig').DataTable({
                                    columnDefs: [
                                        {
                                            "render": function(data, type, row, meta){
                                                return '<button type="button" class="btn btn-danger btn_delete_children center" id="' + meta.row + '" onclick="deleteRow(\'.children_table_orig\', children_id, \'children_change\', this)"><i class="fa-solid fa-trash-can"></i> </button>';
                                            },
                                            "defaultContent": '',
                                            "data": null,
                                            "targets": [4],
                                        },
                                        {
                                            data: null,
                                            render: function(data, type, row, meta) {
                                                var today = new Date();
                                                var birthDate = new Date(row.child_birthday);
                                                var age = today.getFullYear() - birthDate.getFullYear();
                                                var m = today.getMonth() - birthDate.getMonth();
                                                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                                                    age--;
                                                }
                                                return age;
                                            },
                                            targets: [2] // index of new column
                                        }
                                    ],
                                    searching: false,
                                    paging: false,
                                    ordering: false,
                                    info: false,
                                    autoWidth: false,
                                    language:{
                                        emptyTable: "NO DATA AVAILABLE",
                                        processing: "Loading...",
                                    },
                                    serverSide: true,
                                    ajax: {
                                        url: '/employees/children_data',
                                        async: false,
                                        data:{
                                            id: data.id,
                                        }
                                    },
                                    columns: [
                                        { data: 'child_name', width: '22.5%'},
                                        {
                                            data: 'child_birthday', width: '22.5%',
                                            "render":function(data,type,row){
                                                return formatDate(row.child_birthday);
                                            }
                                        },
                                        { data:  null, defaultContent : "", width: '22.5%'},
                                        { data: 'child_gender', width: '22.5%'}
                                    ],
                                    initComplete: function(){
                                        if(!$('.children_table_orig').DataTable().data().any()){
                                            $('#children_table_orig').hide();
                                        }
                                        else{
                                            $('#children_table_orig').show();
                                        }
                                    }
                                });
                                $('.btn_children').parent().parent().remove();
                                tblChildren = '';
                            }

                            if(tblCollege == 'tblCollege'){
                                $('.college_table_orig').dataTable().fnDestroy();
                                $('.college_table_orig').DataTable({
                                    columnDefs: [
                                        {
                                            "render": function(data, type, row, meta){
                                                return '<button type="button" class="btn btn-danger btn_delete_college center" id="' + meta.row + '" onclick="deleteRow(\'.college_table_orig\', college_id, \'college_change\', this)"><i class="fa-solid fa-trash-can"></i> </button>';
                                            },
                                            "defaultContent": '',
                                            "data": null,
                                            "targets": [4],
                                        }
                                    ],
                                    searching: false,
                                    paging: false,
                                    info: false,
                                    ordering:false,
                                    autoWidth: false,
                                    language:{
                                        emptyTable: "NO DATA AVAILABLE",
                                        processing: "Loading...",
                                    },
                                    serverSide: true,
                                    ajax: {
                                        url: '/employees/college_data',
                                        async: false,
                                        data:{
                                            id: data.id,
                                        }
                                    },
                                    columns: [
                                        { data: 'college_name',width: '30%'},
                                        { data: 'college_degree', width: '30%'},
                                        {
                                            data: 'college_inclusive_years_from',
                                            "render":function(data,type,row){
                                                return "<span class='d-none'>"+row.college_inclusive_years_from+"</span>"+ "FROM: "+moment(row.college_inclusive_years_from).format('MMM. YYYY');
                                            },
                                            width: '15%'},
                                        {
                                            data: 'college_inclusive_years_to',
                                            "render":function(data,type,row){
                                                return "<span class='d-none'>"+row.college_inclusive_years_to+"</span>"+ "TO: "+moment(row.college_inclusive_years_to).format('MMM. YYYY');
                                            },
                                            width: '15%'}
                                    ],
                                    initComplete: function(){
                                        if(!$('.college_table_orig').DataTable().data().any()){
                                            $('#college_table_orig').hide();
                                        }
                                        else{
                                            $('#college_table_orig').show();
                                        }
                                    }
                                });
                                $('.btn_college').parent().parent().remove();
                                tblCollege = '';
                            }

                            if(tblSecondary == 'tblSecondary'){
                                $('.secondary_table_orig').dataTable().fnDestroy();
                                $('.secondary_table_orig').DataTable({
                                    columnDefs: [
                                        {
                                            "render": function(data, type, row, meta){
                                                return '<button type="button" class="btn btn-danger btn_delete_secondary center" id="' + meta.row + '" onclick="deleteRow(\'.secondary_table_orig\', secondary_id, \'secondary_change\', this)"><i class="fa-solid fa-trash-can"></i> </button>';
                                            },
                                            "defaultContent": '',
                                            "data": null,
                                            "targets": [4],
                                        }
                                    ],
                                    searching: false,
                                    paging: false,
                                    info: false,
                                    ordering:false,
                                    autoWidth: false,
                                    language:{
                                        emptyTable: "NO DATA AVAILABLE",
                                        processing: "Loading...",
                                    },
                                    serverSide: true,
                                    ajax: {
                                        url: '/employees/secondary_data',
                                        async: false,
                                        data:{
                                            id: data.id,
                                        }
                                    },
                                    columns: [
                                        { data: 'secondary_name',width: '30%'},
                                        { data: 'secondary_address', width: '30%'},
                                        {
                                            data: 'secondary_from',
                                            "render":function(data,type,row){
                                                return "FROM: "+moment(row.secondary_from).format('MMMM YYYY');
                                            },
                                            width: '15%'},
                                        {
                                            data: 'secondary_to',
                                            "render":function(data,type,row){
                                                return "TO: "+moment(row.secondary_to).format('MMMM YYYY');
                                            },
                                            width: '15%'}
                                    ],
                                    initComplete: function(){
                                        if(!$('.secondary_table_orig').DataTable().data().any()){
                                            $('#secondary_table_orig').hide();
                                        }
                                        else{
                                            $('#secondary_table_orig').show();
                                        }
                                    }
                                });
                                $('.btn_secondary').parent().parent().remove();
                                tblSecondary = '';
                            }

                            if(tblPrimary == 'tblPrimary'){
                                $('.primary_table_orig').dataTable().fnDestroy();
                                $('.primary_table_orig').DataTable({
                                    columnDefs: [
                                        {
                                            "render": function(data, type, row, meta){
                                                return '<button type="button" class="btn btn-danger btn_delete_primary center" id="' + meta.row + '" onclick="deleteRow(\'.primary_table_orig\', primary_id, \'primary_change\', this)"><i class="fa-solid fa-trash-can"></i> </button>';
                                            },
                                            "defaultContent": '',
                                            "data": null,
                                            "targets": [4],
                                        }
                                    ],
                                    searching: false,
                                    paging: false,
                                    info: false,
                                    ordering:false,
                                    autoWidth: false,
                                    language:{
                                        emptyTable: "NO DATA AVAILABLE",
                                        processing: "Loading...",
                                    },
                                    serverSide: true,
                                    ajax: {
                                        url: '/employees/primary_data',
                                        async: false,
                                        data:{
                                            id: data.id,
                                        }
                                    },
                                    columns: [
                                        { data: 'primary_name',width: '30%'},
                                        { data: 'primary_address', width: '30%'},
                                        {
                                            data: 'primary_from',
                                            "render":function(data,type,row){
                                                return "FROM: "+moment(row.primary_from).format('MMMM YYYY');
                                            },
                                            width: '15%'},
                                        {
                                            data: 'primary_to',
                                            "render":function(data,type,row){
                                                return "TO: "+moment(row.primary_to).format('MMMM YYYY');
                                            },
                                            width: '15%'}
                                    ],
                                    initComplete: function(){
                                        if(!$('.primary_table_orig').DataTable().data().any()){
                                            $('#primary_table_orig').hide();
                                        }
                                        else{
                                            $('#primary_table_orig').show();
                                        }
                                    }
                                });
                                $('.btn_primary').parent().parent().remove();
                                tblPrimary = '';
                            }

                            if(tblTraining == 'tblTraining'){
                                $('.training_table_orig').dataTable().fnDestroy();
                                $('.training_table_orig').DataTable({
                                    columnDefs: [
                                        {
                                            "render": function(data, type, row, meta){
                                                return '<button type="button" class="btn btn-danger btn_delete_training center" id="' + meta.row + '" onclick="deleteRow(\'.training_table_orig\', training_id, \'training_change\', this)"><i class="fa-solid fa-trash-can"></i> </button>';
                                            },
                                            "defaultContent": '',
                                            "data": null,
                                            "targets": [4],
                                        }
                                    ],
                                    searching: false,
                                    paging: false,
                                    ordering: false,
                                    info: false,
                                    autoWidth: false,
                                    language:{
                                        emptyTable: "NO DATA AVAILABLE",
                                        processing: "Loading...",
                                    },
                                    serverSide: true,
                                    ajax: {
                                        url: '/employees/training_data',
                                        async: false,
                                        data:{
                                            id: data.id,
                                        }
                                    },
                                    columns: [
                                        { data: 'training_name',width: '30%'},
                                        { data: 'training_title', width: '30%'},
                                        {
                                            data: 'training_inclusive_years_from',
                                            "render":function(data,type,row){
                                                return "<span class='d-none'>"+row.training_inclusive_years_from+"</span>"+ "FROM: "+moment(row.training_inclusive_years_from).format('MMM. YYYY');
                                            },
                                            width: '15%'},
                                        {
                                            data: 'training_inclusive_years_to',
                                            "render":function(data,type,row){
                                                return "<span class='d-none'>"+row.training_inclusive_years_to+"</span>"+ "TO: "+moment(row.training_inclusive_years_to).format('MMM. YYYY');
                                            },
                                            width: '15%'}
                                    ],
                                    initComplete: function(){
                                        if(!$('.training_table_orig').DataTable().data().any()){
                                            $('#training_table_orig').hide();
                                            $('.checkbox5').addClass('btnDisabled').attr('disabled',true);
                                        }
                                        else{
                                            $('#training_table_orig').show();
                                            $('.checkbox5').removeClass('btnDisabled').attr('disabled',false);
                                        }
                                    }
                                });
                                $('.btn_training').parent().parent().remove();
                                tblTraining = '';
                            }

                            if(tblVocational == 'tblVocational'){
                                $('.vocational_table_orig').dataTable().fnDestroy();
                                $('.vocational_table_orig').DataTable({
                                    columnDefs: [
                                        {
                                            "render": function(data, type, row, meta){
                                                return '<button type="button" class="btn btn-danger btn_delete_vocational center" id="' + meta.row + '" onclick="deleteRow(\'.vocational_table_orig\', vocational_id, \'vocational_change\', this)"><i class="fa-solid fa-trash-can"></i> </button>';
                                            },
                                            "defaultContent": '',
                                            "data": null,
                                            "targets": [4],
                                        }
                                    ],
                                    searching: false,
                                    paging: false,
                                    ordering: false,
                                    info: false,
                                    autoWidth: false,
                                    language:{
                                        emptyTable: "NO DATA AVAILABLE",
                                        processing: "Loading...",
                                    },
                                    serverSide: true,
                                    ajax: {
                                        url: '/employees/vocational_data',
                                        async: false,
                                        data:{
                                            id: data.id,
                                        }
                                    },
                                    columns: [
                                        { data: 'vocational_name', width: '30%'},
                                        { data: 'vocational_course', width: '30%'},
                                        {
                                            data: 'vocational_inclusive_years_from',
                                            "render":function(data,type,row){
                                                return "<span class='d-none'>"+row.vocational_inclusive_years_from+"</span>"+ "FROM: "+moment(row.vocational_inclusive_years_from).format('MMM. YYYY');
                                            },
                                            width: '15%'
                                        },
                                        {
                                            data: 'vocational_inclusive_years_to',
                                            "render":function(data,type,row){
                                                return "<span class='d-none'>"+row.vocational_inclusive_years_to+"</span>"+ "TO: "+moment(row.vocational_inclusive_years_to).format('MMM. YYYY');
                                            },
                                            width: '15%'
                                        }
                                    ],
                                    initComplete: function(){
                                        if(!$('.vocational_table_orig').DataTable().data().any()){
                                            $('#vocational_table_orig').hide();
                                            $('.checkbox6').addClass('btnDisabled').attr('disabled',true);
                                        }
                                        else{
                                            $('#vocational_table_orig').show();
                                            $('.checkbox6').removeClass('btnDisabled').attr('disabled',false);
                                        }
                                    }
                                });
                                $('.btn_vocational').parent().parent().remove();
                                tblVocational = '';
                            }

                            if(tblJob == 'tblJob'){
                                $('.job_history_table_orig').dataTable().fnDestroy();
                                $('.job_history_table_orig').DataTable({
                                    columnDefs: [
                                        {
                                            "render": function(data, type, row, meta){
                                                return '<button type="button" class="btn btn-danger btn_delete_job center" id="' + meta.row + '" onclick="deleteRow(\'.job_history_table_orig\', job_history_id, \'job_history_change\', this)"><i class="fa-solid fa-trash-can"></i> </button>';
                                            },
                                            "defaultContent": '',
                                            "data": null,
                                            "targets": [6],
                                        }
                                    ],
                                    searching: false,
                                    paging: false,
                                    ordering: false,
                                    info: false,
                                    autoWidth: false,
                                    language:{
                                        emptyTable: "NO DATA AVAILABLE",
                                        processing: "Loading...",
                                    },
                                    serverSide: true,
                                    ajax: {
                                        url: '/employees/job_history_data',
                                        async: false,
                                        data:{
                                            id: data.id,
                                        }
                                    },
                                    columns: [
                                        { data: 'job_company_name',width : '15%'},
                                        { data: 'job_description',width : '15%'},
                                        { data: 'job_position', width: '15%'},
                                        { data: 'job_contact_number', width : '15%'},
                                        {
                                            data: 'job_inclusive_years_from',
                                            "render":function(data,type,row){
                                                return "<span class='d-none'>"+row.job_inclusive_years_from+"</span>"+ "FROM: "+moment(row.job_inclusive_years_from).format('MMM. YYYY');
                                            },
                                            width : '15%'
                                        },
                                        {
                                            data: 'job_inclusive_years_to',
                                            "render":function(data,type,row){
                                                return "<span class='d-none'>"+row.job_inclusive_years_to+"</span>"+ "TO: "+moment(row.job_inclusive_years_to).format('MMM. YYYY');
                                            },
                                            width : '15%'
                                        }
                                    ],
                                    initComplete: function(){
                                        if(!$('.job_history_table_orig').DataTable().data().any()){
                                            $('#job_history_table_orig').hide();
                                            $('#checkbox6').prop('disabled',true);
                                            $('.checkbox6').addClass('btnDisabled').attr('disabled',true);
                                        }
                                        else{
                                            $('#job_history_table_orig').show();
                                            $('#checkbox6').prop('disabled',false);
                                            $('.checkbox6').removeClass('btnDisabled').attr('disabled',false);
                                        }
                                    }
                                });
                                $('.btn_job').parent().parent().remove();
                                tblJob = '';
                            }

                            if(tblHmo == 'tblHmo'){
                                $('.hmo_table_orig').dataTable().fnDestroy();
                                $('.hmo_table_orig').DataTable({
                                    columnDefs: [
                                        {
                                            "render": function(data, type, row, meta){
                                                return `<button type="button" class="btn btn-primary center btnEditHmo" hmo_id=${row.id} hmo_name=${row.hmo} hmo_coverage=${row.coverage} hmo_particulars=${row.particulars} hmo_room=${row.room} hmo_effectivity_date=${row.effectivity_date} hmo_expiration_date=${row.expiration_date} hmo_status=${row.status}><i class="fa-solid fa-pen-to-square"></i> </button>`;
                                            },
                                            "defaultContent": '',
                                            "data": null,
                                            "targets": [7],
                                        }
                                    ],
                                    searching: false,
                                    paging: false,
                                    info: false,
                                    ordering:false,
                                    autoWidth: false,
                                    language:{
                                        emptyTable: "NO DATA AVAILABLE",
                                        processing: "Loading...",
                                    },
                                    serverSide: true,
                                    ajax: {
                                        url: '/employees/hmo_data',
                                        async: false,
                                        data:{
                                            id: data.id,
                                        }
                                    },
                                    columns: [
                                        { data: 'hmo',         width: '15%'},
                                        { data: 'coverage',    width: '15%'},
                                        { data: 'particulars', width: '15%'},
                                        { data: 'room',        width: '15%'},
                                        {
                                            data: 'effectivity_date', width: '15%',
                                            "render":function(data,type,row){
                                                return moment(data).format('MMMM D, YYYY');
                                            }
                                        },
                                        {
                                            data: 'expiration_date', width: '15%',
                                            "render":function(data,type,row){
                                                return moment(data).format('MMMM D, YYYY');
                                            }
                                        },
                                        { data: 'status', width: '5%'}
                                    ],
                                    initComplete: function(){
                                        if(!$('.hmo_table_orig').DataTable().data().any()){
                                            $('#hmo_table_orig').hide();
                                        }
                                        else{
                                            $('#hmo_table_orig').show();
                                        }
                                    }
                                });
                                $('.btn_hmo').parent().parent().remove();
                                tblHmo = '';
                            }

                            if(tblMemo == 'tblMemo'){
                                $('.memo_table_data').dataTable().fnDestroy();
                                $('.memo_table_data').DataTable({
                                    columnDefs: [
                                        {
                                            "render": function(data, type, row, meta){
                                                return '<button type="button" class="btn btn-danger btn_delete_memo center" id="' + meta.row + '" onclick="deleteRow(\'.memo_table_data\', memo_id, \'memo_change\', this)"><i class="fa-solid fa-trash-can"></i> </button>';
                                            },
                                            "defaultContent": '',
                                            "data": null,
                                            "targets": [4],
                                        }
                                    ],
                                    searching: false,
                                    paging: false,
                                    info: false,
                                    ordering:false,
                                    autoWidth: false,
                                    language:{
                                        emptyTable: "NO DATA AVAILABLE",
                                        processing: "Loading...",
                                    },
                                    serverSide: true,
                                    ajax: {
                                        url: '/employees/memo_data',
                                        async: false,
                                        data:{
                                            id: data.id,
                                        }
                                    },
                                    columns: [
                                        { data: 'memo_subject',width: '22.5%'},
                                        {
                                            data: 'memo_date',
                                            "render":function(data,type,row){
                                                return "<span class='d-none'>"+row.memo_date+"</span>"+moment(row.memo_date).format('LL');
                                            },
                                            width: '22.5%'},
                                        { data: 'memo_penalty', width: '22.5%'},
                                        {
                                            data: 'memo_file',
                                            "render": function(data, type, row){
                                                    if(employee_number.includes('ID') || employee_number.includes('AP') || employee_number.includes('PL') || employee_number.includes('MJ') || employee_number.includes('NU')){
                                                        return `<a href="/storage/evaluation/${employee_number.substring(2)}_${last_name}_${first_name}/${row.memo_file}" title="DOWNLOAD FILE" download>${row.memo_file}</a>`;
                                                    }
                                                    return `<a href="/storage/evaluation/${employee_number}_${last_name}_${first_name}/${row.memo_file}" title="DOWNLOAD FILE" download>${row.memo_file}</a>`;
                                            },
                                            width: '22.5%'
                                        }
                                    ],
                                    initComplete: function(){
                                        if(!$('.memo_table_data').DataTable().data().any()){
                                            $('#memo_table_data').hide();
                                        }
                                        else{
                                            $('#memo_table_data').show();
                                        }
                                    }
                                });
                                $('.btn_memo').parent().parent().remove();
                                $('#memo_subject').attr('name','memo_subject[]');
                                $('#memo_date').attr('name','memo_date[]');
                                $('#memo_penalty').attr('name','memo_penalty[]');
                                $('#memo_file').attr('name','memo_file[]');
                                tblMemo = '';
                            }

                            if(tblEvaluation == 'tblEvaluation'){
                                $('.evaluation_table_data').dataTable().fnDestroy();
                                $('.evaluation_table_data').DataTable({
                                    columnDefs: [
                                        {
                                            "render": function(data, type, row, meta){
                                                return '<button type="button" class="btn btn-danger btn_delete_evaluation center" id="' + meta.row + '" onclick="deleteRow(\'.evaluation_table_data\', evaluation_id, \'evaluation_change\', this)"><i class="fa-solid fa-trash-can"></i> </button>';
                                            },
                                            "defaultContent": '',
                                            "data": null,
                                            "targets": [4],
                                        }
                                    ],
                                    searching: false,
                                    paging: false,
                                    info: false,
                                    ordering:false,
                                    autoWidth: false,
                                    language:{
                                        emptyTable: "NO DATA AVAILABLE",
                                        processing: "Loading...",
                                    },
                                    serverSide: true,
                                    ajax: {
                                        url: '/employees/evaluation_data',
                                        async: false,
                                        data:{
                                            id: data.id,
                                        }
                                    },
                                    columns: [
                                        { data: 'evaluation_reason',width: '22.5%'},
                                        {
                                            data: 'evaluation_date',
                                            "render":function(data,type,row){
                                                return "<span class='d-none'>"+row.evaluation_date+"</span>"+moment(row.evaluation_date).format('LL');
                                            },
                                            width: '22.5%'},
                                        { data: 'evaluation_evaluated_by', width: '22.5%'},
                                        {
                                            data: 'evaluation_file',
                                            "render": function(data, type, row){
                                                if(employee_number.includes('ID') || employee_number.includes('AP') || employee_number.includes('PL') || employee_number.includes('MJ') || employee_number.includes('NU')){
                                                    return `<a href="/storage/evaluation/${employee_number.substring(2)}_${last_name}_${first_name}/${row.evaluation_file}" title="DOWNLOAD FILE" download>${row.evaluation_file}</a>`;
                                                }
                                                return `<a href="/storage/evaluation/${employee_number}_${last_name}_${first_name}/${row.evaluation_file}" title="DOWNLOAD FILE" download>${row.evaluation_file}</a>`;
                                            },
                                            width: '22.5%'
                                        }
                                    ],
                                    initComplete: function(){
                                        if(!$('.evaluation_table_data').DataTable().data().any()){
                                            $('#evaluation_table_data').hide();
                                        }
                                        else{
                                            $('#evaluation_table_data').show();
                                        }
                                    }
                                });
                                $('.btn_evaluation').parent().parent().remove();
                                $('#evaluation_reason').attr('name','evaluation_reason[]');
                                $('#evaluation_date').attr('name','evaluation_date[]');
                                $('#evaluation_evaluated_by').attr('name','evaluation_evaluated_by[]');
                                $('#evaluation_file').attr('name','evaluation_file[]');
                                tblEvaluation = '';
                            }

                            if(tblContracts == 'tblContracts'){
                                $('.contracts_table_data').dataTable().fnDestroy();
                                $('.contracts_table_data').DataTable({
                                    columnDefs: [
                                        {
                                            "render": function(data, type, row, meta){
                                                return '<button type="button" class="btn btn-danger btn_delete_contracts center" id="' + meta.row + '" onclick="deleteRow(\'.contracts_table_data\', contracts_id, \'contracts_change\', this)"><i class="fa-solid fa-trash-can"></i> </button>';
                                            },
                                            "defaultContent": '',
                                            "data": null,
                                            "targets": [3],
                                        }
                                    ],
                                    searching: false,
                                    paging: false,
                                    info: false,
                                    ordering:false,
                                    autoWidth: false,
                                    language:{
                                        emptyTable: "NO DATA AVAILABLE",
                                        processing: "Loading...",
                                    },
                                    serverSide: true,
                                    ajax: {
                                        url: '/employees/contracts_data',
                                        async: false,
                                        data:{
                                            id: data.id,
                                        }
                                    },
                                    columns: [
                                        { data: 'contracts_type',width: '20%'},
                                        {
                                            data: 'contracts_date',
                                            "render":function(data,type,row){
                                                return "<span class='d-none'>"+row.contracts_date+"</span>"+moment(row.contracts_date).format('LL');
                                            },
                                            width: '33.4%'
                                        },
                                        {
                                            data: 'contracts_file',
                                            "render": function(data, type, row){
                                                if(employee_number.includes('ID') || employee_number.includes('AP') || employee_number.includes('PL') || employee_number.includes('MJ') || employee_number.includes('NU')){
                                                    return `<a href="/storage/evaluation/${employee_number.substring(2)}_${last_name}_${first_name}/${row.contracts_file}" title="DOWNLOAD FILE" download>${row.contracts_file}</a>`;
                                                }
                                                return `<a href="/storage/evaluation/${employee_number}_${last_name}_${first_name}/${row.contracts_file}" title="DOWNLOAD FILE" download>${row.contracts_file}</a>`;
                                            },
                                            width: '35.5%'
                                        }
                                    ],
                                    initComplete: function(){
                                        if(!$('.contracts_table_data').DataTable().data().any()){
                                            $('#contracts_table_data').hide();
                                        }
                                        else{
                                            $('#contracts_table_data').show();
                                        }
                                    }
                                });
                                $('.btn_contracts').parent().parent().remove();
                                $('#contracts_type').attr('name','contracts_type[]');
                                $('#contracts_date').attr('name','contracts_date[]');
                                $('#contracts_file').attr('name','contracts_file[]');
                                tblContracts = '';
                            }

                            if(tblResignation == 'tblResignation'){
                                $('.resignation_table_data').dataTable().fnDestroy();
                                $('.resignation_table_data').DataTable({
                                    columnDefs: [
                                        {
                                            "render": function(data, type, row, meta){
                                                return '<button type="button" class="btn btn-danger btn_delete_resignation center" id="' + meta.row + '" onclick="deleteRow(\'.resignation_table_data\', resignation_id, \'resignation_change\', this)"><i class="fa-solid fa-trash-can"></i> </button>';
                                            },
                                            "defaultContent": '',
                                            "data": null,
                                            "targets": [3],
                                        }
                                    ],
                                    searching: false,
                                    paging: false,
                                    info: false,
                                    ordering:false,
                                    autoWidth: false,
                                    language:{
                                        emptyTable: "NO DATA AVAILABLE",
                                        processing: "Loading...",
                                    },
                                    serverSide: true,
                                    ajax: {
                                        url: '/employees/resignation_data',
                                        async: false,
                                        data:{
                                            id: data.id,
                                        }
                                    },
                                    columns: [
                                        { data: 'resignation_reason',width: '20%'},
                                        { data: 'resignation_date', width: '33.4%'},
                                        {
                                            data: 'resignation_file',
                                            "render": function(data, type, row){
                                                if(employee_number.includes('ID') || employee_number.includes('AP') || employee_number.includes('PL') || employee_number.includes('MJ') || employee_number.includes('NU')){
                                                    return `<a href="/storage/evaluation/${employee_number.substring(2)}_${last_name}_${first_name}/${row.resignation_file}" title="DOWNLOAD FILE" download>${row.resignation_file}</a>`;
                                                }
                                                return `<a href="/storage/evaluation/${employee_number}_${last_name}_${first_name}/${row.resignation_file}" title="DOWNLOAD FILE" download>${row.resignation_file}</a>`;
                                            },
                                            width: '35.5%'
                                        }
                                    ],
                                    initComplete: function(){
                                        if(!$('.resignation_table_data').DataTable().data().any()){
                                            $('#resignation_table_data').hide();
                                        }
                                        else{
                                            $('#resignation_table_data').show();
                                        }
                                    }
                                });
                                $('.btn_resignation').parent().parent().remove();
                                $('#resignation_reason').attr('name','resignation_reason[]');
                                $('#resignation_date').attr('name','resignation_date[]');
                                $('#resignation_file').attr('name','resignation_file[]');
                                tblResignation = '';
                            }

                            if(tblTermination == 'tblTermination'){
                                $('.termination_table_data').dataTable().fnDestroy();
                                $('.termination_table_data').DataTable({
                                    columnDefs: [
                                        {
                                            "render": function(data, type, row, meta){
                                                return '<button type="button" class="btn btn-danger btn_delete_termination center" id="' + meta.row + '" onclick="deleteRow(\'.termination_table_data\', termination_id, \'termination_change\', this)"><i class="fa-solid fa-trash-can"></i> </button>';
                                            },
                                            "defaultContent": '',
                                            "data": null,
                                            "targets": [3],
                                        }
                                    ],
                                    searching: false,
                                    paging: false,
                                    info: false,
                                    ordering:false,
                                    autoWidth: false,
                                    language:{
                                        emptyTable: "NO DATA AVAILABLE",
                                        processing: "Loading...",
                                    },
                                    serverSide: true,
                                    ajax: {
                                        url: '/employees/termination_data',
                                        async: false,
                                        data:{
                                            id: data.id,
                                        }
                                    },
                                    columns: [
                                        { data: 'termination_reason',width: '20%'},
                                        { data: 'termination_date', width: '33.4%'},
                                        {
                                            data: 'termination_file',
                                            "render": function(data, type, row){
                                                if(employee_number.includes('ID') || employee_number.includes('AP') || employee_number.includes('PL') || employee_number.includes('MJ') || employee_number.includes('NU')){
                                                    return `<a href="/storage/evaluation/${employee_number.substring(2)}_${last_name}_${first_name}/${row.termination_file}" title="DOWNLOAD FILE" download>${row.termination_file}</a>`;
                                                }
                                                return `<a href="/storage/evaluation/${employee_number}_${last_name}_${first_name}/${row.termination_file}" title="DOWNLOAD FILE" download>${row.termination_file}</a>`;
                                            },
                                            width: '35.5%'
                                        }
                                    ],
                                    initComplete: function(){
                                        if(!$('.termination_table_data').DataTable().data().any()){
                                            $('#termination_table_data').hide();
                                        }
                                        else{
                                            $('#termination_table_data').show();
                                        }
                                    }
                                });
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

$(document).on('click','#btnEditHmo',function(){
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
                        tblChange = 'CHANGED_ROW';
                        $('.hmo_table_orig').DataTable().ajax.reload(null, false);
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