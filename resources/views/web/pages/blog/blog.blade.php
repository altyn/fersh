@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

    <meta property="og:url"                content="{{ app()->request->url()}}" />
    <meta property="og:site_name"          content="Freelance.kg" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $blog->getTitle()}}" />
    <meta property="og:description"        content="{{ $blog->desc['ru'] }}" />
    <meta property="og:image"              content="{{ asset($blog->thumbnail['small']) }}" />
 
@endsection

@section('content')

<div class="container">
    <div class="wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/{{app()->getLocale()}}/blog/"><span class="jam jam-home"></span>Блог</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $blog->title['ru'] }}</li>
            </ol>
        </nav>
         <div class="wrapper-content">
            <div class="row">
                <div class="col-md-9 col-12">
                    <h4 class="blog-article-title">{{ $blog->getTitle() }}</h4>
                    <div class="blog-article-date"><span class="jam jam-calendar"></span>{{ $blog->created_at->diffForHumans() }}</div>
                    <div class="blog-article-content">
                        <article>
                            {!! $blog->content['ru'] !!}
                        </article>
                    </div>
                    <div class="blog-article-footer">
                        @include('vendor.share')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/goodshare.js@4/goodshare.min.js"></script>

@endsection