@extends('default')

@section('gallery', 'navActive')

@section('content')

    <div class="w3-container marginTopMenu">
        <h3>Galerie Privée</h3>
        <div class="CV-flex-container">
            @foreach($galleriePrivee as $gallery)
                @include('galleryShow')
            @endforeach
        </div>
        <h3>Galerie Publique</h3>
        <div class="CV-flex-container">
            @foreach($galleriePublic as $gallery)
                @include('galleryShow')
            @endforeach
        </div>
    </div>

@endsection
