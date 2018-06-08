@extends('bashkaruu.layouts.default')

@section('title', $row->login )

@section('content')

<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<h6 class="element-header">{{$row->login }}</h6>

				<div class="element-box timeline">
					<div class="entry">
						<div class="title">
							<h3>Логин</h3>
						</div>
						<div class="body">
							<p>{{$row->login}}</p>	
						</div>
					</div>
					<div class="entry">
						<div class="title">
							<h3>Эл.дарек</h3>
						</div>
						<div class="body">
							<p>{{$row->email}}</p>	
						</div>
					</div>
					<div class="entry">
						<div class="title">
							<h3>Статус</h3>
						</div>
						<div class="body">
							<p>
							</p>
						</div>
					</div>
					<div class="entry no-border">
						<div class="title">
							<h3>Роль</h3>
						</div>
						<div class="body">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="content-panel">
	<div class="element-wrapper">
		<h6 class="element-header">Действия</h6>
		<div class="element-box-tp">
			<div class="el-buttons-list full-width">
				<a class="btn btn-default" href="{{route('users.create')}}">
					<span>Добавить</span>
				</a>
				<a class="btn btn-default" href="{{route('users.edit', $row)}}">
					<span>Редактировать</span>
				</a>
				<a class="btn btn-default" href="{{route('users.delete', $row)}}">
					<span>Удалить</span>
				</a>	              	
			</div>
		</div>
	</div>
</div>

@endsection