@extends('bashkaruu.layouts.default')

@section('title')

@section('styles')
@endsection

@section('content')
	<div class="element-wrapper">
		<h6 class="element-header">{{$row['title']['ru']}}</h6>

		<div class="element-box">
			{!! Form::model($row, 
				[	'id' => 'editForm',
					'route' => ['spec.update', $row],
					'method' => 'PUT', 
					'enctype' => 'multipart/form-data'
				]) !!}
				@include('bashkaruu.spec.formedit', $row)
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')

@endsection