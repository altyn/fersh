@extends('bashkaruu.layouts.default')

@section('title', 'Жаңы колдонуучу киргизүү' )

@section('styles')
<link rel="stylesheet" href="{{ asset('css/bash/build.css') }}">
<link rel="stylesheet" href="{{ asset('css/bash/jasny-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/bash/bootstrap-select.css') }}">
@endsection

@section('content')
<div class="content-box">
	<div class='col-lg-4 col-lg-offset-4'>

		<h1><i class='fa fa-user-plus'></i> Add User</h1>
		<hr>

		{{ Form::open(array('url' => 'users')) }}

		<div class="form-group">
			{{ Form::label('login', 'Name') }}
			{{ Form::text('login', '', array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('email', 'Email') }}
			{{ Form::email('email', '', array('class' => 'form-control')) }}
		</div>

		<div class='form-group'>
			@foreach ($roles as $role)
				{{ Form::checkbox($role->name,  $role->id ) }}
				{{ Form::label($role->name, ucfirst($role->name)) }}<br>
			@endforeach
		</div>

		<div class="form-group">
			{{ Form::label('password', 'Password') }}<br>
			{{ Form::password('password', array('class' => 'form-control')) }}

		</div>

		<div class="form-group">
			{{ Form::label('password', 'Confirm Password') }}<br>
			{{ Form::password('password_confirmation', array('class' => 'form-control')) }}

		</div>

		{{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

		{{ Form::close() }}
	</div>
</div>
@endsection
