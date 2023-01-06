// var logs_id = [];
var children_id = [];
var college_id = [];
var training_id = [];
var job_history_id = [];
var memo_id = [];
$(document).on('dblclick','table.employeesTable tbody tr',function(){
    
    // logs_id = [];
    children_id = [];
    college_id = [];
    training_id = [];
    vocational_id = [];
    job_history_id = [];
    memo_id = [];
    
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
                //Personal Information
                if(value.employee_image){
                    $('#filename').val(value.employee_image);
                    $('#image_preview').prop('src',window.location.origin+'/storage/employee_images/'+value.employee_image);
                    $('#image_preview').show();
                    $('#image_close').show();
                    $('#image_user').hide();
                    $('#image_button').hide();
                    $('#image_instruction').hide();
                    $('#employee_image').removeClass('required_field');
                }
                else{
                    $('#filename').val('');
                }
                
                $('#filename_delete').val('');

                $('#first_name').val(value.first_name);
                $('#middle_name_orig').val(value.middle_name);
                $('#middle_name').val(value.middle_name);
                $('#last_name_orig').val(value.last_name);
                $('#last_name').val(value.last_name);
                $('#suffix').val(value.suffix);
                $('#nickname').val(value.nickname);
                $('#birthday').val(value.birthday);
                setInterval(() => {
                    $('#birthday').change();
                }, app_timeout);
                $('#gender').val(value.gender);
                $('#barangay_orig').val(value.barangay);
                $('#barangay').val(value.barangay);
                $('#unit_orig').val(value.unit);
                $('#unit').val(value.unit);
                $('#lot_orig').val(value.lot);
                $('#lot').val(value.lot);

                $('.house').removeAttr('checked');
                $("input[name='house']").each(function() {
                    if ($(this).val() == value.house) {
                        $(this).prop('checked', true);
                    }
                });

                // $('.region').each(function(){
                //     if($(this).html() == value.region){
                //         $(this).prop('selected', true);
                //     }
                // });

                // setTimeout(() => {
                //     $('#region').change();
                //     setTimeout(() => {
                //         $('.province').each(function(){
                //             if($(this).html() == value.province){
                //                 $(this).prop('selected', true);
                //             }
                //         });
                //         setTimeout(() => {
                //             $('#province').change();  
                //             setTimeout(() => {
                //                 $('.city').each(function(){
                //                     if($(this).html() == value.city){
                //                         $(this).prop('selected', true);
                //                     }
                //                 });
                //                 setTimeout(() => {
                //                     $('#city').change();
                //                 }, app_timeout);
                //             }, app_timeout);
                //         }, app_timeout);
                //     }, app_timeout);
                // }, app_timeout);

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

                $('#height').val(decodeHtml(value.height));
                $('#weight').val(value.weight);
                $('#religion').val(value.religion);
                $('#civil_status').val(value.civil_status);
                setInterval(() => {
                    $('#civil_status').change();
                }, app_timeout);
                $('#email_address').val(value.email_address);
                $('#telephone_number').val(value.telephone_number);
                $('#cellphone_number_orig').val(value.cellphone_number);
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

                $('#employee_number').val(value.employee_number);
                $('#employee_company').val(value.employee_company);
                $('#employee_department').val(value.employee_department);
                $('#employee_branch').val(value.employee_branch);
                $('#employment_status').val(value.employment_status);
                setInterval(() => {
                    $('#employment_status').change();
                }, app_timeout);
                $('#employment_origin').val(value.employment_origin);
                $('#employee_shift').val(value.employee_shift);
                $('#employee_supervisor').val(value.employee_supervisor);
                $('#employee_position').val(value.employee_position);
                $('#date_hired').val(value.date_hired);
                $('#company_email_address').val(value.company_email_address);
                $('#company_contact_number').val(value.company_contact_number);
                $('#sss_number').val(value.sss_number);
                $('#pag_ibig_number').val(value.pag_ibig_number);
                $('#philhealth_number').val(value.philhealth_number);
                $('#tin_number').val(value.tin_number);
                $('#account_number').val(value.account_number);

                $('#employee_salary').val(value.employee_salary);
                $('#employee_incentives').val(value.employee_incentives);
                $('#employee_overtime_pay').val(value.employee_overtime_pay);
                $('#employee_bonus').val(value.employee_bonus);
                $('#employee_insurance').val(value.employee_insurance);

                $('#secondary_school_name').val(value.secondary_school_name);
                $('#secondary_school_address').val(value.secondary_school_address);
                $('#secondary_school_inclusive_years_from').val(value.secondary_school_inclusive_years_from);
                $('#secondary_school_inclusive_years_to').val(value.secondary_school_inclusive_years_to);
                $('#primary_school_name').val(value.primary_school_name);
                $('#primary_school_address').val(value.primary_school_address);
                $('#primary_school_inclusive_years_from').val(value.primary_school_inclusive_years_from);
                $('#primary_school_inclusive_years_to').val(value.primary_school_inclusive_years_to);

                $('#past_medical_condition').val(value.past_medical_condition);
                $('#allergies').val(value.allergies);
                $('#medication').val(value.medication);
                $('#psychological_history').val(value.psychological_history);
                
                $('#employee_information').show();
                $('#addEmployeeBtn').hide();
                $('#employees_list').hide();
                $('#tab1').click();
                $('#btnClear').hide();
                $('#btnSave').hide();

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
                    ],
                    searching: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    autoWidth: false,
                    language:{
                        emptyTable: "No data available in table",
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
                        { data: 'child_birthday', width: '22.5%'},
                        { data:  null, defaultContent : "", width: '22.5%'},
                        // { data:  '', width: '22.5%'},
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
                        emptyTable: "No data available in table",
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
                        { data: 'college_inclusive_years_from', width: '15%'},
                        { data: 'college_inclusive_years_to', width: '15%'}
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
                        emptyTable: "No data available in table",
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
                        { data: 'training_inclusive_years_from', width: '15%'},
                        { data: 'training_inclusive_years_to', width: '15%'}
                    ],
                    initComplete: function(){
                        if(!$('.training_table_orig').DataTable().data().any()){
                            $('#training_table_orig').hide();
                        }
                        else{
                            $('#training_table_orig').show();
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
                        emptyTable: "No data available in table",
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
                        { data: 'vocational_inclusive_years_from', width: '15%'},
                        { data: 'vocational_inclusive_years_to', width: '15%'}
                    ],
                    initComplete: function(){
                        if(!$('.vocational_table_orig').DataTable().data().any()){
                            $('#vocational_table_orig').hide();
                        }
                        else{
                            $('#vocational_table_orig').show();
                        }
                    }
                });

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
                        emptyTable: "No data available in table",
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
                        { data: 'job_inclusive_years_from', width : '15%'},
                        { data: 'job_inclusive_years_to', width : '15%'}
                    ],
                    initComplete: function(){
                        if(!$('.job_history_table_orig').DataTable().data().any()){
                            $('#job_history_table_orig').hide();
                        }
                        else{
                            $('#job_history_table_orig').show();
                        }
                    }
                });
                
                $('#documents_form').attr("action",'/employees/updateDocuments');

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
                        emptyTable: "No data available in table",
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
                        { data: 'memo_date', width: '22.5%'},
                        { data: 'memo_penalty', width: '22.5%'},
                        { 
                            data: 'memo_file', 
                            "render": function(data, type, row){
                                return `<a href="/storage/evaluation_files/${row.memo_file}" target="_blank">${row.memo_file}</a>` ;
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
                        emptyTable: "No data available in table",
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
                        { data: 'evaluation_date', width: '22.5%'},
                        { data: 'evaluation_evaluated_by', width: '22.5%'},
                        { 
                            data: 'evaluation_file', 
                            "render": function(data, type, row){
                                return `<a href="/storage/evaluation_files/${row.evaluation_file}" target="_blank">${row.evaluation_file}</a>` ;
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
                        emptyTable: "No data available in table",
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
                        { data: 'contracts_date', width: '33.4%'},
                        { 
                            data: 'contracts_file', 
                            "render": function(data, type, row){
                                return `<a href="/storage/evaluation_files/${row.contracts_file}" target="_blank">${row.contracts_file}</a>` ;
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
                        emptyTable: "No data available in table",
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
                                return `<a href="/storage/evaluation_files/${row.resignation_file}" target="_blank">${row.resignation_file}</a>` ;
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
                        emptyTable: "No data available in table",
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
                                return `<a href="/storage/evaluation_files/${row.termination_file}" target="_blank">${row.termination_file}</a>` ;
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

                $('.logs_table_data').dataTable().fnDestroy();
                $('.logs_table_data').DataTable({
                    searching: false,
                    paging: false,
                    info: false,
                    ordering:false,
                    autoWidth: false,
                    language:{
                        emptyTable: "No data available in table",
                        processing: "Loading...",
                    },
                    serverSide: true,
                    ajax: {
                        url: '/employees/logs_data',
                        async: false,
                        data:{
                            id: value.id,
                        }
                    },
                    columns: [
                        { data: 'logs'},
                    
                    ],
                    initComplete: function(){
                        if(!$('.logs_table_data').DataTable().data().any()){
                            $('#logs_table_data').hide();
                        }
                        else{
                            $('#logs_table_data').show();
                        }
                    }
                });
                $('th').removeClass("sorting_asc");

                if(value.barangay_clearance_file){
                    $('#barangay_clearance_filename').val(value.barangay_clearance_file);
                    $('.barangay_clearance_div').hide();
                    $('.barangay_clearance_span').show();
                    $('.barangay_clearance_span').html(`<a href="/storage/documents_files/${value.barangay_clearance_file}" target="_blank"> ${value.barangay_clearance_file}</a>`);
                    $('#barangay_clearance_view').hide();
                    $('#barangay_clearance_delete_button').show();
                }

                if(value.birthcertificate_file){
                    $('#birthcertificate_filename').val(value.birthcertificate_file);
                    $('.birthcertificate_div').hide();
                    $('.birthcertificate_span').show();
                    $('.birthcertificate_span').html(`<a href="/storage/documents_files/${value.birthcertificate_file}" target="_blank"> ${value.birthcertificate_file}</a>`);
                    $('#birthcertificate_view').hide();
                    $('#birthcertificate_delete_button').show();
                }

                if(value.diploma_file){
                    $('#diploma_filename').val(value.diploma_file);
                    $('.diploma_div').hide();
                    $('.diploma_span').show();
                    $('.diploma_span').html(`<a href="/storage/documents_files/${value.diploma_file}" target="_blank"> ${value.diploma_file}</a>`);
                    $('#diploma_view').hide();
                    $('#diploma_delete_button').show();
                }

                if(value.medical_certificate_file){
                    $('#medical_certificate_filename').val(value.medical_certificate_file);
                    $('.medical_certificate_div').hide();
                    $('.medical_certificate_span').show();
                    $('.medical_certificate_span').html(`<a href="/storage/documents_files/${value.medical_certificate_file}" target="_blank"> ${value.medical_certificate_file}</a>`);
                    $('#medical_certificate_view').hide();
                    $('#medical_certificate_delete_button').show();
                }
                if(value.nbi_clearance_file){
                    $('#nbi_clearance_filename').val(value.nbi_clearance_file);
                    $('.nbi_clearance_div').hide();
                    $('.nbi_clearance_span').show();
                    $('.nbi_clearance_span').html(`<a href="/storage/documents_files/${value.nbi_clearance_file}" target="_blank"> ${value.nbi_clearance_file}</a>`);
                    $('#nbi_clearance_view').hide();
                    $('#nbi_clearance_delete_button').show();
                }

                if(value.pag_ibig_file){
                    $('#pag_ibig_filename').val(value.pag_ibig_file);
                    $('.pag_ibig_div').hide();
                    $('.pag_ibig_span').show();
                    $('.pag_ibig_span').html(`<a href="/storage/documents_files/${value.pag_ibig_file}" target="_blank"> ${value.pag_ibig_file}</a>`);
                    $('#pag_ibig_view').hide();
                    $('#pag_ibig_delete_button').show();
                }

                if(value.philhealth_file){
                    $('#philhealth_filename').val(value.philhealth_file);
                    $('.philhealth_div').hide();
                    $('.philhealth_span').show();
                    $('.philhealth_span').html(`<a href="/storage/documents_files/${value.philhealth_file}" target="_blank"> ${value.philhealth_file}</a>`);
                    $('#philhealth_view').hide();
                    $('#philhealth_delete_button').show();
                }

                if(value.police_clearance_file){
                    $('#police_clearance_filename').val(value.police_clearance_file);
                    $('.police_clearance_div').hide();
                    $('.police_clearance_span').show();
                    $('.police_clearance_span').html(`<a href="/storage/documents_files/${value.police_clearance_file}" target="_blank"> ${value.police_clearance_file}</a>`);
                    $('#police_clearance_view').hide();
                    $('#police_clearance_delete_button').show();
                }

                if(value.resume_file){
                    $('#resume_filename').val(value.resume_file);
                    $('.resume_div').hide();
                    $('.resume_span').show();
                    $('.resume_span').html(`<a href="/storage/documents_files/${value.resume_file}" target="_blank"> ${value.resume_file}</a>`);
                    $('#resume_view').hide();
                    $('#resume_delete_button').show();
                }

                if(value.sss_file){
                    $('#sss_filename').val(value.sss_file);
                    $('.sss_div').hide();
                    $('.sss_span').show();
                    $('.sss_span').html(`<a href="/storage/documents_files/${value.sss_file}" target="_blank"> ${value.sss_file}</a>`);
                    $('#sss_view').hide();
                    $('#sss_delete_button').show();
                }

                if(value.transcript_of_records_file){
                    $('#transcript_of_records_filename').val(value.transcript_of_records_file);
                    $('.transcript_of_records_div').hide();
                    $('.transcript_of_records_span').show();
                    $('.transcript_of_records_span').html(`<a href="/storage/documents_files/${value.transcript_of_records_file}" target="_blank"> ${value.transcript_of_records_file}</a>`);
                    $('#tor_view').hide();
                    $('#tor_delete_button').show();
                }
            $('#loading').hide();
            });
        }

    });
    
});

$('#barangay_clearance_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to remove file?',
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
            $('.barangay_clearance_span').hide();
            $('.barangay_clearance_div').show();
            $('#barangay_clearance_delete_button').hide();
            $('#barangay_clearance_view').show();
            $('#barangay_clearance_file').addClass('required_field');
        }

        else if(save.isDenied){

        }
    });
});

$('#birthcertificate_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to remove file?',
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
            $('.birthcertificate_span').hide();
            $('.birthcertificate_div').show();
            $('#birthcertificate_delete_button').hide();
            $('#birthcertificate_view').show();
            $('#birthcertificate_file').addClass('required_field');
        }

        else if(save.isDenied){

        }
    });
});

$('#diploma_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to remove file?',
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
            $('#diploma_filename').val('');
            $('.diploma_span').hide();
            $('.diploma_div').show();
            $('#diploma_delete_button').hide();
            $('#diploma_view').show();
        }
        else if(save.isDenied){

        }
    });
});

$('#medical_certificate_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to remove file?',
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
            $('.medical_certificate_span').hide();
            $('.medical_certificate_div').show();
            $('#medical_certificate_delete_button').hide();
            $('#medical_certificate_view').show();
            $('#medical_certificate_file').addClass('required_field');
        }
        else if(save.isDenied){

        }
    });
});

