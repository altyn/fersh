@extends('bashkaruu.layouts.default')

@section('title', $user->login )

@section('content')

<div class="row">
	<div class="col-sm-12">
		<div class="element-wrapper">
			<h6 class="element-header">{{ $user->login }}</h6>

			<div class="element-box timeline">
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a href="#nav-ru" class="nav-item nav-link active" id="nav-ru-tab" data-toggle="tab" role="tab" aria-controls="nav-ru" aria-selected="true">Русский</a>
					<a href="#nav-ky" class="nav-item nav-link" id="nav-ky-tab" data-toggle="tab" role="tab" aria-controls="nav-ky" aria-selected="false">Кыргызча</a>
					<a href="#nav-en" class="nav-item nav-link" id="nav-en-tab" data-toggle="tab" role="tab" aria-controls="nav-en" aria-selected="false">English</a>
					</div>
				</nav>

				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-ru" role="tabpanel" aria-labelledby="nav-ru-tab">
						<fieldset class="form-group">
							<div class="entry">
								<div class="title">
									<h3>Логин</h3>
								</div>
								<div class="body">
									{{ $user->login }}
								</div>
							</div>
							<div class="entry">
								<div class="title">
									<h3>Email</h3>
								</div>
								<div class="body">
									{{ $user->email }}
								</div>
							</div>
							<div class="entry">
								<div class="title">
									<h3>Роли</h3>
								</div>
								<div class="body">
									@if(!empty($user->getRoleNames()))
										@foreach($user->getRoleNames() as $v)
											<label class="badge badge-success">{{ $v }}</label>
										@endforeach
									@endif
								</div>
							</div>
						</fieldset>
					</div>

					<div class="tab-pane fade" id="nav-ky" role="tabpanel" aria-labelledby="nav-ky-tab">
						<fieldset class="form-group">
							<div class="entry">
								<div class="title">
									<h3>Логин</h3>
								</div>
								<div class="body">
									{{ $user->login }}
								</div>
							</div>
							<div class="entry">
								<div class="title">
									<h3>Email</h3>
								</div>
								<div class="body">
									{{ $user->email }}
								</div>
							</div>
							<div class="entry">
								<div class="title">
									<h3>Роли</h3>
								</div>
								<div class="body">
									@if(!empty($user->getRoleNames()))
										@foreach($user->getRoleNames() as $v)
											<label class="badge badge-success">{{ $v }}</label>
										@endforeach
									@endif
								</div>
							</div>
						</fieldset>
					</div>

					<div class="tab-pane fade" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
						<fieldset class="form-group">
							<div class="entry">
								<div class="title">
									<h3>Login</h3>
								</div>
								<div class="body">
									{{ $user->login }}
								</div>
							</div>
							<div class="entry">
								<div class="title">
									<h3>Email</h3>
								</div>
								<div class="body">
									{{ $user->email }}
								</div>
							</div>
							<div class="entry">
								<div class="title">
									<h3>Роли</h3>
								</div>
								<div class="body">
									@if(!empty($user->getRoleNames()))
										@foreach($user->getRoleNames() as $v)
											<label class="badge badge-success">{{ $v }}</label>
										@endforeach
									@endif
								</div>
							</div>
						</fieldset>
					</div>
				</div>

				<div class="buttons-w">
					<a class="btn btn-success" href="{{route('users.index')}}">Все</a>
					<a class="btn btn-primary" href="{{ route('users.edit', $user) }}">Измненить</a>
					<a class="btn btn-danger float-right" href="{{ route('users.delete', $user) }}">Удалить</a>
				</div>

			</div>
		</div>
	</div>
</div>

@endsection