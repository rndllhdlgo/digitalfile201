<div class="modal fade" id="usersModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header" style="background-color:#0d1a80">
                <h5 class="modal-title text-white w-100"></h5>
                <button type="button" class="btn-close btn-close-white close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="user_id" id="user_id">
                    <div class="row mb-3">
                        <div class="col">
                            <div class="f-outline">
                                <input type="hidden" id="user_level_orig">
                                <select class="form-select forminput form-control required_field"  id="user_level" placeholder=" " style="background-color:white;" autocomplete="off">
                                    <option value="" disabled selected>SELECT USER LEVEL </option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="ENCODER">ENCODER</option>
                                </select>
                                <label for="user_level" class="formlabel form-label"><i class="fas fa-user-cog"></i> USER LEVEL <span class="span_user_level"></span></label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <div class="f-outline">
                                <input type="hidden" id="name_orig">
                                <input class="forminput form-control required_field" type="text" id="name" name="name" placeholder=" " autocomplete="off" onkeyup="lettersOnly(this)">
                                <label for="name" class="formlabel form-label"><i class="fas fa-address-card"></i> FULL NAME <span class="span_name"></span></label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <div class="f-outline">
                                <input type="hidden" id="email_orig">
                                <input class="forminput form-control required_field" type="email" id="email" name="email" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="emailValidation()">
                                <p id="email_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter Valid Email Address</p>
                                <label for="email" class="formlabel form-label"><i class="fas fa-envelope"></i> EMAIL ADDRESS <span class="span_email"></span></label>
                            </div>
                        </div>
                    </div>
                        <button type="button" class="btn btn-warning mx-1 grow btnDisabled" id="btnUserClear" title="CLEAR"><i class="fas fa-eraser"></i></button>
                        <button type="button" class="btn btn-success mx-1 grow float-end btnRequired btnDisabled" id="btnUserSave" title="SAVE"><i class="fas fa-save"></i></button>
                        <button type="button" class="btn btn-success mx-1 grow float-end btnRequired" id="btnUserUpdate" title="SAVE UPDATE"><i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
</div>
