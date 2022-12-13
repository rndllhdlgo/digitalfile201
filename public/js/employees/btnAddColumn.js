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

    if(!$('#job_name').val() || !$('#job_position').val() || !$('#job_address').val() || !$('#job_contact_details').val() || !$('#job_inclusive_years').val()){
        $('#btnJobHistoryAdd').prop('disabled',true);
    }
    else{
        $('#btnJobHistoryAdd').prop('disabled',false);
        $('#btnJobHistoryAdd').css('display','block');
    }
    
    // if(!$('#memo_subject').val() || !$('#memo_date').val() || !$('#memo_penalty').val() || !$('#memo_file').val()){
    //     $('#btnAddMemoRow').prop('disabled',true);
    // }
    // else{
    //     $('#btnAddMemoRow').prop('disabled',false);
    // }

    // if(!$('#evaluation_reason').val() || !$('#evaluation_date').val() || !$('#evaluation_evaluated_by').val() || !$('#evaluation_file').val()){
    //     $('#btnAddEvaluationRow').prop('disabled',true);
    // }
    // else{
    //     $('#btnAddEvaluationRow').prop('disabled',false);
    // }

    // if(!$('#contracts_type').val() || !$('#contracts_date').val() || !$('#contracts_file').val()){
    //     $('#btnAddContractRow').prop('disabled',true);
    // }
    // else{
    //     $('#btnAddContractRow').prop('disabled',false);
    // }

    // if(!$('#resignation_reason').val() || !$('#resignation_date').val() || !$('#resignation_file').val()){
    //     $('#btnAddResignationRow').prop('disabled',true);
    // }
    // else{
    //     $('#btnAddResignationRow').prop('disabled',false);
    // }

    // if(!$('#termination_reason').val() || !$('#termination_date').val() || !$('#termination_file').val()){
    //     $('#btnAddTerminationRow').prop('disabled',true);
    // }
    // else{
    //     $('#btnAddTerminationRow').prop('disabled',false);
    // }
}


