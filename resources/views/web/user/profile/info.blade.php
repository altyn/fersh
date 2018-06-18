@extends('web.layouts.app')

@section('title', 'Freelance.kg' )
<link rel="stylesheet" href="{{ asset('/css/tagify.css')}}">

@section('styles')

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ mix('/css/_profile_info.css') }}">

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
                                <input type="text" class="form-control" id="name" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="lastname">Фамилия</label>
                                <input type="text" class="form-control" id="lastname" required>
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
                                <input type="text" class="form-control" id="location" required>
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
                                            <input type="radio" name="gender" value="male" id="male" autocomplete="off">Мужчина
                                        </label>
                                        <label class="btn btn-secondary">
                                            <input type="radio" name="gender" value="female" id="female" autocomplete="off">Женщина
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
                        <h4>Контакты</h4>
                        <span>Пожалуйста постарайтесь заполнить все поля</span>
                    </div>
                    <div class="step-content-inner col-centered col-md-8 col-12" >
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="website">Сайт</label>
                                <input type="text" class="form-control" id="website" required>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
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
                </div>
                <div id="step3">
                    <div class="step-content-top">
                        <h4>Специализация</h4>
                        <span>Пожалуйста постарайтесь заполнить все поля</span>
                    </div>
                    <div class="step-content-inner col-centered col-md-8 col-12" >
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="bio">Специализация </label>
                                <input type="text" class="form-control" id="bio" required>
                                <small>Напишите, что именно вы делаете лучше других</small>
                                <div class="invalid-feedback">
                                    Заполните поле
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="skills">Ключевые навыки (до 15 штук) * </label>
                                <input type="text" class="form-control" name="skills" id="skills" required>
                                <small>Напишите ваши навыки через запятую</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="bio">Сфера деятельности </label>
                                <div class="d-block">
                                    <select class="sphera-multi form-control" name="states[]" multiple="multiple"></select>
                                    <small>Вы можете выбрать максимум 7 сфер</small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-12">
                                <label for="bio">Опыт работы</label>
                                <div class="d-block">
                                    <select class="form-control" id="year" name="year" required>
                                        <option disabled selected value="2" style="display: none">более года</option>
                                        <option value="1">менее года</option>
                                        <option value="2">более года</option>
                                        <option value="3">более трех лет</option>
                                        <option value="4">более пяти лет</option>
                                        <option value="5">более 10 лет</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="bio">Стоимость работы</label>
                                <div class="input-group">
                                    <input type="text" class="form-control col-3" placeholder="500" aria-describedby="valuta">
                                    <div class="input-group-append">
                                        <select class="input-group-text" id="valuta" name="year" required>
                                            <option disabled selected value="1" style="display: none">Доллар</option>
                                            <option value="2">Сом</option>
                                        </select>
                                    </div>
                                    <label for="inputPassword" class="col-1 col-form-label">за</label>
                                    <div class="d-block">
                                        <select class="form-control" id="year" name="year" required>
                                            <option disabled selected value="1" style="display: none">за час</option>
                                            <option value="2">за месяц</option>
                                            <option value="3">за проект</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-6 col-12">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="bio">Способ оплаты</label>
                                <div class="d-block">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="nalichnyi">
                                        <label class="custom-control-label" for="nalichnyi">Наличный расчет</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="beznalichnyi">
                                        <label class="custom-control-label" for="beznalichnyi">безналичный расчет</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="elektron">
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
                                        <input type="checkbox" class="custom-control-input" id="uridicheskoe">
                                        <label class="custom-control-label" for="uridicheskoe">Юридическое лицо</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="individ">
                                        <label class="custom-control-label" for="individ">Индивидуальный предприниматель</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="phisizeskoe">
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
                        <span>Пожалуйста постарайтесь заполнить все поля</span>
                    </div>
                    <div class="step-content-inner col-centered col-md-8 col-12" >
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="bio">Опишите свой профессиональный опыт, расскажите о наиболее сильных личностных качествах и специфических проектных решениях, которые выделяют вас среди других специалистов.</label>
                                <textarea name="" id="" rows="15"  class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('scripts')

<script src="{{ asset('/js/tagify.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ mix('/js/smartwizard.js')}}"></script>

<script type="text/javascript">

    $(document).ready(function(){

        var data = [
            { 
                "text": "Group 1", 
                "children" : [
                    {
                        "id": 1,
                        "text": "Option 1.1"
                    },
                    {
                        "id": 2,
                        "text": "Option 1.2"
                    }
                ]
                },
                { 
                "text": "Group 2", 
                "children" : [
                    {
                        "id": 3,
                        "text": "Option 2.1"
                    },
                    {
                        "id": 4,
                        "text": "Option 2.2"
                    }
                ]
                }
        ];

        $('#stepbystep').smartWizard({
            theme: 'custom',
            lang: {
                next: "Продолжить", 
                previous: 'Назад'
            },
            toolbarSettings: {
                toolbarPosition: 'bottom', // none, top, bottom, both
                toolbarButtonPosition: 'right', // left, right
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                toolbarExtraButtons: [
			        $('<button type="submit"></button>').text('Сохранить')
                        .addClass('btn sw-btn-finish display-none')
                        .on('click', function(){ 
                            alert('Finsih button click');                            
                    })
                ]
            }, 
        });

        $("#stepbystep").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
            if(stepNumber != '3'){
                $('.sw-btn-finish').hide(); 
            }else{
                $('.sw-btn-finish').show();
            }
        });

        var skillsInput = document.querySelector('input[name=skills]'),
            skills = new Tagify(skillsInput, {
                whitelist : []
            })
        skills.on('remove', onRemoveTag);

        function onRemoveTag(e){
            console.log(e, e.detail);
        }

        function onAddTag(e){
            console.log(e, e.detail);
        }

        var $sphera = $(".sphera-multi").select2({
            theme: "bootstrap4",
            width: '100%',
            data: data,
            maximumSelectionLength: 3
        });

    });
</script>

@endsection