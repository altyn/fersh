@extends('bashkaruu.layouts.default')

@section('title', 'Колдонуучулар' )

@section('content')

<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<h6 class="element-header">Колдонуучулар</h6>

				<div class="element-box">
					<div class="table-responsive table-main">
						<table class="table table-lightborder table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Email</th>
									<th>Login</th>
									<th>Действия</th>
								</tr>
							</thead>
							<tbody>
								@foreach($result as $row)
									<tr
									data-show="{{route('users.show', $row)}}"
									data-edit="{{route('users.edit', $row)}}"
									data-delete="{{route('users.delete', $row)}}"	
									>
										<td class="nowrap">
											{{$row->id}}
										</td>
										<td class="nowrap">
											{{$row->email}}
										</td>
										<td class="nowrap">
											{{$row->login}}
										</td>
										<td>
											<a href="#" class="{{route('users.show', $row)}}">
												<span class="jam jam-menu-f"></span>
											</a>
											<a href="#" class="{{route('users.edit', $row)}}">
												<span class="jam jam-pencil-f"></span>
											</a>
											<a href="#" class="{{route('users.delete', $row)}}">
												<span class="jam jam-trash-f"></span>
											</a>
										</td>

									</tr>
								@endforeach
							</tbody>
						</table>
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
              	<a id="rowView" class="btn btn-default hidden" href="">
                 	<span>Просмотр</span>
              	</a>
				<a id="rowEdit" class="btn btn-default hidden" href="">
					<span>Редактировать</span>
				</a>
				<a id="rowDelete" class="btn btn-default hidden" href="">
					<span>Удалить</span>
				</a>
           	</div>
    	</div>
 	</div>
</div>

@endsection

@section('scripts')
<script>
	$(function(){
		$(".table tbody tr").click(function(){

			$(this).siblings().removeClass('active');
			$(this).addClass('active');

			var routeShow = $(this).attr("data-show");
			$('#rowView').removeClass('hidden');
			$("#rowView").attr("href", routeShow);		

			var routeEdit = $(this).attr("data-edit");
			$('#rowEdit').removeClass('hidden');
			$("#rowEdit").attr("href", routeEdit);

			var routeDelete = $(this).attr("data-delete");
			$('#rowDelete').removeClass('hidden');
			$("#rowDelete").attr("href", routeDelete);
		});
	});
</script>
@endsection