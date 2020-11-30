    <div class="w3-card-4 CV-Fond-Carte">
        <div class="w3-container w3-theme-dark">
            <h3>{{ $gallery->title }}</h3>
        </div>
        <div>{{ $gallery->description }}</div>
        <div>Sortie du {{ $gallery->dateSortie }}</div>
        <div class="w3-section w3-image">
            <img style="width: 100%"
                 src="{{ Storage::url('gallery/small/' . $gallery->folder)}}"
                 srcset="{{ Storage::url('gallery/small/' . $gallery->folder)}} 800w, {{ Storage::url('gallery/medium/' . $gallery->folder)}} 1280w, {{ Storage::url('gallery/large/' . $gallery->folder)}} 1920w"
                 alt="folder">
        </div>
    </div>
