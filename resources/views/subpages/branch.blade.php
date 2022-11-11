<div id="branch_div" class="tab-pane fade" style="border-radius:0px;">
    <br>
    <table class="table table-striped table-hover table-bordered w-100 branchTable" id="branchTable">
        <thead class="text-white" style="background-color:#0d1a80;">
                <tr>
                    <th><i class="fas fa-id-card"></i> BRANCH NAME</th>
                </tr>
        </thead>
            <tbody>
            </tbody>
    </table>

    <div class="modal fade" id="saveBranchModal" tabindex="-1" aria-labelledby="saveBranchModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">New Branch</h5>
                    <button type="button" class="btn-close btn-close-white close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="f-outline">
                        <input class="forminput form-control required_field text-capitalize" type="search" id="branch_name" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="branch_name" class="formlabel form-label"><i class="fa-solid fa-building"></i> BRANCH NAME </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="branchSave"><i class="fas fa-save"></i> <b>SAVE</b></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateBranchModal" tabindex="-1" aria-labelledby="updateBranchModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Update Branch Details</h5>
                    <button type="button" class="btn-close btn-close-white close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="branch_id">
                    <div class="f-outline">
                        <input class="forminput form-control required_field text-capitalize" type="search" id="branch_name_new" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="branch_name_new" class="formlabel form-label"><i class="fas fa-address-card"></i> BRANCH NAME </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="branchUpdate"><i class="fas fa-edit"></i> <b>UPDATE</b></button>
                </div>
            </div>
        </div>
    </div>
</div>