//Personal Information
//Check for input field
setInterval(checkforblankMultiple,0);
function checkforblankMultiple(){
    if(!$('#child_name').val() || !$('#child_birthday').val() || !$('#child_gender').val()){
        $('#btnSingleParentAdd').prop('disabled',true);
    }
    else{
        $('#btnSingleParentAdd').prop('disabled',false);
    }

    if(!$('#college_name').val() || !$('#college_degree').val() || !$('#college_inclusive_years').val()){
        $('#btnCollegeAdd').prop('disabled',true);
    }
    else{
        $('#btnCollegeAdd').prop('disabled',false);
        $('#btnCollegeAdd').css('display','block');
    }

    if(!$('#training_name').val() || !$('#training_title').val() || !$('#training_inclusive_years').val()){
        $('#btnTrainingAdd').prop('disabled',true);
    }
    else{
        $('#btnTrainingAdd').prop('disabled',false);
        $('#btnTrainingAdd').css('display','block');
    }

    if(!$('#vocational_name').val() || !$('#vocational_course').val() || !$('#vocational_inclusive_years').val()){
        $('#btnVocationalAdd').prop('disabled',true);
    }
    else{
        $('#btnVocationalAdd').prop('disabled',false);
        $('#btnVocationalAdd').css('display','block');
    }

    if(!$('#memo_subject').val() || !$('#memo_date').val() || !$('#memo_option').val()){
        $('#btnMemoAdd').prop('disabled',true);
    }
    else{
        $('#btnMemoAdd').prop('disabled',false);
        $('#btnMemoAdd').css('display','block');
    }

    if(!$('#evaluation_reason').val() || !$('#evaluation_date').val() || !$('#evaluation_evaluated_by').val()){
        $('#btnEvaluationAdd').prop('disabled',true);
    }
    else{
        $('#btnEvaluationAdd').prop('disabled',false);
        $('#btnEvaluationAdd').css('display','block');
    }

    if(!$('#contracts_type').val() || !$('#contracts_date').val()){
        $('#btnContractAdd').prop('disabled',true);
    }
    else{
        $('#btnContractAdd').prop('disabled',false);
        $('#btnContractAdd').css('display','block');
    }

    if(!$('#resignation_letter').val() || !$('#resignation_date').val()){
        $('#btnResignationAdd').prop('disabled',true);
    }
    else{
        $('#btnResignationAdd').prop('disabled',false);
        $('#btnResignationAdd').css('display','block');
    }

    if(!$('#termination_letter').val() || !$('#termination_date').val()){
        $('#btnTerminationAdd').prop('disabled',true);
    }
    else{
        $('#btnTerminationAdd').prop('disabled',false);
        $('#btnTerminationAdd').css('display','block');
    }

    if(!$('#job_name').val() || !$('#job_position').val() || !$('#job_address').val() || !$('#job_contact_details').val() || !$('#job_inclusive_years').val()){
        $('#btnJobHistoryAdd').prop('disabled',true);
    }
    else{
        $('#btnJobHistoryAdd').prop('disabled',false);
        $('#btnJobHistoryAdd').css('display','block');
    }
}

