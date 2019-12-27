<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <title>Club vosgien</title>
</head>

<body class="w3-theme-light">

<nav id="nav" class="w3-top w3-theme-dark">
    <div class="w3-bar w3-large">
        <a href="{{ route("home") }}" class="w3-bar-item w3-button navItem @yield('home')"><i class="fas fa-home"></i>&nbsp;Accueil</a>
        <a href="{{ route("page1") }}" class="w3-bar-item w3-button navItem @yield('page1')"><i class="fas fa-image"></i>&nbsp;Galerie</a>
        <a href="#" class="w3-bar-item w3-button w3-disabled navItem">Page2</a>
        <a href="#" class="w3-bar-item w3-button w3-disabled navItem">Page3</a>

        <a href="#" class="w3-bar-item w3-button navItem w3-right"><i class="fas fa-unlock-alt"></i>&nbsp;Admin</a>
        <a href="#" class="w3-bar-item w3-button navItem w3-right"><i class="fas fa-unlock-alt"></i>&nbsp;serser</a>
    </div>
</nav>

<div id="swup" class="transition-fade">

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
