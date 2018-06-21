@extends('bashkaruu.layouts.default')

@section('title', $user->login)

@section('styles')

@section('content')
	<div class="element-wrapper">
		<h6 class="element-header">{{$user->login}}</h6>

		<div class="element-box">
			{!! Form::model($user, 
				[	'id' => 'editForm',
					'route' => ['users.update', $user], 
					'method' => 'PUT', 
					'enctype' => 'multipart/form-data'
				]) !!}
				@include('bashkaruu.users.form', $user)
			{!! Form::close() !!}
		</div>
	</div>
@endsection