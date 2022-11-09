<div id="position_div" class="tab-pane fade" style="border-radius:0px;">

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
                                <th style="width: 200px;">Job Position</th>
                                <th style="width: 450px;">Job Description</th>
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
                                        <input class="forminput form-control required_field text-capitalize" type="search" id="job_description" placeholder=" " style="background-color:white;" autocomplete="off">
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

</div>