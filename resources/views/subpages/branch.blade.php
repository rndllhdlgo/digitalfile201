<div id="branch" class="tab-pane fade" style="border-radius:0px;">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-outline">
                        <input type="text" id="branch_name" class="form-control text-capitalize" autocomplete="off">
                        <label class="form-label" for="branch_name">Branch Name</label>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="branch_id">
                    <div class="form-outline">
                        <input type="text" id="branch_details" class="form-control text-capitalize" autocomplete="off">
                        <label class="form-label" for="branch_details">Branch Name</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="branchUpdate"><i class="fas fa-edit"></i> <b>UPDATE</b></button>
                </div>
            </div>
        </div>
    </div>
</div>