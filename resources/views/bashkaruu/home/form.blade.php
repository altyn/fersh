<fieldset class="form-group">
	<legend>
        <span>Информация</span>
    </legend>
   <div class="form-group row">
       <div class="col">
           {!! Form::label('name', 'Надпись на баннере'); !!}
           {!! Form::text('name', null, array('placeholder' => 'Название','class' => 'form-control')) !!}
        </div>
   </div>   
   <legend>
        <span>Активные пользователи</span>
	</legend>
   <div class="form-group row">
        <div class="col">
            {!! Form::text('users', null, ['class' => 'form-control']) !!}
            <small>Напишите каждого пользователя через запятую</small>
        </div>
    </div>
   <legend>
        <span>Тексты внизу</span>
    </legend>
    <div class="form-group row">
        <div class="col">
           {!! Form::label('name', 'Заголовок'); !!}
           {!! Form::text('name', null, array('placeholder' => 'Заголовок','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-6">
            {!! Form::label('name', 'Название левого блока'); !!}
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
            <br>
            {!! Form::label('name', 'Текст'); !!}
            {!! Form::textarea('descKy', null, ["class" => "summernote form-control", 'rows' =>3]) !!}
        </div>
        <div class="col-6">
            {!! Form::label('name', 'Название правого блока'); !!}
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
            <br>
            {!! Form::label('name', 'Текст'); !!}
            {!! Form::textarea('descKy', null, ["class" => "summernote form-control", 'rows' =>3]) !!}
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