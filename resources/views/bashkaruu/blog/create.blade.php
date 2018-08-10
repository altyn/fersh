@extends('bashkaruu.layouts.default')

@section('title', 'Новая публикация' )

@section('styles')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
@endsection

@section('content')
<div class="element-wrapper">
	<h6 class="element-header">Новая публикация</h6>

	<div class="element-box">
		{!! Form::model($row, ['id' => 'createForm', 'route' => 'blog.store', 'enctype' => 'multipart/form-data']) !!}
			@include('bashkaruu.blog.form', $row)
		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script src="{{ asset('js/bash/summernote-ru-RU.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                lang: 'ru-RU',
                toolbar: [
                    ['style', ['style']],
                    ['fontname', ['roboto_regular']],
                    ['fontsize', ['16px']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ["table", ["table"]],
                     ["insert", ["link", "picture", "video"]],
                    ["view", ["fullscreen", "codeview", "help"]]
                ]
            });
        });

    </script>

@endsection