<?php
session_start() ;

?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <?php  include("Page_PHP_Structure/headerindex.php");?>
</head>
<body>
<?php  include("Page_PHP_Structure/asideindex.php");?>
      <div class="Main_grid">
        <!--Début du main -->
        <main>
          <div class="container-question">
            <div class="item1">
              <?php
              if(isset($_SESSION["authentifie"])){
                echo"<h1>Bienvenue $_SESSION[nom] sur la Voie Lactée !</h1>";
              }
              else{
              ?>
              <h1>Bienvenue sur la Voie Lactée !</h1>
              <?php
              }
              ?>
              <h2>Le système solaire</h2>
              <p>
                En dehors du Soleil lui-même, le Système solaire comprend huit
                planètes, des planètes naines (dont Pluton), une multitude de
                petits corps irréguliers (astéroïdes, comètes, météorites) et
                des poussières interplanétaires. Les planètes se concentrent
                autour du Soleil dans un disque d'environ 4,5 milliards de
                kilomètres de rayon (30 fois la distance moyenne de la Terre au
                Soleil). Il existe une zone peuplée d'astéroïdes et de
                noyaux cométaires.
                <br>
                <br>
                Pour plus d'informations, clique sur une planète !
              </p>
            </div>
          </div>
        </main>
      </div><!--Fin du Main-->
      <div class="iframe_grid">
        <div class="diapo-item">
          <h3>Quelques images de la vie dans notre système solaire</h3>
          <div id="Diapo">
            <!--Début du diapo-->
            <div class="diapo">
              <img
                src="Images/Images.jpg/systsolaire.jpg"
                alt="1"
              ><!--Premiere image du systeme solaire--><img
                src="Images/Images.jpg/voielactéici.webp"
                alt="2"
              ><!--Deuxieme image de la voie lactée--><img
                src="Images/Images.jpg/astéroide.jpg"
                alt="3"
              ><!--Troisieme image un astéroide--><img
                src="Images/Images.jpg/iss.webp"
                alt="4"
              ><!--quatrieme image de l'ISS-->
            </div>
          </div>
        </div>
        <!--Fin du diapo-->
        <div class="iframe-item">
          <h2>Comment notre Univers s'est t'il formé ?</h2>
          <p>
            Voici une petite vidéo d'introduction sur la créations de notre
            univers.
          </p>
          <iframe
            width="560"
            height="315"
            src="https://www.youtube.com/embed/0LgCDgKppNk"
            title="YouTube video player"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
        <div class="audio">
          <h2>Voici les sons de l'Univers enregistrés par la NASA</h2>
          <audio controls>
            <source src="Sons-de-l’Univers-enregistrés-par-la-NASA.mp4" type="video/mp4">
          </audio>
        </div><!--Fin du div item audio-->
      </div><!--Fin du div iframe_grid-->
      <div class="Footer_grid">
        <!--Début du Footer appliqué a chaque page grâce a une class-->
        <footer>
        <?php  include("Page_PHP_Structure/footerindex.php");?>
        </footer>
      </div>
      <!--Fin du Footer-->
    </div>
  </body>
</html>
