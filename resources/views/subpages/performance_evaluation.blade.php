<div id="performance_evaluation" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    <!-- Memo -->
        <h5 class="table-title">MEMO</h5>
        <table id="memoTable" class="table table-bordered table-hover table-striped align-middle">
            <thead class="thead-educational">
                <tr>
                    <th style="width:22.5%"><i class="fas fa-envelope-open-text"></i> MEMO SUBJECT</th>
                    <th style="width:22.5%"><i class="fas fa-calendar-week"></i> MEMO DATE</th>
                    <th style="width:22.5%"><i class="fas fa-cogs"></i> MEMO PENALTY</th>
                    <th style="width:22.5%"><i class="fas fa-folder"></i> MEMO FILE</th>
                    <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field text-capitalize" type="search" name="memo_subject[]" id="memo_subject" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="memo_subject" class="formlabel form-label"><span class="span_memo_subject span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="date" name="memo_date[]" id="memo_date" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="memo_date" class="formlabel form-label"><span class="span_memo_date span_all">(Optional)</span></label>
                        </div> 
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <select class="form-select forminput multiple_field form-control" name="memo_penalty[]" id="memo_penalty" placeholder=" " style="background-color:white;">
                                <option value="" disabled selected>SELECT PENALTY</option>
                                <option value="Verbal">Verbal</option>
                                <option value="Written">Written</option>
                                <option value="1st Offense">1st Offense</option>
                                <option value="2nd Offense">2nd Offense</option>
                                <option value="3rd Offense">3rd Offense</option>
                                <option value="Final">Final</option>
                            </select>
                            <label for="memo_penalty" class="formlabel form-label"><span class="span_memo_penalty span_all">(Optional)</span> </label>
                        </div>
                    </td>
                    <td>
                        <input type="file" class="form-control form_file" name="memo_file[]" id="memo_file" onchange="memoValidation(memo_file)" accept=".pdf">
                    </td>
                    <td>
                        <button type="button" class="btn btn-success center grow btnActionDisabled" id="btnAddMemoRow" onclick="addMemoRow();" title="ADD ROW"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    <br>
    <!-- Evaluation -->
        <h5 class="table-title">EVALUATION</h5>
        <table id="evaluationTable" class="table table-bordered table-hover table-striped align-middle">
            <thead class="thead-educational">
                <tr>
                    <th style="width:22.5%"><i class="fas fa-envelope-open-text"></i> EVALUATION REASON</th>
                    <th style="width:22.5%"><i class="fas fa-calendar-week"></i> EVALUATION DATE</th>
                    <th style="width:22.5%"><i class="fas fa-address-card"></i> EVALUATED BY</th>
                    <th style="width:22.5%"><i class="fas fa-folder"></i> EVALUATION FILE</th>
                    <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="search" name="evaluation_reason[]" id="evaluation_reason" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="evaluation_reason" class="formlabel form-label"><span class="span_evaluation_reason span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="date" name="evaluation_date[]" id="evaluation_date" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="evaluation_date" class="formlabel form-label"><span class="span_evaluation_date span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field text-capitalize" type="search" name="evaluation_evaluated_by[]" id="evaluation_evaluated_by" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="evaluation_evaluated_by" class="formlabel form-label"><span class="span_evaluation_evaluated_by span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td>
                        <input type="file" class="form-control form_file" name="evaluation_file[]" id="evaluation_file" onchange="evaluationValidation(evaluation_file)" accept=".pdf">
                    </td>
                    <td>
                        <button type="button" class="btn btn-success center grow btnActionDisabled" id="btnAddEvaluationRow" onclick="addEvaluationRow();" title="ADD ROW"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    <br>
    <!-- Contracts -->
        <h5 class="table-title">CONTRACT</h5>
        <table id="contractsTable" class="table table-bordered table-hover table-striped align-middle">
            <thead class="thead-educational">
                <tr>
                    <th style="width:18%"><i class="fas fa-envelope-open-text"></i> CONTRACT TYPE</th>
                    <th style="width:30%"><i class="fas fa-calendar-week"></i> CONTRACT DATE</th>
                    <th style="width:32%"><i class="fas fa-folder"></i> CONTRACT FILE</th>
                    <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="search" name="contracts_type[]" id="contracts_type" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="contracts_type" class="formlabel form-label"><span class="span_contracts_type span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" type="date" name="contracts_date[]" id="contracts_date" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="contracts_date" class="formlabel form-label"><span class="span_contracts_date span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <input type="file" class="form-control form_file" name="contracts_file[]" id="contracts_file" onchange="contractsValidation(contracts_file)" accept=".pdf">
                    </td>
                    <td>
                        <button type="button" class="btn btn-success center grow btnActionDisabled" id="btnAddContractRow" onclick="addContractsRow();" title="ADD ROW"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>

    <div id="resignation_div" style="display: none;">
    <br>
    <!-- Resignation -->
        <h5 class="table-title">RESIGNATION</h5>
        <table id="resignationTable" class="table table-bordered table-hover table-striped align-middle">
            <thead class="thead-educational">
                <tr>
                    <th style="width:18%"><i class="fas fa-envelope-open-text"></i> RESIGNATION REASON</th>
                    <th style="width:30%"><i class="fas fa-calendar-week"></i> RESIGNATION DATE</th>
                    <th style="width:32%"><i class="fas fa-folder"></i> RESIGNATION FILE</th>
                    <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field text-capitalize" name="resignation_reason[]" type="search" id="resignation_reason" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <label for="resignation_reason" class="formlabel form-label"><span class="span_resignation_reason span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field" name="resignation_date[]" type="date" id="resignation_date" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="resignation_date" class="formlabel form-label"><span class="span_resignation_date span_all">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <input type="file" class="form-control form_file" name="resignation_file[]" id="resignation_file" onchange="resignationValidation(resignation_file)" accept=".pdf">
                    </td>
                    <td>
                        <button type="button" class="btn btn-success center grow btnActionDisabled" id="btnAddResignationRow" onclick="addResignationRow();" title="ADD ROW"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="termination_div" style="display: none;">
        <br>
        <!-- Termination -->
        <strong class="table-title">TERMINATION</strong>
            <table id="terminationTable" class="table table-bordered table-hover table-striped align-middle" style="margin-top: 5px;">
                <thead class="thead-educational">
                    <tr>
                        <th style="width:18%"><i class="fas fa-envelope-open-text"></i> TERMINATION REASON</th>
                        <th style="width:30%"><i class="fas fa-calendar-week"></i> TERMINATION DATE</th>
                        <th style="width:32%"><i class="fas fa-folder"></i> TERMINATION FILE</th>
                        <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field text-capitalize" name="termination_reason[]" type="search" id="resignation_reason" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                                <label for="termination_reason" class="formlabel form-label"><span class="span_termination_reason span_all">(Optional)</span></label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field" name="termination_date[]" type="date" id="termination_date" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="termination_date" class="formlabel form-label"><span class="span_termination_date span_all">(Optional)</span></label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <input type="file" class="form-control form_file" name="termination_file[]" id="termination_file" onchange="terminationValidation(termination_file)" accept=".pdf">
                        </td>
                        <td>
                            <button type="button" class="btn btn-success center grow btnActionDisabled" id="btnAddTerminationRow" onclick="addTerminationRow();" title="ADD ROW"><i class="fas fa-plus"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
    <hr class="hr-design">
</div>