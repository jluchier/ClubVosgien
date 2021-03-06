@extends('default')

@section('home', 'navActive')

@section('content')

<div class="CV-TopContainerHome CV-Bg1">
  <img src="/images/common/wave_white.svg">
</div>

  <div class="w3-row w3-padding">
    <div id="actu" class="grid-container-left w3-center w3-col s12 m7">
      <div class="grid-container-center">
        <h1>Les actualités</h1>

        @foreach ($actualite as $actu)
        <div class="CV-Fond-Carte">
          <div class="w3-theme-dark">
            <h2>{{ $actu->title }}</h2>
          </div>
          <div style="padding-top: 10px ; padding-bottom: 10px ; text-align: left" >{!!$actu->content!!}</div>
          <div class="w3-section CV-Fond-Carte">
            <img style="max-width: 50%" src="{{ Storage::url('images/medium/' . $actu->image) }}" alt="">
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <div id="agenda" class="grid-container-right w3-col s12 m5 w3-display-container">
      <div class="grid-container-center">
        <h1>Agenda</h1>

        @foreach ($agenda as $key => $valeur)
        <div class="timeline">
          @if ($key % 2 == 0)
          <div class="container left">
            <div class="content">
              <a href="{{route('agendaDetail', $key, $agenda)}}">
                <h2>{{ $valeur->title }}</h2>
                <p>{{ $valeur->dateEvent }}</p>
              </a>
            </div>
          </div>
          @else
          <div class="container right">
            <div class="content">
              <a href="{{route('agendaDetail', $key, $agenda)}}">
              <h2>{{ $valeur->title }}</h2>
              <p>{{ $valeur->dateEvent }}</p>
            </a>
            </div>
          </div>
          @endif

        </div>

        @endforeach

      </div>
    </div>

</div>
@endsection
