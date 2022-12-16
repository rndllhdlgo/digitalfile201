<div id="supervisor_div" class="tab-pane fade" style="border-radius:0px;">
    <br>
    <table class="table table-striped table-hover table-bordered w-100 supervisorTable" id="supervisorTable">
        <thead class="text-white" style="background-color:#0d1a80;">
                <tr>
                    <th><i class="fas fa-id-card"></i> SUPERVISOR NAME</th>
                </tr>
        </thead>
            <tbody>
            </tbody>
    </table>

    <div class="modal fade" id="saveSupervisorModal" tabindex="-1" aria-labelledby="saveSupervisorModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">New Supervisor</h5>
                    <button type="button" class="btn-close btn-close-white close"></button>
                </div>
                <div class="modal-body">
                    <div class="f-outline">
                        <input class="forminput form-control required_field text-capitalize" type="search" id="supervisor_name" placeholder=" " style="background-color:white;" autocomplete="off">
                        <p class="validation"><i class="fas fa-exclamation-triangle"></i> Supervisor Already Exist!</p>
                        <label for="supervisor_name" class="formlabel form-label"><i class="fas fa-address-card"></i> SUPERVISOR NAME </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="supervisorSave"><i class="fas fa-save"></i> <b>SAVE</b></button>
                    <button type="button" class="btn btn-success grow btnCancel"><b>CANCEL</b></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateSupervisorModal" tabindex="-1" aria-labelledby="updateSupervisorModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Update Supervisor Details</h5>
                    <button type="button" class="btn-close btn-close-white close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="supervisor_id">
                    <div class="f-outline">
                        <input class="forminput form-control required_field text-capitalize" type="search" id="supervisor_name_new" placeholder=" " style="background-color:white;" autocomplete="off">
                        <p class="validation"><i class="fas fa-exclamation-triangle"></i> Supervisor Already Exist!</p>
                        <label for="supervisor_name_new" class="formlabel form-label"><i class="fas fa-address-card"></i> SUPERVISOR NAME </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="supervisorUpdate"><i class="fas fa-edit"></i> <b>UPDATE</b></button>
                    <button type="button" class="btn btn-success grow btnCancel"><b>CANCEL</b></button>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-design">
</div>