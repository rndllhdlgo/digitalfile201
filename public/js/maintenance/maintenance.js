//Disabled Save and Update Button base on Condition
setInterval(checkField,0);
function checkField(){
    if($('#saveCompanyModal').is(":visible")){
        if(!$('#company_name').val()){
            $('#companySave').prop('disabled',true);
        }
        else{
            $('#companySave').prop('disabled',false);
        }
    }

    if($('#updateCompanyModal').is(":visible")){
        if($('#company_name').val() == $('#company_name_new').val() || !$('#company_name_new').val()){
            $('#companyUpdate').prop('disabled',true);
        }
        else{
            $('#companyUpdate').prop('disabled',false);
        }
    }

    if($('#saveBranchModal').is(":visible")){
        if(!$('#branch_name').val()){
            $('#branchSave').prop('disabled',true);
        }
        else{
            $('#branchSave').prop('disabled',false);
        }
    }

    if($('#updateBranchModal').is(":visible")){
        if($('#branch_name').val() == $('#branch_name_new').val() || !$('#branch_name_new').val()){
            $('#branchUpdate').prop('disabled',true);
        }
        else{
            $('#branchUpdate').prop('disabled',false);
        }
    }

    if($('#saveSupervisorModal').is(":visible")){
        if(!$('#supervisor_name').val()){
            $('#supervisorSave').prop('disabled',true);
        }
        else{
            $('#supervisorSave').prop('disabled',false);
        }
    }

    if($('#updateSupervisorModal').is(":visible")){
        if($('#supervisor_name').val() == $('#supervisor_name_new').val() || !$('#supervisor_name_new').val()){
            $('#supervisorUpdate').prop('disabled',true);
        }
        else{
            $('#supervisorUpdate').prop('disabled',false);
        }
    }

    if($('#saveShiftModal').is(":visible")){
        if(!$('#shift_code').val() || !$('#shift_working_hours').val() || !$('#shift_break_time').val()){
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
        if(!$('#job_position_name').val() || !$('#job_description').val() || !$('#job_requirements').val()){
            $('#jobPositionAndDescriptionSave').prop('disabled',true);
        }
        else{
            $('#jobPositionAndDescriptionSave').prop('disabled',false);
        }
    }

    if($('#updateJobPositionAndDescriptionModal').is(":visible")){
        if($('#job_position_name').val() == $('#job_position_name_new').val() && $('#job_description').val() == $('#job_description_new').val() && $('#job_requirements').val() == $('#job_requirements_new').val()){
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
});

$('#addBranchBtn').on('click',function(){
    $('#saveBranchModal').modal('show');
    $('#branch_name').val('');
});

$('#addSupervisorBtn').on('click',function(){
    $('#saveSupervisorModal').modal('show');
    $('#supervisor_name').val('');
});

$('#addShiftBtn').on('click',function(){
    $('#saveShiftModal').modal('show');
    $('#shift_code').val('');
    $('#shift_working_hours').val('');
    $('#shift_break_time').val('');
});

$('#addJobPositionAndDescriptionBtn').on('click',function(){
    $('#job_position_name').val('');
    $('#job_description').val('');
    $('#job_requirements').val('');
    $('#saveJobPositionAndDescriptionModal').modal('show');
});

