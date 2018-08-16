@extends('bashkaruu.layouts.default')

@section('title')

@section('content')
<div class="element-wrapper">
	<h6 class="element-header">
		<p>{{$row->title}}</p>
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
				<h3>Имя</h3>
			</div>
			<div class="body">
				<p>{{$row->name}}</p>
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Телефон</h3>
			</div>
			<div class="body">
				<p>{{$row->phone}}</p>
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Email</h3>
			</div>
			<div class="body">
				<p>{{$row->email}}</p>
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Специализация</h3>
			</div>
			<div class="body">
				<p>{{$row->specialization->title['ru']}}</p>
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Тема</h3>
			</div>
			<div class="body">
				<p>{{$row->title}}</p>
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Описание работы</h3>
			</div>
			<div class="body">
				<p>{!! strip_tags($row->desc) !!}</p>
			</div>
		</div>
		<div class="entry">
			<div class="title">
				<h3>Дата</h3>
			</div>
			<div class="body">
				<p>{{$row->created_at}}</p>
			</div>
		</div>

        <div class="buttons-w">
          	<a class="btn btn-success" href="{{route('bids.index')}}">Все публикации</a>
          	<a class="btn btn-danger float-right" href="{{ route('bids.destroy', $row) }}">Удалить</a>
        </div>
	</div>
</div>

@endsection