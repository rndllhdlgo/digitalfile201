@extends('layouts.app')

@section('content')
<br>
    <input type="hidden" name="hidden_id" id="hidden_id">
        <div id="employees_list">
            <strong style="font-size:20px;color:#0d1a80;">EMPLOYEES MASTER FILE</strong>
            @if(Auth::user()->user_level == 'ADMIN') {{--To hide the section based on user level --}}
                <button type="button" class="btn btn-success float-end grow" id="addEmployeeBtn" title="CREATE NEW" style="font-weight: bold;"><i class="fas fa-user-plus"></i> </button>
            @endif
            <hr>          
                <table class="table table-striped table-hover table-bordered w-100 employeesTable" id="employeesTable">
                    <thead class="text-white" style="background-color:#0d1a80;">
                            <tr>
                                <th style="width:14%"><i class="fas fa-id-card"></i> EMPLOYEE NO.</th>
                                <th style="width:14%"><i class="fas fa-id-card"></i> FIRST NAME</th>
                                <th style="width:14%"><i class="fas fa-id-card"></i> LAST NAME</th>
                                <th style="width:14%"><i class="fas fa-id-card"></i> MIDDLE NAME</th>
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
        <div id="employee_personal_information">
            <div class="row">
                <div class="col-4">
                    <span class="alert class alert-warning" id="title_details"></span>
                </div>
                <div class="col-8">
                    <button type="button" class="btn btn-danger  mx-1 float-end grow" id="btnCancel" title="EXIT"><i class="fas fa-times"></i></button>
                    <button type="button" class="btn btn-danger  mx-1 float-end grow" id="btnCancelEdit" title="CANCEL EDIT" style="font-weight: bold;"><i class="fas fa-times"></i></button>
                    <button type="button" class="btn btn-warning mx-1 float-end center grow btnDisable" id="btnClear" title="CLEAR"><i class="fas fa-eraser"></i> </button>
                    <button type="button" class="btn btn-success mx-1 float-end center grow btnDisable" id="btnSave" title="SAVE"><i class="fas fa-save"> </i></button>
                    <button type="button" class="btn btn-success mx-1 float-end grow" id="btnEnableEdit" title="ENABLE EDIT"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-success mx-1 float-end grow" id="btnUpdate" title="SAVE UPDATE"><i class="fas fa-save"></i></button>
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
                            <span style="font-size: 20px;">Success</span><br>
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
                            <span style="font-size: 20px;">Success</span><br>
                            <span style="font-size: 14px;">Successfully cleared current page of the Form.</span>
                        </div>
                    </div>
                </div>  
            </div>
            
            {{-- Nav Pills --}}
                <ul class="nav nav-tabs" style="border-color:#0d1a80;" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab1" data-bs-toggle="tab" href="#personal_information"> PERSONAL INFORMATION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab2" data-bs-toggle="tab" href="#work_information"> WORK INFORMATION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab3" data-bs-toggle="tab" href="#educational_background"> EDUCATIONAL AND TRAININGS BACKGROUND</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab4" data-bs-toggle="tab" href="#job_history"> JOB HISTORY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab5" data-bs-toggle="tab" href="#performance_evaluation"> PERFORMANCE EVALUATION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab6" data-bs-toggle="tab" href="#documents"> DOCUMENTS</a>
                    </li>
                </ul>
                <form method="POST" enctype="multipart/form-data" action="/employees/storeRequirements" id="requirements_form">
                    @csrf
                    <div class="tab-content">
                        <input type="hidden" name="employee_id" id="employee_id">
                            @include('subpages.personal_information')
                            @include('subpages.work_information')
                            @include('subpages.educational_and_trainings_background')
                            @include('subpages.job_history')
                            @include('subpages.documents')
                            @include('subpages.performance_evaluation')
                        <div class="form-group"><button class="btn btn-success" id="submit_requirements_form" style="display: none;">Upload the File</button></div> {{-- Button for submit documents --}}
                        <br>
                    </div>{{--  End of Tab Content  --}}
        </div> {{-- End of Employee Form --}}
                </form>

        {{-- <img src="/images/ideaserv_systems_logo.png" alt="" id="zoom"> --}}
@endsection