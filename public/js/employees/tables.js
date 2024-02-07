var hmo_val;
function children_table(value_id){
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
                id: value_id,
            },
            "dataType": "json",
            "error": function(xhr, error, thrown){
                if(xhr.status == 500){
                    data_error++;
                    $('#loading').hide();
                    tableError();
                }
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
}

function college_table(value_id){
    $('.college_table_orig').dataTable().fnDestroy();
    $('.college_table_orig').DataTable({
        columnDefs: [
            {
                "render": function(data, type, row, meta){
                    return `<button type="button" class="btn btn-danger btn_delete_college center" id="${meta.row}" onclick="deleteRow('.college_table_orig', college_id, 'college_change', this)"><i class="fa-solid fa-trash-can"></i> </button>`;
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
                id: value_id,
            },
            "dataType": "json",
            "error": function(xhr, error, thrown){
                if(xhr.status == 500){
                    data_error++;
                    $('#loading').hide();
                    tableError();
                }
            }
        },
        columns: [
            { data: 'college_name',width: '30%'},
            { data: 'college_degree', width: '30%'},
            {
                data: 'college_inclusive_years_from',
                "render":function(data,type,row){
                    return "FROM: "+moment(row.college_inclusive_years_from).format('MMMM YYYY');
                },
                width: '15%'},
            {
                data: 'college_inclusive_years_to',
                "render":function(data,type,row){
                    return "TO: "+moment(row.college_inclusive_years_to).format('MMMM YYYY');
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
}

function secondary_table(value_id){
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
                id: value_id,
            },
            "dataType": "json",
            "error": function(xhr, error, thrown){
                if(xhr.status == 500){
                    data_error++;
                    $('#loading').hide();
                    tableError();
                }
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
}

function primary_table(value_id){
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
                id: value_id,
            },
            "dataType": "json",
            "error": function(xhr, error, thrown){
                if(xhr.status == 500){
                    data_error++;
                    $('#loading').hide();
                    tableError();
                }
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
}

function training_table(value_id){
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
                id: value_id,
            },
            "dataType": "json",
            "error": function(xhr, error, thrown){
                if(xhr.status == 500){
                    data_error++;
                    $('#loading').hide();
                    tableError();
                }
            }
        },
        columns: [
            { data: 'training_name',width: '30%'},
            { data: 'training_title', width: '30%'},
            {
                data: 'training_inclusive_years_from',
                "render":function(data,type,row){
                    return "FROM: "+moment(row.training_inclusive_years_from).format('MMMM YYYY');
                },
                width: '15%'},
            {
                data: 'training_inclusive_years_to',
                "render":function(data,type,row){
                    return "TO: "+moment(row.training_inclusive_years_to).format('MMMM YYYY');
                },
                width: '15%'}
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
}

function vocational_table(value_id){
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
                id: value_id,
            },
            "dataType": "json",
            "error": function(xhr, error, thrown){
                if(xhr.status == 500){
                    data_error++;
                    $('#loading').hide();
                    tableError();
                }
            }
        },
        columns: [
            { data: 'vocational_name', width: '30%'},
            { data: 'vocational_course', width: '30%'},
            {
                data: 'vocational_inclusive_years_from',
                "render":function(data,type,row){
                    return "FROM: "+moment(row.vocational_inclusive_years_from).format('MMMM YYYY');
                },
                width: '15%'
            },
            {
                data: 'vocational_inclusive_years_to',
                "render":function(data,type,row){
                    return "TO: "+moment(row.vocational_inclusive_years_to).format('MMMM YYYY');
                },
                width: '15%'
            }
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
}

function job_history_table(value_id){
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
                id: value_id,
            },
            "dataType": "json",
            "error": function(xhr, error, thrown){
                if(xhr.status == 500){
                    data_error++;
                    $('#loading').hide();
                    tableError();
                }
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
                    return "FROM: "+moment(row.job_inclusive_years_from).format('MMMM YYYY');
                },
                width : '15%'
            },
            {
                data: 'job_inclusive_years_to',
                "render":function(data,type,row){
                    return "TO: "+moment(row.job_inclusive_years_to).format('MMMM YYYY');
                },
                width : '15%'
            }
        ],
        initComplete: function(){
            if(!$('.job_history_table_orig').DataTable().data().any()){
                $('#job_history_table_orig').hide();
                $('#checkbox6').prop('disabled', true).addClass('btnDisabled');
            }
            else{
                $('#job_history_table_orig').show();
                $('#checkbox6').prop('disabled', false).removeClass('btnDisabled');
            }
        }
    });
}

