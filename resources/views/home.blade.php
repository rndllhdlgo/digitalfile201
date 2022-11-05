@extends('layouts.app')

@section('content')
<br>
<strong style="color: #0d1a80;font-size:20px;">USER ACTIVITY LOGS</strong>
    <hr>
    <table class="table table-striped table-hover table-bordered w-100 user_activity_table" id="user_activity_table">
        <thead class="text-white" style="background-color:#0d1a80;">
            <tr>
                <th>DATE & TIME</th>
                <th style="width: 16%;">DATE & TIME</th>
                <th style="width: 18%;">FULLNAME</th>
                <th style="width: 210px;">USER LEVEL</th>
                <th>ACTIVITY</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

@endsection
