<div class="w3-row-padding w3-container w3-margin">
  @if ($admin)
  <a href="{{ route('articles.index') }}" class="w3-button w3-theme-dark w3-round">Ajouter</a>
  @endif
  @foreach($articlesToDispaly as $key => $cmt)
  @if ($key %2 == 0)
  <div class="w3-row-padding w3-container w3-margin">
    <div class="CV-Fond-Carte w3-card-4 w3-half w3-padding">
      <p>{!! $cmt->content !!}</p>
      @if ($admin)
      <div class="w3-padding">
        <a href="{{ route("articles.edit", $cmt->id) }}" class="w3-button w3-theme-dark w3-round">Modifer</a>
        {{ Form::open(["route" => ["articles.destroy", $cmt->id], "method" => "delete", "style" => "display: inline-block"]) }}
        {{ Form::submit("Supprimer", ["class" => "w3-button w3-red"]) }}
        {{ Form::close() }}
      </div>
      @endif
    </div>
    <div class="w3-rest w3-center">
      @if (!is_null($cmt->image) )
      <img class="zoom" style="max-width: 50%" src="{{ Storage::url('images/medium/' . $cmt->image) }}" alt="">
      @else
      <img src="/images/common/large_000_1.jpg" style="max-width: 50%" alt="Les vosges">
      @endif
    </div>
  </div>
  @else
  <div class="w3-row-padding w3-container w3-margin">
    <div class="w3-half w3-center">
      @if (!is_null($cmt->image) )
      <img style="max-width: 50%" src="{{ Storage::url('images/medium/' . $cmt->image) }}" alt="">
      @else
      <img src="/images/common/large_000_1.jpg" style="max-width: 50%" alt="Les vosges">
      @endif
    </div>
    <div class="w3-half CV-Fond-Carte w3-card-4">
      <p>
        {!! $cmt->content !!}
      </p>
      @if ($admin)
      <div class="w3-padding">
        <a href="{{ route("articles.edit", $cmt->id) }}" class="w3-button w3-theme-dark w3-round">Modifer</a>
        {{ Form::open(["route" => ["articles.destroy", $cmt->id], "method" => "delete", "style" => "display: inline-block"]) }}
        {{ Form::submit("Supprimer", ["class" => "w3-button w3-red"]) }}
        {{ Form::close() }}
      </div>
      @endif
    </div>
  </div>
  @endif
  @endforeach
</div>
