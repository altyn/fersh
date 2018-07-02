@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')
    <div class="container user-profile">
        <div class="inner">
            <div class="row">

                @include('web.user.profile.freelancer.edit.sidebar')

                <div class="col-md-9 col-12">
                    <div class="infoform">
                        <div class="infoform-title">
                            <h6>Портфолио</h6>
                        </div>
                        <div class="infoform-body">
                            <div class="d-block">
                                <a href="/{{ app()->getLocale()}}/freelancer/edit/portfolio/add" class="btn btn-add"><span class="jam jam-plus"></span>Добавить проект</a>
                            </div>
                            {{-- Иф жок --}}
                            <div class="user-portfolio-empty">
                                <h6>Нет проектов</h6>
                            </div>
                            {{-- Иф бар --}}
                            <div class="user-portfolio-items">
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
        </div>
    </div>

@endsection

@section('scripts')

@endsection