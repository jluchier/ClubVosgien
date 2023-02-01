<div class="w3-container ">
    <div class="w3-margin w3-padding">
        <table class="w3-table-all">
        </table>
        <tr>
            <th>Fichier(s) pdf</th>
            <th>Gestion</th>
        </tr>

        <tr>
            <td>
                <a href="{{ $CR->title }}">{{ $CR->title }}</a>
            </td>
            <td>
                {{ Form::open(["method" => "delete", "route"=>["compterendus.destroy", $CR->id], "onsubmit" => 'return confirm("Voulez-vous vraiment supprimer ce pdf ?")']) }}
                {{ Form::submit("Supprimer", ["class" => "w3-button w3-red w3-round"])}}
                {{ Form::close() }}
            </td>
        </tr>
        </table>
    </div>