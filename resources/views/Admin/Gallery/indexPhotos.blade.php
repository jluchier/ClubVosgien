@extends('Admin.default')

@section('photos', "navActive")

@section('content')

    <h1>Liste des galeries de photos</h1>

    <a href="{{ route("galleries.create") }}" class="w3-button w3-theme-dark w3-round">Ajouter</a>

    <table class="w3-table-all w3-margin-top">
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Galerie</th>
            <th class="w3-right">Administration</th>
        </tr>
        @foreach($galleries as $gallery)
            <tr>
                <td>
                    {{$gallery->title}}
                </td>
                <td>
                    {{$gallery->description }}
                </td>
                <td>
                    @if($gallery->thumbs > 0)
                        {{ $gallery->thumbs }} image(s)
                    @else
                        Aucune image
                    @endif
                </td>
                <td class="w3-right">
                    <div class="w3-bar">
                        <a href="{{ route("galleries.edit",$gallery->id) }}" class="w3-button w3-white">Modifer</a>

                        {{ Form::open(["route" => ["galleries.destroy",$gallery->id], "method" => "delete", "style" => "display: inline-block"]) }}
                        {{ Form::submit("Supprimer", ["class" => "w3-button w3-red"]) }}
                        {{ Form::close() }}
                    </div>
                </td>
            </tr>
        @endforeach

    </table>
@endsection
