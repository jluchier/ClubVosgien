@extends('default')

@section('compterendus', 'navActive')

@section('content')
<div class="CV-TopContainerHome parallax_1 w3-display-container">
  <h1 class='parallaxTitle w3-display-middle'>Ficher pdf</h1>
  <img src="/images/common/wave_white.svg">
</div>

<div class="CV-flex-gallery-row" style="justify-content:center">
  <div id="pdf-viewer">

  </div>
</div>
<script>
  PDFObject.embed("{{ route("
    displayPdf "}}", "#pdf-viewer");
</script>
@endsection