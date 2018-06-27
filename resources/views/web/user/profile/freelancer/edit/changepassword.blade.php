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
                            <h6>Изменить пароль</h6>
                        </div>
                        <form action="/{{app()->getLocale()}}/freelancer/edit/changepassword" method="POST">
                            @csrf
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    {{ $message }}
                                </div>
						    @endif
                            <div class="form-group row">
                                <div class="col-md-6 col-12">
                                    <label for="current-password">Текущий пароль<span class="required">*</span></label>
                                    <input type="password" name="current-password" id="current-password" placeholder="Текущий пароль"  class="form-control" required />
                                        @if ($errors->has('current-password'))
                                            <div class="alert alert-danger mt-2 mb-0" role="alert">
                                                {{ $errors->first('current-password') }}
                                            </div>
                                        @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-12">
                                    <label for="password">Новый пароль<span class="required">*</span></label>
                                    <input type="password" name="password" id="password" placeholder="Новый пароль"  class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-12">
                                    <label for="password_confirmation">Подтвердите пароль<span class="required">*</span></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Подтвердите пароль"  class="form-control" required />
                                     @if ($errors->has('password_confirmation'))
                                        <div class="alert alert-danger mt-2 mb-0" role="alert">
                                            {{ $errors->first('password_confirmation') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group save">
                                <button type="submit" class="btn btn-save mr-2">Сохранить</button>
                                <a href="#" class="btn btn-cancel" role="button">Отмена</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection