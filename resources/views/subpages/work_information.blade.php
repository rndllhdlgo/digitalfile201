<div id="work_info" class="tab-pane fade" style="border-radius:0px;">
    <hr class="hr-design">
    <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="search" id="employee_number" placeholder=" " style="background-color:white;" autocomplete="off" >
                <label for="employee_number" class="formlabel form-label"><i class="fas fa-id-card"></i> EMPLOYEE NO.</label>
            </div>
        </div>

        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field future_date" type="date" id="date_hired" placeholder=" " style="background-color:white;" onclick="checkChange(this);" onchange="checkChange(this);">
                <label for="date_hired" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true" ></i> DATE HIRED</label>
            </div>
        </div>

        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control required_field" type="text" id="employee_shift" placeholder=" " style="background-color:white;" readonly>
                <label for="employee_shift" class="formlabel form-label"><i class="fas fa-clock" aria-hidden="true" ></i> EMPLOYEE SHIFT </label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employee_company" placeholder=" " style="background-color:white;" autocomplete="off" onclick="checkChange(this);" onchange="checkChange(this);">
                    <option value="" disabled selected>SELECT COMPANY</option>
                    @foreach($companies as $company)
                        <option value="{{$company->entity}}">{{$company->company_name}}</option>
                    @endforeach
                </select>
                <label for="employee_company" class="formlabel form-label"><i class="fa-solid fa-building"></i> COMPANY</label>
            </div>
        </div>

        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employee_branch" placeholder=" " style="background-color:white;" autocomplete="off" onclick="checkChange(this);" onchange="checkChange(this);">
                    <option value="" disabled selected>SELECT BRANCH</option>
                    @foreach($branches as $branch)
                        <option value="{{$branch->entity03}}">{{$branch->entity03_desc}}</option>
                    @endforeach
                </select>
                <label for="employee_branch" class="formlabel form-label"><i class="fa-solid fa-building"></i> BRANCH</label>
            </div>
        </div>

        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employee_department" placeholder=" " style="background-color:white;" autocomplete="off" onclick="checkChange(this);" onchange="checkChange(this);">
                    <option value="" disabled selected>SELECT DEPARTMENT</option>
                    @foreach($departments as $department)
                        <option value="{{$department->deptcode}}">{{$department->deptdesc}}</option>
                    @endforeach
                </select>
                <label for="employee_department" class="formlabel form-label"><i class="fa-solid fa-building"></i> DEPARTMENT</label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employee_position" placeholder=" " style="background-color:white;" autocomplete="off" onclick="checkChange(this);" onchange="checkChange(this);">
                    <option value="" disabled selected>SELECT POSITION </option>
                    @foreach($jobPositions as $jobPosition)
                        <option value="{{$jobPosition->id}}">{{$jobPosition->job_position_name}}</option>
                    @endforeach
                </select>
                <label for="employee_position" class="formlabel form-label"><i class="fas fa-user-tie"></i> POSITION</label>
            </div>
        </div>

        <div class="col">
            <button type="button" class="btn btn-sm btn-primary p-1 w-100 btnDisabled" id="viewJobDescriptionBtn"><i class="fa-solid fa-eye"></i> View Job Description</button>
        </div>

        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employment_status" placeholder=" " style="background-color:white;" autocomplete="off" onclick="checkChange(this);" onchange="checkChange(this); changeEmploymentStatus();">
                    <option value="" disabled selected>SELECT EMPLOYMENT STATUS </option>
                    <option class="" value="INTERN" rank="1">INTERN</option>
                    <option class="" value="PART TIME" rank="1">PART TIME</option>
                    <option class="" value="AGENCY" rank="1">AGENCY</option>
                    <option class="" value="PROBATIONARY" rank="2">PROBATIONARY</option>
                    <option class="" value="REGULAR" rank="3">REGULAR</option>
                    <option class="" value="RETIRED" id="retired" rank="4">RETIRED</option>
                    <option class="" value="TERMINATED" id="terminate" rank="4">TERMINATED</option>
                    <option class="" value="RESIGNED" id="resign" rank="5">RESIGNED</option>
                </select>
                <label for="employment_status" class="formlabel form-label"><i class="fas fa-info"></i> EMPLOYMENT STATUS</label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <div class="f-outline">
                <select class="form-select forminput form-control required_field"  id="employment_origin" placeholder=" " style="background-color:white;" autocomplete="off" onclick="checkChange(this);" onchange="checkChange(this);">
                    <option value="" disabled selected>SELECT EMPLOYMENT ORIGIN </option>
                    <option value="DIRECT HIRED">DIRECT HIRED</option>
                    <option value="REHIRED">REHIRED</option>
                </select>
                <label for="employment_origin" class="formlabel form-label"><i class="fas fa-info"></i> EMPLOYMENT ORIGIN</label>
            </div>
        </div>

        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control optional_field preventSpace" type="search" id="company_email_address" placeholder=" " style="background-color:white;" autocomplete="off" onclick="checkChange(this);" onkeyup="checkChange(this); duplicateCheck('work_information_tables', 'company_email_address', this.id); emailCheck(this.id);">
                <label for="company_email_address" class="formlabel form-label"><i class="fas fa-envelope"></i> WORK EMAIL (Optional)</label>
            </div>
        </div>

        <div class="col">
            <div class="f-outline">
                <input class="forminput form-control optional_field numberSlice" type="search" id="company_contact_number" placeholder=" " style="background-color:white;" autocomplete="off" onclick="checkChange(this);" onkeyup="checkChange(this); duplicateCheck('work_information_tables', 'company_contact_number', this.id); cellphoneFormat(this.id);">
                <label for="company_contact_number" class="formlabel form-label"><i class="fas fa-hashtag" aria-hidden="true"></i> WORK CONTACT NO.(Optional)</label>
            </div>
        </div>
    </div>

    <div id="benefits" style="display: none;">
        <div class="row mb-3">
            <div class="col">
                <div class="f-outline">
                    <input class="forminput form-control optional_field numberDash" type="search" id="hmo_number" placeholder=" " style="background-color:white;" autocomplete="off" onclick="checkChange(this);" onkeyup="checkChange(this); duplicateCheck('work_information_tables', 'hmo_number', this.id);">
                    <label for="hmo_number" class="formlabel form-label"><i class="fas fa-hashtag" aria-hidden="true"></i> HMO NO. (Optional)</label>
                </div>
            </div>
            <div class="col">
                <div class="f-outline">
                    <input class="forminput form-control optional_field numberDash" type="search" id="sss_number" placeholder=" " style="background-color:white;" autocomplete="off" onclick="checkChange(this);" onkeyup="checkChange(this); duplicateCheck('work_information_tables', 'sss_number', this.id);">
                    <label for="sss_number" class="formlabel form-label"><i class="fas fa-hashtag" aria-hidden="true"></i> SSS NO. (Optional)</label>
                </div>
            </div>
            <div class="col">
                <div class="f-outline">
                    <input class="forminput form-control optional_field numberDash" type="search" id="pag_ibig_number" placeholder=" " style="background-color:white;" autocomplete="off" onclick="checkChange(this);" onkeyup="checkChange(this); duplicateCheck('work_information_tables', 'pag_ibig_number', this.id);">
                    <label for="pag_ibig_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> PAG-IBIG NO. (Optional)</label>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="f-outline">
                    <input class="forminput form-control optional_field numberDash" type="search" id="philhealth_number" placeholder=" " style="background-color:white;" autocomplete="off" onclick="checkChange(this);" onkeyup="checkChange(this); duplicateCheck('work_information_tables', 'philhealth_number', this.id);">
                    <label for="philhealth_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> PHILHEALTH NO. (Optional)</label>
                </div>
            </div>

            <div class="col">
                <div class="f-outline">
                    <input class="forminput form-control optional_field numberDash" type="search" id="tin_number" placeholder=" " style="background-color:white;" autocomplete="off" onclick="checkChange(this);" onkeyup="checkChange(this); duplicateCheck('work_information_tables', 'tin_number', this.id);">
                    <label for="tin_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> TIN NO. (Optional)</label>
                </div>
            </div>

            <div class="col">
                <div class="f-outline">
                    <input class="forminput form-control optional_field numberDash" type="search" id="account_number" placeholder=" " style="background-color:white;" autocomplete="off" onclick="checkChange(this);" onkeyup="checkChange(this); duplicateCheck('work_information_tables', 'account_number', this.id);">
                    <label for="account_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> ACCOUNT NO. (Optional)</label>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-design">

    <div id="resignation_div" style="display: none;">
        <!-- Resignation -->
            <table id="resignationTable" class="table table-bordered table-hover table-striped align-middle">
                <thead class="thead-design">
                    <tr>
                        <th colspan="4">RESIGNATION</th>
                    </tr>
                    <tr>
                        <th style="width:18%"> RESIGNATION REASON</th>
                        <th style="width:30%"> RESIGNATION DATE</th>
                        <th style="width:32%"> RESIGNATION FILE</th>
                        <th style="width:10%"> ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field text-uppercase" type="search" name="resignation_reason[]" id="resignation_reason" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="resignation_reason" class="formlabel form-label">(Optional)</label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field" type="date" name="resignation_date[]" id="resignation_date" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="resignation_date" class="formlabel form-label"></label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <input type="file" class="form-control form_file" name="resignation_file[]" id="resignation_file" onchange="fileValidation('resignation_file')" accept=".pdf">
                        </td>
                        <td>
                            <button type="button" class="btn btn-success center btnActionDisabled" id="btnAddResignationRow" title="ADD ROW"><i class="fas fa-plus"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered table-striped table-hover resignation_table_data" id="resignation_table_data" style="display: none; margin-top:-36px;">
                <thead>
                    <tr>
                        <th style="border:none;"> </th>
                        <th style="border:none;"> </th>
                        <th style="border:none;"> </th>
                        <th style="border-left: none;"> </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <hr class="hr-design hr-resignation" style="display: none;">
    </div>

    <div id="termination_div" style="display: none;">
        <!-- Termination -->
            <table id="terminationTable" class="table table-bordered table-hover table-striped align-middle">
                <thead class="thead-design">
                    <tr>
                        <th colspan="4">TERMINATION</th>
                    </tr>
                    <tr>
                        <th style="width:18%"> TERMINATION REASON</th>
                        <th style="width:30%"> TERMINATION DATE</th>
                        <th style="width:32%"> TERMINATION FILE</th>
                        <th style="width:10%"> ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field text-uppercase" type="search" name="termination_reason[]" id="termination_reason" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="termination_reason" class="formlabel form-label">(Optional)</label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control multiple_field" type="date" name="termination_date[]" id="termination_date" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="termination_date" class="formlabel form-label"></label>
                            </div>
                        </td>
                        <td class="pb-3 pt-3">
                            <input type="file" class="form-control form_file" name="termination_file[]" id="termination_file" onchange="fileValidation('termination_file')" accept=".pdf">
                        </td>
                        <td>
                            <button type="button" class="btn btn-success center btnActionDisabled" id="btnAddTerminationRow" title="ADD ROW"><i class="fas fa-plus"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered table-striped table-hover termination_table_data" id="termination_table_data" style="display: none; margin-top:-36px;">
                <thead>
                    <tr>
                        <th style="border:none;"> </th>
                        <th style="border:none;"> </th>
                        <th style="border:none;"> </th>
                        <th style="border-left: none;"> </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <hr class="hr-design hr-termination" style="display: none;">
    </div>

    <div id="employee_history_div">
        <table class="table table-striped table-bordered table-hover w-100 employee_history_table" id="employee_history_table">
            <thead class="thead-design">
                <tr>
                    <td class="d-none">
                        <input type="search" class="form-control filter-input" data-column="0" style="border:1px solid #0d1a80"/>
                    </td>
                    <td>
                        <input type="search" class="form-control filter-input keyup" data-column="1" style="border:1px solid #0d1a80"/>
                    </td>
                    <td>
                        <input type="search" class="form-control filter-input" data-column="2" style="border:1px solid #0d1a80"/>
                    </td>
                    <td>
                        <input type="search" class="form-control filter-input" data-column="3" style="border:1px solid #0d1a80"/>
                    </td>
                    <td>
                        <input type="search" class="form-control filter-input" data-column="4" style="border:1px solid #0d1a80"/>
                    </td>
                </tr>
                <tr>
                    <th>DATE & TIME</th>
                    <th style="width:20%">DATE & TIME</th>
                    <th style="width:15%">USER NAME</th>
                    <th style="width:15%">USER LEVEL</th>
                    <th style="width:50%">ACTIVITY</th>
                </tr>
            </thead>
            <tbody title="CLICK TO VIEW">
            </tbody>
        </table>
        <hr class="hr-design hr-history">
    </div>

    <div class="modal fade" id="viewJobDescriptionModal" tabindex="-1" aria-labelledby="viewJobDescriptionModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0d1a80;">
                    <h5 class="modal-title text-white" id="jobDescriptionModalTitle"></h5>
                    <button type="button" class="btn-close btn-close-white close" data-bs-dismiss="modal" title="CLOSE"></button>
                </div>
                <div class="modal-body">
                    <strong>JOB DESCRIPTION</strong>
                    <ul class="job_description_div" style="zoom: 110%;color:black;"></ul>

                    <strong>JOB REQUIREMENTS/SKILLS</strong>
                    <ul class="job_requirements_div" style="zoom:110%;color:black"></ul>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div> {{-- End of Work Information Nav --}}