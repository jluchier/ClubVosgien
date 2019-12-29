@extends('default')

@section('activity', 'navActive')

@section('content')

    <div class="w3-card-4 w3-red menuFixe w3-bar-block">
        <a href="#Rando" class="w3-bar-item w3-button">Randonnées</a>
        <a href="#agenda" class="w3-bar-item w3-button">Marche d'orientation</a>
        <a href="#activites" class="w3-bar-item w3-button">Marche nordique</a>
        <a href="#orga" class="w3-bar-item w3-button">Formations</a>
    </div>
    <div class="fondVache1 w3-display-container">
        <div class="w3-display-topmiddle">
            <h2>Les activités</h2>
        </div>
        <div class="w3-display-bottommiddle w3-text-white w3-xxlarge">
            <i class="fas fa-chevron-circle-down"></i>
        </div>
    </div>
    <div id="Rando" class="fondSentier1 w3-display-container">
        <div class="w3-display-middle w3-padding w3-theme w3-round">
            <h1>Les randonnées</h1>
        </div>
    </div>
    <div class="w3-container w3-auto w3-justify">
        <p>Les randonnées commencent ici ..... Dolores esse ex obcaecati, optio similique totam. A ab ad alias assumenda autem cumque distinctio eius
            eveniet itaque iure nisi nobis optio, perspiciatis repellat repudiandae sit soluta ullam unde
            voluptatum.
        </p>

    </div>

@endsection