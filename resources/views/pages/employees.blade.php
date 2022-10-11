@extends('layouts.app')

@section('content')
<br>
{{-- <select name="toggle_column" id="toggle_column">
    <option value="0">Employee No.</option>
    <option value="1">First Name</option>
    <option value="2">Last Name</option>
    <option value="3">Middle Name</option>
    <option value="4">Position</option>
    <option value="5">Branch</option>
    <option value="6">Status</option>
</select> --}}

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
                                <th><i class="fas fa-id-card"></i> EMPLOYEE NO.</th>
                                <th><i class="fas fa-id-card"></i> FIRST NAME</th>
                                <th><i class="fas fa-id-card"></i> LAST NAME</th>
                                <th><i class="fas fa-id-card"></i> MIDDLE NAME</th>
                                <th><i class="fas fa-briefcase"></i> POSITION</th>
                                <th><i class="fas fa-building"></i> BRANCH</th>
                                <th><i class="fas fa-info"></i> EMPLOYMENT STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
        </div>
        <div id="employee_personal_information">
            <div class="row">
                <div class="col-4">
                    {{-- <span class="alert alert-warning" id="requiredFields"><b id="fill">NOTE:</b> Please fill all the required fields</span> --}}
                    <span class="alert alert-info" id="title_details"></span>
                </div>
                <div class="col-8">
                    <button type="button" class="btn btn-danger  mx-1 float-end grow" id="btnCancel" title="EXIT"><i class="fas fa-times"></i></button>
                    <button type="button" class="btn btn-danger  mx-1 float-end grow" id="btnCancelEdit" title="CANCEL EDIT" style="font-weight: bold;"><i class="fas fa-times"></i></button>
                    <button type="button" class="btn btn-warning mx-1 float-end grow" id="btnClear" title="CLEAR"><i class="fas fa-eraser"></i> </button>
                    <button type="button" class="btn btn-success mx-1 float-end grow" id="btnSave" title="SAVE"><i class="fas fa-save"> </i></button>
                    <button type="button" class="btn btn-success mx-1 float-end grow" id="btnEnableEdit" title="ENABLE EDIT"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-success mx-1 float-end grow" id="btnUpdate" title="SAVE UPDATE"><i class="fas fa-save"></i></button>
                </div>
                <br>
                <br>
                <hr>
            </div>

            {{-- Nav Pills --}}
            <form method="post" id="multiple_data_insert_form">
                <ul class="nav nav-tabs" style="border-color:#0d1a80;" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab1" data-bs-toggle="tab" href="#personal_information"><i class="fas fa-info"></i> PERSONAL INFORMATION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab2" data-bs-toggle="tab" href="#work_information"><i class="fas fa-info"></i> WORK INFORMATION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab3" data-bs-toggle="tab" href="#educational_background"><i class="fas fa-book-open"></i> EDUCATIONAL AND TRAININGS BACKGROUND</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab4" data-bs-toggle="tab" href="#job_history"><i class="fas fa-history"></i> JOB HISTORY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pill" id="tab5" data-bs-toggle="tab" href="#documents"><i class="fas fa-file"></i> DOCUMENTS</a>
                    </li>
                </ul>
            
                <div class="tab-content">
                        @include('subpages.personal_information')
                        @include('subpages.work_information')
                        @include('subpages.educational_and_trainings_background')
                        @include('subpages.job_history')
                        @include('subpages.documents')
                    <br>
                </div>{{--  End of Tab Content  --}}
            </form> {{-- End Form of Multiple Data Insert --}}
        </div> {{-- End of Employee Form --}}
@endsection