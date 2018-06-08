<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>
        @yield('title')
    </title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico')}}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    @yield('styles')

</head>

<body>

    @yield('content')
    
    <script src="{{ mix('/js/app.js')}}"></script>
    @yield('scripts')

</body>
</html>