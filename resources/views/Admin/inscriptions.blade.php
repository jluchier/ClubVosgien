@extends('Admin.default')

@section('inscriptions', "navActive")

@section('content')

<!-- <script>
$(document).ready(function(){
  $("#Privilege").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#listeMembres tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script> -->

<div class="w3-container">
    <h3>Etat des inscriptions : liste des membres inscrits et de leur privilège</h3>

    <p>Affichez les membres en fonction de leur privilège :</p> 

{{Form::open(["route"=>"inscriptions", "method"=>'get'])}}
{{Form::select("privilege", ['A valider'=>'A valider', 'Banni', 'Inscrit', 'Admin'], null, ["class" => "w3-input", "required" => true])}}
        {{ Form::submit("Enregistrer", ["class" => "w3-button w3-theme-dark"]) }}
{{Form::close()}}



<!-- <input id="Privilege" type="text" placeholder="Privilège..."> -->
<br><br>
<!--     <div class="w3-dropdown-hover">
        <button class="w3-button w3-theme-dark">Choisir ici <i class="fas fa-chevron-circle-down w3-large"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-border-green">            
            <a href="{{ route("inscriptions", ["privilege" => "A valider"]) }}" class="w3-bar-item w3-button">A valider</a>                
            <a href="{{ route("inscriptions", ["privilege" => "Inscrit"]) }}" class="w3-bar-item w3-button">Inscrit</a>
            <a href="{{ route("inscriptions", ["privilege" => "Admin"]) }}" class="w3-bar-item w3-button">Admin</a>
        </div>
    </div> -->



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
        {{ Form::select("privilege", ['A valider', 'Banni', 'Inscrit', 'Admin'], null, ["class" => "w3-input", "required" => true]) }}
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
