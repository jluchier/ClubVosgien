@extends('default')

@section('activity', 'navActive')

@section('content')

    {{-- <div class="w3-theme-15 w3-bar-block sidebar">
        <a href="#Rando" class="w3-bar-item w3-button">Randonnées</a>
        <a href="#MarcheOrientation" class="w3-bar-item w3-button">Les sorties VTT</a>
        <a href="#MarcheNordique" class="w3-bar-item w3-button">Marche nordique</a>
        <a href="#Formations" class="w3-bar-item w3-button">Formations</a>
    </div> --}}

<div class="CV-TopContainerHome">
    <img class="CV-TopContainerHome-ImgTop" src="/images/common/large_000_1.jpg" alt="Les vosges">
    {{-- <picture>
        <source media="(min-width:650px)" srcset="/images/common/medium_000.jpg">
        <source media="(min-width:465px)" srcset="/images/common/small_000.jpg">
        <img src="/images/common/large_000.jpg" alt="Les vosges" style="width:auto;">
    </picture> --}}
    <!-- <h2 class="w3-xxxlarge w3-center CV-fontColorRed" style="padding-top:5%" >Bienvenue sur le site du club vosgien RVF</h2> -->
    <img src="/images/common/wave_white.svg " class="CV-TopContainerHome-ImgBottom">
</div>

<div class="tuile-flex-horizontal-HC">
    <div style="flex: 1 0 25% ; margin-left: 3%">
        <p class="CV-titre">Le code du randonneur</p>
        <ul>
            <li>Equipe-toi de bonnes chaussures.</li>
            <li>N’oublie pas vêtements chauds et de pluie.</li>
            <li>Emporte boissons et vivres pour la route.</li>
            <li>Utilise cartes et guides du Club vosgien, boussole, sifflet.</li>
            <li>Pars tôt et pas trop vite.</li>
            <li>De préférence, ne pars jamais seul en montagne.</li>
            <li>Suis les sentiers balisés par le Club vosgien, ne coupe pas les lacets.</li>
            <li>En cas de doute, n’hésite pas à revenir sur tes pas.</li>
            <li>Ne piétine pas les sous-bois, les prés.</li>
            <li>Écoute la nature, ne trouble pas son silence.</li>
            <li>Admire les fleurs et les plantes sauvages, ne les cueille pas.</li>
            <li>Observe les animaux, mais ne les dérange pas.</li>
            <li>Ne fume pas en forêt, n’y allume pas de feu.</li>
            <li>Salue le randonneur que tu rencontres.</li>
            <li>Découvre le passé : sanctuaires, châteaux, petits monuments.</li>
            <li>Remporte tes déchets.</li>
            <li>Un jour de sentier = huit jours de santé. […]</li<>
        </ul>
        <p style="margin-top: 10px; color: green; ">Paul Keller</br>
            Initiateur de la formation des guides de randonnée pédestre (GRP) du Club vosgien
        </p>
    </div>
    <div class="CV-flex-container-Column">
        <div id="Rando">
            <p class="CV-titre">Les randonnées</p>
                <div>
                    <p>Une sortie hebdomadaire, le mercredi après-midi,  8 à 12 km sur le territoire ou environs proches. Départs depuis le parking de l’école au centre de Rupt sur Moselle généralement à partir de 13h30</p>
                    <p>Quelques sorties dominicales de journée, avec repas tiré du sac ou restaurant, 15 à 20km suivant le calendrier établi</p>
                    <p>Une sortie annuelle de 5 à 6 jours en village de vacances, suivant calendrier établi</p>
                    </p>
                </div>
        </div>
        <div id="VTT">
            <p class="CV-titre">Les sorties VTT</p>
                <div>
                    <p>Deux sorties hebdomadaires, le vendredi après-midi et le dimanche matin. Possibilité de participer aux randos VTT du secteur. Information donnée via le site Facebook</p>
                </div>
        </div>
        <div id="VTT-Randos">
            <p class="CV-titre">Les randos VTT</p>
                <div>
                    <p>Mi-juillet, sur le secteur de Rupt Sur Moselle, Vecoux ou Ferdrupt suivant les années, parcours de 15, 30 ou 45 km, avec ravitaillement sur les parcours.</p>
                </div>
        </div>
        <div id="MarcheNordique">
            <p class="CV-titre">Les marches nordiques</p>
                <div>
                    <p>Une sortie tous les 15 jours, les dimanches des semaines paires, sur 2 heures environ</p>
                </div>
        </div>
    </div>
</div>
@endsection
