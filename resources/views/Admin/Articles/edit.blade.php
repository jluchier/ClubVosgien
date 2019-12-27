@extends('Admin.default')

@section('articles', "navActive")

@section('content')
    <h1>Editer</h1>

    {{ Form::model($article, ["url" => $url, "method" => $method]) }}

    <div class="w3-row-padding w3-stretch">
        <div class="w3-half">
            {{ Form::label("title", "Titre") }}
            {{ Form::text("title", null, ["class" => "w3-input"]) }}
        </div>
        <div class="w3-half">
            {{ Form::label("category_id", "Categorie") }}
            {{ Form::select("category_id", $categories, null, ["class" => "w3-input"]) }}
        </div>
    </div>

    {{ Form::label("content", "Contenu") }}
    {{ Form::textArea("content", null, ["class" => "w3-input"]) }}

    {{ Form::submit("Enregistrer", ["class" => "w3-button w3-theme"]) }}

    {{ Form::close() }}
@endsection
