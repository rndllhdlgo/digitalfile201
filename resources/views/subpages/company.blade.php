<div id="company_div" class="tab-pane active" style="border-radius:0px;">
    <br>
    <table class="table table-striped table-hover table-bordered w-100 companyTable" id="companyTable">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-outline">
                        <input type="text" id="company" class="form-control text-capitalize" autocomplete="off">
                        <label class="form-label" for="company">Company Name</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="companySave"><i class="fas fa-save"></i> <b>SAVE</b></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateCompanyModal" tabindex="-1" aria-labelledby="updateCompanyModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Update Company Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="company_id">
                    <div class="form-outline">
                        <input type="text" id="company_details" class="form-control text-capitalize" autocomplete="off">
                        <label class="form-label" for="company_details">Company Name</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="companyUpdate"><i class="fas fa-edit"></i> <b>UPDATE</b></button>
                </div>
            </div>
        </div>
    </div>

</div>