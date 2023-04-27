<?php
session_start();
?>
<!DOCTYPE html>

<html lang="fr">
<head>
  <?php  include("../Page_PHP_Structure/header.php");?>
</head>
<body>
<?php  include("../Page_PHP_Structure/aside.php");?>

<div class="Main_grid">
        <!--Début du main-->
        <main>
          <div class="container-questions">
            <!--Début des question-->
            <div class="item1">
              <!--Premiere question-->
              <h3>Le Soleil dans le système solaire</h3>
              <p>
                Le Soleil est
                <span class="important">une étoile ordinaire</span> de type G2
                parmi les quelques centaines de milliards d'étoiles que compte
                la Voie Lactée, notre Galaxie.
              </p>
            </div>
            <div class="item2">
              <!--Deuxieme question-->
              <ul>
                <li>
                  Quelle est la distance entre le Soleil et la Terre ?
                  <br ><br >
                  Notre planète terre se situe très loin du Soleil, elle est à
                  150 millions de kilomètres, et plus précisement à
                  <span class="important">149 597 870,7 km.</span>
                </li>
              </ul>
            </div>
            <div class="item3">
              <!--Troisieme question-->
              <ul>
                <li>
                  Les caractéristiques de notre Soleil :<br ><br >
                  Le soleil est une étoile fascinante, c'est l'étoile autour
                  de laquelle tournent
                  <span class="important">8 planètes et 5 planètes naines</span
                  >.<br >
                  Cette astre est très important pour l'homme, grâce à sa
                  quantité d'énergie, il a permis la vie et la photosynthèse.
                  <br >
                  En plus d'être l'étoile centrale de notre système planétaire, 
                  c'est aussi le plus gros objet de notre système solaire.<br >
                  Il contient plus de <span class="important">99,8%</span> de la
                  masse totale du Système Solaire.
                  <br >
                  <br >
                  C'est une véritable boule d'énergie, il a une température
                  comprise entre
                  <span class="important">5800 et 15 000 °C</span>. Il dégage
                  386 millions de mégawatts.
                </li>
              </ul>
            </div>
            <div class="item4">
              <!--Quatrieme question-->
              <ul>
                <li>
                  Quelle est la taille et la masse du Soleil ? <br ><br >
                  Au vu de ses caractéristiques, le Soleil à un rayon de
                  <span class="important">696 340 km, </span> ce qui lui donne une
                  masse de
                  <span class="important">1,98892 x 10<sup>30</sup> kg.</span>
                </li>
              </ul>
            </div>
            <div class="item5">
              <!--Cinquieme question-->
              <ul>
                <li>
                  Le Soleil est-il rocheux ou gazeux ? <br ><br >
                  Comme toutes les étoiles, le Soleil est composé de différents éléments.
                  <br >
                  Le soleil est un astre gazeux.
                </li>
              </ul>
            </div>
            <div class="item6">
              <!--Sixieme question-->
              <ul>
                <li>
                  À quoi ressemble la surface du Soleil ? <br ><br >
                  Le Soleil est très facile à différencier. Comme le disait
                  Anaxagore De Clazomènes, c'est une boule de feu ! Il possède
                  néanmoins une structure plutôt complexe que l'on peut
                  différencier en plusieurs zones.
                </li>
              </ul>
            </div>
          </div>
          <!--Fin des questions-->
        </main>
      </div>

<div class="Footer_grid">
        <!--Début du Footer appliqué a chaque page grâce a une class-->
        <footer>
        <?php  include("../Page_PHP_Structure/footer.php");?>
        </footer>
      </div>
      <!--Fin du Footer-->
    </div>
  </body>
</html>
