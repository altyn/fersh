@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

<link rel="stylesheet" href="{{ asset('/css/tagify.css')}}">

@section('styles')

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('/css/_profile_info.css') }}">

@endsection

@section('content')
    <div class="container user-profile">
        <div class="inner">
            <div class="row">

                @include('web.user.profile.freelancer.edit.sidebar')

                <div class="col-md-9 col-12">
                    <div class="infoform">
                        <div class="infoform-title">
                            <h6>Специализация</h6>
                        </div>
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

                        <div class="form-group save">
                            <button type="submit" class="btn btn-save mr-2">Сохранить</button>
                            <a href="#" class="btn btn-cancel" role="button">Отмена</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script src="{{ asset('/js/tagify.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
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