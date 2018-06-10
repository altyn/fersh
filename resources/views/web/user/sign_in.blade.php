@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')
    <div class="container">
        <div class="sign">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <div class="sign-left">
                        <img src="{{ asset('img/sign/1.png') }}" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="sign-right">
                        <div class="sign-right-top">
                            <h3>Вход</h3>
                        </div>
                        <div class="sign-right-middle">
                            <h5>Войдите с помощью учетной записи в других сервисах</h5>
                            <ul class="soc-icons">
                                <li><a href="/auth/facebook/redirect/"><span class="jam jam-facebook-square"></span></a></li>
                                <li><a href="/auth/twitter/redirect/"><span class="jam jam-twitter-square"></span></a></li>
                                <li><a href="/auth/google/redirect/"><span class="jam jam-google-square"></span></a></li>
                                <li><a href="/auth/github/redirect/"><span class="jam jam-github-square"></span></a></li>
                            </ul>
                            <div class="sign-right-middle-line">
                                <span>или</span>
                            </div>
                        </div>
                        <form class="needs-validation" action="/{{ app()->getLocale() }}/sign_in" method="post" novalidate>
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Почта" required>
                                <div class="invalid-feedback">
                                    Введите почту 
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Пароль" required>
                                <div class="invalid-feedback">
                                    Введите пароль
                                </div>
                            </div>
                            <button class="btn btn-sign" type="submit">Войти</button>
                        </form>
                        <div class="sign-bottom">
                            <a href="#">Напомнить пароль</a>
                            <a href="/{{ app()->getLocale() }}/sign_up" class="sign-new">Зарегистрируйте новый аккаунт</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection