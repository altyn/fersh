<fieldset class="form-group">
    <legend>
        <span>Картинка</span>
    </legend>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Миниатюра</label>
        <div class="col-sm-10">
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                <div class="fileinput-new thumbnail rounded" style="width: 200px; height: 150px;">
                    <img class="img-fluid" src="{{ asset($row->thumbnail['small']) }}">
                </div>
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                <div>
                    <span class="btn btn-default btn-file">
                    <span class="fileinput-new">Выбрать файл</span>
                    <span class="fileinput-exists">Изменить</span>
                    {!! Form::file('thumbnail', null, ["class" => "form-control"]) !!}</span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Очистить</a>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Название миниатюры</label>
        <div class="col-sm-10">
            {!! Form::text('thumbdesc[ru]', null, ['class' => 'form-control',]) !!}
        </div>
    </div>
    <legend>
        <span>Контент</span>
    </legend>
     <div class="form-group row">
        <label class="col-sm-2 col-form-label">Название</label>
        <div class="col-sm-10">
            {!! Form::text('title[ru]', null, ['class' => 'form-control', 'placeholder'=> 'Название']) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Короткое описание</label>
        <div class="col-sm-10">
            {!! Form::textarea('desc[ru]', null, ["class" => "form-control", 'rows' =>3]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Полное описание</label>
        <div class="col-sm-10">
            {!! Form::textarea('content[ru]', null, ["class" => "summernote form-control", 'rows' =>10]) !!}
            <div class="mb-2"></div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Опубликовать</label>
        <div class="col-sm-10">
            <div class="checkbox">
            <label>
                {!! Form::hidden('status', 0) !!}
                {!! Form::checkbox('status', 1, null) !!}
            <i></i>
            </label>
            </div>
        </div>
    </div>
</fieldset>
<div class="form-buttons-w">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
        <button id="submitForm" class="btn btn-primary" type="submit">Сохранить</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Назад</a>
        </div>
    </div>
</div>