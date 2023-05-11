<div class="modal fade" id="positionModal" tabindex="-1" aria-labelledby="positionModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <input type="hidden" id="position_id">
            <div class="modal-header" style="background-color: #0d1a80;">
                <h5 class="modal-title text-white" id="exampleModalLabel">New Job Position and Description</h5>
                <button type="button" class="btn-close btn-close-white close"></button>
            </div>
            <div class="modal-body">
                <div class="f-outline mb-3">
                    <label for="job_position_name" class="form-label text-black"><strong>JOB POSITION</strong></label>
                    <input class="forminput form-control required_field text-uppercase" type="search" id="job_position_name" placeholder=" " style="background-color:white;" autocomplete="off">
                    <p class="validation">ALREADY EXIST</p>
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
                <button type="button" class="btn btn-success grow btnDisabled" id="positionSave"><i class="fas fa-save"></i> <b>SAVE</b></button>
                <button type="button" class="btn btn-success grow btnDisabled" id="positionUpdate"><i class="fas fa-save"></i> <b>UPDATE</b></button>
                <button type="button" class="btn btn-success grow btnCancel"><b>CANCEL</b></button>
            </div>
        </div>
    </div>
</div>