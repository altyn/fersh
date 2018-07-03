@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')
    <div class="container user-profile">
        <div class="inner">
            <div class="row">
                <div class="col">
                    <div class="portfolio-view">
                        <div class="portfolio-view-top">
                            <div class="portfolio-view-top-left">
                                <img class="img-fluid" src="{{ asset($portfolio->cover) }}" alt="">
                            </div>
                            <div class="portfolio-view-top-right">
                            <h3 class="portfolio-view-top-right-title">{{ $portfolio->description['ru']['title'] }}</h3>
                            </div>
                        </div>
                        <div class="text-center mb-4">
                            @foreach($portfolio->files['fulls'] as $file)
                                <img src="{{ asset($file)}}" class="img-fluid mb-4" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection