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
                            <h3>Регистрация</h3>
                            @if(session('data'))
                                data
                            @else
                                no
                            @endif
                        </div>
                        <form class="needs-validation" novalidate>
                            <div class="form-group">
                                <input type="text" class="form-control" id="login" placeholder="Логин" required>
                                <div class="invalid-feedback">
                                    Введите ваш логин
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" placeholder="Почта" required>
                                <div class="invalid-feedback">
                                    Введите почту
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" placeholder="Пароль" required>
                                <div class="invalid-feedback">
                                    Введите пароль
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="confirmpassword" placeholder="Повторите пароль" required>
                                <div class="invalid-feedback">
                                    Повторите пароль
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="notify">
                                    <label class="custom-control-label" for="notify">Получать новости сервиса (не чаще раза в месяц)</label>
                                </div>
                                <span class="terms">Регистрируясь вы принимаете условия <a href="#">Пользовательского соглашения</a></span>
                            </div>
                            <button class="btn btn-sign" type="submit">Зарегистрироваться</button>
                        </form>
                        <div class="sign-bottom">
                            <a href="/{{ app()->getLocale() }}/sign_in" class="sign-new">Войдите с вашим аккаунтом</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection