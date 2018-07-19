@extends('bashkaruu.layouts.default')
@section('title', 'Панель управления' )
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="element-wrapper">
            <h6 class="element-header">
                Статистика
            </h6>
            <div class="element-box">
                <div class="element-info">
                    <div class="row align-items-center">
                        <div class="col-sm-8">
                            <div class="element-info-with-icon">
                                <div class="element-info-icon">
                                    <div class="os-icon os-icon-wallet-loaded"></div>
                                </div>
                                <div class="element-info-text">
                                    <h5 class="element-inner-header">
                                        Статистика пользователей
                                    </h5>
                                    <div class="element-inner-desc">
                                        Общее число регистраций, заполненный профилей, активаций и верификаций
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <form class="form-inline justify-content-sm-end">
                                <select class="form-control form-control-sm rounded">
                                    <option value="today">
                                        Сегодня
                                    </option>
                                    <option value="week">
                                        За неделю 
                                    </option>
                                    <option value="month">
                                        За месяц
                                    </option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="row">
                            <div class="col-sm-6 b-r b-b">
                                <div class="el-tablo centered padded">
                                    <div class="value">
                                        {{ $today }}
                                    </div>
                                    <div class="label">
                                        Сегодня зарегистрировано
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 b-b">
                                <div class="el-tablo centered padded">
                                    <div class="value">
                                        {{ $lastweek }}
                                    </div>
                                    <div class="label">
                                        На этой неделе
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 b-r">
                                <div class="el-tablo centered padded">
                                    <div class="value">
                                        {{ $lastmonth }}
                                    </div>
                                    <div class="label">
                                        За месяц
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="el-tablo centered padded">
                                    <div class="value">
                                        {{ $allusers }}
                                    </div>
                                    <div class="label">
                                        За все время
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="padded b-l b-r">
                            <div class="element-info-with-icon smaller">
                                <div class="element-info-icon">
                                    <div class="os-icon os-icon-bar-chart-stats-up"></div>
                                </div>
                                <div class="element-info-text">
                                    <h5 class="element-inner-header">
                                        Действия пользователей
                                    </h5>
                                    <div class="element-inner-desc">
                                        Высчитывается за все время. Дополонительные цифры показывает результаты текущего дня. 
                                    </div>
                                </div>
                            </div>
                            <div class="os-progress-bar blue">
                                <div class="bar-labels">
                                    <div class="bar-label-left">
                                        <span>Активировано аккаунтов</span><span class="positive">+{{$isactivetoday}}</span>
                                    </div>
                                    <div class="bar-label-right">
                                        <span class="info">{{$isactive}}/{{$allusers}}</span>
                                    </div>
                                </div>
                                <div class="bar-level-1" style="width: 100%">
                                    <div class="bar-level-2" style="width: {{(int)round($activepersent)}}%">
                                        <div class="bar-level-3" style="width: {{(int)round($activepersenttoday)}}%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="os-progress-bar blue">
                                <div class="bar-labels">
                                    <div class="bar-label-left">
                                        <span>Заполнено профилей</span><span class="positive">+{{$isProfiletoday}}</span>
                                    </div>
                                    <div class="bar-label-right">
                                        <span class="info">{{$isProfile}}/{{$allusers}}</span>
                                    </div>
                                </div>
                                <div class="bar-level-1" style="width: 100%">
                                    <div class="bar-level-2" style="width: {{(int)round($profilepersent)}}%">
                                        <div class="bar-level-3" style="width: {{(int)round($profilepersenttoday)}}%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="os-progress-bar blue">
                                <div class="bar-labels">
                                    <div class="bar-label-left">
                                        <span>Заполнено портфолио</span><span class="positive">+{{$isPortfoliotoday}}</span>
                                    </div>
                                    <div class="bar-label-right">
                                        <span class="info">{{$isPortfolio}}/{{$allusers}}</span>
                                    </div>
                                </div>
                                <div class="bar-level-1" style="width: 100%">
                                    <div class="bar-level-2" style="width: {{(int)round($portfoliopersent)}}%">
                                        <div class="bar-level-3" style="width: {{(int)round($portfoliopersenttoday)}}%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="os-progress-bar blue">
                                <div class="bar-labels">
                                    <div class="bar-label-left">
                                        <span>Верифицировано пользователей</span><span class="negative">0</span>
                                    </div>
                                    <div class="bar-label-right">
                                        <span class="info">0/{{$allusers}}</span>
                                    </div>
                                </div>
                                <div class="bar-level-1" style="width: 100%">
                                    <div class="bar-level-2" style="width: 0%">
                                        <div class="bar-level-3" style="width: 0%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection