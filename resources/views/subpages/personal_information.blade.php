<div id="personal_info" class="tab-pane active" style="border-radius:0px;margin-bottom:-20px;">
    <hr class="hr-design">
    
    <div class="row mb-3">
        <div class="column-1">
            <input type="hidden" id="filename">
            <input type="hidden" id="filename_delete">
            
                <i class="fas fa-times float-end grow" id="image_close" style="zoom:150%; cursor:pointer; display:none; margin-top:3px; margin-bottom:3px; "></i>
                
                <div class="text-center mt-4">
                    <i class="fa fa-user-circle fa-5x" id="image_user" aria-hidden="true"></i>
                </div>

                    <img id="image_preview">

                <div class="text-center mt-5">
                    <button type="button" class="btn btn-primary bp" id="image_button" onclick="$('#employee_image').click()"><span class="fas fa-upload"></span> UPLOAD IMAGE</button>
                    <input type="file" name="employee_image" class="required_field hiddenFile" id="employee_image" accept=".jpg,.jpeg,.png,.gif" onchange="ImageValidation(employee_image)">
                </div>

                <div class="text-center mt-3" id="image_instruction">
                    <span>File Size: Maximum (10MB)</span><br>
                    <span>File Extensions: .jpg, .jpeg, .png</span> 
                </div>
        </div>
        
        <div class="column-2">
            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control text-capitalize required_field" type="search" id="first_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="firstNameField(this)" ondrop="return false;" onpaste="return false;">
                        <p id="first_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="first_name" class="formlabel form-label"><i class="fas fa-address-card"></i> FIRST NAME <span class="span_first_name span_all"></span> </label>
                    </div>
                </div>

                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="middle_name_orig">
                        <input class="forminput form-control text-capitalize required_field" type="search" id="middle_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <p id="middle_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="middle_name" class="formlabel form-label"><i class="fas fa-address-card"></i> MIDDLE NAME <span class="span_middle_name span_all"></span></label>
                    </div>
                </div>

                 <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="last_name_orig">
                        <input class="forminput form-control text-capitalize required_field" type="search" id="last_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <p id="last_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="last_name" class="formlabel form-label"><i class="fas fa-address-card"></i> LAST NAME <span class="span_last_name span_all"></span> </label>
                    </div>
                </div> 
                
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control optional_field text-capitalize" type="search" id="suffix" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="suffix" class="formlabel form-label"><i class="fas fa-address-card"></i> SUFFIX <span class="span_suffix span_all">(Optional)</span></label>
                    </div>
                </div> 
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control text-capitalize required_field" type="search" id="nickname" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="nickname" class="formlabel form-label"><i class="fas fa-address-card"></i> NICKNAME <span class="span_nickname span_all"></span></label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="date" id="birthday" placeholder=" " style="background-color:white;" autocomplete="off" >
                        <label for="birthday" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true"></i> BIRTHDAY <span class="span_birthday span_all"></span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="age" placeholder=" " disabled style="background-color:white;" autocomplete="off">
                        <label for="age" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true"></i><span class="span_age span_all"> AGE </span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="gender" placeholder=" " style="background-color:white;" autocomplete="off">
                            <option value="" disabled selected>SELECT GENDER </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="gender" class="formlabel form-label"><i class="fas fa-venus-mars" aria-hidden="true" ></i> GENDER <span class="span_gender span_all"></span> </label>
                    </div>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="unit_orig">
                        <input class="forminput form-control text-capitalize optional_field" type="search" id="unit" placeholder=" " style="background-color:white;" autocomplete="off" ondrop="return false;" onpaste="return false;">
                        <label for="unit" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> ROOM #/ FLOOR (Optional) <span class="span_unit span_all"></span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="lot_orig">
                        <input class="forminput form-control text-capitalize required_field" type="search" id="lot" placeholder=" " style="background-color:white;" autocomplete="off" ondrop="return false;" onpaste="return false;">
                        <label for="lot" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> LOT/HOUSE #, STREET NAME <span class="span_lot span_all"></span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="barangay_orig">
                        <input class="forminput form-control text-capitalize required_field" type="search" id="barangay" placeholder=" " style="background-color:white;" autocomplete="off" ondrop="return false;" onpaste="return false;">
                        <label for="barangay" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> SUBDIVISION, BARANGAY <span class="span_barangay span_all"></span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="house_orig">
                        <input type="radio" id="default" name="house" class="house" value="Owned" style="margin-left: 30px;" checked> Owned
                        <input type="radio" name="house" class="house" value="Rent" style="margin-left: 30px;"> Rent
                    </div>
                </div>
            </div>
            
                {{-- <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="region" placeholder=" " style="background-color:white;">
                            <option value="" disabled selected>SELECT REGION</option>
                                @foreach($regions as $region)
                                    <option class="region" value="{{$region->regCode}}">{{$region->regDesc}}</option>
                                @endforeach
                        </select>
                        <label for="region" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> REGION <span class="span_region span_all"></span> </label>
                    </div>
                </div>

                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="province" placeholder=" " style="background-color:white;">
                            <option value="" disabled selected>SELECT PROVINCE</option>
                        </select>
                        <label for="province" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> PROVINCE <span class="span_province span_all"></span> </label>
                    </div>
                </div>

                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="city" placeholder=" " style="background-color:white;">
                            <option value="" disabled selected>SELECT CITY</option>
                        </select>
                        <label for="city" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> CITY <span class="span_city span_all"></span> </label>
                    </div>
                </div> --}}
            
            <div class="row mb-3">
                <div class="col-3">
                    <div class="f-outline">
                        <input type="hidden" id="province_orig">
                        <select class="form-select forminput form-control required_field" name="province" id="province">
                            <option value="" selected disabled>SELECT PROVINCE</option>
                            @foreach ($provinces as $province)
                                <option class="province" value="{{ $province->provCode }}">{{($province->provDesc) }}</option>
                            @endforeach
                        </select>
                        <label for="province" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> PROVINCE <span class="span_province span_all"></span> </label>
                    </div>
                </div>

                <div class="col-3">
                    <div class="f-outline">
                        <input type="hidden" id="city_orig">
                        <select class="form-select forminput form-control required_field" name="city" id="city">
                            <option value="" selected disabled>SELECT CITY</option>
                            
                        </select>
                        <label for="city" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> CITY <span class="span_city span_all"></span> </label>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="f-outline">
                        <input type="hidden" id="region_orig">
                        <input type="text" class="forminput form-control required_field" name="region" id="region" style="background-color: white !important;" disabled>
                        <label for="region" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> REGION <span class="span_street span_all"></span> </label>
                    </div>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="height_orig">
                        <input class="forminput form-control text-capitalize required_field" type="search" id="height" placeholder=" " style="background-color:white;" autocomplete="off" ondrop="return false;" onpaste="return false;">
                        <label for="height" class="formlabel form-label"><i class="fas fa-address-card"></i> HEIGHT <span class="span_height span_all"></span></label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="weight_orig">
                        <input class="forminput form-control text-capitalize required_field" type="search" id="weight" placeholder=" " style="background-color:white;" autocomplete="off" ondrop="return false;" onpaste="return false;">
                        <label for="weight" class="formlabel form-label"><i class="fas fa-address-card"></i> WEIGHT <span class="span_weight span_all"></span></label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="religion_orig">
                        <input class="forminput form-control text-capitalize required_field" type="search" id="religion" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="religion" class="formlabel form-label"><i class="fas fa-address-card"></i> RELIGION <span class="span_religion span_all"></span></label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="civil_status_orig">
                        <select class="form-select forminput form-control required_field"  id="civil_status" placeholder=" " onchange="changeCivilStatus()" style="background-color:white;">
                            <option value="" disabled selected>SELECT CIVIL STATUS</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Solo Parent">Solo Parent</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                        </select>
                        <label for="civil_status" class="formlabel form-label"><i class="fas fa-user-friends" ></i> CIVIL STATUS <span class="span_civil_status span_all"></span> </label>
                    </div>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <div class="col-6">
                    <div class="f-outline">
                        <input type="hidden" id="email_address_orig">
                        <input class="forminput form-control required_field" type="search" id="email_address" placeholder=" " style="background-color:white;" autocomplete="off" ondrop="return false;" onpaste="return false;">
                        <p id="email_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter Valid Email Address!</p>
                        <p id="duplicate_email_address" class="validation"><i class="fas fa-exclamation-triangle"></i> Email Already Exist!</p>
                        <label for="email_address" class="formlabel form-label"><i class="fas fa-envelope"></i> EMAIL ADDRESS <span class="span_email_address span_all"></span> </label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="f-outline">
                        <input type="hidden" id="telephone_number_orig">
                        <input class="forminput form-control optional_field" type="search" id="telephone_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="12" onkeyup="telephoneNumberField(this)" ondrop="return false;" onpaste="return false;">
                        <p id="duplicate_telephone_number" class="validation"><i class="fas fa-exclamation-triangle"></i> Telephone Number Already Exist!</p>
                        <label for="telephone_number" class="formlabel form-label"><i class="fa fa-phone-square" aria-hidden="true" ></i> TELEPHONE NO. <span class="span_telephone_number span_all">(Optional)</span> </label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="f-outline">
                        <input type="hidden" id="cellphone_number_orig">
                        <input class="forminput form-control required_field" type="search" id="cellphone_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" ondrop="return false;" onpaste="return false;" onkeyup="contactNumberOnly(this)">
                        <p id="duplicate_cellphone_number" class="validation"><i class="fas fa-exclamation-triangle"></i> Cellphone Number Already Exist! </p>
                        <label for="cellphone_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> CELLPHONE NO. <span class="span_cellphone_number span_all"></span> </label>
                    </div>
                </div>
            </div>
        </div> <!-- Column 2 -->
    </div>

            <div class="row mb-2 mt-3" id="spouse" style="display: none;">
                <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control text-capitalize" type="search" id="spouse_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <p id="spouse_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters </p>   
                            <label for="spouse_name" class="formlabel form-label"><i class="fas fa-id-card" aria-hidden="true" ></i> SPOUSE NAME <span class="span_spouse_name span_all"></span> </label>
                        </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="spouse_contact_number_orig">
                        <input class="forminput form-control" type="search" id="spouse_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" ondrop="return false;" onpaste="return false;" onkeyup="contactNumberOnly(this)">
                        <p id="duplicate_spouse_contact_number" class="validation"><i class="fas fa-exclamation-triangle"></i> Contact Number Already Exist!</p>
                        <label for="spouse_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> SPOUSE CONTACT NO. <span class="span_spouse_number span_all"></span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="spouse_profession_orig">
                        <input class="forminput form-control text-capitalize" type="search" id="spouse_profession" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="spouse_profession" class="formlabel form-label"><i class="fas fa-user-tie"></i> PROFESSION (Optional) <span class="span_spouse_profession span_all"></span> </label>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3 mt-3">
                <div class="col-4">
                        <div class="f-outline">
                            <input class="forminput form-control text-capitalize required_field" type="search" id="father_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <p id="father_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                            <label for="father_name" class="formlabel form-label"><i class="fas fa-id-card" aria-hidden="true"></i> FATHER'S NAME <span class="span_father_name span_all"></span> </label>
                        </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="father_contact_number_orig">
                        <input class="forminput form-control required_field" type="search" id="father_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" ondrop="return false;" onpaste="return false;" onkeyup="contactNumberOnly(this)">
                        <p id="duplicate_father_contact_number" class="validation"><i class="fas fa-exclamation-triangle"></i> Contact Number Already Exist! </p>
                        <label for="father_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> FATHER'S CONTACT NO. <span class="span_father_contact_number span_all"></span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="father_profession_orig">
                        <input class="forminput form-control text-capitalize optional_field" type="search" id="father_profession" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="father_profession" class="formlabel form-label"><i class="fas fa-user-tie"></i> PROFESSION (Optional) <span class="span_father_profession span_all"></span> </label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control text-capitalize required_field" type="search" id="mother_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <p id="mother_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="mother_name" class="formlabel form-label"><i class="fas fa-id-card" aria-hidden="true"></i> MOTHER'S MAIDEN NAME <span class="span_mother_name span_all"></span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="mother_contact_number_orig">
                        <input class="forminput form-control required_field" type="search" id="mother_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" ondrop="return false;" onpaste="return false;" onkeyup="contactNumberOnly(this)">
                        <p id="duplicate_mother_contact_number" class="validation"><i class="fas fa-exclamation-triangle"></i> Contact Number Already Exist!</p>
                        <label for="mother_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> MOTHER'S CONTACT NO. <span class="span_mother_contact_number span_all"></span></label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="mother_profession_orig">
                        <input class="forminput form-control text-capitalize optional_field" type="search" id="mother_profession" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="mother_profession" class="formlabel form-label"><i class="fas fa-user-tie"></i> PROFESSION (Optional) <span class="span_mother_profession span_all"></span></label>
                    </div>
                </div>
            </div>
    
            <div class="row mb-3">
                <div class="col">
                        <div class="f-outline">
                            <input type="hidden" id="emergency_contact_name_orig">
                            <input class="forminput form-control text-capitalize required_field" type="search" id="emergency_contact_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                            <p id="emergency_contact_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                            <label for="emergency_contact_name" class="formlabel form-label"><i class="fa fa-id-card" aria-hidden="true"></i> INCASE OF EMERGENCY NAME <span class="span_emergency_contact_name span_all"></span> </label>
                        </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="emergency_contact_relationship_orig">
                        <input class="forminput form-control text-capitalize required_field" type="search" id="emergency_contact_relationship" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="emergency_contact_relationship" class="formlabel form-label"><i class="fas fa-user-friends"></i> RELATIONSHIP <span class="span_emergency_contact_relationship span_all"></span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input type="hidden" id="emergency_contact_number_orig">
                        <input class="forminput form-control required_field" type="search" id="emergency_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" ondrop="return false;" onpaste="return false;" onkeyup="contactNumberOnly(this)">
                        <p id="duplicate_emergency_contact_number" class="validation"><i class="fas fa-exclamation-triangle"></i> Contact Number Already Exist!</p>
                        <label for="emergency_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> CONTACT NO. <span class="span_emergency_contact_number span_all"></span> </label>
                    </div>
                </div>
            </div>

            <hr class="hr-design">

            <div class="row children_information" style="display: none;">
                <div class="col">
                    <h5 class="table-title">CHILDREN INFORMATION</h5>
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="thead-educational">
                                <tr>
                                    <th style="width:22.5%"><i class="fas fa-id-card"></i> NAME</th>
                                    <th style="width:22.5%"><i class="fas fa-calendar"></i> BIRTHDAY</th>
                                    <th style="width:22.5%"><i class="fas fa-calendar"></i> AGE</th>
                                    <th style="width:22.5%"><i class="fas fa-venus-mars"></i> GENDER</th>
                                    <th style="width:10%;"><i class="fas fa-id-card"></i> ACTION</th>
                                </tr>
                                <tbody>
                                    <tr>
                                        <td class="pb-3 pt-3">
                                            <div class="f-outline">
                                                <input type="search" class="forminput form-control optional_field child_field text-capitalize" id="child_name" placeholder=" " style="background-color:white;" autocomplete="off">
                                                <p id="child_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                                                <label for="child_name" class="formlabel form-label"><span class="span_child_name span_all span_child">(Optional)</span></label>
                                            </div>
                                        </td>
                                        <td class="pb-3 pt-3">
                                            <input class="forminput form-control optional_field child_field" type="date" id="child_birthday" placeholder=" " style="background-color:white;" autocomplete="off" >
                                            <label for="child_birthday" class="formlabel form-label"><span class="span_child_birthday span_all span_child">(Optional)</span></label>
                                        </td>
                                        <td class="pb-3 pt-3">
                                            <div class="f-outline">
                                                <input class="forminput form-control optional_field" type="search" id="child_age" placeholder=" " disabled style="background-color:white;" autocomplete="off">
                                                <label for="child_age" class="formlabel form-label"></label>
                                            </div>
                                        </td>
                                        <td class="pb-3 pt-3">
                                            <div class="f-outline">
                                                <select class="form-select forminput form-control optional_field child_field"  id="child_gender" placeholder=" " style="background-color:white;" autocomplete="off">
                                                    <option value="" disabled selected>SELECT GENDER </option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <label for="child_gender" class="formlabel form-label"><span class="span_child_gender span_all span_child">(Optional)</span></label>
                                            </div>
                                        </td>
                                        <td class="pb-3 pt-3">
                                            <button type="button" id="childrenAdd" class="btn btn-success center grow btnActionDisabled" title="ADD"><i class="fas fa-plus"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </thead>
                        </table>

                        <table id="children_table" class="table table-bordered table-striped table-hover align-middle" style="margin-top: -17px;">
                            <thead class="children_table_thead" style="display: none;">
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
                            <thead class="children_table_orig_thead">
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