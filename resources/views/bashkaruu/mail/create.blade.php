@extends('bashkaruu.layouts.default')

@section('title', 'Новое письмо' )

@section('content')

<div class="element-wrapper">
	<h6 class="element-header">Новый </h6>
	<div class="element-box">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
		{!! Form::model($mail, ['id' => 'createForm', 'route' => 'mail.store', 'enctype' => 'multipart/form-data']) !!}
            <fieldset class="form-group">
                <legend><span>Информация</span></legend>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('user', 'user'); !!}
                            <span class="required-label">*</span>
                            {!! Form::text('user', null, ['class' => 'form-control required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('email', 'email'); !!}
                            <span class="required-label">*</span>
                            {!! Form::text('email', null, ['class' => 'form-control required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('token', 'token'); !!}
                            <span class="required-label">*</span>
                            {!! Form::text('token', null, ['class' => 'form-control required']) !!}
                        </div>
                    </div>
                </div>
                
                <div class="form-buttons-w">
                    <div class="form-group row">
                        <div class="col">
                            <button id="submitForm" class="btn btn-primary" type="submit">Сохранить</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Назад</a>
                        </div>
                    </div>
                </div>
            </fieldset>
		{!! Form::close() !!}
	</div>
</div>

@endsection
