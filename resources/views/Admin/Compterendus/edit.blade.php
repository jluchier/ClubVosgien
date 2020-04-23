@extends('Admin.default')

@section('compterendus', "navActive")

@section('content')
    @include('Admin.messages')

    @if ($errors->any())
        <div class="w3-pale-red w3-panel w3-leftbar w3-border-red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
@endsection
