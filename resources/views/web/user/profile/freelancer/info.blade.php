<div class="user-profile-aside">
    <div class="profile-ava">
        <div class="profile-ava-img">
            @if(isset($freelancer->avatar['360x360']))
                <img class="img-fluid"  src="{{ asset($freelancer->avatar['360x360']) }}" alt="">
            @else
                @if(Auth::user()->id == $freelancer->user_id)
                    <a href="/{{ app()->getLocale()}}/freelancer/edit/personal"><div class="no-ava"><span>Загрузить аватар</span></div></a>
                @endif
            @endif
        </div>
        {{-- @if($isVerify->activated == '1')
            <div class="verify" data-toggle="tooltip" data-placement="bottom" title="Пользователь активен"><span class="jam jam-check"></span></div>
        @else
            <div class="noverify" data-toggle="tooltip" data-placement="bottom" title="Пользователь еще верифицирован"><span class="jam jam-close-circle"></span></div>
        @endif --}}
    </div>
    <div class="profile-info">
        <div class="profile-info-name">@if($freelancer->first_name){{ $freelancer->first_name }}@endif @if($freelancer->last_name){{ $freelancer->last_name}} @endif</div>
        @if($sphere)
        <div class="profile-info-spec">{{ $sphere->title[app()->getLocale()] }}</div>
        @endif
        <div class="profile-info-loc"> 
            <span class="profile-info-loc-span"></span>
            @if(isset($country->title_ru))  {{ $country->title_ru }}, @endif @if($freelancer->city){{ $freelancer->city }} @endif
        </div>
    </div>
    <div class="profile-info-contact">
        <h6 class="profile-title">
            Контактная информация
        </h6>
        <div class="profile-info-contact-list">
            <div class="profile-info-contact-capture">Электронный адрес</div>
            @if($user->email)
            <a id="showEmail" class="btn-show"><span class="jam jam-inbox"></span>Показать почту</a>
            <div id="hideEmail" style="display: none; margin-top:12px" class="profile-info-contact-body">{{ $user->email }}</div>
            @endif
        </div>
        <div class="profile-info-contact-list">
            <div class="profile-info-contact-capture">Телефонный номер</div>
            @if($freelancer->contacts[app()->getLocale()]['phone'])
                <a id="showPhone" class="btn-show"><span class="jam jam-phone"></span>Показать номер</a>
                <div id="hidePhone" style="display: none; margin-top:12px" class="profile-info-contact-body">{{ $freelancer->contacts[app()->getLocale()]['phone'] }}</div>
            @endif
        </div>
    </div>
    <div class="profile-info-contact">
        <h6 class="profile-title">
            Журнал
        </h6>
        <div class="profile-info-contact-list">
            <div class="profile-info-contact-capture">Зарегистрирован</div>
            <div class="profile-info-contact-body">{{ $freelancer->getdate() }}</div>
        </div>
        @if(isset($user->last_login_at))
            <div class="profile-info-contact-list">
                <div class="profile-info-contact-capture">Был последний раз</div>
                <div class="profile-info-contact-body">{{ $user->getLastLogin() }}</div>
            </div>
        @endif
    </div>
    <div class="profile-info-contact">
        <h6 class="profile-title">
            Статистика
        </h6>
        <div class="profile-info-contact-list">
            <div class="profile-info-contact-capture">Просмотры профиля</div>
            <div class="profile-info-contact-body">{{ $views }}</div>
        </div>
    </div>
</div>