<div class="CV-Fond-Carte w3-card-4 w3-third w3-padding">
    <div class="w3-theme-dark">
        <h2>{{ $cr->title }}</h2>
    </div>
    <div class="w3-padding">
        {!!$cr->content!!}
    </div>
    @foreach ($cr->attachables()->get() as $attachment)
    <div class="w3-row-padding w3-card-4">
        <a href="{{ Storage::url("CompteRendusFile/".$attachment->name) }}">{{ $attachment->name }}</a>
    </div>
    @endforeach
</div>