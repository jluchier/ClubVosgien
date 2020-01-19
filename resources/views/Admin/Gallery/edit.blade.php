@extends('Admin.default')

@section('photos', "navActive")

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

    {{ Form::model($gallery, ["url" => $url, "method" => $method, "files" => true]) }}

    <div class="w3-row-padding w3-stretch">
        <div class="w3-half">
            {{ Form::label("title", "Titre") }}
            {{ Form::text("title", null, ["class" => "w3-input", "required" => true]) }}
        </div>
        <div class="w3-half">
            <p>Sélectionnez un ou plusieurs fichiers</p>

            {{--TODO pouvoir charger plusieurs photos--}}

            {{ Form::file("folder", ["class" => "w3-input",'multiple'=>'true'])}}
            <p>Est-ce une galerie privée ? Elle ne sera visible que par les membres inscrits.</p>
            {{ Form::label('private','Gallerie privée ? ') }}
            {{ Form::checkbox("private", 1, null, ["class" => "w3-check"]) }}
        </div>
    </div>

    {{ Form::label("content", "Description") }}
    {{ Form::textArea("content", null, ["class" => "w3-input", "required" => true]) }}

    {{ Form::submit("Enregistrer", ["class" => "w3-button w3-theme-dark"]) }}

    {{ Form::close() }}
@endsection
