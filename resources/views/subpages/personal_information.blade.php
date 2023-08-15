<div id="personal_info" class="tab-pane active" style="border-radius:0px;margin-bottom:-20px;">
    <hr class="hr-design">

    <div class="row mb-3">
        <div class="column1">
            <input type="hidden" id="filename">
            <input type="hidden" id="filename_delete">

            <i class="fas fa-times float-end" id="image_close" style="zoom:150%; cursor:pointer; display:none; margin-top:3px; margin-bottom:3px; " title="REPLACE IMAGE"></i>

            <div class="text-center mt-4">
                <i class="fa fa-user-circle fa-5x" id="image_user" aria-hidden="true"></i>
            </div>

            <div class="text-center mt-3">
                <button type="button" id="image_button" class="btn btn-primary bp"><span class="fas fa-upload"></span> UPLOAD IMAGE</button>
                <input type="file" name="employee_image" id="employee_image" class="required_field hiddenFile" accept=".jpg,.jpeg,.png,.gif" onchange="ImageValidation(employee_image)">
            </div>

            <div class="text-center mt-3" id="image_instruction">
                <span>File Size: Maximum (10MB)</span><br>
                <span>File Extensions: .jpg, .jpeg, .png</span>
            </div>

            <div>
                <center>
                    <img src="" id="image_preview" alt="">
                </center>
            </div>

            <div class="top-container center_div" style="display:none; margin-top:1px !important;">
                <button type="button" class="btn btn-danger" id="image_close_trash" title="REMOVE IMAGE"><i class="fas fa-trash"></i></button>
                <button type="button" class="btn btn-danger" id="image_crop_reset" title="RESET IMAGE"><i class="fas fa-sync-alt"></i></button>
                <button type="button" class="btn btn-primary" id="image_zoom_in" title="ZOOM IN"><i class="fas fa-search-plus"></i></button>
                <button type="button" class="btn btn-primary" id="image_zoom_out" title="ZOOM OUT"><i class="fas fa-search-minus"></i></button>
                <button type="button" class="btn btn-success" id="image_crop" title="CROP IMAGE"><i class="fas fa-crop"></i></button>
            </div>
        </div>

        <div class="column2">
            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control text-uppercase required_field name_validation" type="search" id="first_name" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id);">
                        <p class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="first_name" class="formlabel form-label"><i class="fas fa-address-card"></i> FIRST NAME</label>
                    </div>
                </div>

                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control text-uppercase" type="search" id="middle_name" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id);">
                        <p class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="middle_name" class="formlabel form-label"><i class="fas fa-address-card"></i> MIDDLE NAME (Optional)</label>
                    </div>
                </div>

                 <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control text-uppercase required_field name_validation" type="search" id="last_name" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id);">
                        <p class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="last_name" class="formlabel form-label"><i class="fas fa-address-card"></i> LAST NAME</label>
                    </div>
                </div>

                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control optional_field text-uppercase" type="search" id="suffix" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id);">
                        <label for="suffix" class="formlabel form-label"><i class="fas fa-address-card"></i> SUFFIX (Optional)</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control text-uppercase" type="search" id="nickname" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id);">
                        <label for="nickname" class="formlabel form-label"><i class="fas fa-address-card"></i> NICKNAME (Optional)</label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="date" id="birthday" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id)" onchange="updateCheck(this.id)">
                        <label for="birthday" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true"></i> BIRTHDAY </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="age" placeholder=" " disabled style="background-color:white;" autocomplete="off">
                        <label for="age" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true"></i>AGE</label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="gender" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id)" onchange="updateCheck(this.id)">
                            <option value="" disabled selected>SELECT GENDER </option>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                        <label for="gender" class="formlabel form-label"><i class="fas fa-venus-mars" aria-hidden="true" ></i> GENDER</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <div class="col-9">
                    <div class="f-outline">
                        <input class="forminput form-control text-uppercase required_field" type="search" id="address" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id)" onkeyup="updateCheck(this.id)">
                        <label for="address" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> ROOM #/ FLOOR, LOT/HOUSE #, STREET, SUBDIVISION, BARANGAY</label>
                    </div>
                </div>

                <div class="col-3">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="ownership" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck('ownership')" onchange="updateCheck('ownership')">
                            <option value="" disabled selected>SELECT OWNERSHIP </option>
                            <option value="OWNED">OWNED</option>
                            <option value="RENT">RENT</option>
                            <option value="STAY IN">STAY IN</option>
                        </select>
                        <label for="ownership" class="formlabel form-label"><i class="fa-solid fa-house"></i> OWNERSHIP</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field" name="province" id="province" onclick="updateCheck(this.id)" onchange="updateCheck(this.id)">
                            <option value="" selected disabled>SELECT PROVINCE</option>
                            @foreach ($provinces as $province)
                                <option class="province" value="{{ $province->provCode }}">{{($province->provDesc) }}</option>
                            @endforeach
                        </select>
                        <label for="province" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> PROVINCE</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field" name="city" id="city" onclick="updateCheck(this.id)" onchange="updateCheck(this.id)">
                            <option value="" selected disabled>SELECT CITY</option>
                        </select>
                        <label for="city" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> CITY</label>
                    </div>
                </div>

                <div class="col-3">
                    <div class="f-outline">
                        <input type="text" class="forminput form-control required_field" name="region" id="region" style="background-color: white !important;" placeholder=" " disabled onclick="updateCheck(this.id)" onchange="updateCheck(this.id)">
                        <label for="region" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> REGION</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="f-outline">
                        <select class="form-select forminput form-control"  id="blood_type" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id)" onchange="updateCheck(this.id)">
                            <option value="" disabled selected>SELECT BLOOD TYPE </option>
                            <option value="A">A</option>
                            <option value="A-">A-</option>
                            <option value="B">B</option>
                            <option value="B-">B-</option>
                            <option value="AB">AB</option>
                            <option value="AB-">AB-</option>
                            <option value="O">O</option>
                            <option value="O-">O-</option>
                        </select>
                        <label for="blood_type" class="formlabel form-label"><i class="fa-solid fa-droplet"></i> BLOOD TYPE </label>
                    </div>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control" type="search" id="height" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id)" onkeyup="updateCheck(this.id)">
                        <label for="height" class="formlabel form-label"><i class="fas fa-address-card"></i> HEIGHT (in cm.)</label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control" type="search" id="weight" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id)" onkeyup="updateCheck(this.id)">
                        <label for="weight" class="formlabel form-label"><i class="fas fa-address-card"></i> WEIGHT (in kg.)</label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control text-uppercase required_field" type="search" id="religion" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id)" onkeyup="updateCheck(this.id)">
                        <label for="religion" class="formlabel form-label"><i class="fas fa-address-card"></i> RELIGION</label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="civil_status" placeholder=" " style="background-color:white;" onclick="updateCheck(this.id);" onchange="updateCheck(this.id); changeCivilStatus();">
                            <option value="" disabled selected>SELECT CIVIL STATUS</option>
                            <option value="SINGLE">SINGLE</option>
                            <option value="MARRIED">MARRIED</option>
                            <option value="SOLO PARENT">SOLO PARENT</option>
                            <option value="WIDOWED">WIDOWED</option>
                            <option value="SEPARATED">SEPARATED</option>
                        </select>
                        <label for="civil_status" class="formlabel form-label"><i class="fas fa-user-friends" ></i> CIVIL STATUS</label>
                    </div>
                </div>
                <div class="col haveChildren" style="display: none;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="haveChildren">
                        <label for="haveChildren">HAVE CHILDREN?</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <div class="col-6">
                    <div class="f-outline">
                        <input class="forminput form-control required_field preventSpace" type="search" id="email_address" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onchange="updateCheck(this.id); duplicateCheck(this.id); emailCheck(this.id);">
                        <label for="email_address" class="formlabel form-label"><i class="fas fa-envelope"></i> EMAIL ADDRESS</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="f-outline">
                        <input class="forminput form-control optional_field" type="search" id="telephone_number" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id); duplicateCheck(this.id)">
                        <label for="telephone_number" class="formlabel form-label"><i class="fa fa-phone-square" aria-hidden="true" ></i> TELEPHONE NO. (Optional)</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="f-outline">
                        <input class="forminput form-control required_field numberInput" type="search" id="cellphone_number" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id); duplicateCheck(this.id)">
                        <label for="cellphone_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> CELLPHONE NO.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <div class="row mb-2 mt-3" id="spouse" style="display: none;">
                <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase name_validation" type="search" id="spouse_name" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id);">
                            <p id="spouse_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters </p>
                            <label for="spouse_name" class="formlabel form-label"><i class="fas fa-id-card" aria-hidden="true" ></i> SPOUSE NAME</label>
                        </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control" type="search" id="spouse_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id); duplicateCheck(this.id);">
                        <label for="spouse_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> SPOUSE CONTACT NO. (OPTIONAL)</label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control text-uppercase" type="search" id="spouse_profession" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="spouse_profession" class="formlabel form-label"><i class="fas fa-user-tie"></i> PROFESSION (Optional)</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <div class="col-4">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase required_field name_validation" type="search" id="father_name" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id);">
                            <p class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                            <label for="father_name" class="formlabel form-label"><i class="fas fa-id-card" aria-hidden="true"></i> FATHER'S NAME</label>
                        </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control" type="search" id="father_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id); duplicateCheck(this.id);">
                        <label for="father_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> FATHER'S CONTACT NO. (OPTIONAL)</label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control text-uppercase optional_field" type="search" id="father_profession" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id);">
                        <label for="father_profession" class="formlabel form-label"><i class="fas fa-user-tie"></i> PROFESSION (OPTIONAL)</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control text-uppercase required_field name_validation" type="search" id="mother_name" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id);">
                        <p class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="mother_name" class="formlabel form-label"><i class="fas fa-id-card" aria-hidden="true"></i> MOTHER'S MAIDEN NAME</label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control" type="search" id="mother_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id); duplicateCheck(this.id);">
                        <label for="mother_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> MOTHER'S CONTACT NO. (OPTIONAL)</label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control text-uppercase optional_field" type="search" id="mother_profession" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id);">
                        <label for="mother_profession" class="formlabel form-label"><i class="fas fa-user-tie"></i> PROFESSION (OPTIONAL)`</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control text-uppercase required_field name_validation" type="search" id="emergency_contact_name" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id);">
                            <p class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                            <label for="emergency_contact_name" class="formlabel form-label"><i class="fa fa-id-card" aria-hidden="true"></i> INCASE OF EMERGENCY NAME</label>
                        </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control text-uppercase required_field" type="search" id="emergency_contact_relationship" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id);">
                        <label for="emergency_contact_relationship" class="formlabel form-label"><i class="fas fa-user-friends"></i> RELATIONSHIP</label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="search" id="emergency_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" onclick="updateCheck(this.id);" onkeyup="updateCheck(this.id); duplicateCheck(this.id);">
                        <p id="same_value" class="validation"><i class="fas fa-exclamation-triangle"></i> EMERGENCY CONTACT & CELLPHONE NO. MUST BE DIFFERENT.</p>
                        <label for="emergency_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> CONTACT NO.</label>
                    </div>
                </div>
            </div>

            <hr class="hr-design">

            <div class="row children_information" style="display: none;">
                <div class="col">
                    <h5 class="table-title">CHILDREN INFORMATION</h5>
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="thead-design">
                                <tr>
                                    <th style="width:22.5%">NAME</th>
                                    <th style="width:22.5%">BIRTHDAY</th>
                                    <th style="width:22.5%">AGE</th>
                                    <th style="width:22.5%">GENDER</th>
                                    <th style="width:10%;">ACTION</th>
                                </tr>
                                <tbody>
                                    <tr>
                                        <td class="pb-3 pt-3">
                                            <div class="f-outline">
                                                <input type="search" class="forminput form-control optional_field text-uppercase name_validation" id="child_name" placeholder=" " style="background-color:white;" autocomplete="off">
                                                <p class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                                                <label for="child_name" class="formlabel form-label">(Optional)</label>
                                            </div>
                                        </td>
                                        <td class="pb-3 pt-3">
                                            <input class="forminput form-control optional_field" type="date" id="child_birthday" placeholder=" " style="background-color:white;" autocomplete="off" >
                                            <label for="child_birthday" class="formlabel form-label">(Optional)</label>
                                        </td>
                                        <td class="pb-3 pt-3">
                                            <div class="f-outline">
                                                <input class="forminput form-control optional_field" type="search" id="child_age" placeholder=" " disabled style="background-color:white;" autocomplete="off">
                                                <label for="child_age" class="formlabel form-label"></label>
                                            </div>
                                        </td>
                                        <td class="pb-3 pt-3">
                                            <div class="f-outline">
                                                <select class="form-select forminput form-control optional_field"  id="child_gender" placeholder=" " style="background-color:white;" autocomplete="off">
                                                    <option value="" disabled selected>SELECT GENDER </option>
                                                    <option value="MALE">MALE</option>
                                                    <option value="FEMALE">FEMALE</option>
                                                </select>
                                                <label for="child_gender" class="formlabel form-label">(Optional)</label>
                                            </div>
                                        </td>
                                        <td class="pb-3 pt-3">
                                            <button type="button" id="childrenAdd" class="btn btn-success center btnActionDisabled" title="ADD"><i class="fas fa-plus"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </thead>
                        </table>

                        <table id="children_table" class="table table-bordered table-striped table-hover align-middle" style="margin-top: -17px;">
                            <thead style="display: none;">
                                <tr>
                                    <th style="width:22.5%"><i class="fas fa-id-card"></i> NAME</th>
                                    <th style="width:22.5%"><i class="fas fa-calendar"></i> BIRTHDAY</th>
                                    <th style="width:22.5%"><i class="fas fa-calendar"></i> AGE</th>
                                    <th style="width:22.5%"><i class="fas fa-venus-mars"></i> GENDER</th>
                                    <th style="width:10%;"><i class="fas fa-id-card"></i> ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <table id="children_table_orig" class="table table-bordered table-striped table-hover align-middle children_table_orig" style="display: none; margin-top:-36px;">
                            <thead>
                                <tr>
                                    <th style="border:none;"></th>
                                    <th style="border:none;"></th>
                                    <th style="border:none;"></th>
                                    <th style="border:none;"></th>
                                    <th style="border-left: none;"></th>
                                </tr>
                            </thead>
                            <tbody id="children_table_orig_tbody">
                            </tbody>
                        </table>
                        <br>
                        <hr class="hr-design">
                </div>
            </div>
</div>{{-- End of Personal Information Nav --}}