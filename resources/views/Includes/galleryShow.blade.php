    <div class="w3-card-4 CV-Fond-Carte">
        <div class="w3-bar w3-center w3-theme-dark">
            <h3>{{ $gallery->title }}</h3>
        </div>
        <div>{{ $gallery->description }}</div>
        @if ($gallery->display_date)
          <div>Sortie du {{ $gallery->dateSortie}}</div>
        @endif
        <div>
            <a href="{{route('galleryDetail',$gallery->id)}}"><img src="{{ Storage::url($gallery->firstImage) }}" alt="Pas d'image"></a>
        </div>
    </div>
