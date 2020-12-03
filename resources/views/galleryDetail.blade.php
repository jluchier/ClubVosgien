<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body style="background-color: #90ad699a">
    <div class="CV-global">
        <div style="flex-basis: 40%" >
            <div style="margin-top: 50px" >
                <p>
                    <a href="{{ route("gallery") }}"><img src="/images/common/iconfinder_menu-alt_134216.png" alt="Retour galerie"></a>
                </p>
                {{-- <p>Notre fierté, ce sont nos sentiers... Leur balisage, c'est notre image
                </p> --}}
                {{-- <p>Notre devise : 1 jour de sentiers, 8 jours de santé</p> --}}
            </div>
        </div>
        <div style="flex-basis : 45% ; flex-direction:column ; display:flex ; margin-top: 50px  " >
            <div class="w3-card w3-padding w3-theme-light" >
                <p class="w3-large">{{ $gallery->title }}</p>
                <div>{{ $gallery->description }}</br>
                    Sortie du {{ $gallery->dateSortie }}
                </div>
            </div>
        </div>
    </div>
    <div class="CV-flex-gallery-row">
        @foreach ($allColumn as $column)
            <div class="CV-flex-gallery-column">
                @foreach ($column as $image)
                    <div class="w3-card-4 CV-Fond-Carte">
                        <a href="{{ Storage::url('gallery/' . $gallery->title . '/large/' . $image) }}" target="_blank">
                            <img src="{{ Storage::url('gallery/' . $gallery->title . '/small/' . $image) }}" alt="Pas d'image" style="padding: 10px" >
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</body>

</html>
