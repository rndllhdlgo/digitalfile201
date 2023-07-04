<div id="evaluation" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    <!-- Memo -->
        <h5 class="table-title">MEMO</h5>
        <table id="memoTable" class="table table-bordered table-hover table-striped align-middle">
            <thead class="thead-design">
                <tr>
                    <th style="width:22.5%"> MEMO SUBJECT</th>
                    <th style="width:22.5%"> MEMO DATE</th>
                    <th style="width:22.5%"> MEMO PENALTY</th>
                    <th style="width:22.5%"> MEMO FILE</th>
                    <th style="width:10%"> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field memo_field text-uppercase" type="search" name="memo_subject[]" id="memo_subject" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >
                            <label for="memo_subject" class="formlabel form-label"><span class="span_memo_subject span_all span_memo">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field memo_field" type="date" name="memo_date[]" id="memo_date" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="memo_date" class="formlabel form-label"><span class="span_memo_date span_all span_memo">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <select class="form-select forminput multiple_field memo_field form-control" name="memo_penalty[]" id="memo_penalty" placeholder=" " style="background-color:white;">
                                <option value="" disabled selected>SELECT PENALTY</option>
                                <option value="Verbal">Verbal</option>
                                <option value="Written">Written</option>
                                <option value="1st Offense">1st Offense</option>
                                <option value="2nd Offense">2nd Offense</option>
                                <option value="3rd Offense">3rd Offense</option>
                                <option value="Final">Final</option>
                            </select>
                            <label for="memo_penalty" class="formlabel form-label"><span class="span_memo_penalty span_all span_memo">(Optional)</span> </label>
                        </div>
                    </td>
                    <td>
                        <input type="file" class="form-control form_file memo_field" name="memo_file[]" id="memo_file" onchange="fileValidation('memo_file')" accept=".pdf">
                    </td>
                    <td>
                        <button type="button" class="btn btn-success center grow btnActionDisabled" id="btnAddMemoRow" onclick="addMemoRow();" title="ADD ROW"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped table-hover memo_table_data" id="memo_table_data" style="display: none; margin-top:-36px;">
            <thead>
                <tr>
                    <th style="border:none;"> </th>
                    <th style="border:none;"> </th>
                    <th style="border:none;"> </th>
                    <th style="border:none;"> </th>
                    <th style="border-left: none;"> </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    <br>
    <!-- Evaluation -->
        <h5 class="table-title">EVALUATION</h5>
        <table id="evaluationTable" class="table table-bordered table-hover table-striped align-middle">
            <thead class="thead-design">
                <tr>
                    <th style="width:22.5%"> EVALUATION REASON</th>
                    <th style="width:22.5%"> EVALUATION DATE</th>
                    <th style="width:22.5%"> EVALUATED BY</th>
                    <th style="width:22.5%"> EVALUATION FILE</th>
                    <th style="width:10%"> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field evaluation_field text-uppercase" type="search" name="evaluation_reason[]" id="evaluation_reason" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >
                            <label for="evaluation_reason" class="formlabel form-label"><span class="span_evaluation_reason span_all span_evaluation">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field evaluation_field" type="date" name="evaluation_date[]" id="evaluation_date" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="evaluation_date" class="formlabel form-label"><span class="span_evaluation_date span_all span_evaluation">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field evaluation_field text-uppercase" type="search" name="evaluation_evaluated_by[]" id="evaluation_evaluated_by" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >
                            <label for="evaluation_evaluated_by" class="formlabel form-label"><span class="span_evaluation_evaluated_by span_all span_evaluation">(Optional)</span></label>
                        </div>
                    </td>
                    <td>
                        <input type="file" class="form-control form_file evaluation_field" name="evaluation_file[]" id="evaluation_file" onchange="fileValidation('evaluation_file')" accept=".pdf">
                    </td>
                    <td>
                        <button type="button" class="btn btn-success center grow btnActionDisabled" id="btnAddEvaluationRow" onclick="addEvaluationRow();" title="ADD ROW"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped table-hover evaluation_table_data" id="evaluation_table_data" style="display: none; margin-top:-36px;">
            <thead>
                <tr>
                    <th style="border:none;"> </th>
                    <th style="border:none;"> </th>
                    <th style="border:none;"> </th>
                    <th style="border:none;"> </th>
                    <th style="border-left: none;"> </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    <br>
    <!-- Contracts -->
        <h5 class="table-title">CONTRACT</h5>
        <table id="contractsTable" class="table table-bordered table-hover table-striped align-middle">
            <thead class="thead-design">
                <tr>
                    <th style="width:18%"> CONTRACT TYPE</th>
                    <th style="width:30%"> CONTRACT DATE</th>
                    <th style="width:32%"> CONTRACT FILE</th>
                    <th style="width:10%"> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field contracts_field text-uppercase" type="search" name="contracts_type[]" id="contracts_type" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" >
                            <label for="contracts_type" class="formlabel form-label"><span class="span_contracts_type span_all span_contracts">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <div class="f-outline">
                            <input class="forminput form-control multiple_field contracts_field" type="date" name="contracts_date[]" id="contracts_date" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="contracts_date" class="formlabel form-label"><span class="span_contracts_date span_all span_contracts">(Optional)</span></label>
                        </div>
                    </td>
                    <td class="pb-3 pt-3">
                        <input type="file" class="form-control form_file contracts_field" name="contracts_file[]" id="contracts_file" onchange="fileValidation('contracts_file')" accept=".pdf">
                    </td>
                    <td>
                        <button type="button" class="btn btn-success center grow btnActionDisabled" id="btnAddContractRow" onclick="addContractsRow();" title="ADD ROW"><i class="fas fa-plus"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered table-striped table-hover contracts_table_data" id="contracts_table_data" style="display: none; margin-top:-36px;">
            <thead>
                <tr>
                    <th style="border:none;"> </th>
                    <th style="border:none;"> </th>
                    <th style="border:none;"> </th>
                    <th style="border-left: none;"> </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    <hr class="hr-design">
</div>