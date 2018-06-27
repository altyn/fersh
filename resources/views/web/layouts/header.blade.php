<header class="header">
    <nav class="navbar navbar-expand-lg light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Freelance.kg <span class="badge-beta">BETA</span> </a>
            <div id="hamburger-menu" class="hamburger">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Тарифы</a>
                    </li>
                    @if( auth()->user() )
                        <li class="nav-item dropdown user-header">
                            <a class="user-header-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="user-header-link-img">
                                    <img src="{{ asset('img/sign/avatar.png') }}" width="36" height="36" class="d-inline-block align-top" alt="">
                                </div>
                                <span class="user-header-link-login">{{ Auth::user()->login }} <span class="jam jam-chevron-down"></span></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/{{app()->getLocale()}}/freelancer/{{ auth()->id()}}"><span class="jam jam-user-circle"></span>Профиль</a>
                                <a class="dropdown-item" href="/{{app()->getLocale()}}/freelancer/edit/personal"><span class="jam jam-cog"></span>Настройки</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><span class="jam jam-log-out"></span>Выход</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
<div id="shadow-layer"></div>