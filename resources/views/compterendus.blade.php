@extends('default')

@section('compterendus', 'navActive')

@section('content')
<div class="w3-row w3-padding">
    <div id="actu" class="grid-container-left w3-center w3-col s12 m7">
      <div class="grid-container-center">
        <h1>Les actualités</h1>

        @foreach ($compterendus as $cr)
        <div class="CV-Fond-Carte">
          <div class="w3-theme-dark">
            <h2>{{ $cr->title }}</h2>
          </div>
          <div style="padding-top: 10px ; padding-bottom: 10px ; text-align: left" >{!!$cr->content!!}</div>
          <div>
            @foreach ($cr->attachables()->get() as $attachment)
            <a href="{{ Storage::url("CompteRendusFile/".$attachment->name) }}">{{ $attachment->name }}</a>
              
            @endforeach
        </div>

        </div>
        @endforeach
      </div>
    </div>
</div>


@endsection
