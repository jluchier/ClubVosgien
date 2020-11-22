<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
    <title>Administration du site</title>
</head>

<body class="w3-theme-light">

<nav id="nav" class="w3-top w3-theme-dark">
    <div class="w3-center w3-large" style="text-shadow : 1px 1px 0 #d33"><b>Club Vosgien Rupt Vecoux Ferdrupt</b></div>
    <div class="w3-bar w3-large">
        <a href="{{ route("articles.index") }}" class="w3-bar-item w3-button navItem @yield('articles')">Articles</a>
        <a href="{{ route("galleries.index") }}" class="w3-bar-item w3-button navItem @yield('photos')">Photos</a>
        <a href="{{ route("inscriptions")}}" class="w3-bar-item w3-button navItem @yield('inscriptions')">Inscriptions</a>
        <a href="{{ route("compterendus.index") }}" class="w3-bar-item w3-button navItem @yield('compterendus')">Compte rendus</a>

        <a href="{{ route("actu") }}" class="w3-bar-item w3-button navItem w3-right @yield('home')">Retour au site</a>
    </div>
</nav>

<div id="swup" class="transition-fade">

    @yield('content')

</div>

</body>
@yield('js')
<script src="{{ mix('js/app.js') }}"></script>

</html>
