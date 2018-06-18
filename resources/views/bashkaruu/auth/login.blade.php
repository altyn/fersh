<h4 class="auth-header">Авторизация</h4>
<form class="needs-validation" action="{{ route('bash.login') }}" method="post" novalidate>
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