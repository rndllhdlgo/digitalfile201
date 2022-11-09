@extends('layouts.app')

@section('content')

<br>
<strong style="font-size:20px;color:#0d1a80;">MAINTENANCE</strong>
    <button type="button" class="btn btn-success float-end grow" id="addCompanyBtn" title="ADD COMPANY" style="font-weight: bold;"><i class="fas fa-user-plus"></i> ADD COMPANY</button>
    <button type="button" class="btn btn-success float-end grow" id="addBranchBtn" title="ADD BRANCH" style="font-weight: bold;display:none;"><i class="fas fa-user-plus"></i> ADD BRANCH</button>
    <button type="button" class="btn btn-success float-end grow" id="addShiftBtn" title="ADD SHIFT" style="font-weight: bold;display:none;"><i class="fas fa-user-plus"></i> ADD SHIFT</button>
    <button type="button" class="btn btn-success float-end grow" id="addPositionBtn" title="ADD POSITION" style="font-weight: bold;display:none;"><i class="fas fa-user-plus"></i> ADD POSITION</button>
    <button type="button" class="btn btn-success float-end grow" id="addSupervisorBtn" title="ADD SUPERVISOR" style="font-weight: bold;display:none;"><i class="fas fa-user-plus"></i> ADD SUPERVISOR</button>
<br>
<hr class="hr-design">
    <ul class="nav nav-tabs" style="border-color:#0d1a80;" role="tablist">
        <li class="nav-item ">
            <a class="nav-link pill" id="company_tab" data-bs-toggle="tab" href="#company_div"> COMPANY</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pill" id="branch_tab" data-bs-toggle="tab" href="#branch_div"> BRANCH</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pill" id="shift_tab" data-bs-toggle="tab" href="#shift_div"> SHIFT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pill" id="position_tab" data-bs-toggle="tab" href="#position_div"> POSITION</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pill" id="supervisor_tab" data-bs-toggle="tab" href="#supervisor_div"> SUPERVISOR</a>
        </li>
    </ul>

    <div class="tab-content">
        @include('subpages.company')
        @include('subpages.branch')
        @include('subpages.shift')
        @include('subpages.position')
        @include('subpages.supervisor')
    </div>

@endsection