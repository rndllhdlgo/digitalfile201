var children_change,college_change,training_change,vocational_change,job_history_change;
setInterval(() => {
    if(!$('#child_name').val() || !$('#child_birthday').val() || !$('#child_gender').val()){
        $('#childrenAdd').prop('disabled',true);
    }
    else{
        $('#childrenAdd').prop('disabled',false);
        $('#childrenAdd').css('display','block');
    }

    if(!$('#college_name').val() || !$('#college_degree').val() || !$('#college_inclusive_years_from').val() || !$('#college_inclusive_years_to').val()){
        $('#collegeAdd').prop('disabled',true);
    }
    else{
        $('#collegeAdd').prop('disabled',false);
        $('#collegeAdd').css('display','block');
    }

    if(!$('#training_name').val() || !$('#training_title').val() || !$('#training_inclusive_years_from').val() || !$('#training_inclusive_years_to').val()){
        $('#trainingAdd').prop('disabled',true);
    }
    else{
        $('#trainingAdd').prop('disabled',false);
        $('#trainingAdd').css('display','block');
    }

    if(!$('#vocational_name').val() || !$('#vocational_course').val() || !$('#vocational_inclusive_years_from').val() || !$('#vocational_inclusive_years_to').val()){
        $('#vocationalAdd').prop('disabled',true);
    }
    else{
        $('#vocationalAdd').prop('disabled',false);
        $('#vocationalAdd').css('display','block');
    }

    if(!$('#job_company_name').val() || !$('#job_description').val() || !$('#job_position').val() || !$('#job_contact_number').val() || !$('#job_inclusive_years_from').val() || !$('#job_inclusive_years_to').val()){
        $('#jobHistoryAdd').prop('disabled',true);
    }
    else{
        $('#jobHistoryAdd').prop('disabled',false);
        $('#jobHistoryAdd').css('display','block');
    }

    if(!$('#memo_subject').val() || !$('#memo_date').val() || !$('#memo_penalty').val() || !$('#memo_file').val()){
        $('#btnAddMemoRow').prop('disabled',true);
    }
    else{
        $('#btnAddMemoRow').prop('disabled',false);
    }

    if(!$('#evaluation_reason').val() || !$('#evaluation_date').val() || !$('#evaluation_evaluated_by').val() || !$('#evaluation_file').val()){
        $('#btnAddEvaluationRow').prop('disabled',true);
    }
    else{
        $('#btnAddEvaluationRow').prop('disabled',false);
    }

    if(!$('#contracts_type').val() || !$('#contracts_date').val() || !$('#contracts_file').val()){
        $('#btnAddContractRow').prop('disabled',true);
    }
    else{
        $('#btnAddContractRow').prop('disabled',false);
    }

    if(!$('#resignation_reason').val() || !$('#resignation_date').val() || !$('#resignation_file').val()){
        $('#btnAddResignationRow').prop('disabled',true);
    }
    else{
        $('#btnAddResignationRow').prop('disabled',false);
    }

    if(!$('#termination_reason').val() || !$('#termination_date').val() || !$('#termination_file').val()){
        $('#btnAddTerminationRow').prop('disabled',true);
    }
    else{
        $('#btnAddTerminationRow').prop('disabled',false);
    }
}, 0);

