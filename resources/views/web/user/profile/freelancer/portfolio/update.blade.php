@extends('web.layouts.app')

@section('title', 'Freelance.kg' )
<link rel="stylesheet" href="{{ asset('/css/tagify.css')}}">

@section('styles')

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('/css/_profile_info.css') }}">

@endsection

@section('content')
    <div class="container">
        <div class="user-profile">
            <div class="inner">
                <div class="row">
                    @include('web.user.profile.freelancer.edit.sidebar')
                    <div class="col-md-9 col-12">
                        <div class="infoform">
                            <div class="infoform-title">
                                <h6>Новое портфолио</h6>
                            </div>
                            <form  action="/{{ app()->getLocale() }}/freelancer/portfolio/edit" accept-charset="UTF-8" method="POST" enctype="multipart/form-data" id="uploadPortfolio">
                                @csrf
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ $message }}
                                    </div>
                                @endif
                                <input type="hidden" name="id" value="{{ $portfolio->id }}">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="title">Название проекта<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="title" name="description[{{app()->getLocale()}}][title]" 
                                        @if($portfolio->description[app()->getLocale()]['title'])
                                            value="{{ $portfolio->description[app()->getLocale()]['title'] }}"
                                        @endif>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="desc">Описание проекта<span class="required">*</span></label>
                                        <textarea name="description[{{app()->getLocale()}}][desc]" id="desc" class="form-control" rows="6">@if($portfolio->description[app()->getLocale()]['desc']){{ $portfolio->description[app()->getLocale()]['desc'] }}@endif</textarea>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="tags">Тэги</label>
                                        <input type="text" class="form-control" id="tags" name="tags[{{app()->getLocale()}}][tags]"
                                        @if($portfolio->tags[app()->getLocale()]['tags'])
                                            value="{{ $portfolio->tags[app()->getLocale()]['tags'] }}"
                                        @endif>
                                        <small>Напишите каждое предложение(слово) через запятую</small>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 col-12 form-group">
                                                <label for="files">Обложка проекта</label>
                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="{{ asset($portfolio->cover) }}">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                    <div>
                                                        <span class="btn btn-outline-primary btn-file">
                                                            <span class="fileinput-new">Выбрать файл</span>
                                                            <span class="fileinput-exists">Изменить</span>
                                                            <input type="file" class="form-control" id="cover" name="cover">
                                                        </span>
                                                        <a href="#" class="btn btn-outline-danger fileinput-exists" data-dismiss="fileinput">Очистить</a>
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
                                                        <input type="text" class="form-control" name="links[behance]" 
                                                        @if(isset($portfolio->links['behance']))
                                                            value="{{ $portfolio->links['behance'] }}"
                                                        @endif>
                                                    </div>
                                                    <div class="col-12 input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><img class="input-img" src="//cdn.dribbble.com/assets/icon-team-dribbble-8706862cdb0afa7f43f9e0218b073515f0a2bef19780961d324ae4620ebe249b.png" alt="Dribble"></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="links[dribble]" 
                                                        @if(isset($portfolio->links['dribble']))
                                                            value="{{ $portfolio->links['dribble'] }}"
                                                        @endif>
                                                    </div>
                                                    <div class="col-12 input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><span class="jam jam-github-circle"></span></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="links[github]" 
                                                        @if(isset($portfolio->links['github']))
                                                            value="{{ $portfolio->links['github'] }}"
                                                        @endif>
                                                    </div>
                                                </div>
                                                <label class="custom-label">Другой ресурс</label>
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <input type="text" class="form-control" name="links[other][title]" 
                                                        @if(isset($portfolio->links['other']['title']))
                                                            value="{{ $portfolio->links['other']['title']}}"
                                                        @endif>
                                                    </div>
                                                    <div class="col-12 input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><span class="jam jam-link"></span></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="links[other][link]"
                                                        @if(isset($portfolio->links['other']['link']))
                                                            value="{{ $portfolio->links['other']['link']}}"
                                                        @endif>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="files">Картинки</label>
                                        <div class="d-block portfolio-file-add">
                                            <small class="d-block">Иллюстрации проекта</small>
                                            <small>Загрузите одну или более картинок, которые проиллюстрируют ваш проект. Размер 1110 x AUTO. Файлы будут выводиться в полном размере. Поддерживаются форматы png и jpg.</small>
                                            <div class="body images mt-4 mb-4">
                                                <div class="row">
                                                    @if(isset($portfolio->files['fulls']))
                                                        @foreach($portfolio->files['fulls'] as $key => $file)
                                                            <div class="col-md-3 mb-4">
                                                                <div class="photo-child">
                                                                    <img class="img-fluid" src="{{ asset($file['file'])}}">
                                                                    <a class="image-delete" href="/{{app()->getLocale()}}/freelancer/portfolio/{{$portfolio->id}}/deletefile/{{ $key }}">
                                                                        <span class="jam jam-close"></span>
                                                                        <input type="hidden" name="fileid" class="fileid" value="{{ $key }}">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="backhighlighter mt-4 mb-4">
                                                <div class="col">
                                                    <div class="imgfiles row">
                                                        <div class="form-group col-md-3">
                                                            <div class="img-picker">
                                                                <div class="form-control btn btn-default btn-block img-upload-btn">
                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                    <span class="jam jam-plus"></span>
                                                                    <input type="file" name="files[]" multiple onchange="getval(this);">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="loader">
                                        <div class="loader"></div>
                                        <div class="loader-text">Загружаются файлы...</div>
                                    </div>
                                    <button type="submit" id="button" class="btn btn-save mr-2">Сохранить</button>
                                    <a href="#" class="btn btn-cancel" role="button">Отмена</a>
                                </div>
                            </form>
                        </div>
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
    $('#loader').hide();
    $("#uploadPortfolio").on("submit", function(){
        $('#loader').show();
    })

    function getval(sel) {
        if (sel.files && sel.files[0]) {
            var reader = new FileReader();
            console.log(sel.files[0].name);
            
            reader.onload = function (e) {
                $('<img class="preview" src="'+e.target.result+'" alt="your image" />').insertAfter(sel);
                $(sel).closest('.img-upload-btn').css('background-image','url('+e.target.result+')' )
                $('<button class="btn btn-link deletor" onclick="deletor(this);"><small>X</small></button>').insertAfter(sel);
            }

            reader.readAsDataURL(sel.files[0]);
        }

            $('.imgfiles').append('<div class="form-group col-md-3"><div class="img-picker"><div class="form-control btn btn-default btn-block img-upload-btn"><span class="jam jam-plus"></span><input type="file" name="files[]" onchange="getval(this);"></div></div></div>');
        }
    function deletor(id){
        $(id).closest('.col-md-3').remove();
    }    

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
</script>

@endsection