$('#nbi_clearance_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to remove file?',
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
            $('.nbi_clearance_span').hide();
            $('.nbi_clearance_div').show();
            $('#nbi_clearance_delete_button').hide();
            $('#nbi_clearance_view').show();
            $('#nbi_clearance_file').addClass('required_field');
        }

        else if(save.isDenied){

        }
    });
});

$('#pag_ibig_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to remove file?',
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
            $('.pag_ibig_span').hide();
            $('.pag_ibig_div').show();
            $('#pag_ibig_delete_button').hide();
            $('#pag_ibig_view').show();
            $('#pag_ibig_file').addClass('required_field');
        }

        else if(save.isDenied){

        }
    });
});

$('#philhealth_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to remove file?',
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
            $('.philhealth_span').hide();
            $('.philhealth_div').show();
            $('#philhealth_delete_button').hide();
            $('#philhealth_view').show();
            $('#philhealth_file').addClass('required_field');
        }

        else if(save.isDenied){

        }
    });
});

$('#police_clearance_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to remove file?',
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
            $('.police_clearance_span').hide();
            $('.police_clearance_div').show();
            $('#police_clearance_delete_button').hide();
            $('#police_clearance_view').show();
            $('#police_clearance_file').addClass('required_field');

        }

        else if(save.isDenied){

        }
    });
});

