<div id="htmlHeader" class="d-flex" style="height: 90px;">
    <div class="row w-100">
        <div class="col-6">
            <a href="/">
                <img src="/images/ideaserv_systems_logo.png" style="width: auto; height: 90px; line-height: 90px;">
            </a>
            <a href="/" style="color: #0d1a80; font-family: Arial; font-weight: bold; font-size: 25px; line-height: 90px; margin-left: 10px; text-decoration: none;">
                DIGITAL 201 FILE
            </a>
        </div>
        <div class="col-6">
            <table class="mt-2 w-100" style="color: #0d1a80; font-size: 12px; line-height: 20px;">
                <thead>
                    <tr>
                        <td class="m-0 p-0 float-end" style="margin-bottom: 5px !important;">
                            <span id="current_datetime" style="margin-left: 50px;">{{ Carbon\Carbon::now()->isoformat('dddd, MMMM DD, YYYY, h:mm:ss A') }}</span>
                            {{-- <span id="current_speed" class="font-weight-bold"> (Ping: 0.000s)</span> --}}
                        </td>
                        <td  class="m-0 p-0" rowspan="3">
                            <i class="fa fa-user-circle fa-4x float-end" aria-hidden="true" role="button" onclick="$('#lblChangePassword').click()"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="m-0 p-0 float-end" style="margin-bottom: 5px !important;position:static;">
                            {{ Auth::user()->name }}  [{{ Auth::user()->user_level }}]
                        </td>
                    </tr>
                    <tr>
                        <td class="m-0 p-0 float-end" style="margin-bottom: 5px !important;">
                            <a class="nav-link logout-text" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <u style="color: #0d1a80; !important">LOGOUT</u> <i class="fa fa-sign-out ml-2" style="color: #0d1a80; !important" aria-hidden="true"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

    <nav class="navbar navbar-expand-sm" style="background-color:#0d1a80;font-weight:bolder;">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item space">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/"><i class="fas fa-home"></i> HOME</a>
                </li>

                @if(Auth::user()->user_level == 'ADMIN' || Auth::user()->user_level == 'ENCODER') {{--ADMIN AUTHENTICATION --}}
                    <li class="nav-item space">
                        <a class="nav-link {{ Request::is('employees') ? 'active' : '' }}" href="/employees"><i class="fas fa-table"></i> EMPLOYEES MASTER FILE</a>
                    </li>
                @endif
                @if(Auth::user()->user_level == 'ADMIN')
                    <li class="nav-item space">
                        <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="/users"><i class="fas fa-users"></i> USERS</a>
                    </li>
                    <li class="nav-item space">
                        <a class="nav-link {{ Request::is('maintenance') ? 'active' : '' }}" href="/maintenance"><i class="fas fa-users"></i> MAINTENANCE</a>
                    </li>
                @endif
            </ul>

    {{-- <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color:#0d1a80;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul> --}}

                <!-- Right Side Of Navbar -->
                {{-- <ul class="navbar-nav mr-right"> --}}
                    <!-- Authentication Links -->
                    {{-- @guest --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li> --}}
                        {{-- @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif --}}
                    {{-- @else --}}
                        {{-- <li class="nav-item">
                            {{-- <a id="navbarDropdown" class="nav-link" href="/home" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item"><a href="/home" class="nav-link"></a></li> --}}
                        {{-- <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li> --}}
                    {{-- @endguest --}}
                {{-- </ul> --}}
            </div>
        </div>
    </nav>
