@extends('default')

@section('home', 'navActive')

@section('content')
<div class="w3-row-padding w3-container w3-margin w3-padding-large">
    <div class="w3-half CV-Fond-Carte w3-card-4 sentierTexte">
      <div class="w3-theme-dark w3-center w3-margin">
        <h2>Agenda du : {{ $agendaDetail->dateEvent }}</h2>
      </div>
      <h1>{!! $agendaDetail->title !!}</h1>
      <p>{!! $agendaDetail->content !!}</p>

    </div>
    <div class="w3-rest w3-center">

      @if (!is_null($agendaDetail->image) )
      <img style="max-width: 50%" src="{{ Storage::url('images/medium/' . $agendaDetail->image) }}" alt="">
      @else
      <img src="/images/common/large_000_1.jpg" style="max-width: 50%" alt="Les vosges">
      @endif
    </div>
</div>







@endsection
