@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')
    <div class="container user-profile">
        <div class="inner">
            <div class="row">

                @include('web.user.profile.freelancer.edit.sidebar')

                <div class="col-md-9 col-12">
                    <div class="infoform">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label for="email">Ваш электронный адрес<span class="required">*</span></label>
                                <input type="email" class="form-control" id="email" name="contacts[{{app()->getLocale()}}][email]">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="phone">Ваш номер телефона <span class="required">*</span></label>
                                <input type="tel" name="contacts[{{app()->getLocale()}}][phone]" id="phone" placeholder="996 (555) 555-555" autocomplete="tel" maxlength="18" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group save">
                            <a href="#" class="btn btn-save mr-2" role="button">Сохранить</a>
                            <a href="#" class="btn btn-cancel" role="button">Отмена</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script>
    document.getElementById('getval').addEventListener('change', readURL, true);
    function readURL(){
        var file = document.getElementById("getval").files[0];
        var reader = new FileReader();
        reader.onloadend = function(){
            document.getElementById('avatar-upload').style.backgroundImage = "url(" + reader.result + ")";        
        }
        if(file){
            reader.readAsDataURL(file);
        }else{
        }
    }
</script>

@endsection