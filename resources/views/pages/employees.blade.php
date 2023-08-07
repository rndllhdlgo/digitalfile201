@extends('layouts.app')

@section('content')
<br>
        <input type="hidden" name="hidden_id" id="hidden_id">
        <div id="employees_list" style="display:none;">
            <div class="row">
                <div class="col">
                    <h4 style="color: #0d1a80;" class="my-header">EMPLOYEE MASTER FILE <span id="head_title"></span></h4>
                </div>
            </div>

            <hr class="hr-design">

            <div class="row">
                <div class="col ml-2">
                    <a href="#" id="filter" class="text-default" title="Toggle Visible Columns" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content='@include('inc.columnEmployee')'>
                        <b class="mr-1">TOGGLE COLUMNS</b>
                        <i class="fas fa-filter fa-lg" aria-hidden="true"></i>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </a>
                </div>
            </div>

            <div class="table-responsive container-fluid pt-2">
                <table class="table table-striped table-hover table-bordered employeesTable" id="employeesTable" style="width:100%">
                    <thead class="text-white" style="background-color:#0d1a80;" title="CLICK TO SORT">
                        <tr>
                            <th class="fixedCol">
                                <input type="search" id="filter1" class="form-control filter-input" data-column="0" style="border:1px solid #683817"/>
                                EMPLOYEE NO.
                            </th>
                            <th class="fixedCol">
                                <input type="search" class="form-control filter-input" data-column="1" style="border:1px solid #683817"/>
                                FULL NAME
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="2" style="border:1px solid #683817"/>
                                POSITION
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="3" style="border:1px solid #683817"/>
                                BRANCH
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="4" style="border:1px solid #683817"/>
                                EMP. STATUS
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="5" style="border:1px solid #683817"/>
                                COMPANY
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="6" style="border:1px solid #683817"/>
                                DEPARTMENT
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="7" style="border:1px solid #683817"/>
                                DATE HIRED
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="8" style="border:1px solid #683817"/>
                                EMAIL ADDRESS
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="9" style="border:1px solid #683817"/>
                                CELLPHONE NUMBER
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="10" style="border:1px solid #683817"/>
                                TELEPHONE NUMBER
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="11" style="border:1px solid #683817"/>
                                GENDER
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="12" style="border:1px solid #683817"/>
                                CIVIL STATUS
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="13" style="border:1px solid #683817"/>
                                BIRTHDAY
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="14" style="border:1px solid #683817"/>
                                AGE
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="15" style="border:1px solid #683817"/>
                                PROVINCE
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="16" style="border:1px solid #683817"/>
                                CITY
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="17" style="border:1px solid #683817"/>
                                REGION
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="18" style="border:1px solid #683817"/>
                                BLOOD TYPE
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="19" style="border:1px solid #683817"/>
                                RELIGION
                            </th>
                            <th>
                                <input type="search" class="form-control filter-input" data-column="20" style="border:1px solid #683817"/>
                                STATUS
                            </th>
                        </tr>
                    </thead>
                        <tbody title="CLICK TO VIEW">
                        </tbody>
                </table>
            </div>
            <hr class="hr-design">
        </div>

        <div id="employee_information" style="display: none;">
                <h4 style="color: #0d1a80;">EMPLOYEE INFORMATION</h4>
                <br>
                <span class="alert class alert-warning" id="note_required"><i class="fa-solid fa-triangle-exclamation fa-lg"></i> <b> NOTE:</b> All fields are <b>required</b> unless specified <b>optional</b>.</span>
                <div class="btn-group float-end" role="group">
                    <button type="button" id="btnSummary" class="btn btn-primary btnDisabled" title="VIEW" style="border-top-left-radius: 10px !important; border-bottom-left-radius:10px !important;"><i class="fas fa-eye"></i> VIEW SUMMARY</button>
                    <button type="button" id="btnUpdate" class="btn btn-success btnDisabled" title="UPDATE"><i class="fas fa-save"></i> UPDATE</button>
                    <button type="button" class="btn btn-danger" id="btnCancel" title="BACK"><i class="fa-solid fa-arrow-left-long"></i> BACK</button>
                </div>
            <br>
            <br>
            <hr>
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
                        <a class="nav-link pill" id="tab8" data-bs-toggle="tab" href="#compensation_benefits">BENEFITS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab9" data-bs-toggle="tab" href="#logs"> LOGS</a>
                    </li>
                </ul>

                <form method="POST" enctype="multipart/form-data" id="documents_form">
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
                        </div>
                </form>
        </div>

    @include('subpages.summary')
    @include('modals.summaryModal')
@endsection