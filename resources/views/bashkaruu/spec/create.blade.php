@extends('bashkaruu.layout')

@section('title', 'Жаңы которуу' )

@section('styles')
@endsection


@section('content')
<div class="element-wrapper">
	<h6 class="element-header">Жаңы которуу</h6>

	<div class="element-box">
		{!! Form::model($row, ['id' => 'createForm', 'route' => 'translations.store', 'enctype' => 'multipart/form-data']) !!}
			@include('bashkaruu.translations.form', $row)
		{!! Form::close() !!}
	</div>
</div>
@endsection
@section('scripts')

@endsection