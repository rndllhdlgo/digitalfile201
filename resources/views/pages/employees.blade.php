@extends('layouts.app')

@section('content')
<br>
    <input type="hidden" name="hidden_id" id="hidden_id">
        <div id="employees_list">
            <strong style="font-size:20px;color:#0d1a80;">EMPLOYEES MASTER FILE</strong>
            @if(Auth::user()->user_level == 'ADMIN' || 'ENCODER') {{--To hide the section based on user level --}}
                <button type="button" class="btn btn-success float-end grow" id="addEmployeeBtn" title="ADD EMPLOYEE" style="font-weight: bold;"><i class="fas fa-user-plus"></i> ADD EMPLOYEE</button>
            @endif
            <hr class="hr-design">         
                <table class="table table-striped table-hover table-bordered w-100 employeesTable" id="employeesTable">
                    <thead class="text-white" style="background-color:#0d1a80;">
                        <tr style="background-color: #0d1a80;">
                            <td>
                                <input type="search" class="form-control filter-input" data-column="0" style="border:1px solid #683817"/>
                            </td>
                            <td>
                                <input type="search" class="form-control filter-input" data-column="1" style="border:1px solid #683817"/>
                            </td>
                            <td>
                                <input type="search" class="form-control filter-input" data-column="2" style="border:1px solid #683817"/>
                            </td>
                            <td>
                                <input type="search" class="form-control filter-input" data-column="3" style="border:1px solid #683817"/>
                            </td>
                            <td>
                                <input type="search" class="form-control filter-input" data-column="4" style="border:1px solid #683817"/>
                            </td>
                            <td>
                                <input type="search" class="form-control filter-input" data-column="5" style="border:1px solid #683817"/>
                            </td>
                            <td>
                                <input type="search" class="form-control filter-input" data-column="6" style="border:1px solid #683817"/>
                            </td>
                        </tr>
                        <tr>
                            <th> EMPLOYEE NO.</th>
                            <th> FIRST NAME</th>
                            <th> MIDDLE NAME</th>
                            <th> LAST NAME</th>
                            <th> POSITION</th>
                            <th> BRANCH</th>
                            <th> STATUS</th>
                        </tr>
                    </thead>
                        <tbody>
                        </tbody>
                </table>
            <hr class="hr-design">
        </div>

        <div id="employee_information" style="display: none; margin-top:10px;">
            <span class="alert class alert-primary" id="note_information" style="margin-right:10px;"><i class="fas fa-info-circle fa-lg"></i> <b>EMPLOYEE INFORMATION</b> </span>
            <span class="alert class alert-warning" id="note_required"><i class="fa-solid fa-triangle-exclamation fa-lg"></i> <b> NOTE:</b> All fields are <b>required</b> unless specified <b>optional</b>.</span>
        
            <button type="button" class="btn btn-danger  mx-1 float-end grow" id="btnCancel" title="BACK" style="font-weight: bold;"><i class="fa-solid fa-arrow-left-long"></i> BACK</button>
            <button type="button" class="btn btn-warning mx-1 float-end center grow btnDisabled" id="btnClear" title="CLEAR" style="font-weight: bold;"><i class="fas fa-eraser"></i> CLEAR</button>
            <button type="button" class="btn btn-success mx-1 float-end center grow btnDisabled" id="btnSave" title="SAVE" style="font-weight: bold;"><i class="fas fa-save"></i> SAVE</button>
            <button type="button" class="btn btn-success mx-1 float-end grow btnDisabled" id="btnUpdate" title="SAVE UPDATE" style="font-weight: bold;"><i class="fas fa-save"></i> UPDATE</button>
            <button type="button" class="btn btn-success mx-1 float-end grow" id="btnSummary" title="VIEW SUMMARY" style="font-weight: bold;"><i class="fas fa-eye"></i> VIEW SUMMARY</button>
        <br>
        <br>
        <hr>

            <div class="toast-container position-fixed top-0 end-0 p-3">
                <div id="clearAll" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="row border border-success">
                        <div class="col-1 bg-success">
                            <i class="fa-solid fa-check fa-2x text-white" style="margin-left: -10px;margin-top:10px;"></i>
                        </div>
                        <div class="col bg-white">
                            <span style="font-size: 17px;">Success</span><br>
                            <span style="font-size: 14px;">Successfully cleared all pages of the Form</span>
                        </div>
                    </div>
                </div>  
            </div>

            <div class="toast-container position-fixed top-0 end-0 p-3">
                <div id="clearCurrent" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="row border border-success">
                        <div class="col-1 bg-success">
                            <i class="fa-solid fa-check fa-2x text-white" style="margin-left: -10px;margin-top:10px;"></i>
                        </div>
                        <div class="col bg-white">
                            <span style="font-size: 17px;">Success</span><br>
                            <span style="font-size: 14px;">Successfully cleared current page of the Form.</span>
                        </div>
                    </div>
                </div>  
            </div>
            
            {{-- Nav Pills --}}
                <ul class="nav nav-tabs" style="border-color:#0d1a80;" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab1" data-bs-toggle="tab" href="#personal_info"> PERSONAL INFO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab2" data-bs-toggle="tab" href="#work_info"> WORK INFO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab3" data-bs-toggle="tab" href="#education_trainings"> EDUCATION/TRAININGS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab4" data-bs-toggle="tab" href="#job_history"> JOB HISTORY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab5" data-bs-toggle="tab" href="#medical_history"> MEDICAL HISTORY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab6" data-bs-toggle="tab" href="#documents"> DOCUMENTS </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab7" data-bs-toggle="tab" href="#evaluation"> EVALUATION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab8" data-bs-toggle="tab" href="#compensation_benefits">COMPENSATION/BENEFITS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab9" data-bs-toggle="tab" href="#logs"> LOGS</a>
                    </li>
                </ul>

                <form method="POST" enctype="multipart/form-data" action="/employees/saveDocuments" id="documents_form">
                    @csrf
                        <div class="tab-content">
                            <input type="hidden" name="employee_id" id="employee_id">
                                @include('subpages.personal_information')
                                @include('subpages.work_information')
                                @include('subpages.compensation_and_benefits')
                                @include('subpages.educational_and_trainings_background')
                                @include('subpages.job_history')
                                @include('subpages.medical_history')
                                @include('subpages.documents')
                                @include('subpages.performance_evaluation')
                                @include('subpages.logs')
                            <br>
                        </div>{{--  End of Tab Content  --}}
                </form>
        </div> {{-- End of Employee Form --}}

        <div class="modal fade" id="summaryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-xxl-down">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #0d1a80;">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Employee Summary Details</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-2" style="overflow-x: hidden;">
                        <h5>PERSONAL INFORMATION</h5>
                        <div class="clear">
                            <div class="column_1_summary">
                                <img id="image_preview_summary">
                            </div>

                            <div class="column_2_summary">
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="f-outline">
                                            <input class="forminput form-control text-capitalize first_name" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="first_name" class="formlabel form-label"><i class="fas fa-address-card"></i> FIRST NAME </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="f-outline">
                                            <input class="forminput form-control text-capitalize middle_name" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="middle_name" class="formlabel form-label"><i class="fas fa-address-card"></i> MIDDLE NAME </label>
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="f-outline">
                                            <input class="forminput form-control text-capitalize last_name" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="last_name" class="formlabel form-label"><i class="fas fa-address-card"></i> LAST NAME </label>
                                        </div>
                                    </div>
                                        
                                    <div class="col">
                                        <div class="f-outline">
                                            <input class="forminput form-control text-capitalize suffix" type="search" placeholder=" " style="background-color:white;">
                                            <label for="suffix" class="formlabel form-label"><i class="fas fa-address-card"></i> SUFFIX </label>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="f-outline">
                                            <input class="forminput form-control text-capitalize nickname" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="nickname" class="formlabel form-label"><i class="fas fa-address-card"></i> NICKNAME </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="f-outline">
                                            <input class="forminput form-control birthday" type="date" placeholder=" " style="background-color:white;" disabled>
                                            <label for="birthday" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true"></i> BIRTHDAY </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="f-outline">
                                            <input class="forminput form-control age" type="text" placeholder=" " disabled style="background-color:white;">
                                            <label for="age" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true"></i> AGE </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="f-outline">
                                            <input class="forminput form-control gender" type="text" placeholder=" " disabled style="background-color:white;">
                                            <label for="gender" class="formlabel form-label"><i class="fas fa-venus-mars" aria-hidden="true" ></i> GENDER </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="f-outline">
                                            <input class="forminput form-control text-capitalize unit" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="unit" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> UNIT/ ROOM #/ FLOOR </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="f-outline">
                                            <input class="forminput form-control text-capitalize lot" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="lot" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> LOT/HOUSE #, STREET NAME </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="f-outline">
                                            <input class="forminput form-control text-capitalize barangay" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="barangay" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> SUBDIVISION, BARANGAY </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="f-outline">
                                            <input type="radio" id="default" name="house" class="house" value="Owned" style="margin-left: 30px;" disabled> Owned
                                            <input type="radio" name="house" class="house" value="Rent" style="margin-left: 30px;" disabled> Rent
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-3">
                                        <div class="f-outline">
                                            <input class="forminput form-control text-capitalize" id="province_summary" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="province" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> PROVINCE </label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="f-outline">
                                            <input class="forminput form-control text-capitalize" id="city_summary" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="city" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> CITY </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="f-outline">
                                            <input class="forminput form-control text-capitalize" id="region_summary" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="region" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> REGION </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="f-outline">
                                            <input class="forminput form-control text-capitalize height" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="height" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> HEIGHT </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="f-outline">
                                            <input class="forminput form-control text-capitalize weight" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="weight" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> WEIGHT </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="f-outline">
                                            <input class="forminput form-control text-capitalize religion" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="religion" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> RELIGION </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="f-outline">
                                            <input class="forminput form-control text-capitalize civil_status" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="civil_status" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> CIVIL STATUS </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <div class="f-outline">
                                            <input class="forminput form-control email_address" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="email_address" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> EMAIL ADDRESS </label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="f-outline">
                                            <input class="forminput form-control telephone_number" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="telephone_number" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> TELEPHONE NUMBER </label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="f-outline">
                                            <input class="forminput form-control cellphone_number" type="search" placeholder=" " style="background-color:white;" disabled>
                                            <label for="cellphone_number" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> CELLPHONE NUMBER </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control father_name" type="search" placeholder=" " style="background-color:white;" disabled>
                                    <label for="father_name" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> FATHER'S NAME </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control father_contact_number" type="search" placeholder=" " style="background-color:white;" disabled>
                                    <label for="father_contact_number" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> FATHER'S CONTACT NO. </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control father_profession" type="search" placeholder=" " style="background-color:white;" disabled>
                                    <label for="father_profession" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> PROFESSION </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control mother_name" type="search" placeholder=" " style="background-color:white;" disabled>
                                    <label for="mother_name" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> MOTHER'S MAIDEN NAME </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control mother_contact_number" type="search" placeholder=" " style="background-color:white;" disabled>
                                    <label for="mother_contact_number" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> MOTHER'S CONTACT NO. </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control mother_profession" type="search" placeholder=" " style="background-color:white;" disabled>
                                    <label for="mother_profession" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> PROFESSION </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control emergency_contact_name" type="search" placeholder=" " style="background-color:white;" disabled>
                                    <label for="emergency_contact_name" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> INCASE OF EMERGENCY NAME </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control emergency_contact_relationship" type="search" placeholder=" " style="background-color:white;" disabled>
                                    <label for="emergency_contact_relationship" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> RELATIONSHIP </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control emergency_contact_number" type="search" placeholder=" " style="background-color:white;" disabled>
                                    <label for="emergency_contact_number" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> CONTACT NO. </label>
                                </div>
                            </div>
                        </div>

                        <hr class="hr-design">
                        <h5>WORK INFORMATION</h5>
                        
                        <div class="row mb-3 mt-4">
                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control employee_number" type="search" placeholder=" " style="background-color:white;" disabled>
                                    <label for="employee_number" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> EMPLOYEE NO. </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="f-outline">
                                    <select class="forminput form-control employee_company" placeholder=" " style="background-color:white;" disabled>
                                        <option value="" disabled selected>SELECT COMPANY</option>
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}">{{$company->company_name}}</option>
                                            @endforeach
                                    </select>
                                    <label for="employee_company" class="formlabel form-label"><i class="fa-solid fa-building"></i> COMPANY</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="f-outline">
                                    <select class="forminput form-control employee_department" placeholder=" " style="background-color:white;" disabled>
                                        <option value="" disabled selected>SELECT DEPARTMENT</option>
                                        @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->department}}</option>
                                            @endforeach
                                    </select>
                                    <label for="employee_department" class="formlabel form-label"><i class="fa-solid fa-building"></i> DEPARTMENT </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="f-outline">
                                    <select class="forminput form-control employee_branch" placeholder=" " style="background-color:white;" disabled>
                                        <option value="" disabled selected>SELECT BRANCH</option>
                                            @foreach($branches as $branch)
                                                <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                            @endforeach
                                    </select>
                                    <label for="employee_branch" class="formlabel form-label"><i class="fa-solid fa-building"></i> BRANCH <span class="span_employee_branch span_all"></span></label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="f-outline">
                                    <select class="forminput form-control"  id="employment_status_summary" placeholder=" " style="background-color:white;" autocomplete="off" onchange="changeEmploymentStatus()" disabled>
                                        <option value="" disabled selected>SELECT EMPLOYMENT STATUS </option>
                                        <option value="Regular">Regular</option>
                                        <option value="Intern">Intern</option>
                                        <option value="Agency">Agency</option>
                                        <option value="Probationary">Probationary</option>
                                        <option value="Part_Time">Part Time</option>
                                        <option value="Resign" id="resign">Resign</option>
                                        <option value="Terminate" id="terminate">Terminate</option>
                                        <option value="Retired" id="retired">Retired</option>
                                    </select>
                                    <label for="employment_status_summary" class="formlabel form-label"><i class="fas fa-info"></i> EMPLOYMENT STATUS <span class="span_employment_status span_all"></span></label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control employment_origin" type="search" placeholder=" " style="background-color:white;" disabled>
                                    <label for="employment_origin" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> EMPLOYMENT ORIGIN </label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="f-outline">
                                    <select class="forminput form-control employee_shift" placeholder=" " style="background-color:white;" disabled>
                                        <option value="" disabled selected>SELECT SHIFT </option>
                                            @foreach($shifts as $shift)
                                                <option value="{{$shift->id}}">{{$shift->shift_code}} {{$shift->shift_working_hours}}  WITH BREAK: {{$shift->shift_break_time}}</option>
                                            @endforeach
                                    </select>
                                    <label for="employee_shift" class="formlabel form-label"><i class="fas fa-clock"></i> SHIFT</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="f-outline">
                                    <select class="forminput form-control employee_supervisor" placeholder=" " style="background-color:white;" disabled>
                                        <option value="" disabled selected>SELECT SUPERVISOR </option>
                                            @foreach($supervisors as $supervisor)
                                                <option value="{{$supervisor->id}}">{{$supervisor->supervisor_name}}</option>
                                            @endforeach
                                    </select>
                                    <label for="employee_supervisor" class="formlabel form-label"><i class="fas fa-user-tie"></i> SUPERVISOR <span class="span_employee_supervisor span_all"></span></label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="f-outline">
                                    <select class="forminput form-control employee_position" placeholder=" " style="background-color:white;" disabled>
                                        <option value="" disabled selected>SELECT POSITION </option>
                                            @foreach($jobPositions as $jobPosition)
                                                <option value="{{$jobPosition->id}}">{{$jobPosition->job_position_name}}</option>
                                            @endforeach
                                    </select>
                                    <label for="employee_position" class="formlabel form-label"><i class="fas fa-user-tie"></i> POSITION </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control date_hired" type="date" placeholder=" " style="background-color:white;" disabled>
                                    <label for="date_hired" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true" ></i> DATE HIRED </label> 
                                </div>
                            </div>

                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control company_email_address" type="search" placeholder=" " style="background-color:white;" disabled>
                                    <label for="company_email_address" class="formlabel form-label"><i class="fas fa-envelope"></i> COMPANY EMAIL</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="f-outline">
                                    <input class="forminput form-control company_contact_number" type="search" placeholder=" " style="background-color:white;" disabled>
                                    <label for="company_contact_number" class="formlabel form-label"><i class="fas fa-hashtag" aria-hidden="true"></i> COMPANY CONTACT #</label>
                                </div>
                            </div>
                        </div>

                        <div id="benefits_summary" style="display: none;">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="f-outline">
                                        <input class="forminput form-control sss_number" type="search" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)" disabled>
                                        <label for="sss_number" class="formlabel form-label"><i class="fas fa-hashtag" aria-hidden="true"></i> SSS NO.</label>
                                    </div>
                                </div>
                                
                                <div class="col">
                                    <div class="f-outline">
                                        <input class="forminput form-control pag_ibig_number" type="search" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)" disabled>
                                        <label for="pag_ibig_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> PAG-IBIG NO.</label>
                                    </div>
                                </div>
                    
                                <div class="col">
                                    <div class="f-outline">
                                        <input class="forminput form-control philhealth_number" type="search" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)" disabled>
                                        <label for="philhealth_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> PHILHEALTH NO.</label>
                                    </div>
                                </div>
                    
                                <div class="col">
                                    <div class="f-outline">
                                        <input class="forminput form-control tin_number" type="search" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)" disabled>
                                        <label for="tin_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> TIN NO.</label>
                                    </div>
                                </div>
                    
                                <div class="col">
                                    <div class="f-outline">
                                        <input class="forminput form-control account_number" type="search" placeholder=" " style="background-color:white;" autocomplete="off" onkeyup="numbersOnly(this)" disabled>
                                        <label for="account_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> BANK ACCOUNT NO.</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                       
                    </div>
                </div>
            </div>
        </div>
@endsection