$(document).ready(function(){
    $('#childrenAdd').click(function(){
        var child_name = $('#child_name').val().trim();
        var child_birthday = $('#child_birthday').val();
        var child_age = $('#child_age').val();
        var child_gender = $('#child_gender').val();

        if($('#btnSave').is(":visible")){
            var children_table = "<tr class='children_tr'>"+
                                    "<td class='td_1 text-uppercase' style='width:22.5%;'>" + child_name + "</td>" +
                                    "<td class='td_2' style='width:22.5%;'>" + child_birthday + "</td>" +
                                    "<td class='td_3' style='width:22.5%;'>" + child_age + "</td>" +
                                    "<td class='td_4' style='width:22.5%;'>" + child_gender + "</td>" +
                                    "<td style='width:10%;'> <button class='btn btn-danger btn_children center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>"+
                                "<tr>";
            $('#children_table tbody').append(children_table);
        }
        else{
            var children_table = "<tr class='children_tr'>"+
                                    "<td class='td_1 text-uppercase' style='width:22.5%;'>" + child_name + "</td>" +
                                    "<td class='td_2' style='width:22.5%;'>" + child_birthday + "</td>" +
                                    "<td class='td_3' style='width:22.5%;'>" + child_age + "</td>" +
                                    "<td class='td_4' style='width:22.5%;'>" + child_gender + "</td>" +
                                    "<td style='width:10%;'> <button class='btn btn-danger btn_children center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>"+
                                "<tr>";
            $('.dataTables_empty').closest('tr').remove();
            $('#children_table_orig_tbody').append(children_table);
            $('#children_table_orig').show();
            children_change = 'CHANGED';
            console.log('CHILDREN' + children_change);
        }

        $('#child_name').val("");
        $('#child_birthday').val("");
        $('#child_age').val("");
        $('#child_gender').val("");

        $('.btn_children').click(function(){
            $(this).parent().parent().remove();
        });
    });

    $('#collegeAdd').click(function(){
        var college_name = $('#college_name').val();
        var college_degree = $('#college_degree').val();
        var college_inclusive_years_from = $('#college_inclusive_years_from').val();
        var college_inclusive_years_to = $('#college_inclusive_years_to').val();

        if($('#btnSave').is(":visible")){
            var college_table = "<tr class='college_tr'>"+
                                    "<td class='td_1 text-uppercase' style='width: 30%;'>" + college_name + "</td>" +
                                    "<td class='td_2 text-uppercase' style='width: 30%;'>" + college_degree + "</td>" +
                                    "<td class='td_3' style='width: 15%;'>" + college_inclusive_years_from + "</td>" +
                                    "<td class='td_4' style='width: 15%;'>" + college_inclusive_years_to + "</td>" +
                                    "<td style='width: 10%;'> <button class='btn btn-danger btn_college center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>"+
                                "<tr>";
            $('#college_table tbody').append(college_table);
            $('#college_table tr:last').remove();
        }
        else{
            var college_table = "<tr class='college_tr'>"+
                                    "<td class='td_1 text-uppercase' style='width: 30%;'>" + college_name + "</td>" +
                                    "<td class='td_2 text-uppercase' style='width: 30%;'>" + college_degree + "</td>" +
                                    "<td class='td_3' style='width: 15%;'>" + college_inclusive_years_from + "</td>" +
                                    "<td class='td_4' style='width: 15%;'>" + college_inclusive_years_to + "</td>" +
                                    "<td style='width: 10%;'> <button class='btn btn-danger btn_college center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>"+
                                "<tr>";
            $('.dataTables_empty').closest('tr').remove();
            $('#college_table_orig_tbody').append(college_table);
            $('#college_table_orig').show();
            $('#college_table_orig tr:last').remove();
            college_change = 'CHANGED';
        }

        $('#college_name').val("");
        $('#college_degree').val("");
        $('#college_inclusive_years_from').val("");
        $('#college_inclusive_years_to').val("");

        $('.btn_college').click(function(){
            $(this).parent().parent().remove();
        });
    });

    $('#trainingAdd').click(function(){
        var training_name = $('#training_name').val();
        var training_title = $('#training_title').val();
        var training_inclusive_years_from = $('#training_inclusive_years_from').val();
        var training_inclusive_years_to = $('#training_inclusive_years_to').val();

        if($('#btnSave').is(":visible")){
            var training_table =   "<tr class='training_tr'>" +
                                        "<td class='td_1 text-uppercase' style='width:30%;'>" + training_name + "</td>" +
                                        "<td class='td_2' style='width:30%;'>" + training_title + "</td>" +
                                        "<td class='td_3' style='width:15%;'>" + training_inclusive_years_from + "</td>"+
                                        "<td class='td_4' style='width:15%;'>" + training_inclusive_years_to + "</td>"+
                                        "<td style='width:10%;'> <button class='btn btn-danger btn_training center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>" +
                                    "</tr>";
            $('#training_table tbody').append(training_table);
        }
        else{
            var training_table =   "<tr class='training_tr'>" +
                                        "<td class='td_1 text-uppercase' style='width:30%;'>" + training_name + "</td>" +
                                        "<td class='td_2' style='width:30%;'>" + training_title + "</td>" +
                                        "<td class='td_3' style='width:15%;'>" + training_inclusive_years_from + "</td>"+
                                        "<td class='td_4' style='width:15%;'>" + training_inclusive_years_to + "</td>"+
                                        "<td style='width:10%;'> <button class='btn btn-danger btn_training center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>" +
                                    "</tr>";
            $('.dataTables_empty').closest('tr').remove();
            $('#training_table_orig_tbody').append(training_table);
            $('#training_table_orig').show();
            training_change = 'CHANGED';
        }

        $('#training_name').val("");
        $('#training_title').val("");
        $('#training_inclusive_years_from').val("");
        $('#training_inclusive_years_to').val("");
        $('.btn_training').click(function(){
            $(this).parent().parent().remove();
        });
    });

    $('#vocationalAdd').click(function(){
        var vocational_name = $('#vocational_name').val();
        var vocational_course = $('#vocational_course').val();
        var vocational_inclusive_years_from = $('#vocational_inclusive_years_from').val();
        var vocational_inclusive_years_to = $('#vocational_inclusive_years_to').val();

        if($('#btnSave').is(":visible")){
            var vocational_table = "<tr class='vocational_tr'>"+
                                        "<td class='td_1 text-uppercase' style='width:30%'>" + vocational_name +"</td>" +
                                        "<td class='td_2 text-uppercase' style='width:30%'>" + vocational_course + "</td>" +
                                        "<td class='td_3' style='width:15%'>" + vocational_inclusive_years_from + "</td>" +
                                        "<td class='td_4' style='width:15%'>" + vocational_inclusive_years_to + "</td>" +
                                        "<td style='width:10%'> <button class='btn btn-danger btn_vocational center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>" +
                                    "</tr>";
            $('#vocational_table tbody').append(vocational_table);
        }
        else{
            var vocational_table = "<tr class='vocational_tr'>"+
                                        "<td class='td_1 text-uppercase' style='width:30%'>" + vocational_name +"</td>" +
                                        "<td class='td_2 text-uppercase' style='width:30%'>" + vocational_course + "</td>" +
                                        "<td class='td_3' style='width:15%'>" + vocational_inclusive_years_from + "</td>" +
                                        "<td class='td_4' style='width:15%'>" + vocational_inclusive_years_to + "</td>" +
                                        "<td style='width:10%'> <button class='btn btn-danger btn_vocational center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>" +
                                    "</tr>";
            $('.dataTables_empty').closest('tr').remove();
            $('#vocational_table_orig_tbody').append(vocational_table);
            $('#vocational_table_orig').show();
            vocational_change = 'CHANGED';
            console.log('VOCATIONAL ' + vocational_change);
        }

        $('#vocational_name').val("");
        $('#vocational_course').val("");
        $('#vocational_inclusive_years_from').val("");
        $('#vocational_inclusive_years_to').val("");

        $('.btn_vocational').click(function(){
            $(this).parent().parent().remove();
        });
    });

    $('#jobHistoryAdd').click(function(){
        var job_company_name = $('#job_company_name').val().trim();
        var job_description = $('#job_description').val().trim();
        var job_position = $('#job_position').val().trim();
        var job_contact_number = $('#job_contact_number').val().trim();
        var job_inclusive_years_from = $('#job_inclusive_years_from').val().trim();
        var job_inclusive_years_to = $('#job_inclusive_years_to').val().trim();

        if($('#btnSave').is(":visible")){
            var job_history_table = "<tr class='job_history_tr'>"+
                                        "<td class='td_1 text-uppercase' style='width:15%;'>" + job_company_name + "</td>" +
                                        "<td class='td_2' style='width:15%'>" + job_description + "</td>" +
                                        "<td class='td_3' style='width:15%'>" + job_position + "</td>" +
                                        "<td class='td_4' style='width:15%'>" + job_contact_number + "</td>" +
                                        "<td class='td_5' style='width:15%'>" + job_inclusive_years_from + "</td>" +
                                        "<td class='td_6' style='width:15%'>" + job_inclusive_years_to + "</td>" +
                                        "<td style='width:10%'> <button class='btn btn-danger btn_job center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>" +
                                    "</tr>";
            $('#job_history_table').append(job_history_table);
        }
        else{
            var job_history_table = "<tr class='job_history_tr'>"+
                                        "<td class='td_1 text-uppercase' style='width:15%;'>" + job_company_name + "</td>" +
                                        "<td class='td_2 text-uppercase' style='width:15%'>" + job_description + "</td>" +
                                        "<td class='td_3 text-uppercase' style='width:15%'>" + job_position + "</td>" +
                                        "<td class='td_4' style='width:15%'>" + job_contact_number + "</td>" +
                                        "<td class='td_5' style='width:15%'>" + job_inclusive_years_from + "</td>" +
                                        "<td class='td_6' style='width:15%'>" + job_inclusive_years_to + "</td>" +
                                        "<td style='width:10%'> <button class='btn btn-danger btn_job center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>" +
                                    "</tr>";
            $('.dataTables_empty').closest('tr').remove();
            $('#job_history_table_tbody').append(job_history_table);
            $('#job_history_table_orig').show();
            job_history_change = 'CHANGED';
        }

        $('#job_company_name').val("");
        $('#job_description').val("");
        $('#job_position').val("");
        $('#job_contact_number').val("");
        $('#job_inclusive_years_from').val("");
        $('#job_inclusive_years_to').val("");
        $('.btn_job').click(function(){
            $(this).parent().parent().remove();
        });
    });
});

    function addMemoRow(){
        memo_change = 'CHANGED';
        console.log(memo_change);

        $('#memo_subject').attr('id','');
        $('#memo_date').attr('id','');
        $('#memo_penalty').attr('id','');
        $('#memo_file').attr('id','');
        $('#memoTable').find('tbody').prepend('<tr>'+
                    '<td class="pb-3 pt-3">'+
                        '<div class="f-outline">' +
                            '<input class="forminput form-control multiple_field text-uppercase" type="search" name="memo_subject[]" id="memo_subject" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">'+
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
                        '<button type="button" class="btn btn-success center grow btnActionDisabled" id="btnAddMemoRow" onclick="addMemoRow();" title="ADD ROW"><i class="fas fa-plus"></i></button>'+
                    '</td>'+
                '</tr>');
                $('#memoTable').find('tr').eq(2).find('td').eq(4).html('<button class="btn btn-danger btn_memo center grow" title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>');

        $(".btn_memo").click(function(){
            $(this).parent().parent().remove();
        });
    }

    function addEvaluationRow(){
        $('#evaluation_reason').attr('id','');
        $('#evaluation_date').attr('id','');
        $('#evaluation_evaluated_by').attr('id','');
        $('#evaluation_file').attr('id','');
        $('#evaluationTable').find('tbody').prepend('<tr>'+
                            '<td class="pb-3 pt-3">'+
                                '<div class="f-outline">' +
                                    '<input class="forminput form-control multiple_field" type="search" name="evaluation_reason[]" id="evaluation_reason" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >'+
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
                                    '<input class="forminput form-control multiple_field text-uppercase" type="search" name="evaluation_evaluated_by[]" id="evaluation_evaluated_by" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >'+
                                    '<label for="evaluation_evaluated_by" class="formlabel form-label"><span class="span_evaluation_evaluated_by span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+
                            '<td>'+
                                '<input  type="file" class="form-control form_file" name="evaluation_file[]" id="evaluation_file" onchange="evaluationValidation(evaluation_file)" accept=".pdf">'+
                            '</td>'+
                            '<td>'+
                                '<button type="button" class="btn btn-success center grow btnActionDisabled" id="btnAddEvaluationRow" onclick="addEvaluationRow();" title="ADD ROW"><i class="fas fa-plus"></i></button>'+
                            '</td>'+
                        '</tr>');
                    $('#evaluationTable').find('tr').eq(2).find('td').eq(4).html('<button class="btn btn-danger btn_evaluation center grow" title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>');

        $(".btn_evaluation").click(function(){
            $(this).parent().parent().remove();
        });
    }

    function addContractsRow(){
        $('#contracts_type').attr('id','');
        $('#contracts_date').attr('id','');
        $('#contracts_file').attr('id','');
        $('#contractsTable').find('tbody').prepend('<tr>'+
                            '<td class="pb-3 pt-3">'+
                                '<div class="f-outline">'+
                                    '<input class="forminput form-control multiple_field" type="search" name="contracts_type[]" id="contracts_type" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >'+
                                    '<label for="contracts_type" class="formlabel form-label"><span class="span_contracts_type span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+
                            '<td class="pb-3 pt-3">'+
                                '<div class="f-outline">'+
                                    '<input class="forminput form-control multiple_field" type="date" name="contracts_date[]" id="contracts_date" placeholder=" " style="background-color:white;" autocomplete="off">'+
                                    '<label for="contracts_date" class="formlabel form-label"><span class="span_contracts_date span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+
                            '<td class="pb-3 pt-3">'+
                                '<input  type="file" class="form-control form_file" name="contracts_file[]" id="contracts_file" onchange="contractsValidation(contracts_file)" accept=".pdf">'+
                            '</td>'+
                            '<td>'+
                                '<button type="button" class="btn btn-success center grow btnActionDisabled" id="btnAddContractRow" onclick="addContractsRow();" title="ADD ROW"><i class="fas fa-plus"></i></button>'+
                            '</td>'+
                        '</tr>');
                        $('#contractsTable').find('tr').eq(2).find('td').eq(3).html('<button class="btn btn-danger btn_evaluation center grow" title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>');

        $(".btn_evaluation").click(function(){
            $(this).parent().parent().remove();
        });
    }

    function addResignationRow(){
        $('#resignation_reason').attr('id','');
        $('#resignation_date').attr('id','');
        $('#resignation_file').attr('id','');
        $('#resignationTable').find('tbody').prepend('<tr>'+
                            '<td class="pb-3 pt-3">'+
                                '<div class="f-outline">' +
                                    '<input class="forminput form-control multiple_field text-uppercase" name="resignation_reason[]" type="search" id="resignation_reason" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >'+
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
                                '<button type="button" class="btn btn-success center grow btnActionDisabled" id="btnAddResignationRow" onclick="addResignationRow();" title="ADD ROW"><i class="fas fa-plus"></i></button>'+
                            '</td>'+
                        '</tr>');
                        $('#resignationTable').find('tr').eq(2).find('td').eq(3).html('<button class="btn btn-danger btn_resignation center grow" title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>');
        $(".btn_resignation").click(function(){
            $(this).parent().parent().remove();
        });
    }

    function addTerminationRow(){
        $('#termination_reason').attr('id','');
        $('#termination_date').attr('id','');
        $('#termination_file').attr('id','');
        $('#terminationTable').find('tbody').prepend('<tr>'+
                            '<td class="pb-3 pt-3">'+
                                '<div class="f-outline">' +
                                    '<input class="forminput form-control multiple_field text-uppercase" name="termination_reason[]" type="search" id="termination_reason" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >'+
                                    '<label for="termination_reason" class="formlabel form-label"><span class="span_termination_reason span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+
                            '<td class="pb-3 pt-3">'+
                                '<div class="f-outline">' +
                                    '<input class="forminput form-control multiple_field" name="termination_date[]" type="date" id="termination_date" placeholder=" " style="background-color:white;" autocomplete="off">'+
                                    '<label for="termination_date" class="formlabel form-label"><span class="span_termination_date span_all">(Optional)</span></label>'+
                                '</div>'+
                            '</td>'+
                            '<td class="pb-3 pt-3">'+
                                '<input  type="file" class="form-control form_file" name="termination_file[]" id="termination_file" onchange="terminationValidation(termination_file)" accept=".pdf">'+
                            '</td>'+
                            '<td>'+
                                '<button type="button" class="btn btn-success center grow btnActionDisabled" id="btnAddTerminationRow" onclick="addTerminationRow();" title="ADD ROW"><i class="fas fa-plus"></i></button>'+
                            '</td>'+
                        '</tr>');
                        $('#terminationTable').find('tr').eq(2).find('td').eq(3).html('<button class="btn btn-danger btn_termination center grow" title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>');
        $(".btn_termination").click(function(){
            $(this).parent().parent().remove();
        });
    }