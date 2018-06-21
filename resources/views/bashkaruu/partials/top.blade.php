<div class="top-bar color-scheme-light">
    <div class="top-bar-left">
        <a href="{{ url()->previous() }}" class="top-bar-left-btn"><i class="os-icon os-icon-arrow-left3"></i>Назад</a>
    </div>
    <div class="top-menu-controls">
        <div class="element-search autosuggest-search-activator">
            <input placeholder="Поиск" type="text">
        </div>
        <div class="messages-notifications os-dropdown-trigger os-dropdown-position-left">
            <i class="os-icon os-icon-mail-14"></i>
            <div class="new-messages-count">2</div>
            <div class="os-dropdown light message-list">
                <ul>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w"><img alt="" src="{{asset('img/bash/avatar/avatar.png')}}"></div>
                            <div class="message-content">
                                <h6 class="message-from">Кадыров Элдос</h6>
                                <h6 class="message-title">Обновил аккаунт</h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w"><img alt="" src="{{asset('img/bash/avatar/avatar.png')}}"></div>
                            <div class="message-content">
                                <h6 class="message-from">Шайдылдаев Алтынбек</h6>
                                <h6 class="message-title">Новый пользователь</h6>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
            <i class="os-icon os-icon-ui-46"></i>
            <div class="os-dropdown">
                <div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div>
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
</div>