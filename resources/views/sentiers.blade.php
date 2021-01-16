@extends('default')

@section('sentiers', 'navActive')

@section('content')

<div class="parallax_1 w3-display-container">
  <h1 class='parallaxTitle w3-display-middle'>Nos sentiers</h1>
</div>

<div class="w3-row-padding w3-container">
  <div class="w3-card-4 CV-Fond-Carte w3-container  w3-section w3-content">
    <p>Le Club Vosgien c’est de nombreux bénévoles qui œuvrent au balisage et à l’entretien de plus de 20 000 km de sentiers, qui gèrent des chalets, refuges et abris pour les randonneurs dans le respect de la protection de la nature et des paysages.
    </p>
    <a href="/images/common/depliant_Rando_RuptSurMoselle.pdf" download="depliant_Rando_RuptSurMoselle" target="_blank">
      <i class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i>Dépliant des Randonnées

     <!-- <img src="/images/common/depliant_Rando_RuptSurMoselle.pdf" alt=""> -->
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
