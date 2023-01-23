@extends('layouts.app')

@section('content')
<br>
    <input type="hidden" name="hidden_id" id="hidden_id">
        <div id="employees_list">
            <div class="row">
                <div class="col">
                    <h4 style="color: #0d1a80;">EMPLOYEE MASTER FILE <span id="head_title"></span></h4>
                </div>
                <div class="col">
                    @if(Auth::user()->user_level == 'ADMIN' || 'ENCODER') {{--To hide the section based on user level --}}
                        <button type="button" class="btn btn-success float-end grow" id="addEmployeeBtn" title="ADD EMPLOYEE" style="font-weight: bold;"><i class="fas fa-user-plus"></i> ADD EMPLOYEE</button>
                    @endif
                </div>
            </div>
           
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
                            <th> LAST NAME</th>
                            <th> FIRST NAME</th>
                            <th> MIDDLE NAME</th>
                            <th> POSITION</th>
                            <th> BRANCH</th>
                            <th> EMP. STATUS</th> 
                        </tr>
                    </thead>
                        <tbody>
                        </tbody>
                </table>
            <hr class="hr-design">
        </div>

        <div id="employee_information" style="display: none;">
            <h4 style="color: #0d1a80;">EMPLOYEE INFORMATION</h4>
            <br>
            {{-- <span class="alert class alert-primary" id="note_information" style="margin-right:10px;"><i class="fas fa-info-circle fa-lg"></i> <b>EMPLOYEE INFORMATION</b> </span> --}}
            <span class="alert class alert-warning" id="note_required"><i class="fa-solid fa-triangle-exclamation fa-lg"></i> <b> NOTE:</b> All fields are <b>required</b> unless specified <b>optional</b>.</span>
        
            <button type="button" class="btn btn-danger  mx-1 float-end grow" id="btnCancel" title="BACK" style="font-weight: bold;"><i class="fa-solid fa-arrow-left-long"></i> BACK</button>
            <button type="button" class="btn btn-warning mx-1 float-end center grow btnDisabled" id="btnClear" title="CLEAR" style="font-weight: bold;"><i class="fas fa-eraser"></i> CLEAR</button>
            <button type="button" class="btn btn-success mx-1 float-end center grow btnDisabled" id="btnSave" title="SAVE" style="font-weight: bold;"><i class="fas fa-save"></i> SAVE</button>
            <button type="button" class="btn btn-success mx-1 float-end grow btnDisabled" id="btnUpdate" title="SAVE UPDATE" style="font-weight: bold;"><i class="fas fa-save"></i> UPDATE</button>
            <button type="button" class="btn btn-primary mx-1 float-end grow" id="btnSummary" title="VIEW SUMMARY" style="font-weight: bold;"><i class="fas fa-eye"></i> VIEW SUMMARY</button>
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

        @include('subpages.summary')
@endsection