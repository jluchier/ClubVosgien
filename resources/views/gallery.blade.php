@extends('default')

@section('gallery', 'navActive')

@section('content')
<div class="CV-TopContainerHome">
    <img class="CV-TopContainerHome-ImgTop" src="/images/common/large1_009_1.jpg" alt="Les vosges">
    {{-- <picture>
        <source media="(min-width:650px)" srcset="/images/common/medium_000.jpg">
        <source media="(min-width:465px)" srcset="/images/common/small_000.jpg">
        <img src="/images/common/large_000.jpg" alt="Les vosges" style="width:auto;">
    </picture> --}}
    <!-- <h2 class="w3-xxxlarge w3-center CV-fontColorRed" style="padding-top:5%" >Bienvenue sur le site du club vosgien RVF</h2> -->
    <img src="/images/common/wave_white.svg " class="CV-TopContainerHome-ImgBottom">
</div>

    <div class="CV-flex-gallery-row">

        <div class="CV-flex-gallery-column">
            @foreach($galleriePublic as $gallery)
                @include('galleryShow')
            @endforeach
        </div>

        <div class="CV-flex-gallery-column">
            @foreach($galleriePrivee as $gallery)
                @include('galleryShow')
            @endforeach
        </div>
    </div>

@endsection
