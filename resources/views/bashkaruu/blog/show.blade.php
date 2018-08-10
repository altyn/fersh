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
				<h3>Название</h3>
			</div>
			<div class="body">
				@if(isset($row['title']['ru']))
					<p>{{$row['title']['ru']}}</p>
				@endif
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Описание</h3>
			</div>
			<div class="body">
				@if(isset($row['desc']['ru']))
					<p>{{$row['desc']['ru']}}</p>
				@endif
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Контент</h3>
			</div>
			<div class="body">
				@if(isset($row['content']['ru']))
					<p>{!!  strip_tags($row['content']['ru']) !!}</p>
				@endif
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Миниатюра </h3>
			</div>
			<div class="body">
				<p>
					<img class="img-fluid" src="{{ asset($row->thumbnail['small'])}}">
				</p>
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Просмотры</h3>
			</div>
			<div class="body">
				<p>{{$row->getView()}}</p>
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Дата</h3>
			</div>
			<div class="body">
				<p>{{$row->getDate()}}</p>
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Статус</h3>
			</div>
			<div class="body">
				<p>
					<i class="status {{$row->getStatus()}}"></i>
				</p>
			</div>
		</div>

        <div class="buttons-w">
          	<a class="btn btn-success" href="{{route('blog.index')}}">Все публикации</a>
          	<a class="btn btn-primary" href="{{ route('blog.edit', $row) }}">Изменить</a>
          	<a class="btn btn-danger float-right" href="{{ route('blog.destroy', $row) }}">Удалить</a>
        </div>
	</div>
</div>

@endsection