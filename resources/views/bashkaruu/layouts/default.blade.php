<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>

	<link rel="stylesheet" href="{{ asset('/css/bash/style.css') }}">
	@yield('styles')

	
	@yield('headercripts')
</head>
<body>

<div class="all-wrapper">
	<div class="layout-w">
		<div class="menu-w menu-activated-on-click menu-open">
			@include('bashkaruu.partials.menu')
		</div>
		<div class="content-w">
			@include('bashkaruu.partials.top')

			<div class="content-i">
				@yield('content')
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('/js/bash/app.js') }}"></script>
<script>
	$(function(){
		var sidebar = $('.menu-w'),
		btnToggle = $('.btn-toggle');

		btnToggle.click(function(){
			sidebar.toggleClass('menu-open');
			if(sidebar.hasClass('.menu-open')){
			btnToggle.attr('title','Свернуть меню')
			} else {
			btnToggle.attr('title','Развернуть меню')
			}
		});
	});
</script>
@yield('scripts')

	
</body>
</html>