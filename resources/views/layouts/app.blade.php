<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

</head>

<body class="w3-theme-light">

<nav id="nav" class="w3-top w3-theme-dark">
    <div class="w3-bar w3-large">
        <a href="{{ route("actu") }}" class="w3-bar-item w3-button navItem">Site</a>
        <a href="{{ route('login') }}" class="w3-bar-item w3-button navItem @yield('login')">{{__('auth.login')}}</a>
        <a href="{{ route('register') }}" class="w3-bar-item w3-button navItem @yield('register')">{{__('auth.register')}}</a>
    </div>
</nav>

<div id="swup" class="transition-fade w3-container" style="padding-top: 50px">

    @yield('content')

</div>

</body>

<script src="{{ mix('js/app.js') }}"></script>

</html>