//Solo Parent Table Add
$(document).ready(function(){
    $('#btnSingleParentAdd').click(function(){
        $('#solo_parent_data_table').show();
        var child_name = $('#child_name').val().trim();
        var child_birthday = $('#child_birthday').val();
        var child_age = $('#child_age').val();
        var child_gender = $('#child_gender').val();

        var dynamicSingleParent = "<tr><td>"+ child_name +"</td><td>" + child_birthday + "</td><td>" + child_age + "</td><td>" + child_gender + "</td><td> <button class='btn btn-danger btn-single-parent center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td></tr>";
        $('#solo_parent_data_table tbody').append(dynamicSingleParent);
        $('#child_name').val("");
        $('#child_birthday').val("");
        $('#child_age').val("");
        $('#child_gender').val("");
        $('.span_child_name').show();
        $('.span_child_birthday').show();
        $('.span_child_gender').show();
        $('.btn-single-parent').click(function(){
            $(this).parent().parent().remove();
        });
    });

// $(document).ready(function(){
//     $('#btnSingleParentAdd').click(function(){
//         $('#solo_parent_data_table').show();
//         var child_name = $('#child_name').val().trim();
//         var child_birthday = $('#child_birthday').val();
//         var child_age = $('#child_age').val();
//         var child_gender = $('#child_gender').val();

//         if(child_name != "" && child_birthday != "" && child_age != "" && child_gender != ""){
//             if($('#solo_parent_data_table tbody').children().children().length == 1){
//                 $('#solo_parent_data_table tbody').html("");
//             }
//             var dynamicSingleParent = "<tr><td>"+ child_name +"</td><td>" + child_birthday + "</td><td>" + child_age + "</td><td>" + child_gender + "</td><td> <button class='btn btn-danger btn-single-parent center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td></tr>";
//             $('#solo_parent_data_table tbody').append(dynamicSingleParent);
//             $('#child_name').val("");
//             $('#child_birthday').val("");
//             $('#child_age').val("");
//             $('#child_gender').val("");
//             $('.span_child_name').show();
//             $('.span_child_birthday').show();
//             $('.span_child_gender').show();
//             $('.btn-single-parent').click(function(){
//                 $(this).parent().parent().remove();
//                 if($('#solo_parent_data_table tbody').children().children().length == 0){
//                     $('#solo_parent_data_table').hide();
//                 }
//             });
//         }else{
//             alert('error');
//         }
//     });

//Educational and Training Background Tab
//College Table Add
    $('#btnCollegeAdd').click(function(){
        $('#college_data_table').show();
        $('.college_tr_th').hide();
        var college_name = $('#college_name').val().trim();
        var college_degree = $('#college_degree').val().trim();
        var college_inclusive_years = $('#college_inclusive_years').val().trim();

        var dynamicCollege = "<tr><td style='width:30%'>"+ college_name +"</td><td style='width:30%'>" + college_degree + "</td><td style='width:30%'>" + college_inclusive_years + "</td><td style='width:10%'> <button class='btn btn-danger btn-college center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td></tr>";
        $('#college_data_table tbody').append(dynamicCollege);
        $('#college_name').val("");
        $('#college_degree').val("");
        $('#college_inclusive_years').val("");
        $('.span_college_name').show();
        $('.span_college_degree').show();
        $('.span_college_inclusive_years').show();
        $('.btn-college').click(function(){
            $(this).parent().parent().remove();
        });
    });
    // $('#btnCollegeAdd').click(function(){
    //     $('#college_data_table').show();
    //     var college_name = $('#college_name').val().trim();
    //     var college_degree = $('#college_degree').val().trim();
    //     var college_inclusive_years = $('#college_inclusive_years').val().trim();

    //     var dynamicCollege = "<tr><td style='width:30%'>"+ college_name + "</td><td style='width:30%'>" + college_degree + "</td><td style='width:30%'>" + college_inclusive_years + "</td><td style='width:30%'> <button class='btn btn-danger btn-college center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td></tr>";
    //     $("#college_data_table tbody").append(dynamicCollege);
    //     $("#college_name").val("");
    //     $("#college_degree").val("");
    //     $("#college_inclusive_years").val("");
    //     $('#college_name').removeClass('blue');
    //     $('#college_degree').removeClass('blue');
    //     $('#college_inclusive_years').removeClass('blue');
    //     $('.span_college_name').show();
    //     $('.span_college_degree').show();
    //     $('.span_college_inclusive_years').show();
    //     $(".btn-college").click(function (){
    //         $(this).parent().parent().remove();
    //         if($('#college_data_table tbody').children().children().length == 0){
    //             $('#college_data_table').hide();
    //         }
    //     });
    // });

//Training Table Add
    $('#btnTrainingAdd').click(function(){
        $('#training_data_table').show();
        $('.training_tr_th').hide();
        var training_name = $('#training_name').val().trim();
        var training_title = $('#training_title').val().trim();
        var training_inclusive_years = $('#training_inclusive_years').val().trim();

        var dynamicTraining = "<tr><td style='width:30%'>"+ training_name +"</td><td style='width:30%'>" + training_title + "</td><td style='width:30%'>" + training_inclusive_years + "</td><td style='width:10%'> <button class='btn btn-danger btn-training center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td></tr>";
        $('#training_data_table tbody').append(dynamicTraining);
        $('#training_name').val("");
        $('#training_title').val("");
        $('#training_inclusive_years').val("");
        $('.span_training_name').show();
        $('.span_training_title').show();
        $('.span_training_inclusive_years').show();
        $('.btn-training').click(function(){
            $(this).parent().parent().remove();
        });
});
    // $('#btnTrainingAdd').click(function(){
    //     var training_name = $('#training_name').val().trim();
    //     var training_title = $('#training_title').val().trim();
    //     var training_inclusive_years = $('#training_inclusive_years').val().trim();

    //     var dynamicTraining = "<tr><td>"+ training_name + "</td><td>" + training_title + "</td><td>" + training_inclusive_years + "</td><td> <button class='btn btn-danger btn-training center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td></tr>";
    //     $("#training_tbody").append(dynamicTraining);
    //     $("#training_name").val("");
    //     $("#training_title").val("");
    //     $("#training_inclusive_years").val("");
    //     $('#training_name').removeClass('blue');
    //     $('#training_title').removeClass('blue');
    //     $('#training_inclusive_years').removeClass('blue');
    //     $('.span_training_name').show();
    //     $('.span_training_title').show();
    //     $('.span_training_inclusive_years').show();
    //     $(".btn-training").click(function (){
    //         $(this).parent().parent().remove();
    //     });
    // });

//Vocational Table Add
    $('#btnVocationalAdd').click(function(){ //Append data onclick
        var vocational_name = $('#vocational_name').val().trim();
        var vocational_course = $('#vocational_course').val().trim();
        var vocational_inclusive_years = $('#vocational_inclusive_years').val().trim();

        var dynamicVocational = "<tr><td>"+ vocational_name +"</td><td>"+ vocational_course + "</td><td>" + vocational_inclusive_years + "</td><td> <button class='btn btn-danger btn-vocational center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td> </tr>";
        $("#vocational_tbody").append(dynamicVocational);
        $("#vocational_name").val(""); 
        $("#vocational_course").val(""); 
        $("#vocational_inclusive_years").val("");
        $('#vocational_name').removeClass('blue');
        $('#vocational_course').removeClass('blue');
        $('#vocational_inclusive_years').removeClass('blue');
        $('.span_vocational_name').show();
        $('.span_vocational_course').show();
        $('.span_vocational_inclusive_years').show();
        $(".btn-vocational").click(function(){
            $(this).parent().parent().remove();
        });
    });

//Documents
//Memo Table Add
    $('#btnMemoAdd').click(function(){
        var memo_subject = $('#memo_subject').val().trim();
        var memo_date = $('#memo_date').val();
        var memo_option = $('#memo_option').val();
        // var memo_file = $('#memo_file').val();
  
        var dynamicMemo = "<tr><td>"+ memo_subject +"</td><td>"+ memo_date + "</td><td>" + memo_option +  "</td><td> <button class='btn btn-danger btn-memo center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td> </tr>";
        $("#memo_tbody").append(dynamicMemo);
        $("#memo_subject").val(""); 
        $("#memo_date").val(""); 
        $("#memo_option").val("");
        $("#memo_file").val("");
        $('.span_memo_subject').show();
        $('.span_memo_date').show();
        $('.span_memo_option').show();
        $(".btn-memo").click(function(){
            $(this).parent().parent().remove();
        });
    });

//Evaluation Table Add
    $('#btnEvaluationAdd').click(function(){
        var evaluation_reason = $('#evaluation_reason').val().trim();
        var evaluation_date = $('#evaluation_date').val();
        var evaluation_evaluated_by = $('#evaluation_evaluated_by').val().trim();

        var dynamicEvaluation = "<tr><td>"+ evaluation_reason +"</td><td>"+ evaluation_date + "</td><td>" + evaluation_evaluated_by + "</td><td> <button class='btn btn-danger btn-evaluation center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td> </tr>";
        $("#evaluation_tbody").append(dynamicEvaluation);
        $("#evaluation_reason").val(""); 
        $("#evaluation_date").val(""); 
        $("#evaluation_evaluated_by").val("");
        $('.span_evaluation_reason').show();
        $('.span_evaluation_date').show();
        $('.span_evaluation_evaluated_by').show();
        $(".btn-evaluation").click(function(){
            $(this).parent().parent().remove();
        });
    });

//Contract Table Add
    $('#btnContractAdd').click(function(){
        var contracts_type = $('#contracts_type').val().trim();
        var contracts_date = $('#contracts_date').val();

        var dynamicContract = "<tr><td>"+ contracts_type +"</td><td>"+ contracts_date + "</td><td> <button class='btn btn-danger btn-contract center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td> </tr>";
        $("#contracts_tbody").append(dynamicContract);
        $("#contracts_type").val(""); 
        $("#contracts_date").val("");
        $('.span_contracts_type').show();
        $('.span_contracts_date').show();
        $(".btn-contract").click(function(){
            $(this).parent().parent().remove();
        });
    });

//Resignation Table Add
    $('#btnResignationAdd').click(function(){
        var resignation_letter = $('#resignation_letter').val().trim();
        var resignation_date = $('#resignation_date').val();

        var dynamicResignation = "<tr><td>"+ resignation_letter +"</td><td>"+ resignation_date + "</td><td> <button class='btn btn-danger btn-resignation center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td> </tr>";
        $("#resignation_tbody").append(dynamicResignation);
        $("#resignation_letter").val(""); 
        $("#resignation_date").val("");
        $('.span_resignation_letter').show();
        $('.span_resignation_date').show(); 
        $(".btn-resignation").click(function(){
            $(this).parent().parent().remove();
        });
    });

//Termination Table Add
    $('#btnTerminationAdd').click(function(){
        var termination_letter = $('#termination_letter').val().trim();
        var termination_date = $('#termination_date').val();

        var dynamicTermination = "<tr><td>"+ termination_letter +"</td><td>"+ termination_date + "</td><td> <button class='btn btn-danger btn-termination center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td> </tr>";
        $("#termination_tbody").append(dynamicTermination);
        $("#termination_letter").val(""); 
        $("#termination_date").val("");
        $('.span_termination_letter').show();
        $('.span_termination_date').show();  
        $(".btn-termination").click(function(){
            $(this).parent().parent().remove();
        });
    });

//Job History Table Add
    $('#btnJobHistoryAdd').click(function(){
        var job_name = $('#job_name').val().trim();
        var job_position = $('#job_position').val().trim();
        var job_address = $('#job_address').val().trim();
        var job_contact_details = $('#job_contact_details').val().trim();
        var job_inclusive_years = $('#job_inclusive_years').val().trim();

        var dynamicJobHistory = "<tr><td>" + job_name + "</td><td>" + job_position + "</td><td>" + job_address + "</td><td>" + job_contact_details + "</td><td>" + job_inclusive_years + "</td><td> <button class='btn btn-danger btn-job center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td> </tr>";
        $('#job_tbody').append(dynamicJobHistory);
        $('#job_name').val("");
        $('#job_position').val("");
        $('#job_address').val("");
        $('#job_contact_details').val("");
        $('#job_inclusive_years').val("");
        $('.span_job_name').show();
        $('.span_job_position').show();
        $('.span_job_address').show();
        $('.span_job_contact_details').show();
        $('.span_job_inclusive_years').show();
        $('.btn-job').click(function(){
            $(this).parent().parent().remove();
        });
    });
}); 



