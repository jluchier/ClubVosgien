<a href="{{ route("actu") }}" class="w3-button navItem  @yield('home')">Accueil</a>
<a href="{{ route("infosFede") }}" class="w3-button navItem   @yield('infosFede')">Notre club</a>
<a href="{{ route("activity") }}" class="w3-button navItem  @yield('activity')">Activités</a>
<a href="{{ route("sentiers") }}" class="w3-button navItem  @yield('sentiers')">Sentiers</a>
<!-- <a href="{{ route("chalets") }}" class="w3-button navItem @yield('chalets')">Chalets</a> -->
<a href="{{ route("gallery") }}" class="w3-button navItem @yield('gallery')">Galerie</a>
@auth
@if(Auth::user()->IsValidate())
<a href="{{ route("compterendusList") }}" class="w3-button navItem @yield('compterendus')">Compte rendus</a>
@endif
@endauth

@auth
{{ Form::open(["route" => "logout", "method" => "post", "class" => "navItem w3-right CV-logoutForm"]) }}
{{ Form::submit("Deconnexion", ["class" => "w3-button  navBtnlogout"]) }}

@if(Auth::user()->IsAdmin())
<a href="{{ route("galleries.index") }}" class="w3-button w3-hide-small">Administration</a>
@endif

@else
<a href="{{ route("login") }}" class="w3-button navItem w3-right">Connexion</a>
@endauth