@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')
    <div class="container user-profile">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-12">
                @include('web.user.profile.freelancer.info')
            </div>
            <div class="col-md-9 col-sm-12 col-12">
                <div class="portfolio">
                    @if(auth()->user() )
                    <div class="portfolio-control mb-4">
                        <div class="portfolio-control-right">
                            <a href="/{{ app()->getLocale()}}/freelancer/{{ auth()->id()}}/portfolio/add" class="btn btn-add"><span class="jam jam-plus"></span>Добавить проект</a>
                        </div>
                    </div>
                    @endif
                    <div class="portfolio-body">
                        <div class="row">
                            @if($portfolios)
                                @foreach($portfolios as $portfolio)
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="portfolio-item">
                                        <a href="/{{ app()->getLocale()}}/freelancer/{{ auth()->id()}}/portfolio/{{ $portfolio->id }}" class="portfolio-item-img">
                                            <img class="img-fluid" src="{{ asset($portfolio->cover) }}" alt="">
                                            <div class="portfolio-item-img-overlay" id="showOverlay">
                                                <ul class="portfolio-ul">
                                                    {{-- <li class="portfolio-ul-li likes">
                                                        <span class="jam jam-heart"></span>
                                                        <span class="portfolio-ul-li-text">123</span>
                                                    </li> --}}
                                                    {{-- <li class="portfolio-ul-li comments">
                                                        <span class="jam jam-message"></span>
                                                        <span class="portfolio-ul-li-text">5</span>
                                                    </li> --}}
                                                    <li class="portfolio-ul-li views">
                                                        <span class="jam jam-eye"></span>
                                                        <span class="portfolio-ul-li-text">{{ $portfolio->views }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                        <div class="portfolio-item-info">
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