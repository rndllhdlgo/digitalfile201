<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Digital File 201</title>
        <link rel="icon" href="/images/ideaserv_systems_logo.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.4.24/dist/sweetalert2.min.css' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="{{ asset('/css/all.css') }}" rel="stylesheet">        
    </head>
<body>
        @if(!Auth::guest())
            @include('inc.navbar')
        @else
            @include('inc.guest')
        @endif

        <div class="container-fluid">
            @yield('content')
        </div>

        <!-- To avoid repeating html structure tags -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.24/dist/sweetalert2.all.min.js"></script>
        
        <!-- Insert JS FILES -->
        @if(Request::is('home'))<!--Route-->
            <script src="{{ env('APP_URL')}}js/home.js"></script>
        @endif
        @if(Request::is('employees')) 
            <script src="{{ env('APP_URL')}}js/btnCancelEdit.js"></script>
        @endif
        @if(Request::is('employees'))
            <script src="{{ env('APP_URL')}}js/btnClear.js"></script>
        @endif
        @if(Request::is('employees'))
            <script src="{{ env('APP_URL')}}js/btnClose.js"></script>
        @endif
        @if(Request::is('employees'))
            <script src="{{ env('APP_URL')}}js/btnEnableEdit.js"></script>
        @endif
        @if(Request::is('employees'))
            <script src="{{ env('APP_URL')}}js/btnSave.js"></script>
        @endif
        @if(Request::is('employees'))
            <script src="{{ env('APP_URL')}}js/btnUpdate.js"></script>
        @endif
        @if(Request::is('employees'))
            <script src="{{ env('APP_URL')}}js/btnView.js"></script>
        @endif
        @if(Request::is('employees'))
            <script src="{{ env('APP_URL')}}js/employees.js"></script>
        @endif
        @if(Request::is('employees'))
            <script src="{{ env('APP_URL')}}js/inputFieldEffect.js"></script>
        @endif
        @if(Request::is('employees'))
            <script src="{{ env('APP_URL')}}js/multipleRow.js"></script>
        @endif
        @if(Request::is('employees'))
            <script src="{{ env('APP_URL')}}js/btnAddColumn.js"></script>
        @endif
        @if(Request::is('employees'))
            <script src="{{ env('APP_URL')}}js/uploadValidation.js"></script>
        @endif
        @if(Request::is('employees'))
            <script src="{{ env('APP_URL')}}js/checkDuplicate.js"></script>
        @endif
        @if(Request::is('employees'))
            <script src="{{ env('APP_URL')}}js/restrictions.js"></script>
        @endif
        @if(Request::is('users'))
        <script src="{{ env('APP_URL')}}js/btnClear.js"></script>
        @endif
        @if(Request::is('users'))
            <script src="{{ env('APP_URL')}}js/btnSave.js"></script>
        @endif
        @if(Request::is('users'))
            <script src="{{ env('APP_URL')}}js/btnUpdate.js"></script>
        @endif
        @if(Request::is('users'))
            <script src="{{ env('APP_URL')}}js/btnView.js"></script>
        @endif
        @if(Request::is('users'))
            <script src="{{ env('APP_URL')}}js/inputFieldEffect.js"></script>
        @endif
        @if(Request::is('login'))
            <script src="{{ env('APP_URL')}}js/login.js"></script>
        @endif
        @if(Request::is('users'))
            <script src="{{ env('APP_URL')}}js/users.js"></script>
        @endif
        @if(Request::is('maintenance'))
            <script src="{{ env('APP_URL')}}js/maintenance.js"></script>
        @endif
        
        <script>
            const d = new Date().toDateString();
            const t = new Date().toLocaleTimeString();
            document.getElementById("date").innerHTML = d + ' ' + t;
        </script>
</body>
</html>
