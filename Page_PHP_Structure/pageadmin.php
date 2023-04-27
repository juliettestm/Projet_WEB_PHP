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
</head>
<body>
<?php  include("aside.php");?>
<div class="Main_grid">
    <?php
try{
    require("../Page_PHP_Structure/connexion.php");             
    //Compléter ICI
    $reqPrep1="SELECT id,objet,description,image FROM Suggestion ";
    $req1 =$conn->prepare($reqPrep1);
          $req1->execute();
    $resultat = $req1->fetchAll();
    $conn= NULL;
    echo"<h1>Les Demandes Clients</h1>";
    $i=1;
    foreach($resultat as $row){
      echo"
        <table id='table'>
          <caption>Demande n°$i</caption>
          <tr>
          <th class='th'>Id</th>
          <td class='td'> $row[id]</td>
        </tr>
          <tr>
            <th class='th'>Objet </th>
            <td class='td'> $row[objet]</td>
          </tr>
          <tr>
            <th class='th'>Description </th>
            <td class='td'>$row[description]</td>
          </tr>
          <tr>
            <th class='th'>Image </th>
            <td class='td'><img src=\"..\Page_PHP_Planetes_Index\images\\" .basename($row['image']) . "\"></td>
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