
@extends('Admin.default')

@section('articles', "navActive")

@section('content')

    @include('Admin.messages')

    <h1>Liste des articles</h1>

    <a href="{{ route("articles.create") }}" class="w3-button w3-theme-dark w3-round">Ajouter</a>

    <table class="w3-table-all w3-margin-top">
        <tr>
            <th>Catégorie</th>
            <th>Titre</th>
            <th>Image</th>
            <th class="w3-right">Administration</th>
        </tr>
        @foreach($articles as $article)
            <tr>
                <td>
                    {{ $article->category->name }}
                </td>
                <td>
                    {{ $article->title }}
                </td>
                <td><img src="{{ Storage::url('images/thumb/' . $article->image)}}" alt="Pas d'image"></td>
                <td class="w3-right">
                    <div class="w3-bar">
                        <a href="{{ route("articles.edit", $article->id) }}" class="w3-button w3-white">Modifer</a>

                        {{ Form::open(["route" => ["articles.destroy", $article->id], "method" => "delete", "style" => "display: inline-block"]) }}
                        {{ Form::submit("Supprimer", ["class" => "w3-button w3-red"]) }}
                        {{ Form::close() }}
                    </div>
                </td>
            </tr>
        @endforeach

    </table>
@endsection
