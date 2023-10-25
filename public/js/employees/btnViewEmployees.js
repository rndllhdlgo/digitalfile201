var children_id,
    college_id,
    secondary_id,
    primary_id,
    training_id,
    vocational_id,
    job_history_id,
    memo_id,
    evaluation_id,
    contracts_id,
    resignation_id,
    termination_id = [];

$(document).on('click','table.employeesTable tbody tr',function(){
    $('#loading').hide();

    children_id = [];
    college_id = [];
    secondary_id = [];
    primary_id = [];
    training_id = [];
    vocational_id = [];
    job_history_id = [];
    memo_id = [];
    evaluation_id = [];
    contracts_id = [];
    resignation_id = [];
    termination_id = [];

    if(!employeesTable.data().any()){ return false; }
    var data = employeesTable.row(this).data();
    var id = data.id;

    $('#loading').show();
    $.ajax({
        url: '/employees/fetch',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        type: 'GET',
        data:{
            id: id,
        },
        success: function(data){
            var employee_data = $.map(data.data, function(value, index){
                return [value];
            });
            employee_data.forEach(value => {
                $('#hidden_id').val(value.id);
                // Personal Info
                if(value.employee_image){
                    $('#filename').val(value.employee_image);
                    $('#image_preview').prop('src',window.location.origin+'/storage/employee_images/'+value.employee_image);
                    $('#image_preview').show();
                    $('#image_preview_summary').prop('src',window.location.origin+'/storage/employee_images/'+value.employee_image);
                    $('#image_close').show();
                    $('#image_user').hide();
                    $('#image_button').hide();
                    $('#image_instruction').hide();
                    $('#employee_image').removeClass('required_field');
                }
                else{
                    $('#image_preview_summary').prop('src',window.location.origin+'/storage/employee_images/no_image.png');
                    $('#filename').val('');
                }

                $('#filename_delete').val('');

                $('#first_name').val(value.first_name);
                $('#middle_name').val(value.middle_name);
                $('#last_name').val(value.last_name);
                $('#suffix').val(value.suffix);
                $('#nickname').val(value.nickname);

                $('#birthday').val(value.birthday);
                setTimeout(() => {
                    $('#birthday').change();
                }, app_timeout);

                $('#gender').val(value.gender);
                $('#address').val(value.address);
                $('#ownership').val(value.ownership);

                $('#province_summary').val(value.province);
                $('#province_content').html(value.province);
                $('#city_summary').val(value.city);
                $('#city_content').html(value.city);

                $('.province').each(function(){
                    if($(this).html() == value.province){
                        $(this).prop('selected', true);
                    }
                });
                setTimeout(() => {
                    $('#province').change();
                    setTimeout(() => {
                        $('.city').each(function(){
                            if($(this).html() == value.city){
                                $(this).prop('selected', true);
                            }
                        });
                        setTimeout(() => {
                            $('#city').change();
                        }, app_timeout);
                    }, app_timeout);
                }, app_timeout);

                $('#region').val(value.region);
                $('#region_summary').val(value.region);
                $('#region_content').html(value.region);
                $('#blood_type').val(value.blood_type);
                $('#height').val(value.height);
                $('#weight').val(value.weight);
                $('#religion').val(value.religion);

                $('#civil_status').val(value.civil_status);
                setTimeout(() => {
                    $('#civil_status').change();
                }, app_timeout);

                if(value.civil_status == 'MARRIED'){
                    $('#spouse_div').show();
                }
                else{
                    $('#spouse_div').hide();
                }

                $('#email_address').val(value.email_address);
                $('#telephone_number').val(value.telephone_number);
                $('#cellphone_number').val(value.cellphone_number);

                $('#spouse_name').val(value.spouse_name);
                $('#spouse_contact_number').val(value.spouse_contact_number);
                $('#spouse_profession').val(value.spouse_profession);

                $('#father_name').val(value.father_name);
                $('#father_contact_number').val(value.father_contact_number);
                $('#father_profession').val(value.father_profession);

                $('#mother_name').val(value.mother_name);
                $('#mother_contact_number').val(value.mother_contact_number);
                $('#mother_profession').val(value.mother_profession);

                $('#emergency_contact_name').val(value.emergency_contact_name);
                $('#emergency_contact_relationship').val(value.emergency_contact_relationship);
                $('#emergency_contact_number').val(value.emergency_contact_number);

                // Work Info
                if(value.employee_number){
                    $('#employee_number').val(value.employee_number);
                    $('#employee_number').attr('readonly',true);
                    $('#employee_number').css('cursor','not-allowed');
                }
                $('#date_hired').val(value.date_hired);
                $('#employee_shift').val(value.desc);
                $('#employee_company').val(value.employee_company);
                $('#employee_branch').val(value.employee_branch);
                $('#employee_department').val(value.employee_department);
                $('#employee_position').val(value.employee_position);

                if(value.employment_status){
                    $('#employment_status').val(value.employment_status);
                    var rank = $('#employment_status option[value='+value.employment_status+"]").attr('rank');
                    if(rank != 5){
                        $("#employment_status option").filter(function(){
                            return $(this).attr("rank") < rank;
                        }).remove();
                    }
                }

                setTimeout(() => {
                    $('#employment_status').change();
                }, app_timeout);

                $('#employment_origin').val(value.employment_origin);
                $('#company_email_address').val(value.company_email_address);
                $('#company_contact_number').val(value.company_contact_number);
                $('#hmo_number').val(value.hmo_number);
                $('#sss_number').val(value.sss_number);
                $('#pag_ibig_number').val(value.pag_ibig_number);
                $('#philhealth_number').val(value.philhealth_number);
                $('#tin_number').val(value.tin_number);
                $('#account_number').val(value.account_number);

                //Education
                // if(value.secondary_school_name){
                //     $('.secondary_div').show();
                //     $('#secondary_school_name').val(value.secondary_school_name);
                //     $('#secondary_school_address').val(value.secondary_school_address);
                //     $('#secondary_school_inclusive_years_from').val(value.secondary_school_inclusive_years_from);
                //     $('#secondary_school_inclusive_years_to').val(value.secondary_school_inclusive_years_to);
                // }
                // else{
                //     $('.secondary_div').hide();
                // }

                // if(value.primary_school_name){
                //     $('.primary_div').show();
                //     $('#primary_school_name').val(value.primary_school_name);
                //     $('#primary_school_address').val(value.primary_school_address);
                //     $('#primary_school_inclusive_years_from').val(value.primary_school_inclusive_years_from);
                //     $('#primary_school_inclusive_years_to').val(value.primary_school_inclusive_years_to);
                // }
                // else{
                //     $('.primary_div').hide();
                // }

                // if(!value.secondary_school_name && !value.primary_school_name){
                //     $('#checkbox4').prop('disabled',true);
                //     $('.checkbox4').addClass('btnDisabled').attr('disabled',true);
                // }
                // else{
                //     $('#checkbox4').prop('disabled',false);
                //     $('.checkbox4').removeClass('btnDisabled').attr('disabled',false);
                // }

                if(value.past_medical_condition){
                    $('#past_medical_condition').val(value.past_medical_condition);
                    $('.past_med_div').show();
                }
                else{
                    $('.past_med_div').hide();
                }
                if(value.allergies){
                    $('.allergies_div').show();
                    $('#allergies').val(value.allergies);
                }
                else{
                    $('.allergies_div').hide();
                }
                if(value.medication){
                    $('.medication_div').show();
                    $('#medication').val(value.medication);
                }
                else{
                    $('.medication_div').hide();
                }
                if(value.psychological_history){
                    $('.psych_div').show();
                    $('#psychological_history').val(value.psychological_history);
                }
                else{
                    $('.psych_div').hide();
                }

                if(!value.past_medical_condition && !value.allergies && !value.medication && !value.psychological_history){
                    $('#checkbox7').prop('disabled',true);
                    $('.checkbox7').addClass('btnDisabled').attr('disabled',true);
                }
                else{
                    $('#checkbox7').prop('disabled',false);
                    $('.checkbox7').removeClass('btnDisabled').attr('disabled',false);
                }
                $('#employee_insurance').val(value.employee_insurance);

                $('#leave_credits').dataTable().fnDestroy();
                $('#leave_credits').DataTable({
                    dom: 't',
                    ajax: {
                        url: '/employees/leave_data',
                        data:{
                            empno: value.empno
                        },
                    },
                    order:[0,'asc'],
                    columns: [
                        {
                            data: 'lv_code', defaultContent:'',
                            "render": function(data, type, row){
                                if(data == 'SL'){
                                    return 'SICK LEAVE';
                                }
                                else if(data == 'VL'){
                                    return 'VACATION LEAVE';
                                }
                                else if(data == 'BL'){
                                    return 'BIRTHDAY LEAVE';
                                }
                            }
                        },
                        { data: 'lv_balance'},
                        { data: 'no_days'}
                    ],
                });

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
                            render: function(data, type, row){
                                var today = new Date();
                                var birthDate = new Date(row.child_birthday);
                                var age = today.getFullYear() - birthDate.getFullYear();
                                var m = today.getMonth() - birthDate.getMonth();
                                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                                    age--;
                                }
                                return age;
                            },
                            targets: [2]
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
                            id: value.id,
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
                            $('#haveChildren').prop('checked', false);
                        }
                        else{
                            $('#children_table_orig').show();
                            $('#haveChildren').prop('checked', true);
                            $('#haveChildren').change();
                        }
                    }
                });

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
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'college_name',width: '30%'},
                        { data: 'college_degree', width: '30%'},
                        {
                            data: 'college_inclusive_years_from',
                            "render":function(data,type,row){
                                return "FROM: "+moment(row.college_inclusive_years_from).format('MMM. YYYY');
                            },
                            width: '15%'},
                        {
                            data: 'college_inclusive_years_to',
                            "render":function(data,type,row){
                                return "TO: "+moment(row.college_inclusive_years_to).format('MMM. YYYY');
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
                            id: value.id,
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
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'primary_name', width: '30%'},
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
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'training_name',width: '30%'},
                        { data: 'training_title', width: '30%'},
                        {
                            data: 'training_inclusive_years_from',
                            "render":function(data,type,row){
                                return "FROM: "+moment(row.training_inclusive_years_from).format('MMM. YYYY');
                            },
                            width: '15%'},
                        {
                            data: 'training_inclusive_years_to',
                            "render":function(data,type,row){
                                return "TO: "+moment(row.training_inclusive_years_to).format('MMM. YYYY');
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
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'vocational_name', width: '30%'},
                        { data: 'vocational_course', width: '30%'},
                        {
                            data: 'vocational_inclusive_years_from',
                            "render":function(data,type,row){
                                return "FROM: "+moment(row.vocational_inclusive_years_from).format('MMM. YYYY');
                            },
                            width: '15%'
                        },
                        {
                            data: 'vocational_inclusive_years_to',
                            "render":function(data,type,row){
                                return "TO: "+moment(row.vocational_inclusive_years_to).format('MMM. YYYY');
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

                if(!$('.training_table_orig').DataTable().data().any() && !$('.vocational_table_orig').DataTable().data().any()){
                    $('.training_div').hide();
                    $('.vocational_div').hide();
                    $('#checkbox5').prop('disabled',true);
                }
                else{
                    $('#checkbox5').prop('disabled',false);
                }

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
                            id: value.id,
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
                                return "FROM: "+moment(row.job_inclusive_years_from).format('MMM. YYYY');
                            },
                            width : '15%'
                        },
                        {
                            data: 'job_inclusive_years_to',
                            "render":function(data,type,row){
                                return "TO: "+moment(row.job_inclusive_years_to).format('MMM. YYYY');
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
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'memo_subject',width: '22.5%'},
                        {
                            data: 'memo_date',
                            "render":function(data,type,row){
                                return moment(row.memo_date).format('LL');
                            },
                            width: '22.5%'},
                        { data: 'memo_penalty', width: '22.5%'},
                        {
                            data: 'memo_file',
                            "render": function(data, type, row){
                                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                                        return `<a href="/storage/evaluation/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${row.memo_file}" title="DOWNLOAD FILE" download>${row.memo_file}</a>`;
                                    }
                                    return `<a href="/storage/evaluation/${value.employee_number}_${value.last_name}_${value.first_name}/${row.memo_file}" title="DOWNLOAD FILE" download>${row.memo_file}</a>`;
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
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'evaluation_reason',width: '22.5%'},
                        {
                            data: 'evaluation_date',
                            "render":function(data,type,row){
                                return moment(row.evaluation_date).format('LL');
                            },
                            width: '22.5%'},
                        { data: 'evaluation_evaluated_by', width: '22.5%'},
                        {
                            data: 'evaluation_file',
                            "render": function(data, type, row){
                                if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                                    return `<a href="/storage/evaluation/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${row.evaluation_file}" title="DOWNLOAD FILE" download>${row.evaluation_file}</a>`;
                                }
                                return `<a href="/storage/evaluation/${value.employee_number}_${value.last_name}_${value.first_name}/${row.evaluation_file}" title="DOWNLOAD FILE" download>${row.evaluation_file}</a>`;
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
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'contracts_type',width: '20%'},
                        {
                            data: 'contracts_date',
                            "render":function(data,type,row){
                                return moment(row.contracts_date).format('LL');
                            },
                            width: '33.4%'
                        },
                        {
                            data: 'contracts_file',
                            "render": function(data, type, row){
                                if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                                    return `<a href="/storage/evaluation/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${row.contracts_file}" title="DOWNLOAD FILE" download>${row.contracts_file}</a>`;
                                }
                                return `<a href="/storage/evaluation/${value.employee_number}_${value.last_name}_${value.first_name}/${row.contracts_file}" title="DOWNLOAD FILE" download>${row.contracts_file}</a>`;
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
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'resignation_reason',width: '20%'},
                        { data: 'resignation_date',
                            "render":function(data,type,row){
                                return moment(row.resignation_date).format('LL');
                            },
                            width: '33.4%'},
                        {
                            data: 'resignation_file',
                            "render": function(data, type, row){
                                if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                                    return `<a href="/storage/evaluation/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${row.resignation_file}" title="DOWNLOAD FILE" download>${row.resignation_file}</a>`;
                                }
                                return `<a href="/storage/evaluation/${value.employee_number}_${value.last_name}_${value.first_name}/${row.resignation_file}" title="DOWNLOAD FILE" download>${row.resignation_file}</a>`;
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
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'termination_reason',width: '20%'},
                        { data: 'termination_date',
                            "render":function(data,type,row){
                                return moment(row.termination_date).format('LL');
                            },
                         width: '33.4%'},
                        {
                            data: 'termination_file',
                            "render": function(data, type, row){
                                if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                                    return `<a href="/storage/evaluation/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${row.termination_file}" title="DOWNLOAD FILE" download>${row.termination_file}</a>`;
                                }
                                return `<a href="/storage/evaluation/${value.employee_number}_${value.last_name}_${value.first_name}/${row.termination_file}" title="DOWNLOAD FILE" download>${row.termination_file}</a>`;
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

                var employee_history_table;
                $('.employee_history_table').dataTable().fnDestroy();
                employee_history_table = $('.employee_history_table').DataTable({
                    dom:'l<"breakspace">trip',
                    autoWidth: false,
                    language:{
                        info: "\"Showing _START_ to _END_ of _TOTAL_ User Activities\"",
                        lengthMenu:"Show _MENU_ User Activities",
                        emptyTable:"No User Activities Data Found!",
                        loadingRecords: "Loading User Activities Records...",
                    },
                    aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    processing:true,
                    serverSide:false,
                    ajax: {
                        url: '/employees/history_data',
                        async: false,
                        data:{
                            id: value.id,
                        }
                    },
                    order: [],
                    columnDefs: [
                        {
                            "targets": [0],
                            "visible": false,
                            "searchable": true
                        },
                    ],
                    columns: [
                        { data: 'datetime'},
                        {
                            data: 'date',
                            width: '15%',
                            "render": function(data, type, row){
                                return "<span class='d-none'>"+row.date+"</span>"+moment(row.date).format('MMM. DD, YYYY, h:mm A');
                            }
                        },
                        { data: 'username', width: '15%'},
                        { data: 'user_level', width: '15%'},
                        {
                            data: 'history',
                            width: '55%',
                            "render":function(data,type,row){
                                return history = row.history.replaceAll(" [","<br>[");
                            },
                        }
                    ]
                });
                $('div.breakspace').html('<br><br>');

                $('.filter-input').on('keyup search', function(){
                    employee_history_table.column($(this).data('column')).search($(this).val()).draw();
                });

                setInterval(function(){
                    if($('#loading').is(':hidden') && standby == false){
                        $.ajax({
                            url: "/employee_history_reload",
                            success: function(data){
                                if(data != data_update){
                                    data_update = data;
                                    $('.employee_history_table').DataTable().ajax.reload(null, false);
                                }
                            }
                        });
                    }
                }, 1000);

                var logs_table_data;
                $('.logs_table_data').dataTable().fnDestroy();
                logs_table_data = $('.logs_table_data').DataTable({
                    dom:'l<"breakspace">trip',
                    autoWidth: false,
                    language:{
                        info: "\"Showing _START_ to _END_ of _TOTAL_ User Activities\"",
                        lengthMenu:"Show _MENU_ User Activities",
                        emptyTable:"No User Activities Data Found!",
                        loadingRecords: "Loading User Activities Records...",
                    },
                    aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    processing:true,
                    serverSide:false,
                    ajax: {
                        url: '/employees/logs_data',
                        async: false,
                        data:{
                            id: value.id,
                        }
                    },
                    order: [],
                    columnDefs: [
                        {
                            "targets": [0],
                            "visible": false,
                            "searchable": true
                        },
                    ],
                    columns: [
                        { data: 'datetime' },
                        {
                            data: 'date',
                            width: '15%',
                            "render": function(data, type, row){
                                return "<span class='d-none'>"+row.date+"</span>"+moment(row.date).format('MMM. DD, YYYY, h:mm A');
                            }
                        },
                        { data: 'username', width: '15%'},
                        { data: 'role', width: '15%'},
                        {
                            data: 'activity',
                            width: '55%',
                            "render":function(data,type,row){
                                return activity = row.activity.replaceAll(" [", "<br>[");
                            }
                        }
                    ]
                });
                $('div.breakspace').html('<br><br>');

                $('.filter-input').on('keyup search', function(){
                    logs_table_data.column($(this).data('column')).search($(this).val()).draw();
                });

                setInterval(function(){
                    if($('#loading').is(':hidden') && standby == false){
                        $.ajax({
                            url: "/logs_reload",
                            success: function(data){
                                if(data != data_update){
                                    data_update = data;
                                    $('.logs_table_data').DataTable().ajax.reload(null, false);
                                }
                            }
                        });
                    }
                }, 1000);

                // Variables of changes
                $('th').removeClass("sorting_asc");

                if(value.barangay_clearance_file){
                    $('#barangay_clearance_filename').val(value.barangay_clearance_file);
                    $('.barangay_clearance_div').hide();
                    $('.barangay_clearance_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.barangay_clearance_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.barangay_clearance_file}" title="DOWNLOAD FILE" download>${value.barangay_clearance_file}</a>`);
                    }
                    else{
                        $('.barangay_clearance_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.barangay_clearance_file}" title="DOWNLOAD FILE" download>${value.barangay_clearance_file}</a>`);
                    }
                    $('#barangay_clearance_view').hide();
                    $('#barangay_clearance_delete_button').show();
                    $('#barangay_clearance_file').removeClass('required_field');
                }

                if(value.birthcertificate_file){
                    $('#birthcertificate_filename').val(value.birthcertificate_file);
                    $('.birthcertificate_div').hide();
                    $('.birthcertificate_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.birthcertificate_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.birthcertificate_file}" title="DOWNLOAD FILE" download> ${value.birthcertificate_file}</a>`);
                    }
                    else{
                        $('.birthcertificate_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.birthcertificate_file}" title="DOWNLOAD FILE" download> ${value.birthcertificate_file}</a>`);
                    }
                    $('#birthcertificate_view').hide();
                    $('#birthcertificate_delete_button').show();
                    $('#birthcertificate_file').removeClass('required_field');
                }

                if(value.diploma_file){
                    $('#diploma_filename').val(value.diploma_file);
                    $('.diploma_div').hide();
                    $('.diploma_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.diploma_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.diploma_file}" title="DOWNLOAD FILE" download> ${value.diploma_file}</a>`);
                    }
                    else{
                        $('.diploma_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.diploma_file}" title="DOWNLOAD FILE" download> ${value.diploma_file}</a>`);
                    }
                    $('#diploma_view').hide();
                    $('#diploma_delete_button').show();
                }

                if(value.medical_certificate_file){
                    $('#medical_certificate_filename').val(value.medical_certificate_file);
                    $('.medical_certificate_div').hide();
                    $('.medical_certificate_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.medical_certificate_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.medical_certificate_file}" title="DOWNLOAD FILE" download> ${value.medical_certificate_file}</a>`);
                    }
                    else{
                        $('.medical_certificate_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.medical_certificate_file}" title="DOWNLOAD FILE" download> ${value.medical_certificate_file}</a>`);
                    }
                    $('#medical_certificate_view').hide();
                    $('#medical_certificate_delete_button').show();
                    $('#medical_certificate_file').removeClass('required_field');

                }
                if(value.nbi_clearance_file){
                    $('#nbi_clearance_filename').val(value.nbi_clearance_file);
                    $('.nbi_clearance_div').hide();
                    $('.nbi_clearance_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.nbi_clearance_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.nbi_clearance_file}" title="DOWNLOAD FILE" download> ${value.nbi_clearance_file}</a>`);
                    }
                    else{
                        $('.nbi_clearance_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.nbi_clearance_file}" title="DOWNLOAD FILE" download> ${value.nbi_clearance_file}</a>`);
                    }
                    $('#nbi_clearance_view').hide();
                    $('#nbi_clearance_delete_button').show();
                }

                if(value.pag_ibig_file){
                    $('#pag_ibig_filename').val(value.pag_ibig_file);
                    $('.pag_ibig_div').hide();
                    $('.pag_ibig_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.pag_ibig_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.pag_ibig_file}" title="DOWNLOAD FILE" download> ${value.pag_ibig_file}</a>`);
                    }
                    else{
                        $('.pag_ibig_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.pag_ibig_file}" title="DOWNLOAD FILE" download> ${value.pag_ibig_file}</a>`);
                    }
                    $('#pag_ibig_view').hide();
                    $('#pag_ibig_delete_button').show();
                    $('#pag_ibig_file').removeClass('required_field');
                }

                if(value.philhealth_file){
                    $('#philhealth_filename').val(value.philhealth_file);
                    $('.philhealth_div').hide();
                    $('.philhealth_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.philhealth_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.philhealth_file}" title="DOWNLOAD FILE" download> ${value.philhealth_file}</a>`);
                    }
                    else{
                        $('.philhealth_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.philhealth_file}" title="DOWNLOAD FILE" download> ${value.philhealth_file}</a>`);
                    }
                    $('#philhealth_view').hide();
                    $('#philhealth_delete_button').show();
                    $('#philhealth_file').removeClass('required_field');
                }

                if(value.police_clearance_file){
                    $('#police_clearance_filename').val(value.police_clearance_file);
                    $('.police_clearance_div').hide();
                    $('.police_clearance_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.police_clearance_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.police_clearance_file}" title="DOWNLOAD FILE" download> ${value.police_clearance_file}</a>`);
                    }
                    else{
                        $('.police_clearance_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.police_clearance_file}" title="DOWNLOAD FILE" download> ${value.police_clearance_file}</a>`);
                    }
                    $('#police_clearance_view').hide();
                    $('#police_clearance_delete_button').show();
                    $('#police_clearance_file').removeClass('required_field');
                }

                if(value.resume_file){
                    $('#resume_filename').val(value.resume_file);
                    $('.resume_div').hide();
                    $('.resume_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.resume_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.resume_file}" title="DOWNLOAD FILE" download> ${value.resume_file}</a>`);
                    }
                    else{
                        $('.resume_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.resume_file}" title="DOWNLOAD FILE" download> ${value.resume_file}</a>`);
                    }
                    $('#resume_view').hide();
                    $('#resume_delete_button').show();
                    $('#resume_file').removeClass('required_field');
                }

                if(value.sss_file){
                    $('#sss_filename').val(value.sss_file);
                    $('.sss_div').hide();
                    $('.sss_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.sss_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.sss_file}" title="DOWNLOAD FILE" download> ${value.sss_file}</a>`);
                    }
                    else{
                        $('.sss_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.sss_file}" title="DOWNLOAD FILE" download> ${value.sss_file}</a>`);
                    }
                    $('#sss_view').hide();
                    $('#sss_delete_button').show();
                    $('#sss_file').removeClass('required_field');
                }

                if(value.transcript_of_records_file){
                    $('#transcript_of_records_filename').val(value.transcript_of_records_file);
                    $('.transcript_of_records_div').hide();
                    $('.transcript_of_records_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.transcript_of_records_span').html(`<a href="/storage/documents/${(value.employee_number).substring(2)}_${value.last_name}_${value.first_name}/${value.transcript_of_records_file}" title="DOWNLOAD FILE" download> ${value.transcript_of_records_file}</a>`);
                    }
                    else{
                        $('.transcript_of_records_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.transcript_of_records_file}" title="DOWNLOAD FILE" download> ${value.transcript_of_records_file}</a>`);
                    }
                    $('#tor_view').hide();
                    $('#tor_delete_button').show();
                }
                $('#btnUpdate').prop('disabled', true);
                $('#loading').hide();
                $('#employee_information').show();
                $('#employees_list').hide();
                $('#tab1').click();
            });
        }
    });
});