function memo_table(value_id, value_employee_number, value_last_name, value_first_name){
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
                id: value_id,
            },
            "dataType": "json",
            "error": function(xhr, error, thrown){
                if(xhr.status == 500){
                    data_error++;
                    $('#loading').hide();
                    tableError();
                }
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
                        if(value_employee_number.includes('ID') || value_employee_number.includes('AP') || value_employee_number.includes('PL') || value_employee_number.includes('MJ') || value_employee_number.includes('NU')){
                            return `<a href="/storage/evaluation/${(value_employee_number).substring(2)}_${value_last_name}_${value_first_name}/${row.memo_file}" title="DOWNLOAD FILE" download>${row.memo_file}</a>`;
                        }
                        return `<a href="/storage/evaluation/${value_employee_number}_${value_last_name}_${value_first_name}/${row.memo_file}" title="DOWNLOAD FILE" download>${row.memo_file}</a>`;
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
}

function evaluation_table(value_id, value_employee_number, value_last_name, value_first_name){
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
                id: value_id,
            },
            "dataType": "json",
            "error": function(xhr, error, thrown){
                if(xhr.status == 500){
                    data_error++;
                    $('#loading').hide();
                    tableError();
                }
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
                    if(value_employee_number.includes('ID') || value_employee_number.includes('AP') || value_employee_number.includes('PL') || value_employee_number.includes('MJ') || value_employee_number.includes('NU')){
                        return `<a href="/storage/evaluation/${(value_employee_number).substring(2)}_${value_last_name}_${value_first_name}/${row.evaluation_file}" title="DOWNLOAD FILE" download>${row.evaluation_file}</a>`;
                    }
                    return `<a href="/storage/evaluation/${value_employee_number}_${value_last_name}_${value_first_name}/${row.evaluation_file}" title="DOWNLOAD FILE" download>${row.evaluation_file}</a>`;
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
}

function contracts_table(value_id, value_employee_number, value_last_name, value_first_name){
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
                id: value_id,
            },
            "dataType": "json",
            "error": function(xhr, error, thrown){
                if(xhr.status == 500){
                    data_error++;
                    $('#loading').hide();
                    tableError();
                }
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
                    if(value_employee_number.includes('ID') || value_employee_number.includes('AP') || value_employee_number.includes('PL') || value_employee_number.includes('MJ') || value_employee_number.includes('NU')){
                        return `<a href="/storage/evaluation/${(value_employee_number).substring(2)}_${value_last_name}_${value_first_name}/${row.contracts_file}" title="DOWNLOAD FILE" download>${row.contracts_file}</a>`;
                    }
                    return `<a href="/storage/evaluation/${value_employee_number}_${value_last_name}_${value_first_name}/${row.contracts_file}" title="DOWNLOAD FILE" download>${row.contracts_file}</a>`;
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
}

function resignation_table(value_id, value_employee_number, value_last_name, value_first_name){
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
                id: value_id,
            },
            "dataType": "json",
            "error": function(xhr, error, thrown){
                if(xhr.status == 500){
                    data_error++;
                    $('#loading').hide();
                    tableError();
                }
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
                    if(value_employee_number.includes('ID') || value_employee_number.includes('AP') || value_employee_number.includes('PL') || value_employee_number.includes('MJ') || value_employee_number.includes('NU')){
                        return `<a href="/storage/evaluation/${(value_employee_number).substring(2)}_${value_last_name}_${value_first_name}/${row.resignation_file}" title="DOWNLOAD FILE" download>${row.resignation_file}</a>`;
                    }
                    return `<a href="/storage/evaluation/${value_employee_number}_${value_last_name}_${value_first_name}/${row.resignation_file}" title="DOWNLOAD FILE" download>${row.resignation_file}</a>`;
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
}

