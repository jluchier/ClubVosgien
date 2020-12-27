@extends('Admin.default')

@section('notreClub', 'navActive')

@section('content')
    @include('Admin.messages')

<div class="CV-flex-container-Column">

<div class="parallax_1"></div>
<div class="w3-row-padding w3-container">
    <div class="w3-card-4 CV-Fond-Carte w3-container w3-section w3-content">
        <p style="text-align:justify">
          Créé en 1872, reconnu d’utilité publique en 1879, le Club Vosgien c’est 126 associations dans le Massif des Vosges pour pratiquer la randonnée, la marche nordique, la marche d’orientation et d’autres activités de pleine nature.
        </p>
    </div>
</div>
<div class="w3-row-padding w3-container w3-margin">
  <a href="{{ route('articles.index') }}" class="w3-button w3-theme-dark w3-round">Ajouter</a>
    @foreach($articlesComite as $key => $cmt)
    @if ($key %2 == 0)
    <div class="w3-row-padding w3-container w3-margin">
        <div class="CV-Fond-Carte w3-card-4 w3-half w3-padding">
    <h1>Le comité</h1>
    <p>{{ $cmt->content }}</p>
    <div class="w3-padding">
  <a href="{{ route("articles.edit", $cmt->id) }}" class="w3-button w3-theme-dark w3-round">Modifer</a>
  {{ Form::open(["route" => ["articles.destroy", $cmt->id], "method" => "delete", "style" => "display: inline-block"]) }}
  {{ Form::submit("Supprimer", ["class" => "w3-button w3-red"]) }}
  {{ Form::close() }}
  </div>
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
          <h1>Le comité</h1>
          <p>
            {!!$cmt->content!!}
          </p>
          <div class="w3-padding">
        <a href="{{ route("articles.edit", $cmt->id) }}" class="w3-button w3-theme-dark w3-round">Modifer</a>
        {{ Form::open(["route" => ["articles.destroy", $cmt->id], "method" => "delete", "style" => "display: inline-block"]) }}
        {{ Form::submit("Supprimer", ["class" => "w3-button w3-red"]) }}
        {{ Form::close() }}
        </div>
        </div>
      </div>
        @endif
        @endforeach
</div>

    <div class="parallax_2"></div>
    <div class="w3-row-padding w3-container w3-margin">
      <a href="{{ route('articles.index') }}" class="w3-button w3-theme-dark w3-round">Ajouter</a>
        @foreach($articlesFormations as $key => $cmt)
        @if ($key %2 == 0)
        <div class="w3-row-padding w3-container w3-margin">
            <div class="CV-Fond-Carte w3-card-4 w3-half w3-padding">
        <h1>Les formations</h1>
        <p>{{ $cmt->content }}</p>
        <div class="w3-padding">
      <a href="{{ route("articles.edit", $cmt->id) }}" class="w3-button w3-theme-dark w3-round">Modifer</a>
      {{ Form::open(["route" => ["articles.destroy", $cmt->id], "method" => "delete", "style" => "display: inline-block"]) }}
      {{ Form::submit("Supprimer", ["class" => "w3-button w3-red"]) }}
      {{ Form::close() }}
      </div>
        </div>

              <div class="w3-rest w3-center">
                @if (!is_null($cmt->image) )
                  <img style="max-width: 50%" src="{{ Storage::url('images/medium/' . $cmt->image) }}" alt="">
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
              <h1>Les formations</h1>
              <p>
                {!!$cmt->content!!}
              </p>
              <div class="w3-padding">
            <a href="{{ route("articles.edit", $cmt->id) }}" class="w3-button w3-theme-dark w3-round">Modifer</a>
            {{ Form::open(["route" => ["articles.destroy", $cmt->id], "method" => "delete", "style" => "display: inline-block"]) }}
            {{ Form::submit("Supprimer", ["class" => "w3-button w3-red"]) }}
            {{ Form::close() }}
            </div>
            </div>
          </div>
            @endif
            @endforeach
    </div>
<div class="parallax_3"></div>

<div class="w3-row-padding w3-container w3-margin">
  <a href="{{ route('articles.index') }}" class="w3-button w3-theme-dark w3-round">Ajouter</a>
    @foreach($articlesAdhesions as $key => $cmt)
    @if ($key %2 == 0)
    <div class="w3-row-padding w3-container w3-margin">
        <div class="CV-Fond-Carte w3-card-4 w3-half w3-padding">
    <h1>Les adhésions</h1>
    <p>{{ $cmt->content }}</p>
    <div class="w3-padding">
  <a href="{{ route("articles.edit", $cmt->id) }}" class="w3-button w3-theme-dark w3-round">Modifer</a>
  {{ Form::open(["route" => ["articles.destroy", $cmt->id], "method" => "delete", "style" => "display: inline-block"]) }}
  {{ Form::submit("Supprimer", ["class" => "w3-button w3-red"]) }}
  {{ Form::close() }}
  </div>
    </div>

          <div class="w3-rest w3-center">
            @if (!is_null($cmt->image) )
              <img style="max-width: 50%" src="{{ Storage::url('images/medium/' . $cmt->image) }}" alt="">
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
          <h1>Les adhésions</h1>
          <p>
            {!!$cmt->content!!}
          </p>
          <div class="w3-padding">
        <a href="{{ route("articles.edit", $cmt->id) }}" class="w3-button w3-theme-dark w3-round">Modifer</a>
        {{ Form::open(["route" => ["articles.destroy", $cmt->id], "method" => "delete", "style" => "display: inline-block"]) }}
        {{ Form::submit("Supprimer", ["class" => "w3-button w3-red"]) }}
        {{ Form::close() }}
        </div>
        </div>
      </div>
        @endif
        @endforeach
</div>
<div class="parallax_4"></div>

        <div class="w3-row-padding w3-container w3-margin">
          <a href="{{ route('articles.index') }}" class="w3-button w3-theme-dark w3-round">Ajouter</a>
            @foreach($articlesPartenaires as $key => $cmt)
            @if ($key %2 == 0)
            <div class="w3-row-padding w3-container w3-margin">
                <div class="CV-Fond-Carte w3-card-4 w3-half w3-padding">
            <h1>Les partenaires</h1>
            <p>{{ $cmt->content }}</p>
            <div class="w3-padding">
          <a href="{{ route("articles.edit", $cmt->id) }}" class="w3-button w3-theme-dark w3-round">Modifer</a>
          {{ Form::open(["route" => ["articles.destroy", $cmt->id], "method" => "delete", "style" => "display: inline-block"]) }}
          {{ Form::submit("Supprimer", ["class" => "w3-button w3-red"]) }}
          {{ Form::close() }}
          </div>
            </div>

                  <div class="w3-rest w3-center">
                    @if (!is_null($cmt->image) )
                      <img style="max-width: 50%" src="{{ Storage::url('images/medium/' . $cmt->image) }}" alt="">
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
                  <h1>Les partenaires</h1>
                  <p>
                    {!!$cmt->content!!}
                  </p>
                  <div class="w3-padding">
                <a href="{{ route("articles.edit", $cmt->id) }}" class="w3-button w3-theme-dark w3-round">Modifer</a>
                {{ Form::open(["route" => ["articles.destroy", $cmt->id], "method" => "delete", "style" => "display: inline-block"]) }}
                {{ Form::submit("Supprimer", ["class" => "w3-button w3-red"]) }}
                {{ Form::close() }}
                </div>
                </div>
              </div>
                @endif
                @endforeach
        </div>
<div class="parallax_5"> </div>


</div>
@endsection
