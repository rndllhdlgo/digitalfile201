<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- <title>{{env('APP_NAME')}}</title> --}}
        <title>DIGITAL 201 FILE</title>
        <link rel="icon" href="/images/ideaserv_systems_logo.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.4.24/dist/sweetalert2.min.css' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

        <link rel="stylesheet" href="/cropper/cropper.min.css">
        <link href="{{asset('css/inc/chosen.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('/css/all.css') }}" rel="stylesheet">

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

        <script src="/cropper/cropper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js" integrity="sha512-vDKWohFHe2vkVWXHp3tKvIxxXg0pJxeid5eo+UjdjME3DBFBn2F8yWOE0XmiFcFbXxrEOR1JriWEno5Ckpn15A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.24/dist/sweetalert2.all.min.js"></script>
        <script src="{{asset('js/inc/chosen.jquery.js')}}"></script>
        <script src="{{asset('js/inc/moment.js')}}"></script>
        <script src="{{asset('js/inc/datetime.js')}}"></script>
        <script src="{{asset('js/inc/printThis.js')}}"></script>
        <script src="{{ env('APP_URL')}}js/global/global.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

        <!-- Insert JS FILES -->
        @if(Request::is('/'))<!--Route-->
            <script src="{{ env('APP_URL')}}js/home/index.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
        @endif

        @if(Request::is('login'))
            <script src="{{ env('APP_URL')}}js/login.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
        @endif

        @if(Request::is('employees'))
            <script src="{{ env('APP_URL')}}js/employees/employees.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/employees/btnAddColumn.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/employees/btnClose.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/employees/btnSaveEmployees.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/employees/btnUpdateEmployees.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/employees/btnViewEmployees.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/employees/inputFieldEffect.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/employees/uploadValidation.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/employees/checkDuplicate.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/employees/restrictions.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/employees/logs.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/employees/summary.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/employees/history.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
        @endif

        @if(Request::is('users'))
            <script src="{{ env('APP_URL')}}js/users/users.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/users/btnSaveUsers.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/users/btnUpdateUsers.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/users/btnViewUsers.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
        @endif

        @if(Request::is('maintenance'))
            <script src="{{ env('APP_URL')}}js/maintenance/maintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/maintenance/btnSaveMaintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/maintenance/btnUpdateMaintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/maintenance/btnViewMaintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/maintenance/dataTablesMaintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
        @endif

        @if(Request::is('updates'))
            <script src="{{ env('APP_URL')}}js/updates/updates.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
        @endif
        @if(Request::is('/') || Request::is('employees') || Request::is('users') || Request::is('maintenance') || Request::is('updates'))
            <script src="{{ env('APP_URL')}}js/global/btnClear.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
            <script src="{{ env('APP_URL')}}js/global/navPill.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
        @endif
</body>
</html>
