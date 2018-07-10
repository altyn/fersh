@extends('web.layouts.app')

@section('title', 'Freelance.kg' )
<link rel="stylesheet" href="{{ asset('/css/tagify.css')}}">

@section('styles')

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('/css/_profile_info.css') }}">

@endsection

@section('content')
<div class="container">
    <form action="/profile/info" method="POST" id="myForm" role="form" data-toggle="validator" class="needs-validation" novalidate enctype="multipart/form-data">
    @csrf
        <div id="stepbystep">
            <ul>
                <li><a href="#step1"><span class="jam jam-check"></span> Личная информация</a></li>
                <li><a href="#step2"><span class="jam jam-check"></span> Контакты</a></li>
                <li><a href="#step3"><span class="jam jam-check"></span> Специализация</a></li>
                <li><a href="#step4"><span class="jam jam-check"></span> О себе</a></li>
            </ul>
            <div class="infoform">
                <div id="step1" role="form" data-toggle="validator">
                    <div class="step-content-top">
                        <h4>Пользовательская информация</h4>
                        <span>Поля, помеченные * обязательны для заполнения.</span>
                    </div>
                    <div class="step-content-inner col-centered col-md-8 col-12" id="form-step-0" role="form" data-toggle="validator" novalidate="true">
                        <div class="row">
                            <div class="form-group avatar-upload col-12">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" data-trigger="fileinput"></div>
                                    <span class="btn btn-default btn-file">
                                        <label for="imageUpload"><span class="jam jam-pencil"></span></label>
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
                                <label for="lastname">Дата рождения</label>
                                <div class="form-group row">
                                    <div class="col">
                                        <select class="form-control" id="day" name="day">
                                            <option disabled selected value style="display: none">День</option>
                                            @for($i = 1; $i <= 31; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" id="month" name="month">
                                            <option disabled selected value style="display: none">Месяц</option>
                                            @for($i = 1; $i <= 12; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" id="year" name="year">
                                            <option disabled selected value style="display: none">Год</option>
                                            @for($i = 2001; $i > 1960; $i--)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="country">Страна</label>
                                <div class="d-block">
                                    <select class="form-control" id="country" name="country">
                                        <option disabled selected value style="display: none">-- Выберите страну --</option>
                                        @foreach($countries as $row)
                                            <option value="{{$row->getId()}}">{{$row->getTitle()}}</option>
                                        @endforeach
                                    </select>
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
                    </div>
                </div>
                <div id="step2">
                    <div class="step-content-top">
                        <h4>Контакты</h4>
                        <span>Поля, помеченные * обязательны для заполнения.</span>
                    </div>
                    <div class="step-content-inner col-centered col-md-8 col-12" id="form-step-1" role="form" data-toggle="validator" novalidate="true">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="email">Ваш электронный адрес<span class="required">*</span></label>
                                <input type="email" class="form-control" id="email" name="contacts[{{app()->getLocale()}}][email]">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="phone">Ваш номер телефона <span class="required">*</span></label>
                                <input type="tel" name="contacts[{{app()->getLocale()}}][phone]" id="phone" placeholder="+996 555 555-555"  class="form-control" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div id="step3">
                    <div class="step-content-top">
                        <h4>Специализация</h4>
                        <span>Поля, помеченные * обязательны для заполнения.</span>
                    </div>
                    <div class="step-content-inner col-centered col-md-8 col-12" id="form-step-2" role="form" data-toggle="validator" novalidate="true">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="bio">Выберите сферу, в которой Вы специализируетесь</label>
                                <div class="d-block">
                                    <select class="sphera-multi form-control" name="spec[{{app()->getLocale()}}][sphere]" multiple="multiple"></select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="skills">Опишите услуги, которые Вы оказываете в выбранной сфере<span class="required">*</span></label>
                                <input type="text" class="form-control" id="skills" name="spec[{{app()->getLocale()}}][skills]" required>
                                <small>Напишите каждое предложение(слово) через запятую</small>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="bio">Опыт работы</label>
                                <div class="d-block">
                                    <select class="form-control" id="year" name="spec[{{app()->getLocale()}}][experience]">
                                        <option disabled selected value="2" style="display: none">более года</option>
                                        <option value="1">менее года</option>
                                        <option value="2">более года</option>
                                        <option value="3">более трех лет</option>
                                        <option value="4">более пяти лет</option>
                                        <option value="5">более 10 лет</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="bio">Стоимость работы</label>
                                <div class="input-group">
                                    <label for="valuta" class="col-2 col-form-label">от</label>
                                    <input type="text" class="form-control col-10" placeholder="500" name="spec[{{app()->getLocale()}}][rate]" aria-describedby="valuta">
                                    <div class="input-group-append">
                                        <select class="input-group-text" id="valuta" name="spec[{{app()->getLocale()}}][currency]">
                                            <option disabled selected value="1" style="display: none">Доллар</option>
                                            <option value="1">Доллар</option>
                                            <option value="2">Сом</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="bio">Способ оплаты</label>
                                <div class="d-block">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="spec[{{app()->getLocale()}}][payment_method][cash]" id="nalichnyi">
                                        <label class="custom-control-label" for="nalichnyi">Наличный расчет</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="spec[{{app()->getLocale()}}][payment_method][bank]" id="beznalichnyi">
                                        <label class="custom-control-label" for="beznalichnyi">Безналичный расчет</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="spec[{{app()->getLocale()}}][payment_method][electron]" id="elektron">
                                        <label class="custom-control-label" for="elektron">Электронные деньги</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="bio">Форма собственности</label>
                                <div class="d-block">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="uridicheskoe" name="spec[{{app()->getLocale()}}][firm][LLC]">
                                        <label class="custom-control-label" for="uridicheskoe">Юридическое лицо</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="individ" name="spec[{{app()->getLocale()}}][firm][own_company]">
                                        <label class="custom-control-label" for="individ">Индивидуальный предприниматель</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="phisizeskoe" name="spec[{{app()->getLocale()}}][firm][self]">
                                        <label class="custom-control-label" for="phisizeskoe">Физическое лицо</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="step4">
                    <div class="step-content-top">
                        <h4>О себе</h4>
                        <span>Поля, помеченные * обязательны для заполнения.</span>
                    </div>
                    <div class="step-content-inner col-centered col-md-8 col-12" id="form-step-3" role="form" data-toggle="validator" novalidate="true">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="bio">Опишите свой профессиональный опыт в кратце</label>
                                <textarea name="bio[{{app()->getLocale()}}][short]" id="" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="bio">Опишите свой профессиональный опыт, расскажите о наиболее сильных личностных качествах и специфических проектных решениях, которые выделяют вас среди других специалистов.</label>
                                <textarea name="bio[{{app()->getLocale()}}][full]" id="" rows="8" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection @section('scripts')

<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<script src="{{ asset('/js/tagify.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ mix('/js/smartwizard.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

<script>
    $('#stepbystep').smartWizard({
        theme: 'custom',
        lang: {
            next: "Продолжить",
            previous: 'Назад'
        },
        toolbarSettings: {
            toolbarPosition: 'bottom',
            toolbarExtraButtons: [
                $('<button type="submit"></button>').text('Сохранить')
                    .addClass('btn sw-btn-finish display-none')
                    .on('click', function () {
                        // alert('Finsih button click');
                    })
            ]
        },
        anchorSettings: {
            markDoneStep: true, // add done css
            markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
            removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
            enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
        }
    });

    $("#stepbystep").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
        var elmForm = $("#form-step-" + stepNumber);
        console.log(elmForm);
        console.log(stepNumber);

        // stepDirection === 'forward' :- this condition allows to do the form validation
        // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
        if (stepDirection === 'forward' && elmForm == elmForm) {
            elmForm.validator('validate');
            var elmErr = elmForm.children('.has-error');
            if (elmErr && elmErr.length > 0) {
                // Form validation failed                    
                return false;
            }
        }
        return true;
    });

    $("#stepbystep").on("showStep", function (e, anchorObject, stepNumber, stepDirection) {
        if (stepNumber != '3') {
            $('.sw-btn-finish').hide();
        } else {
            $('.sw-btn-finish').show();
        }
    });


    var skillsInput = document.querySelector('input[id=skills]'),
        skills = new Tagify(skillsInput, {
            whitelist: []
        })
    skills.on('remove', onRemoveTag);
    function onRemoveTag(e) {
        console.log(e, e.detail);
    }
    function onAddTag(e) {
        console.log(e, e.detail);
    }


    var url = "{{ asset('js/datamini.json') }}";
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