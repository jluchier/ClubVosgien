@extends('Admin.default')

@section('compterendus', "navActive")

@section('content')
    @include('Admin.messages')

    <h1>Editer le compte rendu</h1>

    {{ Form::model($CR, ["url" => $url, "method" => $method, "files" => true]) }}

    <div class="w3-row-padding w3-stretch">
        <div class="w3-half">
            {{ Form::label("title", "Compte rendu") }}
            {{ Form::text("title", null, ["class" => "w3-input", "required" => true]) }}
        </div>

    </div>

    {{ Form::label("content", "Contenu") }}
    {{ Form::textArea("content", null, ["class" => "w3-input", "required" => true]) }}
    {{ Form::submit("Enregistrer", ["class" => "w3-button w3-theme-dark"]) }}
    <input type="file" id="files" name="files[]" accept="application/pdf" style="position: relative; top: 0" multiple>

    {{ Form::close() }}

    <div>
            @foreach ($CR->attachables()->get() as $attachment)
            {{ Form::open(["method" => "delete", "route"=>["deleteAttachable", $attachment->id], "onsubmit" => 'return confirm("Voulez-vous vraiment supprimer ce pdf ?")']) }}
            <a href="{{ Storage::url("CompteRendusFile/".$attachment->name) }}">{{ $attachment->name }}</a>
            {{ Form::submit("Supprimer", ["class" => "w3-button w3-red"])}}
             {{ Form::close() }} 
            @endforeach
        </div>


@endsection
