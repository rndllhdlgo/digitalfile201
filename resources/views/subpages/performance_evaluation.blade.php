<div id="performance_evaluation" class="tab-pane fade" style="border-radius:0px;">
    {{-- Memo Table --}}
    <hr class="hr-design">
    <strong class="table-title">MEMOS RECEIVED</strong>
    <table class="table table-striped table-bordered mt-1">
        <thead class="thead-educational">
            <tr>
                <th style="width: 30%"><i class="fas fa-envelope-open-text"></i> SUBJECT</th>
                <th style="width: 30%"><i class="fas fa-calendar-week"></i> DATE</th>
                <th style="width: 30%"><i class="fas fa-cogs"></i> OPTION</th>
                {{-- <th><i class="fas fa-folder-plus"></i> ATTACH FILE</th> --}}
                <th style="width:10%;"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody id="memo_tbody">
            <tr>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="memo_subject" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="memo_subject" class="formlabel form-label"><span class="span_memo_subject">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="date" id="memo_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="memo_date" class="formlabel form-label"><span class="span_memo_date">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <select class="form-select forminput multiple_field form-control"  id="memo_option" placeholder=" " style="background-color:white;">
                            <option value="" disabled selected>SELECT OPTION</option>
                            <option value="Verbal">Verbal</option>
                            <option value="Written">Written</option>
                            <option value="2nd Offense">2nd Offense</option>
                            <option value="3rd Offense">3rd Offense</option>
                            <option value="Final">Final</option>
                        </select>
                        <label for="memo_option" class="formlabel form-label"><span class="span_memo_option">(Optional)</span> </label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <button type="button" id="btnMemoAdd" class="btn btn-success center grow btnDisable" title="ADD"><i class="fas fa-plus"></i></button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <table id="memo_data_table" class="table table-bordered table-hover table-striped" style="display: none;margin-top:-17px;">
        <thead class="thead-educational">
            <tr style="display: none;">
                <th style="width: 30%"><i class="fas fa-envelope-open-text"></i> SUBJECT</th>
                <th style="width: 30%"><i class="fas fa-calendar-week"></i> DATE</th>
                <th style="width: 30%"><i class="fas fa-cogs"></i> OPTION</th>
                <th style="width:10%;"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
        <hr class="hr-design">
        <br>
        <br>

    {{-- Evaluation Table --}}
    <strong class="table-title">EVALUATION</strong>
    <table class="table table-striped table-bordered mt-1">
        <thead class="thead-educational">
            <tr>
                <th style="width:30%"><i class="fas fa-envelope-open-text"></i> REASON FOR EVALUATION</th>
                <th style="width:30%"><i class="fas fa-calendar-week"></i> DATE</th>
                <th style="width:30%"><i class="far fa-address-card"></i> EVALUATED BY</th>
                {{-- <th><i class="fas fa-folder-plus"></i> ATTACH FILE</th> --}}
                <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="search" id="evaluation_reason" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="evaluation_reason" class="formlabel form-label"><span class="span_evaluation_reason">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="date" id="evaluation_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="evaluation_date" class="formlabel form-label"><span class="span_evaluation_date">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="evaluation_evaluated_by" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="evaluation_evaluated_by" class="formlabel form-label"><span class="span_evaluation_evaluated_by">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <button type="button" id="btnEvaluationAdd" class="btn btn-success center grow btnDisable" title="ADD"><i class="fas fa-plus"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    <table id="evaluation_data_table" class="table table-bordered table-hover table-striped" style="display: none;margin-top:-17px;">
        <thead class="thead-educational">
            <tr style="display: none;">
                <th style="width:30%"><i class="fas fa-envelope-open-text"></i> REASON FOR EVALUATION</th>
                <th style="width:30%"><i class="fas fa-calendar-week"></i> DATE</th>
                <th style="width:30%"><i class="far fa-address-card"></i> EVALUATED BY</th>
                <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
        <hr class="hr-design">
        <br>
        <br>

    {{-- Contracts Table --}}
    <strong class="table-title">CONTRACT</strong>
    <table class="table table-striped table-bordered mt-1">
        <thead class="thead-educational">
            <tr>
                <th style="width:45%"><i class="fas fa-envelope-open-text"></i> TYPE OF CONTRACT</th>
                <th style="width:45%"><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
                <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="contracts_type" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="contracts_type" class="formlabel form-label"><span class="span_contracts_type">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="date" id="contracts_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="contracs_date" class="formlabel form-label"><span class="span_contracts_date">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <button type="button" id="btnContractAdd" class="btn btn-success center grow btnDisable" title="ADD"><i class="fas fa-plus"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    <table id="contracts_data_table" class="table table-bordered table-hover table-striped" style="display: none;margin-top:-17px;">
        <thead class="thead-educational">
            <tr style="display: none;">
                <th style="width:45%"><i class="fas fa-envelope-open-text"></i> TYPE OF CONTRACT</th>
                <th style="width:45%"><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
                <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
        <hr class="hr-design">
        <br>
        <br>
        
    {{-- Resignation Table --}}
    <strong class="table-title">RESIGNATION</strong>
    <table class="table table-striped table-bordered mt-1">
        <thead class="thead-educational">
            <th style="width:50%"><i class="fas fa-envelope-open-text"></i> RESIGNATION LETTER</th>
            <th style="width:50%"><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
        </thead>
        <tbody>
            <tr>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="resignation_letter" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="resignation_letter" class="formlabel form-label"><span class="span_resignation_letter">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="date" id="resignation_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="resignation_date" class="formlabel form-label"><span class="span_resignation_date">(Optional)</span></label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
        <hr class="hr-design">
        <br>
        <br>
    {{-- Termination Table --}}
    <strong class="table-title">TERMINATION</strong>
    <table class="table table-striped table-bordered mt-1">
        <thead class="thead-educational">
            <tr>
                <th style="width:50%"><i class="fas fa-envelope-open-text"></i> TERMINATION LETTER</th>
                <th style="width:50%"><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="termination_letter" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="termination_letter" class="formlabel form-label"><span class="span_termination_letter">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="date" id="termination_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="termination_date" class="formlabel form-label"><span class="span_termination_date">(Optional)</span></label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
        <hr class="hr-design">
</div>