@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

<link rel="stylesheet" href="{{ mix('/css/smartwizard.css') }}">

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div id="stepbystep">
                <ul>
                    <li><a href="#step1">Личная информация</a></li>
                    <li><a href="#step2">Контакты</a></li>
                    <li><a href="#step3">Специализация</a></li>
                    <li><a href="#step4">О себе</a></li>
                </ul>
                <div class="infoform">
                    <div id="step1">
                    <form class="needs-validation" novalidate>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="name">Имя</label>
                                <input type="text" class="form-control" id="name" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="lastname">Фамилия</label>
                                <input type="text" class="form-control" id="lastname" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
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
                            <div class="col-md-6 col-12">
                                <label for="location">Местоположение</label>
                                <input type="text" class="form-control" id="location" required>
                                <div class="invalid-feedback">
                                    Заполните поле
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
                    <div id="step2">
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="website">Сайт</label>
                                <input type="text" class="form-control" id="website" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="email">Почта</label>
                                <input type="text" class="form-control" id="email" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="phone">Телефон</label>
                                <input type="text" class="form-control" id="phone" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="whatspapp">WhatsApp</label>
                                <input type="text" class="form-control" id="whatspapp" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="telegram">Telegram</label>
                                <input type="text" class="form-control" id="telegram" required>
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
                                <input type="text" class="form-control" id="facebook" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="twitter">Twitter</label>
                                <input type="text" class="form-control" id="twitter" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                        </div>
                    </div>
                    <div id="step3">
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="bio">Специализация </label>
                                <input type="text" class="form-control" id="bio" required>
                                <small>Напишите, что именно вы делаете лучше других</small>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="skills">Ключевые навыки (до 15 штук) * </label>
                                <input type="text" class="form-control" id="skills" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="bio">Сфера деятельности </label>
                                <input type="text" class="form-control" id="bio" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="bio">Опыт работы</label>
                                <input type="text" class="form-control" id="bio" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="bio">Стоимость работы</label>
                                <input type="text" class="form-control" id="bio" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="bio">Способ оплаты</label>
                                <input type="text" class="form-control" id="bio" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="bio">Форма собственности</label>
                                <input type="text" class="form-control" id="bio" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="step4">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="bio">Опишите свой профессиональный опыт, расскажите о наиболее сильных личностных качествах и специфических проектных решениях, которые выделяют вас среди других специалистов.</label>
                                <textarea name="" id="" cols="100" rows="30"></textarea>                               
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="{{ mix('/js/smartwizard.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#stepbystep').smartWizard({
            theme: 'custom',
            lang: {
                next: 'Продолжить', 
                previous: 'Назад'
            }
        });

    });
</script>

@endsection