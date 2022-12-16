//Disabled Save and Update Button base on Condition
setInterval(checkField,0);
function checkField(){
    if($('#saveCompanyModal').is(":visible")){
        if(!$('#company_name').val() || $(".validation:visible").length > 0){
            $('#companySave').prop('disabled',true);
        }
        else{
            $('#companySave').prop('disabled',false);
        }
    }

    if($('#updateCompanyModal').is(":visible")){
        if($('#company_name').val() == $('#company_name_new').val() || !$('#company_name_new').val() || $(".validation:visible").length > 0){
            $('#companyUpdate').prop('disabled',true);
        }
        else{
            $('#companyUpdate').prop('disabled',false);
        }
    }

    if($('#saveDepartmentModal').is(":visible")){
        if(!$('#department').val() || $(".validation:visible").length > 0){
            $('#departmentSave').prop('disabled',true);
        }
        else{
            $('#departmentSave').prop('disabled',false);
        }
    }

    if($('#updateDepartmentModal').is(":visible")){
        if($('#department').val() == $('#department_new').val() || !$('#department_new').val() || $(".validation:visible").length > 0){
            $('#departmentUpdate').prop('disabled',true);
        }
        else{
            $('#departmentUpdate').prop('disabled',false);
        }
    }

    if($('#saveBranchModal').is(":visible")){
        if(!$('#branch_name').val() || $(".validation:visible").length > 0){
            $('#branchSave').prop('disabled',true);
        }
        else{
            $('#branchSave').prop('disabled',false);
        }
    }

    if($('#updateBranchModal').is(":visible")){
        if($('#branch_name').val() == $('#branch_name_new').val() || !$('#branch_name_new').val() || $(".validation:visible").length > 0){
            $('#branchUpdate').prop('disabled',true);
        }
        else{
            $('#branchUpdate').prop('disabled',false);
        }
    }

    if($('#saveSupervisorModal').is(":visible")){
        if(!$('#supervisor_name').val() || $(".validation:visible").length > 0){
            $('#supervisorSave').prop('disabled',true);
        }
        else{
            $('#supervisorSave').prop('disabled',false);
        }
    }

    if($('#updateSupervisorModal').is(":visible")){
        if($('#supervisor_name').val() == $('#supervisor_name_new').val() || !$('#supervisor_name_new').val() || $(".validation:visible").length > 0){
            $('#supervisorUpdate').prop('disabled',true);
        }
        else{
            $('#supervisorUpdate').prop('disabled',false);
        }
    }

    if($('#saveShiftModal').is(":visible")){
        if(!$('#shift_code').val() || !$('#shift_working_hours').val() || !$('#shift_break_time').val() || $(".validation:visible").length > 0){
            $('#shiftSave').prop('disabled',true);
        }
        else{
            $('#shiftSave').prop('disabled',false);
        }
    }

    if($('#updateShiftModal').is(":visible")){
        if(($('#shift_code').val() == $('#shift_details_code').val() && $('#shift_working_hours').val() == $('#shift_details_working_hours').val() && $('#shift_break_time').val() == $('#shift_details_break_time').val()) || $(".requiredInput:visible").length > 0){
            $('#shiftUpdate').prop('disabled',true);
        }
        else{
            $('#shiftUpdate').prop('disabled',false);
        }
    }

    if($('#saveJobPositionAndDescriptionModal').is(":visible")){
        if(!$('#job_position_name').val() || !$('#job_description').val() || !$('#job_requirements').val() || $(".validation:visible").length > 0){
            $('#jobPositionAndDescriptionSave').prop('disabled',true);
        }
        else{
            $('#jobPositionAndDescriptionSave').prop('disabled',false);
        }
    }

    if($('#updateJobPositionAndDescriptionModal').is(":visible")){
        if($('#job_position_name').val() == $('#job_position_name_new').val() && $('#job_description').val() == $('#job_description_new').val() && $('#job_requirements').val() == $('#job_requirements_new').val() || $(".validation:visible").length > 0){
            $('#jobPositionAndDescriptionUpdate').prop('disabled',true);
        }
        else{
            $('#jobPositionAndDescriptionUpdate').prop('disabled',false);
        }
    }
}

//Open Modal on click
$('#addCompanyBtn').on('click',function(){
    $('#saveCompanyModal').modal('show');
    $('#company_name').val('');
    $('.validation').hide();
});

$('#addBranchBtn').on('click',function(){
    $('#saveBranchModal').modal('show');
    $('#branch_name').val('');
    $('.validation').hide();

});

$('#addSupervisorBtn').on('click',function(){
    $('#saveSupervisorModal').modal('show');
    $('#supervisor_name').val('');
    $('.validation').hide();
    
});

$('#addShiftBtn').on('click',function(){
    $('#saveShiftModal').modal('show');
    $('#shift_code').val('');
    $('#shift_working_hours').val('');
    $('#shift_break_time').val('');
    $('.validation').hide();
});