$(document).ready(function(){
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
});

    function addMemoRow(){
    $('#memoTable').append('<tr>'+
                            '<td class="pb-3 pt-3">'+ 
                                '<div class="f-outline">' + 
                                    '<input class="forminput form-control multiple_field text-capitalize" type="search" name="memo_subject[]" id="memo_subject" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">'+
                                    '<label for="memo_subject" class="formlabel form-label"><span class="span_memo_subject span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+
                            '<td class="pb-3 pt-3">'+
                                '<div class="f-outline">'+
                                    '<input class="forminput form-control multiple_field" type="date" name="memo_date[]" id="memo_date" placeholder=" " style="background-color:white;" autocomplete="off">'+
                                    '<label for="memo_date" class="formlabel form-label"><span class="span_memo_date span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+

                            '<td class="pb-3 pt-3">'+
                                '<div class="f-outline">'+
                                    '<select class="form-select forminput multiple_field form-control" name="memo_penalty[]" id="memo_penalty" placeholder=" " style="background-color:white;">'+
                                        '<option value="" disabled selected>SELECT PENALTY</option>'+
                                        '<option value="Verbal">Verbal</option>'+
                                        '<option value="Written">Written</option>'+
                                        '<option value="2nd Offense">2nd Offense</option>'+
                                        '<option value="3rd Offense">3rd Offense</option>'+
                                        '<option value="Final">Final</option>'+
                                    '</select>'+
                                    '<label for="memo_penalty" class="formlabel form-label"><span class="span_memo_penalty span_all">(Optional)</span> </label>'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<input type="file" class="form-control form_file" id="memo_file" name="memo_file[]" onchange="memoValidation(memo_file)" accept=".pdf">'+
                            '</td>'+
                            '<td>'+
                                '<button class="btn btn-danger btn-memo center grow" title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>'+
                            '</td>'+
                        '</tr>');
        $(".btn-memo").click(function(){
            $(this).parent().parent().remove();
        });
    }

    function addEvaluationRow(){
    $('#evaluationTable').append('<tr>'+
                            '<td class="pb-3 pt-3">'+ 
                                '<div class="f-outline">' + 
                                    '<input class="forminput form-control multiple_field" type="search" name="evaluation_reason[]" id="evaluation_reason" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">'+
                                    '<label for="evaluation_reason" class="formlabel form-label"><span class="span_evaluation_reason span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+
                            '<td class="pb-3 pt-3">'+ 
                                '<div class="f-outline">' + 
                                    '<input class="forminput form-control multiple_field" type="date" name="evaluation_date[]" id="evaluation_date" placeholder=" " style="background-color:white;" autocomplete="off">'+
                                    '<label for="evaluation_date" class="formlabel form-label"><span class="span_evaluation_date span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+
                            '<td class="pb-3 pt-3">'+ 
                                '<div class="f-outline">' + 
                                    '<input class="forminput form-control multiple_field text-capitalize" type="search" name="evaluation_evaluated_by[]" id="evaluation_evaluated_by" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">'+
                                    '<label for="evaluation_evaluated_by" class="formlabel form-label"><span class="span_evaluation_evaluated_by span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<input  type="file" class="form-control form_file" name="evaluation_file[]" id="evaluation_file" onchange="evaluationValidation(evaluation_file)" accept=".pdf">'+
                            '</td>'+
                            '<td>'+
                                '<button class="btn btn-danger btn-evaluation center grow" title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>'+
                            '</td>'+
                        '</tr>');
        $(".btn-evaluation").click(function(){
            $(this).parent().parent().remove();
        });
    }

    function addContractsRow(){
    $('#contractsTable').append('<tr>'+
                            '<td class="pb-3 pt-3">'+ 
                                '<div class="f-outline">' + 
                                    '<input class="forminput form-control multiple_field" type="search" name="contracts_type[]" id="contracts_type" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">'+
                                    '<label for="contracts_type" class="formlabel form-label"><span class="span_contracts_type span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+
                            '<td class="pb-3 pt-3">'+ 
                                '<div class="f-outline">' + 
                                    '<input class="forminput form-control multiple_field" type="date" name="contracts_date[]" id="contracts_date" placeholder=" " style="background-color:white;" autocomplete="off">'+
                                    '<label for="contracts_date" class="formlabel form-label"><span class="span_contracts_date span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+
                            '<td class="pb-3 pt-3">'+
                                '<input  type="file" class="form-control form_file" name="contracts_file[]" id="contracts_file" onchange="contractsValidation(contracts_file)" accept=".pdf">'+
                            '</td>'+
                            '<td>'+ 
                                '<button class="btn btn-danger btn-contracts center grow" title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>'+
                            '</td>'+
                        '</tr>');
        $(".btn-contracts").click(function(){
            $(this).parent().parent().remove();
        });
    }

    function addResignationRow(){
    $('#resignationTable').append('<tr>'+
                            '<td class="pb-3 pt-3">'+ 
                                '<div class="f-outline">' + 
                                    '<input class="forminput form-control multiple_field text-capitalize" name="resignation_reason[]" type="search" id="resignation_letter" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">'+
                                    '<label for="resignation_reason" class="formlabel form-label"><span class="span_resignation_reason span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+
                            '<td class="pb-3 pt-3">'+ 
                                '<div class="f-outline">' + 
                                    '<input class="forminput form-control multiple_field" name="resignation_date[]" type="date" id="resignation_date" placeholder=" " style="background-color:white;" autocomplete="off">'+
                                    '<label for="resignation_date" class="formlabel form-label"><span class="span_resignation_date span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+
                            '<td class="pb-3 pt-3">'+
                                '<input  type="file" class="form-control form_file" name="resignation_file[]" id="resignation_file" onchange="resignationValidation(resignation_file)" accept=".pdf">'+
                            '</td>'+
                            '<td>'+
                                '<button class="btn btn-danger btn-resignation center grow" title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>'+
                            '</td>'+
                        '</tr>');
        $(".btn-resignation").click(function(){
            $(this).parent().parent().remove();
        });
    }

    function addTerminationRow(){
    $('#terminationTable').append('<tr>'+
                            '<td class="pb-3 pt-3">'+ 
                                '<div class="f-outline">' + 
                                    '<input class="forminput form-control multiple_field text-capitalize" name="termination_reason[]" type="search" id="resignation_letter" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">'+
                                    '<label for="termination_reason" class="formlabel form-label"><span class="span_termination_reason span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+
                            '<td class="pb-3 pt-3">'+ 
                                '<div class="f-outline">' + 
                                    '<input class="forminput form-control multiple_field" name="termination_date[]" type="date" id="resignation_date" placeholder=" " style="background-color:white;" autocomplete="off">'+
                                    '<label for="termination_date" class="formlabel form-label"><span class="span_termination_date span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+
                            '<td class="pb-3 pt-3">'+
                                '<input  type="file" class="form-control form_file" name="termination_file[]" id="termination_file" onchange="terminationValidation(termination_file)" accept=".pdf">'+
                            '</td>'+
                            '<td>'+
                                '<button class="btn btn-danger btn-termination center grow" title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>'+
                            '</td>'+
                        '</tr>');
        $(".btn-termination").click(function(){
            $(this).parent().parent().remove();
        });
    }    