@extends('default')

@section('home', 'navActive')

@section('content')

    {{--    <div class="w3-card-4 w3-red menuFixe w3-bar-block">
            <a href="#actu" class="w3-bar-item w3-button scale_JJ">Les actualités</a>
            <a href="#agenda" class="w3-bar-item w3-button">Agenda</a>
            <a href="#infosFede" class="w3-bar-item w3-button">Informations fédération</a>
            <a href="#orga" class="w3-bar-item w3-button">Organigramme</a>
        </div>--}}
     {{--        <div class="w3-display-bottommiddle w3-text-white w3-xxlarge">
                    <i class="fas fa-chevron-circle-down"></i>
                </div>--}}
        <div class="fond1 jj-flex-home-container">

            <div class="w3-display-topmiddle w3-text-orange jj-TopContainerHome" style="text-shadow:3px 1px 0 #444">
                <h2 class="w3-xxxlarge w3-center" >Bienvenue sur le site du club vosgien RVF</h2>
            </div>

            <div class="jj-flex-home-item">
                <h1>Les actualités</h1>
                <div>
                    <p>Les actualités commencent ici ..... Dolores esse ex obcaecati, optio similique totam. A ab ad alias assumenda autem cumque distinctio eius
                        eveniet itaque iure nisi nobis optio, perspiciatis repellat repudiandae sit soluta ullam unde
                        voluptatum.
                    </p>

                    <div class="w3-row-padding w3-stretch">
                        @foreach($articles as $article)
                            @if($article->category->name == 'Actualité')
                                <div class="w3-card-4 w3-third">
                                    <div class="w3-container w3-theme-dark">
                                        <h3>{{ $article->title }}</H3>
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

            </div>
            <div id="agenda" class="jj-flex-home-item">
                <div>
                    <button onclick="myFunction('agenda1')" class="w3-btn w3-bar-block w3-center w3-theme w3-round">Agenda <i class="fas fa-caret-down w3-xlarge"></i></button>
                </div>
                <div id="agenda1" class="w3-hide w3-animate-left w3-display-left">
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
            <div id="infosFede" class="jj-flex-home-item">
                <div>
                    <button onclick="myFunction('infosFede1')" class="w3-btn w3-bar-block w3-center w3-theme w3-round">Les informations de la fédération <i class="fas fa-caret-down w3-xlarge"></i></button>
                </div>
                <div id="infosFede1" class="w3-hide w3-animate-left w3-display-left">
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
            </div>
            <div id="orga" class="jj-flex-home-item">
                <div>
                    <button onclick="myFunction('orga1')" class="w3-btn w3-bar-block w3-center w3-theme w3-round">Notre organigramme <i class="fas fa-caret-down w3-xlarge"></i></button>
                </div>
                <div id='orga1' class="w3-hide w3-animate-left w3-display-left">
                    <p>... ORGANIGRAMME ............Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquid asperiores autem, consequuntur
                        cupiditate, dolor ea fuga ipsam laboriosam non numquam odit provident qui quod reprehenderit sit soluta
                        tenetur, voluptates.
                    </p>
                </div>
            </div>
        </div>

@endsection
