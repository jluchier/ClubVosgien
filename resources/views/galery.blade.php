@extends('default')

@section('gallery', 'navActive')

@section('content')

    <div class="w3-container marginTopMenu">
{{--        @foreach($galleries as $gallery)--}}
{{--      @if($gallery->private == 'true' and auth::$gallery->user_id)--}}

            <div class="jj-flex-container">
                <div class="jj-flex-gallery">
                    <div class="w3-card-4">
                    <div class="w3-container w3-theme-dark">
{{--                        <h3>{{ $gallery->title }}</h3>--}}
                    </div>
                    <div class="w3-section w3-pale-red">
{{--                        <img style="width: 100%"--}}
                             src="storage/Gallery/{{ $gallery->folder }}"
{{--                             srcset="storage/Gallery/{{ $gallery->folder }} 800w, storage/Gallery/{{ $gallery->folder }} 1280w, storage/fGallery/{{ $gallery->folder }} 1920w"--}}
                             alt="folder">
{{--                        {{ $gallery->description }}--}}
                    </div>
                </div>
            </div>

        </div>
{{--            @endif--}}
{{--            @endforeach--}}
    </div>

@endsection
