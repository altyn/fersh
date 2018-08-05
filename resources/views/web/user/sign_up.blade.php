@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')
<div class="container">
    <div class="sign">
        <div class="row">
            <div class="col-md-6 align-self-center d-none d-sm-block">
                <div class="sign-left">
                    <img src="{{ asset('img/sign/1.png') }}" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6 col-12 ">
                <form class="sign-right-middle needs-validation" action="{{ url('/ru/sign_up') }}" method='post' novalidate>
                    @csrf()
                    <div class="sign-right-top">
                        <h3>Регистрация</h3>
                    </div>
                    <div class="sign-right-middle">
                        <h5>Войдите с помощью учетной записи в других сервисах</h5>
                        <ul class="soc-icons">
                            <li><a href="/auth/facebook/redirect/" class="facebook"><span class="jam jam-facebook"></span><span>Facebook</span></a></li>
                            <li><a href="/auth/github/redirect/" class="github"><span class="jam jam-github"></span><span>Github</span></a></li>
                            <li><a href="/auth/google/redirect/" class="google"><span class="jam jam-google"></span><span>Google</span></a></li>
                        </ul>
                        <div class="sign-right-middle-line">
                            <span>или</span>
                        </div>
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
                        <div class="form-group">
                            <input type="text" class="form-control" name="login" placeholder="Логин"
                                @if($user_details['name'])
                                    value="{{ $user_details['name'] }}"
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
                                <input type="checkbox" class="custom-control-input" id="notify">
                                <label class="custom-control-label" for="notify">Получать информацию о заказах и новостях сайта</label>
                            </div>
                            <span class="terms">Регистрируясь вы принимаете условия <a class="term-link" data-toggle="modal" data-target="#termsModal">Пользовательского соглашения</a></span>
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

<!-- Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="termsModalLabel">Пользовательское соглашение</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="col">
              @include('web.user.terms')
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-term" data-dismiss="modal">Закрыть</button>
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