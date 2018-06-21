@extends('bashkaruu.layouts.default')

@section('title', 'Все пользователи' )

@section('content')

	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<h6 class="element-header">Все пользователи</h6>
				<div class="element-box">
					<div class="element-box-content clearfix">
						<div class="float-left">
						<a class="mr-2 mb-2 btn btn-success" href="{{ route('users.create') }}">
							<i class="fa fa-plus"></i> Новый пользователь</a>
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
									<th>Email</th>
									<th>Roles</th>
									<th width="180px">Action</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($users as $user)
								<tr>
									<td>{{ $user->id }}</td>
									<td>{{ $user->login }}</td>
									<td>{{ $user->email }}</td>
									<td>
										@if(!empty($user->getRoleNames()))
											@foreach($user->getRoleNames() as $v)
												<label class="badge badge-success">{{ $v }}</label>
											@endforeach
										@endif
									</td>
									<td class="dataTables_actions">
										<a class="item_edit" href="{{ route('users.show',$user->id) }}">
											<i class="os-icon os-icon-mail-18"></i>
										</a>
										<a class="item_edit" href="{{ route('users.edit',$user->id) }}">
											<i class="os-icon os-icon-ui-49"></i>
										</a>
										<a class="item_edit" href="{{ route('users.delete', $user->id) }}">
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

@section('scripts')
<script>
	$(document).ready(function() {
	    $('#datatables').DataTable();
    });	
</script>
@endsection