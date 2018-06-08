<fieldset class="form-group">
   <div class="row">
      <div class="col-sm-6">
         <div class="form-group">
            {!! Form::label('key', 'keyword'); !!}
            {!! Form::text('key', null, ['class' => 'form-control']) !!}
         </div>
      </div>
      <div class="col-sm-12">
         <div class="form-group">
            {!! Form::label('ky', 'Кыргызча'); !!}
            {!! Form::text('ky', null, ['class' => 'form-control']) !!}
         </div>
      </div>
      <div class="col-sm-12">
         <div class="form-group">
            {!! Form::label('ru', 'На русском'); !!}
            {!! Form::text('ru', null, ['class' => 'form-control']) !!}
         </div>
      </div>
      <div class="col-sm-12">
         <div class="form-group">
            {!! Form::label('en', 'English'); !!}
            {!! Form::text('en', null, ['class' => 'form-control']) !!}
         </div>
      </div>
   </div>
</fieldset>
<div class="form-buttons-w">
   <button id="submitForm" class="btn btn-success" type="submit">Сактоо</button>
   <a href="{{ url()->previous() }}" class="btn btn-secondary">Айнуу</a>
</div>