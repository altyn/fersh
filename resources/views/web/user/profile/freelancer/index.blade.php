@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')
    <meta name="_token" content="{{ csrf_token() }}"/>
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
                        @if(Auth::user()->id == $freelancer->user_id)
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
                                @if(!empty($freelancer->spec[app()->getLocale()]['currency']))
                                    @if($freelancer->spec[app()->getLocale()]['currency'] == '1')
                                    доллар
                                    @elseif($freelancer->spec[app()->getLocale()]['currency'] == '2')
                                    сом
                                    @endif
                                @endif
                                за проект</div>
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

                        <div class="user-profile-content-about">
                            @if(isset($freelancer->bio[app()->getLocale()]['short']))
                                {!! $freelancer->bio[app()->getLocale()]['short'] !!}
                            @endif
                        <br>
                            @if(isset($freelancer->bio[app()->getLocale()]['full']))
                                {!! $freelancer->bio[app()->getLocale()]['full'] !!}
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
                        @if(Auth::user()->id == $freelancer->user_id)
                            <div class="user-profile-content-title-right">
                                <a href="/{{ app()->getLocale()}}/freelancer/{{ $freelancer->user_id }}/portfolio">
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
                                    <a href="/{{ app()->getLocale()}}/freelancer/{{ $freelancer->user_id }}/portfolio/{{ $portfolio->id }}" class="portfolio-item-img">
                                        <img class="img-fluid" src="{{ asset($portfolio->cover) }}" alt="">
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