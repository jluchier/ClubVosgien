@extends('default')

@section('home', 'navActive')

@section('content')

{{--    <div class="w3-card-4 w3-red menuFixe w3-bar-block">--}}
{{--        <a href="#actu" class="w3-bar-item w3-button">Les actualités</a>--}}
{{--        <a href="#agenda" class="w3-bar-item w3-button">Agenda</a>--}}
{{--        <a href="#infosFede" class="w3-bar-item w3-button">Informations fédération</a>--}}
{{--        <a href="#orga" class="w3-bar-item w3-button">Organigramme</a>--}}
{{--    </div>--}}

    <div class="fond1 w3-display-container">
        <div class="w3-display-topmiddle">
            <h2>Bienvenue sur le site du club vosgien RVF</h2>
        </div>
        <div class="w3-display-bottommiddle w3-text-white w3-xxlarge">
            <i class="fas fa-chevron-circle-down"></i>
        </div>
    </div>

    <div class="fond2 w3-display-container" id="actu">
        <button onclick="myFunction('actu1')" class="w3-btn w3-block w3-display-middle w3-padding w3-theme w3-round">Les actualités <i class="fas fa-caret-down w3-xlarge"></i></button>
    </div>

    <div id="actu1" class="w3-hide w3-animate-left">
        <p>Les actualités commencent ici ..... Dolores esse ex obcaecati, optio similique totam. A ab ad alias assumenda autem cumque distinctio eius
            eveniet itaque iure nisi nobis optio, perspiciatis repellat repudiandae sit soluta ullam unde
            voluptatum.
        </p>

        <div class="w3-row-padding w3-stretch">
            @foreach($articles as $article)
                @if($article->category->name == 'Actualité')
                    <div class="w3-card-4 w3-third">
                        <div class="w3-container w3-theme-dark">
                            <h3>{{ $article->title }}</h3>
                        </div>
                        <div class="w3-section w3-red">
                            <img style="width: 100%"
                                 src="storage/images/small/{{ $article->image }}"
                                 srcset="storage/images/small/{{ $article->image }} 800w, storage/images/medium/{{ $article->image }} 1280w, storage/images/large/{{ $article->image }} 1920w"
                                 alt="image">
                            {{ $article->content }}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div id="agenda" class="w3-container">
        <button onclick="myFunction('agenda1')" class="w3-btn w3-block w3-padding w3-theme w3-round">Agenda</button>
        <div id="agenda1" class="fond3 w3-display-container w3-hide c">
            <p>L'AGENDA commence ici ..... Dolores esse ex obcaecati, optio similique totam. A ab ad alias assumenda autem cumque distinctio eius
                eveniet itaque iure nisi nobis optio, perspiciatis repellat repudiandae sit soluta ullam unde
                voluptatum.
            </p>
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





    <div id="infosFede" class="fond2 w3-display-container">
        <div class="w3-display-middle w3-padding w3-theme w3-round">
            <h1>Les informations de la fédération</h1>
        </div>
    </div>
    <div class="w3-container w3-auto w3-justify">
        <p>Les INFORMATIONS de la fédération commencent ici ..... Dolores esse ex obcaecati, optio similique totam. A ab ad alias assumenda autem cumque distinctio eius
            eveniet itaque iure nisi nobis optio, perspiciatis repellat repudiandae sit soluta ullam unde
            voluptatum.
        </p>
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

    <div id="orga" class="fond2 w3-display-container">
        <div class="w3-display-middle w3-padding w3-theme w3-round">
            <h1>Notre organigramme</h1>
        </div>
    </div>
    <div class="w3-container w3-auto w3-justify">
        ... ORGANIGRAMME Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquid asperiores autem, consequuntur
        cupiditate, dolor ea fuga ipsam laboriosam non numquam odit provident qui quod reprehenderit sit soluta
        tenetur, voluptates.
    </div>
@endsection
