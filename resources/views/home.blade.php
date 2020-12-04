@extends('default')

@section('home', 'navActive')

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

    {{-- <div class="CV-global"> --}}

        {{-- <div class="w3-theme-15 w3-bar-block sidebar">
            <a href="#actu" class="w3-bar-item w3-button scale_CV">Les actualités</a>
            <a href="#agenda" class="w3-bar-item w3-button">Agenda</a>
        </div> --}}

    <div class="CV-flex-container-Agenda-Column">

        <div class="grid-container">
            <div id="actu" class="grid-container-left">
                <div class="grid-container-center">
                    <p class="CV-titre">Les actualités</p>
                    @foreach ($actualite as $actu)
                            <div class="CV-Fond-Carte">
                                <div class="w3-theme-dark">
                                    <h3>{{ $actu->title }}</H3>
                                </div>
                                <div class="w3-section CV-Fond-Carte">
                                    <img style="max-width: 100%" "{{ Storage::url('images/small/' . $actu->image) }}"
                                        srcset="{{ Storage::url('images/small/' . $actu->image) }} 800w,
                                    {{ Storage::url('images/medium/' . $actu->image) }} 1280w,
                                    {{ Storage::url('images/large/' . $actu->image) }} 1920w" alt="Là je mets l'image">
                                    <p>{!! $actu->content !!}</p>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>

            <div id="agenda" class="grid-container-right">
                <div class="grid-container-center">
                <h1>Agenda</h1>
                {{-- <div class="tuile-flex-horizontal-HC">
                    --}}
                    @foreach ($agenda as $key => $valeur)
                            {{-- <div class="w3-card-4 w3-third ">
                                <div class="w3-container w3-theme-dark">
                                    <h3>{{ $valeur->title }}</h3>
                                </div>
                                <div class="w3-section CV-Fond-Carte">
                                    {{ $valeur->content }}
                                </div>
                            </div> --}}
                            @if ($key % 2 == 0)
                            <div class="timeline">
                                <div class="container left">
                                    <div class="content">
                                        <h2>{{ $valeur->title }}</h2>
                                        <p>{{ $valeur->updated_at }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="container right">
                                    <div class="content">
                                        <h2>{{ $valeur->title }}</h2>
                                        <p>{{ $valeur->updated_at }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
