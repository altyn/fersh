<fieldset class="form-group">
	<legend>
        <span>Информация</span>
    </legend>
   <div class="row">
      <div class="col-sm-6">
         <div class="form-group">
            {!! Form::label('name', 'Название'); !!}
            <span class="required-label">*</span>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
         </div>
      </div>
   </div>
   
   <legend>
        <span>Права</span>
	</legend>
   <div class="form-group row">
      <div class="col-12">
			@foreach($permissions as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                    {{ $value->name }}</label>
                <br/>
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