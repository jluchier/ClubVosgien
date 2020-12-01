    <div class="w3-card-4 CV-Fond-Carte">
        <div class="w3-container w3-theme-dark">
            <h3>{{ $gallery->title }}</h3>
        </div>
        <div>{{ $gallery->description }}</div>
        <div>Sortie du {{ $gallery->dateSortie }}</div>
        <div class="w3-section w3-image">
            <img src="{{ Storage::url($gallery->firstImage) }}" alt="Pas d'image">
        </div>
    </div>
