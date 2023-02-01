@extends('Admin.default')

@section('compterendus', "navActive")

@section('content')
@include('Admin.messages')


<h1>Liste des compte rendus</h1>
<a href="{{ route('compterendus.create') }}" class="w3-button w3-theme-dark w3-round">Ajouter</a>

<table class="w3-table-all w3-margin-top">
    <tr>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Fichier(s) pdf</th>
        <th class="w3-right">Administration</th>
    </tr>
    @foreach($compterendus as $CR)
    <tr>
        <td>
            {{ $CR->title }}
        </td>
        <td>
            {{ $CR->content }}
        </td>
        <td>
            <p>{{ $CR->path}}</p>
        </td>
        <td class="w3-right">
            <div class="w3-bar">
                <a href="{{ route("compterendus.edit", $CR) }}" class="w3-button w3-white">Modifer</a>

                {{ Form::open(["route" => ["compterendus.destroy", $CR->id], "method" => "delete", "style" => "display: inline-block","onsubmit" => 'return confirm("Voulez-vous vraiment supprimer ce compte rendu ?")']) }}
                {{ Form::submit("Supprimer", ["class" => "w3-button w3-red"]) }}
                {{ Form::close() }}
            </div>
        </td>
    </tr>
    @endforeach

</table>
@endsection