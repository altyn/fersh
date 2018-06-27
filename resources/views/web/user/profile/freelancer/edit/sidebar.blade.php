<div class="col-md-3 col-12">
                    <ul class="list-menu">
                        <li class="list-menu-item list-menu-title"><span class="jam jam-coin"></span>Финансы</li>
                        <li class="list-menu-item">
                            <a href="/{{ app()->getLocale()}}/freelancer/edit/tariff">
                                <span class="jam jam-box"></span>
                                <span class="list-menu-item-title">Тариф</span>
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
                            <a href="/{{ app()->getLocale()}}/freelancer/edit/portfolio" @if($current_four == 'portfolio') class="active" @endif>
                                <span class="jam jam-picture"></span>
                                <span class="list-menu-item-title">Портфолио</span>
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
                    </ul>
                </div>