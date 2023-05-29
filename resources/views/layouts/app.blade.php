<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{env('APP_NAME')}}</title>
        @include('cdn.head')
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

        @include('cdn.body')
        @include('cdn.script')
    </body>
</html>
