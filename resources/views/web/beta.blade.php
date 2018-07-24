@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')

<div class="first">
    <div class="container">
        <div class="first-info">
            <div class="row">
                <div class="col-12">
                    <div class="first-info-text">
                        <img src="{{ asset('img/home/quote.png') }}" alt="Quote by Rohith M S from the Noun Project">
                        <blockquote>
                            <h2>Люди верят в то, что они видят</h2>
                            <h6>Ник Паттель, интернет-маркетолог входящий в топ 10</h6>
                        </blockquote>
                        <div class="first-info-second-text">
                             <h3>Клиентам нужно знать какие работы вы выполняли и кто были вашим закачиками.</h3>
                             <h3>Заполняя портфолио в каталоге фриланс услуг, вы увеличите свои продажи в 2 раза.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div id="scrolldown">
                <p>scroll</p>
                <div class="mouse">
                    <span><p>↓</p></span>
                </div>
            </div>
    </div>
</div>
<div class="homepage">
    <div class="container">
        <div class="homepage-info">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="homepage-info-text">
                        <h2>Каталог фриланс услуг в Кыргызстане</h2>
                        <h5>Зарегистрируйся  и получай заказы без посредников</h5>
                    </div>
                </div>
                <div class="col-12">
                    <div class="homepage-info-block">
                        {{-- <h5>Каталог фриланс услуг в Кыргызстане</h5> --}}
                        <h5>Что Вы получите после регистрации:</h5>
                        {{-- <h6 class="homepage-info-block-small">Что Вы получите после регистрации:</h6> --}}
                        <div class="homepage-info-block-cols">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="homepage-info-block-cols-info">
                                        <div class="homepage-info-block-cols-info-left">                                    
                                            <span class="jam jam-user-square"></span>
                                        </div>
                                        <div class="homepage-info-block-cols-info-right">
                                            <h5>Персональный аккаунт заменит вам сайт</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="homepage-info-block-cols-info">                              
                                        <div class="homepage-info-block-cols-info-left">                                    
                                            <span class="jam jam-calendar"></span>
                                        </div>
                                        <div class="homepage-info-block-cols-info-right">
                                            <h5>Клиенты легко найдут ваши услуги 365 дней в году</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="homepage-info-block-cols-info">                              
                                        <div class="homepage-info-block-cols-info-left">                                    
                                            <span class="jam jam-bell"></span>
                                        </div>
                                        <div class="homepage-info-block-cols-info-right">
                                            <h5>Мы заботимся о привлечении клиентов</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="homepage-info-block-cols-info">                              
                                        <div class="homepage-info-block-cols-info-left">                                    
                                            <span class="jam jam-coin"></span>
                                        </div>
                                        <div class="homepage-info-block-cols-info-right">
                                            <h5>Вы работаете с прямыми заказчиками без комиссий</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="homepage-info-block-cols-info">                              
                                        <div class="homepage-info-block-cols-info-left">                                    
                                            <span class="jam jam-star"></span>
                                        </div>
                                        <div class="homepage-info-block-cols-info-right">
                                            <h5>Берем продвижение ваших услуг на себя</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/{{ app()->getLocale() }}/sign_up" class="btn btn-reg">Пройти регистрацию <span class="jam jam-arrow-right"></span> </a>
                        <a href="/{{ app()->getLocale() }}/sign_in" class="btn btn-signin float-right">Войти на сайт <span class="jam jam-log-in"></span> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
        (function() {
        'use strict';

        var btnScrollDown = document.querySelector('#scrolldown');

        function scrollDown() {
            var windowCoords = document.documentElement.clientHeight;
            (function scroll() {
            if (window.pageYOffset < windowCoords) {
                window.scrollBy(0, 10);
                setTimeout(scroll, 0);
            }
            if (window.pageYOffset > windowCoords) {
                window.scrollTo(0, windowCoords);
            }
            })();
        }

        btnScrollDown.addEventListener('click', scrollDown);
        })();
</script>

@endsection