<div id="performance_evaluation" class="tab-pane fade shadow p-1 mb-1 bg-body rounded" style="border-radius:0px;">

    {{-- Memo Table --}}
    <hr class="hr-design">
    <strong class="table-title">MEMOS</strong>
    <table class="table table-striped table-bordered mt-1 align-middle">
        <thead class="thead-educational">
            <tr>
                <th style="width:18%"><i class="fas fa-envelope-open-text"></i> SUBJECT</th>
                <th style="width:15%"><i class="fas fa-calendar-week"></i> DATE</th>
                {{-- <th style="width:15%"><i class="fas fa-cogs"></i> OPTION</th> --}}
                <th style="width:15%"><i class="fas fa-cogs"></i> PENALTY</th>
                <th style="width:28%"><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                <th style="width:14%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody id="memo_tbody">
            <tr>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="memo_subject" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="memo_subject" class="formlabel form-label"><span class="span_memo_subject span_all">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="date" id="memo_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="memo_date" class="formlabel form-label"><span class="span_memo_date span_all">(Optional)</span></label>
                    </div>
                </td>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <select class="form-select forminput multiple_field form-control"  id="memo_option" placeholder=" " style="background-color:white;">
                            <option value="" disabled selected>SELECT PENALTY</option>
                            <option value="Verbal">Verbal</option>
                            <option value="Written">Written</option>
                            <option value="2nd Offense">2nd Offense</option>
                            <option value="3rd Offense">3rd Offense</option>
                            <option value="Final">Final</option>
                        </select>
                        <label for="memo_option" class="formlabel form-label"><span class="span_memo_option span_all">(Optional)</span> </label>
                    </div>
                </td>
                <td class="pb-2 pt-2">
                    <button type="button" id="memo_button" class="btn btn-primary bp" onclick="$('#memo_file').click();"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                    <input  type="file"   id="memo_file"   name="memo_file"           onchange="return memoValidation()" accept="image/*,.pdf">
                    <span id="memo_text">No file chosen, yet.</span>
                </td>
                <td>
                    <button type="button" id="btnMemoAdd"   class="btn btn-success grow btnDisabled" title="ADD"><i class="fas fa-plus"></i></button>
                    <button type="button" id="memo_view"    class="btn btn-success grow btnDisabled" title="VIEW FILE" onclick="$('#memo_preview').click();" disabled><i class="fas fa-eye"></i></button>
                    <button type="button" id="memo_replace" class="btn btn-primary grow btnDisabled"    title="REPLACE FILE"  disabled><i class="fa-solid fa-file-pen"></i></button>
                    <img src="" alt=""    id="memo_preview" data-bs-toggle="modal" data-bs-target="#preview_performance" onclick="performancePreview(this)">
                </td>
            </tr>
        </tbody>
    </table>
    {{-- Memo Data Table --}}
    <table id="memo_data_table" class="table table-bordered table-hover table-striped">
        <thead class="thead-educational">
            <tr style="display: none;">
                <th style="width:18%"><i class="fas fa-envelope-open-text"></i> SUBJECT</th>
                <th style="width:15%"><i class="fas fa-calendar-week"></i> DATE</th>
                <th style="width:15%"><i class="fas fa-cogs"></i> OPTION</th>
                <th style="width:28%"><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                <th style="width:14%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
        <hr class="hr-design">
        <br>

    {{-- Evaluation Table --}}
    <hr class="hr-design">
    <strong class="table-title">EVALUATION</strong>
    <table class="table table-striped table-bordered mt-1 align-middle">
        <thead class="thead-educational">
            <tr>
                <th style="width:18%"><i class="fas fa-envelope-open-text"></i> SUBJECT</th>
                <th style="width:15%"><i class="fas fa-calendar-week"></i> DATE</th>
                <th style="width:15%"><i class="fas fa-address-card"></i> EVALUATED BY</th>
                <th style="width:28%"><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                <th style="width:14%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="search" id="evaluation_reason" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="evaluation_reason" class="formlabel form-label"><span class="span_evaluation_reason span_all">(Optional)</span></label>
                    </div>
                </td>
                <td>
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="date" id="evaluation_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="evaluation_date" class="formlabel form-label"><span class="span_evaluation_date span_all">(Optional)</span></label>
                    </div>
                </td>
                <td>
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" type="search" id="evaluation_evaluated_by" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="evaluation_evaluated_by" class="formlabel form-label"><span class="span_evaluation_evaluated_by span_all">(Optional)</span></label>
                    </div>
                </td>
                <td>
                    <button type="button" id="evaluation_button" class="btn btn-primary bp" onclick="$('#evaluation_file').click();"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                    <input  type="file"   name="evaluation_file" id="evaluation_file"   class=""     onchange="return evaluationValidation()" accept="image/*,.pdf">
                    <span id="evaluation_text">No file chosen, yet.</span>
                </td>
                <td>
                    <button type="button" id="btnEvaluationAdd"   class="btn btn-success grow btnDisabled" title="ADD"><i class="fas fa-plus"></i></button>
                    <button type="button" id="evaluation_view"    class="btn btn-success grow btnDisabled" title="VIEW FILE" onclick="$('#evaluation_preview').click();" disabled><i class="fas fa-eye"></i></button>
                    <button type="button" id="evaluation_replace" class="btn btn-primary grow btnDisabled" title="REPLACE FILE"  disabled><i class="fa-solid fa-file-pen"></i></button>
                    <img src="" alt=""    id="evaluation_preview" data-bs-toggle="modal" data-bs-target="#preview_performance" onclick="performancePreview(this)">
                </td>
            </tr>
        </tbody>
    </table>
    {{-- Evaluation Data Table --}}
    <table id="evaluation_data_table" class="table table-bordered table-hover table-striped align-middle">
        <thead class="thead-educational">
            <tr style="display: none;">
                <th style="width:18%"><i class="fas fa-envelope-open-text"></i> REASON FOR EVALUATION</th>
                <th style="width:15%"><i class="fas fa-calendar-week"></i> DATE</th>
                <th style="width:15%"><i class="far fa-address-card"></i> EVALUATED BY</th>
                <th style="width:28%"><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                <th style="width:14%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
        <hr class="hr-design">
        <br>
        
    {{-- Contracts Table --}}
    <hr class="hr-design">
    <strong class="table-title">CONTRACTS</strong>
    <table class="table table-striped table-bordered mt-1 align-middle">
        <thead class="thead-educational">
            <tr>
                <th style="width:18%"><i class="fas fa-envelope-open-text"></i> TYPE OF CONTRACT</th>
                <th style="width:30%"><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
                <th style="width:28%"><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                <th style="width:14%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="search" id="contracts_type" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="contracts_type" class="formlabel form-label"><span class="span_contracts_type span_all">(Optional)</span></label>
                    </div>
                </td>
                <td>
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" type="date" id="contracts_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="contracts_date" class="formlabel form-label"><span class="span_contracts_date span_all">(Optional)</span></label>
                    </div>
                </td>
                <td>
                    <button type="button" id="contracts_button" class="btn btn-primary bp" onclick="$('#contracts_file').click();"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                    <input  type="file"   name="contracts_file" id="contracts_file"   class=""     onchange="return contractsValidation()" accept="image/*,.pdf">
                    <span id="contracts_text">No file chosen, yet.</span>
                </td>
                <td>
                    <button type="button" id="btnContractAdd"    class="btn btn-success grow btnDisabled" title="ADD"><i class="fas fa-plus"></i></button>
                    <button type="button" id="contracts_view"    class="btn btn-success grow btnDisabled" title="VIEW FILE" onclick="$('#contracts_preview').click();" disabled><i class="fas fa-eye"></i></button>
                    <button type="button" id="contracts_replace" class="btn btn-primary grow btnDisabled" title="REPLACE FILE"  disabled><i class="fa-solid fa-file-pen"></i></button>
                    <img src="" alt=""    id="contracts_preview" data-bs-toggle="modal" data-bs-target="#preview_performance" onclick="performancePreview(this)">
                </td>
            </tr>
        </tbody>
    </table>
    {{-- Contracts Data Table --}}
    <table id="contracts_data_table" class="table table-bordered table-hover table-striped align-middle">
        <thead class="thead-educational">
            <tr style="display: none;">
                <th style="width:18%"><i class="fas fa-envelope-open-text"></i> TYPE OF CONTRACT</th>
                <th style="width:30%"><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
                <th style="width:28%"><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                <th style="width:14%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
        <hr class="hr-design">
        <br>

    {{-- Resignation Table --}}
    <hr class="hr-design">
    <strong class="table-title">RESIGNATION</strong>
    <table class="table table-striped table-bordered mt-1 align-middle">
        <thead class="thead-educational">
            <tr>
                <th style="width:18%"><i class="fas fa-envelope-open-text"></i> RESIGNATION REASON</th>
                <th style="width:30%"><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
                <th style="width:28%"><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                <th style="width:14%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" name="resignation_letter" type="search" id="resignation_letter" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="resignation_letter" class="formlabel form-label"><span class="span_resignation_letter span_all">(Optional)</span></label>
                    </div>
                </td>
                <td>
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" name="resignation_date" type="date" id="resignation_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="resignation_date" class="formlabel form-label"><span class="span_resignation_date span_all">(Optional)</span></label>
                    </div>
                </td>
                <td>
                    <button type="button" id="resignation_button" class="btn btn-primary bp" onclick="$('#resignation_file').click();"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                    <input  type="file"   name="resignation_file" id="resignation_file"   class=""     onchange="return resignationValidation()" accept="image/*,.pdf">
                    <span id="resignation_text">No file chosen, yet.</span>                        
                </td>
                <td>
                    <button type="button" id="resignation_view"    class="btn btn-success grow btnDisabled"    title="VIEW FILE" onclick="$('#resignation_preview').click();" disabled><i class="fas fa-eye"></i></button>
                    <button type="button" id="resignation_replace" class="btn btn-primary grow btnDisabled"    title="REPLACE FILE"  disabled><i class="fa-solid fa-file-pen"></i></button>
                    <img src="" alt=""    id="resignation_preview" data-bs-toggle="modal" data-bs-target="#preview_performance" onclick="performancePreview(this)">
                </td>
            </tr>
        </tbody>
    </table>
        <hr class="hr-design">
        <br>

    {{-- Termination Table --}}
    <hr class="hr-design">
    <strong class="table-title">TERMINATION</strong>
    <table class="table table-striped table-bordered mt-1 align-middle">
        <thead class="thead-educational">
            <tr>
                <th style="width:18%"><i class="fas fa-envelope-open-text"></i> TERMINATION REASON</th>
                <th style="width:30%"><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
                <th style="width:28%"><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                <th style="width:14%"><i class="fas fa-user-cog"></i> ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pb-3 pt-3">
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field text-capitalize" name="termination_letter" type="search" id="termination_letter" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="termination_letter" class="formlabel form-label"><span class="span_termination_letter span_all">(Optional)</span></label>
                    </div>
                </td>
                <td>
                    <div class="f-outline">
                        <input class="forminput form-control multiple_field" name="termination_date" type="date" id="termination_date" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="termination_date" class="formlabel form-label"><span class="span_termination_date span_all">(Optional)</span></label>
                    </div>
                </td>
                <td>
                    <button type="button" id="termination_button" class="btn btn-primary bp" onclick="$('#termination_file').click();"><span class="fas fa-upload"></span> CHOOSE FILE</button>
                    <input  type="file"   id="termination_file"   name="termination_file"    onchange="return terminationValidation()" accept="image/*,.pdf">
                    <span id="termination_text">No file chosen, yet.</span>
                </td>
                <td>
                    <button type="button" id="termination_view"     class="btn btn-success grow btnDisabled"    title="VIEW FILE" onclick="$('#termination_preview').click();" disabled><i class="fas fa-eye"></i></button>
                    <button type="button" id="termination_replace"  class="btn btn-primary grow btnDisabled"    title="REPLACE FILE"  disabled><i class="fa-solid fa-file-pen"></i></button>
                    <img src="" alt=""    id="termination_preview"  data-bs-toggle="modal" data-bs-target="#preview_performance" onclick="performancePreview(this)">
                </td>
            </tr>
        </tbody>
    </table>
        <hr class="hr-design">

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