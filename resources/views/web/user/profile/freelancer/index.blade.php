@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')
    <div class="container user-profile">
        <div class="row">
            <div class="col-md-3 col-12">
                <div class="user-profile-aside">
                    <div class="profile-ava">
                        <div class="profile-ava-img">
                            <img class="img-fluid"  src="{{ asset('img/home/ava.jpg') }}" alt="">
                        </div>
                        @if($isVerify->activated == '1')
                        {{-- <div class="noverify" data-toggle="tooltip" data-placement="bottom" title="Пользователь еще верифицирован"><span class="jam jam-close-circle"></span></div> --}}
                        @else
                        <div class="verify" data-toggle="tooltip" data-placement="bottom" title="Пользователь верифицирован"><span class="jam jam-check"></span></div>
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
                   
                </div>
            </div>
            <div class="col-md-9 col-12">
                <div class="user-profile-content">
                    <div class="user-profile-content-title">
                        <h6>Информация</h6>
                    </div>
                    <div class="user-profile-content-body">
                        <div class="user-profile-content-list">
                            <div class="user-profile-content-list-capture">Стоимость работы:</div>
                            <div class="user-profile-content-list-body">от 
                                @if(!empty($freelancer->spec['ru']['rate']))
                                {{ $freelancer->spec['ru']['rate'] }} 
                                @endif
                                сомов. за проект</div>
                        </div>
                        <div class="user-profile-content-list">
                            <div class="user-profile-content-list-capture">Профессиональный опыт:</div>
                            <div class="user-profile-content-list-body">Более
                                @if(!empty($freelancer->spec['ru']['experience']))
                                {{ $freelancer->spec['ru']['experience'] }} 
                                @endif
                                лет </div>
                        </div>
                        <div class="user-profile-content-list">
                            <div class="user-profile-content-list-capture">Форма собственности:</div>
                            <div class="user-profile-content-list-body">
                                @if(isset($freelancer->spec['ru']['firm']['LLC']))
                                    Юр лицо,
                                @endif
                                @if(isset($freelancer->spec['ru']['firm']['self']))
                                    ИП,
                                @endif
                                @if(isset($freelancer->spec['ru']['firm']['own_company']))
                                    Физ. лицо
                                @endif
                            </div>
                        </div>
                        <div class="user-profile-content-list">
                            <div class="user-profile-content-list-capture">Способы оплаты:</div>
                            <div class="user-profile-content-list-body">
                                @if(isset($freelancer->spec['ru']['payment_method']['cash']))
                                    наличный расчёт,
                                @endif
                                @if(isset($freelancer->spec['ru']['payment_method']['bank']))
                                    безналичный расчёт,
                                @endif
                                @if(isset($freelancer->spec['ru']['payment_method']['electron']))
                                    электронные деньги
                                @endif
                            </div>
                        </div>

                        <div class="user-profile-content-about">
                            @if(isset($freelancer->bio['ru']['short']))
                                {{ $freelancer->bio['ru']['short'] }}
                            @endif
                        </br>
                        </br>
                            @if(isset($freelancer->bio['ru']['full']))
                                {{ $freelancer->bio['ru']['full'] }}
                            @endif
                        </div>

                        <div class="user-profile-content-list">
                            <div class="user-profile-content-list-skill-title">Услуги</div>
                            <ul class="user-profile-content-list-skill-list">
                                <li><span>Adobe Photoshop</span></li>
                                <li><span>Adobe XD</span></li>
                                <li><span>UI/UX</span></li>
                                <li><span>Брендбуки</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="user-profile-content-title">
                        <h6>Портфолио</h6>
                    </div>
                    <div class="user-profile-content-body user-profile-portfolio">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="user-profile-portfolio-item">
                                    <a href="#"><img  class="img-fluid" src="{{ asset('img/home/3.png') }}" alt=""></a>
                                    <div class="user-profile-portfolio-item-title"><a href="#">Редизайн сайта экологической компании.</a></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="user-profile-portfolio-item">
                                    <a href="#"><img  class="img-fluid" src="{{ asset('img/home/4.png') }}" alt=""></a>
                                    <div class="user-profile-portfolio-item-title"><a href="#">Инфографика для турфирмы.</a></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="user-profile-portfolio-item">
                                    <a href="#"><img  class="img-fluid" src="{{ asset('img/home/5.jpg') }}" alt=""></a>
                                    <div class="user-profile-portfolio-item-title"><a href="#">Эксперимент с оттенками фиолетового цвета</a></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="user-profile-portfolio-item">
                                    <a href="#"><img  class="img-fluid" src="{{ asset('img/home/6.png') }}" alt=""></a>
                                    <div class="user-profile-portfolio-item-title"><a href="#">Иллюстрация обычного фрилансера</a></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="user-profile-portfolio-item">
                                    <a href="#"><img  class="img-fluid" src="{{ asset('img/home/7.jpg') }}" alt=""></a>
                                    <div class="user-profile-portfolio-item-title"><a href="#">Иконка маршрутного такси.</a></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="user-profile-portfolio-item-alls">
                                    <img  class="img-fluid" src="{{ asset('img/home/7.jpg') }}" alt="">
                                    <div class="user-profile-portfolio-item-alls-overlay">
                                        <a href="#">
                                            <div class="user-profile-portfolio-item-alls-number">+14</div>
                                            <div class="user-profile-portfolio-item-alls-text">смотреть всё</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script>

@endsection