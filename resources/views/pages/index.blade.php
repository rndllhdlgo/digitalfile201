@extends('layouts.app')

@section('content')
<br>
<strong style="color: #0d1a80;font-size:20px;">USER ACTIVITY LOGS</strong>
    <hr>
    {{-- <div style="width: 100px;height:20px;" class="border border-primary mb-2">
        {{number_format($employees)}}
    </div> --}}
    <table class="table table-striped table-hover table-bordered w-100 user_activity_table" id="user_activity_table">
        <thead class="text-white" style="background-color:#0d1a80;">
            <tr>
                <td class="d-none">
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
            </tr>
            <tr>
                <th>DATE & TIME</th>
                <th style="width:20%">DATE & TIME</th>
                <th style="width:15%">USER NAME</th>
                <th style="width:15%">USER LEVEL</th>
                <th style="width:50%">ACTIVITY</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

@endsection
