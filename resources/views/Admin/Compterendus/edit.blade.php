@extends('Admin.default')

@section('compterendus', "navActive")

@section('content')
    @include('Admin.messages')

    <h1>Editer le compte rendu</h1>

    {{ Form::model($CR, ["url" => $url, "method" => $method]) }}

    <div class="w3-row-padding w3-stretch">
        <div class="w3-half">
            {{ Form::label("title", "Compte rendu") }}
            {{ Form::text("title", null, ["class" => "w3-input", "required" => true]) }}
        </div>

    </div>

    {{ Form::label("content", "Contenu") }}
    {{ Form::textArea("content", null, ["class" => "w3-input", "required" => true]) }}

    {{ Form::submit("Enregistrer", ["class" => "w3-button w3-theme-dark"]) }}

    {{ Form::close() }}

    <form method="post" action={{ $uploadFileUrl }} enctype="multipart/form-data">
        @csrf
        <input type="file" id="files" name="files[]" accept="application/pdf" style="position: relative; top: 0" multiple required>
        <input type="submit" value="Ajouter les pièces jointes">
    </form>
@endsection
