<div id="personal_information" class="tab-pane active" style="border-radius:0px;"><br>
    {{-- First Row --}}
    <div class="row mb-3">{{-- Row for split column --}}
        {{-- Column 1 --}}
        <div class="column-1">
            <div class="row mb-3">
                <div class="col">
                    <i class="fas fa-times float-end grow" style="zoom:150%;cursor:pointer;display:none;margin-top:3px;margin-bottom:3px;" title="REPLACE" id="image_close"></i>
                    <i class="fa fa-user-circle fa-4x p-2 mt-4 image_icon" aria-hidden="true" id="image_user"></i>
                        <img id="output">

                    <form method="POST" id="image_form" enctype="multipart/form-data"> {{-- form for inserting image --}}
                        <label class="custom_file center" id="image_button"><i class="fas fa-upload"></i> Upload Image
                            {{-- <input type="file" name="cover_image" id="cover_image" class="center" accept="image/*" onchange="loadFile(event)"> --}}
                            <input type="file" name="cover_image" id="cover_image" class="center required_field" accept="image/*" onchange="return ValidateFileUpload()" style="display: none;">
                        </label>
                    </form> 
                </div>
            </div>
        </div>
        {{-- Column 2 --}}
        <div class="column-2">
            <div class="row mb-4 mt-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="first_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <p id="first_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="first_name" class="formlabel form-label"><i class="fas fa-address-card"></i> FIRST NAME <span class="span_first_name">(Required)</span> </label>
                    </div>
                </div>
                 <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="last_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <p id="last_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="last_name" class="formlabel form-label"><i class="fas fa-address-card"></i> LAST NAME <span class="span_last_name">(Required)</span> </label>
                    </div>
                </div> 
                
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="middle_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <p id="middle_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="middle_name" class="formlabel form-label"><i class="fas fa-address-card"></i> MIDDLE NAME <span class="span_middle_name">(Required)</span></label>
                    </div>
                </div>
               
                <div class="col-3">
                    <div class="f-outline">
                        <input class="forminput form-control optional" type="text" id="suffix" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="suffix" class="formlabel form-label"><i class="fas fa-address-card"></i> SUFFIX <span class="span_suffix">(Optional)</span></label>
                    </div>
                </div> 
            </div> {{-- End of first row div --}}

            <div class="row mb-4">
                <div class="col-4">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="date" id="birthday" placeholder=" " style="background-color:white;" autocomplete="off" >
                        <label for="date_of_birth" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true"></i> DATE OF BIRTH <span class="span_birthday">(Required)</span> </label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="age" placeholder=" " disabled style="background-color:white;" autocomplete="off">
                        <label for="age" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true"></i> AGE</label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="gender" placeholder=" " style="background-color:white;" autocomplete="off">
                            <option value="" disabled selected>SELECT GENDER </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="gender" class="formlabel form-label"><i class="fas fa-venus-mars" aria-hidden="true" ></i> GENDER <span class="span_gender">(Required)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="civil_status" placeholder=" " onchange="changeStatus()" style="background-color:white;">
                            <option value="" disabled selected>Select</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Single Parent">Single Parent</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                        </select>
                        <label for="civil_status" class="formlabel form-label"><i class="fas fa-user-friends" ></i> CIVIL STATUS <span class="span_civil_status">(Required)</span> </label>
                    </div>
                </div>
            </div>

            <div class="row mb-4 mt-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="street" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="street" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> STREET <span class="span_street_address">(Required)</span> </label>
                    </div>
                </div>

                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="region" placeholder=" " onchange="changeStatus()" style="background-color:white;">
                            <option value="" disabled selected>SELECT REGION</option>
                            <option value="Region1">Region1</option>
                            <option value="Region2">Region2</option>
                        </select>
                        <label for="region" class="formlabel form-label"><i class="fas fa-user-friends" ></i> REGION <span class="span_region">(Required)</span> </label>
                    </div>
                </div>

                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="city" placeholder=" " onchange="changeStatus()" style="background-color:white;">
                            <option value="" disabled selected>SELECT CITY</option>
                            <option value="City1">City1</option>
                            <option value="City2">City2</option>
                        </select>
                        <label for="city" class="formlabel form-label"><i class="fas fa-user-friends" ></i> CITY <span class="span_city">(Required)</span> </label>
                    </div>
                </div>

                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="province" placeholder=" " onchange="changeStatus()" style="background-color:white;">
                            <option value="" disabled selected>SELECT PROVINCE</option>
                            <option value="Province1">Province1</option>
                            <option value="Province2">Province2</option>
                        </select>
                        <label for="province" class="formlabel form-label"><i class="fas fa-user-friends" ></i> PROVINCE <span class="span_province">(Required)</span> </label>
                    </div>
                </div>
            </div>
            
            <div class="row mb-2">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="email" id="email_address" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="emailValidation()">
                        <p id="email_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter Valid Email Address</p>
                        <label for="email_address" class="formlabel form-label"><i class="fas fa-envelope"></i> EMAIL ADDRESS <span class="span_email_address">(Required)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control optional" type="text" id="telephone_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="12" onkeyup="contactNumberOnly(this)">
                        <label for="telephone_number" class="formlabel form-label"><i class="fa fa-phone-square" aria-hidden="true" ></i> TELEPHONE NUMBER <span class="span_telephone_number">(Optional)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="cellphone_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="contactNumberOnly(this)">
                        <p id="cellphone_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number! </p>
                        <label for="cellphone_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> CELLPHONE NUMBER <span class="span_cellphone_number">(Required)</span> </label>
                    </div>
                </div>
            </div> 
        </div>{{-- End of Column 2 Div--}}

            <div id="single_parent" class="mt-3">
                Here
            </div>

                <div class="row mb-2 mt-3" id="spouse">
                    <div class="col">
                            <div class="f-outline">
                                <input class="forminput form-control" type="text" id="spouse_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                                <label for="spouse_name" class="formlabel form-label"><i class="fas fa-id-card" aria-hidden="true" ></i> Spouse Name <span class="span_spouse_name">(Required)</span> </label>
                            </div>
                    </div>
                    <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="spouse_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="contactNumberOnly(this)">
                            <p id="spouse_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number </p>
                            <label for="spouse_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> Spouse Contact Number <span class="span_spouse_number">(Required)</span> </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="spouse_profession" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <label for="spouse_profession" class="formlabel form-label"><i class="fas fa-user-tie"></i> Profession <span class="span_spouse_profession">(Required)</span> </label>
                        </div>
                    </div>
                </div> {{-- End of 5th row div --}}
          
    
                <div class="row mb-3 mt-3">
                    <div class="col-4">
                            <div class="f-outline">
                                <input class="forminput form-control required_field" type="text" id="father_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                                <label for="father_name" class="formlabel form-label"><i class="fas fa-id-card" aria-hidden="true"></i> Father's Name <span class="span_father_name">(Required)</span> </label>
                            </div>
                    </div>
                    <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="father_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="numbersOnly(this)">
                            <p id="father_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number </p>
                            <label for="father_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> Father's Contact No. <span class="span_father_contact_number"> (Optional)</span> </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="father_profession" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <label for="father_profession" class="formlabel form-label"><i class="fas fa-user-tie"></i> Profession <span class="span_father_profession">(Required)</span> </label>
                        </div>
                    </div>
                </div> {{-- End of 6th row div --}}
    
                <div class="row mb-3">
                    <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="mother_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <label for="mother_name" class="formlabel form-label"><i class="fas fa-id-card" aria-hidden="true"></i> Mother's Name <span class="span_mother_name">(Required)</span> </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="mother_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="contactNumberOnly(this)">
                            <p id="mother_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number </p>
                            <label for="mother_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> Mother's Contact No. <span class="span_mother_contact_number">(Optional)</span></label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="mother_profession" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <label for="mother_profession" class="formlabel form-label"><i class="fas fa-user-tie"></i> Profession <span class="span_mother_profession">(Required)</span></label>
                        </div>
                    </div>
                </div> {{-- End of 7th row div --}}
    
                <div class="row mb-3">
                    <div class="col">
                            <div class="f-outline">
                                <input class="forminput form-control required_field" type="text" id="emergency_contact_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                                <label for="emergency_contact_name" class="formlabel form-label"><i class="fa fa-id-card" aria-hidden="true"></i> Incase of Emergency <span class="span_emergency_contact_name">(Required)</span> </label>
                            </div>
                    </div>
                    <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="emergency_contact_relationship" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <label for="emergency_contact_relationship" class="formlabel form-label"><i class="fas fa-user-friends"></i> Relationship <span class="span_emergency_contact_relationship">(Required)</span> </label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="emergency_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="contactNumberOnly(this)">
                            <p id="emergency_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number </p>
                            <label for="emergency_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> Contact No. <span class="span_emergency_contact_number">(Required)</span> </label>
                        </div>
                    </div>
                </div>
    </div>{{-- End div of row split --}}
            <!--
            <div class="row mb-3">
                <div class="col-4">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="date" id="birthday" placeholder=" " style="background-color:white;" autocomplete="off" >
                        <label for="date_of_birth" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true"></i> DATE OF BIRTH <span class="span_birthday">(Required)</span> </label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="age" placeholder=" " disabled style="background-color:white;" autocomplete="off">
                        <label for="age" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true"></i> AGE</label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="gender" placeholder=" " style="background-color:white;" autocomplete="off">
                            <option value="" disabled selected>SELECT GENDER </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="gender" class="formlabel form-label"><i class="fas fa-venus-mars" aria-hidden="true" ></i> GENDER <span class="span_gender">(Required)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="civil_status" placeholder=" " onchange="changeStatus()" style="background-color:white;">
                            <option value="" disabled selected>Select</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Single Parent">Single Parent</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                        </select>
                        <label for="civil_status" class="formlabel form-label"><i class="fas fa-user-friends" ></i> CIVIL STATUS <span class="span_civil_status">(Required)</span> </label>
                    </div>
                </div>
            </div>{{-- End of 2nd row div --}}

            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="home_address" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="home_address" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> HOME ADDRESS <span class="span_home_address">(Required)</span> </label>
                    </div>
                </div>
            </div> {{-- End of 3rd row div --}}
            
            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="email" id="email_address" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="emailValidation()">
                        <p id="email_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter Valid Email Address</p>
                        <label for="email_address" class="formlabel form-label"><i class="fas fa-envelope"></i> EMAIL ADDRESS <span class="span_email_address">(Required)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control optional" type="text" id="telephone_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="12" onkeyup="contactNumberOnly(this)">
                        <label for="telephone_number" class="formlabel form-label"><i class="fa fa-phone-square" aria-hidden="true" ></i> TELEPHONE NUMBER <span class="span_telephone_number">(Optional)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="cellphone_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="contactNumberOnly(this)">
                        {{-- <input class="forminput form-control required_field" type="text" id="cellphone_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11"> --}}
                        <p id="cellphone_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number! </p>
                        <label for="cellphone_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> CELLPHONE NUMBER <span class="span_cellphone_number">(Required)</span> </label>
                    </div>
                </div>
            </div> {{-- End of 4th row div --}}

        
    </div> {{-- End of Split div --}}

        <div id="single_parent">
            Here
        </div>
        <div id="spouse">
            <div class="row mb-3">
                <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="spouse_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <label for="spouse_name" class="formlabel form-label"><i class="fas fa-id-card" aria-hidden="true" ></i> Spouse Name <span class="span_spouse_name">(Required)</span> </label>
                        </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="spouse_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="contactNumberOnly(this)">
                        <p id="spouse_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number </p>
                        <label for="spouse_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> Spouse Contact Number <span class="span_spouse_number">(Required)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="spouse_profession" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="spouse_profession" class="formlabel form-label"><i class="fas fa-user-tie"></i> Profession <span class="span_spouse_profession">(Required)</span> </label>
                    </div>
                </div>
            </div> {{-- End of 5th row div --}}
        </div>

            <div class="row mb-3">
                <div class="col-4">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="father_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <label for="father_name" class="formlabel form-label"><i class="fas fa-id-card" aria-hidden="true"></i> Father's Name <span class="span_father_name">(Required)</span> </label>
                        </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="father_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="numbersOnly(this)">
                        <p id="father_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number </p>
                        <label for="father_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> Father's Contact No. <span class="span_father_contact_number"> (Optional)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="father_profession" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="father_profession" class="formlabel form-label"><i class="fas fa-user-tie"></i> Profession <span class="span_father_profession">(Required)</span> </label>
                    </div>
                </div>
            </div> {{-- End of 6th row div --}}

            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="mother_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="mother_name" class="formlabel form-label"><i class="fas fa-id-card" aria-hidden="true"></i> Mother's Name <span class="span_mother_name">(Required)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="mother_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="contactNumberOnly(this)">
                        <p id="mother_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number </p>
                        <label for="mother_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> Mother's Contact No. <span class="span_mother_contact_number">(Optional)</span></label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="mother_profession" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="mother_profession" class="formlabel form-label"><i class="fas fa-user-tie"></i> Profession <span class="span_mother_profession">(Required)</span></label>
                    </div>
                </div>
            </div> {{-- End of 7th row div --}}

            <div class="row mb-3">
                <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="emergency_contact_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <label for="emergency_contact_name" class="formlabel form-label"><i class="fa fa-id-card" aria-hidden="true"></i> Incase of Emergency <span class="span_emergency_contact_name">(Required)</span> </label>
                        </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="emergency_contact_relationship" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="emergency_contact_relationship" class="formlabel form-label"><i class="fas fa-user-friends"></i> Relationship <span class="span_emergency_contact_relationship">(Required)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="emergency_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="contactNumberOnly(this)">
                        <p id="emergency_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number </p>
                        <label for="emergency_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> Contact No. <span class="span_emergency_contact_number">(Required)</span> </label>
                    </div>
                </div>
            </div> --> {{-- End of 8th row div --}} 
</div>{{-- End of Personal Information Nav --}}