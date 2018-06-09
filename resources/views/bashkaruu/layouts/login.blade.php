<!DOCTYPE html>
<html>
<head>
   	<title>Авторизация</title>
   	<meta charset="utf-8">
   
	<link rel="stylesheet" href="{{ asset('/css/bash/style.css') }}">
</head>

<body class="auth-wrapper">

	<div class="all-wrapper with-pattern">
		<div class="auth-box-w">
			<div class="logo-w"><img alt="" src="{{asset('img/admin/logo-big.png')}}"></div>
            <h4 class="auth-header">Авторизация</h4>

            {!! Form::open(['route' => 'login', 'role' => 'form', 'method' => 'POST']) !!}
            	<div class="form-group">
            		{!! Form::label('login', 'Login'); !!}
            		{!! Form::text('login', null, ['class' => 'form-control']) !!}
            		@include('bashkaruu.partials.svg-icons.user')
            	</div>

            	<div class="form-group">
            		{!! Form::label('password', 'Пароль'); !!}
            		{!! Form::password('password', ['class' => 'form-control']) !!}
            		@include('bashkaruu.partials.svg-icons.key')
            	</div>

            	<div class="buttons-w">
            		{!! Form::button('Войти', ['class' => 'btn btn-primary', 'type' => 'submit']); !!}
            	</div>
            {!! Form::close() !!}
		</div>
	</div>

</body>

</html>