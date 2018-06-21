@extends('bashkaruu.layouts.default')

@section('title', $row->name )

@section('content')

	<div class="element-wrapper">
		<h6 class="element-header">{{$row->getTitle()}}</h6>

		<div class="element-box">
			{!! Form::model($role, 
				[	'id' => 'editForm',
					'route' => ['roles.update', $role], 
					'method' => 'PUT', 
					'enctype' => 'multipart/form-data'
				]) !!}
				@include('bashkaruu.posts.form', $role)
			{!! Form::close() !!}
		</div>
	</div>
@endsection