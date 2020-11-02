@extends('Admin.default')

@section('photos', "navActive")

@section('content')
    @include('Admin.messages')

    <h1>Editer</h1>

<div id="vuejs">
        
        {{-- <image-upload :route="'{{ route('uploadImage') }}'"></image-upload> --}}
        <image-upload :route="'store'">
            <template v-slot:top>
                {{ Form::model($gallery, ["url" => $url, "method" => $method, "files" => true]) }}

    <div class="w3-row-padding w3-stretch">
        <div class="w3-half">
            {{ Form::label("title", "Titre") }}
            {{ Form::text("title", null, ["class" => "w3-input", "required" => true]) }}
            {{ Form::label("dateSortie", "Date de la sortie") }}
            {{ Form::date("dateSortie", null, ["class" => "w3-input"]) }}
        </div>
        <div class="w3-half">

            <h3>Ajouter des images</h3>
            </template>


<template v-slot:bottom>
<p>Est-ce une galerie privée ? Elle ne sera visible que par les membres inscrits.</p>
            {{ Form::label('private','Gallerie privée ? ') }}
            {{ Form::checkbox("private", 1, null, ["class" => "w3-check"]) }}
        </div>
    </div>

    {{ Form::label("description", "Description") }}
    {{ Form::textArea("description", null, ["class" => "w3-input", "required" => true]) }}

    {{ Form::close() }}
            </template>


        </image-upload>
    </div>

            
@endsection
