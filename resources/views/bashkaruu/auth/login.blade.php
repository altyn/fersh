<h4 class="auth-header">Авторизация</h4>
{!! Form::open(['route' => 'login', 'role' => 'form', 'method' => 'POST']) !!}
<div class="form-group">
    {!! Form::label('login', 'Логин'); !!}
    {!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'Логинизди жазыңыз' ]) !!}
    <div class="pre-icon os-icon os-icon-user-male-circle"></div>
</div>
<div class="form-group">
    {!! Form::label('password', 'Сырсөз'); !!}
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Сырсөзүңүздү жазыңыз']) !!}
    <div class="pre-icon os-icon os-icon-fingerprint"></div>
</div>
<div class="buttons-w">
    {!! Form::button('Кирүү', ['class' => 'btn btn-primary', 'type' => 'submit']); !!}
</div>
{!! Form::close() !!}

<a href="redirect">FB Login</a>