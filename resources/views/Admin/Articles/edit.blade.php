@extends('Admin.default')

@section('articles', "navActive")

@section('content')
    @include('Admin.messages')

    <h1>Editer</h1>

    {{ Form::model($article, ["url" => $url, "method" => $method, "files" => true]) }}

<div class="w3-row-padding w3-stretch">
        <div class="w3-half">
            {{ Form::label("title", "Titre") }}
            {{ Form::text("title", null, ["class" => "w3-input", "required" => true]) }}
        </div>
        <div class="w3-half">
            {{ Form::label("dateEvent", "Date de l'événement") }}
            {{ Form::date("dateEvent", $article->dateEvent, ["class" => "w3-input", "required" => true ]) }}
        </div>
        <div class="w3-half">
            {{ Form::label("category_id", "Categorie") }}
            {{ Form::select("category_id", $categories, null, ["class" => "w3-input", "required" => true]) }}
            {{ Form::file("image", ["class" => "w3-input", "accept" => "image/*"]) }}

            <div id="vuejs">
        {{-- <image-upload :route="'{{ route('uploadImage') }}'"></image-upload> --}}
        <single-image :name="'image'" :source="'{{ Storage::url('images/thumb/' . $article->image)}}'"></single-image>
    </div>

            @if ($article->image != null)
            <img src="{{ Storage::url('images/thumb/' . $article->image)}}" alt="Pas d'image">
            {{ Form::label("imageDelete", "Supprimer l'image") }}
            {{ Form::checkbox("imageDelete", true, null, ["class" => "w3-check"])}}
            @endif

        </div>
    </div>

    {{ Form::label("content", "Contenu") }}
<div id="vueditor">
<cv-editor :editor-data="'{!! $article->content !!}'"></cv-editor>
</div>
    <!-- {{ Form::textArea("content", null, ["class" => "w3-input", "id" => "contentArea", "required" => true]) }} -->

    {{ Form::submit("Enregistrer", ["class" => "w3-button w3-theme-dark"]) }}

    {{ Form::close() }}

@endsection
