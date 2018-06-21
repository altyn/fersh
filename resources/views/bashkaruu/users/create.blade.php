@extends('bashkaruu.layouts.default')

@section('title', 'Новый пользователь' )

@section('content')

<div class="element-wrapper">
	<h6 class="element-header">Новый пользователь</h6>
	<div class="element-box">
		{!! Form::model($user, ['id' => 'createForm', 'route' => 'users.store', 'enctype' => 'multipart/form-data']) !!}
			@include('bashkaruu.users.form', $user)
		{!! Form::close() !!}
	</div>
</div>

@endsection
