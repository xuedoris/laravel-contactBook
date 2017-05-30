<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                @if(!App::isLocale('en'))
                <li><a href="{{ url('/locale/en') }}" class="small">English</a>
                </li>
                @endif
                @if(!App::isLocale('fr'))
                <li><a href="{{ url('/locale/fr') }}" class="small">Français</a></li>
                @endif
                @if(!App::isLocale('cn'))
                <li><a href="{{ url('/locale/cn') }}" class="small">中文</a></li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li>
                    @if (Auth::user()->g2fa_secretkey)
                        <a href="{{ url('2fa/disable') }}" class="btn btn-warning">Disable 2FA</a>
                    @else
                        <a href="{{ url('2fa/enable') }}" class="btn btn-primary">Enable 2FA</a>
                    @endif
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>

                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>