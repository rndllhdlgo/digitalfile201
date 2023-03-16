@extends('layouts.app')

@section('content')
<br>
<input type="hidden" name="hidden_id" id="hidden_id">
<div class="row">
    <div class="col-8">
        <h4 style="color: #0d1a80;" class="my-header">UPDATES</h4>
    </div>
    <div class="col">
        <div id="update_button_group" class="btn-group float-end" role="group" style="display:none;">
            <button type="button" class="btn btn-success" title="APPROVE"><i class="fas fa-check-circle"></i> APPROVE</button>
            <button type="button" class="btn btn-danger" title="REJECT"><i class="fas fa-times-circle"></i> REJECT</button>
        </div>
    </div>
</div>
<hr class="hr-design">

    <div id="updates_datatables">
        <table class="table table-striped table-bordered table-hover w-100 updatesTable" id="updatesTable">
            <thead class="text-white" style="background-color:#0d1a80;">
                <tr>
                    <th> EMPLOYEE NO.</th>
                    <th> FULL NAME</th>
                    <th> POSITION</th>
                    <th> BRANCH</th>
                    <th> EMP. STATUS</th>
                    <th> STATUS</th>
                </tr>
            </thead>
        </table>
    </div>

    <div id="update_form" style="display:none;">
        <ul class="nav nav-tabs" style="border-color:#0d1a80;" role="tablist">
            <li class="nav-item">
                <a class="nav-link pill" id="tab1" data-bs-toggle="tab" href="#update_personal_info"> PERSONAL INFO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link pill" id="tab2" data-bs-toggle="tab" href="#update_education_trainings"> EDUCATION/TRAININGS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link pill" id="tab3" data-bs-toggle="tab" href="#update_job_history"> JOB HISTORY</a>
            </li>
            <li class="nav-item">
                <a class="nav-link pill" id="tab4" data-bs-toggle="tab" href="#update_medical_history"> MEDICAL HISTORY</a>
            </li>
        </ul>
    </div>

    <div id="update_tab_content" class="tab-content" style="display:none;">
            @include('subpages.updates.personal_information')
            @include('subpages.updates.educational_and_trainings_background')
            @include('subpages.updates.job_history')
            @include('subpages.updates.medical_history')
    </div>
@endsection