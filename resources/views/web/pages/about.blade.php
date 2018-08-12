@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')

    <div class="container">
        <div class="wrapper-inner">
            <div class="title-header">
                <h6>О нас</h6>
            </div>
            <div class="wrap-content">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="wrap-info-top mb-4">
                            <h5>{{ $homeinfo->info['bottomtitle'] }}</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="title-header">
                            <h6>{{ $homeinfo->info['left']['title'] }}</h6>
                        </div>
                        <div class="wrap-info-article mt-3">
                            {!! $homeinfo->info['left']['content'] !!}
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="title-header">
                            <h6>{{ $homeinfo->info['right']['title'] }}</h6>
                        </div>
                        <div class="wrap-info-article mt-3">
                            {!! $homeinfo->info['right']['content'] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection