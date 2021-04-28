<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('otherCss')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
       integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
       crossorigin=""/>
</head>

<body>
<div id="page">

<nav id="nav" class="CV-nav">

<div class="w3-hide-medium w3-hide-small w3-white CV-top-nav">
  <div class="w3-row w3-white">
      <div class="CV-Logo w3-center w3-col s5">
          <img src="/images/common/LogoCV_T.png" alt="Logo du Club Vosgien">
          <p class="w3-padding">
            Notre devise : 1 jour de sentiers, 8 jours de santé
        </p>
      </div>
      <div class="w3-col s7 w3-display-container" style="height: 100%">
        <h1 class="w3-xxlarge w3-display-left">Club Vosgien Rupt Vecoux Ferdrupt</h1>
      </div>
  </div>

  <div class="w3-large CV-bottom-nav">
    @include('Includes/liensNavigation')
  </div>
</div>


  <div class="w3-hide-large">
    <div class="w3-theme-dark w3-padding CV-Menu-Top">
      <h2 style="flex:1 0 70% ">Club Vosgien Rupt Vecoux Ferdrupt</h2>

      <a id="humburger" onclick="return toogleMenu()" href="#"><i class="fas fa-bars w3-right fa-2x"></i></a>
    </div>
    <div id="menuColumnMobile" class="CV-Menu-Column">
      @include('Includes/liensNavigation')
    </div>
  </div>
</nav>

<div id="swup" class="transition-fade">
    @yield('content')
</div>

  <footer class="CV-footer CV-bottom-nav w3-large">
      <a href="{{ route("contact") }}" class="w3-button navItem @yield('contact')">Contact</a>
  <!--         <i class="fab fa-2x w3-hover-opacity fa-facebook"></i>
      <i class="fab fa-2x w3-hover-opacity fa-instagram"></i>
      <i class="fab fa-2x  w3-hover-opacity fa-snapchat"></i>
      <i class="fab fa-2x  w3-hover-opacity fa-pinterest"></i>
      <i class="fab fa-2x  w3-hover-opacity fa-twitter"></i>
      <i class="fab fa-2x  w3-hover-opacity fa-linkedin"></i> -->
  </footer>
</div>
</body>

<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin="">
</script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/script.js') }}"></script>

</html>
