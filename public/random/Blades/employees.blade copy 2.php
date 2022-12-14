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
                            <tr>
                                <th style="width:14%"><i class="fas fa-id-card"></i> EMPLOYEE NO.</th>
                                <th style="width:14%"><i class="fas fa-id-card"></i> FIRST NAME</th>
                                <th style="width:14%"><i class="fas fa-id-card"></i> MIDDLE NAME</th>
                                <th style="width:14%"><i class="fas fa-id-card"></i> LAST NAME</th>
                                <th style="width:14%"><i class="fas fa-briefcase"></i> POSITION</th>
                                <th><i class="fas fa-building"></i> BRANCH</th>
                                <th><i class="fas fa-info"></i> EMPLOYMENT STATUS</th>
                            </tr>
                    </thead>
                        <tbody>
                        </tbody>
                    </table>
                <hr class="hr-design">
        </div>

        <div id="employee_personal_information" style="display: none;">
            <div class="row">
                <div class="col">
                    <span class="alert class alert-warning" id="title_details"></span>
                </div>
                <div class="col-7">
                    <button type="button" class="btn btn-danger  mx-1 float-end grow" id="btnCancel" title="BACK" style="font-weight: bold;"><i class="fa-solid fa-arrow-left-long"></i> BACK</button>
                    <button type="button" class="btn btn-danger  mx-1 float-end grow" id="btnCancelEdit" title="CANCEL EDIT" style="font-weight: bold;display:none;"><i class="fas fa-times"></i></button>
                    <button type="button" class="btn btn-warning mx-1 float-end center grow btnDisabled" id="btnClear" title="CLEAR" style="font-weight: bold;"><i class="fas fa-eraser"></i> CLEAR</button>
                    <button type="button" class="btn btn-success mx-1 float-end center grow btnDisabled" id="btnSave" title="SAVE" style="font-weight: bold;"><i class="fas fa-save"></i> SAVE</button>
                    <button type="button" class="btn btn-success mx-1 float-end grow" id="btnEnableEdit" title="ENABLE EDIT"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-success mx-1 float-end grow" id="btnUpdate" title="SAVE UPDATE" style="display: none;"><i class="fas fa-save"></i></button>
                </div>
                <br>
                <br>
                <hr>
            </div>

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
                        <a class="nav-link pill" id="tab1" data-bs-toggle="tab" href="#personal_information"> PERSONAL INFO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab2" data-bs-toggle="tab" href="#work_information"> WORK INFO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab3" data-bs-toggle="tab" href="#compensation_and_benefits"> COMPENSATION/BENEFITS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab4" data-bs-toggle="tab" href="#educational_background"> EDUCATION/TRAININGS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab5" data-bs-toggle="tab" href="#job_history"> JOB HISTORY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab6" data-bs-toggle="tab" href="#medical_history"> MEDICAL HISTORY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab7" data-bs-toggle="tab" href="#performance_evaluation">EVALUATION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab8" data-bs-toggle="tab" href="#documents"> DOCUMENTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab9" data-bs-toggle="tab" href="#logs"> LOGS</a>
                    </li>
                </ul>

                <form method="POST" enctype="multipart/form-data" action="/employees/storeRequirements" id="requirements_form">
                    @csrf
                    <div class="tab-content">
                        <input type="hidden" name="employee_id" id="employee_id">
                            @include('subpages.personal_information')
                            @include('subpages.work_information')
                            @include('subpages.compensation_and_benefits')
                            @include('subpages.educational_and_trainings_background')
                            @include('subpages.job_history')
                            @include('subpages.medical_history')
                            @include('subpages.performance_evaluation')
                            @include('subpages.documents')
                            @include('subpages.logs')
                        <br>
                    </div>{{--  End of Tab Content  --}}
        </div> {{-- End of Employee Form --}}
                </form>

        {{-- <img src="/images/ideaserv_systems_logo.png" alt="" id="zoom"> --}}
@endsection