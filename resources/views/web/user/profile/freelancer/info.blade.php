<div class="user-profile-aside">
    <div class="profile-ava">
        <div class="profile-ava-img">
            @if(isset($freelancer->avatar['200x200']))
                <img class="img-fluid"  src="{{ asset($freelancer->avatar['200x200']) }}" alt="">
            @else
                <a href="/{{ app()->getLocale()}}/freelancer/edit/personal"><div class="no-ava"><span>Загрузить аватар</span></div></a>
            @endif
        </div>
        @if($isVerify->activated == '1')
            <div class="verify" data-toggle="tooltip" data-placement="bottom" title="Пользователь верифицирован"><span class="jam jam-check"></span></div>
        @else
            {{-- <div class="noverify" data-toggle="tooltip" data-placement="bottom" title="Пользователь еще верифицирован"><span class="jam jam-close-circle"></span></div> --}}
        @endif
    </div>
    <div class="profile-info">
        <div class="profile-info-name">{{ $freelancer->first_name }} {{ $freelancer->last_name}}</div>
        <div class="profile-info-spec">{{ $freelancer->bio['ru']['short'] }}</div>
        <div class="profile-info-loc"> 
            <span class="profile-info-loc-span">
            </span>{{ $country->title_ru }}, {{ $freelancer->city }}, {{ $age }} лет
        </div>
    </div>
    <div class="profile-info-contact">
        <h6 class="profile-title">
            Контактная информация
        </h6>
        <div class="profile-info-contact-list">
            <div class="profile-info-contact-capture">Электронный адрес</div>
            <div class="profile-info-contact-body">{{ $freelancer->contacts['ru']['email'] }}</div>
        </div>
        <div class="profile-info-contact-list">
            <div class="profile-info-contact-capture">Телефонный номер</div>
            <div class="profile-info-contact-body">{{ $freelancer->contacts['ru']['phone'] }}</div>
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
        <div class="profile-info-contact-list">
            <div class="profile-info-contact-capture">Был последний раз</div>
            <div class="profile-info-contact-body">{{ date('d.m.Y') }}</div>
        </div>
    </div>
    <div class="profile-info-contact">
        <h6 class="profile-title">
            Статистика
        </h6>
        <div class="profile-info-contact-list">
            <div class="profile-info-contact-capture">Просмотры профиля</div>
            <div class="profile-info-contact-body">123</div>
        </div>
    </div>
</div>