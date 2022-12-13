$('#companyTable').on('dblclick','tbody tr',function(){//View employee information on tr double click
    var data = companyTable.row(this).data();

    $('#company_id').val(data.id);
    $('#company_name').val(data.company_name);
    $('#company_name_new').val(data.company_name);

    $('#updateCompanyModal').modal('show');
});

$('#branchTable').on('dblclick','tbody tr',function(){//View employee information on tr double click
    var data = branchTable.row(this).data();

    $('#branch_id').val(data.id);
    $('#branch_name').val(data.branch_name);
    $('#branch_name_new').val(data.branch_name);

    $('#updateBranchModal').modal('show');
});

$('#supervisorTable').on('dblclick','tbody tr',function(){//View employee information on tr double click
    var data = supervisorTable.row(this).data();

    $('#supervisor_id').val(data.id);
    $('#supervisor_name').val(data.supervisor_name);
    $('#supervisor_name_new').val(data.supervisor_name);

    $('#updateSupervisorModal').modal('show');
});

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

$('#jobPositionAndDescriptionTable').on('dblclick','tbody tr',function(){//View employee information on tr double click
    var data = jobPositionAndDescriptionTable.row(this).data();

    $('#job_position_and_description_id').val(data.id);
    $('#job_position_name').val(data.job_position_name);
    $('#job_description').val(data.job_description);
    $('#job_requirements').val(data.job_requirements);
    $('#job_position_name_new').val(data.job_position_name);
    $('#job_description_new').val(data.job_description);
    $('#job_requirements_new').val(data.job_requirements);

    $('#updateJobPositionAndDescriptionModal').modal('show');
});
