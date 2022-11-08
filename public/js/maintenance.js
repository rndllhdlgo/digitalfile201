$('#company_tab').addClass('tabactive');

$('#company_tab').on('click',function(){
    $('#company_tab').addClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#position_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#company_div').fadeIn();
    $('#branch').hide();
    $('#shift_div').hide();
    $('#position').hide();
    $('#supervisor_div').hide();

    $('#addCompanyBtn').show();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').hide();
    $('#addPositionBtn').hide();
    $('#addSupervisorBtn').hide();
});

$('#branch_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').addClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#position_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#company_div').hide();
    $('#branch').show();
    $('#shift_div').hide();
    $('#position').hide();
    $('#supervisor_div').hide();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').show();
    $('#addShiftBtn').hide();
    $('#addPositionBtn').hide();
    $('#addSupervisorBtn').hide();
});

$('#shift_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').addClass('tabactive');
    $('#position_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#company_div').hide();
    $('#branch').hide();
    $('#shift_div').show();
    $('#position').hide();
    $('#supervisor_div').hide();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').show();
    $('#addPositionBtn').hide();
    $('#addSupervisorBtn').hide();
});

$('#position_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#position_tab').addClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#company_div').hide();
    $('#branch').hide();
    $('#shift_div').hide();
    $('#position').show();
    $('#supervisor_div').hide();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').hide();
    $('#addPositionBtn').show();
    $('#addSupervisorBtn').hide();
});

$('#supervisor_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#position_tab').removeClass('tabactive');
    $('#supervisor_tab').addClass('tabactive');
    $('#company_div').hide();
    $('#branch').hide();
    $('#shift_div').hide();
    $('#position').hide();
    $('#supervisor_div').show();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').hide();
    $('#addPositionBtn').hide();
    $('#addSupervisorBtn').show();
});

//Disabled Save and Update Button base on Condition
setInterval(checkField,0);
function checkField(){
    if($('#saveCompanyModal').is(":visible")){
        if(!$('#company').val()){
            $('#companySave').prop('disabled',true);
        }
        else{
            $('#companySave').prop('disabled',false);
        }
    }

    if($('#updateCompanyModal').is(":visible")){
        if($('#company').val() == $('#company_details').val() || !$('#company_details').val()){
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
        if($('#branch_name').val() == $('#branch_details').val() || !$('#branch_details').val()){
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
        if($('#supervisor_name').val() == $('#supervisor_details').val() || !$('#supervisor_details').val()){
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
}

//Open Modal on click
$('#addCompanyBtn').on('click',function(){
    $('#saveCompanyModal').modal('show');
    $('#company').val('');
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