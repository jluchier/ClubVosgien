@extends('default')

@section('gallery', 'navActive')

@section('content')

    <div class="w3-container marginTopMenu">
        <h3>Gallerie Privée</h3>
        <div class="jj-flex-container">
            @foreach($galleriePrivee as $gallery)
                @include('galleryShow')
            @endforeach
        </div>
        <h3>Gallerie Public</h3>
        <div class="jj-flex-container">
            @foreach($galleriePublic as $gallery)
                @include('galleryShow')
            @endforeach
        </div>
    </div>

@endsection
