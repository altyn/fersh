@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')
    <div class="container user-profile">
        <div class="inner">
            <div class="row">
                <div class="col-md-3 col-12">
                    @include('web.user.profile.freelancer.info')
                </div>
                <div class="col-md-9 col-12">
                    <div class="portfolio">
                        @if(auth()->user() )
                        <div class="portfolio-control mb-4">
                            <div class="portfolio-control-right">
                                <a href="/{{ app()->getLocale()}}/freelancer/portfolio/add" class="btn btn-add"><span class="jam jam-plus"></span>Добавить проект</a>
                            </div>
                        </div>
                        @endif
                        <div class="portfolio-body">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="portfolio-item">
                                        <a href="#" class="portfolio-item-top">
                                            <img class="img-fluid" src="{{ asset('img/home/3.png') }}" alt="">
                                        </a>
                                        <div class="portfolio-item-info">
                                            <div class="portfolio-item-info-title">
                                                <a href="#">Редизайн сайта экологической компании.</a>
                                            </div>
                                            <div class="portfolio-item-info-bottom">
                                                <ul class="portfolio-ul">
                                                    <li class="portfolio-ul-li likes">
                                                        <span class="jam jam-heart"></span>
                                                        <span class="portfolio-ul-li-text">123</span>
                                                    </li>
                                                    <li class="portfolio-ul-li comments">
                                                        <span class="jam jam-cloud-thunder"></span>
                                                        <span class="portfolio-ul-li-text">5</span>
                                                    </li>
                                                    <li class="portfolio-ul-li views">
                                                        <span class="jam jam-eye"></span>
                                                        <span class="portfolio-ul-li-text">857</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="portfolio-item">
                                        <a href="#"><img  class="img-fluid" src="{{ asset('img/home/4.png') }}" alt=""></a>
                                        <div class="portfolio-item-title"><a href="#">Инфографика для турфирмы.</a></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="portfolio-item">
                                        <a href="#"><img  class="img-fluid" src="{{ asset('img/home/5.jpg') }}" alt=""></a>
                                        <div class="portfolio-item-title"><a href="#">Эксперимент с оттенками фиолетового цвета</a></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="portfolio-item">
                                        <a href="#"><img  class="img-fluid" src="{{ asset('img/home/6.png') }}" alt=""></a>
                                        <div class="portfolio-item-title"><a href="#">Иллюстрация обычного фрилансера</a></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="portfolio-item">
                                        <a href="#"><img  class="img-fluid" src="{{ asset('img/home/7.jpg') }}" alt=""></a>
                                        <div class="portfolio-item-title"><a href="#">Иконка маршрутного такси.</a></div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12">
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
    </div>

@endsection

@section('scripts')

@endsection