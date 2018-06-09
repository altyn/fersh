@extends('bashkaruu.layout')

@section('title')

@section('content')

<div class="element-wrapper">
	<h6 class="element-header">{{$row->ky}}</h6>

	<div class="element-box timeline">
		<div class="entry">
			<div class="title">
				<h3>Keyword</h3>
			</div>
			<div class="body">
				<p>{{$row->key}}</p>							
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Кыргызча</h3>
			</div>
			<div class="body">
				<p>{{$row->ky}}</p>							
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Русский</h3>
			</div>
			<div class="body">
				<p>{{$row->ru}}</p>							
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>English</h3>
			</div>
			<div class="body">
				<p>{{$row->en}}</p>							
			</div>
		</div>

		</fieldset>

        <div class="buttons-w">
          	<a class="btn btn-success" href="{{route('translations.index')}}">Бардыгы</a>
          	<a class="btn btn-primary" href="{{ route('translations.edit', $row) }}">Өзгөртүү</a>
          	<a class="btn btn-danger float-right" href="{{ route('translations.delete', $row) }}">Өчүрүү</a>
        </div>
	</div>
</div>

@endsection