@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')

<div class="container">
    <div class="wrapper">
        <div class="title-header">
            <h6>{{ $sphere->title['ru'] }}</h6>
        </div>
        <div class="wrapper-content user-list">
            <div class="row">
                @foreach($users as $user)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="user-item">
                        <div class="user-item-picture">
                            <div class="user-item-img">
                                <img class="img-fluid"  src="{{ asset($user->avatar['200x200']) }}">
                            </div>
                        </div>
                        <div class="user-item-info">
                            <div class="user-item-info-name"><a href="/{{ app()->getLocale()}}/freelancer/{{ $user->user_id }}">{{ $user->getFio()}}</a></div>
                            <div class="user-item-info-desc"><article>{!! $user->getShortBio() !!}  </article></div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-12 mb-4 mt-4">
                    <nav>
                        {{ $users->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection