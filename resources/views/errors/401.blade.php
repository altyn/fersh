@extends('web.layouts.app')

@section('title', 'Freelance.kg' )

@section('styles')

@endsection

@section('content')

    <div class="container">
        <h2>401</h2>
        <h2>Доступ к ресурсу DENIED!!!</h2>
        <h2> Поэтому вернитесь <a href="{{ redirect()->back()->getTargetUrl() }}">главную страницу</a></h2>
    </div>

@endsection

@section('scripts')

@endsection