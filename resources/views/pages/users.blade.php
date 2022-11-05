@extends('layouts.app')

@section('content')
<br>
{{-- Toggle column: <a class="toggle-vis" data-column="0">User Level</a> - <a class="toggle-vis" data-column="1">Name</a> - <a class="toggle-vis" data-column="2">Email</a> - <a class="toggle-vis" data-column="3">Status</a> --}}
<button type="button" class="btn btn-success grow float-end" id="addUserBtn" title="ADD USER"><i class="fas fa-user-plus"></i> ADD USER</button>
        <strong style="color: #0d1a80;font-size:20px;">USERS TABLE</strong>
        <hr>
        <table class="table table-striped table-hover table-bordered w-100 usersTable" id="usersTable">
            <thead class="text-white" style="background-color:#0d1a80;">
                <tr>
                    <th style="width:15%;"><i class="fas fa-user"></i> USER LEVEL</th>
                    <th><i class="fas fa-address-card"></i> NAME</th>
                    <th><i class="fas fa-envelope"></i> EMAIL</th>
                    <th style="width:15%;"><i class="fas fa-info"></i> STATUS</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
@include('pages.usersModal')

@endsection