<div class="CV-flex-gallery">
    <div class="w3-card-4">
        <div class="w3-container w3-theme-dark">
            <h3>{{ $gallery->title }}</h3>
        </div>
        <div class="w3-section w3-pale-red">
            <img style="width: 100%"
                 src="{{ Storage::url('gallery/small/' . $gallery->folder)}}"
                 srcset="{{ Storage::url('gallery/small/' . $gallery->folder)}} 800w, {{ Storage::url('gallery/medium/' . $gallery->folder)}} 1280w, {{ Storage::url('gallery/large/' . $gallery->folder)}} 1920w"
                 alt="folder">
            {{ $gallery->description }}
        </div>
    </div>
</div>