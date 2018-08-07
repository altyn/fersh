@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')

<div class="top">
    <div class="top-info">
        <div class="container">
            <div class="top-info-text">
                <h4>{{ $homeinfo->info['bannertitle'] }}</h4>
                <div class="text-center mb-4 mt-4">
                    <a href="/{{app()->getLocale()}}/freelancers/" class="btn btn-search">Найти исполнителя</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="wrap">
        <div class="title-header">
            <h6>Категории</h6>
        </div>
        <div class="wrap-content">
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
            <h6>Опытные исполнители</h6>
        </div>
        <div class="wrap-content user-list">
            <div class="row">
                @foreach($users as $user)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="user-item">
                        <div class="user-item-picture">
                            <div class="user-item-img">
                                <a href="/{{ app()->getLocale()}}/freelancer/{{ $user->user_id }}">
                                    <img class="img-fluid" src="{{ asset($user->avatar['360x360']) }}">
                                </a>
                            </div>
                        </div>
                        <div class="user-item-info">
                            <div class="user-item-info-name"><a href="/{{ app()->getLocale()}}/freelancer/{{ $user->user_id }}">{{ $user->getFio()}}</a></div>
                            <div class="user-item-info-spec">@if(isset($user->getSphere()->title))<a href="/{{ app()->getLocale()}}/freelancer/{{ $user->user_id }}">{{ $user->getsphere()->title['ru'] }}</a>@endif</div>
                            <div class="user-item-info-desc"><article>{!! $user->getShortBio() !!}  </article></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col text-center">
                <a href="/{{app()->getLocale()}}/freelancers/" class="btn btn-signin">Все исполнители<span class="jam jam-arrow-right"></span></a>
            </div>
        </div>
        <div class="title-header"></div>
        <div class="wrap-content wrap-info">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="wrap-info-top mb-4 mt-3">
                        <h5>{{ $homeinfo->info['bottomtitle'] }}</h5>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="title-header">
                        <h6>{{ $homeinfo->info['left']['title'] }}</h6>
                    </div>
                    <div class="wrap-info-article mt-3">
                        {!! $homeinfo->info['left']['content'] !!}
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="title-header">
                        <h6>{{ $homeinfo->info['right']['title'] }}</h6>
                    </div>
                    <div class="wrap-info-article mt-3">
                        {!! $homeinfo->info['right']['content'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

@endsection