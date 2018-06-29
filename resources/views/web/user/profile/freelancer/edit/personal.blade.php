@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">

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
                        <form action="/{{app()->getLocale()}}/freelancer/edit/personal" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    {{ $message }}
                                </div>
						    @endif
                            <div class="row">
                                <div class="form-group avatar-upload col-12">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            @if($freelancer->avatar)
                                            <img src="{{ asset($freelancer->avatar['360x360']) }}">
                                            @endif
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" data-trigger="fileinput"></div>
                                        <span class="btn btn-default btn-file">
                                            <label for="imageUpload"><span class="jam jam-pencil"></span></label>
                                            {!! Form::file('avatar', null, ["class" => "form-control"]) !!}
                                        </span>
                                        @if($freelancer->avatar)
                                        <a href="/{{app()->getLocale()}}/freelancer/edit/deletefreelanceravatar" onclick="event.preventDefault(); document.getElementById('delete-avatar').submit();" class="delete-avatar">Удалить аватар</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 form-group">
                                    <label for="name">Имя<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" 
                                    @if($freelancer->first_name)
                                        value="{{ $freelancer->first_name }}"
                                    @endif required>
                                </div>
                                <div class="col-md-6 col-12 form-group">
                                    <label for="lastname">Фамилия<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                    @if($freelancer->last_name)
                                        value="{{ $freelancer->last_name }}"
                                    @endif required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="lastname">Дата рождения</label>
                                    <div class="form-group row">
                                        <div class="col">
                                            <select class="form-control" id="day" name="day">
                                                <option selected 
                                                @if($freelancer->birthday)
                                                    value="{{ date('d', strtotime($freelancer->birthday)) }}"> {{ date('d', strtotime($freelancer->birthday)) }}
                                                @endif</option>
                                                @for($i = 1; $i <= 31; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" id="month" name="month">
                                                <option selected 
                                                @if($freelancer->birthday)
                                                    value="{{ date('m', strtotime($freelancer->birthday)) }}"> {{ date('m', strtotime($freelancer->birthday)) }}
                                                @endif</option>
                                                @for($i = 1; $i <= 12; $i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" id="year" name="year">
                                                @if($freelancer->birthday)
                                                <option selected value="{{ date('Y', strtotime($freelancer->birthday))  }}"> {{ date('Y', strtotime($freelancer->birthday)) }}
                                                </option>
                                                @endif
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
                                            @foreach($countries as $row)
                                                <option @if($row->getId() == $freelancer->country) value="{{$row->getId()}}" selected @else value="{{$row->getId()}}" @endif>{{$row->getTitle()}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="location">Локация<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="location" name="city" 
                                    @if($freelancer->city)
                                        value="{{ $freelancer->city }}"
                                    @endif required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                <label for="location">Пол<span class="required">*</span></label>
                                    <div class="d-block">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                           
                                            <label class="btn btn-secondary  @if($freelancer->sex == "1") active @endif">
                                                <input type="radio" value="1" id="male" name="sex" autocomplete="off">Мужчина
                                            </label>
                                            
                                            <label class="btn btn-secondary  @if($freelancer->sex == "0") active @endif">
                                                <input type="radio" value="0" id="female" name="sex" autocomplete="off">Женщина
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
                                            <input type="radio" id="freelancer" value="1" name="freelancer" @if($freelancer->freelancer == "1") checked @endif class="custom-control-input" required>
                                            <label class="custom-control-label" for="freelancer">Фрилансер</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customer" value="0" name="freelancer" @if($freelancer->freelancer == "0") checked @endif class="custom-control-input" required>
                                            <label class="custom-control-label" for="customer">Заказчик</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group save">
                                <button type="submit" class="btn btn-save mr-2">Сохранить</button>
                                <a href="#" class="btn btn-cancel" role="button">Отмена</a>
                            </div>
                        </form>
                        <form id="delete-avatar" action="/{{app()->getLocale()}}/freelancer/edit/deletefreelanceravatar" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

@endsection