$('#addJobPositionAndDescriptionBtn').on('click',function(){
    $('#saveJobPositionAndDescriptionModal').modal('show');
    $('#job_position_name').val('');
    $('#job_description').val('');
    $('#job_requirements').val('');
    $('.validation').hide();
});

$('#addDepartmentBtn').on('click',function(){
    $('#saveDepartmentModal').modal('show');
    $('#department').val('');
    $('.validation').hide();
});

$('#company_name').on('keyup',function(){
    $.ajax({
        url: "/maintenance/company_name/checkDuplicate",
        data:{
            company_name : $('#company_name').val(),
        },
        success: function(data){
            if(data == 'duplicate_company_name'){
                $('.validation').show();
            }
            else{
                $('.validation').hide();
            }
        }
    });
});

$('#company_name_new').on('keyup',function(){
    $.ajax({
        url: "/maintenance/company_name_new/checkDuplicate",
        data:{
            company_name : $('#company_name_new').val(),
        },
        success: function(data){
            if(data == 'duplicate_company_name'){
                $('.validation').show();
            }
            else{
                $('.validation').hide();
            }
        }
    });
});

$('#department').on('keyup',function(){
    $.ajax({
        url: "/maintenance/department/checkDuplicate",
        data:{
            department : $('#department').val(),
        },
        success: function(data){
            if(data == 'duplicate_department'){
                $('.validation').show();
            }
            else{
                $('.validation').hide();
            }
        }
    });
});

$('#department_new').on('keyup',function(){
    $.ajax({
        url: "/maintenance/department_new/checkDuplicate",
        data:{
            department : $('#department_new').val(),
        },
        success: function(data){
            if(data == 'duplicate_department'){
                $('.validation').show();
            }
            else{
                $('.validation').hide();
            }
        }
    });
});

$('#branch_name').on('keyup',function(){
    $.ajax({
        url: "/maintenance/branch_name/checkDuplicate",
        data:{
            branch_name : $('#branch_name').val(),
        },
        success: function(data){
            if(data == 'duplicate_branch_name'){
                $('.validation').show();
            }
            else{
                $('.validation').hide();
            }
        }
    });
});

$('#branch_name_new').on('keyup',function(){
    $.ajax({
        url: "/maintenance/branch_name_new/checkDuplicate",
        data:{
            branch_name : $('#branch_name_new').val(),
        },
        success: function(data){
            if(data == 'duplicate_branch_name'){
                $('.validation').show();
            }
            else{
                $('.validation').hide();
            }
        }
    });
});

$('#shift_code').on('keyup',function(){
    $.ajax({
        url: "/maintenance/shift_code/checkDuplicate",
        data:{
            shift_code : $('#shift_code').val(),
        },
        success: function(data){
            if(data == 'duplicate_shift_code'){
                $('.validation').show();
            }
            else{
                $('.validation').hide();
            }
        }
    });
});

$('#shift_details_code').on('keyup',function(){
    $.ajax({
        url: "/maintenance/shift_details_code/checkDuplicate",
        data:{
            shift_code : $('#shift_details_code').val(),
        },
        success: function(data){
            if(data == 'duplicate_shift_code'){
                $('.validation').show();
            }
            else{
                $('.validation').hide();
            }
        }
    });
});

$('#supervisor_name').on('keyup',function(){
    $.ajax({
        url: "/maintenance/supervisor_name/checkDuplicate",
        data:{
            supervisor_name : $('#supervisor_name').val(),
        },
        success: function(data){
            if(data == 'duplicate_supervisor_name'){
                $('.validation').show();
            }
            else{
                $('.validation').hide();
            }
        }
    });
});

$('#supervisor_name_new').on('keyup',function(){
    $.ajax({
        url: "/maintenance/supervisor_name_new/checkDuplicate",
        data:{
            supervisor_name : $('#supervisor_name_new').val(),
        },
        success: function(data){
            if(data == 'duplicate_supervisor_name'){
                $('.validation').show();
            }
            else{
                $('.validation').hide();
            }
        }
    });
});

$('#job_position_name').on('keyup',function(){
    $.ajax({
        url: "/maintenance/job_position_name/checkDuplicate",
        data:{
            job_position_name : $('#job_position_name').val(),
        },
        success: function(data){
            if(data == 'duplicate_job_position_name'){
                $('.validation').show();
            }
            else{
                $('.validation').hide();
            }
        }
    });
});

$('#job_position_name_new').on('keyup',function(){
    $.ajax({
        url: "/maintenance/job_position_name_new/checkDuplicate",
        data:{
            job_position_name : $('#job_position_name_new').val(),
        },
        success: function(data){
            if(data == 'duplicate_job_position_name'){
                $('.validation').show();
            }
            else{
                $('.validation').hide();
            }
        }
    });
});

$('.btnCancel, .close').on('click',function(){
    Swal.fire({
        title: 'Do you want to cancel?',
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
    }).then((cancel) => {
        if(cancel.isConfirmed){
            $('.modal').modal('hide');
        }
        else if(cancel.isDenied){

        }
    });
});
