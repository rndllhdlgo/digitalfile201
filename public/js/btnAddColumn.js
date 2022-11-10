//This JS page is to add column on multiple field
//Verify that the user has filled out all field on multiple field.
setInterval(checkforblankMultiple,0);
function checkforblankMultiple(){
    if(!$('#child_name').val() || !$('#child_birthday').val() || !$('#child_gender').val()){
        $('#btnSoloParentAdd').prop('disabled',true);
    }
    else{
        $('#btnSoloParentAdd').prop('disabled',false);
        $('#btnSoloParentAdd').css('display','block');
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

    if(!$('#memo_subject').val() || !$('#memo_date').val() || !$('#memo_penalty').val() || !$('#memo_file').val()){
        $('#btnMemoAdd').prop('disabled',true);
    }
    else{
        $('#btnMemoAdd').prop('disabled',false);
    }

    if(!$('#evaluation_reason').val() || !$('#evaluation_date').val() || !$('#evaluation_evaluated_by').val() || !$('#evaluation_file').val()){
        $('#btnEvaluationAdd').prop('disabled',true);
    }
    else{
        $('#btnEvaluationAdd').prop('disabled',false);
    }

    if(!$('#contracts_type').val() || !$('#contracts_date').val() || !$('#contracts_file').val()){
        $('#btnContractAdd').prop('disabled',true);
    }
    else{
        $('#btnContractAdd').prop('disabled',false);
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


$(document).ready(function(){

    //Personal Information Tab
    //Solo Parent Table Add
    $('#btnSoloParentAdd').click(function(){
        $('#solo_parent_data_table').show();
        var child_name = $('#child_name').val().trim();
        var child_birthday = $('#child_birthday').val();
        var child_age = $('#child_age').val();
        var child_gender = $('#child_gender').val();

        var dynamicSingleParent =   "<tr>"+
                                        "<td class='text-capitalize text-center' style='width:22.5%'>"+ child_name +"</td>" +
                                        "<td class='text-center' style='width:22.5%'>" + child_birthday + "</td>" + 
                                        "<td class='text-center' style='width:22.5%'>" + child_age + "</td>" + 
                                        "<td class='text-capitalize text-center' style='width:22.5%'>" + child_gender + "</td>" + 
                                        "<td style='width:10%'> <button class='btn btn-danger btn-solo-parent center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>"+
                                    "</tr>";
        $('#solo_parent_data_table tbody').append(dynamicSingleParent);
        $('#child_name').val("");
        $('#child_birthday').val("");
        $('#child_age').val("");
        $('#child_gender').val("");
        $('.btn-solo-parent').click(function(){
            $(this).parent().parent().remove();
            if($("#solo_parent_data_table tbody").children().children().length == 0){
                $("#solo_parent_data_table").hide();
            }
        });
    });

    //Educational and Training Background Tab
    //College Table Add
    $('#btnCollegeAdd').click(function(){
        $('#college_data_table').show();
        var college_name = $('#college_name').val().trim();
        var college_degree = $('#college_degree').val().trim();
        var college_inclusive_years = $('#college_inclusive_years').val().trim();

        var dynamicCollege =    "<tr>"+
                                    "<td style='width:33.5%' class='text-capitalize text-center pb-3 pt-3'>" + college_name + "</td>" + 
                                    "<td style='width:33%' class='text-capitalize text-center pb-3 pt-3'>" + college_degree + "</td>" + 
                                    "<td style='width:23.5%' class='text-center pb-3 pt-3'>" + college_inclusive_years + "</td>" +
                                    "<td style='width:10%'> <button class='btn btn-danger btn-college center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>" + 
                                "</tr>";
        $('#college_data_table tbody').append(dynamicCollege);
        $('#college_name').val("");
        $('#college_degree').val("");
        $('#college_inclusive_years').val("");
        $('.btn-college').click(function(){
            $(this).parent().parent().remove();  
        });
    });

    //Training Table Add
    $('#btnTrainingAdd').click(function(){
        $('#training_data_table').show();
        var training_name = $('#training_name').val().trim();
        var training_title = $('#training_title').val().trim();
        var training_inclusive_years = $('#training_inclusive_years').val().trim();

        var dynamicTraining =   "<tr>" +
                                    "<td style='width:33.5%' class='text-capitalize text-center pb-3 pt-3'>" + training_name + "</td>" + 
                                    "<td style='width:33%' class='text-capitalize text-center pb-3 pt-3'>" + training_title + "</td>" + 
                                    "<td style='width:23.5%' class='text-center pb-3 pt-3'>" + training_inclusive_years + "</td>"+ 
                                    "<td style='width:10%'> <button class='btn btn-danger btn-training center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>" + 
                                "</tr>";
        $('#training_data_table tbody').append(dynamicTraining);
        $('#training_name').val("");
        $('#training_title').val("");
        $('#training_inclusive_years').val("");
        $('.btn-training').click(function(){
            $(this).parent().parent().remove();
        });
    });

    //Vocational Table Add
    $('#btnVocationalAdd').click(function(){
        $('#vocational_data_table').show();
        var vocational_name = $('#vocational_name').val().trim();
        var vocational_course = $('#vocational_course').val().trim();
        var vocational_inclusive_years = $('#vocational_inclusive_years').val().trim();

        var dynamicVocational = "<tr>"+
                                    "<td style='width:33.5%' class='text-capitalize text-center pb-3 pt-3'>" + vocational_name +"</td>" + 
                                    "<td style='width:33%' class='text-capitalize text-center pb-3 pt-3'>" + vocational_course + "</td>" + 
                                    "<td style='width:23.5%' class='text-center pb-3 pt-3'>" + vocational_inclusive_years + "</td>" + 
                                    "<td style='width:10%'> <button class='btn btn-danger btn-vocational center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>" + 
                                "</tr>";
        $('#vocational_data_table tbody').append(dynamicVocational);
        $('#vocational_name').val("");
        $('#vocational_course').val("");
        $('#vocational_inclusive_years').val("");
        $('.btn-vocational').click(function(){
            $(this).parent().parent().remove();
        });
    });

    //Job History Tab
    //Job History Table Add
    $('#btnJobHistoryAdd').click(function(){
        $('#job_data_table').show();
        var job_name = $('#job_name').val().trim();
        var job_position = $('#job_position').val().trim();
        var job_address = $('#job_address').val().trim();
        var job_contact_details = $('#job_contact_details').val().trim();
        var job_inclusive_years = $('#job_inclusive_years').val().trim();

        var dynamicJobHistory = "<tr>"+
                                    "<td style='width:18%' class='text-capitalize text-center pb-3 pt-3'>" + job_name + "</td>" + 
                                    "<td style='width:18%' class='text-capitalize text-center pb-3 pt-3'>" + job_position + "</td>" +
                                    "<td style='width:18%' class='text-capitalize text-center pb-3 pt-3'>" + job_address + "</td>" + 
                                    "<td style='width:18%' class='text-center pb-3 pt-3'>" + job_contact_details + "</td>" + 
                                    "<td style='width:18%' class='text-center pb-3 pt-3'>" + job_inclusive_years + "</td>" +
                                    "<td style='width:10%'> <button class='btn btn-danger btn-job center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>" + 
                                "</tr>";
        $('#job_data_table').append(dynamicJobHistory);
        $('#job_name').val("");
        $('#job_position').val("");
        $('#job_address').val("");
        $('#job_contact_details').val("");
        $('#job_inclusive_years').val("");
        $('.btn-job').click(function(){
            $(this).parent().parent().remove();
        });
    });

    //Performance Evaluation Tab
    //Memo Table Add
    $('#btnMemoAdd').click(function(){
        $('#memo_data_table').show();
        var memo_subject = $('#memo_subject').val().trim();
        var memo_date = $('#memo_date').val();
        var memo_penalty = $('#memo_penalty').val();
        var memo_file = document.getElementById('memo_file').files[0].name;//Remove Fake Path

        var dynamicMemo =   "<tr>" + 
                                "<td style='width:18%' class='text-capitalize text-center pb-3 pt-3'>"+ memo_subject +"</td>"+
                                "<td style='width:15%' class='text-center pb-3 pt-3'>" + memo_date + "</td>"+
                                "<td style='width:15%' class='text-center pb-3 pt-3'>" + memo_penalty + "</td>"+
                                "<td style='width:32%' class='text-center pb-3 pt-3'> <b>File Name: </b>" + memo_file + "</td>"+
                                "<td style='width:10%'><button class='btn btn-danger btn-memo center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>" + 
                            "</tr>";
        $("#memo_data_table").append(dynamicMemo);
        $("#memo_subject").val(""); 
        $("#memo_date").val(""); 
        $("#memo_penalty").val("");
        $('#memo_file').val('');
        $('#memo_preview').attr('src','');//change the image source
        $('#memo_preview').hide();
        $('#memo_text').html('No file chosen');
        $('#memo_button').show();
        $('#memo_view').prop('disabled',true);
        $('#memo_replace').prop('disabled',true);
        $(".btn-memo").click(function(){
            $(this).parent().parent().remove();
        });
    });

    //Evaluation Table Add
    $('#btnEvaluationAdd').click(function(){
        $('#evaluation_data_table').show();
        var evaluation_reason = $('#evaluation_reason').val().trim();
        var evaluation_date = $('#evaluation_date').val();
        var evaluation_evaluated_by = $('#evaluation_evaluated_by').val().trim();
        var evaluation_file = document.getElementById('evaluation_file').files[0].name;

        var dynamicEvaluation = "<tr>" + 
                                    "<td style='width:18%' class='text-capitalize text-center pb-3 pt-3'>"+ evaluation_reason +"</td>"+
                                    "<td style='width:15%' class='text-center pb-3 pt-3'>" + evaluation_date + "</td>"+
                                    "<td style='width:15%' class='text-capitalize text-center pb-3 pt-3'>" + evaluation_evaluated_by + "</td>" +
                                    "<td style='width:32%' class='text-center pb-3 pt-3'> <b>File Name: </b>" + evaluation_file + "</td>" +
                                    "<td style='width:10%'> <button class='btn btn-danger btn-evaluation center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>" + 
                                "</tr>";
        $("#evaluation_data_table").append(dynamicEvaluation);
        $("#evaluation_reason").val(""); 
        $("#evaluation_date").val(""); 
        $("#evaluation_evaluated_by").val("");
        $('#evaluation_file').val('');
        $('#evaluation_preview').attr('src','');//change the image source
        $('#evaluation_preview').hide();
        $('#evaluation_text').html('No file chosen');
        $('#evaluation_button').show();
        $('#evaluation_view').prop('disabled',true);
        $('#evaluation_replace').prop('disabled',true);
        $(".btn-evaluation").click(function(){
            $(this).parent().parent().remove();
        });
    });

    //Contract Table Add
    $('#btnContractAdd').click(function(){
        $('#contracts_data_table').show();
        var contracts_type = $('#contracts_type').val().trim();
        var contracts_date = $('#contracts_date').val();
        var contracts_file = document.getElementById('contracts_file').files[0].name;

        var dynamicContract =   "<tr>" + 
                                    "<td style='width:18%' class='text-capitalize text-center pb-3 pt-3'>"+ contracts_type +"</td>" + 
                                    "<td style='width:30%' class='text-center pb-3 pt-3'>" + contracts_date + "</td>" + 
                                    "<td style='width:32%' class='text-center pb-3 pt-3'><b>File Name: </b>" + contracts_file + "</td>" + 
                                    "<td style='width:10%'> <button class='btn btn-danger btn-contract center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>" + 
                                "</tr>";
        $("#contracts_data_table").append(dynamicContract);
        $("#contracts_type").val(""); 
        $("#contracts_date").val("");
        $('#contracts_file').val('');
        $('#contracts_preview').attr('src','');//change the image source
        $('#contracts_preview').hide();
        $('#contracts_text').html('No file chosen');
        $('#contracts_button').show();
        $('#contracts_view').prop('disabled',true);
        $('#contracts_replace').prop('disabled',true);
        $(".btn-contract").click(function(){
            $(this).parent().parent().remove();
        });
    });
});




