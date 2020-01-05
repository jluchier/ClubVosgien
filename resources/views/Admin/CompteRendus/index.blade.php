@extends('Admin.default')

@section('compteRendus', "navActive")

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

    <h1>Editer</h1>

    {{ Form::model($conteRendu, ["url" => $url, "method" => $method, "files" => true]) }}

    <div class="w3-row-padding w3-stretch">

            {{ Form::label("title", "Titre") }}
            {{ Form::text("title", null, ["class" => "w3-input", "required" => true]) }}


    </div>

    {{ Form::label("content", "Contenu") }}
    {{ Form::textArea("content", null, ["class" => "w3-input", "required" => true]) }}

    {{ Form::submit("Enregistrer", ["class" => "w3-button w3-theme-dark"]) }}

    {{ Form::close() }}
@endsection

