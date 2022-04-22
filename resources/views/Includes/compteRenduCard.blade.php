<div class="CV-Fond-Carte w3-card-4 CV-flex-gallery-column w3-margin">
    <div class="w3-theme-dark w3-padding">
        <h2>{{ $cr->title }}</h2>
    </div>
    <div class="w3-padding">
        {!!$cr->content!!}
    </div>
    @foreach ($cr->attachables()->get() as $attachment)
    <div class="w3-padding w3-card-4">
        <a href="{{ Storage::url("CompteRendusFile/".$attachment->name) }}">{{ $attachment->name }}</a>
    </div>
    @endforeach
</div>