@extends('default')

@section('activity', 'navActive')

@section('content')
<div class="CV-global">
    <div class="w3-theme-15 w3-bar-block sidebar">
        <a href="#Rando" class="w3-bar-item w3-button">Randonnées</a>
        <a href="#MarcheOrientation" class="w3-bar-item w3-button">Les sorties VTT</a>
        <a href="#MarcheNordique" class="w3-bar-item w3-button">Marche nordique</a>
        <a href="#Formations" class="w3-bar-item w3-button">Formations</a>
    </div>
    <div class="CV-flex-container-Column">    
    <div class="CV-TopContainerHome">
        <img src="/images/fonds/Small/small1_006.jpg" alt="Les vosges">
    </div>
    <div>
        <div id="Rando" class="CV-flex-container-Column">
                <h1>Les randonnées</h1>
                <div class="tuile-flex-horizontal-HC">
                    <p class="w3-card-4 w3-theme-dark">
                        Les randonnées commencent ici ..... Dolores esse ex obcaecati, optio similique totam. A ab ad alias assumenda autem cumque distinctio eius eveniet itaque iure nisi nobis optio, perspiciatis repellat repudiandae sit soluta ullam unde voluptatum.
                    </p>        
                </div>
        </div>

        <div id="MarcheOrientation" class="CV-flex-container-Column">
                <h1>Les sorties VTT</h1>
                <div class="tuile-flex-horizontal-HC">
                    <p class="w3-card-4 w3-theme-dark">
                        Lessorties VTT commencent ici ..... Dolores esse ex obcaecati, optio similique totam. A ab ad alias assumenda autem cumque distinctio eius eveniet itaque iure nisi nobis optio, perspiciatis repellat repudiandae sit soluta ullam unde voluptatum.
                    </p>        
                </div>
        </div>

        <div id="MarcheNordique" class="CV-flex-container-Column">
                <h1>Les marches nordiques</h1>
                <div class="tuile-flex-horizontal-HC">
                    <p class="w3-card-4 w3-theme-dark">
                        Les marches nordiques commencent ici ..... Dolores esse ex obcaecati, optio similique totam. A ab ad alias assumenda autem cumque distinctio eius eveniet itaque iure nisi nobis optio, perspiciatis repellat repudiandae sit soluta ullam unde voluptatum.
                    </p>        
                </div>
        </div>

        <div id="Formations" class="CV-flex-container-Column">
                <h1>Les formations</h1>
                <div class="tuile-flex-horizontal-HC">
                    <p class="w3-card-4 w3-theme-dark">
                        Les formations commencent ici ..... Dolores esse ex obcaecati, optio similique totam. A ab ad alias assumenda autem cumque distinctio eius eveniet itaque iure nisi nobis optio, perspiciatis repellat repudiandae sit soluta ullam unde voluptatum.
                    </p>        
                </div>
        </div>
    </div>
</div>
</div>
@endsection