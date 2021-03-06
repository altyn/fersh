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
                <ul class="navbar-nav mr-auto left-navbar">
                    <li class="nav-item">
                        <a class="nav-link" href="/{{app()->getLocale()}}/freelancers">Поиск</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/{{app()->getLocale()}}/bid/new">Оставить заявку</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/{{app()->getLocale()}}/blog">Блог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/{{app()->getLocale()}}/about">О нас</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @if(!auth()->user())
                        <li class="nav-item">
                            <a class="nav-link" href="/{{ app()->getLocale() }}/sign_up">Регистрация<span class="jam jam-user-plus"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/{{ app()->getLocale() }}/sign_in">Вход<span class="jam jam-log-in"></span></a>
                        </li>
                    @endif
                    @if( auth()->user() )
                        <li class="nav-item dropdown user-header">
                            <a class="user-header-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(!empty($userinfo))
                                    <div class="user-header-link-login">
                                        <div class="user-header-link-login-img">
                                            @if(!empty($userinfoavatar))
                                                <img src="{{ asset($userinfoavatar) }}" class="d-inline-block align-top" alt="">
                                            @else
                                                {{-- <img src="{{ asset('img/home/avatar.png') }}" class="d-inline-block align-top" alt=""> --}}
                                            @endif
                                        </div>
                                        <div class="user-header-link-login-title">{{ $userinfo->first_name }} {{ $userinfo->last_name }} <span class="jam jam-chevron-down"></span></div>
                                    </div>
                                @else
                                    <div class="user-header-link-login">
                                        <div class="user-header-link-login-img">
                                            <img>
                                        </div>
                                        <div class="user-header-link-login-title">Профиль<span class="jam jam-chevron-down"></span></div>
                                    </div>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/{{app()->getLocale()}}/freelancer/{{ auth()->id()}}"><span class="jam jam-user-circle"></span>Профиль</a>
                                @if(!empty($userinfo))
                                <a class="dropdown-item" href="/{{ app()->getLocale()}}/freelancer/{{ auth()->id()}}/portfolio"><span class="jam jam-folder-open"></span>Портфолио</a>
                                <a class="dropdown-item" href="/{{app()->getLocale()}}/freelancer/edit/personal"><span class="jam jam-cog"></span>Настройки</a>
                                @endif
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