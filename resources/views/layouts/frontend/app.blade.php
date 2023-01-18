
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
        @include('layouts.frontend.header')
	</head>
	<body>
	<header role="banner" id="fh5co-header">
        @include('layouts.frontend.topnavbar')
	</header>

	@yield('content')
	<!-- End demo purposes only -->

	
	@include('layouts.frontend.footer')

	</body>
</html>

