<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{env('APP_NAME')}}</title>
        <link rel="icon" href="/images/ideaserv_systems_logo.png">

        <script src="/js/inc/jquery.min.js"></script>
        <link rel="stylesheet" href="/css/inc/mdb.min.css">
        <link rel="stylesheet" href="/css/inc/bootstrap.min.css">
        <link rel="stylesheet" href="/css/inc/bootstrap-icons.css">
        <link rel="stylesheet" href="/css/inc/jquery.dataTables.min.css">
        <link rel="stylesheet" href="/css/inc/buttons.dataTables.min.css">
        <link href="/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" type="text/css"/>
        <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="/css/inc/sweetalert2.min.css">

        <script src="/js/inc/chosen.jquery.min.js"></script>
        <link href="/css/inc/chosen.css" rel="stylesheet" type="text/css"/>
        <link href="/cropper/cropper.min.css" rel="stylesheet">
        <script src="/cropper/cropper.min.js"></script>
        <link href="/css/all.css" rel="stylesheet">

        <input type="hidden" id="APP_TIMEOUT" value="{{ env('APP_TIMEOUT') }}">
    </head>
<body>
        <div id="loading">
            <strong style="font-size: 40px; color:#0d1a80 !important;">PLEASE WAIT...</strong><br>
            <div style="zoom: 400%;" class="spinner-border"></div><br>
            <strong style="font-size: 25px; color:#0d1a80 !important;">
                <i class='fa fa-exclamation-triangle'></i>
                Please DO NOT interrupt or cancel this process.
            </strong>
        </div>

        @if(!Auth::guest())
            <script>$('#loading').show();</script>
            @include('inc.navbar')
            @include('modals.changeUserPassword')
        @else
            @include('inc.guest')
        @endif

        <div class="container-fluid">
            @yield('content')
        </div>

        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        <script src="/js/inc/mdb.min.js"></script>
        <script src="/js/inc/bootstrap.bundle.min.js"></script>
        <script src="/js/inc/jquery.dataTables.min.js"></script>
        <script src="/js/inc/dataTables.buttons.min.js"></script>
        <script src="/js/inc/buttons.html5.min.js"></script>
        <script src="/js/inc/jszip.min.js"></script>
        <script src="/js/inc/sweetalert2.all.min.js"></script>
        <script src="/js/inc/chosen.jquery.js"></script>
        <script src="/js/inc/moment.js"></script>
        <script src="/js/inc/datetime.js"></script>
        <script src="/js/inc/printThis.js"></script>
        <script src="/js/global/global.js?version={{\Illuminate\Support\Str::random(50)}}"></script>

        @if(Request::is('/'))
            <script src="/js/home/index.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
        @endif

        @if(Request::is('login'))
            <script src="/js/login.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
        @endif

        @if(Request::is('employees'))
            <script src="/js/employees/employees.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/employees/btnAddColumn.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/employees/btnClose.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/employees/btnSaveEmployees.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/employees/btnUpdateEmployees.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/employees/btnViewEmployees.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/employees/inputFieldEffect.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/employees/uploadValidation.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/employees/checkDuplicate.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/employees/restrictions.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/employees/logs.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/employees/summary.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/employees/history.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
        @endif

        @if(Request::is('users'))
            <script src="/js/users/users.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/users/btnSaveUsers.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/users/btnUpdateUsers.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/users/btnViewUsers.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
        @endif

        @if(Request::is('maintenance'))
            <script src="/js/maintenance/maintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/maintenance/btnSaveMaintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/maintenance/btnUpdateMaintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/maintenance/btnViewMaintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/maintenance/dataTablesMaintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
        @endif

        @if(Request::is('updates'))
            <script src="/js/updates/updates.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
        @endif
        @if(Request::is('/') || Request::is('employees') || Request::is('users') || Request::is('maintenance') || Request::is('updates'))
            <script src="/js/global/btnClear.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="/js/global/navPill.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
        @endif
</body>
</html>
