<fieldset class="form-group">
	<legend>
        <span>Информация</span>
    </legend>
   <div class="form-group row">
       <div class="col">
           {!! Form::label('info[bannertitle]', 'Надпись на баннере'); !!}
           {!! Form::text('info[bannertitle]', null, array('placeholder' => 'Название','class' => 'form-control')) !!}
        </div>
   </div>   
   <legend>
        <span>Активные пользователи</span>
	</legend>
   <div class="form-group row">
        <div class="col">
            {!! Form::text('active_users', null, ['class' => 'form-control']) !!}
            <small>Напишите каждого пользователя через запятую</small>
        </div>
    </div>
   <legend>
        <span>Тексты внизу</span>
    </legend>
    <div class="form-group row">
        <div class="col">
           {!! Form::label('info[bottomtitle]', 'Заголовок'); !!}
           {!! Form::text('info[bottomtitle]', null, array('placeholder' => 'Заголовок','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-6">
            {!! Form::label('info[left][title]', 'Название левого блока'); !!}
            {!! Form::text('info[left][title]', null, array('class' => 'form-control')) !!}
            <br>
            {!! Form::label('info[left][content]', 'Текст'); !!}
            {!! Form::textarea('info[left][content]', null, ["class" => "summernote form-control", 'rows' =>3]) !!}
        </div>
        <div class="col-6">
            {!! Form::label('info[right][title]', 'Название правого блока'); !!}
            {!! Form::text('info[right][title]', null, array('class' => 'form-control')) !!}
            <br>
            {!! Form::label('info[right][title]', 'Текст'); !!}
            {!! Form::textarea('info[right][content]', null, ["class" => "summernote form-control", 'rows' =>3]) !!}
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