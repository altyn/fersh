@extends('bashkaruu.layouts.default')

@section('title')
@section('styles')

	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!-- include summernote css/js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
@endsection

@section('content')
	<div class="element-wrapper">
		<h6 class="element-header">Редактировать</h6>

		<div class="element-box">
			{!! Form::model($row, 
				[	'id' => 'editForm',
					'route' => ['home.update'],
					'method' => 'PUT', 
					'enctype' => 'multipart/form-data'
				]) !!}
				@include('bashkaruu.home.form')
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')
<script src="{{asset('/js/tagify.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
<script src="{{ asset('js/bash/summernote-ru-RU.js') }}"></script>

<script>
	$(document).ready(function() {
		$('.summernote').summernote({
        	height: 300,
			lang: 'ru-RU'
		});
	});
	var usersInput = document.querySelector('input[name=users]'),
		users = new Tagify(usersInput, {
			whitelist : [
			]
		})
	users.on('remove', onRemoveTag);

	function onRemoveTag(e){
		console.log(e.detail.value);
		
	}
</script>

@endsection