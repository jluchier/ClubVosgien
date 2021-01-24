
@extends('Admin.default')

@section('articles', "navActive")

@section('content')

    @include('Admin.messages')

    <h1>Liste des articles</h1>

    <a href="{{ route("articles.create") }}" class="w3-button w3-theme-dark w3-round">Ajouter</a>

    <h3>Triez les articles en fonction de leur catégorie</h3>

    <div>
        {{Form::open(["route"=>"articles.index", "method"=>'get'])}}
        {{Form::select("category", $categories, $currentCategory, ["class" => "", "required" => true])}}
        {{ Form::submit("Sélectionnez", ["class" => ""]) }}
        {{Form::close()}}
    </div>

    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Précédente</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Suivante</a></li>
      </ul>
    </nav>    

    <table class="w3-table-all w3-margin-top">
        <tr>
            <th>Catégorie</th>
            <th>Titre</th>
            <th>Date de l'événement</th>
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
                <td>
                    {{ $article->dateEvent }}
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
