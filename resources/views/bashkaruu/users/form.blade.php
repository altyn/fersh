<fieldset class="form-group">
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
         		{!! Form::label('email', 'Эл.дарек'); !!}
         		<span class="required-label">*</span>
         		{!! Form::text('email', null, ['class' => 'form-control required']) !!}
     		</div>
 		</div>
  	</div> 
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
         		{!! Form::label('passwordConfirm', 'Паролду тастыктоо'); !!}
         		<span class="required-label">*</span>
         		{!! Form::password('passwordConfirm', ['class' => 'form-control required']) !!}
     		</div>
 		</div>
  	</div>
	<div class="row">
      	<div class="col-sm-6">
         	<div class="form-group">
         		{!! Form::label('role', 'Роль'); !!}
         		{!! Form::select('role', ['user' => 'Жөнөкөй падаван', 'blogger' => 'Падаван-блоггер', 'admin' => 'Джедай', 'super' => 'Джедай-мастер'], null, ['class' => 'form-control selectpicker', 'title' => '-- тандоо --'])!!}
     		</div>
 		</div> 		
      	<div class="col-sm-2">
         	<div class="form-group">
         		<label>&nbsp;</label>
         		<div class="checkbox">
         			{!! Form::hidden('active', 0) !!}
                	{!! Form::checkbox('active', 1, null, ["class" => "form-control styled"]) !!}
					{!! Form::label('active', 'активдүү'); !!}
         		</div>
     		</div>
 		</div>
  	</div>
</fieldset>

<fieldset class="form-group">
	<legend>
		<span>
			Жеке маалымат
		</span>
	</legend>
	<div class="row">
      	<div class="col-sm-4">
         	<div class="form-group">
         		{!! Form::label('firstname', 'Аты'); !!}
         		<span class="required-label">*</span>
         		{!! Form::text('firstname', null, ['class' => 'form-control required']) !!}
     		</div>
 		</div>
      	<div class="col-sm-4">
         	<div class="form-group">
         		{!! Form::label('lastname', 'Фамилия'); !!}
         		<span class="required-label">*</span>
         		{!! Form::text('lastname', null, ['class' => 'form-control required']) !!}
     		</div>
 		</div>
      	<div class="col-sm-4">
  			<div class="form-group">
         		{!! Form::label('sex', 'Жынысы'); !!}
  				{!! Form::select('sex', ['male' => 'эркек', 'female' => 'аял'], null, ['class' => 'form-control selectpicker', 'title' => '-- тандоо --']) !!}
  			</div>
 		</div>
  	</div>  
	<div class="row">
      	<div class="col-sm-4">
         	<div class="form-group">
         		{!! Form::label('facebook', 'Facebook'); !!}
         		{!! Form::text('facebook', null, ['class' => 'form-control']) !!}
     		</div>
 		</div>
      	<div class="col-sm-4">
         	<div class="form-group">
         		{!! Form::label('twitter', 'Twitter'); !!}
         		{!! Form::text('twitter', null, ['class' => 'form-control']) !!}
     		</div>
 		</div>
      	<div class="col-sm-4">
         	<div class="form-group">
  				{!! Form::label('avatar', 'Аватар'); !!}
  				<div class="fileinput fileinput-new input-group" data-provides="fileinput">
				  	<div class="form-control" data-trigger="fileinput">
				  		<i class="dp-icon dp-icon-file fileinput-exists"></i>
				  		<span class="fileinput-filename"></span>
			  		</div>
				  	<span class="input-group-addon btn btn-default btn-file">
				  		<span class="fileinput-new">Файл тандоо</span>
				  		<span class="fileinput-exists">Алмаштыруу</span>
				  		<input type="file" name="...">
			  		</span>
				  	<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Өчүрүү</a>
				</div>
  			</div>
 		</div>
  	</div>
  	<div class="row">
  		<div class="col-sm-12">
  			<div class="form-group">
  				{!! Form::label('bio', 'Биография'); !!}
  				{!! Form::textarea('bio', null, ["class" => "form-control"]) !!}
  			</div>
  		</div>
  	</div>
</fieldset>

<div class="form-buttons-w">
	<button id="submitForm" class="btn btn-primary" type="submit">Киргизүү</button>
   	<a href="{{ url()->previous() }}" class="btn btn-default" type="button">Отмена</a>
</div>