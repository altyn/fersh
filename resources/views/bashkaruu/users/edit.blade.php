@extends('bashkaruu.layouts.default')

@section('title', $row->login)

@section('styles')
<link rel="stylesheet" href="{{ asset('css/bash/build.css') }}">
<link rel="stylesheet" href="{{ asset('css/bash/jasny-bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/bash/bootstrap-select.css') }}">
@endsection

@section('content')
<div class="content-box">
	<div class="row">
		<div class="col-sm-12">
			<div class="element-wrapper">
				<h6 class="element-header">{{$row->login}}</h6>

				<div class="element-box">
					<div class="form-desc">
                        <p><span>*</span> - обязательные для заполнения поля</p>
                        <div class="form-errors">
                        </div>
                     </div>
					{!! Form::model($row, 
						[
							'id' => 'editForm',
							'route' => ['users.update', $row], 
							'method' => 'PUT', 
							'enctype' => 'multipart/form-data'
						]) !!}
						@include('bashkaruu.users.form', $row)
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('/js/bash/jasny-bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/bash/bootstrap-select.min.js') }}"></script>
<script type="text/javascript">
	$('.selectpicker').selectpicker({
		iconBase: 'dp-icon',
		tickIcon: 'dp-icon-check',
	});
</script>
<script>
	$(function(){
		$('#editForm').submit(function(){
			var password = $('input[name=password]').val(),
				passwordConfirm = $('input[name=passwordConfirm]').val(),
				error = 0,				
				errorBody = $('.form-errors');

			$('.required').each(function(){
				if(!$(this).val())
					error++;
			});			

			if(error > 0){			
				errorBody.addClass('active');
				errorBody.append('<div class="form-error">Заполните обязательные поля</div>');
			} else {
				if(password && passwordConfirm){
					if(password == passwordConfirm){
						return true;
					} else {
						errorBody.append('<div class="form-error">Пароли не совпадают</div>');
					}
				}
			}

			return false;
		});
	});
</script>
@endsection