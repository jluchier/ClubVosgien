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

<body>

<nav id="nav" class="CV-nav">
    {{-- <nav class="CV-nav"> --}}
    <div class="CV-top-nav">
        <div class="CV-Logo">
            <img src="/images/common/LogoCV_T.png" alt="Logo du Club Vosgien">
            <p>
              Notre devise : 1 jour de sentiers, 8 jours de santé
          </p>
        </div>
        <div class="w3-xxxlarge CV-Shadow">Club Vosgien Rupt Vecoux Ferdrupt</div>
    </div>

    <div class="w3-large CV-bottom-nav">
        <a href="{{ route("actu") }}" class="w3-bar-item w3-button navItem  @yield('home')">Accueil</a>
        <a href="{{ route("infosFede") }}" class="w3-bar-item w3-button navItem   @yield('infosFede')">La fédération</a>
        <a href="{{ route("activity") }}" class="w3-bar-item w3-button  navItem  @yield('activity')">Activités</a>
        <a href="{{ route("sentiers") }}" class="w3-bar-item w3-button  navItem  @yield('sentiers')">Sentiers</a>
        <a href="{{ route("chalets") }}" class="w3-bar-item w3-button   navItem @yield('chalets')">Chalets</a>
        <a href="{{ route("gallery") }}" class="w3-bar-item w3-button   navItem @yield('gallery')">Galerie</a>

        @Auth
            {{ Form::open(["route" => "logout", "method" => "post", "class" => "w3-right "]) }}
            {{ Form::submit("Deconnexion", ["class" => "w3-button  navBtnlogout"]) }}
            {{ Form::close() }}

            @if(Auth::user()->IsAdmin())
                <a href="{{ route("galleries.index") }}" class="w3-bar-item w3-button navItem w3-right">Administration</a>
            @endif

            @if(Auth::user()->IsValidate())
                <a href="{{ route("compterendus") }}" class="w3-bar-item w3-button navItem w3-right @yield('compterendus')">Compte rendus</a>
            @endif

        @else
            <a href="{{ route("login") }}" class="w3-bar-item w3-button navItem w3-right">Connexion</a>
        @endauth
    </div>
</nav>

<div id="swup" class="transition-fade">
    @yield('content')
</div>

<footer class="CV-footer">
    <p>Contactez moi ici</p>
<!--         <i class="fab fa-2x w3-hover-opacity fa-facebook"></i>
    <i class="fab fa-2x w3-hover-opacity fa-instagram"></i>
    <i class="fab fa-2x  w3-hover-opacity fa-snapchat"></i>
    <i class="fab fa-2x  w3-hover-opacity fa-pinterest"></i>
    <i class="fab fa-2x  w3-hover-opacity fa-twitter"></i>
    <i class="fab fa-2x  w3-hover-opacity fa-linkedin"></i> -->
</footer>

</body>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/script.js') }}"></script>

</html>
