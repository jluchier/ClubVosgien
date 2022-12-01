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

    <!-- {{ Form::file('compterendus')}} -->
    <label for="compterendus">Selectionnez les pdf</label>
    <input type="file" id="compterendus" name="compterendus" accept="application/pdf" style="position: relative; top: 0">
    @error('compterendus')
    <div class="alert">{{ $message }}</div>
    @enderror
</div>
<p style="text-align: center;">
    {{ Form::submit("Enregistrer", ["class" => "w3-button w3-theme-dark w3-round"]) }}
    {{ Form::close() }}
</p>

<div class="w3-container ">
    <div class="w3-margin w3-padding">
        <table class="w3-table-all">
            <tr>
                <th>Fichier(s) pdf</th>
                <th>Gestion</th>
            </tr>
            @foreach ($CR->attachables()->get() as $attachment)
            <tr>
                <td>
                    <a href="{{ Storage::url("CompteRendusFile/".$attachment->name) }}">{{ $attachment->name }}</a>
                </td>
                <td>
                    {{ Form::open(["method" => "delete", "route"=>["deleteAttachable", $attachment->id], "onsubmit" => 'return confirm("Voulez-vous vraiment supprimer ce pdf ?")']) }}
                    {{ Form::submit("Supprimer", ["class" => "w3-button w3-red w3-round"])}}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </table>
    </div>


</div>


@endsection