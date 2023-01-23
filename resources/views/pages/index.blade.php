@extends('layouts.app')

@section('content')
<br>
<strong style="color: #0d1a80;font-size:20px;">USER ACTIVITY LOGS</strong>
    <hr>
    <div class="row">
        <div class="col">
            <a class="dashhover" href="/employees" style="text-decoration: none;">
                <center>
                    <img class="dashicon text-center" style="height: 100px;" src="{{ asset('/storage/dashboard_icons/employee.png') }}">
                    <div class="dashbox container mt-1" style="z-index: 100; background-color: #0d1a80; color: white; margin-bottom: 5px; line-height: 48px; height: 48px; width: 150px; text-align: center; font-size: 26px; border-radius: 30px;">
                        {{number_format($employees)}}
                    </div>
                    <b class="dashlabel" style="color: #0d1a80; font-size: 20px; padding-top: 10px;">EMPLOYEES</b>
                </center>
            </a>
        </div>
        <div class="col">
            <a class="dashhover" href="/employees?employment_status=regular" style="text-decoration: none;">
                <center>
                    <img class="dashicon text-center" style="height: 100px;" src="{{ asset('/storage/dashboard_icons/employee.png') }}">
                    <div class="dashbox container mt-1" style="z-index: 100; background-color: #0d1a80; color: white; margin-bottom: 5px; line-height: 48px; height: 48px; width: 150px; text-align: center; font-size: 26px; border-radius: 30px;">
                        {{number_format($regular)}}
                    </div>
                    <b class="dashlabel" style="color: #0d1a80; font-size: 20px; padding-top: 10px;">REGULAR</b>
                </center>
            </a>
        </div>
        <div class="col">
            <a class="dashhover" href="/employees?employment_status=probationary" style="text-decoration: none;">
                <center>
                    <img class="dashicon text-center" style="height: 100px;" src="{{ asset('/storage/dashboard_icons/employee.png') }}">
                    <div class="dashbox container mt-1" style="z-index: 100; background-color: #0d1a80; color: white; margin-bottom: 5px; line-height: 48px; height: 48px; width: 150px; text-align: center; font-size: 26px; border-radius: 30px;">
                        {{number_format($probationary)}}
                    </div>
                    <b class="dashlabel" style="color: #0d1a80; font-size: 20px; padding-top: 10px;">PROBATIONARY</b>
                </center>
            </a>
        </div>
        <div class="col">
            <a class="dashhover" href="/employees?employment_status=part_time" style="text-decoration: none;">
                <center>
                    <img class="dashicon text-center" style="height: 100px;" src="{{ asset('/storage/dashboard_icons/employee.png') }}">
                    <div class="dashbox container mt-1" style="z-index: 100; background-color: #0d1a80; color: white; margin-bottom: 5px; line-height: 48px; height: 48px; width: 150px; text-align: center; font-size: 26px; border-radius: 30px;">
                        {{number_format($part_time)}}
                    </div>
                    <b class="dashlabel" style="color: #0d1a80; font-size: 20px; padding-top: 10px;">PART TIME</b>
                </center>
            </a>
        </div>
        <div class="col">
            <a class="dashhover" href="/employees?employment_status=agency" style="text-decoration: none;">
                <center>
                    <img class="dashicon text-center" style="height: 100px;" src="{{ asset('/storage/dashboard_icons/employee.png') }}">
                    <div class="dashbox container mt-1" style="z-index: 100; background-color: #0d1a80; color: white; margin-bottom: 5px; line-height: 48px; height: 48px; width: 150px; text-align: center; font-size: 26px; border-radius: 30px;">
                        {{number_format($agency)}}
                    </div>
                    <b class="dashlabel" style="color: #0d1a80; font-size: 20px; padding-top: 10px;">AGENCY</b>
                </center>
            </a>
        </div>
        <div class="col">
            <a class="dashhover" href="/employees?employment_status=intern" style="text-decoration: none;">
                <center>
                    <img class="dashicon text-center" style="height: 100px;" src="{{ asset('/storage/dashboard_icons/employee.png') }}">
                    <div class="dashbox container mt-1" style="z-index: 100; background-color: #0d1a80; color: white; margin-bottom: 5px; line-height: 48px; height: 48px; width: 150px; text-align: center; font-size: 26px; border-radius: 30px;">
                        {{number_format($intern)}}
                    </div>
                    <b class="dashlabel" style="color: #0d1a80; font-size: 20px; padding-top: 10px;">INTERN</b>
                </center>
            </a>
        </div>
    </div>
    <br>
    <table class="table table-striped table-hover table-bordered w-100 user_activity_table" id="user_activity_table">
        <thead class="text-white" style="background-color:#0d1a80;">
            <tr>
                <td class="d-none">
                    <input type="search" class="form-control filter-input" data-column="0" style="border:1px solid #0d1a80"/>
                </td>
                <td>
                    <input type="search" class="form-control filter-input" data-column="1" style="border:1px solid #0d1a80"/>
                </td>
                <td>
                    <input type="search" class="form-control filter-input" data-column="2" style="border:1px solid #0d1a80"/>
                </td>
                <td>
                    <input type="search" class="form-control filter-input" data-column="3" style="border:1px solid #0d1a80"/>
                </td>
                <td>
                    <input type="search" class="form-control filter-input" data-column="4" style="border:1px solid #0d1a80"/>
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
