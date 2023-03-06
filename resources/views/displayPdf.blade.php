@extends ('default')
@section ('compterendus','navActive')
@section ('content')
<div class="w3-padding">
  <h1 class="w3-center">Compte rendu</h1>
  <h2 class="w3-center">{{$CR->title}}</h2>
  <div id="example1" data-path="{{$realChemin}}">
  </div>

</div>
@endsection