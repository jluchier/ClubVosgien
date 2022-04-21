@extends('default')

@section('compterendus', 'navActive')

@section('content')
<div class="CV-TopContainerHome parallax_1 w3-display-container">
  <h1 class='parallaxTitle w3-display-middle'>Comptes-rendus des réunions</h1>
    <img src="/images/common/wave_white.svg">
</div>

<div class="w3-row-padding w3-container w3-margin">
@foreach ($compterendus as $key => $cr)
@if ($key %3 == 0)

  @include('Includes.compteRenduCard')

  @elseif ($key %3 == 1)
  @include('Includes.compteRenduCard')
  @else
  @include('Includes.compteRenduCard')
  @endif
  @endforeach
  
</div>  

@endsection
