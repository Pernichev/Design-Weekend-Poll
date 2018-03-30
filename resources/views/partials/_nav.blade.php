<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid background-dw-blue">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand white" href="{{ url('/') }}">
                {{ config('app.name', 'DesignWeekend') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <li class={{ Request::is('/') ? "active" : "" }} ><a href="/" class="white background-dw-blue">Анкети<span class="sr-only">(current)</span></a></li>
                    @if(Auth::user())
                        @if( Auth::user()->hasrole('admin'))
                <li class={{ Request::is('question') ? "active" : "" }}><a  class="white background-dw-blue" href="{{ route('question.index') }}">Управление</a></li>
                        @endif
                    @endif
                </ul>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a class="white" href="{{ url('/login') }}">Логин</a></li>
                    <li><a class="white" href="{{ url('/register') }}">Регистрация</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle white" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        {{--<ul class="dropdown-menu" role="menu">--}}
                            <li>
                                <a href="{{ url('/logout') }}" class="white "
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Излизане
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                    </li>
                        {{--</ul>--}}
                @endif
            </ul>
        </div>
    </div>
</nav>