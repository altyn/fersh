<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="js">

<head>
    <meta charset="UTF-8">
    <title>
        @yield('title')
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
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