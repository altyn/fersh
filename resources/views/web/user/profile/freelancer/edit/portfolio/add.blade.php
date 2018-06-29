@extends('web.layouts.app')

@section('title', 'Freelance.kg' )
<link rel="stylesheet" href="{{ asset('/css/tagify.css')}}">

@section('styles')

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('/css/_profile_info.css') }}">
<script src="{{ asset('js/dropzone.js') }}"></script>
<link rel="stylesheet" href="{{ asset('/css/dropzone.css') }}">

@endsection

@section('content')
    <div class="container user-profile">
        <div class="inner">
            <div class="row">

                @include('web.user.profile.freelancer.edit.sidebar')

                <div class="col-md-9 col-12">
                    <div class="infoform">
                        <div class="infoform-title">
                            <h6>Добавить</h6>
                        </div>
                        <form>
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="title">Название проекта<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title"  required>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="desc">Описание проекта<span class="required">*</span></label>
                                    <textarea name="desc" id="desc" class="form-control" rows="6"></textarea>
                                </div>
                                <div class="col-sm-6 col-12 form-group">
                                    <label for="bio">Сфера проекта</label>
                                    <div class="d-block">
                                        <select class="sphera-multi form-control" name="sphere" multiple="multiple" ></select>
                                    </div>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="tags">Тэги</label>
                                    <input type="text" class="form-control" id="tags" name="tags">
                                    <small>Напишите каждое предложение(слово) через запятую</small>
                                </div>
                                <div class="col-12">
                                    <div class="d-block form-group">
                                        <label>Ссылки на других ресурсах</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12 form-group">
                                            <input type="text" class="form-control" name="behance" placeholder="Behance">
                                        </div>
                                        <div class="col-md-6 col-12 form-group">
                                            <input type="text" class="form-control" name="dribble" placeholder="Dribble">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="files">Картинки</label>
                                    <div class="d-block">
                                        <small>Иллюстрации проекта Загрузите одну или более картинок, которые проиллюстрируют ваш проект. Картинки будут выводиться в полном размере. Поддерживаются форматы png и jpg.</small>
                                        <div id="uploadPictures" class="dropzone">
                                             @csrf
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-12 form-group">
                                    <label for="files">Обложка проекта</label>
                                    <div class="d-block">
                                        <small>Рекомендумеый размер обложки 360х360. Поддерживаются форматы png и jpg.</small>
                                    </div>
                                    <div class="fileinput fileinput-new input-group mt-3" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail rounded" style="width: 200px; height: 150px;">
                                            <img class="img-fluid" src="#">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script src="{{ asset('/js/tagify.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

<script>

    Dropzone.autoDiscover = false;
    $(document).ready(function(){

        var baseUrl = "{{ url('/') }}";
        var token = "{{ Session::token() }}";

        var uploadPictures = new Dropzone("#uploadPictures", {
            url: "/{{ app()->getLocale() }}/freelancer/edit/portfolio/uploadpictures",
            paramName: "file",
            params: {
                _token: token
            },
            maxFilesize: 2,
            acceptedFiles: 'image/*, application/pdf' ,
            addRemoveLinks: true,
            autoProcessQueue: false,
            dictCancelUpload: 'Отменить',
            dictCancelUploadConfirmation: 'Удалить',
            dictRemoveFile : 'Удалить',
            dictDefaultMessage: 'Выберите картинки'
        });

        uploadPictures.on("complete", function(file) {
            uploadPictures.removeFile(file);
        });

    });

// $('#imgsubbutt').click(function(){           
//   myDropzone.processQueue();
// });
        
    var tagsInput = document.querySelector('input[id=tags]'),
        tags = new Tagify(tagsInput, {
            whitelist: []
        })

    tags.on('remove', onRemoveTag);
    function onRemoveTag(e) {
        console.log(e, e.detail);
    }
    function onAddTag(e) {
        console.log(e, e.detail);
    }


    var url = "{{ asset('js/datamini.json') }}";
    jQuery.getJSON(url).done(
        function (data) {
            jQuery('.sphera-multi').select2({
                placeholder: 'Выберите сферу',
                allowClear: true,
                multiple: false,
                data: data,
                theme: "bootstrap4",
                width: '100%'
            });
        }
    );
</script>

@endsection