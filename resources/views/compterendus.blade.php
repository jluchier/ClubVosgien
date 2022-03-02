@extends('default')

@section('compterendus', 'navActive')

@section('content')
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
</div>


@endsection
