<div id="company_div" class="tab-pane active" style="border-radius:0px;">
    <br>
    <table class="table table-hover table-bordered table-striped w-100 companyTable" id="companyTable">
        <thead class="text-white" style="background-color:#0d1a80;">
                <tr>
                    <th><i class="fas fa-id-card"></i> COMPANY NAME</th>
                </tr>
        </thead>
            <tbody>
            </tbody>
    </table>

    <div class="modal fade" id="saveCompanyModal" tabindex="-1" aria-labelledby="saveCompanyModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">New Company</h5>
                    <button type="button" class="btn-close btn-close-white close"></button>
                </div>
                <div class="modal-body">
                    <div class="f-outline">
                        <input class="forminput form-control required_field text-capitalize" type="search" id="company_name" placeholder=" " style="background-color:white;" autocomplete="off">
                        <p class="validation"><i class="fas fa-exclamation-triangle"></i> Company Already Exist!</p>
                        <label for="company_name" class="formlabel form-label"><i class="fas fa-address-card"></i> COMPANY NAME</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="companySave"><i class="fas fa-save"></i> <b>SAVE</b></button>
                    <button type="button" class="btn btn-success grow btnCancel"><b>CANCEL</b></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateCompanyModal" tabindex="-1" aria-labelledby="updateCompanyModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Update Company Details</h5>
                    <button type="button" class="btn-close btn-close-white close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="company_id">
                    <div class="f-outline">
                        <input class="forminput form-control required_field text-capitalize" type="search" id="company_name_new" placeholder=" " style="background-color:white;" autocomplete="off">
                        <p class="validation"><i class="fas fa-exclamation-triangle"></i> Company Already Exist!</p>
                        <label for="company_name_new" class="formlabel form-label"><i class="fas fa-address-card"></i> COMPANY NAME </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="companyUpdate"><i class="fas fa-edit"></i> <b>UPDATE</b></button>
                    <button type="button" class="btn btn-success grow btnCancel"><b>CANCEL</b></button>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-design">
</div>