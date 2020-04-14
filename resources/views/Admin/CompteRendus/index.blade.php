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

    <h1>Liste des compte rendus</h1>

    <a href="{{ route("CompteRendus.create") }}" class="w3-button w3-theme-dark w3-round">Ajouter</a>
    <table class="w3-table-all w3-margin-top">
        <tr>
            <th>Titre</th>
            <th>Contenu</th>
            <th class="w3-right">Administration</th>
        </tr>
        @foreach($compteRendus as $CR)
            <tr>
                <td>
                    {{ $CR->title }}
                </td>
                <td>
                    {{ $CR->content }}
                </td>
                <td class="w3-right">
                    <div class="w3-bar">
                        <a href="{{ route("compteRendus.edit", $CR->id) }}" class="w3-button w3-white">Modifer</a>

                        {{ Form::open(["route" => ["compteRendus.destroy", $CR->id], "method" => "delete", "style" => "display: inline-block"]) }}
                        {{ Form::submit("Supprimer", ["class" => "w3-button w3-red"]) }}
                        {{ Form::close() }}
                    </div>
                </td>
            </tr>
        @endforeach

    </table>
@endsection

