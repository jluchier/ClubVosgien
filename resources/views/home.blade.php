@extends('default')

@section('home', 'navActive')

@section('content')

{{--        <div class="w3-display-bottommiddle w3-text-white w3-xxlarge">
    <i class="fas fa-chevron-circle-down"></i>
</div>--}}

<div class="CV-global">

 <div class="w3-red w3-bar-block sidebar">
    <a href="#actu" class="w3-bar-item w3-button scale_CV">Les actualités</a>
    <a href="#agenda" class="w3-bar-item w3-button">Agenda</a>
    <a href="#infosFede" class="w3-bar-item w3-button">Informations fédération</a>
    <a href="#orga" class="w3-bar-item w3-button">Organigramme</a>
</div>
   
<div class="fond1 CV-container">

    <div class="w3-text-red CV-TopContainerHome" style="text-shadow:3px 1px 0 #444">
        <h2 class="w3-xxxlarge w3-center" >Bienvenue sur le site du club vosgien RVF</h2>
    </div>

    <div id="actu" class="CV-flex-container">
        <h1>Les actualités</h1>
        <div class="tuile-flex-horizontal-HC">              

            <div>
                @foreach($articles as $article)
                @if($article->category->name == 'Actualité')
                <div class="w3-card-4 w3-third">
                    <div class="w3-container w3-theme-dark">
                        <h3>{{ $article->title }}</H3>
                    </div>
                    <div class="w3-section w3-red">
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
    </div>

    <div id="agenda" class="CV-flex-container">
            <h1>Agenda</h1>             
            <div class="tuile-flex-horizontal-HC">
                @foreach($articles as $article)
                @if($article->category->name == 'Agenda')
                <div class="w3-card-4 w3-red ">
                    <div class="w3-container w3-theme-dark">
                        <h3>{{ $article->title }}</h3>
                    </div>
                    <div class="w3-section ">
                        {{ $article->content }}
                    </div>
                </div>
                @endif
                @endforeach
            </div>
    </div>

    <div id="infosFede" class="CV-flex-container">
        <h1>Les informations de la fédération</h1>            
        <div class="tuile-flex-horizontal-HC">
            @foreach($articles as $article)
            @if($article->category->name == 'Infos fédération')
            <div class="w3-card-4 w3-red ">
                <div class="w3-container w3-theme-dark">
                    <h3>{{ $article->title }}</h3>
                </div>
                <div class="w3-section ">
                    {{ $article->content }}
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
        
    <div id="orga" class="CV-flex-container">
            <h1>Notre organigramme</h1>
            <div class="tuile-flex-horizontal-HC">
            </div>
    </div>    
</div>

</div>
@endsection
