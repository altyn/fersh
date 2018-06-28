@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')

    <div class="container">
        <h2>404</h2>
        <h2>Упс... Данная ссылка не найдена или удалена</h2>
        <h2>Вернитесь <a href="{{ redirect()->back()->getTargetUrl() }}">главную страницу</a></h2>
    </div>

@endsection

@section('scripts')

@endsection