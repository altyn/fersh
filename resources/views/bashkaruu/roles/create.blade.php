@extends('bashkaruu.layouts.default')

@section('title', 'Создать' )

@section('content')

<div class="element-wrapper">
	<h6 class="element-header">Создать</h6>
	<div class="element-box">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

		{!! Form::model($role, ['id' => 'createForm', 'route' => 'roles.store', 'enctype' => 'multipart/form-data']) !!}
			@include('bashkaruu.roles.form', $role)
		{!! Form::close() !!}
	</div>
</div>

@endsection