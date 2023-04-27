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
            <!--Début des questions-->
            <div class="item1">
              <!--Premiere question-->
              <h3>La planète Mars dans le système solaire</h3>
              <p>
                Mars est <span class="important">la quatrième planète</span> du
                Système solaire par ordre d'éloignement au Soleil.
              </p>
            </div>
            <div class="item2">
              <!--Deuxieme question-->
              <ul>
                <li>
                  Quelle est la distance de Mars au Soleil ? <br ><br >
                  La distance entre Mars et le Soleil d'environ
                  <span class="important">227 millions de kilométres.</span>
                </li>
              </ul>
            </div>
            <div class="item3">
              <!--Troisieme question-->
              <ul>
                <li>
                  Quelle est la durée du voyage pour aller sur Mercure ?
                  <br ><br >
                  La durée du voyage entre les deux planètes dépend de leur
                  position sur leur orbite respective. La durée du voyage est
                  généralement estimée à
                  <span class="important">260 jours (plus de 8 mois)</span>, au
                  moment où Mars effectue son passage le plus proche de la
                  Terre.
                </li>
              </ul>
            </div>
            <div class="item4">
              <!--Quatrieme question-->
              <ul>
                <li>
                  Les caractéristiques de Mars :<br ><br >
                  Mars est un désert de poussière et de cailloux, de roches très
                  riches en fer. En fer rouillé d'ailleurs, d'où la couleur
                  rouge orangée de sa surface. Le sol de cette planète est plein
                  de cratères, de vieux impacts de météorites, et plein de
                  bosses aussi, des volcans énormes comme Olympus Mons.
                </li>
              </ul>
            </div>
            <div class="item5">
              <!--Cinquieme question-->
              <ul>
                <li>
                  Quelle est la taille et la masse de Mars ? <br ><br >
                  Mars a un rayon de 3 389,5 km soit un diamètre de
                  <span class="important">6 779 km</span>. De plus Mars a une
                  masse de <span class="important">6,39 x 10^23 kg</span> .
                </li>
              </ul>
            </div>
            <div class="item6">
              <!--Sixieme question-->
              <ul>
                <li>
                  D’où vient le nom de Mars ? <br ><br >
                  Mars a été associée à la guerre dans l’Antiquité : elle a donc
                  reçu le nom du dieu de la guerre dans la mythologie
                  romaine.<br >
                  L’astre doit d’ailleurs son surnom de « planète rouge » à son
                  apparence dans le ciel : la planète est visible à l’œil nu et
                  ressemble à une étoile à la coloration rouge orangé. Grâce aux
                  missions d’exploration de Mars, on sait désormais que la
                  planète a cette couleur, car les minéraux de fer présents dans
                  son sol s’oxydent.
                </li>
              </ul>
            </div>
            <div class="item7">
              <!--Septieme question-->
              <ul>
                <li>
                  Mars est-elle rocheuse ou gazeuse ? <br ><br >
                  Les quatre premières planètes, Mercure, Vénus, Terre et Mars,
                  sont des
                  <span class="important">planètes rocheuses</span> avec un sol
                  bien solide.
                </li>
              </ul>
            </div>
            <div class="item8">
              <!--Huitieme question-->
              <ul>
                <li>
                  À quoi ressemble la surface de Mars ? <br ><br >
                  La surface de Mars ressemble à un grand désert froid, tandis
                  que l’intérieur de la planète serait plutôt gluant et chaud.
                  Comme la Terre, la planète possède des calottes glaciaires
                  polaires, des volcans (inactifs) et des canyons. Certaines
                  zones de Mars semblent avoir abrité des lacs par le passé.
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
