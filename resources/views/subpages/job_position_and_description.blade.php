<div id="job_position_and_description_div" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">

    <table class="table table-striped table-hover table-bordered w-100 jobPositionAndDescriptionTable" id="jobPositionAndDescriptionTable">
        <thead class="text-white" style="background-color:#0d1a80;">
                <tr>
                    <th><i class="fas fa-id-card"></i> JOB POSITION</th>
                    <th><i class="fas fa-id-card"></i> JOB DESCRIPTION</th>
                    <th><i class="fas fa-id-card"></i> JOB REQUIREMENTS/SKILLS</th>
                </tr>
        </thead>
            <tbody>
            </tbody>
    </table>

    <div class="modal fade" id="saveJobPositionAndDescriptionModal" tabindex="-1" aria-labelledby="saveJobPositionAndDescriptionModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">New Job Position and Description</h5>
                    <button type="button" class="btn-close btn-close-white close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                        <label for="job_position_name" class="form-label text-black"><strong>JOB POSITION</strong></label>
                    <div class="f-outline mb-3">
                        <input class="forminput form-control required_field text-capitalize" type="search" id="job_position_name" placeholder=" " style="background-color:white;" autocomplete="off">
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="job_description" class="form-label text-black"><strong>JOB DESCRIPTION</strong></label>
                            <textarea class="form-control border-primary required_field separated textarea_job_description" id="job_description" rows="3" style="resize: none; white-space: pre-line" placeholder="(Press 'ENTER' to separate multiple inputs.)"></textarea>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="job_requirements" class="form-label text-black"><strong>JOB REQUIREMENTS/SKILLS</strong></label>
                            <textarea class="form-control border-primary required_field separated textarea_job_requirements" id="job_requirements" rows="3" style="resize: none; white-space: pre-line" placeholder="(Press 'ENTER' to separate multiple inputs.)"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="jobPositionAndDescriptionSave"><i class="fas fa-save"></i> <b>SAVE</b></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateJobPositionAndDescriptionModal" tabindex="-1" aria-labelledby="updateJobPositionAndDescriptionModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Update Job Position and Description</h5>
                    <button type="button" class="btn-close btn-close-white close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="job_position_and_description_id">
                        <label for="job_position_name_new" class="form-label text-black"><strong>JOB POSITION</strong></label>
                    <div class="f-outline mb-3">
                        <input class="forminput form-control required_field text-capitalize" type="search" id="job_position_name_new" placeholder=" " style="background-color:white;" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="job_description_new" class="form-label text-black"><strong>JOB DESCRIPTION</strong></label>
                        <textarea class="form-control border-primary required_field separated textarea_job_description_new" id="job_description_new" rows="3" style="resize: none;" placeholder="(Press 'ENTER' to separate multiple inputs.)"></textarea>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="job_requirements_new" class="form-label text-black"><strong>JOB REQUIREMENTS/SKILLS</strong></label>
                            <textarea class="form-control border-primary required_field separated textarea_job_requirements_new" id="job_requirements_new" rows="3" style="resize: none; white-space: pre-line" placeholder="(Press 'ENTER' to separate multiple inputs.)"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success grow btnDisabled" id="jobPositionAndDescriptionUpdate"><i class="fas fa-save"></i> <b>UPDATE</b></button>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-design">
</div>