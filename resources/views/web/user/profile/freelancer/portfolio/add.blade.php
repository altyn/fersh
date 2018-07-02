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
                        <form action="/{{ app()->getLocale() }}/freelancer/portfolio/create" accept-charset="UTF-8" method="POST" enctype="multipart/form-data" id="newproject">
                            @csrf
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="title">Название проекта<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="title" name="description[{{app()->getLocale()}}][title]"  required>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="desc">Описание проекта<span class="required">*</span></label>
                                    <textarea name="description[{{app()->getLocale()}}][desc]" id="desc" class="form-control" rows="6"></textarea>
                                </div>
                                <div class="col-sm-6 col-12 form-group">
                                    <label for="bio">Сфера проекта</label>
                                    <div class="d-block">
                                        <select class="sphera-multi form-control" name="description[{{app()->getLocale()}}][sphere]" multiple="multiple" ></select>
                                    </div>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="tags">Тэги</label>
                                    <input type="text" class="form-control" id="tags" name="tags[{{app()->getLocale()}}][tags]">
                                    <small>Напишите каждое предложение(слово) через запятую</small>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6 col-12 form-group">
                                            <label for="files">Обложка проекта</label>
                                            <div class="fileinput fileinput-new input-group fileinput-cover" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: auto; height: 150px;">
                                                    <img src="{{ asset('img/freelancer/portfolio/sample.png') }}">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: auto; max-height: 150px;"></div>
                                                <div class="fileinput-controls">
                                                    <span class="btn btn-file">
                                                        <span class="fileinput-new"><span class="jam jam-plus"></span></span>
                                                        <span class="fileinput-exists"><span class="jam jam-pencil"></span></span>
                                                        <input type="file" class="form-control" id="cover" name="cover">
                                                    </span>
                                                    <a href="#" class="btn fileinput-exists" data-dismiss="fileinput"><div class="jam jam-trash"></div></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label class="custom-label">Ссылки на других ресурсах</label>
                                            <div class="row">
                                                <div class="col-12 input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span class="jam jam-behance"></span></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="links[behance]" placeholder="Behance">
                                                </div>
                                                <div class="col-12 input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><img class="input-img" src="//cdn.dribbble.com/assets/icon-team-dribbble-8706862cdb0afa7f43f9e0218b073515f0a2bef19780961d324ae4620ebe249b.png" alt="Dribble"></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="links[dribble]" placeholder="Dribble">
                                                </div>
                                                <div class="col-12 input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span class="jam jam-aperture"></span></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="links[other]" placeholder="Другой">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="files">Картинки</label>
                                    <div class="d-block">
                                        <small>Иллюстрации проекта Загрузите одну или более картинок, которые проиллюстрируют ваш проект. Картинки будут выводиться в полном размере. Поддерживаются форматы png и jpg.</small>
                                        <div id="uploadPictures" class="dropzone">
                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="button" class="btn btn-save mr-2">Сохранить</button>
                                <a href="#" class="btn btn-cancel" role="button">Отмена</a>
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

        var token = "{{ Session::token() }}";

        var uploadPictures = new Dropzone("#uploadPictures", {
            url: "/{{ app()->getLocale() }}/freelancer/portfolio/create",
            paramName: "files",
            params: {
                _token: token
            },
            maxFilesize: 100,
            maxFiles: 20,
            parallelUploads: 20,
            uploadMultiple: true,
            thumbnailWidth: 220,
            thumbnailHeight: 220,
            acceptedFiles: 'image/*, application/pdf' ,
            addRemoveLinks: true,
            autoProcessQueue: false,
            dictCancelUpload: 'Отменить',
            dictCancelUploadConfirmation: 'Удалить',
            dictRemoveFile : 'Удалить',
            dictDefaultMessage: 'Выберите картинки',
             init: function () {
                var uploadPictures = this;

                $("#button").click(function (e) {
                    e.preventDefault();
                    uploadPictures.processQueue();
                });

                this.on('sending', function(file, xhr, formData) {
                    var data = $('#newproject').serializeArray();
                    
                    $.each(data, function(key, el) {
                        formData.append(el.name, el.value);
                        // formData.append('File', cover);
                    });
                    formData.append("cover", $("input[name=cover]")[0].files[0]);
                });

                this.on("success", function(file, responseText) {
                    console.log(file);
                    console.log(responseText);
                });
            }
        });
    });
        
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