@extends('layouts.app')

@section('content')
<br>
<button type="button" class="btn btn-success grow float-end" id="addUserBtn" title="CREATE NEW USER"><i class="fas fa-user-plus"></i></button>
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