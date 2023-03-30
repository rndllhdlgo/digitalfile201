$('#companyTable').on('click','tbody tr',function(){

    var data = companyTable.row(this).data();

    $('#company_id').val(data.id);
    $('#company_name').val(data.company_name);
    $('#company_name_new').val(data.company_name);
    $('.validation').hide();

    $('#updateCompanyModal').modal('show');

});

$('#departmentTable').on('click','tbody tr',function(){
    var data = departmentTable.row(this).data();

    $('#department_id').val(data.id);
    $('#department').val(data.department);
    $('#department_new').val(data.department);
    $('.validation').hide();

    $('#updateDepartmentModal').modal('show');
});

$('#branchTable').on('click','tbody tr',function(){
    var data = branchTable.row(this).data();

    $('#branch_id').val(data.id);
    $('#branch_name').val(data.branch_name);
    $('#branch_name_new').val(data.branch_name);
    $('.validation').hide();

    $('#updateBranchModal').modal('show');
});

$('#supervisorTable').on('click','tbody tr',function(){
    var data = supervisorTable.row(this).data();

    $('#supervisor_id').val(data.id);
    $('#supervisor_name').val(data.supervisor_name);
    $('#supervisor_name_new').val(data.supervisor_name);
    $('.validation').hide();

    $('#updateSupervisorModal').modal('show');
});

// $('#shiftTable').on('click','tbody tr',function(){
//     var data = shiftTable.row(this).data();

//     $('#shift_id').val(data.id);
//     $('#shift_code').val(data.shift_code);
//     $('#shift_working_hours').val(data.shift_working_hours);
//     $('#shift_break_time').val(data.shift_break_time);
//     $('#shift_details_code').val(data.shift_code);
//     $('#shift_details_working_hours').val(data.shift_working_hours);
//     $('#shift_details_break_time').val(data.shift_break_time);
//     $('.validation').hide();
//     $('.shift_field').attr('readonly', true);

//     $('#updateShiftModal').modal('show');
// });

$('#jobPositionAndDescriptionTable').on('click','tbody tr',function(){
    var data = jobPositionAndDescriptionTable.row(this).data();

    $('#job_position_and_description_id').val(data.id);
    $('#job_position_name').val(data.job_position_name);
    $('#job_description').val(data.job_description);
    $('#job_requirements').val(data.job_requirements);
    $('#job_position_name_new').val(data.job_position_name);
    $('#job_description_new').val(data.job_description);
    $('#job_requirements_new').val(data.job_requirements);
    $('.validation').hide();

    $('#updateJobPositionAndDescriptionModal').modal('show');
});
