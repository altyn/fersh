<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="js">
<head>
    <meta charset="UTF-8">
    <title> @yield('title') </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico')}}">

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    @yield('styles')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122392105-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-122392105-1');
    </script>

</head>

@if($home == $locale)
    <body class="homepage">
@else
    <body>
@endif

    @include('web.layouts.header')

    @yield('content')
    
    <script src="{{ mix('/js/app.js')}}"></script>
    @yield('scripts')

</body>
</html>