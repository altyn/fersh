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
			<form class="needs-validation" action="{{ url('bashkaruu/login') }}" method="post" novalidate>
				@csrf
				<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="Почта" required>
					<div class="invalid-feedback">
						Введите почту
					</div>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Пароль" required>
					<div class="invalid-feedback">
						Введите пароль
					</div>
				</div>
				<button class="btn btn-sign" type="submit">Войти</button>
			</form>
		</div>
	</div>

</body>

</html>