var children_change, college_change, secondary_change, primary_change, training_change, vocational_change, job_history_change;
var memo_change, evaluation_change, contracts_change, resignation_change, termination_change;
var tblChildren, tblCollege, tblSecondary, tblPrimary, tblTraining, tblVocational, tblJob;
var tblMemo, tblEvaluation, tblContracts, tblResignation, tblTermination;
var tblChange;
    $('#childrenAdd').click(function(){
        var child_name = $('#child_name').val().trim();
        var child_birthday = $('#child_birthday').val();
        var child_age = $('#child_age').val();
        var child_gender = $('#child_gender').val();

        var children_table =`<tr class='children_tr'>
                                <td class='td_1 text-uppercase' style='width:22.5%;'>${child_name}</td>
                                <td class='td_2' style='width:22.5%;'>${child_birthday}</td>
                                <td class='td_3' style='width:22.5%;'>${child_age}</td>
                                <td class='td_4' style='width:22.5%;'>${child_gender}</td>
                                <td style='width:10%;'> <button type="button" class='btn btn-danger btn_children center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>
                            <tr>`;
        $('.dataTables_empty').closest('tr').remove();
        $('#children_table_orig_tbody').append(children_table);
        $('#children_table_orig').show();
        children_change = 'CHANGED';
        tblChildren = 'tblChildren';
        tblChange = 'CHANGED_ROW';
        $('#child_name').val("");
        $('#child_birthday').val("");
        $('#child_age').val("");
        $('#child_gender').val("");
    });

    $(document).on('click','.btn_children', function(){
        removeRow('.btn_children');
    });

    $('#collegeAdd').click(function(){
        var college_name = $('#college_name').val();
        var college_degree = $('#college_degree').val();
        var college_inclusive_years_from = $('#college_inclusive_years_from').val();
        var college_inclusive_years_to = $('#college_inclusive_years_to').val();

        var college_table = `<tr class='college_tr'>
                                <td class='td_1 text-uppercase' style='width: 30%;'>${college_name}</td>
                                <td class='td_2 text-uppercase' style='width: 30%;'>${college_degree}</td>
                                <td class='td_3' style='width: 15%;'>${college_inclusive_years_from}</td>
                                <td class='td_4' style='width: 15%;'>${college_inclusive_years_to}</td>
                                <td style='width: 10%;'> <button type="button" class='btn btn-danger btn_college center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>
                            <tr>`;

        $('.dataTables_empty').closest('tr').remove();
        $('#college_table_orig_tbody').append(college_table);
        $('#college_table_orig').show();
        $('#college_table_orig tr:last').remove();
        college_change = 'CHANGED';
        tblCollege = 'tblCollege';
        tblChange = 'CHANGED_ROW';

        $('#college_name').val("");
        $('#college_degree').val("");
        $('#college_inclusive_years_from').val("");
        $('#college_inclusive_years_to').val("");
    });

    $(document).on('click','.btn_college', function(){
        removeRow('.btn_college');
    });

    $('#secondaryAdd').click(function(){
        var secondary_name = $('#secondary_name').val();
        var secondary_address = $('#secondary_address').val();
        var secondary_from = $('#secondary_from').val();
        var secondary_to = $('#secondary_to').val();

        var secondary_table = `<tr class='secondary_tr'>
                                <td class='td_1 text-uppercase' style='width: 30%;'>${secondary_name}</td>
                                <td class='td_2 text-uppercase' style='width: 30%;'>${secondary_address}</td>
                                <td class='td_3' style='width: 15%;'>${secondary_from}</td>
                                <td class='td_4' style='width: 15%;'>${secondary_to}</td>
                                <td style='width: 10%;'> <button type="button" class='btn btn-danger btn_secondary center' title='DELETE'> <i class='fas fa-trash-alt'></i></button></td>
                            <tr>`;

        $('.dataTables_empty').closest('tr').remove();
        $('#secondary_table_orig_tbody').append(secondary_table);
        $('#secondary_table_orig').show();
        $('#secondary_table_orig tr:last').remove();
        secondary_change = 'CHANGED';
        tblSecondary = 'tblSecondary';
        tblChange = 'CHANGED_ROW';

        $('#secondary_name').val("");
        $('#secondary_address').val("");
        $('#secondary_from').val("");
        $('#secondary_to').val("");
    });

    $(document).on('click','.btn_secondary', function(){
        removeRow('.btn_secondary');
    });

    $('#primaryAdd').click(function(){
        var primary_name    = $('#primary_name').val();
        var primary_address = $('#primary_address').val();
        var primary_from    = $('#primary_from').val();
        var primary_to      = $('#primary_to').val();

        var primary_table = `<tr class='primary_tr'>
                                <td class='td_1 text-uppercase' style='width: 30%;'>${primary_name}</td>
                                <td class='td_2 text-uppercase' style='width: 30%;'>${primary_address}</td>
                                <td class='td_3' style='width: 15%;'>${primary_from}</td>
                                <td class='td_4' style='width: 15%;'>${primary_to}</td>
                                <td style='width: 10%;'> <button type="button" class='btn btn-danger btn_primary center' title='DELETE'> <i class='fas fa-trash-alt'></i></button></td>
                            <tr>`;

        $('.dataTables_empty').closest('tr').remove();
        $('#primary_table_orig_tbody').append(primary_table);
        $('#primary_table_orig').show();
        $('#primary_table_orig tr:last').remove();
        primary_change = 'CHANGED';
        tblPrimary = 'tblPrimary';
        tblChange = 'CHANGED_ROW';

        $('#primary_name').val("");
        $('#primary_address').val("");
        $('#primary_from').val("");
        $('#primary_to').val("");
    });

    $(document).on('click','.btn_primary', function(){
        removeRow('.btn_primary');
    });

    $('#trainingAdd').click(function(){
        var training_name = $('#training_name').val();
        var training_title = $('#training_title').val();
        var training_inclusive_years_from = $('#training_inclusive_years_from').val();
        var training_inclusive_years_to = $('#training_inclusive_years_to').val();

        var training_table = `<tr class='training_tr'>
                                    <td class='td_1 text-uppercase' style='width:30%;'>${training_name}</td>
                                    <td class='td_2 text-uppercase' style='width:30%;'>${training_title}</td>
                                    <td class='td_3' style='width:15%;'>${training_inclusive_years_from}</td>
                                    <td class='td_4' style='width:15%;'>${training_inclusive_years_to}</td>
                                    <td style='width:10%;'> <button type="button" class='btn btn-danger btn_training center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>
                                </tr>`;
        $('.dataTables_empty').closest('tr').remove();
        $('#training_table_orig_tbody').append(training_table);
        $('#training_table_orig').show();
        training_change = 'CHANGED';
        tblTraining = 'tblTraining';
        tblChange = 'CHANGED_ROW';

        $('#training_name').val("");
        $('#training_title').val("");
        $('#training_inclusive_years_from').val("");
        $('#training_inclusive_years_to').val("");
    });

    $(document).on('click','.btn_training', function(){
        removeRow('.btn_training');
    });

    $('#vocationalAdd').click(function(){
        var vocational_name = $('#vocational_name').val();
        var vocational_course = $('#vocational_course').val();
        var vocational_inclusive_years_from = $('#vocational_inclusive_years_from').val();
        var vocational_inclusive_years_to = $('#vocational_inclusive_years_to').val();

        var vocational_table = `<tr class='vocational_tr'>
                                    <td class='td_1 text-uppercase' style='width:30%'>${vocational_name}</td>
                                    <td class='td_2 text-uppercase' style='width:30%'>${vocational_course}</td>
                                    <td class='td_3' style='width:15%'>${vocational_inclusive_years_from}</td>
                                    <td class='td_4' style='width:15%'>${vocational_inclusive_years_to}</td>
                                    <td style='width:10%'> <button type="button" class='btn btn-danger btn_vocational center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>
                                </tr>`;
        $('.dataTables_empty').closest('tr').remove();
        $('#vocational_table_orig_tbody').append(vocational_table);
        $('#vocational_table_orig').show();
        vocational_change = 'CHANGED';
        tblVocational = 'tblVocational';
        tblChange = 'CHANGED_ROW';

        $('#vocational_name').val("");
        $('#vocational_course').val("");
        $('#vocational_inclusive_years_from').val("");
        $('#vocational_inclusive_years_to').val("");
    });

    $(document).on('click','.btn_vocational', function(){
        removeRow('.btn_vocational');
    });

    $('#jobHistoryAdd').click(function(){
        var job_company_name = $('#job_company_name').val().trim();
        var job_description = $('#job_description').val().trim();
        var job_position = $('#job_position').val().trim();
        var job_contact_number = $('#job_contact_number').val().trim();
        var job_inclusive_years_from = $('#job_inclusive_years_from').val().trim();
        var job_inclusive_years_to = $('#job_inclusive_years_to').val().trim();

        var job_history_table = `<tr class='job_history_tr'>
                                    <td class='td_1 text-uppercase' style='width:15%;'>${job_company_name}</td>
                                    <td class='td_2 text-uppercase' style='width:15%'>${job_description}</td>
                                    <td class='td_3 text-uppercase' style='width:15%'>${job_position}</td>
                                    <td class='td_4' style='width:15%'>${job_contact_number}</td>
                                    <td class='td_5' style='width:15%'>${job_inclusive_years_from}</td>
                                    <td class='td_6' style='width:15%'>${job_inclusive_years_to}</td>
                                    <td style='width:10%'> <button type="button" class='btn btn-danger btn_job center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td>
                                </tr>`;
        $('.dataTables_empty').closest('tr').remove();
        $('#job_history_table_tbody').append(job_history_table);
        $('#job_history_table_orig').show();
        job_history_change = 'CHANGED';
        tblJob = 'tblJob';
        tblChange = 'CHANGED_ROW';

        $('#job_company_name').val("");
        $('#job_description').val("");
        $('#job_position').val("");
        $('#job_contact_number').val("");
        $('#job_inclusive_years_from').val("");
        $('#job_inclusive_years_to').val("");
    });

    $(document).on('click','.btn_job', function(){
        removeRow('.btn_job');
    });

    $(document).on('click','#btnAddMemoRow', function(){
        memo_change = 'CHANGED';
        tblMemo = 'tblMemo';
        tblChange = 'CHANGED_ROW';

        $('#memo_subject').attr('id','');
        $('#memo_date').attr('id','');
        $('#memo_penalty').attr('id','');
        $('#memo_file').attr('id','');
        $('#memoTable').find('tbody').prepend(`<tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field text-uppercase" type="search" name="memo_subject[]" id="memo_subject" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="memo_subject" class="formlabel form-label">(Optional)</label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="date" name="memo_date[]" id="memo_date" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="memo_date" class="formlabel form-label">(Optional)</label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <select class="form-select forminput multiple_field form-control" name="memo_penalty[]" id="memo_penalty" placeholder=" " style="background-color:white;">
                                <option value="" disabled selected>SELECT PENALTY</option>
                                <option value="Verbal">Verbal</option>
                                <option value="Written">Written</option>
                                <option value="2nd Offense">2nd Offense</option>
                                <option value="3rd Offense">3rd Offense</option>
                                <option value="Final">Final</option>
                            </select>
                            <label for="memo_penalty" class="formlabel form-label">(Optional)</label>
                        </div>
                    </td>
                    <td>
                        <input type="file" class="form-control form_file" id="memo_file" name="memo_file[]" onchange="fileValidation('memo_file')" accept=".pdf">
                    </td>
                    <td>
                        <button type="button" class="btn btn-success center  btnActionDisabled" id="btnAddMemoRow" title="ADD ROW"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>`);
                $('#memoTable').find('tr').eq(2).find('td').eq(4).html('<button type="button" class="btn btn-danger btn_memo center " title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>');
    });

    $(document).on('click','.btn_memo', function(){
        removeRow('.btn_memo');
    });

    $(document).on('click','#btnAddEvaluationRow', function(){
        evaluation_change = 'CHANGED';
        tblEvaluation = 'tblEvaluation';
        tblChange = 'CHANGED_ROW';

        $('#evaluation_reason').attr('id','');
        $('#evaluation_date').attr('id','');
        $('#evaluation_evaluated_by').attr('id','');
        $('#evaluation_file').attr('id','');
        $('#evaluationTable').find('tbody').prepend(`<tr>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field" type="search" name="evaluation_reason[]" id="evaluation_reason" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="evaluation_reason" class="formlabel form-label">(Optional)</label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field" type="date" name="evaluation_date[]" id="evaluation_date" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="evaluation_date" class="formlabel form-label">(Optional)</label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field text-uppercase" type="search" name="evaluation_evaluated_by[]" id="evaluation_evaluated_by" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="evaluation_evaluated_by" class="formlabel form-label">(Optional)</label>
                            </div>
                        </td>
                        <td>
                            <input type="file" class="form-control form_file" name="evaluation_file[]" id="evaluation_file" onchange="fileValidation('evaluation_file')" accept=".pdf">
                        </td>
                        <td>
                            <button type="button" class="btn btn-success center  btnActionDisabled" id="btnAddEvaluationRow" title="ADD ROW"><i class="fas fa-plus"></i></button>
                        </td>
                    </tr>`);
                    $('#evaluationTable').find('tr').eq(2).find('td').eq(4).html('<button type="button" class="btn btn-danger btn_evaluation center " title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>');
    });

    $(document).on('click','.btn_evaluation', function(){
        removeRow('.btn_evaluation');
    });

    $(document).on('click','#btnAddContractRow', function(){
        contracts_change = 'CHANGED';
        tblContracts = 'tblContracts';
        tblChange = 'CHANGED_ROW';

        $('#contracts_type').attr('id','');
        $('#contracts_date').attr('id','');
        $('#contracts_file').attr('id','');
        $('#contractsTable').find('tbody').prepend(`<tr>
                            <td class="pb-3 pt-3">
                                <div class="f-outline">
                                    <input class="forminput form-control multiple_field" type="search" name="contracts_type[]" id="contracts_type" placeholder=" " style="background-color:white;" autocomplete="off">
                                    <label for="contracts_type" class="formlabel form-label">(Optional)</label>
                                </div>
                            </td>
                            <td class="pb-3 pt-3">
                                <div class="f-outline">
                                    <input class="forminput form-control multiple_field" type="date" name="contracts_date[]" id="contracts_date" placeholder=" " style="background-color:white;" autocomplete="off">
                                    <label for="contracts_date" class="formlabel form-label">(Optional)</label>
                                </div>
                            </td>
                            <td class="pb-3 pt-3">
                                <input type="file" class="form-control form_file" name="contracts_file[]" id="contracts_file" onchange="fileValidation('contracts_file')" accept=".pdf">
                            </td>
                            <td>
                                <button type="button" class="btn btn-success center  btnActionDisabled" id="btnAddContractRow" title="ADD ROW"><i class="fas fa-plus"></i></button>
                            </td>
                        </tr>`);
                        $('#contractsTable').find('tr').eq(2).find('td').eq(3).html('<button type="button" class="btn btn-danger btn_contracts center " title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>');
    });

    $(document).on('click','.btn_contracts', function(){
        removeRow('.btn_contracts');
    });

    $(document).on('click','#addResignationRow', function(){
        resignation_change = 'CHANGED';
        tblResignation = 'tblResignation';
        tblChange = 'CHANGED_ROW';

        $('#resignation_reason').attr('id','');
        $('#resignation_date').attr('id','');
        $('#resignation_file').attr('id','');
        $('#resignationTable').find('tbody').prepend(`<tr>
                            <td class="pb-3 pt-3">
                                <div class="f-outline">
                                    <input class="forminput form-control multiple_field text-uppercase" name="resignation_reason[]" type="search" id="resignation_reason" placeholder=" " style="background-color:white;" autocomplete="off">
                                    <label for="resignation_reason" class="formlabel form-label">(Optional)</label>
                                </div>
                            </td>
                            <td class="pb-3 pt-3">
                                <div class="f-outline">
                                    <input class="forminput form-control multiple_field" name="resignation_date[]" type="date" id="resignation_date" placeholder=" " style="background-color:white;" autocomplete="off">
                                    <label for="resignation_date" class="formlabel form-label">(Optional)</label>
                                </div>
                            </td>
                            <td class="pb-3 pt-3">
                                <input type="file" class="form-control form_file" name="resignation_file[]" id="resignation_file" onchange="fileValidation('resignation_file')" accept=".pdf">
                            </td>
                            <td>
                                <button type="button" class="btn btn-success center  btnActionDisabled" id="btnAddResignationRow" title="ADD ROW"><i class="fas fa-plus"></i></button>
                            </td>
                        </tr>`);
        $('#resignationTable').find('tr').eq(2).find('td').eq(3).html('<button type="button" class="btn btn-danger btn_resignation center " title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>');
    });

    $(document).on('click','.btn_resignation',function(){
        removeRow('.btn_resignation');
    });

    $(document).on('click','.btnAddTerminationRow',function(){
        termination_change = 'CHANGED';
        tblTermination = 'tblTermination';
        tblChange = 'CHANGED_ROW';

        $('#termination_reason').attr('id','');
        $('#termination_date').attr('id','');
        $('#termination_file').attr('id','');
        $('#terminationTable').find('tbody').prepend(`<tr>
                            <td class="pb-3 pt-3">
                                <div class="f-outline">
                                    <input class="forminput form-control multiple_field text-uppercase" name="termination_reason[]" type="search" id="termination_reason" placeholder=" " style="background-color:white;" autocomplete="off">
                                    <label for="termination_reason" class="formlabel form-label">(Optional)</label>
                                </div>
                            </td>
                            <td class="pb-3 pt-3">
                                <div class="f-outline">
                                    <input class="forminput form-control multiple_field" name="termination_date[]" type="date" id="termination_date" placeholder=" " style="background-color:white;" autocomplete="off">
                                    <label for="termination_date" class="formlabel form-label">(Optional)</label>
                                </div>
                            </td>
                            <td class="pb-3 pt-3">
                                <input type="file" class="form-control form_file" name="termination_file[]" id="termination_file" onchange="fileValidation('termination_file')" accept=".pdf">
                            </td>
                            <td>
                                <button type="button" class="btn btn-success center  btnActionDisabled" id="btnAddTerminationRow" title="ADD ROW"><i class="fas fa-plus"></i></button>
                            </td>
                        </tr>`);
        $('#terminationTable').find('tr').eq(2).find('td').eq(3).html('<button type="button" class="btn btn-danger btn_termination center " title="DELETE ROW"> <i class="fas fa-trash-alt"></i> </button>');
    });

    $(document).on('click','.btn_termination', function(){
        removeRow('.btn_termination');
    });

    function removeRow(btn){
        Swal.fire({
            title: 'Do you want to delete this row?',
            text: "You won't be able to revert this!",
            icon: 'warning',
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
        }).then((agree) => {
            if(agree.isConfirmed){
                $(btn).parent().parent().remove();
            }
        });
    }