@extends('default')

@section('infosFede', 'navActive')

@section('content')

{{-- <div class="CV-TopContainerHome">
    <img class="CV-TopContainerHome-ImgTop" src="/images/common/large_004_1.jpg" alt="Les vosges">
    {{-- <picture>
        <source media="(min-width:650px)" srcset="/images/common/medium_000.jpg">
        <source media="(min-width:465px)" srcset="/images/common/small_000.jpg">
        <img src="/images/common/large_000.jpg" alt="Les vosges" style="width:auto;">
    </picture> --}}
    {{-- <img src="/images/common/wave_white.svg " class="CV-TopContainerHome-ImgBottom"> --}}
{{-- </div> --}}




<div class="CV-flex-container-Column">

    <div class="parallax_1"></div>

    <div class="w3-card-4 CV-Fond-Carte CV-flex-container-column-div2">
        <p style="text-align: justify">Créé en 1872, reconnu d’utilité publique en 1879, le Club Vosgien c’est 126 associations dans le Massif des Vosges pour pratiquer la randonnée, la marche nordique, la marche d’orientation et d’autres activités de pleine nature.</p>
    </div>

    <div class="CV-flex-Horizontal">

        <div class="CV-Fond-Carte w3-card-4" style="padding: 20px">
            <p class="CV-titre">Le comité</p>
            <p>
                Faire apparaitre les noms des membres du comité et le bureau avec la fonction de chacun.
            </p>
            <p>
                Pour les photos, on verra avec ceux qui veulent ou pas
            </p>
        </div>
        <div><img src="/images/common/large_000_1.jpg" style="max-width: 90%" alt="Les vosges"></div>
    </div>

    <div class="parallax_2"></div>

    {{-- <div class="w3-card-4 CV-Fond-Carte CV-flex-container-column-div2">
        <p style="text-align: justify">Créé en 1872, reconnu d’utilité publique en 1879, le Club Vosgien c’est 126 associations dans le Massif des Vosges pour pratiquer la randonnée, la marche nordique, la marche d’orientation et d’autres activités de pleine nature.</p>
        </div> --}}

        <div class="CV-flex-Horizontal-right">

            <div style="margin-left: 20px "><img src="/images/common/large_000_1.jpg" style="max-width: 90%" alt="Les vosges"></div>
            <div class="CV-Fond-Carte w3-card-4" style="padding: 20px">
                <p class="CV-titre">Les formations</p>
                <p>
                    Etre membre d’une association Club Vosgien, c’est aussi avoir la possibilité de s’impliquer dans la vie de l’association. Ceux qui le souhaitent peuvent se former dans plusieurs domaines et devenir baliseur sur les sentiers ou encore guide de randonnée pédestre.</br>N’hésitez pas à vous renseigner auprès de nous.
                </p>
            </div>


        </div>

        <div class="parallax_3"></div>

        <div class="CV-flex-Horizontal">

            <div class="CV-Fond-Carte w3-card-4" style="padding: 20px">
                <p class="CV-titre">Les adhésions</p>
                <p>
                    Faire apparaitre les noms des membres du comité et le bureau avec la fonction de chacun.
                </p>
                <p>
                    Pour les photos, on verra avec ceux qui veulent ou pas
                </p>
            </div>
            <div><img src="/images/common/large_000_1.jpg" style="max-width: 90%" alt="Les vosges"></div>
        </div>

        <div class="parallax_4"></div>


        {{-- <div class="w3-card-4 CV-Fond-Carte CV-flex-container-column-div2">
            <p style="text-align: justify">Créé en 1872, reconnu d’utilité publique en 1879, le Club Vosgien c’est 126 associations dans le Massif des Vosges pour pratiquer la randonnée, la marche nordique, la marche d’orientation et d’autres activités de pleine nature.</p>
            </div> --}}

            <div class="CV-flex-Horizontal-right">

                {{-- <div style="margin-left: 20px"><img src="/images/common/large_000_1.jpg" style="max-width: 90%" alt="Les vosges"></div> --}}
                <div class="CV-row">
                    <div class="CV-column">
                        <img src="/images/common/Azureva.png" style="width:100%" alt="AZUREVA">
                    </div>

                </div>
                <div class="CV-Fond-Carte w3-card-4" style="padding: 20px">
                    <p class="CV-titre">Les partenaires et avantages</p>
                    <p>
                        La Fédération du Club Vosgien :  https://www.club-vosgien.eu/
                        La Fédération Française des Sports Populaires (FFSP) :  https://www.ffsp.fr/
                        Carte IGN :  https://ignrando.fr/
                    </p>
                </div>


            </div>

            <div class="parallax_5">
                <a href="https://www.club-vosgien.eu/" >La Fédération du Club Vosgien</a>
            </div>


</div>
@endsection
