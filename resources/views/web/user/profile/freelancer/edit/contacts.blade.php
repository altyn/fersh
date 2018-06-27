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
                            <h6>Контакты</h6>
                        </div>
                        <form action="/{{app()->getLocale()}}/freelancer/edit/personal" method="POST">
                            @csrf
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    {{ $message }}
                                </div>
						    @endif
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="email">Ваш электронный адрес<span class="required">*</span></label>
                                    <input type="email" class="form-control" id="email" name="contacts[{{app()->getLocale()}}][email]"
                                    @if($freelancer->contacts['ru']['email'])
                                        value="{{ $freelancer->contacts['ru']['email'] }}"
                                    @endif>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="phone">Ваш номер телефона <span class="required">*</span></label>
                                    <input type="tel" name="contacts[{{app()->getLocale()}}][phone]" id="phone" placeholder="+996 555 555-555"  class="form-control" 
                                    @if($freelancer->contacts['ru']['phone'])
                                        value="{{ $freelancer->contacts['ru']['phone'] }}"
                                    @endif required />
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