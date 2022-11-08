//Company DataTable
var companyTable = $('#companyTable').DataTable({
    dom:'lf<"breakspace">rtip',
    processing:true,
    serverSide:false,
    ajax: {
        url: '/maintenance/companyData',
    },
    columns: [
        {data: 'company'}
    ] 
});
$('div.breakspace').html('<br><br>');

//View Company Data
$('#companyTable').on('dblclick','tbody tr',function(){//View employee information on tr double click
    var data = companyTable.row(this).data();

    $('#company_id').val(data.id);
    $('#company').val(data.company);
    $('#company_details').val(data.company);

    $('#updateCompanyModal').modal('show');
});

//Branch DataTable
var branchTable = $('#branchTable').DataTable({
    dom:'lf<"breakspace">rtip',
    processing:true,
    serverSide:false,
    ajax: {
        url: '/maintenance/branchData',
    },
    columns: [
        {data: 'branch_name'}
    ] 
});
$('div.breakspace').html('<br><br>');

//View Branch Data
$('#branchTable').on('dblclick','tbody tr',function(){//View employee information on tr double click
    var data = branchTable.row(this).data();

    $('#branch_id').val(data.id);
    $('#branch_name').val(data.branch_name);
    $('#branch_details').val(data.branch_name);

    $('#updateBranchModal').modal('show');
});

//Supervisor DataTable
var supervisorTable = $('#supervisorTable').DataTable({
    dom:'lf<"breakspace">rtip',
    processing:true,
    serverSide:false,
    ajax: {
        url: '/maintenance/supervisorData',
    },
    columns: [
        {data: 'supervisor_name'}
    ] 
});
$('div.breakspace').html('<br><br>');

//View Branch Data
$('#supervisorTable').on('dblclick','tbody tr',function(){//View employee information on tr double click
    var data = supervisorTable.row(this).data();

    $('#supervisor_id').val(data.id);
    $('#supervisor_name').val(data.supervisor_name);
    $('#supervisor_details').val(data.supervisor_name);

    $('#updateSupervisorModal').modal('show');
});

//Shift DataTable
var shiftTable = $('#shiftTable').DataTable({
    dom:'lf<"breakspace">rtip',
    processing:true,
    serverSide:false,
    ajax: {
        url: '/maintenance/shiftData',
    },
    columns: [
        {data: 'shift_code'},
        {data: 'shift_working_hours'},
        {data: 'shift_break_time'}
    ] 
});
$('div.breakspace').html('<br><br>');

//View Shift Data
$('#shiftTable').on('dblclick','tbody tr',function(){//View employee information on tr double click
    var data = shiftTable.row(this).data();

    $('#shift_id').val(data.id);
    $('#shift_code').val(data.shift_code);
    $('#shift_working_hours').val(data.shift_working_hours);
    $('#shift_break_time').val(data.shift_break_time);
    $('#shift_details_code').val(data.shift_code);
    $('#shift_details_working_hours').val(data.shift_working_hours);
    $('#shift_details_break_time').val(data.shift_break_time);

    $('#updateShiftModal').modal('show');
});
