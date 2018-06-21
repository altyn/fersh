@extends('bashkaruu.layouts.default')

@section('title', 'Роли')

@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<h6 class="element-header">Роли</h6>
				<div class="element-box">
					<div class="element-box-content clearfix">
						<div class="float-left">
						<a class="mr-2 mb-2 btn btn-success" href="{{ route('roles.create') }}">
							<i class="fa fa-plus"></i> Новый роль</a>
						</div>
					</div>

					<div class="table-responsive">
						@if ($message = Session::get('success'))
							<div class="alert alert-success">
								<p>{{ $message }}</p>
							</div>
						@endif	
					
						<table id="datatables" class="dataTables_wrapper table-sm" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th width="180px">Action</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($roles as $role)
								<tr>
									<td>{{ $user->id }}</td>
									<td>{{ $user->name }}</td>
									<td>
										@if(!empty($user->getRoleNames()))
											@foreach($user->getRoleNames() as $v)
												<label class="badge badge-success">{{ $v }}</label>
											@endforeach
										@endif
									</td>
									<td class="dataTables_actions">
										<a class="item_edit" href="{{ route('roles.show',$role->id) }}">
											<i class="os-icon os-icon-mail-18"></i>
										</a>
										<a class="item_edit" href="{{ route('roles.edit',$role->id) }}">
											<i class="os-icon os-icon-ui-49"></i>
										</a>
										<a class="item_edit" href="{{ route('roles.delete', $role->id) }}">
											<i class="os-icon os-icon-cancel-circle item_remove_icon"></i>
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
@endsection