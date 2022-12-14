<div id="work_information" class="tab-pane fade" style="border-radius:0px;"><br>
    {{-- Work Information Nav --}}
    
    <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="text" id="employee_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="checkEmployeeNumber()">
                <label for="employee_number" class="formlabel form-label"><i class="fas fa-id-card"></i> EMPLOYEE NO. <span class="span_employee_number">(Required)</span></label>
                <p id="check_duplicate" class="validation"><i class="fas fa-exclamation-triangle"></i> Employee Number already exists!</p>   {{--Validation if employee number exists --}}
            </div>
        </div>
        {{-- <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="text" id="company_of_employee" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                <label for="company_of_employee" class="formlabel form-label"><i class="fas fa-building"></i> COMPANY <span class="span_company_of_employee">(Required)</span></label>
            </div>
        </div> --}}

        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="company_of_employee" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT COMPANY</option>
                    <option value="APSOFT">APSOFT</option>
                    <option value="PHILLOGIX">PHILLOGIX</option>
                </select>
                <label for="company_of_employee" class="formlabel form-label"><i class="fas fa-info"></i> COMPANY <span class="span_company_of_employee">(Required)</span></label>
            </div>
        </div>

        {{-- <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="text" id="branch_of_employee" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                <label for="branch_of_employee" class="formlabel form-label"><i class="fas fa-building"></i> BRANCH <span class="span_branch_of_employee">(Required)</span></label>
            </div>
        </div> --}}
        
        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="branch_of_employee" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT BRANCH</option>
                    <option value="branch1">Branch 1</option>
                    <option value="branch2">Branch 2</option>
                    <option value="branch3">Branch 3</option>
                </select>
                <label for="branch_of_employee" class="formlabel form-label"><i class="fas fa-info"></i> BRANCH <span class="span_branch_of_employee">(Required)</span></label>
            </div>
        </div>

        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="status_of_employee" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT EMPLOYMENT STATUS </option>
                    <option value="Regular">Regular</option>
                    <option value="Intern">Intern</option>
                    <option value="Resigned">Resigned</option>
                    <option value="Agency">Agency</option>
                    <option value="Probationary">Probationary</option>
                </select>
                <label for="status_of_employee" class="formlabel form-label"><i class="fas fa-info"></i> STATUS <span class="span_status_of_employee">(Required)</span></label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="shift_of_employee" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT SHIFT </option>
                    <option value="A9 08:30AM-17:30PM WITH BREAK 11:30AM-12:30PM">A9 08:30AM-17:30PM WITH BREAK 11:30AM-12:30PM</option>
                    <option value="7:00am-4:00pm">7:00am-4:00pm</option>
                </select>
                <label for="shift_of_employee" class="formlabel form-label"><i class="fas fa-clock"></i> SHIFT <span class="span_shift_of_employee">(Required)</span></label>
            </div>
        </div>

        {{-- <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="text" id="position_of_employee" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="lettersOnly(this)">
                <label for="position" class="formlabel form-label"><i class="fas fa-briefcase"></i> POSITION <span class="span_position_of_employee">(Required)</span></label>
            </div>
        </div> --}}

        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="position_of_employee" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT POSITION</option>
                    <option value="Web Developer">Web Developer</option>
                    <option value="Position 2">Position 2</option>
                    <option value="Position 3">Position 3</option>
                </select>
                <label for="position_of_employee" class="formlabel form-label"><i class="fas fa-info"></i> POSITION <span class="span_position_of_employee">(Required)</span></label>
            </div>
        </div>

        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="supervisor_of_employee" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT SUPERVISOR </option>
                    <option value="Gerard Mallari">Gerard Mallari</option>
                    <option value="Supervisor 2">Supervisor 2</option>
                </select>
                <label for="supervisor_of_employee" class="formlabel form-label"><i class="fas fa-user-tie"></i> SUPERVISOR <span class="span_supervisor_of_employee">(Required)</span></label>
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="date" id="date_hired" placeholder=" " style="background-color:white;">
                <label for="date_hired" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true" ></i> DATE HIRED <span class="span_date_hired">(Required)</span></label> 
            </div>
        </div>
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control" type="text" id="company_email_address" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="employeeEmailValidation()">
                <p id="employee_email_validation"><i class="fas fa-exclamation-triangle"></i> Please Enter Valid Email Address</p>
                <label for="company_email_address" class="formlabel form-label"><i class="fas fa-envelope"></i> EMAIL ADDRESS <span class="span_company_email_address">(Optional)</span></label>
            </div>
        </div>
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control" type="text" id="company_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="contactNumberOnly(this)">
                <p id="company_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number </p>
                <label for="company_contact_number" class="formlabel form-label"><i class="fas fa-hashtag" aria-hidden="true"></i> CONTACT NO. <span class="span_company_contact_number">(Optional)</span></label>
            </div>
        </div>
    </div>

    {{-- <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="text" id="sss_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                <label for="sss_number" class="formlabel form-label"><i class="fas fa-hashtag" aria-hidden="true"></i> SSS Number <span class="span_sss_number">(Required)</span></label>
            </div>
        </div>
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="text" id="pag_ibig_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                <label for="pag_ibig_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> PAG-IBIG NO. <span class="span_pag-ibig_number">(Required)</span></label>
            </div>
        </div>
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="text" id="philhealth_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                <label for="philhealth_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> PHILHEALTH NO. <span class="span_philhealth_number">(Required)</span></label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-4">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="text" id="tin_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                <label for="tin_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> TIN NO. <span class="span_tin_number">(Required)</span></label>
            </div>
        </div>
        <div class="col-4">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="text" id="account_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                <label for="account_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> BANK ACCOUNT NO. <span class="span_account_number">(Required)</span></label>
            </div>
        </div>
    </div> --}}
</div> {{-- End of Work Information Nav --}}