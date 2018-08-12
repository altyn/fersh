@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')
    <meta name="_token" content="{{ csrf_token() }}"/>
@endsection

@section('content')
    <div class="container">
        <div class="user-profile">
            <div class="row">
                <div class="col-md-3 col-12">
                    @include('web.user.profile.freelancer.info')
                </div>
                <div class="col-md-9 col-12">
                    <div class="user-profile-content">
                        <div class="user-profile-content-title">
                            <h6>Информация</h6>
                        </div>
                        <div class="user-profile-content-body">
                        
                            @if($services)
                            <div class="user-profile-content-list">
                                <div class="user-profile-content-list-capture">Стоимость работы:</div>
                                @if(isset($freelancer->spec[app()->getLocale()]['rate']))
                                <div class="user-profile-content-list-body"> 
                                    от
                                    {{ $freelancer->spec[app()->getLocale()]['rate'] }}                                 
                                    @if(isset($freelancer->spec[app()->getLocale()]['currency']))
                                        @if($freelancer->spec[app()->getLocale()]['currency'] == '1')
                                        доллар
                                        @elseif($freelancer->spec[app()->getLocale()]['currency'] == '2')
                                        сом
                                        @else
                                        доллар
                                        @endif
                                        за проект
                                    @endif
                                </div>
                                @endif
                            </div>
                            <div class="user-profile-content-list">
                                <div class="user-profile-content-list-capture">Профессиональный опыт:</div>
                                <div class="user-profile-content-list-body">
                                    @if(!empty($freelancer->spec[app()->getLocale()]['experience']))
                                        @if($freelancer->spec[app()->getLocale()]['experience'] == '1')
                                            Менее года
                                        @elseif($freelancer->spec[app()->getLocale()]['experience'] == '2')
                                            Более года
                                        @elseif($freelancer->spec[app()->getLocale()]['experience'] == '3')
                                            Более трех лет
                                        @elseif($freelancer->spec[app()->getLocale()]['experience'] == '4')
                                            Более пяти лет
                                        @elseif($freelancer->spec[app()->getLocale()]['experience'] == '5')
                                            Более 10 лет
                                        @endif
                                    @endif
                                </div>
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

                            @if(isset($freelancer->bio[app()->getLocale()]['short']) || isset($freelancer->bio[app()->getLocale()]['full']))
                                <div class="user-profile-content-about">
                                    {!! $freelancer->bio[app()->getLocale()]['short'] !!}
                                    <br>
                                    {!! $freelancer->bio[app()->getLocale()]['full'] !!}
                                </div>
                            @endif
                            @else
                                @if(Auth::user()->id == $freelancer->user_id)
                                <div class="alert alert-warning mb-2" role="alert">
                                    Этот раздел еще не заполнен предлагаем заполнить его.
                                    <a href="/{{ app()->getLocale()}}/freelancer/edit/specialization">Изменить</a>
                                </div>
                                @endif
                            @endif

                            <div class="user-profile-content-list">
                                <div class="user-profile-content-title">
                                    <h6>Услуги</h6>
                                </div>
                                @if(isset($skills))
                                <ul class="user-profile-content-list-skill-list">
                                    @foreach($skills as $skill)
                                    <li><span>{{ $skill }}</span></li>
                                    @endforeach
                                </ul>
                                @else
                                    @if(Auth::user()->id == $freelancer->user_id)
                                    <div class="alert alert-warning mb-2" role="alert">
                                        Услуги еще не добавлены.
                                        <a href="/{{ app()->getLocale()}}/freelancer/edit/specialization">Добавить</a>
                                    </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        @if(!$portfolios->isEmpty())
                        <div class="user-profile-content-title">
                            <h6>Портфолио</h6>                            
                        </div>
                        @endif
                        <div class="user-profile-content-body user-profile-portfolio">
                            @if(!$portfolios->isEmpty())
                            <div class="row">
                                @if(count($portfolios) <= 6)
                                @foreach($portfolios as $portfolio)
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="portfolio-item">
                                        <a href="/{{ app()->getLocale()}}/freelancer/{{ $freelancer->user_id }}/portfolio/{{ $portfolio->id }}" class="portfolio-item-img">
                                            @if(isset($portfolio->cover))
                                                <img class="img-fluid" src="{{ asset($portfolio->cover) }}">
                                            @else
                                                <img class="img-fluid" src="{{ asset('img/home/no-img.png') }}">
                                            @endif
                                            <div class="portfolio-item-img-overlay" id="showOverlay">
                                            </div>
                                        </a>
                                        <div class="portfolio-item-info">
                                            <div class="portfolio-item-info-title">
                                                <a href="/{{ app()->getLocale()}}/freelancer/{{ $freelancer->user_id}}/portfolio/{{ $portfolio->id }}">{{ $portfolio->description[app()->getLocale()]['title'] }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                @foreach($portfolios->take(5) as $portfolio)
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="portfolio-item">
                                        <a href="/{{ app()->getLocale()}}/freelancer/{{ $freelancer->user_id }}/portfolio/{{ $portfolio->id }}" class="portfolio-item-img">
                                            @if(isset($portfolio->cover))
                                                <img class="img-fluid" src="{{ asset($portfolio->cover) }}">
                                            @else
                                                <img class="img-fluid" src="{{ asset('img/home/no-img.png') }}">
                                            @endif
                                            <div class="portfolio-item-img-overlay" id="showOverlay">
                                            </div>
                                        </a>
                                        <div class="portfolio-item-info">
                                            <div class="portfolio-item-info-title">
                                                <a href="/{{ app()->getLocale()}}/freelancer/{{ $freelancer->user_id}}/portfolio/{{ $portfolio->id }}">{{ $portfolio->description[app()->getLocale()]['title'] }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-md-4">
                                    <div class="user-profile-portfolio-item-alls">
                                        <img  class="img-fluid" src="{{ asset('img/home/no-img.png') }}" alt="">
                                        <div class="user-profile-portfolio-item-alls-overlay">
                                            <a href="/{{ app()->getLocale()}}/freelancer/{{ $freelancer->user_id }}/portfolio">
                                                <div class="user-profile-portfolio-item-alls-number">+{{ count($portfolios)-5 }}</div>
                                                <div class="user-profile-portfolio-item-alls-text">смотреть все проекты</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            @else
                                @if(Auth::user()->id == $freelancer->user_id)
                                <div class="alert alert-warning mb-2" role="alert">
                                    Вы еще не добавили проекта.
                                    <a href="/{{ app()->getLocale()}}/freelancer/{{ auth()->id()}}/portfolio/add">Добавить</a>
                                </div>
                                @else(Auth::guest())
                                @endif
                            @endif
                        </div>
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

    $(document).ready(function(){

        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
       

        $('#showEmail').click(function () {
            $('#hideEmail').toggle();
            $('#showEmail').toggle();

            var url = "{{ route('showemail') }}";
            var user_id = "{{ $freelancer->user_id }}";
            $.ajax({
                cache: false,
                type: 'POST',
                url: url,
                data: {id: user_id},
                success : function(data){
                }
            }); 
        })
        
        
        $('#showPhone').click(function () {
            $('#hidePhone').toggle();
            $('#showPhone').toggle();

            var url = "{{ route('showphone') }}";
            var user_id = "{{ $freelancer->user_id }}";
            $.ajax({
                cache: false,
                type: 'POST',
                url: url,
                data: {id: user_id},
                success : function(data){
                }
            }); 
        })
    }); 
</script>

@endsection