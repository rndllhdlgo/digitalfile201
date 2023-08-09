@extends('layouts.app')
@section('content')

<br>
<div class="row">
    <div class="col">
        <h4 style="color: #0d1a80;" class="my-header">MAINTENANCE <span id="maintenance-span"></span> </h4>
    </div>
    <div class="col">
        <button type="button" class="btn btn-success float-end" id="addPositionBtn" title="ADD JOB POSITION" style="font-weight: bold;display:none;"><i class="fas fa-plus"></i> ADD JOB POSITION</button>
    </div>
</div>

<br>
<hr class="hr-design">
    <ul class="nav nav-tabs" style="border-color:#0d1a80;" role="tablist">
        <li class="nav-item ">
            <a class="nav-link pill" id="company_tab" data-bs-toggle="tab" href="#company_div"> COMPANY</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pill" id="department_tab" data-bs-toggle="tab" href="#department_div"> DEPARTMENT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pill" id="branch_tab" data-bs-toggle="tab" href="#branch_div"> BRANCH</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pill" id="shift_tab" data-bs-toggle="tab" href="#shift_div"> SHIFT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pill" id="position_tab" data-bs-toggle="tab" href="#position_div"> JOB POSITION</a>
        </li>
    </ul>

    <div class="tab-content">
        @include('subpages.maintenance.company')
        @include('subpages.maintenance.department')
        @include('subpages.maintenance.branch')
        @include('subpages.maintenance.shift')
        @include('subpages.maintenance.position')
    </div>
@endsection