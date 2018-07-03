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
                            <div class="row">
                                <div class="col-md-4 col-sm-3 col-12 portfolio-view-top-left">
                                    <img class="img-fluid" src="{{ asset($portfolio->cover) }}" alt="">
                                </div>
                                <div class="col-md-8 col-sm-9 col-12 portfolio-view-top-right">
                                    <div class="portfolio-view-top-right-title">
                                        <h2>{{ $portfolio->description['ru']['title'] }}</h2>
                                    </div>
                                    <ul class="portfolio-view-top-right-tags">
                                        @foreach($tags as $tag)
                                            <li>
                                                <span>{{$tag}}</span>
                                                <span class="jam jam-circle-f"></span>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="portfolio-view-top-right-desc">
                                        <article>{{ $portfolio->description['ru']['desc'] }}</article>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-view-middle ">
                            <h6><span class="jam jam-link"></span> {{ count($portfolio->files['fulls']) }} файла</h6>
                            <div class="d-block">
                                <div class="row">
                                    @foreach($portfolio->files['thumbs'] as $file)
                                        <div class="col-md-1 col-sm-1 col-4">
                                            <img src="{{ asset($file)}}" class="img-fluid mb-4" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-view-bottom mt-4">
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
    </div>

@endsection

@section('scripts')

@endsection