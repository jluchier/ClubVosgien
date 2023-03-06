<div class="CV-Fond-Carte w3-card-4 CV-flex-gallery-column w3-margin">
    <div class="w3-theme-dark w3-padding">
        <h2>{{ $CR->title }}</h2>
    </div>
    <div class="w3-padding">
        {{$CR->content}}
    </div>
    <div class="w3-padding w3-card-4">
        @isset($CR->path)
        <a href="{{ route("displayPdf",$CR->id) }}">{{$CR->path}}</a>
        @endisset
        @error('compterendus')
        <div class="alert">{{ $message }}
        </div>
        @enderror
    </div>
</div>