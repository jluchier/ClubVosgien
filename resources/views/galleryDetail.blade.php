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

<body style="background-color: rgba(219, 226, 208, 0.61)">
    <div class="CV-global">
        <div style="flex-basis: 20%" >
            <div style="margin-top: 50px" >
                <p>
                    <a href="{{ route("gallery") }}"><i class="fas fa-home"></i></a>
                </p>
                <p>Retour galerie</p>
            </div>
        </div>
        <div style="flex-basis : 70% ; flex-direction:column ; display:flex ; margin-top: 50px  " >
            <div class="w3-card w3-padding w3-theme-light" >
                <p class="w3-large">{{ $gallery->title }}</p>
                <p class="w3-left-align">{{ $gallery->description }}</p>
                @if ($gallery->display_date)
                  <p class="w3-right-align">{{ $gallery->dateSortie }}</p>
                @endif
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
