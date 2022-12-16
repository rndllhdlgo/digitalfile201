var companyTable = $('#companyTable').DataTable({
    dom:'lf<"breakspace">rtip',
    language:{
        "info": "\"Showing _START_ to _END_ of _TOTAL_ Companies\"",
        "lengthMenu":"Show _MENU_ Companies",
        "emptyTable":"No Companies Data Found!",
        "loadingRecords": "Loading Companies Records...",
    },
    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    processing:true,
    serverSide:false,
    ajax: {
        url: '/maintenance/companyData',
    },
    order: [],
    columns: [
        {data: 'company_name'}
    ] 
});
$('div.breakspace').html('<br><br>');

var branchTable = $('#branchTable').DataTable({
    dom:'lf<"breakspace">rtip',
    language:{
        "info": "\"Showing _START_ to _END_ of _TOTAL_ Branches\"",
        "lengthMenu":"Show _MENU_ Branches",
        "emptyTable":"No Branches Data Found!",
        "loadingRecords": "Loading Branches Records...",
    },
    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    processing:true,
    serverSide:false,
    ajax: {
        url: '/maintenance/branchData',
    },
    order: [],
    columns: [
        {data: 'branch_name'}
    ] 
});
$('div.breakspace').html('<br><br>');

var shiftTable = $('#shiftTable').DataTable({
    dom:'lf<"breakspace">rtip',
    language:{
        "info": "\"Showing _START_ to _END_ of _TOTAL_ Shifts\"",
        "lengthMenu":"Show _MENU_ Shifts",
        "emptyTable":"No Shifts Data Found!",
        "loadingRecords": "Loading Shifts Records...",
    },
    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    processing:true,
    serverSide:false,
    ajax: {
        url: '/maintenance/shiftData',
    },
    order: [],
    columns: [
        {data: 'shift_code'},
        {data: 'shift_working_hours'},
        {data: 'shift_break_time'}
    ] 
});
$('div.breakspace').html('<br><br>');

var supervisorTable = $('#supervisorTable').DataTable({
    dom:'lf<"breakspace">rtip',
    language:{
        "info": "\"Showing _START_ to _END_ of _TOTAL_ Supervisors\"",
        "lengthMenu":"Show _MENU_ Supervisors",
        "emptyTable":"No Supervisors Data Found!",
        "loadingRecords": "Loading Supervisors Records...",
    },
    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    processing:true,
    serverSide:false,
    ajax: {
        url: '/maintenance/supervisorData',
    },
    order: [],
    columns: [
        {data: 'supervisor_name'}
    ] 
});
$('div.breakspace').html('<br><br>');

var jobPositionAndDescriptionTable = $('#jobPositionAndDescriptionTable').DataTable({
    dom:'lf<"breakspace">rtip',
    language:{
        "info": "\"Showing _START_ to _END_ of _TOTAL_ Job Positions,Descriptions,Skills\"",
        "lengthMenu":"Show _MENU_ Job Positions",
        "emptyTable":"No Job Positions Data Found!",
        "loadingRecords": "Loading Job Positions Records...",
    },
    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    processing:true,
    serverSide:false,
    ajax: {
        url: '/maintenance/jobPositionAndDescriptionData',
    },
    order: [],
    columns: [
        {data: 'job_position_name'},
        {data: 'job_description'},
        {data: 'job_requirements'}
    ] 
});
$('div.breakspace').html('<br><br>');

var departmentTable = $('#departmentTable').DataTable({
    dom:'lf<"breakspace">rtip',
    language:{
        "info": "\"Showing _START_ to _END_ of _TOTAL_ Departments\"",
        "lengthMenu":"Show _MENU_ Departments",
        "emptyTable":"No Departments Data Found!",
        "loadingRecords": "Loading Departments Records...",
    },
    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    processing:true,
    serverSide:false,
    ajax: {
        url: '/maintenance/departmentData',
    },
    order: [],
    columns: [
        {data: 'department'}
    ] 
});
$('div.breakspace').html('<br><br>');