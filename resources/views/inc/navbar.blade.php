<div id="htmlHeader" class="d-flex" style="height: 90px;">
    <div class="row w-100">
        <div class="col-6">
            <a href="/">
                <img src="/images/ideaserv_systems_logo.png" style="width: auto; height: 90px; line-height: 90px; margin-top: -5px;">
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
                        <td class="m-0 p-0 float-end" style="margin-bottom:5x !important;">
                            <span id="lblChangePassword" style="text-decoration:underline; cursor:pointer;">Change Password</span>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-sm mt-1" style="background-color:#0d1a80;font-weight:bolder;">
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
        <ul class="navbar-nav mr-right">
			<a href="/logout" style="color: white; font-size: 16px;" onclick="$('#loading').show(); event.preventDefault(); document.getElementById('logout-form').submit();">
				LOGOUT<i class="fa fa-sign-out mx-2"></i>
			</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
		</ul>
    </div>
</nav>
