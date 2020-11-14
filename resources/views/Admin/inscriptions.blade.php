@extends('Admin.default')

@section('inscriptions', "navActive")

@section('content')

<div class="w3-container">
    <h3>Etat des inscriptions : liste des membres inscrits et de leur privilège</h3>

    <p>Affichez les membres en fonction de leur privilège :</p> 

    <div>
        {{Form::open(["route"=>"inscriptions", "method"=>'get'])}}
        {{Form::select("privilege", ['Tous' => 'Tous', 'A valider'=>'A valider', 'Banni' => 'Banni', 'Inscrit' => 'Inscrit', 'Admin' => 'Admin'], null, ["class" => "", "required" => true])}}
        {{ Form::submit("Sélectionnez", ["class" => ""]) }}
        {{Form::close()}}
    </div>

    <table class="w3-table-all w3-margin-top">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email / login</th>
                <th>Privilège</th>
                <th class="w3-right">Administration</th>
            </tr>
        </thead>
        <tbody id="listeMembres">
            @foreach($users as $user)
            @if ($user->privilege)
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
                <td class="w3-right">
                    {{ Form::model($user, ["url" => $url, "method" => $method]) }}
                    {{ Form::label("privilege", "Privilège") }}
                    {{ Form::hidden("user", $user->id)}}
                    {{ Form::select("privilege", ['A valider'=>'A valider', 'Banni' => 'Banni', 'Inscrit' => 'Inscrit', 'Admin' => 'Admin'], null, ["class" => "w3-input", "required" => true]) }}
                    {{ Form::submit("Enregistrer", ["class" => "w3-button w3-theme-dark"]) }}
                    {{ Form::close() }}

                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>


@endsection
