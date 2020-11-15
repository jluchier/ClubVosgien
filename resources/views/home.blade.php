@extends('default')

@section('home', 'navActive')

@section('content')


<div class="CV-global">

    <div class="w3-theme-15 w3-bar-block sidebar">
        <a href="#actu" class="w3-bar-item w3-button scale_CV">Les actualités</a>
        <a href="#agenda" class="w3-bar-item w3-button">Agenda</a>
    </div>

    <div class="CV-flex-container-Column">
        <div class="CV-TopContainerHome">
            <img src="/images/fonds/Small/small1_009.jpg" alt="Les vosges">
            <!-- <h2 class="w3-xxxlarge w3-center CV-fontColorRed" style="padding-top:5%" >Bienvenue sur le site du club vosgien RVF</h2> -->
        </div>
        <div >
            <div id="actu" class="CV-flex-container-Column">
                <h1>Les actualités</h1>
                <div class="tuile-flex-horizontal-HC">           
                    
                        @foreach($articles as $article)
                        @if($article->category->name == 'Actualité')
                        <div class="w3-card-4 w3-third">
                            <div class="w3-container w3-theme-dark">
                                <h3>{{ $article->title }}</H3>
                            </div>
                            <div class="w3-section CV-Orange">
                                <img style="width: 100%"
                                src="{{ Storage::url('images/small/' . $article->image)}}"
                                srcset="{{ Storage::url('images/small/' . $article->image)}} 800w,
                                {{ Storage::url('images/medium/' . $article->image)}} 1280w,
                                {{ Storage::url('images/large/' . $article->image)}} 1920w"
                                alt="Là je mets l'image">
                                <p>{{ $article->content }}</p> 
                            </div>
                        </div>
                        @endif
                        @endforeach
                   
                </div>
            </div>
            <div id="agenda" class="CV-flex-container-Column">
                <h1>Agenda</h1>             
                <div class="tuile-flex-horizontal-HC">

                    @foreach($articles as $article)
                    @if($article->category->name == 'Agenda')
                    <div class="w3-card-4 w3-third ">
                        <div class="w3-container w3-theme-dark">
                            <h3>{{ $article->title }}</h3>
                        </div>
                        <div class="w3-section CV-Orange">
                            {{ $article->content }}
                        </div>
                    </div>
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection