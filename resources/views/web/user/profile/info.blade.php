@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

<link rel="stylesheet" href="{{ asset('/css/smartwizard.css') }}">

@endsection

@section('content')
<div class="container">
    <form action="/profile/info" method="POST">
    @csrf
        <div id="stepbystep">
            <ul>
                <li><a href="#step1"><span class="jam jam-check"></span> Личная информация</a></li>
                <li><a href="#step2"><span class="jam jam-check"></span> Контакты</a></li>
                <li><a href="#step3"><span class="jam jam-check"></span> Специализация</a></li>
                <li><a href="#step4"><span class="jam jam-check"></span> О себе</a></li>
            </ul>
            <div class="infoform">
                <div id="step1">
                    <div class="step-content-top">
                        <h4>Пользовательская информация</h4>
                        <span>Пожалуйста постарайтесь заполнить все поля</span>
                    </div>
                    <div class="step-content-inner col-centered col-md-8 col-12" >
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="name">Имя</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="lastname">Фамилия</label>
                                <input type="text" class="form-control" id="last_name" name="first_name" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="lastname">Дата рождения</label>
                                <div class="form-group row">
                                    <div class="col">
                                        <select class="form-control" id="day" name="day" required>
                                            <option disabled selected value style="display: none">День</option>
                                            @for($i = 1; $i <= 31; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" id="month" name="month" required>
                                            <option disabled selected value style="display: none">Месяц</option>
                                            @for($i = 1; $i <= 12; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" id="year" name="year" required>
                                            <option disabled selected value style="display: none">Год</option>
                                            @for($i = 2001; $i > 1960; $i--)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="country">Страна</label>
                                <div class="d-block">
                                    <select class="form-control" id="country" name="country" required>
                                        <option disabled selected value style="display: none">-- Выберите страну --</option>
                                        @foreach($countries as $row)
                                            <option value="{{$row->getTitle()}}">{{$row->getTitle()}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="location">Город</label>
                                <input type="text" class="form-control" id="location" name="city" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="location">Пол</label>
                                <div class="d-block">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-secondary">
                                            <input type="radio" name="gender" value="male" id="male" name="sex" autocomplete="off">Мужчина
                                        </label>
                                        <label class="btn btn-secondary">
                                            <input type="radio" name="gender" value="female" id="female" name="sex" autocomplete="off">Женщина
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-12">
                                <label for="location">Роль</label>
                                <div class="d-block">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="freelancer" name="freelancer" class="custom-control-input">
                                        <label class="custom-control-label" for="freelancer">Фрилансер</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customer" name="freelancer" class="custom-control-input">
                                        <label class="custom-control-label" for="customer">Заказчик</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="step2">
                    <div class="step-content-top">
                        <h4>Пользовательская информация</h4>
                        <span>Пожалуйста постарайтесь заполнить все поля</span>
                    </div>
                    <div class="step-content-inner col-centered col-md-8 col-12" >
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="website">Сайт</label>
                                <input type="text" class="form-control" id="website" name="contacts[{{app()->getLocale()}}][website]" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="email">Почта</label>
                                <input type="text" class="form-control" id="email" name="contacts[{{app()->getLocale()}}][email]" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="phone">Телефон</label>
                                <input type="text" class="form-control" id="phone"  name="contacts[{{app()->getLocale()}}][phone]" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="whatspapp">WhatsApp</label>
                                <input type="text" class="form-control" id="whatspapp" name="contacts[{{app()->getLocale()}}][whatsapp]" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="telegram">Telegram</label>
                                <input type="text" class="form-control" id="telegram" name="contacts[{{app()->getLocale()}}][telegram]" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="facebook">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="contacts[{{app()->getLocale()}}][facebook]" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="twitter">Twitter</label>
                                <input type="text" class="form-control" id="twitter" name="contacts[{{app()->getLocale()}}][twitter]" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                        </div>
                    </div>
                </div>
                <div id="step3">
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label for="bio">Специализация </label>
                            <input type="text" class="form-control" id="bio" name="spec[{{app()->getLocale()}}][spec]" required>
                            <small>Напишите, что именно вы делаете лучше других</small>
                            <div class="invalid-feedback">
                                Заполните поле
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label for="skills">Ключевые навыки (до 15 штук) * </label>
                            <input type="text" class="form-control" id="skills" name="spec[{{app()->getLocale()}}][skills]" required>
                            <div class="invalid-feedback">
                                Заполните поле
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label for="bio">Сфера деятельности </label>
                            <input type="text" class="form-control" id="bio" name="spec[{{app()->getLocale()}}][sphere]" required>
                            <div class="invalid-feedback">
                                Заполните поле
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label for="bio">Опыт работы</label>
                            <input type="text" class="form-control" id="bio" name="spec[{{app()->getLocale()}}][experience]" required>
                            <div class="invalid-feedback">
                                Заполните поле
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label for="bio">Стоимость работы</label>
                            <input type="text" class="form-control" id="bio" name="spec[{{app()->getLocale()}}][rate]" required>
                            <div class="invalid-feedback">
                                Заполните поле
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label for="bio">Способ оплаты</label>
                            <input type="text" class="form-control" id="bio" name="spec[{{app()->getLocale()}}][payment_method]" required>
                            <div class="invalid-feedback">
                                Заполните поле
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-12">
                            <label for="bio">Форма собственности</label>
                            <input type="text" class="form-control" id="bio" name="spec[{{app()->getLocale()}}][firm]" required>
                            <div class="invalid-feedback">
                                Заполните поле
                            </div>
                        </div>
                    </div>
                </div>
                <div id="step4">
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="bio">Опишите свой профессиональный опыт в кратце</label>
                            <textarea name="bio[{{app()->getLocale()}}][short]" id="" cols="100" rows="30"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="bio">Опишите свой профессиональный опыт, расскажите о наиболее сильных личностных качествах и специфических проектных решениях, которые выделяют вас среди других специалистов.</label>
                            <textarea name="bio[{{app()->getLocale()}}][full]" id="" cols="100" rows="30"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit">H</button>
    </form>
</div>

@endsection

@section('scripts')

<script src="{{ mix('/js/smartwizard.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#stepbystep').smartWizard({
            theme: 'custom',
            lang: {
                next: "Продолжить", 
                previous: 'Назад'
            }
        });

    });
</script>

@endsection