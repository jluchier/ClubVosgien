@extends('Admin.default')

@section('inscriptions', "navActive")

@section('content')

    <h1>Liste des inscrits</h1>

    <a href="{{ route("inscriptions", ["privilege" => "Admin"]) }}">Admin</a>
    <a href="{{ route("inscriptions", ["privilege" => "Inscrit"]) }}">Inscrit</a>
    <a href="{{ route("inscriptions", ["privilege" => "A valider"]) }}">A valider</a>

    <table class="w3-table-all w3-margin-top">
        <tr>
            <th>Nom</th>
            <th>Email / login</th>
            <th>Privilège</th>
            <th class="w3-right">Administration</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>
                    {{ $user->name}}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    {{ $user->privilege }}
                </td>
            </tr>
        @endforeach
    </table>

@endsection
