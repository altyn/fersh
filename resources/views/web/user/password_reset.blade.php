@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')
    <div class="container">
        <div class="sign">
            <div class="sign-right">
                <div class="sign-right-top">
                    <h3>Восстановление пароля</h3>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                @endif
                <form class="needs-validation" method="POST" action="{{ route('password.request') }}" novalidate>
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col-md-6 col-sm-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="E-Mail" required autofocus>

                            @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                            @else
                            <div class="invalid-feedback">
                                Введите почту
                            </div>
                            @endif
                            
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <div class="col-md-4 col-sm-12">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Пароль" required>

                            @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                            @else
                            <div class="invalid-feedback">
                                Введите пароль
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <div class="col-md-4 col-sm-12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Подтвердить пароль" required>

                            @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </div>
                            @else
                            <div class="invalid-feedback">
                                Подтвердить Пароль
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4 col-sm-12">
                            <button class="btn btn-sign" type="submit">Сбросить пароль</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection