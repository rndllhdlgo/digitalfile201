//Employees
$('#tab1').on('click',function(){
    $('#tab1').addClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_information').fadeIn();
    $('#work_information').hide();
    $('#compensation_and_benefits').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#performance_evaluation').hide();
    $('#documents').hide();
    $('#logs').hide();
});

$('#tab2').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').addClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');
    
    $('#personal_information').hide();
    $('#work_information').show();
    $('#compensation_and_benefits').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#performance_evaluation').hide();
    $('#documents').hide();
    $('#logs').hide();

});

$('#tab3').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').addClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_information').hide();
    $('#work_information').hide();
    $('#compensation_and_benefits').show();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#performance_evaluation').hide();
    $('#documents').hide();
    $('#logs').hide();
});

$('#tab4').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').addClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_information').hide();
    $('#work_information').hide();
    $('#compensation_and_benefits').hide();
    $('#educational_background').show();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#performance_evaluation').hide();
    $('#documents').hide();
    $('#logs').hide();
});

$('#tab5').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').addClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_information').hide();
    $('#work_information').hide();
    $('#compensation_and_benefits').hide();
    $('#educational_background').hide();
    $('#job_history').show();
    $('#medical_history').hide();
    $('#performance_evaluation').hide();
    $('#documents').hide();
    $('#logs').hide();
});

$('#tab6').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').addClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_information').hide();
    $('#work_information').hide();
    $('#compensation_and_benefits').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#medical_history').show();
    $('#performance_evaluation').hide();
    $('#documents').hide();
    $('#logs').hide();
});

$('#tab7').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').addClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_information').hide();
    $('#work_information').hide();
    $('#compensation_and_benefits').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').show();
    $('#performance_evaluation').hide();
    $('#logs').hide();
});

$('#tab8').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').addClass('tabactive');
    $('#tab9').removeClass('tabactive');

    $('#personal_information').hide();
    $('#work_information').hide();
    $('#compensation_and_benefits').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#documents').hide();
    $('#performance_evaluation').show();
    $('#logs').hide();
});

$('#tab9').on('click',function(){
    $('#tab1').removeClass('tabactive');
    $('#tab2').removeClass('tabactive');
    $('#tab3').removeClass('tabactive');
    $('#tab4').removeClass('tabactive');
    $('#tab5').removeClass('tabactive');
    $('#tab6').removeClass('tabactive');
    $('#tab7').removeClass('tabactive');
    $('#tab8').removeClass('tabactive');
    $('#tab9').addClass('tabactive');

    $('#personal_information').hide();
    $('#work_information').hide();
    $('#compensation_and_benefits').hide();
    $('#educational_background').hide();
    $('#job_history').hide();
    $('#medical_history').hide();
    $('#performance_evaluation').hide();
    $('#documents').hide();
    $('#logs').show();
});

//Maintenance
$('#company_tab').addClass('tabactive');

$('#company_tab').on('click',function(){
    $('#company_tab').addClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#job_position_and_description_tab').removeClass('tabactive');

    $('#company_div').fadeIn();
    $('#branch_div').hide();
    $('#shift_div').hide();
    $('#supervisor_div').hide();
    $('#job_position_and_description_div').hide();

    $('#addCompanyBtn').show();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').hide();
    $('#addSupervisorBtn').hide();
    $('#addJobPositionAndDescriptionBtn').hide();
});

$('#branch_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').addClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#job_position_and_description_tab').removeClass('tabactive');

    $('#company_div').hide();
    $('#branch_div').show();
    $('#shift_div').hide();
    $('#supervisor_div').hide();
    $('#job_position_and_description_div').hide();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').show();
    $('#addShiftBtn').hide();
    $('#addSupervisorBtn').hide();
    $('#addJobPositionAndDescriptionBtn').hide();

});

$('#shift_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').addClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#job_position_and_description_tab').removeClass('tabactive');

    $('#company_div').hide();
    $('#branch_div').hide();
    $('#shift_div').show();
    $('#supervisor_div').hide();
    $('#job_position_and_description_div').hide();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').show();
    $('#addSupervisorBtn').hide();
    $('#addJobPositionAndDescriptionBtn').hide();
});

$('#position_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#job_position_and_description_tab').removeClass('tabactive');

    $('#company_div').hide();
    $('#branch_div').hide();
    $('#shift_div').hide();
    $('#supervisor_div').hide();
    $('#job_position_and_description_div').hide();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').hide();
    $('#addSupervisorBtn').hide();
    $('#addJobPositionAndDescriptionBtn').hide();
});

$('#supervisor_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#supervisor_tab').addClass('tabactive');
    $('#job_position_and_description_tab').removeClass('tabactive');

    $('#company_div').hide();
    $('#branch_div').hide();
    $('#shift_div').hide();
    $('#supervisor_div').show();
    $('#job_position_and_description_div').hide();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').hide();
    $('#addSupervisorBtn').show();
    $('#addJobPositionAndDescriptionBtn').hide();
});

$('#job_position_and_description_tab').on('click',function(){
    $('#company_tab').removeClass('tabactive');
    $('#branch_tab').removeClass('tabactive');
    $('#shift_tab').removeClass('tabactive');
    $('#supervisor_tab').removeClass('tabactive');
    $('#job_position_and_description_tab').addClass('tabactive');

    $('#company_div').hide();
    $('#branch_div').hide();
    $('#shift_div').hide();
    $('#supervisor_div').hide();
    $('#job_position_and_description_div').show();

    $('#addCompanyBtn').hide();
    $('#addBranchBtn').hide();
    $('#addShiftBtn').hide();
    $('#addSupervisorBtn').hide();
    $('#addJobPositionAndDescriptionBtn').show();
});