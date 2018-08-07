@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')

<div class="container">
    <div class="wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/{{app()->getLocale()}}/freelancers/"><span class="jam jam-home"></span>Категории</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $sphere->title['ru'] }}</li>
            </ol>
        </nav>
        <div class="wrapper-content innersearch">
            <form action="">
                <fieldset class="field-container">
                    <input type="text" placeholder="Поиск в категории..." class="field" id="search" name="search" />
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
            <div class="row">
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
                            <div class="user-item-info-desc"><article>{!! $user->getShortBio() !!}  </article></div>
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

@endsection