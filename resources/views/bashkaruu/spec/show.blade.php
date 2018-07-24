@extends('bashkaruu.layouts.default')

@section('title')

@section('content')

<div class="element-wrapper">
	<h6 class="element-header">
		@if(isset($row['title']['ru']))
			<p>{{$row['title']['ru']}}</p>
		@endif
	</h6>
	<div class="element-box timeline">
		<div class="entry">
			<div class="title">
				<h3>ID</h3>
			</div>
			<div class="body">
				<p>{{$row->id}}</p>
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Кыргызча</h3>
			</div>
			<div class="body">
				@if(isset($row['title']['ky']))
					<p>{{$row['title']['ky']}}</p>
				@endif
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Русский</h3>
			</div>
			<div class="body">
				@if(isset($row['title']['ru']))
					<p>{{$row['title']['ru']}}</p>
				@endif
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>English</h3>
			</div>
			<div class="body">
				@if(isset($row['title']['en']))
					<p>{{$row['title']['en']}}</p>
				@endif
			</div>
		</div>

		</fieldset>

        <div class="buttons-w">
          	<a class="btn btn-success" href="{{route('spec.index')}}">Бардыгы</a>
          	<a class="btn btn-primary" href="{{ route('spec.edit', $row) }}">Өзгөртүү</a>
          	<a class="btn btn-danger float-right" href="{{ route('spec.delete', $row) }}">Өчүрүү</a>
        </div>
	</div>

	<h6 class="element-header mt-4">
		<p>Фрилансеры ({{ count($users) }})</p>
	</h6>

	<div class="element-box timeline">
		@foreach($users as $user)
		<div class="entry">
			<div class="title">
				<h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
			</div>
			<div class="body">
				<a href='/ru/freelancer/{{ $user->user_id }}' target='_blank' class=' btn btn-outline-primary btn-sm'>Профиль</a>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection