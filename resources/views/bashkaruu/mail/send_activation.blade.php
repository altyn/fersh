@extends('bashkaruu.layouts.default')

@section('title', "Не активированные пользователи" )

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="element-wrapper">
            <h6 class="element-header">
                Email рассылка
            </h6>
            <div class="element-box">
                <div class="element-info">
                    <div class="row align-items-center">
                        <div class="col-sm-8">
                            <div class="element-info-with-icon">
                                <div class="element-info-icon">
                                    <div class="os-icon os-icon-mail"></div>
                                </div>
                                <div class="element-info-text">
                                    <h5 class="element-inner-header">
                                        Рассылка активации для всех пользователей
                                    </h5>
                                    <div class="element-inner-desc">
                                        Рекомендуем только единожды отправить рассылку. Возможно страница будет долго не отвечать. Пока не выйдет сообщение об успехе ничего не трогайте.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 @if ($message = Session::get('status'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="row pt-2">
                    <div class="col-6 col-sm-3 col-xxl-2">
                        <a class="element-box el-tablo centered trend-in-corner smaller example-column-2" href="#">
                            <div class="label">Активировано</div>
                            <div class="value">
                                @if(isset($data['activated']))
                                    {{ $data['activated'] }}
                                @endif
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-3 col-xxl-2">
                        <a class="element-box el-tablo centered trend-in-corner smaller example-column-2" href="#">
                            <div class="label">Не активировано</div>
                            <div class="value text-danger">
                                @if(isset($data['not_activated']))
                                    {{ $data['not_activated'] }}
                                @endif
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-3 col-xxl-2">
                        <a class="element-box el-tablo centered trend-in-corner smaller example-column-2" href="#">
                            <div class="label">Все</div>
                            <div class="value">
                                @if(null !== $data['activated'] && null !== $data['not_activated'])
                                    {{ $data['activated'] }} + {{ $data['not_activated'] }}
                                @endif
                            </div>
                        </a>
                    </div>
                    <div class="col-12 mt-4">
                        <form method="post" action="{{ route('act_em_post') }}" id="sendmails">
                            @csrf
                            <div id="loader">
                                <div class="loader"></div>
                                <div class="loader-text">Идёт рассылка...</div>
                            </div>
                            <button class="mr-2 mb-2 btn btn-outline-primary" type="submit"> Отправить всем код активации</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $('#loader').hide();

    $("#sendmails").on("submit", function(){
        $('#loader').show();
    })	
</script>
@endsection

