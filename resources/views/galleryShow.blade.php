<div class="jj-flex-gallery">
    <div class="w3-card-4">
        <div class="w3-container w3-theme-dark">
            <h3>{{ $gallery->title }}</h3>
        </div>
        <div class="w3-section w3-pale-red">
            <img style="width: 100%"
                 src="storage/gallery/thumb/{{ $gallery->folder }}"
                 srcset="storage/gallery/thumb/{{ $gallery->folder }} 800w, storage/gallery/thumb/{{ $gallery->folder }} 1280w, storage/gallery/thumb/{{ $gallery->folder }} 1920w"
                 alt="folder">
            {{ $gallery->description }}
        </div>
    </div>
</div>
