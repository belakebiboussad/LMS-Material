<nav class="navbar navbar-default navbar-static-top">
    <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">{!! trans('titles.toggleNav') !!}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        {{-- Branding Image --}}
        <a class="navbar-brand" href="{{ url('/') }}">
            {!! trans('titles.app') !!}
        </a>
    </div>
    <div class="container">
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            {{-- Left Side Of Navbar --}}
            <ul class="nav navbar-nav">
                @role('admin')
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Admin <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>dsq</li>
                        <li>dqsd</li>
                        <li>dqsdqsd</li>
                    </ul>
                </li>
                @endrole
            </ul>
            {{-- Right Side Of Navbar --}}
            <ul class="nav navbar-nav navbar-right">

                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="header_nav">
                    <i class="material-icons">more_vert</i>
                </button>

                <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right demo-list-icon mdl-list" for="header_nav">
                    <li class="mdl-menu__item mdl-list__item">
                        <a href="/" title="{{ trans('titles.home') }}">
                            <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">home</i>
                                {{ trans('titles.home') }}
                            </span>
                        </a>
                    </li>
                    <li class="mdl-menu__item mdl-list__item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="{!! trans('titles.logout') !!}">
                            <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">power_settings_new</i>
                                {{ trans('titles.logout') }}
                            </span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </ul>
        </div>
</nav>