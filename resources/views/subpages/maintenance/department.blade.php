<div id="department_div" class="tab-pane fade" style="border-radius:0px;">
    <br>
    <table class="table table-striped table-hover table-bordered w-100 departmentTable" id="departmentTable">
        <thead class="text-white" style="background-color:#0d1a80;">
            <tr>
                <th><i class="fas fa-id-card"></i> DEPARTMENT</th>
            </tr>
        </thead>
            <tbody title="CLICK TO EDIT">
            </tbody>
    </table>

    <div class="modal fade" id="saveDepartmentModal" tabindex="-1" aria-labelledby="saveDepartmentModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">New Department</h5>
                    <button type="button" class="btn-close btn-close-white close"></button>
                </div>
                <div class="modal-body">
                    <div class="f-outline">
                        <input class="forminput form-control required_field text-uppercase" type="search" id="department" placeholder=" " style="background-color:white;" autocomplete="off">
                        <p class="validation"><i class="fas fa-exclamation-triangle"></i> Department Already Exist!</p>
                        <label for="department" class="formlabel form-label"><i class="fas fa-address-card"></i> DEPARTMENT</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="departmentSave"><i class="fas fa-save"></i> <b>SAVE</b></button>
                    <button type="button" class="btn btn-success grow btnCancel"><b>CANCEL</b></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateDepartmentModal" tabindex="-1" aria-labelledby="updateDepartmentModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Update Department Details</h5>
                    <button type="button" class="btn-close btn-close-white close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="department_id">
                    <div class="f-outline">
                        <input class="forminput form-control required_field text-uppercase" type="search" id="department_new" placeholder=" " style="background-color:white;" autocomplete="off">
                        <p class="validation"><i class="fas fa-exclamation-triangle"></i> Department Already Exist!</p>
                        <label for="department_new" class="formlabel form-label"><i class="fas fa-address-card"></i> DEPARTMENT </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="departmentUpdate"><i class="fas fa-edit"></i> <b>UPDATE</b></button>
                    <button type="button" class="btn btn-success grow btnCancel"><b>CANCEL</b></button>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-design">
</div>