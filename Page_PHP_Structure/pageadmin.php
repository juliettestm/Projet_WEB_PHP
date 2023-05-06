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
  // La requête SQL pour récupérer les données de la table Suggestion
  $reqPrep1="SELECT id,email,objet,description,image FROM Suggestion ";
  // On prépare la requête SQL avec la méthode prepare() et on stocke l'objet PDOStatement retourné dans la variable $req1
  $req1 =$conn->prepare($reqPrep1);
  // On exécute la requête SQL préparée avec la méthode execute() et on stocke les données retournées dans la variable $resultat
  $req1->execute();
  $resultat = $req1->fetchAll(); // On récupère toutes les lignes de résultats de la requête sous forme d'un tableau associatif
  $conn= NULL; // On ferme la connexion à la base de données
  echo"<h1>Les Demandes Clients</h1>"; // On affiche le titre de la section
  $i=1; // Initialisation de la variable $i à 1
  // On parcourt le tableau associatif $resultat avec la boucle foreach
  foreach($resultat as $row){
  // On affiche les données de chaque ligne sous forme de tableau HTML
  echo"
  <table id='table'>
  <caption>Demande n°$i</caption>
  <tr>
  <th class='th'>Id Email</th>
  <td class='td'> $row[id] $row[email]</td>
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
  <td class='td'><img src=\"..\Page_PHP_Planetes_Index\images\" .basename($row['image']) . "\"></td>
  </tr>
  </table>";
  $i++; // Incrémentation de la variable $i à chaque itération
  }
  }
  catch(Exception $e){
  die("Erreur : " . $e->getMessage()); // En cas d'erreur, on affiche le message d'erreur retourné par l'objet Exception
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