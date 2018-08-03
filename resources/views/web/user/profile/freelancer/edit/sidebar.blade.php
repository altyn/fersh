<div class="col-md-3 col-12">
    <ul class="list-menu">
        <li class="list-menu-item list-menu-title"><span class="jam jam-coin"></span>Портфолио</li>
        <li class="list-menu-item">
            <a href="/{{ app()->getLocale()}}/freelancer/{{ auth()->id()}}/portfolio/" @if($current_three == 'portfolio') class="active" @endif>
                <span class="jam jam-folder-open"></span>
                <span class="list-menu-item-title">Мои проекты</span>
            </a>
            <a href="/{{ app()->getLocale()}}/freelancer/{{ auth()->id()}}/portfolio/add" @if($current_four == 'add') class="active" @endif>
                <span class="jam jam-plus"></span>
                <span class="list-menu-item-title">Добавить проект</span>
            </a>
        </li>                        
    </ul>
    <ul class="list-menu">
        <li class="list-menu-item list-menu-title"><span class="jam jam-alert"></span>Профиль</li>
        <li class="list-menu-item">
            <a href="/{{ app()->getLocale()}}/freelancer/edit/personal" @if($current_four == 'personal') class="active" @endif>
                <span class="jam jam-user"></span>
                <span class="list-menu-item-title">Личная информация</span>
            </a>
        </li>
        <li class="list-menu-item">
            <a href="/{{ app()->getLocale()}}/freelancer/edit/contacts" @if($current_four == 'contacts') class="active" @endif>
                <span class="jam jam-phone"></span>
                <span class="list-menu-item-title">Контакты</span>
            </a>
        </li>
        <li class="list-menu-item">
            <a href="/{{ app()->getLocale()}}/freelancer/edit/specialization" @if($current_four == 'specialization') class="active" @endif>
                <span class="jam jam-star"></span>
                <span class="list-menu-item-title">Специализация</span>
            </a>
        </li>
        <li class="list-menu-item">
            <a href="/{{ app()->getLocale()}}/freelancer/edit/changepassword" @if($current_four == 'changepassword') class="active" @endif>
                <span class="jam jam-key"></span>
                <span class="list-menu-item-title">Смена пароля</span>
            </a>
        </li>
        <li class="list-menu-item">
            <a href="/{{ app()->getLocale()}}/freelancer/edit/notifications" @if($current_four == 'notifications') class="active" @endif>
                <span class="jam jam-inbox"></span>
                <span class="list-menu-item-title">Почтовые уведомления</span>
            </a>
        </li>
        <li class="list-menu-item">
            <a href="/{{ app()->getLocale()}}/freelancer/edit/accounts" @if($current_four == 'accounts') class="active" @endif>
                <span class="jam jam-facebook-circle"></span>
                <span class="list-menu-item-title">Связанные аккаунты</span>
            </a>
        </li>
    </ul>
</div>