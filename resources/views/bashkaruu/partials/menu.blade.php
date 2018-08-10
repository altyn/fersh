<div class="menu-mobile menu-activated-on-click color-scheme-dark">
    <div class="mm-logo-buttons-w">
        <a class="mm-logo" href="/bashkaruu"><span>Панель управления</span></a>
        <div class="mm-buttons">
            <div class="mobile-menu-trigger">
                <div class="os-icon os-icon-hamburger-menu-1"></div>
            </div>
        </div>
    </div>
    <div class="menu-and-user">
        <div class="logged-user-w">
            <div class="avatar-w"><img src="{{asset('img/bash/avatar/avatar.png')}}"></div>
            <div class="logged-user-info-w">
                <div class="logged-user-name">{{auth()->user()->login}}</div>
                <div class="logged-user-role">{{auth()->user()->email}}</div>
            </div>
        </div>
        <ul class="main-menu">
            <li class="sub-header"><span>Страницы</span></li>
            <li class="has-sub-menu">
                <a href="#">
                    <div class="icon-w">
                        <div class="os-icon os-icon-layout"></div>
                    </div>
                    <span>Главная страница</span>
                </a>
                <div class="sub-menu-w">
                    <ul class="sub-menu">
                        <li><a href="/bashkaruu/home/edit">Активные пользователи</a></li>
                        <li><a href="/bashkaruu/blog">Блог</a></li>
                        <li><a href="/bashkaruu/home/excel">Excel</a></li>
                    </ul>
                </div>
            </li>
            <li class="sub-header"><span>Пользователи</span></li>
            <li>
                <a href="{{ route('freelancers.index') }}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-user-male-circle2"></div>
                    </div>
                    <span>Фрилансеры</span>
                </a>
            </li>
            <li>
                <a href="{{ route('freelancers.index') }}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-cv-2"></div>
                    </div>
                    <span>Заказчики</span>
                </a>
            </li>
            <li>
                <a href="{{ route('userview.index') }}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-robot-2"></div>
                    </div>
                    <span>Просмотры</span>
                </a>
            </li>
            <li class="sub-header"><span>Настройки</span></li>
            <li>
                <a href="{{ route('freelancers.index') }}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-tasks-checked"></div>
                    </div>
                    <span>Тарифы</span>
                </a>
            </li>
            <li>
                <a href="{{ route('spec.index') }}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-hierarchy-structure-2"></div>
                    </div>
                    <span>Специализации</span>
                </a>
            </li>
            <li>
                <a href="{{ route('translations.index') }}">
                    <div class="icon-w">
                        <div class="os-icon os-icon-delivery-box-2"></div>
                    </div>
                    <span>Локализация</span>
                </a>
            </li>
            <li class="has-sub-menu">
                <a href="#">
                    <div class="icon-w">
                        <div class="os-icon os-icon-mail"></div>
                    </div>
                    <span>E-Mail рассылка</span>
                </a>
                <div class="sub-menu-w">
                    <ul class="sub-menu">
                        <li><a href="/bashkaruu/activation_emails">Отправить код активации</a></li>
                    </ul>
                    <ul class="sub-menu">
                        <li><a href="/bashkaruu/activation_direct">Отправить код активации адресная</a></li>
                    </ul>
                </div>
            </li>
            <li class="sub-header"><span>Администраторы</span></li>
            <li class="has-sub-menu">
                <a href="#">
                    <div class="icon-w">
                        <div class="os-icon os-icon-users"></div>
                    </div>
                    <span>Пользователи</span>
                </a>
                <div class="sub-menu-w">
                    <ul class="sub-menu">
                        <li><a href="{{route('users.index')}}">Все</a></li>
                        <li><a href="{{route('roles.index')}}">Роли</a></li>
                        <li><a href="{{route('permissions.index')}}">Права</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="menu-w selected-menu-color-light menu-has-selected-link menu-activated-on-click color-scheme-light color-style-default sub-menu-color-light menu-position-side menu-side-left menu-layout-full sub-menu-style-inside">
    <div class="logo-w">
        <a class="logo" href="/bashkaruu">
            <div class="logo-label">Панель управления</div>
        </a>
    </div>
    <div class="logged-user-w">
        <div class="logged-user-i">
            <div class="avatar-w"><img alt="" src="{{asset('img/bash/avatar/avatar.png')}}"></div>
            <div class="logged-user-info-w">
                <div class="logged-user-name">{{auth()->user()->login}}</div>
                <div class="logged-user-role">{{auth()->user()->email}}</div>
            </div>
            <div class="logged-user-toggler-arrow">
                <div class="os-icon os-icon-chevron-down"></div>
            </div>
            <div class="logged-user-menu color-style-bright">
                <div class="logged-user-avatar-info">
                    <div class="avatar-w"><img alt="" src="{{asset('img/bash/avatar/avatar.png')}}"></div>
                    <div class="logged-user-info-w">
                        <div class="logged-user-name">{{auth()->user()->login}}</div>
                        <div class="logged-user-role">{{auth()->user()->email}}</div>
                    </div>
                </div>
                <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                <ul>
                    <li><a href="#"><i class="os-icon os-icon-user-male-circle2"></i><span>Профиль</span></a></li>
                    <li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="os-icon os-icon-signs-11"></i>Выйти</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <h1 class="menu-page-header"></h1>
    <ul class="main-menu">
        <li class="sub-header"><span>Страницы</span></li>
        <li class="has-sub-menu">
            <a href="#">
                <div class="icon-w">
                    <div class="os-icon os-icon-layout"></div>
                </div>
                <span>Главная страница</span>
            </a>
            <div class="sub-menu-w">
                <ul class="sub-menu">
                    <li><a href="/bashkaruu/home/edit">Активные пользователи</a></li>
                    <li><a href="/bashkaruu/blog">Блог</a></li>
                    <li><a href="/bashkaruu/home/excel">Excel</a></li>
                </ul>
            </div>
        </li>
        <li class="sub-header"><span>Пользователи</span></li>
        <li>
            <a href="{{ route('freelancers.index') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-user-male-circle2"></div>
                </div>
                <span>Фрилансеры</span>
            </a>
        </li>
        <li>
            <a href="{{ route('freelancers.index') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-cv-2"></div>
                </div>
                <span>Заказчики</span>
            </a>
        </li>
        <li>
            <a href="{{ route('userview.index') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-robot-2"></div>
                </div>
                <span>Просмотры</span>
            </a>
        </li>
        <li class="sub-header"><span>Настройки</span></li>
        <li>
            <a href="{{ route('freelancers.index') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-tasks-checked"></div>
                </div>
                <span>Тарифы</span>
            </a>
        </li>
        <li>
            <a href="{{ route('spec.index') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-hierarchy-structure-2"></div>
                </div>
                <span>Специализации</span>
            </a>
        </li>
        <li>
            <a href="{{ route('translations.index') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-delivery-box-2"></div>
                </div>
                <span>Локализация</span>
            </a>
        </li>
        <li class="has-sub-menu">
            <a href="#">
                <div class="icon-w">
                    <div class="os-icon os-icon-mail"></div>
                </div>
                <span>E-Mail рассылка</span>
            </a>
            <div class="sub-menu-w">
                <ul class="sub-menu">
                    <li><a href="/bashkaruu/activation_emails">Отправить код активации</a></li>
                </ul>
                <ul class="sub-menu">
                    <li><a href="/bashkaruu/activation_direct">Отправить код активации адресная</a></li>
                </ul>
            </div>
        </li>
        <li class="sub-header"><span>Администраторы</span></li>
        <li class="has-sub-menu">
            <a href="#">
                <div class="icon-w">
                    <div class="os-icon os-icon-users"></div>
                </div>
                <span>Пользователи</span>
            </a>
            <div class="sub-menu-w">
                <ul class="sub-menu">
                    <li><a href="{{route('users.index')}}">Все</a></li>
                    <li><a href="{{route('roles.index')}}">Роли</a></li>
                    <li><a href="{{route('permissions.index')}}">Права</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>