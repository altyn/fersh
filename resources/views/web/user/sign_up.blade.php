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
                    <div class="sign-right-middle">
                        <div class="sign-right-top">
                            <h3>Регистрация</h3>
                        </div>
                        <div class="sign-right-middle-line">
                            <span>или</span>
                        </div>
                        <h5>Зарегистрируйтесь с помощью социальных сетей</h5>
                        <ul class="soc-icons">
                            <li><a href="/auth/facebook/redirect/"><span class="jam jam-facebook-square"></span></a></li>
                            <li><a href="/auth/twitter/redirect/"><span class="jam jam-twitter-square"></span></a></li>
                            <li><a href="/auth/google/redirect/"><span class="jam jam-google-square"></span></a></li>
                            <li><a href="/auth/github/redirect/"><span class="jam jam-github-square"></span></a></li>
                        </ul>
                        @if ($errors->has('login') || $errors->has('email'))
                            <div class="alert alert-danger">
                                <ul>
                                    @if($errors->first('login'))
                                        <li>{{ $errors->first('login') }}</li>
                                    @endif
                                    @if($errors->first('email') )
                                        <li>{{ $errors->first('email') }}</li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(['url' => 'ru/sign_up', 'method' => 'post']) !!}
                        @csrf()
                        <div class="form-group">
                            <input type="text" class="form-control" name="login" placeholder="Логин"
                                @if($user_details['nickname'])
                                    value="{{ $user_details['nickname'] }}"
                                @endif
                                required>
                            <div class="invalid-feedback">
                                Введите ваш логин
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Почта"
                                @if($user_details['email'])
                                    value="{{ $user_details['email'] }}"
                                @endif
                                required>
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
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirmpassword" placeholder="Повторите пароль" required>
                            <div class="invalid-feedback">
                                Повторите пароль
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="notify">
                                <label class="custom-control-label" for="notify">Получать новости сервиса (не чаще раза в месяц)</label>
                            </div>
                            <span class="terms">Регистрируясь вы принимаете условия <a href="#">Пользовательского соглашения</a></span>
                        </div>
                        <button class="btn btn-sign" type="submit">Зарегистрироваться</button>
                        </form>
                        <div class="sign-bottom">
                            <a href="/{{ app()->getLocale() }}/sign_in" class="sign-new">Войдите с вашим аккаунтом</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection