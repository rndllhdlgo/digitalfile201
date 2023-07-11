var children_id,
    college_id,
    training_id,
    job_history_id,
    memo_id,
    evaluation_id,
    contracts_id,
    resignation_id,
    termination_id = [];

var barangay_clearance_change,
    birthcertificate_change,
    diploma_change,
    medical_certificate_change,
    nbi_clearance_change,
    pag_ibig_file_change,
    philhealth_file_change,
    police_clearance_file_change,
    resume_file_change,
    sss_file_change,
    tor_file_change,
    memo_change;

$(document).on('click','table.employeesTable tbody tr',function(){
    $('#loading').hide();

    children_id = [];
    college_id = [];
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

                if(value.employee_number){
                    $('#employee_number').val(value.employee_number);
                    var removeValue = value.employee_number+"_";
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

                if(value.secondary_school_name){
                    $('.secondary_div').show();
                    $('#secondary_school_name').val(value.secondary_school_name);
                    $('#secondary_school_address').val(value.secondary_school_address);
                    $('#secondary_school_inclusive_years_from').val(value.secondary_school_inclusive_years_from);
                    $('#secondary_school_inclusive_years_to').val(value.secondary_school_inclusive_years_to);
                }
                else{
                    $('.secondary_div').hide();
                }

                if(value.primary_school_name){
                    $('.primary_div').show();
                    $('#primary_school_name').val(value.primary_school_name);
                    $('#primary_school_address').val(value.primary_school_address);
                    $('#primary_school_inclusive_years_from').val(value.primary_school_inclusive_years_from);
                    $('#primary_school_inclusive_years_to').val(value.primary_school_inclusive_years_to);
                }
                else{
                    $('.primary_div').hide();
                }

                if(!value.secondary_school_name && !value.primary_school_name){
                    $('#checkbox4').prop('disabled',true);
                    $('.checkbox4').addClass('btnDisabled').attr('disabled',true);
                }
                else{
                    $('#checkbox4').prop('disabled',false);
                    $('.checkbox4').removeClass('btnDisabled').attr('disabled',false);
                }

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

                $('#employee_salary').val(value.employee_salary);
                $('#employee_incentives').val(value.employee_incentives);
                $('#employee_overtime_pay').val(value.employee_overtime_pay);
                $('#employee_bonus').val(value.employee_bonus);
                $('#employee_insurance').val(value.employee_insurance);

                $('.children_table_orig').dataTable().fnDestroy();
                $('.children_table_orig').DataTable({
                    columnDefs: [
                        {
                            "render": function(data, type, row, meta){
                                return '<button type="button" class="btn btn-danger btn_delete_children center" id="'+ meta.row +'"><i class="fa-solid fa-trash-can"></i> </button>';
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
                        }
                        else{
                            $('#children_table_orig').show();
                        }
                    }
                });

                $('.college_table_orig').dataTable().fnDestroy();
                $('.college_table_orig').DataTable({
                    columnDefs: [
                        {
                            "render": function(data, type, row, meta){
                                    return '<button type="button" class="btn btn-danger btn_delete_college center" id="'+ meta.row +'"><i class="fa-solid fa-trash-can"></i> </button>';
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

                $('.training_table_orig').dataTable().fnDestroy();
                $('.training_table_orig').DataTable({
                    columnDefs: [
                        {
                            "render": function(data, type, row, meta){
                                    return '<button type="button" class="btn btn-danger btn_delete_training center" id="'+ meta.row +'"><i class="fa-solid fa-trash-can"></i> </button>';
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

                $('.vocational_table_orig').dataTable().fnDestroy();
                $('.vocational_table_orig').DataTable({
                    columnDefs: [
                        {
                            "render": function(data, type, row, meta){
                                    return '<button type="button" class="btn btn-danger btn_delete_vocational center" id="'+ meta.row +'"><i class="fa-solid fa-trash-can"></i> </button>';
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
                                    return '<button type="button" class="btn btn-danger btn_delete_job center" id="'+ meta.row +'"><i class="fa-solid fa-trash-can"></i> </button>';
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

                    if(current_user_level != 'EMPLOYEE'){
                        if(value.employee_number){
                            var trim_empno = (value.employee_number).substring(2);
                        }
                        $('.memo_table_data').dataTable().fnDestroy();
                        $('.memo_table_data').DataTable({
                            columnDefs: [
                                {
                                    "render": function(data, type, row, meta){
                                            return '<button type="button" class="btn btn-danger btn_memo_delete center" id="'+ meta.row +'"><i class="fa-solid fa-trash-can"></i> </button>';
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
                                        return "<span class='d-none'>"+row.memo_date+"</span>"+moment(row.memo_date).format('LL');
                                    },
                                    width: '22.5%'},
                                { data: 'memo_penalty', width: '22.5%'},
                                {
                                    data: 'memo_file',
                                    "render": function(data, type, row){
                                            if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                                                return `<a href="/storage/evaluation/${trim_empno}_${value.last_name}_${value.first_name}/${row.memo_file}" title="DOWNLOAD FILE" download>${row.memo_file.replace(removeValue, '')}</a>`;
                                            }
                                            return `<a href="/storage/evaluation/${value.employee_number}_${value.last_name}_${value.first_name}/${row.memo_file}" title="DOWNLOAD FILE" download>${row.memo_file.replace(removeValue, '')}</a>`;
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
                                            return '<button type="button" class="btn btn-danger btn_evaluation_delete center" id="'+ meta.row +'"><i class="fa-solid fa-trash-can"></i> </button>';
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
                                        return "<span class='d-none'>"+row.evaluation_date+"</span>"+moment(row.evaluation_date).format('LL');
                                    },
                                    width: '22.5%'},
                                { data: 'evaluation_evaluated_by', width: '22.5%'},
                                {
                                    data: 'evaluation_file',
                                    "render": function(data, type, row){
                                        if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                                            return `<a href="/storage/evaluation/${trim_empno}_${value.last_name}_${value.first_name}/${row.evaluation_file}" title="DOWNLOAD FILE" download>${row.evaluation_file.replace(removeValue, '')}</a>`;
                                        }
                                        return `<a href="/storage/evaluation/${value.employee_number}_${value.last_name}_${value.first_name}/${row.evaluation_file}" title="DOWNLOAD FILE" download>${row.evaluation_file.replace(removeValue, '')}</a>`;
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
                                            return '<button type="button" class="btn btn-danger btn_contracts_delete center" id="'+ meta.row +'"><i class="fa-solid fa-trash-can"></i> </button>';
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
                                        return "<span class='d-none'>"+row.contracts_date+"</span>"+moment(row.contracts_date).format('LL');
                                    },
                                    width: '33.4%'
                                },
                                {
                                    data: 'contracts_file',
                                    "render": function(data, type, row){
                                        if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                                            return `<a href="/storage/evaluation/${trim_empno}_${value.last_name}_${value.first_name}/${row.contracts_file}" title="DOWNLOAD FILE" download>${row.contracts_file.replace(removeValue, '')}</a>`;
                                        }
                                        return `<a href="/storage/evaluation/${value.employee_number}_${value.last_name}_${value.first_name}/${row.contracts_file}" title="DOWNLOAD FILE" download>${row.contracts_file.replace(removeValue, '')}</a>`;
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
                                            return '<button type="button" class="btn btn-danger btn_resignation_delete center" id="'+ meta.row +'"><i class="fa-solid fa-trash-can"></i> </button>';
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
                                { data: 'resignation_date', width: '33.4%'},
                                {
                                    data: 'resignation_file',
                                    "render": function(data, type, row){
                                        if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                                            return `<a href="/storage/evaluation/${trim_empno}_${value.last_name}_${value.first_name}/${row.resignation_file}" title="DOWNLOAD FILE" download>${row.resignation_file.replace(removeValue, '')}</a>`;
                                        }
                                        return `<a href="/storage/evaluation/${value.employee_number}_${value.last_name}_${value.first_name}/${row.resignation_file}" title="DOWNLOAD FILE" download>${row.resignation_file.replace(removeValue, '')}</a>`;
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
                                            return '<button type="button" class="btn btn-danger btn_termination_delete center" id="'+ meta.row +'"><i class="fa-solid fa-trash-can"></i> </button>';
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
                                { data: 'termination_date', width: '33.4%'},
                                {
                                    data: 'termination_file',
                                    "render": function(data, type, row){
                                        if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                                            return `<a href="/storage/evaluation/${trim_empno}_${value.last_name}_${value.first_name}/${row.termination_file}" title="DOWNLOAD FILE" download>${row.termination_file.replace(removeValue, '')}</a>`;
                                        }
                                        return `<a href="/storage/evaluation/${value.employee_number}_${value.last_name}_${value.first_name}/${row.termination_file}" title="DOWNLOAD FILE" download>${row.termination_file.replace(removeValue, '')}</a>`;
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
                    }

                    if(current_user_level != 'EMPLOYEE'){
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
                                { data: 'user_level', width: '15%'},
                                {
                                    data: 'logs',
                                    width: '55%',
                                    "render":function(data,type,row){
                                        return logs = row.logs.replaceAll(" [", "<br>[");
                                    }
                                }
                            ]
                        });
                        $('div.breakspace').html('<br><br>');

                        $('.filter-input').on('keyup search', function(){
                            logs_table_data.column($(this).data('column')).search($(this).val()).draw();
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
                    }

                college_change = '';
                vocational_change = '';
                training_change = '';
                job_history_change = '';
                $('th').removeClass("sorting_asc");

                if(value.barangay_clearance_file){
                    $('#barangay_clearance_filename').val(value.barangay_clearance_file);
                    $('.barangay_clearance_div').hide();
                    $('.barangay_clearance_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.barangay_clearance_span').html(`<a href="/storage/documents/${trim_empno}_${value.last_name}_${value.first_name}/${value.barangay_clearance_file}" title="DOWNLOAD FILE" download>${value.barangay_clearance_file.replace(removeValue, '')}</a>`);
                    }
                    else{
                        $('.barangay_clearance_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.barangay_clearance_file}" title="DOWNLOAD FILE" download>${value.barangay_clearance_file.replace(removeValue, '')}</a>`);
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
                        $('.birthcertificate_span').html(`<a href="/storage/documents/${trim_empno}_${value.last_name}_${value.first_name}/${value.birthcertificate_file}" title="DOWNLOAD FILE" download> ${value.birthcertificate_file.replace(removeValue, '')}</a>`);
                    }
                    else{
                        $('.birthcertificate_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.birthcertificate_file}" title="DOWNLOAD FILE" download> ${value.birthcertificate_file.replace(removeValue, '')}</a>`);
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
                        $('.diploma_span').html(`<a href="/storage/documents/${trim_empno}_${value.last_name}_${value.first_name}/${value.diploma_file}" title="DOWNLOAD FILE" download> ${value.diploma_file.replace(removeValue, '')}</a>`);
                    }
                    else{
                        $('.diploma_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.diploma_file}" title="DOWNLOAD FILE" download> ${value.diploma_file.replace(removeValue, '')}</a>`);
                    }
                    $('#diploma_view').hide();
                    $('#diploma_delete_button').show();
                }

                if(value.medical_certificate_file){
                    $('#medical_certificate_filename').val(value.medical_certificate_file);
                    $('.medical_certificate_div').hide();
                    $('.medical_certificate_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.medical_certificate_span').html(`<a href="/storage/documents/${trim_empno}_${value.last_name}_${value.first_name}/${value.medical_certificate_file}" title="DOWNLOAD FILE" download> ${value.medical_certificate_file.replace(removeValue, '')}</a>`);
                    }
                    else{
                        $('.medical_certificate_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.medical_certificate_file}" title="DOWNLOAD FILE" download> ${value.medical_certificate_file.replace(removeValue, '')}</a>`);
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
                        $('.nbi_clearance_span').html(`<a href="/storage/documents/${trim_empno}_${value.last_name}_${value.first_name}/${value.nbi_clearance_file}" title="DOWNLOAD FILE" download> ${value.nbi_clearance_file.replace(removeValue, '')}</a>`);
                    }
                    else{
                        $('.nbi_clearance_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.nbi_clearance_file}" title="DOWNLOAD FILE" download> ${value.nbi_clearance_file.replace(removeValue, '')}</a>`);
                    }
                    $('#nbi_clearance_view').hide();
                    $('#nbi_clearance_delete_button').show();
                }

                if(value.pag_ibig_file){
                    $('#pag_ibig_filename').val(value.pag_ibig_file);
                    $('.pag_ibig_div').hide();
                    $('.pag_ibig_span').show();
                    if(value.employee_number.includes('ID') || value.employee_number.includes('AP') || value.employee_number.includes('PL') || value.employee_number.includes('MJ') || value.employee_number.includes('NU')){
                        $('.pag_ibig_span').html(`<a href="/storage/documents/${trim_empno}_${value.last_name}_${value.first_name}/${value.pag_ibig_file}" title="DOWNLOAD FILE" download> ${value.pag_ibig_file.replace(removeValue, '')}</a>`);
                    }
                    else{
                        $('.pag_ibig_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.pag_ibig_file}" title="DOWNLOAD FILE" download> ${value.pag_ibig_file.replace(removeValue, '')}</a>`);
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
                        $('.philhealth_span').html(`<a href="/storage/documents/${trim_empno}_${value.last_name}_${value.first_name}/${value.philhealth_file}" title="DOWNLOAD FILE" download> ${value.philhealth_file.replace(removeValue, '')}</a>`);
                    }
                    else{
                        $('.philhealth_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.philhealth_file}" title="DOWNLOAD FILE" download> ${value.philhealth_file.replace(removeValue, '')}</a>`);
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
                        $('.police_clearance_span').html(`<a href="/storage/documents/${trim_empno}_${value.last_name}_${value.first_name}/${value.police_clearance_file}" title="DOWNLOAD FILE" download> ${value.police_clearance_file.replace(removeValue, '')}</a>`);
                    }
                    else{
                        $('.police_clearance_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.police_clearance_file}" title="DOWNLOAD FILE" download> ${value.police_clearance_file.replace(removeValue, '')}</a>`);
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
                        $('.resume_span').html(`<a href="/storage/documents/${trim_empno}_${value.last_name}_${value.first_name}/${value.resume_file}" title="DOWNLOAD FILE" download> ${value.resume_file.replace(removeValue, '')}</a>`);
                    }
                    else{
                        $('.resume_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.resume_file}" title="DOWNLOAD FILE" download> ${value.resume_file.replace(removeValue, '')}</a>`);
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
                        $('.sss_span').html(`<a href="/storage/documents/${trim_empno}_${value.last_name}_${value.first_name}/${value.sss_file}" title="DOWNLOAD FILE" download> ${value.sss_file.replace(removeValue, '')}</a>`);
                    }
                    else{
                        $('.sss_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.sss_file}" title="DOWNLOAD FILE" download> ${value.sss_file.replace(removeValue, '')}</a>`);
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
                        $('.transcript_of_records_span').html(`<a href="/storage/documents/${trim_empno}_${value.last_name}_${value.first_name}/${value.transcript_of_records_file}" title="DOWNLOAD FILE" download> ${value.transcript_of_records_file.replace(removeValue, '')}</a>`);
                    }
                    else{
                        $('.transcript_of_records_span').html(`<a href="/storage/documents/${value.employee_number}_${value.last_name}_${value.first_name}/${value.transcript_of_records_file}" title="DOWNLOAD FILE" download> ${value.transcript_of_records_file.replace(removeValue, '')}</a>`);
                    }
                    $('#tor_view').hide();
                    $('#tor_delete_button').show();
                }
                $('#loading').hide();

                $('#employee_information').show();
                $('#addEmployeeBtn').hide();
                $('#employees_list').hide();
                $('#tab1').click();
            });
        }
    });
});