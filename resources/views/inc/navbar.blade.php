<div class="row">
    <div class="col-9">
        <a href="/" title="IDEASERV">
            <img src="/images/ideaserv_systems_logo.png" alt="Ideaserv Systems Inc" style="height: 100px;width:150px;">
            <p class="digital-file-201">DIGITAL 201 FILE</p>
        </a>
    </div>
    <div class="col-3 mt-3" style="margin-left: -20px !important;">
        <div class="row">
            <div class="col-9" style="text-align: right;">
                <span id="date"></span><br>
                {{ Auth::user()->name }}  [{{ Auth::user()->user_level }}] {{-- Display user name and level --}}
                <a class="nav-link logout-text" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <b><u>LOGOUT</u></b> <i class="fa fa-sign-out ml-2" aria-hidden="true"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
            </div>
            <div class="col-3 p-0 m-0">
                    <a href="#"> <i class="fa fa-user-circle fa-4x p-2" aria-hidden="true" style="color:#0d1a80;"></i> </a>
            </div>
        </div>
    </div>
</div>

    <nav class="navbar navbar-expand-sm" style="background-color:#0d1a80;font-weight:bolder;">
        <div class="container-fluid">
          <ul class="navbar-nav">
                <li class="nav-item">
                     <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/"><i class="fas fa-home"></i> HOME</a>
                </li>
                @if(Auth::user()->user_level == 'ADMIN') {{--ADMIN AUTHENTICATION --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('employees') ? 'active' : '' }}" href="/employees"><i class="fas fa-table"></i> EMPLOYEES MASTER FILE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="/users"><i class="fas fa-users"></i> USERS</a>
                    </li>
                    <li class="nav-item">
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
