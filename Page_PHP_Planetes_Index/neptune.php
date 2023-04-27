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
          <div class="container-questions"><!--Début des questions-->
            <div class="item1"><!--Premiere question-->
              <h3>La planète Neptune dans le système solaire</h3>
              <p>
                Neptune est
                <span class="important">la huitième planète</span> du Système
                solaire par ordre d'éloignement , elle est la planète la plus
                éloignée du soleil.
              </p>
            </div>
            <div class="item2">
              <!--Deuxieme question-->
              <ul>
                <li>
                  Quelle est la distance de Neptune au Soleil ? <br ><br >
                  Neptune est 2 fois plus loin du Soleil qu’Uranus, soit située
                  à une distance moyenne de
                  <span class="important">4 498 252 900 km</span>. Elle effectue
                  sa révolution autour du Soleil en
                  <span class="important">164 ans et 280 jours</span>, à la
                  vitesse de <span class="important">5,45km/s</span>. Et elle
                  tourne sur elle-même en 17h52m. Sa lumière met au moins 4
                  heures à nous parvenir, elle est invisible à l’œil nu. Neptune
                  est si loin qu’elle croise parfois l’orbite de Pluton.
                </li>
              </ul>
            </div>
            <div class="item3">
              <!--troisieme question-->
              <ul>
                <li>
                  La découverte de Neptune :<br ><br >
                  La découverte de cette planète est directement liée à la
                  découverte d’Uranus. En effet, l’orbite d’Uranus subit
                  l’influence gravitationnelle de Neptune. Les scientifiques
                  (notamment Alexis Bouvard, directeur de l’Observatoire de
                  Paris, avant sa mort en 1843), après avoir observé ces
                  anomalies de mouvement, se mirent à chercher pourquoi l’orbite
                  d’Uranus ne correspondait pas aux lois de Newton. Neptune fut
                  ainsi la première planète localisée par calculs mathématiques,
                  puisque c’est Urbain Le Verrier qui en déduisit l’existence et
                  la position.
                </li>
              </ul>
            </div>
            <div class="item4">
              <!--Quatrieme question-->
              <ul>
                <li>
                  Quelle est la taille et la masse de Neptune ? <br ><br >
                  Le diamètre équatorial de Neptune est de
                  <span class="important">49 528 km</span> et le diamètre polaire
                  est de <span class="important">48 600 km</span> (aplatissement
                  de 0.02). Elle est plus petite qu’Uranus, mais plus massive :
                  <span class="important">1.0247e26 kg</span>
                  (soit 17 fois la Terre). Neptune est la plus petite des
                  planètes gazeuses de notre système.
                </li>
              </ul>
            </div>
            <div class="item5">
              <!--Cinquieme question-->
              <ul>
                <li>
                  D’où vient le nom de Neptune ? <br ><br >
                  Neptune n'est découverte qu'en 1846 par Le Verrier qui aurait
                  souhaité lui donner son nom. Neptune, dieu romain de l'élément
                  humide, est peu connu, si ce n'est sous son identification
                  avec le dieu grec Poséidon.
                </li>
              </ul>
            </div>
            <div class="item6">
              <!--sixieme question-->
              <ul>
                <li>
                  Neptune est-elle rocheuse ou gazeuse ? <br ><br >
                  Neptune est désignée comme
                  <span class="important">une géante de glaces</span>. Elle est
                  surtout composée d'eau, d'ammoniac et de méthane sous forme
                  solide. Neptune a probablement été créée dans un immense nuage
                  de gaz, de poussière et de glace lors de la formation du
                  Système solaire il y a environ 4,5 milliards d'années. Ce
                  nuage s'est aplati pour former un disque en rotation avec le
                  Soleil en son centre. D'après les scientifiques, les géantes
                  de glaces sont différentes des géantes gazeuses (comme Saturne
                  et Jupiter) parce qu'elles ne se seraient pas formées de la
                  même façon.
                </li>
              </ul>
            </div>
            <div class="item7">
              <!--Septieme question-->
              <ul>
                <li>
                  À quoi ressemble la surface de Neptune ? <br ><br >
                  Comme les autres planètes géantes du Système solaire, Neptune
                  n'a pas de surface solide. D'après les scientifiques, elle est
                  faite d'un noyau rocheux solide recouvert d'une couche chaude
                  et dense d'eau et d'ammoniac liquide.
                </li>
              </ul>
            </div>
            <div class="item8">
              <!--Huitieme question-->
              <ul>
                <li>
                  Quel est la composition de Neptune ? <br ><br >
                  La composition de la planète doit être sensiblement la même
                  que celle d’Uranus : Elle doit posséder un noyau rocheux (peut
                  être de silicates) de
                  <span class="important">14 000 km</span> de diamètre, le reste
                  étant un mélange d’agrégats rocheux et glacés, et de gaz tels
                  que l'hydrogène (15%) et un peu d’hélium et de méthane. On pense
                  qu’elle est comme Uranus sans structure interne, c'est-à-dire
                  que sa composition serait uniforme. On soupçonne néanmoins un
                  manteau d’eau, de méthane et d’ammoniac de 15 000 km
                  d’épaisseur au dessus du noyau rocheux. Comme pour sa voisine,
                  la couleur rouge du spectre est absorbée par la couche de
                  méthane, c’est pour cela que la planète est bleue.
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
