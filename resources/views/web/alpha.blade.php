@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')

<div class="top">
    <div class="top-info">
        <div class="container">
            <div class="top-info-text">
                <h4>Тысячи исполнителей готовы вам помочь</h4>
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
            <h6>Каталог фрилансеров</h6>
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
            <h6>Активные исполнители</h6>
        </div>
        <div class="wrap-content user-list-alpha">
            <div class="row">
                @foreach($users as $user)
                <div class="col-lg-3 col-md-6 col-sm-12 mb-6">
                    <div class="user-item">
                        <div class="user-item-picture">
                            <div class="user-item-img">
                                <a href="/{{ app()->getLocale()}}/freelancer/{{ $user->user_id }}">
                                    <img class="img-fluid" src="{{ asset($user->avatar['200x200']) }}">
                                </a>
                            </div>
                        </div>
                        <div class="user-item-info">
                            <div class="user-item-info-name"><a href="/{{ app()->getLocale()}}/freelancer/{{ $user->user_id }}">{{ $user->getFio()}}</a></div>
                            <div class="user-item-info-spec">@if(isset($user->getSphere()->title))<a href="/{{app()->getLocale()}}/freelancers/{{$spec->id}}">{{ $user->getsphere()->title['ru'] }}</a>@endif</div>
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
                        <h5>Freelance.kg — крупнейшая биржа удаленной работы</h5>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="title-header">
                        <h6>для заказчиков</h6>
                    </div>
                    <div class="wrap-info-article mt-3">
                        Завладев Камнем Силы с планеты Ксандар, Танос вместе с Чёрным Орденом нападает на космический корабль, в котором находятся Тор, его брат Локи, Халк, Хеймдалл и оставшиеся в живых после Рагнарёка жители Асгарда. Корабль подаёт сигнал бедствия. Титан пытает Тора и угрожает убить его, если Локи не отдаст ему Тессеракт, в котором находится Камень Пространства. Локи отдаёт Таносу камень, однако внезапно на последнего нападает Халк. Не ожидав такого, титан сначала пропускает несколько ударов от Халка, однако, собравшись, без труда побеждает его. Хеймдалл из последних сил через Биврёст отправляет Халка на Землю предупредить об угрозе, после чего погибает от рук титана. Танос посылает Чёрный Орден — Кулла Обсидиана, Эбеновый Зоб, Корвуса Глэйва и Проксиму Миднайт найти два других камня, которые находятся на Земле. Он убивает Локи на глазах у Тора, после чего уничтожает корабль.
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="title-header">
                        <h6>для исполнителей</h6>
                    </div>
                    <div class="wrap-info-article mt-3">
                        В Нью-Йорк прилетают Эбеновый Зоб и Кулл Обсидиан, где, пытаясь отнять камень, вступают в бой со Старком, Стрэнджем и Питером Паркером. Не сумев заполучить камень, Зоб забирает с собой на корабль Стрэнджа, следом за ним на корабль попадают Железный человек и Человек-паук. На корабле Зоб пытает Стрэнджа, чтобы тот снял защиту с Камня. Питеру вместе с Тони удаётся убить Зоба, выбросив его в открытый космос. Бэннер связывается со Стивом Роджерсом, который знает местонахождение Вижена, а Вонг остаётся охранять Санктум Санкторум.
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection

@section('scripts')

@endsection