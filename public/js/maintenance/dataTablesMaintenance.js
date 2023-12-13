var companyTable = $('#companyTable').DataTable({
    dom: 'lftrip',
    language:{
        "info": "\"Showing _START_ to _END_ of _TOTAL_ Companies\"",
        "lengthMenu":"Show _MENU_ Companies",
        "emptyTable":"NO DATA AVAILABLE!",
    },
    aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
    processing:true,
    serverSide:false,
    ajax: {
        url: '/maintenance/companyData',
        "dataType": "json",
        "error": function(xhr, error, thrown){
            if(xhr.status == 500){
                $('#loading').hide();
                Swal.fire({
                    title: 'DATA PROBLEM!',
                    html: '<h4>Data does not load properly.<br>Please refresh the page, or if it keeps happening, contact the <b>ADMINISTRATOR</b>.</h4>',
                    confirmButtonText: "REFRESH",
                    icon: 'error',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    width: 700
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location.reload();
                    }
                });
            }
        }
    },
    order: [],
    columns: [
        {data: 'company_name'}
    ],
    initComplete: function(){
        $('#companyTable_filter').after('<br><br>');
        $('#loading').hide();
    }
});

var departmentTable = $('#departmentTable').DataTable({
    dom: 'lftrip',
    language:{
        "info": "\"Showing _START_ to _END_ of _TOTAL_ Departments\"",
        "lengthMenu":"Show _MENU_ Departments",
        "emptyTable":"No Departments Data Found!",
        "loadingRecords": "Loading Departments Records...",
    },
    aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
    processing:true,
    serverSide:false,
    ajax: {
        url: '/maintenance/departmentData',
        "dataType": "json",
        "error": function(xhr, error, thrown){
            if(xhr.status == 500){
                $('#loading').hide();
                Swal.fire({
                    title: 'DATA PROBLEM!',
                    html: '<h4>Data does not load properly.<br>Please refresh the page, or if it keeps happening, contact the <b>ADMINISTRATOR</b>.</h4>',
                    confirmButtonText: "REFRESH",
                    icon: 'error',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    width: 700
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location.reload();
                    }
                });
            }
        }
    },
    order: [],
    columns: [
        {
            "data": "deptdesc",
            "render": function ( data, type, row ) {
                return data.toUpperCase();
            }
        }
    ],
    initComplete: function(){
        $('#departmentTable_filter').after('<br><br>');
        $('#loading').hide();
    }
});

var branchTable = $('#branchTable').DataTable({
    dom: 'lftrip',
    language:{
        "info": "\"Showing _START_ to _END_ of _TOTAL_ Branches\"",
        "lengthMenu":"Show _MENU_ Branches",
        "emptyTable":"No Branches Data Found!",
        "loadingRecords": "Loading Branches Records...",
    },
    aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
    processing:true,
    serverSide:false,
    ajax: {
        url: '/maintenance/branchData',
        "dataType": "json",
        "error": function(xhr, error, thrown){
            if(xhr.status == 500){
                $('#loading').hide();
                Swal.fire({
                    title: 'DATA PROBLEM!',
                    html: '<h4>Data does not load properly.<br>Please refresh the page, or if it keeps happening, contact the <b>ADMINISTRATOR</b>.</h4>',
                    confirmButtonText: "REFRESH",
                    icon: 'error',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    width: 700
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location.reload();
                    }
                });
            }
        }
    },
    order: [],
    columns: [
        {
            "data": "entity03_desc",
            "render": function ( data, type, row ) {
                return data.toUpperCase();
            }
        }
    ],
    initComplete: function(){
        $('#branchTable_filter').after('<br><br>');
        $('#loading').hide();
    }
});

var shiftTable = $('table.shiftTable').DataTable({
        dom: 'lftrip',
        language: {
            info: "\"Showing _START_ to _END_ of _TOTAL_ Shifts\"",
            lengthMenu: "Show _MENU_ Shifts",
            emptyTable: "No Shifts Data Found!",
        },
        aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        processing:true,
        serverSide:false,
        ajax: {
            url: '/maintenance/shiftData',
            "dataType": "json",
            "error": function(xhr, error, thrown){
                if(xhr.status == 500){
                    $('#loading').hide();
                    Swal.fire({
                        title: 'DATA PROBLEM!',
                        html: '<h4>Data does not load properly.<br>Please refresh the page, or if it keeps happening, contact the <b>ADMINISTRATOR</b>.</h4>',
                        confirmButtonText: "REFRESH",
                        icon: 'error',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        width: 700
                    }).then((result) => {
                        if(result.isConfirmed){
                            window.location.reload();
                        }
                    });
                }
            }
        },
        order: [0,'asc'],
        columns: [
            {data: 'shift'},
            {
                data: null,
                "render": function(data,type,row){
                    return moment(row.in, 'HH:mm:ss').format('h:mm A') + '-' + moment(row.out, 'HH:mm:ss').format('h:mm A');

                }
            },
            {
                data: null,
                "render": function(data,type,row){
                    if(row.break == 'N'){
                        return 'NO BREAK';
                    }
                        return moment(row.break_out, 'HH:mm:ss').format('h:mm A') + '-' + moment(row.break_in, 'HH:mm:ss').format('h:mm A');
                }
            }
        ],
        initComplete: function(){
            $('#shiftTable_filter').after('<br><br>');
            $('#loading').hide();
        }
    });

$('.filter-input').on('keyup search', function(){
    shiftTable.column($(this).data('column')).search($(this).val()).draw();
});

var positionTable = $('table.positionTable').DataTable({
    scrollY:        "484px",
    scrollX:        true,
    scrollCollapse: true,
    fixedColumns:{
        left: 1,
    },
    dom: 'lftrip',
    language: {
        info: "\"Showing _START_ to _END_ of _TOTAL_ JOB POSITIONS\"",
        lengthMenu: "Show _MENU_ JOB POSITIONS",
        emptyTable: "No Job Positions Data Found!",
    },
    aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
    processing:true,
    serverSide:false,
    ajax: {
        url: '/maintenance/positionData',
        "dataType": "json",
        "error": function(xhr, error, thrown){
            if(xhr.status == 500){
                $('#loading').hide();
                Swal.fire({
                    title: 'DATA PROBLEM!',
                    html: '<h4>Data does not load properly.<br>Please refresh the page, or if it keeps happening, contact the <b>ADMINISTRATOR</b>.</h4>',
                    confirmButtonText: "REFRESH",
                    icon: 'error',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    width: 700
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location.reload();
                    }
                });
            }
        }
    },
    order: [],
    columns: [
        {data: 'job_position_name'},
        {
            data: 'job_description',
            "render":function(data,type,row){
            var job_description = '';
            if (row.job_description !== null && row.job_description !== undefined) {
                job_description = row.job_description.replace(/• /g,"<br>• ").replace(/<br>/, '');
            }
                return job_description;
            },
        },
        {
            data: 'job_requirements',
            "render":function(data,type,row){
            var job_requirements = '';
            if (row.job_requirements !== null && row.job_requirements !== undefined) {
                job_requirements = row.job_requirements.replace(/• /g,"<br>• ").replace(/<br>/, '');
            }
                return job_requirements;
            },
        },
    ],
    initComplete: function(){
        $('#positionTable_filter').after(`<br><br>`);
        $('#loading').hide();
    }
});

$('.filter-input').on('keyup search', function(){
    positionTable.column($(this).data('column')).search($(this).val()).draw();
});

setInterval(() => {
    $('th input').on('click', function(e){
        e.stopPropagation();
    });
}, 0);