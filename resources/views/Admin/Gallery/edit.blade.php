@extends('Admin.default')

@section('photos', "navActive")

@section('content')
@include('Admin.messages')

<h1>Editer</h1>

@foreach($thumbs as $thumb)
    <img src="{{ Storage::url($thumb)}}" alt="Pas d'image">
@endforeach

<div id="vuejs">

    <image-upload :route="'{{ $url }}'" :method="'{{ $method }}'" :upload-route="'{{ route("imageUpload") }}'"
                  :user-id="{{ Auth::id() }}" :redirect-route="'{{ route("galleries.index") }}'">

        <div class="w3-row-padding w3-stretch">
            <div class="w3-half">
                {{ Form::label("title", "Titre") }}
                {{ Form::text("title", $gallery->title, ["class" => "w3-input", "required" => true]) }}
            </div>
            <div class="w3-half">
                {{ Form::label("dateSortie", "Date de la sortie") }}
                {{ Form::date("dateSortie", $gallery->dateSortie, ["class" => "w3-input", "required" => true]) }}
                {{ Form::label('private','Gallerie privée ? ') }}
                {{ Form::checkbox("private", 1, null, ["class" => "w3-check", "checked" => $gallery->private === 0 ? false : true]) }}
            </div>
        </div>

        {{ Form::label("description", "Description") }}
        {{ Form::textArea("description", $gallery->description, ["class" => "w3-input", "required" => true]) }}
    </image-upload>
</div>


@endsection
