<div id="work_information" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="search" id="employee_number" placeholder=" " style="background-color:white;" autocomplete="off" ondrop="return false;" onpaste="return false;">
                <label for="employee_number" class="formlabel form-label"><i class="fas fa-id-card"></i> EMPLOYEE NO. <span class="span_employee_number span_all"></span></label>
                <p id="check_duplicate" class="validation"><i class="fas fa-exclamation-triangle"></i> Employee Number already exists!</p>
            </div>
        </div>

        {{-- <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="search" id="employee_salary" placeholder=" " style="background-color:white;" onkeyup="salaryField(this)" autocomplete="off" ondrop="return false;" onpaste="return false;">
                <label for="employee_salary" class="formlabel form-label"><i class="fa-solid fa-peso-sign"></i> BASIC SALARY <span class="span_employee_salary span_all"></span></label>
            </div>
        </div> --}}
        
        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employee_company" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT COMPANY</option>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->company_name}}</option>
                        @endforeach
                </select>
                <label for="employee_company" class="formlabel form-label"><i class="fa-solid fa-building"></i> COMPANY <span class="span_employee_company span_all"></span></label>
            </div>
        </div>
        
        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employee_branch" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT BRANCH</option>
                        @foreach($branches as $branch)
                            <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                        @endforeach
                </select>
                <label for="employee_branch" class="formlabel form-label"><i class="fa-solid fa-building"></i> BRANCH <span class="span_employee_branch span_all"></span></label>
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
                    <option value="Part_Time">Part Time</option>
                    <option value="Resign">Resign</option>
                    <option value="Terminate">Terminate</option>
                    <option value="Retired">Retired</option>
                </select>
                <label for="employee_status" class="formlabel form-label"><i class="fas fa-info"></i> EMPLOYMENT STATUS <span class="span_employee_status span_all"></span></label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employment_origin" placeholder=" " style="background-color:white;" autocomplete="off" onchange="changeEmploymentStatus()">
                    <option value="" disabled selected>SELECT EMPLOYMENT ORIGIN </option>
                    <option value="Newly_Hired">Newly Hired</option>
                    <option value="Direct_Hired">Direct Hired</option>
                    <option value="Rehired">Rehired</option>
                </select>
                <label for="employment_origin" class="formlabel form-label"><i class="fas fa-info"></i> EMPLOYMENT ORIGIN <span class="span_employment_origin span_all"></span></label>
            </div>
        </div>
        
        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employee_shift" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT SHIFT </option>
                        @foreach($shifts as $shift)
                            <option value="{{$shift->id}}">{{$shift->shift_code}} {{$shift->shift_working_hours}}  WITH BREAK: {{$shift->shift_break_time}}</option>
                        @endforeach
                </select>
                <label for="employee_shift" class="formlabel form-label"><i class="fas fa-clock"></i> SHIFT <span class="span_employee_shift span_all"></span></label>
            </div>
        </div>

        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employee_position" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT POSITION </option>
                        @foreach($jobPositions as $jobPosition)
                            <option value="{{$jobPosition->id}}">{{$jobPosition->job_position_name}}</option>
                        @endforeach
                </select>
                <label for="employee_position" class="formlabel form-label"><i class="fas fa-user-tie"></i> POSITION <span class="span_employee_supervisor span_all"></span></label>
            </div>
        </div>

        <div class="col">
            <button type="button" class="btn btn-sm btn-primary grow p-1 w-100 btnDisabled" id="viewJobDescriptionBtn"><i class="fa-solid fa-eye"></i> View Job Description</button>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employee_supervisor" placeholder=" " style="background-color:white;" autocomplete="off">
                    <option value="" disabled selected>SELECT SUPERVISOR </option>
                        @foreach($supervisors as $supervisor)
                            <option value="{{$supervisor->id}}">{{$supervisor->supervisor_name}}</option>
                        @endforeach
                </select>
                <label for="employee_supervisor" class="formlabel form-label"><i class="fas fa-user-tie"></i> SUPERVISOR <span class="span_employee_supervisor span_all"></span></label>
            </div>
        </div>
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="date" id="date_hired" placeholder=" " style="background-color:white;">
                <label for="date_hired" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true" ></i> DATE HIRED <span class="span_date_hired span_all"></span></label> 
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
                <input class="forminput form-control optional" type="search" id="employee_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" maxlength="11" ondrop="return false;" onpaste="return false;" onkeyup="contactNumberOnly(this)">
                {{-- <p id="employee_contact_number_validation" class="validation"><i class="fas fa-exclamation-triangle"></i> Please Enter Valid Number! </p> --}}
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
                    <label for="sss_number" class="formlabel form-label"><i class="fas fa-hashtag" aria-hidden="true"></i> SSS NO. (Optional)<span class="span_sss_number span_all"></span></label>
                </div>
            </div>
            <div class="col">
                <div class="f-outline">
                    <input class="forminput form-control" type="search" id="pag_ibig_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                    <label for="pag_ibig_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> PAG-IBIG NO. (Optional)<span class="span_pag-ibig_number span_all"></span></label>
                </div>
            </div>
            <div class="col">
                <div class="f-outline">
                    <input class="forminput form-control" type="search" id="philhealth_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                    <label for="philhealth_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> PHILHEALTH NO. (Optional)<span class="span_philhealth_number span_all"></span></label>
                </div>
            </div>
            <div class="col">
                <div class="f-outline">
                    <input class="forminput form-control" type="search" id="tin_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                    <label for="tin_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> TIN NO. (Optional)<span class="span_tin_number span_all"></span></label>
                </div>
            </div>
        </div>
    
        <div class="row mb-3">
            <div class="col-3">
                <div class="f-outline">
                    <input class="forminput form-control" type="search" id="account_number" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)">
                    <label for="account_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> BANK ACCOUNT NO. (Optional)<span class="span_account_number span_all"></span></label>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-design">
    
    <div class="modal fade" id="viewJobDescriptionModal" tabindex="-1" aria-labelledby="viewJobDescriptionModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="jobDescriptionModalTitle"></h5>
                    <button type="button" class="btn-close btn-close-white close" data-bs-dismiss="modal" title="CLOSE"></button>
                </div>
                <div class="modal-body">
                    <strong>JOB DESCRIPTION</strong>
                    <ul class="job_description_div" style="zoom: 110%;color:black;">

                    </ul>

                    <strong>JOB REQUIREMENTS/SKILLS</strong>
                    <ul class="job_requirements_div" style="zoom:110%;color:black">

                    </ul>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div> {{-- End of Work Information Nav --}}