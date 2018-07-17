@extends('bashkaruu.layouts.default')

@section('title', "Не активированные пользователи" )

@section('content')

    <div class="row">
        <div class="col-sm-6">
            <div class="element-wrapper">
                <h6> Activated:
                    @if(isset($data['activated']))
                        {{ $data['activated'] }}
                    @endif
                </h6>
            </div>
            <div class="element-wrapper">
                <h6> Not Activated:
                    @if(isset($data['not_activated']))
                        {{ $data['not_activated'] }}
                    @endif
                </h6>
            </div>
            <div class="element-wrapper">
                <h6> All:
                    @if(null !== $data['activated'] && null !== $data['not_activated'])
                        {{ $data['activated'] }} + {{ $data['not_activated'] }}
                    @endif
                </h6>
            </div>
        </div>
        <div class="col-sm-6">
            <form method="post" action="{{ route('act_em_post') }}">
                @csrf
                <button type="submit"> Отправить всем код активации</button>
            </form>
        </div>
    </div>

@endsection