@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="portfolio-header">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <div class="portfolio-header-ava">
                                <div class="portfolio-header-ava-img">
                                    @if(isset($freelancer->avatar['200x200']))
                                        <img class="img-fluid"  src="{{ asset($freelancer->avatar['200x200']) }}" alt="">
                                    @else
                                        <a href="/{{ app()->getLocale()}}/freelancer/edit/personal"><div class="no-ava"><span>Загрузить аватар</span></div></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-12">
                            <div class="portfolio-header-info">
                                <div class="portfolio-header-info-name">{{ $freelancer->first_name }} {{ $freelancer->last_name}} 
                                    @if($isVerify->activated == '1')
                                        <div class="verify" data-toggle="tooltip" data-placement="bottom" title="Пользователь верифицирован"><span class="jam jam-check"></span></div>
                                    @endif
                                    @if(auth()->user() )
                                        <div class="portfolio-header-control-right">
                                            <a href="/{{ app()->getLocale()}}/freelancer/{{ auth()->id()}}/portfolio/add" class="btn btn-add"><span class="jam jam-plus"></span>Добавить проект</a>
                                        </div>
                                    @endif
                                </div>
                                <div class="portfolio-header-info-spec">{{ $sphere->title['ru'] }}</div>
                                <div class="portfolio-header-info-loc">{{ $country->title_ru }}, {{ $freelancer->city }}, {{ $age }} лет </div>
                                <div class="portfolio-header-info-desc">
                                    @if(isset($freelancer->bio['ru']['short']))
                                        {{ $freelancer->bio['ru']['short'] }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="portfolio">

                    <div class="portfolio-body">
                        <div class="row">
                            @if($portfolios)
                                @foreach($portfolios as $portfolio)
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="portfolio-item">
                                        <a href="/{{ app()->getLocale()}}/freelancer/{{ auth()->id()}}/portfolio/{{ $portfolio->id }}" class="portfolio-item-img">
                                            <img class="img-fluid" src="{{ asset($portfolio->cover) }}" alt="">
                                            <div class="portfolio-item-img-overlay" id="showOverlay">
                                                {{-- <ul class="portfolio-ul">
                                                    <li class="portfolio-ul-li likes">
                                                        <span class="jam jam-heart"></span>
                                                        <span class="portfolio-ul-li-text">123</span>
                                                    </li>
                                                    <li class="portfolio-ul-li comments">
                                                        <span class="jam jam-message"></span>
                                                        <span class="portfolio-ul-li-text">5</span>
                                                    </li>
                                                    <li class="portfolio-ul-li views">
                                                        <span class="jam jam-eye"></span>
                                                        <span class="portfolio-ul-li-text">{{ $portfolio->views }}</span>
                                                    </li>
                                                    <li class="portfolio-ul-li files">
                                                        <span class="jam jam-link"></span>
                                                        <span class="portfolio-ul-li-text">{{ count($portfolio->files['fulls']) }} </span>
                                                    </li>
                                                </ul> --}}
                                            </div>
                                        </a>
                                        <div class="portfolio-item-info">
                                            <ul class="portfolio-item-info-ul">
                                                <li class="portfolio-ul-li views">
                                                    <span class="jam jam-eye"></span>
                                                    <span class="portfolio-ul-li-text">{{ $portfolio->views }}</span>
                                                </li>
                                                <li class="portfolio-ul-li files">
                                                    <span class="jam jam-link"></span>
                                                    <span class="portfolio-ul-li-text">{{ count($portfolio->files['fulls']) }} </span>
                                                </li>
                                                <li>
                                                    <h6 class="d-inline-block">
                                                    <span class="jam jam-clock"></span> <span>{{ $portfolio->created_at->diffForHumans() }}</span></h6>
                                                </li>
                                            </ul>
                                            <div class="portfolio-item-info-title">
                                                <a href="/{{ app()->getLocale()}}/freelancer/{{ auth()->id()}}/portfolio/{{ $portfolio->id }}">{{ $portfolio->description['ru']['title'] }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection