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
                    {{-- <li {{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ? 'class=active' : null }}>
                                {!! HTML::link(url('/profile/'.Auth::user()->name), trans('titles.profile')) !!}
                            </li> --}}
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
                    <span>{{ __('Home') }}</span>
                </a>
            </li>
             @role('admin')
            <li>
                <a href="{{ route('users.index') }}">
                    <i class="material-icons">people</i>
                    <span>{{ __('Users') }}</span>
                </a>
                <div class=""></div>
            </li>
            <li>
                <a href="#" class="menu-toggle">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAACNUlEQVR4nO2WvU4UURTHf402QGcDCzFKBIMxVHw8BFoLPgGCBfoCPAHqUkF4APmqxKWgk0cAJbTSAgEkcTe7mzHH/G9yMpmZnYExWvhPJjvn3HPvf87nXfiPfxADwDywCxwB13rsvQbMAf1lElaAFaAJRB2eNrAB3L8t6XPgSoc2gI/AC2AY6NJj79Naa8jW9jy7KelreRDJiwc59jwEtpz3lprCnraBFrDg9E+Ad8Chy/GhdLYW8FZ720U8r7jwBtK7wLIOS8uvrVVlG8hNfwn05iFec+ENpHvS/QTeA+MuxxPAB6Aumz1Hvi3dSp6WaalIQk6Xtfk78DRj7yhwIlvz3DCos5qKZCrmtdEqFOWtJU8DqfXqptJxJa8eOfK69oxIt6EzX2UR12Rk7YGKJtJvID1LyO+Z86gq3ZLkl5J3soiPZTQk+avkMcmbkj+JqKIDTbcumwnJB5KHJduES0Wo5p6Y3B2TK7G6MN2F5B43RJLkGxFfSi51JmeF2trHt8dO2eS1lOKyPkUfdOqKKg4bOOcdLpL9JOK5lHaqq1VQftcVdo/FHLdXlPLBv8PXVNPbwPftceLI43hTgDRKC/eqFu2WMdxxI7OuD5l0BUeO8EZ5iPtcNdugR7O3mnBJBHQ6OMpDjK6ycC0G8pDzJQ2HH3+COMzt8EdgWwM/DaUSG6bc0Gho4M8Aj2M5Lp3YcE99nPRnL6BIYUUUhPXvLPAZ+NYhx6USZ+GvEe8XIP1SJnFh/AIg2z1whiGA7AAAAABJRU5ErkJggg==" alt="rfid-sensor" width="18" height="18">
                    <span>Tags</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="{{ route('tags.index') }}">{{ __('Tag list') }}</a>
                    </li>
                    @can('tags.create')
                    <li>
                        <a href="{{ route('tags.create') }}">{{ __('Tag add') }}</a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endrole
            @role('farmer')
            <li class="header">ASSETS</li>
            <li>
                <a href="{{ route('farms.index') }}">
                    <i class="material-icons">home</i>
                    <span>{{ __('Farmes') }}</span>
                </a>
            </li>
            @endrole
            @role('farmer|guardien|vet')
            <li>
                <a href="{{ route('animals.index') }}">
                    <i class="material-icons">pets</i>
                    <span>{{ __('Animals') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('movements.index') }}">
                    <i class="material-icons">pets</i>
                    <span>{{ __('movements') }}</span>
                </a>
            </li>
            @endrole    
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