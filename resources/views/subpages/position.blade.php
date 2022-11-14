<div id="position_div" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    <div class="jobPositionTable"> <!-- To Divide Two Tables -->
        <table class="table table-striped table-hover table-bordered w-100 jobPositionTable" id="jobPositionTable">
            <thead class="text-white" style="background-color:#0d1a80;">
                    <tr>
                        {{-- <th><i class="fas fa-id-card"></i> JOB POSITION ID</th> --}}
                        <th><i class="fas fa-id-card"></i> JOB POSITION NAME</th>
                    </tr>
            </thead>
                <tbody>
                </tbody>
        </table>
    </div> 
    <hr class="hr-design">
    <div class="jobDescriptionTable">
        <table class="table table-striped table-hover table-bordered w-100 jobDescriptionTable" id="jobDescriptionTable">
            <thead class="text-white" style="background-color:#0d1a80;">
                    <tr>
                        {{-- <th><i class="fas fa-id-card"></i> JOB POSITION ID</th> --}}
                        <th><i class="fas fa-id-card"></i> JOB DESCRIPTION</th>
                    </tr>
            </thead>
                <tbody>
                </tbody>
        </table>
    <hr class="hr-design">
    </div>
    
    <div class="modal fade" id="savePositionModal" tabindex="-1" aria-labelledby="savePositionModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">New Job Position</h5>
                    <button type="button" class="btn-close btn-close-white close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="job_position_id" id="job_position_id">
                    <table class="table table-striped table-bordered table-hover mt-1 align-middle">
                        <thead class="thead-educational">
                            <tr>
                                <th style="width: 200px;">JOB POSITION</th>
                                <th style="width: 450px;">JOB DESCRIPTION</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pb-3 pt-3">
                                    <div class="f-outline">
                                        <input class="forminput form-control required_field text-capitalize" type="search" id="job_position_name" placeholder=" " style="background-color:white;" autocomplete="off">
                                        <label for="job_position_name" class="formlabel form-label"><i class="fas fa-address-card"></i> JOB POSITION</label>
                                    </div>
                                </td>
                                <td class="pb-3 pt-3">
                                    <div class="f-outline">
                                        <input class="forminput form-control required_field" type="search" id="job_description" placeholder=" " style="background-color:white;" autocomplete="off">
                                        <label for="job_description" class="formlabel form-label"><i class="fas fa-address-card"></i> JOB DESCRIPTION</label>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" id="btnPositionAdd" class="btn btn-success center grow btnActionDisabled" title="ADD SECTION"><i class="fas fa-plus"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- Job Description Data Table --}}
                    <table id="job_description_data_table" class="table table-hover table-bordered table-striped">
                        <thead class="thead-educational">
                            <tr style="display: none;">
                                <th>Job Position</th>
                                <th>Job Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="jobPositionSave"><i class="fas fa-save"></i> <b>SAVE</b></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateJobPositionModal" tabindex="-1" aria-labelledby="updateJobPositionModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Update Job Position Details</h5>
                    <button type="button" class="btn-close btn-close-white close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="job_position_name_id">
                    <div class="f-outline">
                        <input class="forminput form-control required_field text-capitalize" type="search" id="job_details_position_name" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="job_details_position_name" class="formlabel form-label"><i class="fas fa-address-card"></i> JOB POSITION NAME </label>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-success grow btnDisabled" id="addJobDescription"><i class="fas fa-plus"></i> <b>ADD JOB DESCRIPTION</b></button> --}}
                    <button type="button" class="btn btn-success grow btnDisabled" id="jobPositionUpdate"><i class="fas fa-edit"></i> <b>UPDATE</b></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateJobDescriptionModal" tabindex="-1" aria-labelledby="updateJobDescriptionModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Update Job Description Details</h5>
                    <button type="button" class="btn-close btn-close-white close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="job_description_id" id="job_description_id">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="search" id="job_details_description" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="job_details_description" class="formlabel form-label"><i class="fas fa-address-card"></i> JOB DESCRIPTION </label>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-success grow btnDisabled" id="addJobDescription"><i class="fas fa-plus"></i> <b>ADD JOB DESCRIPTION</b></button> --}}
                    <button type="button" class="btn btn-success grow btnDisabled" id="jobDescriptionUpdate"><i class="fas fa-edit"></i> <b>UPDATE</b></button>
                </div>
            </div>
        </div>
    </div>

</div>