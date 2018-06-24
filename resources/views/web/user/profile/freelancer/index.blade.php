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
                        <div class="verify" data-toggle="tooltip" data-placement="bottom" title="Пользователь верифицирован"><span class="jam jam-check"></span></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-info-name">Яна Куликовская</div>
                        <div class="profile-info-spec">Веб дизайнер</div>
                        <div class="profile-info-loc"> 
                            <span class="profile-info-loc-span">
                            </span>Кыргызстан, Бишкек, 28 лет
                        </div>
                    </div>
                    <div class="profile-info-contact">
                        <h6 class="profile-title">
                            Контактная информация
                        </h6>
                        <div class="profile-info-contact-list">
                            <div class="profile-info-contact-capture">Электронный адрес</div>
                            <div class="profile-info-contact-body">eldos.kadyrov@gmail.com</div>
                        </div>
                        <div class="profile-info-contact-list">
                            <div class="profile-info-contact-capture">Телефонный номер</div>
                            <div class="profile-info-contact-body">+996 555 555 555</div>
                        </div>
                    </div>
                    <div class="profile-info-contact">
                        <h6 class="profile-title">
                            Журнал
                        </h6>
                        <div class="profile-info-contact-list">
                            <div class="profile-info-contact-capture">Зарегистрирован</div>
                            <div class="profile-info-contact-body">25.10.2017</div>
                        </div>
                        <div class="profile-info-contact-list">
                            <div class="profile-info-contact-capture">Был последний раз</div>
                            <div class="profile-info-contact-body">24.06.2018</div>
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
                            <div class="user-profile-content-list-body">от 30 000 сомов. за проект</div>
                        </div>
                        <div class="user-profile-content-list">
                            <div class="user-profile-content-list-capture">Профессиональный опыт:</div>
                            <div class="user-profile-content-list-body">Более 5 лет </div>
                        </div>
                        <div class="user-profile-content-list">
                            <div class="user-profile-content-list-capture">Форма собственности:</div>
                            <div class="user-profile-content-list-body">ИП, Физ. лицо</div>
                        </div>
                        <div class="user-profile-content-list">
                            <div class="user-profile-content-list-capture">Способы оплаты:</div>
                            <div class="user-profile-content-list-body">наличный расчёт, безналичный расчёт, электронные деньги</div>
                        </div>

                        <div class="user-profile-content-about">
                            Занимаюсь разработкой логотипов, фирменного стиля, иконок, рекламных, журнальных и книжных иллюстраций. Рисую открытки, иллюстрации для web, для рекламы и бизнеса.
                        </br>
                        </br>
                            Занимаюсь разработкой логотипов, фирменного стиля, иконок, рекламных, журнальных и книжных иллюстраций. Рисую открытки, иллюстрации для web, для рекламы и бизнеса. Занимаюсь разработкой логотипов, фирменного стиля, иконок, рекламных, журнальных и книжных иллюстраций. Рисую открытки, иллюстрации для web, для рекламы и бизнеса. 
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