<div id="personal_information" class="tab-pane active" style="border-radius:0px;">
    <hr class="hr-design">
    <div class="row mb-3"> <!-- Split 2 column -->
        <div class="column-1"> <!-- Image Container -->
            <div class="row mb-3">
                <div class="col">
                    <i class="fas fa-times float-end grow" style="zoom:150%;cursor:pointer;display:none;margin-top:3px;margin-bottom:3px;" title="REPLACE" id="image_close"></i>
                    <i class="fa fa-user-circle fa-4x p-2 mt-4 image_icon center" aria-hidden="true" id="image_user"></i>
                        <img id="preview_image">

                    <form method="POST" id="image_form" enctype="multipart/form-data"> {{-- form for inserting image --}}
                        <button type="button" class="btn btn-primary bp center" style="margin-top: 180px;" id="image_button" onclick="$('#cover_image').click()"><span class="fas fa-upload"></span> UPLOAD IMAGE</button>
                        <input type="file" name="cover_image" id="cover_image" class="required_field" accept="image/*" onchange="return ImageValidation()" style="display: none;">
                    </form> 
                </div>
            </div>
        </div>
        
        <div class="column-2"> <!-- Input Field Container -->
            <div class="row mb-4 mt-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field capitalize" type="search" id="first_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <p id="first_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="first_name" class="formlabel form-label"><i class="fas fa-address-card"></i> FIRST NAME <span class="span_first_name span_all">(Required)</span> </label>
                    </div>
                </div>
                 <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field capitalize" type="search" id="last_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <p id="last_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="last_name" class="formlabel form-label"><i class="fas fa-address-card"></i> LAST NAME <span class="span_last_name span_all">(Required)</span> </label>
                    </div>
                </div> 
                
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field capitalize" type="search" id="middle_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <p id="middle_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="middle_name" class="formlabel form-label"><i class="fas fa-address-card"></i> MIDDLE NAME <span class="span_middle_name span_all">(Required)</span></label>
                    </div>
                </div>
               
                <div class="col-3">
                    <div class="f-outline">
                        <input class="forminput form-control optional capitalize" type="search" id="suffix" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)" ondrop="return false;" onpaste="return false;">
                        <label for="suffix" class="formlabel form-label"><i class="fas fa-address-card"></i> SUFFIX <span class="span_suffix span_all">(Optional)</span></label>
                    </div>
                </div> 
            </div>

            <div class="row mb-4">
                <div class="col-4">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="date" id="birthday" placeholder=" " style="background-color:white;" autocomplete="off" >
                        <label for="birthday" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true"></i> BIRTHDAY <span class="span_birthday span_all">(Required)</span> </label>
                    </div>
                </div>
                <div class="col-2">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="age" placeholder=" " disabled style="background-color:white;" autocomplete="off">
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
                        <label for="gender" class="formlabel form-label"><i class="fas fa-venus-mars" aria-hidden="true" ></i> GENDER <span class="span_gender span_all">(Required)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="civil_status" placeholder=" " onchange="changeStatus()" style="background-color:white;">
                            <option value="" disabled selected>Select</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Solo Parent">Solo Parent</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                        </select>
                        <label for="civil_status" class="formlabel form-label"><i class="fas fa-user-friends" ></i> CIVIL STATUS <span class="span_civil_status span_all">(Required)</span> </label>
                    </div>
                </div>
            </div>

            <div class="row mb-4 mt-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field capitalize" type="search" id="street" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="street" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> STREET <span class="span_street span_all">(Required)</span> </label>
                    </div>
                </div>

                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="region" placeholder=" " style="background-color:white;">
                            <option value="" disabled selected>SELECT REGION</option>
                            @foreach($regions as $region)
                                <option value="{{$region->regCode}}">{{$region->regDesc}}</option>
                            @endforeach
                        </select>
                        <label for="region" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> REGION <span class="span_region span_all">(Required)</span> </label>
                    </div>
                </div>

                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="province" placeholder=" " style="background-color:white;">
                            <option value="" disabled selected>SELECT PROVINCE</option>
                        </select>
                        <label for="province" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> PROVINCE <span class="span_province span_all">(Required)</span> </label>
                    </div>
                </div>

                <div class="col">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="city" placeholder=" " style="background-color:white;">
                            <option value="" disabled selected>SELECT CITY</option>
                        </select>
                        <label for="city" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> CITY <span class="span_city span_all">(Required)</span> </label>
                    </div>
                </div>
            </div>
            
            <div class="row mb-2">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="search" id="email_address" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="emailValidation()" ondrop="return false;" onpaste="return false;">
                        <p id="email_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter Valid Email Address</p>
                        <p id="duplicate_email_address" class="validation"><i class="fas fa-exclamation-triangle"></i> Email Already Exist!</p>
                        <label for="email_address" class="formlabel form-label"><i class="fas fa-envelope"></i> EMAIL ADDRESS <span class="span_email_address span_all">(Required)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control optional" type="search" id="telephone_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="12" onkeyup="contactNumberOnly(this)">
                        <p id="duplicate_telephone_number" class="validation"><i class="fas fa-exclamation-triangle"></i> Telephone Number Already Exist!</p>
                        <label for="telephone_number" class="formlabel form-label"><i class="fa fa-phone-square" aria-hidden="true" ></i> TELEPHONE NUMBER <span class="span_telephone_number span_all">(Optional)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="search" id="cellphone_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeypress="return event.charCode>=48 && event.charCode<=57">
                        <p id="cellphone_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number! </p>
                        <p id="duplicate_cellphone_number" class="validation"><i class="fas fa-exclamation-triangle"></i> Cellphone Number Already Exist! </p>
                        <label for="cellphone_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> CELLPHONE NUMBER <span class="span_cellphone_number span_all">(Required)</span> </label>
                    </div>
                </div>
            </div> 
        </div>
    </div>
            <div class="row mb-3 mt-3">
                <div class="col-4">
                        <div class="f-outline">
                            <input class="forminput form-control required_field capitalize" type="search" id="father_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <p id="father_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                            <label for="father_name" class="formlabel form-label"><i class="fas fa-id-card" aria-hidden="true"></i> FATHER'S NAME <span class="span_father_name span_all">(Required)</span> </label>
                        </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control optional" type="search" id="father_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="numbersOnly(this)">
                        <p id="father_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number </p>
                        <p id="duplicate_father_contact_number" class="validation"><i class="fas fa-exclamation-triangle"></i> Contact Number Already Exist! </p>
                        <label for="father_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> FATHER'S CONTACT NO. <span class="span_father_contact_number span_all"> (Optional)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field capitalize" type="search" id="father_profession" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="father_profession" class="formlabel form-label"><i class="fas fa-user-tie"></i> PROFESSION <span class="span_father_profession span_all">(Required)</span> </label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field capitalize" type="search" id="mother_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <p id="mother_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="mother_name" class="formlabel form-label"><i class="fas fa-id-card" aria-hidden="true"></i> MOTHER'S NAME <span class="span_mother_name span_all">(Required)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control optional" type="search" id="mother_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="contactNumberOnly(this)">
                        <p id="mother_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number </p>
                        <p id="duplicate_mother_contact_number" class="validation"><i class="fas fa-exclamation-triangle"></i> Mother Contact Number</p>
                        <label for="mother_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> MOTHER'S CONTACT NO. <span class="span_mother_contact_number span_all">(Optional)</span></label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field capitalize" type="search" id="mother_profession" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="mother_profession" class="formlabel form-label"><i class="fas fa-user-tie"></i> PROFESSION <span class="span_mother_profession span_all">(Required)</span></label>
                    </div>
                </div>
            </div>
    
            <div class="row mb-3">
                <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control required_field capitalize" type="search" id="emergency_contact_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <p id="emergency_contact_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                            <label for="emergency_contact_name" class="formlabel form-label"><i class="fa fa-id-card" aria-hidden="true"></i> INCASE OF EMERGENCY <span class="span_emergency_contact_name span_all">(Required)</span> </label>
                        </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field capitalize" type="search" id="emergency_contact_relationship" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="emergency_contact_relationship" class="formlabel form-label"><i class="fas fa-user-friends"></i> RELATIONSHIP <span class="span_emergency_contact_relationship span_all">(Required)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="search" id="emergency_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="contactNumberOnly(this)">
                        <p id="emergency_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number </p>
                        <p id="duplicate_emergency_contact_number" class="validation"><i class="fas fa-exclamation-triangle"></i> Contact Number Already Exist!</p>
                        <label for="emergency_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> CONTACT NO. <span class="span_emergency_contact_number span_all">(Required)</span> </label>
                    </div>
                </div>
            </div>

            <div class="row mb-2 mt-3" id="spouse">
                <div class="col">
                        <div class="f-outline">
                            <input class="forminput form-control capitalize" type="search" id="spouse_name" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                            <p id="spouse_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number </p>   
                            <label for="spouse_name" class="formlabel form-label"><i class="fas fa-id-card" aria-hidden="true" ></i> SPOUSE NAME <span class="span_spouse_name span_all">(Required)</span> </label>
                        </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control" type="search" id="spouse_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="contactNumberOnly(this)">
                        <p id="spouse_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number </p>
                        <label for="spouse_contact_number" class="formlabel form-label"><i class="fas fa-phone-square" aria-hidden="true" ></i> SPOUSE CONTACT NUMBER <span class="span_spouse_number span_all">(Required)</span> </label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control capitalize" type="search" id="spouse_profession" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <label for="spouse_profession" class="formlabel form-label"><i class="fas fa-user-tie"></i> PROFESSION <span class="span_spouse_profession span_all">(Required)</span> </label>
                    </div>
                </div>
            </div>
            <hr class="hr-design">
            <div  class="row mt-2" id="solo_parent">
                {{-- <strong class="">CHILDREN INFORMATION</strong> --}}
                <br>
                <div class="col-4">
                    <div class="f-outline">
                        <input class="forminput form-control optional capitalize" type="search" id="child_name" placeholder=" " style="background-color: white;" autocomplete="off" onkeyup="lettersOnly(this)">
                        <p id="child_name_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Must be at least 2 characters.</p>
                        <label for="child_name" class="formlabel form-label"><i class="fas fa-id-card"></i> NAME <span class="span_child_name span_all">(Optional)</span></label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="f-outline">
                        <input class="forminput form-control optional" type="date" id="child_birthday" placeholder=" " style="background-color:white;" autocomplete="off" >
                        <label for="child_birthday" class="formlabel form-label"><i class="fas fa-calendar"></i> BIRTHDAY <span class="span_child_birthday span_all">(Optional)</span></label>
                    </div>
                </div>
                <div class="col-1">
                    <div class="f-outline">
                        <input class="forminput form-control optional" type="search" id="child_age" placeholder=" " disabled style="background-color:white;" autocomplete="off">
                        <label for="child_age" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true"></i> AGE</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="f-outline">
                        <select class="form-select forminput form-control optional"  id="child_gender" placeholder=" " style="background-color:white;" autocomplete="off">
                            <option value="" disabled selected>SELECT GENDER </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="child_gender" class="formlabel form-label"><i class="fas fa-venus-mars" aria-hidden="true" ></i> GENDER <span class="span_child_gender span_all">(Optional)</span></label>
                    </div>
                </div>
                <div class="col">
                    <button type="button" id="btnSingleParentAdd" class="btn btn-success center"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            {{-- Solo Parent Data Table --}}
            <table id="solo_parent_data_table" class="table table-bordered table-hover table-striped" style="display: none; width:96%;margin-left:14px;margin-top:15px;">
                <thead class="thead-educational">
                    <tr>
                        <th><i class="fas fa-id-card"></i> NAME</th>
                        <th><i class="fas fa-calendar"></i> BIRTHDAY</th>
                        <th><i class="fas fa-calendar"></i> AGE</th>
                        <th><i class="fas fa-venus-mars"></i> GENDER</th>
                        <th style="width:10%;"><i class="fas fa-id-card"></i> ACTION</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <br>            
</div>{{-- End of Personal Information Nav --}}