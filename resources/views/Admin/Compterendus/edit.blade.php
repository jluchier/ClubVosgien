@extends('Admin.default')

@section('compterendus', "navActive")

@section('content')
@include('Admin.messages')

<h1>Editer le compte rendu</h1>
{{ Form::model($CR, ["url" => $url, "method" => $method, "files" => true]) }}
<div class="w3-container w3-center">

    <div class="w3-third">
        <div class="w3-margin w3-padding">
            <p style="text-align:center">
                {{ Form::label("title", "Intitulé du compte rendu") }}
            </p>
            <p>
                {{ Form::text("title", null, ["class" => "w3-input", "required" => true]) }}
            </p>
        </div>
    </div>
    <div class="w3-half ">
        <div class="w3-margin w3-padding">
            <p style="text-align: center;">
                {{ Form::label("content", "Résumé de la réunion") }}
            </p>
            <p>
                {{ Form::textArea("content", null, ["class" => "w3-input", "required" => true]) }}
            </p>

        </div>

    </div>
</div>
<div class="w3-margin w3-padding">
    {{ Form::label("compterendus", "Sélectionnez les pdf") }}
    {{-- Form::file("compterendus", ["class" => "w3-input"]) --}}
    <label for="compterendus">Selectionnez les pdf</label>
    <input type="file" id="compterendus" name="compterendus" accept="application/pdf" style="position: relative; top: 0">
    @isset($CR->path)
    <a href="{{ route("displayPdf",$CR->id) }}">{{$CR->path}}</a>
    @endisset
    @error('compterendus')
    <div class="alert">{{ $message }}
    </div>
    @enderror
</div>
<p style="text-align: center;">
    {{ Form::submit("Enregistrer", ["class" => "w3-button w3-theme-dark w3-round"]) }}
    {{ Form::close() }}
</p>

</div>


@endsection