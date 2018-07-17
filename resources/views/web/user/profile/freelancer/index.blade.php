@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')
    <div class="container user-profile">
        <div class="row">
            <div class="col-md-3 col-12">
                @include('web.user.profile.freelancer.info')
            </div>
            <div class="col-md-9 col-12">
                <div class="user-profile-content">
                    <div class="user-profile-content-title">
                        <h6>Информация</h6>
                        @if(auth()->user())
                            <div class="user-profile-content-title-right">
                                <a href="/{{ app()->getLocale()}}/freelancer/edit/personal">
                                    <span class="jam jam-cog" data-toggle="tooltip" data-placement="left" title="Редактировать"></span>
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="user-profile-content-body">
                        <div class="user-profile-content-list">
                            <div class="user-profile-content-list-capture">Стоимость работы:</div>
                            <div class="user-profile-content-list-body">от 
                                @if(!empty($freelancer->spec[app()->getLocale()]['rate']))
                                {{ $freelancer->spec[app()->getLocale()]['rate'] }} 
                                @endif
                                сомов. за проект</div>
                        </div>
                        <div class="user-profile-content-list">
                            <div class="user-profile-content-list-capture">Профессиональный опыт:</div>
                            <div class="user-profile-content-list-body">Более
                                @if(!empty($freelancer->spec[app()->getLocale()]['experience']))
                                {{ $freelancer->spec[app()->getLocale()]['experience'] }} 
                                @endif
                                лет </div>
                        </div>
                        <div class="user-profile-content-list">
                            <div class="user-profile-content-list-capture">Форма собственности:</div>
                            <div class="user-profile-content-list-body">
                                @if(isset($freelancer->spec[app()->getLocale()]['firm']['LLC']))
                                    Юр лицо,
                                @endif
                                @if(isset($freelancer->spec[app()->getLocale()]['firm']['self']))
                                    ИП,
                                @endif
                                @if(isset($freelancer->spec[app()->getLocale()]['firm']['own_company']))
                                    Физ. лицо
                                @endif
                            </div>
                        </div>
                        <div class="user-profile-content-list">
                            <div class="user-profile-content-list-capture">Способы оплаты:</div>
                            <div class="user-profile-content-list-body">
                                @if(isset($freelancer->spec[app()->getLocale()]['payment_method']['cash']))
                                    наличный расчёт,
                                @endif
                                @if(isset($freelancer->spec[app()->getLocale()]['payment_method']['bank']))
                                    безналичный расчёт,
                                @endif
                                @if(isset($freelancer->spec[app()->getLocale()]['payment_method']['electron']))
                                    электронные деньги
                                @endif
                            </div>
                        </div>

                        <div class="user-profile-content-about">
                            @if(isset($freelancer->bio[app()->getLocale()]['short']))
                                {{ $freelancer->bio[app()->getLocale()]['short'] }}
                            @endif
                        <br>
                        <br>
                            @if(isset($freelancer->bio[app()->getLocale()]['full']))
                                {{ $freelancer->bio[app()->getLocale()]['full'] }}
                            @endif
                        </div>

                        <div class="user-profile-content-list">
                            <div class="user-profile-content-list-skill-title">Услуги</div>
                            <ul class="user-profile-content-list-skill-list">
                                @if($skills)
                                    @foreach($skills as $skill)
                                        <li><span>{{ $skill }}</span></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="user-profile-content-title">
                        <h6>Портфолио</h6>
                        @if(auth()->user())
                            <div class="user-profile-content-title-right">
                                <a href="/{{ app()->getLocale()}}/freelancer/{{ auth()->id()}}/portfolio">
                                    <span class="jam jam-cog" data-toggle="tooltip" data-placement="left" title="Редактировать"></span>
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="user-profile-content-body user-profile-portfolio">
                        @if($portfolios)
                        <div class="row">
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
                                            <a href="/{{ app()->getLocale()}}/freelancer/{{ auth()->id()}}/portfolio/{{ $portfolio->id }}">{{ $portfolio->description[app()->getLocale()]['title'] }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script>

@endsection