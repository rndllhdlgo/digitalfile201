<div id="job_history" class="tab-pane fade" style="border-radius:0px;"><br>
    <div id="job_container">
        <div class="row">
            <div class="col-2">
                <strong style="font-size:16px;">JOB HISTORY</strong>
                <h6>Start from the latest</h6>
            </div>
            <div class="col">
                <button type="button" name="addJobRow" id="addJobRow" class="btn btn-success grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
            </div>
        </div>
    </div>
        {{-- Job History Table --}}
        <table class="table table-striped table-bordered" id="job_table" style="display:none;">
            <thead class="text-white">
                <tr>
                    <th><i class="far fa-address-card"></i> NAME OF COMPANY</th>
                    <th><i class="fas fa-briefcase"></i> JOB POSITION</th>
                    <th><i class="fas fa-map-marker-alt"></i> COMPANY ADDRESS</th>
                    <th><i class="fas fa-phone-square-alt"></i> CONTACT DETAILS</th>
                    <th><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    <th><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody class="job_body">
            </tbody>
        </table>
        {{-- Data Table of Job History --}}
        <div id="job_data_table_div" style="display: none;">
            <div class="row">
                <div class="col mb-2">
                    <strong style="font-size:16px;">JOB HISTORY</strong>
                </div>
            </div>

            <table class="table table-striped table-bordered w-100" id="job_data_table">
                <thead class="text-white">
                    <tr>
                        <th><i class="far fa-address-card"></i> NAME OF COMPANY</th>
                        <th><i class="fas fa-briefcase"></i> JOB POSITION</th>
                        <th><i class="fas fa-map-marker-alt"></i> COMPANY ADDRESS</th>
                        <th><i class="fas fa-phone-square-alt"></i> CONTACT DETAILS</th>
                        <th><i class="fas fa-calendar-week"></i> INCLUSIVE YEARS</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <hr>
