@extends('bashkaruu.layouts.default')

@section('title')
@section('styles')

	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">

@endsection

@section('content')
	<div class="element-wrapper">
		<h6 class="element-header">Открыть сайт</h6>

		<div class="element-box">

            @if ($message = Session::get('success'))
                <div class="col-12">
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                </div>
            @endif

			{!! Form::model($row, 
				[	'id' => 'editForm',
					'route' => ['home.updateopen'],
					'method' => 'POST', 
					'enctype' => 'multipart/form-data'
				]) !!}
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Открыть</label>
                    <div class="col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input name="open" type="hidden" value="0">
                                @if($row->open)
                                    <input name="open" checked type="checkbox" value="1" onclick="this.form.submit();">
                                @else
                                    <input name="open" type="checkbox" value="1" onclick="this.form.submit();">
                                @endif
                            <i></i>
                        </label>
                        </div>
                    </div>
                </div>
                
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')
  

@endsection