$('#resume_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to remove file?',
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
            $('.resume_span').hide();
            $('.resume_div').show();
            $('#resume_delete_button').hide();
            $('#resume_view').show();
            $('#resume_file').addClass('required_field');
        }
        else if(save.isDenied){

        }
    });

});

$('#sss_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to remove file?',
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
            $('.sss_span').hide();
            $('.sss_div').show();
            $('#sss_delete_button').hide();
            $('#sss_view').show();
            $('#sss_file').addClass('required_field');
        }
        else if(save.isDenied){

        }
    });
});

$('#tor_delete_button').on('click',function(){
    Swal.fire({
        title: 'Do you want to remove file?',
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
            $('#transcript_of_records_filename').val('');
            $('.transcript_of_records_span').hide();
            $('.transcript_of_records_div').show();
            $('#tor_delete_button').hide();
            $('#tor_view').show();
        }
        else if(save.isDenied){

        }
    });
});


$(document).on('click','.btn_delete_children',function(){
    var id = $(this).attr("id");
    var data = $('.children_table_orig').DataTable().row(id).data();
    children_id.push(data.id);
    $(this).parent().parent().remove();
});

$(document).on('click','.btn_delete_college',function(){
    var id = $(this).attr("id");
    var data = $('.college_table_orig').DataTable().row(id).data();
    college_id.push(data.id);
    $(this).parent().parent().remove();
});

$(document).on('click','.btn_delete_training',function(){
    var id = $(this).attr("id");
    var data = $('.training_table_orig').DataTable().row(id).data();
    training_id.push(data.id);
    $(this).parent().parent().remove();
});

$(document).on('click','.btn_delete_vocational',function(){
    var id = $(this).attr("id");
    var data = $('.vocational_table_orig').DataTable().row(id).data();
    vocational_id.push(data.id);
    $(this).parent().parent().remove();
});

$(document).on('click','.btn_delete_job',function(){
    var id = $(this).attr("id");
    var data = $('.job_history_table_orig').DataTable().row(id).data();
    job_history_id.push(data.id);
    $(this).parent().parent().remove();
});

// $(document).on('click','.btn_memo_delete',function(){
//     var id = $(this).attr("id");
//     var data = $('.memo_table_data').DataTable().row(id).data();
//     memo_id.push(data.id);
//     $(this).parent().parent().remove();
//     console.log(memo_id);
// });
