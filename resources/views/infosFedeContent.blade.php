<div class="CV-flex-container-Column">

<div class="parallax_1"></div>
<div class="w3-row-padding w3-container">
    <div class="w3-card-4 CV-Fond-Carte w3-container w3-section w3-content">
        <p style="text-align:justify">
          Créé en 1872, reconnu d’utilité publique en 1879, le Club Vosgien c’est 126 associations dans le Massif des Vosges pour pratiquer la randonnée, la marche nordique, la marche d’orientation et d’autres activités de pleine nature.
        </p>
    </div>
</div>

<?php $articlesToDispaly = $articlesComite ?>
@include('Includes.infoFedeRubrique')

<div class="parallax_2 w3-display-container">
<h1 class='parallaxTitle w3-display-middle'>Les formations</h1>
</div>

<?php $articlesToDispaly = $articlesFormations ?>
@include('Includes.infoFedeRubrique')

<div class="parallax_3"></div>

<?php $articlesToDispaly = $articlesAdhesions ?>
@include('Includes.infoFedeRubrique')

<div class="parallax_4"></div>

<?php $articlesToDispaly = $articlesPartenaires ?>
@include('Includes.infoFedeRubrique')

</div>
