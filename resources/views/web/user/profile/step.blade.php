@extends('web.layouts.app')

@section('title', 'Freelance.kg' )
@section('styles')

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('/css/_profile_info.css') }}">

@endsection

@section('content')
<div class="container">
    <form action="/profile/info" method="POST" id="myForm" role="form" data-toggle="validator" class="needs-validation" novalidate enctype="multipart/form-data">
    @csrf
        <fieldset id="miniinfo" class="infoform ">
            <div class="mini-content-top">
                <h4>Пользовательская информация</h4>
                <span>Прежде чем войти в профиль заполните следующие поля.</span>
                <span>Поля, помеченные * обязательны для заполнения.</span>
            </div>
            <div class="mini-content-inner col-centered col-md-8 col-12">
                <div class="row">
                    <div class="form-group avatar-upload col-12">
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                @if(isset($avatar))
                                    <img src="{{ $avatar }}">
                                @endif
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" data-trigger="fileinput"></div>
                            <span class="btn btn-default btn-file">
                                <label for="imageUpload"><span class="jam jam-picture"></span>Загрузить аватар</label>
                                {!! Form::file('avatar', null, ["class" => "form-control"]) !!}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-12 form-group">
                        <label for="name">Имя<span class="required">*</span></label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-6 col-12 form-group">
                        <label for="lastname">Фамилия<span class="required">*</span></label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="lastname">Дата рождения <span class="required">*</span></label>
                        <div class="form-group row">
                            <div class="col">
                                <select class="form-control" id="day" name="day" required>
                                    <option disabled selected value style="display: none">День</option>
                                    @for($i = 1; $i <= 31; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col">
                                <select class="form-control" id="month" name="month" required>
                                    <option disabled selected value style="display: none">Месяц</option>
                                    @for($i = 1; $i <= 12; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col">
                                <select class="form-control" id="year" name="year" required>
                                    <option disabled selected value style="display: none">Год</option>
                                    @for($i = 2001; $i > 1960; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 form-group">
                        <label for="country">Страна<span class="required">*</span></label>
                        <div class="d-block">
                            <select class="form-control" id="country" name="country" required>
                                <option disabled selected value style="display: none">-- Выберите страну --</option>
                                @foreach($countries as $row)
                                    <option value="{{$row->getId()}}">{{$row->getTitle()}}</option>
                                @endforeach
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="location">Локация<span class="required">*</span></label>
                        <input type="text" class="form-control" id="location" name="city" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="location">Пол<span class="required">*</span></label>
                        <div class="d-block">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input checked type="radio" value="male" id="male" name="sex" autocomplete="off">Мужчина
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" value="female" id="female" name="sex" autocomplete="off">Женщина
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 col-12">
                        <label for="location">Роль<span class="required">*</span></label>
                        <div class="d-block">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="freelancer" value="1" name="freelancer" class="custom-control-input" required>
                                <label class="custom-control-label" for="freelancer">Фрилансер</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customer" value="0" name="freelancer" class="custom-control-input" required>
                                <label class="custom-control-label" for="customer">Заказчик</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <label for="bio">Выберите сферу, в которой Вы специализируетесь</label>
                        <div class="d-block">
                            <select class="sphera-multi form-control" name="spec[{{app()->getLocale()}}][sphere]" multiple="multiple"></select>
                        </div>
                    </div>
                </div>
                <button type="submit" id="button" class="btn btn-save mr-2">Сохранить</button>
            </div>
        </fieldset>
    </form>
</div>

@endsection @section('scripts')

<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<script>
    var url = "{{ route('specsjs') }}";
    jQuery.getJSON(url).done(
        function (data) {
            jQuery('.sphera-multi').select2({
                placeholder: 'Выберите сферу',
                allowClear: true,
                multiple: false,
                data: data,
                theme: "bootstrap4",
                width: '100%',
            });
        }
    );


</script>

@endsection