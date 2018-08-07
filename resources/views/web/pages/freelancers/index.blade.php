@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

<meta name="_token" content="{{ csrf_token() }}">
 
@endsection

@section('content')

<div class="container">
    <div class="wrapper">
        <div class="title-header">
            <h6>Категории</h6>
        </div>
         <div class="wrapper-content">
            <div class="specs">
                <div class="row">
                    @foreach($specs as $spec)
                    <div class="col-md-3 col-sm-6 col-xs-6 col-12">
                        <a href="/{{app()->getLocale()}}/freelancers/{{$spec->id}}" class="specs-link">{{ $spec->title['ru'] }}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="title-header">
            <h6>Поиск</h6>
        </div>
        <div class="wrapper-content search">
            <form action="">
                <fieldset class="field-container">
                    <input type="text" placeholder="Поиск по тэгам..." class="field" id="search" name="search" />
                    <div class="icons-container">
                        <div class="icon-search"></div>
                        <div class="icon-close" id="searchclear">
                            <div class="x-up"></div>
                            <div class="x-down"></div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="wrapper-content user-list">
            <div class="row-result row">
                @foreach($users as $user)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="user-item">
                        <div class="user-item-picture">
                            <div class="user-item-img">
                                <a href="/{{ app()->getLocale()}}/freelancer/{{ $user->user_id }}">
                                    <img class="img-fluid"  src="{{ asset($user->avatar['360x360']) }}">
                                </a>
                            </div>
                        </div>
                        <div class="user-item-info">
                            <div class="user-item-info-name"><a href="/{{ app()->getLocale()}}/freelancer/{{ $user->user_id }}">{{ $user->getFio()}}</a></div>
                            <div class="user-item-info-spec">@if(isset($user->getSphere()->title))<a href="/{{ app()->getLocale()}}/freelancer/{{ $user->user_id }}">{{ $user->getsphere()->title['ru'] }}</a>@endif</div>
                            <div class="user-item-info-desc"><article>{!! strip_tags($user->getShortBio()) !!}  </article></div>
                        </div>
                    </div>
                </div>
                @endforeach 
                <div class="col-12 mb-4 mt-4">
                    <nav>
                        {{ $users->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    $(document).on('ready', function() {
  
        $('.field').on('focus', function() {
            $('body').addClass('is-focus');
        });
        
        $('.field').on('blur', function() {
            $('body').removeClass('is-focus is-type');
        });
        
        $('.field').on('keydown', function(event) {
            $('body').addClass('is-type');
            if((event.which === 8) && $(this).val() === '') {
                $('body').removeClass('is-type');
            }
        });

    });
    $("#searchclear").click(function(){
        $("#search").val('');
        // $('.row-result').html('');
    });

    $('#search').on('keyup',function(){
    
        $value=$(this).val();
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        var url = "{{ url(app()->getLocale().'/freelancers') }}";
        console.log(url);
        
        $.ajax({
            type : 'get',
            url : url,
            data:{'search':$value},
            success:function(data){
                $('.row-result').html(data);
            }
        });
    });

</script>

@endsection