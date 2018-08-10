@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

<meta name="_token" content="{{ csrf_token() }}">
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
 <script src='https://www.google.com/recaptcha/api.js'></script>
 
@endsection

@section('content')

<div class="container">
    <div class="wrapper">
        <div class="title-header">
            <h6>Оставить заявку</h6>
        </div>

        <div class="wrapper-content bid">
            <form action="/{{app()->getLocale()}}/bid/new" method="POST"  data-toggle="validator" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        @if ($errors->any())
                            <div class="alert alert-danger mt-2 mb-2" role="alert">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('warning'))
                            <div class="alert alert-warning">
                                {{ session('warning') }}
                            </div>
                        @endif
                    </div>
                </div>
                <fieldset class="bidform">
                    <div class="row">
                        <div class="col-md-8">                           
                            <div class="row">
                                <div class="col-md-6 col-12">
                                     <div class="form-group">
                                        <label for="name">Ваше имя<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Электронный адрес<span class="required">*</span></label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Контактный телефон<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <label for="name">Название<span class="required">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="desc">Описание<span class="required">*</span></label>
                                <textarea name="desc" rows="3" class="summernote form-control" required>{{ old('desc') }}</textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="sphere">Категория</label>
                                <div class="d-block">
                                    <select class="sphera form-control" name="spec"></select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="g-recaptcha mb-3" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                            </div>
                            <button type="submit" id="button" class="btn btn-save mr-2">Отправить</button>
                        </div> 
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script src="{{ asset('js/bash/summernote-ru-RU.js') }}"></script>

<script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                lang: 'ru-RU',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['roboto_regular']],
                    ['fontsize', ['16px']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                     ["insert", ["link",]],
                    ["view", ["codeview"]]
                ]
            });

        });
        var url = "{{ route('specsjs') }}";
        jQuery.getJSON(url).done(
            function (data) {
                jQuery('.sphera').select2({
                    placeholder: 'Выберите категорию',
                    data: data,
                });
            }
        );
</script>

@endsection