@extends('default')

@section('home', 'navActive')

@section('content')

<div class="CV-TopContainerHome CV-Bg1">
  <img src="/images/common/wave_white.svg">
</div>
<div class="CV-flex-container-Agenda-Column">

  <div class="grid-container">
    <div id="actu" class="grid-container-left">
      <div class="grid-container-center">
        <h1>Les actualités</h1>

        @foreach ($actualite as $actu)
        <div class="CV-Fond-Carte">
          <div class="w3-theme-dark">
            <h2>{{ $actu->title }}</h2>
          </div>
          <p style="padding-top: 10px ; padding-bottom: 10px ; text-align: left" >{!!$actu->content!!}</p>
          <div class="w3-section CV-Fond-Carte">
            <img style="max-width: 100%" src="{{ Storage::url('images/small/' . $actu->image) }}" alt="">
          </div>
        </div>
        @endforeach

      </div>
    </div>

    <div id="agenda" class="grid-container-right">
      <div class="grid-container-center">
        <h1>Agenda</h1>

        @foreach ($agenda as $key => $valeur)
        {{-- <div class="w3-card-4 w3-third ">
          <div class="w3-container w3-theme-dark">
            <h3>{{ $valeur->title }}</h3>
          </div>
          <div class="w3-section CV-Fond-Carte">
            {{ $valeur->content }}
          </div>
        </div> --}}

        <div class="timeline">

          @if ($key % 2 == 0)
          <div class="container left">
            <div class="content">
              <h2>{{ $valeur->title }}</h2>
              <p>{{ $valeur->dateEvent }}</p>
            </div>
          </div>
          @else
          <div class="container right">
            <div class="content">
              <h2>{{ $valeur->title }}</h2>
              <p>{{ $valeur->dateEvent }}</p>
            </div>
          </div>
          @endif

        </div>

        @endforeach

      </div>
    </div>
  </div>
</div>
@endsection
