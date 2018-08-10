@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')
 
@endsection

@section('content')

<div class="container">
    <div class="wrapper">
        <div class="title-header">
            <h6>Блог</h6>
        </div>
         <div class="wrapper-content">
            @foreach($blogs as $blog)
            <div class="blog-item">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-12">
                        <div class="blog-item-img mb-4">
                            <img src="{{ asset($blog->thumbnail['small']) }}" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10 col-12">
                        <div class="blog-item-info">
                            <a href="/{{app()->getLocale()}}/blog/{{ $blog->id }}">
                                <h4 class="blog-item-info-title">{{ $blog->getTitle() }}</h4>
                                <div class="blog-item-info-desc">{{ $blog->desc['ru'] }}</div>
                                <div class="blog-item-info-date"><span class="jam jam-calendar"></span>{{ $blog->created_at->diffForHumans() }}</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection