<div id="work_information" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field capitalize" type="search" id="employee_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="checkEmployeeNumberDuplicate()">
                <label for="employee_number" class="formlabel form-label"><i class="fas fa-id-card"></i> EMPLOYEE NO. <span class="span_employee_number">(Required)</span></label>
                <p id="check_duplicate" class="validation"><i class="fas fa-exclamation-triangle"></i> Employee Number already exists!</p>
            </div>
        </div>

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
        
        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="branch_of_employee" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT BRANCH</option>
                    <option value="Branch 1">Branch 1</option>
                    <option value="Branch 2">Branch 2</option>
                    <option value="Branch 3">Branch 3</option>
                </select>
                <label for="branch_of_employee" class="formlabel form-label"><i class="fas fa-info"></i> BRANCH <span class="span_branch_of_employee">(Required)</span></label>
            </div>
        </div>

        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="status_of_employee" placeholder=" " style="background-color:white;" autocomplete="off" onchange="changeEmploymentStatus()">
                    <option value="" disabled selected>SELECT EMPLOYMENT STATUS </option>
                    <option value="Regular">Regular</option>
                    <option value="Intern">Intern</option>
                    <option value="Resigned" id="resigned">Resigned</option>
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
                <input class="forminput form-control optional" type="search" id="employee_email_address" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="employeeEmailValidation()">
                <p id="employee_email_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter Valid Email Address</p>
                <p id="duplicate_employee_email" class="validation"><i class="fas fa-exclamation-triangle"></i> Email Already Exist!</p>
                <label for="employee_email_address" class="formlabel form-label"><i class="fas fa-envelope"></i> COMPANY EMAIL ADDRESS <span class="span_employee_email_address">(Optional)</span></label>
            </div>
        </div>
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control optional" type="search" id="employee_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" onkeyup="contactNumberOnly(this)">
                <p id="employee_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter 11 Digit Number </p>
                <p id="duplicate_employee_contact_number" class="validation"><i class="fas fa-exclamation-triangle"></i> Contact Number Already Exist!</p>
                <label for="employee_contact_number" class="formlabel form-label"><i class="fas fa-hashtag" aria-hidden="true"></i> COMPANY CONTACT NO. <span class="span_employee_contact_number">(Optional)</span></label>
            </div>
        </div>
    </div>

    <div id="benefits">
        <div class="row mb-3">
            <div class="col">
                <div class="f-outline">
                    <input class="forminput form-control" type="search" id="sss_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                    <label for="sss_number" class="formlabel form-label"><i class="fas fa-hashtag" aria-hidden="true"></i> SSS Number <span class="span_sss_number">(Required)</span></label>
                </div>
            </div>
            <div class="col">
                <div class="f-outline">
                    <input class="forminput form-control" type="search" id="pag_ibig_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                    <label for="pag_ibig_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> PAG-IBIG NO. <span class="span_pag-ibig_number">(Required)</span></label>
                </div>
            </div>
            <div class="col">
                <div class="f-outline">
                    <input class="forminput form-control" type="search" id="philhealth_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                    <label for="philhealth_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> PHILHEALTH NO. <span class="span_philhealth_number">(Required)</span></label>
                </div>
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col-4">
                <div class="f-outline">
                    <input class="forminput form-control" type="search" id="tin_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                    <label for="tin_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> TIN NO. <span class="span_tin_number">(Required)</span></label>
                </div>
            </div>
            <div class="col-4">
                <div class="f-outline">
                    <input class="forminput form-control" type="search" id="account_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                    <label for="account_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> BANK ACCOUNT NO. <span class="span_account_number">(Required)</span></label>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-design">
</div> {{-- End of Work Information Nav --}}