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
                            <h6>Личная информация</h6>
                        </div>
                        <div class="row">
                            <div class="form-group avatar-upload col-12">
                                <div id='avatar-upload' style="background-image: url('{{ asset('img/sign/avatar.png') }}')">
                                    <div class="hvr-rectangle-out">
                                        <input type="file" name="avatar" id='getval'  class="upload w180" id="imag">
                                    </div>
                                    <div class="upload-img">
                                        <span class="jam jam-camera">upload Image</span>
                                    </div>
                                        <span class="jam jam-camera"></span>
                                </div>
                                <div id="avatar-upload-title">Загрузите Ваше фото</div>
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
                                        <label class="btn btn-secondary">
                                            <input type="radio" value="male" id="male" name="sex" autocomplete="off">Мужчина
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
                        <div class="form-group save">
                            <a href="#" class="btn btn-save mr-2" role="button">Сохранить</a>
                            <a href="#" class="btn btn-cancel" role="button">Отмена</a>
                        </div>
                    </div>
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