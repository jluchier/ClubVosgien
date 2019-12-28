<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body class="w3-theme-light">

<nav id="nav" class="w3-top w3-theme-dark">
    <div class="w3-bar w3-large">
        <a href="{{ route("actu") }}" class="w3-bar-item w3-button navItem @yield('home')"><i class="fas fa-home"></i>&nbsp;Accueil</a>
        <a href="{{ route("page1") }}" class="w3-bar-item w3-button navItem @yield('page1')"><i class="fas fa-image"></i>&nbsp;Galerie</a>
        <a href="#" class="w3-bar-item w3-button w3-disabled navItem">Page2</a>
        <a href="#" class="w3-bar-item w3-button w3-disabled navItem">Page3</a>

        @Auth
            {{ Form::open(["route" => "logout", "method" => "post", "class" => "w3-right navItem"]) }}
            {{ Form::submit("Deconnexion", ["class" => "w3-button w3-theme-dark navBtnlogout"]) }}
            {{ Form::close() }}

            @if(Auth::user()->IsAdmin())
                <a href="{{ route("articles.index") }}" class="w3-bar-item w3-button navItem w3-right">Admin</a>
            @endif

        @else
            <a href="{{ route("login") }}" class="w3-bar-item w3-button navItem w3-right">Connexion</a>
        @endauth
    </div>
</nav>

<div id="swup" class="transition-fade" style="padding-top: 40px">

    @yield('content')

    <footer class="w3-theme w3-center w3-container w3-padding-large">
        <i class="fab fa-2x w3-hover-opacity fa-facebook"></i>
        <i class="fab fa-2x w3-hover-opacity fa-instagram"></i>
        <i class="fab fa-2x  w3-hover-opacity fa-snapchat"></i>
        <i class="fab fa-2x  w3-hover-opacity fa-pinterest"></i>
        <i class="fab fa-2x  w3-hover-opacity fa-twitter"></i>
        <i class="fab fa-2x  w3-hover-opacity fa-linkedin"></i>
    </footer>

</div>

</body>

<script src="{{ mix('js/app.js') }}"></script>

</html>
