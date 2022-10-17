@extends('layouts.app')

@section('content')

<br>
<strong style="font-size:20px;color:#0d1a80;">MAINTENANCE</strong>
<br><br>

    <ul class="nav nav-tabs" style="border-color:#0d1a80;" role="tablist">
        <li class="nav-item ">
            <a class="nav-link pill" id="company_tab" data-bs-toggle="tab" href="#company"> COMPANY</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pill" id="branch_tab" data-bs-toggle="tab" href="#branch"> BRANCH</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pill" id="shift_tab" data-bs-toggle="tab" href="#shift"> SHIFT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pill" id="position_tab" data-bs-toggle="tab" href="#position"> POSITION</a>
        </li>
        <li class="nav-item">
            <a class="nav-link pill" id="supervisor_tab" data-bs-toggle="tab" href="#supervisor"> SUPERVISOR</a>
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