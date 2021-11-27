  <div class="w3-half w3-center">
    <img style="max-width: 70% ;margin-bottom: 20px" src="images/sentiers/RUPT_Charmotte.gif" alt="Le chalet de la Vrille">
    <div id="leaflet">
      <l-map style="height: 400px" :zoom="13" :center="[47.92768, 6.66096]" >
        <l-tile-layer
        :url="'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'">
        <!-- :attribution="'&copy <a href='"\."'http://osm.org/copyright'"\."'>OSM</a>contributors'" -->

        </l-tile-layer>
        <l-marker :lat-lng="[47.92768, 6.66096]"></l-marker>
        <l-gpx :gpx-file="'images/sentiers/gpx_Files/new.gpx'" :gpx-options="{marker_options: {
          startIconUrl: 'images/sentiers/marker-icon-start.png',
          endIconUrl: 'images/sentiers/marker-icon-stop.png',
          shadowUrl: 'images/sentiers/marker-icon-shadow.png'
        }}" />
      </l-map>
    </div>

  </div>
  <div class="w3-half CV-Fond-Carte w3-card-4 sentierTexte">
    <div class="w3-theme-dark w3-center w3-padding w3-margin">
      <h2>Rupt sur Moselle</h2>
    </div>
    <h1>Circuit des chalets</h1>
    <div class="summary">
      <ul>
        <li>
          Départ : Place Albert Montémont
        </li>
        <li>
          Balisage : <img class="zoom" src="images/common/Balisage_Anneau_Vert.png">
        </li>
        <li>
          Distance : 14,7 km
        </li>
        <li>
          Dénivelé : 636 m
        </li>
        <li>
          Temps : 4h15
        </li>
      </ul>
    </div>
    <p>
      Partir par la rue Napoléon Forel, au rond-point de la Croix, continuer à droite par la rue Louis Wittmann.
    </p>
    <p>
      Après 100 m s’engager à gauche sur un petit sentier entre transformateur et habitation, suivre ce sentier qui passe entre propriétés et lisière de forêt, traverser une pâture (le passage est autorisé en fermant les barrières), et après être passé à proximité de quelques maisons, vous arrivez sur une route.
    </p>
    <p> Partir à droite sur 20 m puis à gauche, vous êtes sortis du village, suivre le balisage <img class="zoom" src="images/common/Balisage_Anneau_Vert.png"> qui, à travers prairies et forêts vous fera découvrir successivement le Chalet de la Charmotte, le site de la Roche Jaugeon, le Chalet des Haneaux, le Chalet de la Vrille (l’un des plus tranquilles du secteur, car son accès est seulement piétonnier).
    </p>
    <p>
      Après avoir rejoint la fin d’une route goudronnée, se diriger vers le Chalet des Fraiteux qui nécessite un détour de 100 m pour y accéder, revenir sur ses pas et continuer la descente en suivant toujours le même balisage pour revenir au point de départ.
    </p>
  </div>
