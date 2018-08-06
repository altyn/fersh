<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link rel="stylesheet" href="{{ asset('/css/bash/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/bash/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/tagify.css')}}">
        @yield('styles')
        @yield('headercripts')
    </head>
    <body class="full-screen with-content-panel menu-position-side menu-side-left">
        <div class="all-wrapper with-side-panel solid-bg-all">
			
            <div class="layout-w">
                @include('bashkaruu.partials.menu')
                <div class="content-w">
					@include('bashkaruu.partials.top')
                    <div class="content-i">
                        <div class="content-box">
							@yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('/js/bash/app.js') }}"></script>
        <script src="{{ asset('/js/bash/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/js/bash/dataTables.bootstrap4.min.js') }}"></script>
        @yield('scripts')
    </body>
</html>