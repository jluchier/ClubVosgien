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

    <nav  class="CV-nav">
        {{-- <nav class="CV-nav"> --}}
        <div class="CV-top-nav">
            <div>
            <p class="CV-Logo"><img src="/images/common/LogoCV.jpg" alt="Logo du Club Vosgien"></p>
            {{-- <p>Notre fierté, ce sont nos sentiers... Leur balisage, c'est notre image</p> --}}
            <p>Notre devise : 1 jour de sentiers, 8 jours de santé</p>
            </div>
            <div class="w3-large CV-Shadow"><b>Club Vosgien Rupt Vecoux Ferdrupt</b></div>
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

<div class="bgimg">
    <div class="middle">
      <h1>*** (°-°) *** C'est pour bientôt *** \°~°/ ***</h1>
      <hr>
      <p id="demo" style="font-size:30px"></p>
    </div>
    <div class="bottomleft">
      <p>Cette page est en construction pour le moment</p>
    </div>
</div>

<footer class="CV-footer">
    <p>Contactez moi ici</p>
</footer>

</body>

<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

    // Update the count down every 1 second
    var countdownfunction = setInterval(function() {

      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now an the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML = days + " jours " + hours + " heures "
      + minutes + " minutes ";

      // If the count down is over, write some text
      if (distance < 0) {
        clearInterval(countdownfunction);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
</script>
{{--
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/script.js') }}"></script> --}}

</html>
