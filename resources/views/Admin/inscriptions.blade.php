@extends('Admin.default')

@section('inscriptions', "navActive")

@section('content')
    @foreach($users as $user)
    @endforeach
    <div class="w3-container">
        <h3>Liste des demandes de validation d'inscription, des inscrits et des administrateurs</h3>
        <div class="w3-dropdown-hover">
            <button class="w3-button w3-theme-dark">Choisir ici <i class="fas fa-chevron-circle-down w3-large"></i></button>
            <div class="w3-dropdown-content w3-bar-block w3-border-green">
                <a href="{{ route("inscriptions", ["privilege" => "A valider"]) }}" class="w3-bar-item w3-button">A valider</a>
                <a href="{{ route("inscriptions", ["privilege" => "Admin"]) }}" class="w3-bar-item w3-button">Admin</a>
                <a href="{{ route("inscriptions", ["privilege" => "Inscrit"]) }}" class="w3-bar-item w3-button">Inscrit</a>
            </div>
        </div>
        <table class="w3-table-all w3-margin-top">
            <tr>
                <th>Nom</th>
                <th>Email / login</th>
                <th>Privilège</th>
            </tr>
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
        </table>
    </div>

@endsection
