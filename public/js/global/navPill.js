//Employees
$('#tab1').on('click',function(){
    $(this).blur();
    $('#tab1').addClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_info').fadeIn();
    $('#work_info').hide();
    $('#education_trainings').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').hide();
    $('#evaluation').hide();
    $('#compensation_benefits').hide();
    $('#logs').hide();
});

$('#tab2').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').addClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');
    
    $('#personal_info').hide();
    $('#work_info').show();
    $('#education_trainings').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').hide();
    $('#evaluation').hide();
    $('#compensation_benefits').hide();
    $('#logs').hide();

});

$('#tab3').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').addClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_info').hide();
    $('#work_info').hide();
    $('#education_trainings').show();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').hide();
    $('#evaluation').hide();
    $('#compensation_benefits').hide();
    $('#logs').hide();
});

$('#tab4').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').addClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_info').hide();
    $('#work_info').hide();
    $('#education_trainings').hide();
    $('#job_history').show();
    $('#medical_history').hide();
    $('#documents').hide();
    $('#evaluation').hide();
    $('#compensation_benefits').hide();
    $('#logs').hide();
});

$('#tab5').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').addClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_info').hide();
    $('#work_info').hide();
    $('#education_trainings').hide();
    $('#job_history').hide();
    $('#medical_history').show();
    $('#documents').hide();
    $('#evaluation').hide();
    $('#compensation_benefits').hide();
    $('#logs').hide();
});

$('#tab6').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').addClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_info').hide();
    $('#work_info').hide();
    $('#education_trainings').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').show();
    $('#evaluation').hide();
    $('#compensation_benefits').hide();
    $('#logs').hide();
});

$('#tab7').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').addClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_info').hide();
    $('#work_info').hide();
    $('#education_trainings').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').hide();
    $('#evaluation').show();
    $('#compensation_benefits').hide();
    $('#logs').hide();
});

$('#tab8').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').addClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_info').hide();
    $('#work_info').hide();
    $('#education_trainings').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').hide();
    $('#evaluation').hide();
    $('#compensation_benefits').show();
    $('#logs').hide();
});

$('#tab9').on('click',function(){
    $(this).blur();
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').addClass('tabactive');

    $('#personal_info').hide();
    $('#work_info').hide();
    $('#education_trainings').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').hide();
    $('#evaluation').hide();
    $('#compensation_benefits').hide();
    $('#logs').show();
});

//Maintenance
$('#company_tab').addClass('tabactive');
$('#maintenance-span').text('- COMPANY');

$('#company_tab').on('click',function(){
    $(this).blur();
    $('#maintenance-span').text('- COMPANY');
    $('#company_tab').addClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#job_position_and_description_tab').removeClass('tabactive');
    $('#department_tab').removeClass('tabactive');

    $('#company_div').fadeIn();
    $('#branch_div').hide();
    $('#shift_div').hide();
    $('#supervisor_div').hide();
    $('#job_position_and_description_div').hide();
    $('#department_div').hide();

    $('#addCompanyBtn').show();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').hide();
    $('#addSupervisorBtn').hide();
    $('#addJobPositionAndDescriptionBtn').hide();
    $('#addDepartmentBtn').hide();

    $('#exportCompanyBtn').show();
    $('#exportDepartmentBtn').hide();
    $('#exportBranchBtn').hide();
    $('#exportShiftBtn').hide();
    $('#exportSupervisorBtn').hide();
    $('#exportJobPositionAndDescriptionBtn').hide();
});

$('#department_tab').on('click',function(){
    $(this).blur();
    $('#maintenance-span').text('- DEPARTMENT');
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#job_position_and_description_tab').removeClass('tabactive');
    $('#department_tab').addClass('tabactive');

    $('#company_div').hide();
    $('#branch_div').hide();
    $('#shift_div').hide();
    $('#supervisor_div').hide();
    $('#job_position_and_description_div').hide();
    $('#department_div').show();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').hide();
    $('#addSupervisorBtn').hide();
    $('#addJobPositionAndDescriptionBtn').hide();
    $('#addDepartmentBtn').show();

    $('#exportCompanyBtn').hide();
    $('#exportDepartmentBtn').show();
    $('#exportBranchBtn').hide();
    $('#exportShiftBtn').hide();
    $('#exportSupervisorBtn').hide();
    $('#exportJobPositionAndDescriptionBtn').hide();
});

$('#branch_tab').on('click',function(){
    $(this).blur();
    $('#maintenance-span').text('- BRANCH');
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').addClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#job_position_and_description_tab').removeClass('tabactive');
    $('#department_tab').removeClass('tabactive');

    $('#company_div').hide();
    $('#branch_div').show();
    $('#shift_div').hide();
    $('#supervisor_div').hide();
    $('#job_position_and_description_div').hide();
    $('#department_div').hide();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').show();
    $('#addShiftBtn').hide();
    $('#addSupervisorBtn').hide();
    $('#addJobPositionAndDescriptionBtn').hide();
    $('#addDepartmentBtn').hide();

    $('#exportCompanyBtn').hide();
    $('#exportDepartmentBtn').hide();
    $('#exportBranchBtn').show();
    $('#exportShiftBtn').hide();
    $('#exportSupervisorBtn').hide();
    $('#exportJobPositionAndDescriptionBtn').hide();
});

$('#shift_tab').on('click',function(){
    $(this).blur();
    $('#maintenance-span').text('- SHIFT');
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').addClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#job_position_and_description_tab').removeClass('tabactive');
    $('#department_tab').removeClass('tabactive');

    $('#company_div').hide();
    $('#branch_div').hide();
    $('#shift_div').show();
    $('#supervisor_div').hide();
    $('#job_position_and_description_div').hide();
    $('#department_div').hide();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').show();
    $('#addSupervisorBtn').hide();
    $('#addJobPositionAndDescriptionBtn').hide();
    $('#addDepartmentBtn').hide();

    $('#exportCompanyBtn').hide();
    $('#exportDepartmentBtn').hide();
    $('#exportBranchBtn').hide();
    $('#exportShiftBtn').show();
    $('#exportSupervisorBtn').hide();
    $('#exportJobPositionAndDescriptionBtn').hide();

});

$('#supervisor_tab').on('click',function(){
    $(this).blur();
   
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#supervisor_tab').addClass('tabactive');
    $('#job_position_and_description_tab').removeClass('tabactive');
    $('#department_tab').removeClass('tabactive');

    $('#company_div').hide();
    $('#branch_div').hide();
    $('#shift_div').hide();
    $('#supervisor_div').show();
    $('#job_position_and_description_div').hide();
    $('#department_div').hide();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').hide();
    $('#addSupervisorBtn').show();
    $('#addJobPositionAndDescriptionBtn').hide();
    $('#addDepartmentBtn').hide();

    $('#exportCompanyBtn').hide();
    $('#exportDepartmentBtn').hide();
    $('#exportBranchBtn').hide();
    $('#exportShiftBtn').hide();
    $('#exportSupervisorBtn').show();
    $('#exportJobPositionAndDescriptionBtn').hide();

});

$('#job_position_and_description_tab').on('click',function(){
    $(this).blur();
    $('#maintenance-span').text('- JOB POSITION');
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#job_position_and_description_tab').addClass('tabactive');
    $('#department_tab').removeClass('tabactive');

    $('#company_div').hide();
    $('#branch_div').hide();
    $('#shift_div').hide();
    $('#supervisor_div').hide();
    $('#job_position_and_description_div').show();
    $('#department_div').hide();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').hide();
    $('#addSupervisorBtn').hide();
    $('#addJobPositionAndDescriptionBtn').show();
    $('#addDepartmentBtn').hide();

    $('#exportCompanyBtn').hide();
    $('#exportDepartmentBtn').hide();
    $('#exportBranchBtn').hide();
    $('#exportShiftBtn').hide();
    $('#exportSupervisorBtn').hide();
    $('#exportJobPositionAndDescriptionBtn').show();
});

