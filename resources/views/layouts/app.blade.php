<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inventary') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" type="image/png" href="{!! asset('style_login/images/icons/favicon.ico') !!}"/>
    <!-- Styles -->
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{!! asset('style_login/vendor/bootstrap/css/bootstrap.min.css') !!}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{!! asset('style_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') !!}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{!! asset('style_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') !!}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{!! asset('style_login/vendor/animate/animate.css') !!}">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{!! asset('style_login/vendor/css-hamburgers/hamburgers.min.css') !!}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{!! asset('style_login/vendor/animsition/css/animsition.min.css') !!}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{!! asset('style_login/vendor/select2/select2.min.css') !!}">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="{!! asset('style_login/vendor/daterangepicker/daterangepicker.css') !!}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{!! asset('style_login/css/util.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('style_login/css/main.css') !!}">
    <!--===============================================================================================-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: #666666;">
    <div id="app">
        <main class="">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
<!--===============================================================================================-->
	<script src="{!! asset('style_login/vendor/jquery/jquery-3.2.1.min.js') !!}"></script>
<!--===============================================================================================-->
	<script src="{!! asset('style_login/vendor/animsition/js/animsition.min.js') !!}"></script>
<!--===============================================================================================-->
	<script src="{!! asset('style_login/vendor/bootstrap/js/popper.js') !!}"></script>
	<script src="{!! asset('style_login/vendor/bootstrap/js/bootstrap.min.js') !!}"></script>
<!--===============================================================================================-->
	<script src="{!! asset('style_login/vendor/select2/select2.min.js') !!}"></script>
<!--===============================================================================================-->
	<script src="{!! asset('style_login/vendor/daterangepicker/moment.min.js') !!}"></script>
	<script src="{!! asset('style_login/vendor/daterangepicker/daterangepicker.js') !!}"></script>
<!--===============================================================================================-->
	<script src="{!! asset('style_login/vendor/countdowntime/countdowntime.js') !!}"></script>
<!--===============================================================================================-->
	<script src="{!! asset('style_login/js/main.js') !!}"></script>
</body>
</html>