<!--
        <div id="memos_container">
            <div class="row mb-1">
                <div class="col-2">
                    <strong style="font-size:16px;">MEMOS RECEIVED</strong>
                </div>
                <div class="col">
                    <button type="button" name="addMemoRow" id="addMemoRow" class="btn btn-success grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
                </div>
            </div>
        </div>
        {{-- Memos Received Table --}}
        <table class="table table-striped table-bordered" id="memos_table" style="display:none;">
            <thead class="text-white">
                <tr>
                    <th><i class="fas fa-envelope-open-text"></i> SUBJECT</th>
                    <th><i class="fas fa-calendar-week"></i> DATE</th>
                    <th><i class="fas fa-cogs"></i> OPTION</th>
                    <th><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                    <th><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody class="memos_body">
            </tbody>
        </table>
        {{-- Data Table of Memos --}}
        <div id="memos_data_table_div" style="display: none;">
            <div class="row">
                <div class="col mb-2">
                    <strong style="font-size:16px;">MEMOS RECEIVED</strong>
                </div>
            </div>

            <table class="table table-striped table-bordered w-100" id="memos_data_table">
                <thead class="text-white">
                    <tr>
                        <th><i class="fas fa-envelope-open-text"></i> SUBJECT</th>
                        <th><i class="fas fa-calendar-week"></i> DATE</th>
                        <th><i class="fas fa-cogs"></i> OPTION</th>
                        <th><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <hr>

        <div id="evaluation_container">
            <div class="row mb-1">
                <div class="col-2">
                    <strong style="font-size:16px;">EVALUATION</strong>
                </div>
                <div class="col">
                    <button type="button" name="addEvaluationRow" id="addEvaluationRow" class="btn btn-success grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
                </div>
            </div>
        </div>
        {{-- Evaluation Table --}}
        <table class="table table-striped table-bordered" id="evaluation_table" style="display:none;">
            <thead class="text-white">
                <tr>
                    <th><i class="fas fa-envelope-open-text"></i> REASON FOR EVALUATION</th>
                    <th><i class="fas fa-calendar-week"></i> DATE</th>
                    <th><i class="far fa-address-card"></i> EVALUATED BY</th>
                    <th><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                    <th><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody class="evaluation_body">
            </tbody>
        </table>
        {{-- Data Table of Evaluation --}}
        <div id="evaluation_data_table_div" style="display: none;">
            <div class="row">
                <div class="col mb-2">
                    <strong style="font-size:16px;">EVALUATION</strong>
                </div>
            </div>

            <table class="table table-striped table-bordered w-100" id="evaluation_data_table">
                <thead class="text-white">
                    <tr>
                        <th><i class="fas fa-envelope-open-text"></i> REASON FOR EVALUATION</th>
                        <th><i class="fas fa-calendar-week"></i> DATE</th>
                        <th><i class="far fa-address-card"></i> EVALUATED BY</th>
                        <th><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <hr>
    

        <div id="contracts_container">
            <div class="row mb-1">
                <div class="col-2">
                    <strong style="font-size:16px;">CONTRACTS</strong>
                </div>
                <div class="col">
                    <button type="button" name="addContractsRow" id="addContractsRow" class="btn btn-success grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
                </div>
            </div>
        </div>
        {{-- Contracts Table --}}
        <table class="table table-striped table-bordered" id="contracts_table" style="display: none;">
            <thead class="text-white">
                <tr>
                    <th><i class="fas fa-envelope-open-text"></i> TYPE OF CONTRACT</th>
                    <th><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
                    <th><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                    <th><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody class="contracts_body">
            </tbody>
        </table>
        {{-- Data Table of Contracts --}}
        <div id="contracts_data_table_div" style="display: none;">
            <div class="row">
                <div class="col mb-2">
                    <strong style="font-size:16px;">CONTRACTS</strong>
                </div>
            </div>

            <table class="table table-striped table-bordered w-100" id="contracts_data_table">
                <thead class="text-white">
                    <tr>
                        <th><i class="fas fa-envelope-open-text"></i> TYPE OF CONTRACT</th>
                        <th><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
                        <th><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <hr>
        
        <div id="resignation_container">
            <div class="row mb-1">
                <div class="col-2">
                    <strong style="font-size:16px;">RESIGNATION LETTER</strong>
                </div>
                <div class="col">
                    <button type="button" name="addResignationRow" id="addResignationRow" class="btn btn-success grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
                </div>
            </div>
        </div>
        {{-- Resignation Table --}}
        <table class="table table-striped table-bordered" id="resignation_table" style="display: none;">
            <thead class="text-white">
                <tr>
                    <th><i class="fas fa-envelope-open-text"></i> RESIGNATION LETTER</th>
                    <th><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
                    <th><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                    <th><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody class="resignation_body">
            </tbody>
        </table>
        {{-- Data Table of Resignation --}}
        <div id="resignation_data_table_div" style="display: none;">
            <div class="row">
                <div class="col mb-2">
                    <strong style="font-size:16px;">RESIGNATION LETTER</strong>
                </div>
            </div>

            <table class="table table-striped table-bordered w-100" id="resignation_data_table">
                <thead class="text-white">
                    <tr>
                        <th><i class="fas fa-envelope-open-text"></i> RESIGNATION LETTER</th>
                        <th><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
                        <th><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <hr>
-->
        <div id="termination_container">
            <div class="row mb-1">
                <div class="col-2">
                    <strong style="font-size:16px;">TERMINATION LETTER</strong>
                </div>
                <div class="col">
                    <button type="button" name="addTerminationRow" id="addTerminationRow" class="btn btn-success grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
                </div>
            </div>
        </div>
        {{-- Termination Table --}}
        <table class="table table-striped table-bordered" id="termination_table" style="display:none;">
            <thead class="text-white">
                <tr>
                    <th><i class="fas fa-envelope-open-text"></i> TERMINATION LETTER</th>
                    <th><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
                    <th><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                    <th><i class="fas fa-user-cog"></i> ACTION</th>
                </tr>
            </thead>
            <tbody class="termination_body">
            </tbody>
        </table>
        {{-- Data Table of Termination --}}
        <div id="termination_data_table_div" style="display:none;">
            <div class="row mb-1">
                <div class="col-2">
                    <strong style="font-size: 16px;">TERMINATION LETTER</strong>
                </div>
            </div>
            <table class="table table-striped table-bordered w-100" id="termination_data_table">
                <thead class="text-white">
                    <tr>
                        <th><i class="fas fa-envelope-open-text"></i> TERMINATION LETTER</th>
                        <th><i class="fas fa-calendar-week"></i> DATE ISSUED</th>
                        <th><i class="fas fa-folder-plus"></i> ATTACH FILE</th>
                    </tr>
                </thead>
            </table>
        </div>
        <hr>
        <br>
</div>{{-- End of Job History Div --}}