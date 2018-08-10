@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

<meta name="_token" content="{{ csrf_token() }}">
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
 
@endsection

@section('content')

<div class="container">
    <div class="wrapper">
        <div class="title-header">
            <h6>Оставить заявку</h6>
        </div>
        <div class="wrapper-content bid">
            <form action="" method="POST"  data-toggle="validator" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                <fieldset class="infoform">
                    <div class="row">
                        <div class="col-md-8">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Ваше имя<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Электронный адрес<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 col-form-label">Контактный телефон<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phone" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="desc" class="col-sm-3 col-form-label">Жазуу<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea name="desc" rows="3" class="summernote form-control" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            <button type="submit" id="button" class="btn btn-save mr-2">Сохранить</button>
                        </div> 
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

@endsection