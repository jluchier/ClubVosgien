@extends('default')

@section('gallery', 'navActive')

@section('content')
<div class="CV-TopContainerHome CV-Bg1">
    <img src="/images/common/wave_white.svg">
</div>


    <div class="CV-flex-gallery-row">
        @foreach ($galleryColumn as $column)
            <div class="CV-flex-gallery-column">
                @foreach ($column as $gallery)
                    @include('galleryShow')
                @endforeach
            </div>
        @endforeach
    </div>

@endsection
