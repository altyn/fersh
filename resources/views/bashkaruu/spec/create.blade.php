@extends('bashkaruu.layouts.default')

@section('title', 'Новая специализация' )

@section('styles')
@endsection


@section('content')
<div class="element-wrapper">
	<h6 class="element-header">Новая специализация</h6>

	<div class="element-box">
		{!! Form::model($row, ['id' => 'createForm', 'route' => 'spec.store', 'enctype' => 'multipart/form-data']) !!}
			@include('bashkaruu.spec.form', $row)
		{!! Form::close() !!}
	</div>
</div>
@endsection
@section('scripts')

@endsection