function termination_table(value_id, value_employee_number, value_last_name, value_first_name){
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
                id: value_id,
            },
            "dataType": "json",
            "error": function(xhr, error, thrown){
                if(xhr.status == 500){
                    data_error++;
                    $('#loading').hide();
                    tableError();
                }
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
                    if(value_employee_number.includes('ID') || value_employee_number.includes('AP') || value_employee_number.includes('PL') || value_employee_number.includes('MJ') || value_employee_number.includes('NU')){
                        return `<a href="/storage/evaluation/${(value_employee_number).substring(2)}_${value_last_name}_${value_first_name}/${row.termination_file}" title="DOWNLOAD FILE" download>${row.termination_file}</a>`;
                    }
                    return `<a href="/storage/evaluation/${value_employee_number}_${value_last_name}_${value_first_name}/${row.termination_file}" title="DOWNLOAD FILE" download>${row.termination_file}</a>`;
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

// function hmo_table(value_id){
//     $('.hmo_table_orig').dataTable().fnDestroy();
//     $('.hmo_table_orig').DataTable({
//         columnDefs: [
//             {
//                 "render": function(data, type, row, meta){
//                     return `<button type="button" class="btn btn-primary center btnEditHmo"
//                                 hmo_id=${row.id}
//                                 hmo_name=${row.hmo}
//                                 hmo_coverage=${row.coverage}
//                                 hmo_particulars=${row.particulars}
//                                 hmo_room=${row.room}
//                                 hmo_effectivity_date=${row.effectivity_date}
//                                 hmo_expiration_date=${row.expiration_date}
//                                 hmo_status=${row.status}>
//                                 <i class="fa-solid fa-pen-to-square"></i>
//                             </button>`;
//                 },
//                 "defaultContent": '',
//                 "data": null,
//                 "targets": [7],
//             }
//         ],
//         searching: false,
//         paging: false,
//         info: false,
//         ordering:false,
//         autoWidth: false,
//         language:{
//             emptyTable: "NO DATA AVAILABLE",
//             processing: "Loading...",
//         },
//         serverSide: true,
//         ajax: {
//             url: '/employees/hmo_data',
//             async: false,
//             data:{
//                 id: value_id,
//             },
//             "dataType": "json",
//             "error": function(xhr, error, thrown){
//                 if(xhr.status == 500){
//                     data_error++;
//                     $('#loading').hide();
//                     tableError();
//                 }
//             }
//         },
//         columns: [
//             { data: 'hmo',         width: '15%'},
//             { data: 'coverage',    width: '15%'},
//             { data: 'particulars', width: '15%'},
//             { data: 'room',        width: '15%'},
//             {
//                 data: 'effectivity_date', width: '15%',
//                 "render":function(data,type,row){
//                     return moment(data).format('MMMM D, YYYY');
//                 }
//             },
//             {
//                 data: 'expiration_date', width: '15%',
//                 "render":function(data,type,row){
//                     return moment(data).format('MMMM D, YYYY');
//                 }
//             },
//             {
//                 data: 'status', width: '5%',
//                 "render":function(data,type,row){
//                     if(data == 'ACTIVE'){
//                         return `<span class="text-center text-success" style="zoom:90%;"><b>ACTIVE</b></span>`;
//                     }
//                     return `<span class="text-center text-danger" style="zoom:90%;"><b>INACTIVE</b></span>`;
//                 }
//             }
//         ],
//         initComplete: function(){
//             if(!$('.hmo_table_orig').DataTable().data().any()){
//                 $('#hmo_table_orig').hide();
//             }
//             else{
//                 $('#hmo_table_orig').show();
//             }
//         }
//     });
// }

function hmo_table(value_id){
    $.ajax({
        url: "/employees/hmo_data",
        data: {
            id: value_id
        },
        success: function (response){
            console.log(response);
            if(response != 'empty'){
                $('#hmoTable').dataTable().fnDestroy();
                $('#hmoTable').DataTable({
                    columnDefs: [
                        {
                            "render": function(data, type, row, meta){
                                return `
                                        <button type="button" class="btn btn-primary center btnEditHmo"
                                            hmo_id=${row.id}
                                            hmo_name=${row.hmo}
                                            hmo_coverage=${row.coverage}
                                            hmo_particulars=${row.particulars}
                                            hmo_room=${row.room}
                                            hmo_effectivity_date=${row.effectivity_date}
                                            hmo_expiration_date=${row.expiration_date}
                                            hmo_status=${row.status}>
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        `;
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
                        processing: "Loading...",
                    },
                    serverSide: true,
                    ajax: {
                        url: '/employees/hmo_data',
                        async: false,
                        data:{
                            id: value_id,
                        },
                        "dataType": "json",
                        "error": function(xhr, error, thrown){
                            if(xhr.status == 500){
                                data_error++;
                                $('#loading').hide();
                                tableError();
                            }
                        }
                    },
                    order: [],
                    columns: [
                        {
                            data: 'hmo',
                            "render": function (data, type, row, meta) {
                                if(meta.row === 0){
                                    hmo_val = data;
                                    return data;
                                }
                                else{
                                    return '';
                                }
                            }
                        },
                        { data: 'coverage'},
                        {
                            data: 'particulars',
                            "render":function(data,type,row){
                                return(`<div style="white-space: normal; width: 15vw;"><span>${data}</span></div>`);
                            }
                        },
                        { data: 'room'},
                        {
                            data: 'effectivity_date',
                            "render": function (data, type, row, meta) {
                                return moment(data).format("MMMM D, YYYY");
                            }
                        },
                        {
                            data: 'expiration_date',
                            "render": function (data, type, row, meta) {
                                return moment(data).format("MMMM D, YYYY");
                            }
                        },
                        {
                            data: 'status',
                            "render":function(data,type,row){
                                console.log(data);
                                if(data == 'ACTIVE'){
                                    return `<b class="text-success">${data}</b>`;
                                }
                                else{
                                    return `<b class="text-danger">${data}</b>`;
                                }
                            }
                        }
                    ],
                    drawCallback: function(settings) {
                        $('#hmo_tbody').append(`
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <button type="button" class="btn btn-success center addHmo">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </td>
                                                </tr>`);
                    }
                    // initComplete:function(){
                    //     $('#hmo_tbody').append(`
                    //                     <tr>
                    //                         <td></td>
                    //                         <td></td>
                    //                         <td></td>
                    //                         <td></td>
                    //                         <td></td>
                    //                         <td></td>
                    //                         <td></td>
                    //                         <td>
                    //                             <button type="button" class="btn btn-success center addHmo">
                    //                                 <i class="fas fa-plus"></i>
                    //                             </button>
                    //                         </td>
                    //                     </tr>`);
                    // }
                });
            }
        }
    });
}

$(document).on('click','.addHmo', function(){
    var addNewRow = `
            <tr class="tr_hmo">
                <td>
                    <input name="hmo" type="hidden" value="${hmo_val}">
                </td>
                <td>
                    <input name="coverage" class="forminput form-control text-uppercase" type="search" id="coverage" placeholder=" " style="background-color:white;" autocomplete="off">
                </td>
                <td>
                    <input name="particulars" class="forminput form-control text-uppercase" type="search" id="particulars" placeholder=" " style="background-color:white;" autocomplete="off">
                </td>
                <td>
                    <input name="room" class="forminput form-control text-uppercase" type="search" id="room" placeholder=" " style="background-color:white;" autocomplete="off">
                </td>
                <td>
                    <input name="effectivity_date" class="forminput form-control" type="date" id="effectivity_date" placeholder=" " style="background-color:white;">
                </td>
                <td>
                    <input name="expiration_date" class="forminput form-control" type="date" id="expiration_date" placeholder=" " style="background-color:white;">
                </td>
                <td>
                    <b class="text-success">ACTIVE</b>
                </td>
                <td>
                    <button type="button" class="btn btn-danger center deleteHmo">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>`;
    $('#hmo_tbody tr:last').before(addNewRow);

    hmo_change = 'CHANGED';
    tblHmo = 'tblHmo';
    changeCounter++;
    disableUpdate('', changeCounter, true);
});

$(document).on('click','.deleteHmo', function(){
    Swal.fire({
        title: 'Do you want to delete this row?',
        text: "You won't be able to revert this!",
        icon: 'warning',
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
        if(save.isConfirmed){
            $(this).parent().parent().remove();
            changeCounter--;
            disableUpdate('', changeCounter, true);
        }
    });
});

function leave_table(value_empno){
    $('#leave_credits').dataTable().fnDestroy();
    $('#leave_credits').DataTable({
        dom: 't',
        ajax: {
            url: '/employees/leave_data',
            data:{
                empno: value_empno
            },
            "dataType": "json",
            "error": function(xhr, error, thrown){
                if(xhr.status == 500){
                    data_error++;
                    $('#loading').hide();
                    tableError();
                }
            }
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
}