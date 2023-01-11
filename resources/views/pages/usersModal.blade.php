<!-- The Modal -->
<div class="modal fade" id="usersModal" style="margin-top:200px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color:#0d1a80">
                <h4 class="modal-title text-white"></h4>
                <button type="button" class="btn-close btn-close-white close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" name="user_id" id="user_id">
                    <div class="row mb-3">
                        <div class="col">
                            <div class="f-outline">
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
                                <input class="forminput form-control required_field" type="text" id="name" name="name" placeholder=" " autocomplete="off" onkeyup="lettersOnly(this)">
                                <label for="name" class="formlabel form-label"><i class="fas fa-address-card"></i> FULL NAME <span class="span_name"></span></label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <div class="f-outline">
                                <input class="forminput form-control required_field" type="email" id="email" name="email" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="emailValidation()">
                                <p id="email_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter Valid Email Address</p>
                                <label for="email" class="formlabel form-label"><i class="fas fa-envelope"></i> EMAIL ADDRESS <span class="span_email"></span></label>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row mb-3">
                        <div class="col">
                            <div class="f-outline">
                                <select class="form-select forminput form-control required_field"  id="status" placeholder=" " style="background-color:white;" autocomplete="off">
                                    <option value="" disabled selected>SELECT STATUS </option>
                                    <option value="ACTIVE">ACTIVE</option>
                                    <option value="INACTIVE">INACTIVE</option>
                                </select>
                                <label for="status" class="formlabel form-label"><i class="fas fa-user-cog"></i> STATUS <span class="span_status"></span></label>
                            </div>
                        </div>
                    </div> --}}
                
                    {{-- <div class="row mb-3 password-container">
                        <div class="col">
                            <div class="f-outline">
                                <input class="forminput form-control required_field" type="password" id="password" name="password" placeholder=" " autocomplete="off" onkeyup="passwordValidation()">
                                <p id="password_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> asd</p>
                                <label for="password" class="formlabel form-label password-text"><i class="fas fa-lock"></i> PASSWORD <span class="span_password"></span></label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 password-container">
                        <div class="col">
                            <div class="f-outline">
                                <input class="forminput form-control required_field" type="password" id="confirm" name="confirm" placeholder=" " autocomplete="off">
                                <label for="confirm" class="formlabel form-label confirm-text"><i class="fas fa-lock"></i> CONFIRM PASSWORD <span class="span_confirm"></span></label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 password-container">
                        <div class="col">
                            <div class="f-outline">
                                <input type="checkbox" id="showPassword" onclick="togglePassword()"> <span class="showPassword-text">Show Password</span> 
                            </div>
                        </div>
                    </div> --}}
                        <button type="button" class="btn btn-warning mx-1 grow btnDisabled" id="btnUserClear" title="CLEAR"><i class="fas fa-eraser"></i></button>
                        <button type="button" class="btn btn-success mx-1 grow float-end btnRequired btnDisabled" id="btnUserSave" title="SAVE"><i class="fas fa-save"></i></button>
                        <button type="button" class="btn btn-success mx-1 grow float-end btnRequired" id="btnUserUpdate" title="SAVE UPDATE"><i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
</div>
