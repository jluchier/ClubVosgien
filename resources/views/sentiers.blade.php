@extends('default')

@section('sentiers', 'navActive')

@section('content')

<div class="CV-TopContainerHome parallax_1 w3-display-container">
  <h1 class='parallaxTitle w3-display-middle'>Nos sentiers</h1>
    <img src="/images/common/wave_white.svg">
</div>

<div class="w3-row-padding w3-container">
  <div class="w3-card-4 CV-Fond-Carte w3-container  w3-section w3-content w3-padding">
    <p>Le Club Vosgien c’est de nombreux bénévoles qui œuvrent au balisage et à l’entretien de plus de 20 000 km de sentiers, qui gèrent des chalets, refuges et abris pour les randonneurs dans le respect de la protection de la nature et des paysages.
    </p>
    Accédez au dépliant des Randonnées =>
    <a href="/images/common/depliant_Rando_RuptSurMoselle.pdf" target="_blank">
      <img src="/images/common/file-pdf-solid.png" style="max-width: 30px">
   </a>
  </div>
</div>

<div class="w3-row-padding w3-container w3-margin">
  @include('Includes.sentiersChalets')
</div>
<div class="w3-row-padding w3-container w3-margin">
  @include('Includes.sentiersLinqueny')
</div>
<div class="w3-row-padding w3-container w3-margin">
  @include('Includes.sentiersBelue')
</div>
<div class="w3-row-padding w3-container w3-margin">
@include('Includes.sentiers3Chalets')
</div>
<div class="w3-row-padding w3-container w3-margin">
  @include('Includes.sentiersSourceThermale')
</div>
<div class="w3-row-padding w3-container w3-margin">
  @include('Includes.sentiersLesSites')
</div>

@endsection
