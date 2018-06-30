<fieldset class="form-group">
   <div class="row">
      <div class="col-sm-12">
         <div class="form-group">
            {!! Form::label('title[ky]', 'Кыргызча'); !!}
            {!! Form::text('title[ky]', null, ['class' => 'form-control']) !!}
         </div>
      </div>
      <div class="col-sm-12">
         <div class="form-group">
            {!! Form::label('title[ru]', 'На русском'); !!}
            {!! Form::text('title[ru]', null, ['class' => 'form-control']) !!}
         </div>
      </div>
      <div class="col-sm-12">
         <div class="form-group">
            {!! Form::label('title[en]', 'English'); !!}
            {!! Form::text('title[en]', null, ['class' => 'form-control']) !!}
         </div>
      </div>
   </div>
</fieldset>
<div class="form-buttons-w">
   <button id="submitForm" class="btn btn-success" type="submit">Сактоо</button>
   <a href="{{ url()->previous() }}" class="btn btn-secondary">Айнуу</a>
</div>