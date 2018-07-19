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
                                        <div class="verify" data-toggle="tooltip" data-placement="bottom" title="Пользователь активен"><span class="jam jam-check"></span></div>
                                    @else
                                          {{-- <div class="noverify" data-toggle="tooltip" data-placement="bottom" title="Пользователь еще верифицирован"><span class="jam jam-close-circle"></span></div> --}}
                                    @endif
                                    
                                </div>
                                @if($sphere)
                                <div class="portfolio-header-info-spec">{{ $sphere->title['ru'] }}</div>
                                @endif
                                <div class="portfolio-header-info-loc">{{ $country->title_ru }}, {{ $freelancer->city }}, {{ $age }} лет </div>
                                <div class="portfolio-header-info-desc">
                                    @if(isset($freelancer->bio['ru']['short']))
                                        {!! $freelancer->bio['ru']['short'] !!}
                                    @endif
                                </div>
                                @if(Auth::user()->id == $freelancer->user_id)
                                    <div class="portfolio-header-control-right">
                                        <a href="/{{ app()->getLocale()}}/freelancer/{{ auth()->id()}}/portfolio/add" class="btn btn-add"><span class="jam jam-plus"></span>Добавить проект</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="portfolio">

                    <div class="portfolio-body">
                        <div class="row">
                            @if ($message = Session::get('success'))
                            <div class="col-12">
                                <div class="alert alert-success">
                                    {{ $message }}
                                </div>
                            </div>
						    @endif
                            @if($portfolios)
                                @foreach($portfolios as $portfolio)
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="portfolio-item">
                                        <div class="portfolio-item-img">
                                            <a href="/{{ app()->getLocale()}}/freelancer/{{ $freelancer->user_id}}/portfolio/{{ $portfolio->id }}" class="portfolio-item-img">
                                                <img class="img-fluid" src="{{ asset($portfolio->cover) }}">
                                                <div class="portfolio-item-img-overlay" id="showOverlay"></div>
                                            </a>
                                            @if(Auth::user()->id == $freelancer->user_id )
                                            <div class="portfolio-item-img-control" id="showControl">
                                                <ul class="portfolio-ul-control">
                                                    <li class="portfolio-ul-control-li update">
                                                        <a href="/{{ app()->getLocale()}}/freelancer/{{ $freelancer->user_id }}/portfolio/update/{{ $portfolio->id }}">
                                                            <span class="jam jam-pencil-f"></span>
                                                            <span class="portfolio-ul-control-li-text">Изменить</span>
                                                        </a>
                                                    </li>
                                                    <li class="portfolio-ul-control-li delete">
                                                        <a href="/{{ app()->getLocale()}}/freelancer/{{ $freelancer->user_id }}/portfolio/delete/{{ $portfolio->id }}">
                                                            <span class="jam jam-trash-f"></span>
                                                            <span class="portfolio-ul-control-li-text">Удалить</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                        
                                        <div class="portfolio-item-info">
                                            <ul class="portfolio-item-info-ul">
                                                <li class="portfolio-ul-li views">
                                                    <span class="jam jam-eye"></span>
                                                    <span class="portfolio-ul-li-text">{{ $portfolio->views }}</span>
                                                </li>
                                                @if($portfolio->files['fulls'])
                                                <li class="portfolio-ul-li files">
                                                    <span class="jam jam-link"></span>
                                                    <span class="portfolio-ul-li-text">{{ count($portfolio->files['fulls']) }}</span>
                                                </li>
                                                @endif
                                                <li>
                                                    <h6 class="d-inline-block">
                                                    <span class="jam jam-clock"></span><span> {{ $portfolio->created_at->diffForHumans() }}</span></h6>
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