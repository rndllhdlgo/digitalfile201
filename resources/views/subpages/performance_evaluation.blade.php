<div id="performance_evaluation" class="tab-pane fade" style="border-radius:0px;">

    <form method="POST" enctype="multipart/form-data" action="/employees/resignationSave" id="performance_form">
        @csrf
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
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="memo_subject" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="memo_subject" class="formlabel form-label"><span class="span_memo_subject span_all">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="date" id="memo_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="memo_date" class="formlabel form-label"><span class="span_memo_date span_all">(Optional)</span></label>
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
                        <label for="memo_option" class="formlabel form-label"><span class="span_memo_option span_all">(Optional)</span> </label>
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
                        <input class="forminput form-control multiple_field" type="search" id="evaluation_reason" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="evaluation_reason" class="formlabel form-label"><span class="span_evaluation_reason span_all">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="date" id="evaluation_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="evaluation_date" class="formlabel form-label"><span class="span_evaluation_date span_all">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="evaluation_evaluated_by" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="evaluation_evaluated_by" class="formlabel form-label"><span class="span_evaluation_evaluated_by span_all">(Optional)</span></label>
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
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="contracts_type" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="contracts_type" class="formlabel form-label"><span class="span_contracts_type span_all">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="date" id="contracts_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="contracs_date" class="formlabel form-label"><span class="span_contracts_date span_all">(Optional)</span></label>
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
            <th style="width:30%"><i class="fas fa-envelope-open-text"></i> RESIGNATION LETTER</th>
            <th style="width:30%"><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
            <th style="width:30%"><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
            <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
        </thead>
        <tbody>
            <tr>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="resignation_letter" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="resignation_letter" class="formlabel form-label"><span class="span_resignation_letter span_all">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="date" id="resignation_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="resignation_date" class="formlabel form-label"><span class="span_resignation_date span_all">(Optional)</span></label>
                    </div>
                </td>
                <td>
                    <button type="button" id="resignation_button" class="btn btn-primary bp" onclick="$('#resignation_file').click();"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                    <input  type="file"   id="resignation_file"   class=""     onchange="return resignationValidation()" accept="image/*,.pdf" style="display: none;" name="resignation_file">
                    <span id="resignation_text">No file chosen, yet.</span>
                </td>
                <td>
                    <button type="button" id="eye_resignation"     class="btn btn-success grow"    title="VIEW" onclick="$('#preview_resignation').click();" style="margin-left:7%;" disabled><i class="fas fa-eye"></i></button>
                    <button type="button" id="replace_resignation" class="btn btn-primary grow"    title="REPLACE FILE"  disabled><i class="fa-solid fa-file-pen"></i></button>
                    <img src="" alt=""    id="preview_resignation" style="display: none;cursor: zoom-in" data-bs-toggle="modal" data-bs-target="#preview_performance" onclick="performancePreview(this)">
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
                <th style="width:30%"><i class="fas fa-envelope-open-text"></i> TERMINATION LETTER</th>
                <th style="width:30%"><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
                <th style="width:30%"><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                <th style="width:10%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="termination_letter" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="termination_letter" class="formlabel form-label"><span class="span_termination_letter span_all">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-2 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="date" id="termination_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="termination_date" class="formlabel form-label"><span class="span_termination_date span_all">(Optional)</span></label>
                    </div>
                </td>
                <td>
                    <button type="button" id="termination_button" class="btn btn-primary bp" onclick="$('#termination_file').click();"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                    <input  type="file"   id="termination_file"   class=""     onchange="return terminationValidation()" accept="image/*,.pdf" style="display: none;" name="termination_file">
                    <span id="termination_text">No file chosen, yet.</span>
                </td>
                <td>
                    <button type="button" id="eye_termination"     class="btn btn-success grow"    title="VIEW" onclick="$('#preview_termination').click();" style="margin-left:7%;" disabled><i class="fas fa-eye"></i></button>
                    <button type="button" id="replace_termination" class="btn btn-primary grow"    title="REPLACE FILE"  disabled><i class="fa-solid fa-file-pen"></i></button>
                    <img src="" alt=""    id="preview_termination" style="display: none;cursor: zoom-in" data-bs-toggle="modal" data-bs-target="#preview_performance" onclick="performancePreview(this)">
                </td>
            </tr>
        </tbody>
    </table>
    <div class="form-group"><button class="btn btn-success" style="display: none;">Upload the File</button></div> {{-- Button for submit documents --}}
        <hr class="hr-design">
    </form>
        <div class="modal fade" id="preview_performance">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-xxl-down">
                <div class="modal-content" >
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" title="CLOSE"></button>
                    </div>
                    <div class="modal-body">
                        <iframe src="" alt="" id="performance_display" style="width:100%;height:100%;"></iframe>
                    </div>
                </div>
            </div>
        </div>
</div>