<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('theme/images/user.png') }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome, {{ Auth::user()->name ?? ''}}!</div>
            <div class="email">{{ Auth::user()->email ?? ''}}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="seperator" class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i> {{ __('Logout') }}
                        </a>
                        <form method="POST" id="logout-form" action="{{ route('logout')}}">@csrf</form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li class="active">
                <a href="index.html">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a class="menu-toggle" href="{{ route('users.index') }}">
                    <i class="material-icons">people</i>
                    <span>
                        {{ __('Users') }}
                    </span>
                </a>
            </li>
            <li class="header">ASSETS</li>
            <li>
                <a href="{{ route('farms.index') }}" class="menu-toggle">
                    <i class="material-icons">home</i>
                    <span>{{ __('Farmes')}}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('animals.index') }}">
                    <i class="material-icons">pets</i>
                    <i class="fa fa-cow"></i>
                    <span>Animals</span>
                </a>
            </li>
            <li>
                <a href="pages/changelogs.html">
                    <i class="material-icons">update</i>
                    <span>Tags</span>
                </a>
            </li>
            <li class="header">LABELS</li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2025 <a href="javascript:void(0);">{{ config('app.name') }}</a>.
        </div>
        <div class="version">
            <b>Version: </b> 0.0.1
        </div>
    </div>
    <!-- #Footer -->
</aside>