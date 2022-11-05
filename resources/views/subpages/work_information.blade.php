<div id="work_information" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                {{-- <input class="forminput form-control required_field capitalize" type="search" id="employee_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="checkEmployeeNumberDuplicate()"> --}}
                {{-- <input class="forminput form-control required_field capitalize" type="search" id="employee_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="checkEmployeeNumberDuplicate()" ondrop="return false;" onpaste="return false;"> --}}
                <input class="forminput form-control required_field capitalize" type="search" id="employee_number" placeholder=" " style="background-color:white;" autocomplete="off" ondrop="return false;" onpaste="return false;">
                <label for="employee_number" class="formlabel form-label"><i class="fas fa-id-card"></i> EMPLOYEE NO. <span class="span_employee_number span_all"><i class="fa-solid fa-triangle-exclamation text-danger" style="zoom: 125%;" title="Required"></i></span></label>
                <p id="check_duplicate" class="validation"><i class="fas fa-exclamation-triangle"></i> Employee Number already exists!</p>
            </div>
        </div>

        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employee_company" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT COMPANY</option>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->company}}</option>
                        @endforeach
                </select>
                <label for="employee_company" class="formlabel form-label"><i class="fas fa-info"></i> COMPANY <span class="span_company_of_employee span_all"><i class="fa-solid fa-triangle-exclamation text-danger" style="zoom: 125%;" title="Required"></i></span></label>
            </div>
        </div>
        
        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employee_branch" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT BRANCH</option>
                    <option value="SAN JUAN">SAN JUAN</option>
                    <option value="Branch 2">Branch 2</option>
                    <option value="Branch 3">Branch 3</option>
                </select>
                <label for="employee_branch" class="formlabel form-label"><i class="fas fa-info"></i> BRANCH <span class="span_employee_branch span_all"><i class="fa-solid fa-triangle-exclamation text-danger" style="zoom: 125%;" title="Required"></i></span></label>
            </div>
        </div>

        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employee_status" placeholder=" " style="background-color:white;" autocomplete="off" onchange="changeEmploymentStatus()">
                    <option value="" disabled selected>SELECT EMPLOYMENT STATUS </option>
                    <option value="Regular">Regular</option>
                    <option value="Intern">Intern</option>
                    <option value="Resigned" id="resigned">Resigned</option>
                    <option value="Agency">Agency</option>
                    <option value="Probationary">Probationary</option>
                    <option value="Resign">Resign</option>
                    <option value="Terminate">Terminate</option>
                    <option value="Retired">Retired</option>
                </select>
                <label for="employee_status" class="formlabel form-label"><i class="fas fa-info"></i> STATUS <span class="span_employee_status span_all"><i class="fa-solid fa-triangle-exclamation text-danger" style="zoom: 125%;" title="Required"></i></span></label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employee_shift" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT SHIFT </option>
                    <option value="A9 08:30AM-17:30PM WITH BREAK 11:30AM-12:30PM">A9 08:30AM-17:30PM WITH BREAK 11:30AM-12:30PM</option>
                    <option value="7:00am-4:00pm">7:00am-4:00pm</option>
                </select>
                <label for="employee_shift" class="formlabel form-label"><i class="fas fa-clock"></i> SHIFT <span class="span_employee_shift span_all"><i class="fa-solid fa-triangle-exclamation text-danger" style="zoom: 125%;" title="Required"></i></span></label>
            </div>
        </div>

        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employee_position" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT POSITION</option>
                    <option value="Jr. Programmer">Jr. Programmer</option>
                    <option value="Position 2">Position 2</option>
                    <option value="Position 3">Position 3</option>
                </select>
                <label for="employee_position" class="formlabel form-label"><i class="fas fa-info"></i> POSITION <span class="span_employee_position span_all"><i class="fa-solid fa-triangle-exclamation text-danger" style="zoom: 125%;" title="Required"></i></span></label>
            </div>
        </div>

        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employee_supervisor" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT SUPERVISOR </option>
                    <option value="Gerard Mallari">Gerard Mallari</option>
                    <option value="Supervisor 2">Supervisor 2</option>
                </select>
                <label for="employee_supervisor" class="formlabel form-label"><i class="fas fa-user-tie"></i> SUPERVISOR <span class="span_employee_supervisor span_all"><i class="fa-solid fa-triangle-exclamation text-danger" style="zoom: 125%;" title="Required"></i></span></label>
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="date" id="date_hired" placeholder=" " style="background-color:white;">
                <label for="date_hired" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true" ></i> DATE HIRED <span class="span_date_hired span_all"><i class="fa-solid fa-triangle-exclamation text-danger" style="zoom: 125%;" title="Required"></i></span></label> 
            </div>
        </div>
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control optional" type="search" id="employee_email_address" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="employeeEmailValidation()" ondrop="return false;" onpaste="return false;" onkeydown="keyDown(event)">
                <p id="employee_email_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter Valid Email Address! </p>
                <p id="duplicate_employee_email" class="validation"><i class="fas fa-exclamation-triangle"></i> Email Already Exist!</p>
                <label for="employee_email_address" class="formlabel form-label"><i class="fas fa-envelope"></i> COMPANY EMAIL ADDRESS <span class="span_employee_email_address span_all">(Optional)</span></label>
            </div>
        </div>
        <div class="col">
            <div class="f-outline">
                {{-- <input class="forminput form-control optional" type="search" id="employee_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" onInput="this.value = phoneFormat(this.value)" ondrop="return false;" onpaste="return false;"> --}}
                <input class="forminput form-control optional" type="search" id="employee_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="14" ondrop="return false;" onpaste="return false;" onkeyup="contactNumberOnly(this)" onkeydown="return ValidateInput(this);">
                <p id="employee_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter Valid Number! </p>
                <p id="duplicate_employee_contact_number" class="validation"><i class="fas fa-exclamation-triangle"></i> Contact Number Already Exist!</p>
                <label for="employee_contact_number" class="formlabel form-label"><i class="fas fa-hashtag" aria-hidden="true"></i> COMPANY CONTACT NO. <span class="span_employee_contact_number span_all">(Optional)</span></label>
            </div>
        </div>
    </div>

    <div id="benefits">
        <div class="row mb-3">
            <div class="col">
                <div class="f-outline">
                    <input class="forminput form-control" type="search" id="sss_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                    <label for="sss_number" class="formlabel form-label"><i class="fas fa-hashtag" aria-hidden="true"></i> SSS Number <span class="span_sss_number span_all"><i class="fa-solid fa-triangle-exclamation text-danger" style="zoom: 125%;" title="Required"></i></span></label>
                </div>
            </div>
            <div class="col">
                <div class="f-outline">
                    <input class="forminput form-control" type="search" id="pag_ibig_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                    <label for="pag_ibig_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> PAG-IBIG NO. <span class="span_pag-ibig_number span_all"><i class="fa-solid fa-triangle-exclamation text-danger" style="zoom: 125%;" title="Required"></i></span></label>
                </div>
            </div>
            <div class="col">
                <div class="f-outline">
                    <input class="forminput form-control" type="search" id="philhealth_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                    <label for="philhealth_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> PHILHEALTH NO. <span class="span_philhealth_number span_all"><i class="fa-solid fa-triangle-exclamation text-danger" style="zoom: 125%;" title="Required"></i></span></label>
                </div>
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col-4">
                <div class="f-outline">
                    <input class="forminput form-control" type="search" id="tin_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                    <label for="tin_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> TIN NO. <span class="span_tin_number span_all"><i class="fa-solid fa-triangle-exclamation text-danger" style="zoom: 125%;" title="Required"></i></span></label>
                </div>
            </div>
            <div class="col-4">
                <div class="f-outline">
                    <input class="forminput form-control" type="search" id="account_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                    <label for="account_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> BANK ACCOUNT NO. <span class="span_account_number span_all"><i class="fa-solid fa-triangle-exclamation text-danger" style="zoom: 125%;" title="Required"></i></span></label>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-design">
</div> {{-- End of Work Information Nav --}}