<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Importation du Header -->
  <?php  include("../Page_PHP_Structure/header.php");?>
</head>
<body>
  <!-- Importation du Aside-->
<?php  include("../Page_PHP_Structure/aside.php");?>

<div class="Main_grid">
        <!--Début du main-->
        <main>
          <div class="container-questions"><!--début des questions-->
            <div class= "item1"><!--Premiere question-->
              <h3>La planète Mercure dans le système solaire</h3>
              <p> 
                Mercure est <span class="important">la première planète</span> du Système solaire par ordre
                d'éloignement au Soleil, elle est la planète la plus proche du
                soleil.
              </p>
            </div>
            <div class="item2">
              <!--Deuxieme question-->
              <ul>
                <li>
                  Quelle est la distance de Mercure au Soleil ? <br ><br >
                  Le distance entre Mercure et le Soleil est de
                  <span class="important">57,9 millions de kilomètres</span>,
                  donc la lumière du Soleil met 3 minutes et 12 seconde pour arriver
                  jusqu'à Mercure.
                </li>
              </ul>
            </div>
            <div class="item3">
              <!--Troisieme question-->
              <ul>
                <li>
                  Quelle est la durée du voyage pour aller sur Mercure ?
                  <br ><br >
                  Le voyage vers Mercure peut être estimé par la mission de la
                  sonde Messengers qui a commencé le 3 aout 2004 et a fini le 14
                  janvier 2008.<br >
                  Donc la sonde a mis
                  <span class="important">1260 jours</span> pour faire la
                  distance Terre-Mercure. Il faut savoir que la sonde s'est
                  positionnée en orbite. <br >
                  Il y a eu une suite à cette mission puisqu'en Octobre 2018, la
                  sonde BepiColombo a été lancée en direction de Mercure pour
                  normalement arriver en décembre 2025.<br >
                  La sonde devrait mettre 7 ans 1 mois et 17 jours soit 2604
                  jours.
                </li>
              </ul>
            </div>
            <div class="item4">
              <!--Quatrieme question-->
              <ul>
                <li>
                  Les caractéristiques de Mercure :<br ><br >
                  Mercure est connu pour être la planète la plus proche du
                  soleil, elle va faire le tour du soleil en seulement
                  <span class="important">88 jours</span> contrairement aux
                  autres planètes qui eux mettent beaucoup plus de temps.
                  Mercure est aussi
                  <span class="important">la plus petite planète</span> du
                  système solaire avec un rayon de 2439,7 kilometres ce qui est
                  équivalent à 38% de la taille de la Terre. Mercure
                  est la seconde planète la plus dense de par la taille de son
                  noyau qui est composé de fer et de nickel. Le noyau représente
                  <span class="important">85% du rayon</span> de la planète et
                  aussi plus de 40% de son volume.
                </li>
              </ul>
            </div>
            <div class="item5">
              <!--Cinquieme question-->
              <ul>
                <li>
                  Quelle est la taille et la masse de Mercure ? <br ><br >
                  Comme dit précédemment Mercure a un rayon de
                  <span class="important">2439,7 kilomètres</span> ce qui
                  représente 38 % de la Terre et la masse de Mercure est de
                  <span class="important">3,301 x 10^23 kilogrammes</span> soit
                  1/20 de la masse de la Terre.
                </li>
              </ul>
            </div>
            <div class="item6">
              <!--Sixieme question-->
              <ul>
                <li>
                  D’où vient le nom de Mercure ? <br ><br >
                  Mercure tire son nom du Dieu latin Mercure qui lui etait
                  assimilé à l'Hermes des grecs. Il est celui qui accompagne et
                  protège les commerçants mais aussi les voleurs et
                  vagabonds.<br >
                  Mercure vient du latin Mercurius, merx, signifiant
                  «marchandise».
                </li>
              </ul>
            </div>
            <div class="item7">
              <!-- Septieme question-->
              <ul>
                <li>
                  Mercure est-elle rocheuse ou gazeuse ? <br ><br >
                  Mercure est une
                  <span class="important">planète rocheuse</span> avec un sol
                  bien solide. <br >
                  Elle peut aussi être appelée Tellurique, c'est à dire qu'on
                  peut la comparer à la Terre : on pourrait marcher dessus.
                </li>
              </ul>
            </div>
            <div class="item8">
              <!--Huitieme question-->
              <ul>
                <li>
                  À quoi ressemble la surface de Mercure ? <br ><br >
                  Mercure peut être confondue avec la lune. Elles ont toutes les
                  deux des cratères et sont pareilles depuis des milliards
                  d'années à cause de l'activité géologique et l'atmosphère
                  presque inexistantes.<br >
                  Toutefois elle reste un mystère pour les scientifiques car
                  certaines parties des cratères n'ont jamais vu la lumière du
                  Soleil donc les scientifiques, pensent que de la glace pourrait
                  exister dans ces cratères mais cependant rien n'est confirmé
                  puisqu'aucun engin ne s'est jamais posé sur Mercure pour
                  l'explorer.
                </li>
              </ul>
            </div>
          </div>
          <!--Fin des question-->
        </main>
      </div>
      <div class="Image_grid">
        <!--Début de l'image grid-->
        <img
          src="../Images/Images.png/mercurecoin.png"
          alt="Image de Mercure"
        ><!--Affichage de la planete Mercure dans le coin en bas de page au footer-->
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
