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
                <form class="sign-right-middle needs-validation" action="{{ url('/ru/sign_up') }}" method='post' novalidate>
                    @csrf()
                    <div class="sign-right-top">
                        <h3>Регистрация</h3>
                    </div>
                    @if ($errors->has('login') || $errors->has('email') || $errors->has('password'))
                        <div class="alert alert-danger">
                            <ul>
                                @if($errors->first('login'))
                                    <li>{{ $errors->first('login') }}</li>
                                @endif
                                @if($errors->first('email') )
                                    <li>{{ $errors->first('email') }}</li>
                                @endif
                                @if($errors->first('password') )
                                    <li>{{ $errors->first('password') }}</li>
                                @endif
                            </ul>
                        </div>
                    @endif
                        <div class="form-group user-profile-aside">
                            <div class="profile-ava">
                                <div class="profile-ava-img">
                                    @if($user_details['avatar'])
                                        <img class="img-fluid" src="{{ $user_details['avatar'] }}">
                                        <input type="hidden" value="{{ $user_details['avatar'] }}"  name="avatar">
                                    @endif
                                </div>
                            </div>
                            <input type="text" class="form-control" name="login" placeholder="Логин"
                                @if($user_details['name'])
                                    value="{{ $user_details['name'] }}"
                                @else
                                    value="{{ old('login') }}"
                                @endif
                                required>
                            <div class="invalid-feedback">
                                Введите ваш логин
                            </div>
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" name="first_name" placeholder="Имя" value="{{ old('first_name') }}" required>
                            <div class="invalid-feedback">
                                Введите Имя
                            </div>
                        </div>
                        <div class="form-group">
                        <input type="text" class="form-control" name="last_name" placeholder="Фамилия" value="{{ old('last_name') }}" required>
                            <div class="invalid-feedback">
                                Введите Фамилию
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Почта"
                                @if($user_details['email'])
                                    value="{{ $user_details['email'] }}"
                                @else
                                    value="{{ old('email') }}"    
                                @endif
                                required>
                            <div class="invalid-feedback">
                                Введите почту
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Пароль" required>                                <div class="invalid-feedback">
                                Введите пароль
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Повторите пароль" required>
                            <div class="invalid-feedback">
                                Повторите пароль
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="newsletter" class="custom-control-input" id="notify" checked>
                                <label class="custom-control-label" for="notify">Получать информацию о заказах и новостях сайта</label>
                            </div>
                            <span class="terms">Регистрируясь вы принимаете условия <a href="#">Пользовательского соглашения</a></span>
                        </div>
                        <button class="btn btn-sign" type="submit">Зарегистрироваться</button>
                     <div class="sign-bottom">
                        <a href="/{{ app()->getLocale() }}/sign_in" class="sign-new">Войдите с вашим аккаунтом</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    document.getElementById('getval').addEventListener('change', readURL, true);
    function readURL(){
        var file = document.getElementById("getval").files[0];
        var reader = new FileReader();
        reader.onloadend = function(){
            document.getElementById('avatar-upload').style.backgroundImage = "url(" + reader.result + ")";        
        }
        if(file){
            reader.readAsDataURL(file);
        }else{
        }
    }
</script>

@endsection