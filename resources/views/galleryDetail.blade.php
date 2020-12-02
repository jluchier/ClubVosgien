@extends('default')

@section('gallery', 'navActive')

@section('content')

<div class="CV-flex-gallery-row">

    <div class="CV-flex-gallery-column">
        @foreach($gallerie as $gallery)
        @include('galleryShow')
        @endforeach
    </div>

</div>






@endsection
