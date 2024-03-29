@extends('layouts.app')

@section('content')
<br>
<div class="row">
    <div class="col">
        <h4 style="color: #0d1a80;" class="my-header">USERS</h4>
    </div>
    <div class="col">
        <button type="button" class="btn btn-success float-end" id="addUserBtn" title="ADD USER" style="font-weight: bolder;"><i class="fas fa-user-plus"></i> ADD USER</button>
    </div>
</div>
        <hr class="hr-design">
        <table class="table table-striped table-hover table-bordered w-100 usersTable" id="usersTable">
            <thead class="text-white" style="background-color:#0d1a80;">
                <tr>
                    <td>
                        <select class="form-control filter-select form-select" data-column="0" style="border:1px solid #808080">
                            <option value="" selected></option>
                            @foreach($user_level as $user_levels)
                                <option value="{{strtoupper($user_levels->user_level)}}">{{strtoupper($user_levels->user_level)}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="search" class="form-control filter-input" data-column="1" style="border:1px solid #683817"/>
                    </td>
                    <td>
                        <input type="search" class="form-control filter-input" data-column="2" style="border:1px solid #683817"/>
                    </td>
                    <td>
                        <input type="search" class="form-control filter-input" id="status_filter" data-column="3" style="border:1px solid #683817"/>
                    </td>
                </tr>
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
        <hr class="hr-design">
@include('modals.addUser')

@endsection