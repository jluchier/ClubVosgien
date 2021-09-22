@extends('default')

@section('activity', 'navActive')

@section('content')

    {{-- <div class="w3-theme-15 w3-bar-block sidebar">
        <a href="#Rando" class="w3-bar-item w3-button">Randonnées</a>
        <a href="#MarcheOrientation" class="w3-bar-item w3-button">Les sorties VTT</a>
        <a href="#MarcheNordique" class="w3-bar-item w3-button">Marche nordique</a>
        <a href="#Formations" class="w3-bar-item w3-button">Formations</a>
    </div> --}}

<div class="CV-TopContainerHome CV-Bg2">
    <img src="/images/common/wave_white.svg">
</div>

<div class="w3-row-padding">
    <div class="w3-col m12 l6">
      <div class="w3-card-4 CV-Fond-Carte CV-cadreCard">
        <h1>Le code du randonneur</h1>
        <ul class="CV-ul-shoes">
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
        <p style=" color: green; margin-top: 20px">Paul Keller</p>
        <p style=" color: green; text-align: left">Initiateur de la formation des guides de randonnée pédestre (GRP) du Club vosgien</p>
      </div>
    </div>
    <div class="w3-col m12 l6">
        <div id="Rando" class="w3-card-4 CV-Fond-Carte CV-cadreCard">
            <h1>Les randonnées</h1>
                <div>
                    <ul class="CV-ul-shoes">
                        <li>Une sortie hebdomadaire, le mercredi après-midi,  8 à 12 km sur le territoire ou environs proches. Départs depuis le parking de l’école au centre de Rupt sur Moselle généralement à partir de 13h30</li>
                        <li>Quelques sorties dominicales de journée, avec repas tiré du sac ou restaurant, 15 à 20km suivant le calendrier établi</li>
                        <li>Une sortie annuelle de 5 à 6 jours en village de vacances, suivant calendrier établi</li>
                        <li>Marche populaire : mi-juin, sur le secteur de Rupt Sur Moselle, Vecoux ou Ferdrupt suivant les années, marches de 5, 10 ou 20 km, accessible à tous, avec possibilité de ravitaillement sur les parcours.</li>
                        <li>Sortie raquettes : de janvier à mars, en fonction de l’enneigement, randonnée sur la journée, 10 à 15 km, avec repas en ferme auberge</li>
                        <li>Rencontres inter-clubs : participation à des sorties organisées par d’autres Club Vosgien</li>

                </div>
        </div>
        <div id="VTT" class="w3-card-4 CV-Fond-Carte CV-cadreCard">
            <h1>Les sorties VTT</h1>
                <div>
                    <ul class="CV-ul-vtt">
                        <li>Deux sorties hebdomadaires, le vendredi après-midi et le dimanche matin. Possibilité de participer aux randos VTT du secteur. Retrouvez nous sur <a href="https://www.facebook.com/federationclubvosgien/"><i class="fab fa-2x w3-hover-opacity fa-facebook"></i></a>.</li>
                        <li>Rando VTT : mi-juillet, sur le secteur de Rupt Sur Moselle, Vecoux ou Ferdrupt suivant les années, parcours de 15, 30 ou 45 km, avec ravitaillement sur les parcours.</li>
                    </ul>
                </div>
        </div>

        <div id="MarcheNordique" class="w3-card-4 CV-Fond-Carte CV-cadreCard">
            <h1>Les marches nordiques</h1>
                <div>
                    <ul class="CV-ul-shoes">
                        <li>Une sortie tous les 15 jours, les dimanches des semaines paires, sur 2 heures environ</li>
                    </ul>
                </div>
        </div>
    </div>
</div>
@endsection
