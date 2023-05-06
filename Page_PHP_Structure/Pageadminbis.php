<?php
session_start();
if($_SESSION["authentifie"]==false || $_SESSION["admin"]==false){ 
header("Location:../index.php");

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
 <?php  include("header.php");?>
  <link
      rel="stylesheet"
      href="../css_dossier/Css_Planètes/serv_client.css"
    >
    <link
      rel="stylesheet"
      href="../css_dossier/Css_Planètes/tableau.css"
    >

</head>
<body>
<?php  include("aside.php");?>
<div class="Main_grid">
    <?php
try{
    require("../Page_PHP_Structure/connexion.php");             
    //Compléter ICI
    $reqPrep1="SELECT id,Connexion,Idee,planete,reponsequizz FROM Quizz ";
    $req1 =$conn->prepare($reqPrep1);
          $req1->execute();
    $resultat = $req1->fetchAll();
    $conn= NULL;
    echo"<h1>Réponse Quizz</h1>";
    $i=1;
    foreach($resultat as $row){
      echo"
        <table id='table'>
          <caption>Quizz n°$i</caption>
          <tr>
          <th class='th'>Id</th>
          <td class='td'> $row[id] </td>
        </tr>
          <tr>
            <th class='th'>Depuis combien de temps l'utilistateur est inscrit  </th>
            <td class='td'> $row[Connexion]</td>
          </tr>
          <tr>
            <th class='th'>Idee de question pour le quizz </th>
            <td class='td'>$row[Idee]</td>
          </tr>
          <tr>
          <th class='th'>Planetes favorites du client</th>
          <td class='td'>$row[planete]</td>
          </tr>
          <tr>
          <th class='th'>Réponse du quizz</th>
          <td class='td'>$row[reponsequizz]</td>
          </tr>
        </table>";
        $i++;
  }
}
catch(Exception $e){
  die("Erreur : " . $e->getMessage());
}

?>
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