<fieldset class="form-group">
	<legend>
        <span>Информация</span>
    </legend>
   <div class="row">
      <div class="col-sm-6">
         <div class="form-group">
            {!! Form::label('login', 'Логин'); !!}
            <span class="required-label">*</span>
            {!! Form::text('login', null, ['class' => 'form-control required']) !!}
         </div>
      </div>
      <div class="col-sm-6">
         <div class="form-group">
            {!! Form::label('email', 'Email'); !!}
            <span class="required-label">*</span>
            {!! Form::text('email', null, ['class' => 'form-control required']) !!}
         </div>
      </div>
   </div>
   <legend>
        <span>Пароль</span>
    </legend>
	<div class="row">
      <div class="col-sm-6">
         <div class="form-group">
            {!! Form::label('password', 'Пароль'); !!}
            <span class="required-label">*</span>
            {!! Form::password('password', ['class' => 'form-control required']) !!}
         </div>
      </div>
      <div class="col-sm-6">
         <div class="form-group">
            {!! Form::label('passwordConfirm', 'Подтвердите пароль'); !!}
            <span class="required-label">*</span>
            {!! Form::password('password_confirmation', ['class' => 'form-control required']) !!}
         </div>
      </div>
   </div>
   <legend>
        <span>Роли</span>
	</legend>
   <div class="form-group row">
      <label class="col-sm-2 col-form-label">Выбрать роль</label>
      <div class="col-sm-10">
			@foreach ($roles as $role)
			{{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
			{{ Form::label($role->name, ucfirst($role->name)) }}<br>
	 		@endforeach
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