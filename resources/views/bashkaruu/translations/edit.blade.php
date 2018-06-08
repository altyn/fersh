@extends('bashkaruu.layout')

@section('title')

@section('styles')
@endsection

@section('content')
	<div class="element-wrapper">
		<h6 class="element-header">{{$row->ky}}</h6>

		<div class="element-box">
			{!! Form::model($row, 
				[	'id' => 'editForm',
					'route' => ['translations.update', $row], 
					'method' => 'PUT', 
					'enctype' => 'multipart/form-data'
				]) !!}
				@include('bashkaruu.translations.formedit', $row)
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')

@endsection