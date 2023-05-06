<?php
session_start();
// Inclure un fichier contenant une fonction pour valider les données entrées
include("../Page_PHP_Structure/validerdonnees.php");

// Vérifier que le formulaire a été envoyé en méthode POST et que le champ 'servclient' n'est pas vide
if($_SERVER['REQUEST_METHOD']== 'POST' && !empty($_POST['servclient'])){
  // Vérifier que la taille de l'image est inférieure à 9000000000000000000000000000000 octets et que son type est jpeg, gif ou png
  if($_FILES['image']['size']<9000000000000000000000000000000 && ($_FILES['image']['type'] =="image/jpeg" || $_FILES['image']['type'] =="image/gif" || $_FILES['image']['type'] =="image/png")){
    // Déplacer l'image téléchargée vers le répertoire './images/' avec un nom basé sur son nom d'origine
    move_uploaded_file($_FILES['image']['tmp_name'],"./images/". basename($_FILES['image']['name']));
    // Définir une variable $ok à 1
    $ok=1;
  }
}

// Vérifier que le champ 'servclient' est présent dans le formulaire
if(isset($_POST['servclient'])){
  // Vérifier si l'utilisateur est authentifié en vérifiant si la variable de session 'authentifie' est définie à true
  if(isset($_SESSION["authentifie"])==true){
    try{
      // Inclure un fichier pour se connecter à la base de données
      require("../Page_PHP_Structure/connexion.php");             
      // Requête pour récupérer l'ID et l'e-mail de l'utilisateur avec le pseudo stocké dans la variable de session 'nom'
      $reqPrep1="SELECT Id,email FROM clients WHERE pseudo='$_SESSION[nom]'";
      $req1 =$conn->prepare($reqPrep1);
      // Exécuter la requête
      $req1->execute();
      // Récupérer le résultat sous forme de tableau associatif
      $resultat = $req1->fetchAll();
      // Fermer la connexion à la base de données
      $conn= NULL;
      // Parcourir le tableau associatif résultant pour stocker l'ID et l'e-mail dans un tableau
      foreach($resultat as $row){
        $tab=array("Id"=>"$row[Id]","email"=>"$row[email]");
      }
    }
    catch(Exception $e){
      // Si une erreur est survenue, afficher un message d'erreur et arrêter l'exécution du script
      die("Erreur : " . $e->getMessage());
    }
  }
  else{
    // Si l'utilisateur n'est pas authentifié, valider l'e-mail entré dans le formulaire et stocker l'ID à 0
    $email=valider_donnees($_POST['email']);
    $tab=array("Id"=>"0","email"=>"$email");
  }  
      try {
        // On inclut le fichier de connexion à la base de données
        require("../Page_PHP_Structure/connexion.php");
        
        // On récupère les données du formulaire et on les valide
        $objet = valider_donnees($_POST["objet"]);
        $description = valider_donnees($_POST["description"]);
        $image = $_FILES['image']['name'];
        
        // On prépare la requête SQL d'insertion avec des paramètres à remplacer
        $reqPrep1 = "INSERT INTO `Suggestion` (`ID`, `objet`, `description`, `email`, `image`) VALUES ('$tab[Id]', '$objet', '$description', '$tab[email]', '$image')";
        
        // On prépare la requête pour l'exécution avec les paramètres remplacés
        $req1 = $conn->prepare($reqPrep1);
        
        // On exécute la requête
        $req1->execute();
        
        // On ferme la connexion à la base de données
        $conn = NULL;
  }     
      catch (Exception $e) {
        // Si une erreur se produit, on affiche un message d'erreur
        die("Erreur : " . $e->getMessage());
}
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <?php  include("../Page_PHP_Structure/header.php");?>
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
<?php  include("../Page_PHP_Structure/aside.php");?>

<div class="Main_grid">
        <!--Début du main-->
        <main>
          <div>
            <form method="post" action="serv_client.php" enctype="multipart/form-data" id="formLetter" class="formLetter">
              <fieldset id="fieldset2">
                <legend>Votre demande</legend>
                <!-- Deuxieme partie les demandes spécifiques de l'utilisateur-->
                <?php
                if(isset($_SESSION["authentifie"])==false){
                  echo'
                <label for="email">Votre Email : </label>
                <input  type="email"class="bouton" id="email"required name="email"><br/>';
              
                }
                ?>
                <label for="objet">Objet du message :</label
                ><!--L'objet du message-->
                <select class="objet" id="objet" required name="objet" required>
                  <option value="0">- Séléctionner -</option>
                  <!--A choix multiple-->
                  <option value="suggestion">Suggestions</option>
                  <!--Premier choix suggestion -->
                  <option value="reclamation">Reclamations</option>
                  <!-- Deuxieme choix Reclamation-->
                  <option value="inscription">Inscription</option>
                  <!--Troisieme choix Inscription-->
                  <option value="problemes techniques">Problèmes techniques</option>
                  <!--Quatrieme choix probléme technique-->
                  <option value="autre">Autre...</option>
                </select>
                <br ><br >
                <label required for="description">Message :</label>
                <br ><!--Le Message-->
                <textarea
                  rows="10"
                  cols="50"
                  name="description"
                  id="description"
                  maxlength="200"
                ></textarea
                ><!--A remplir pour nous expliquer le besoin de l'utilisateur-->
                <br ><br >

                <label for="document">Image permettant d'illustrer votre demande:</label
                ><!--Les documents si l'utilisateur veut en ajouter-->
                <input
                  class="bouton"
                  id="bouton"
                  type="file" 
                  name="image"
                  accept="image/*"
                >
                
                <br ><br >
                
                <input
                  class="bouton"
                  type="submit"
                  name="servclient"
                  id="soumission"
                  value="Envoyer"
                  
                ><!--Le bouton envoyer -->
                <input class="bouton" type="reset" ><!--Ou le bouton Effacer-->
               
                
              </fieldset>
            </form>
            <?php
            // Vérification si l'utilisateur est authentifié
            if(isset($_SESSION["authentifie"])==true ){
              try{
                require("../Page_PHP_Structure/connexion.php");   // Inclusion du fichier de connexion à la base de données          
                
                // Préparation et exécution de la requête SQL pour récupérer l'Id du client avec le pseudo stocké dans la session
                $reqPrep1="SELECT Id FROM clients WHERE pseudo='$_SESSION[nom]'";
                $req1 =$conn->prepare($reqPrep1);
                $req1->execute();
                
                // Récupération des résultats de la requête sous forme de tableau associatif et stockage dans $resultat
                $resultat = $req1->fetchAll();
                
                // Fermeture de la connexion à la base de données
                $conn= NULL;
                
                // Parcours du tableau de résultats et stockage de l'Id dans un tableau associatif $tab
                foreach($resultat as $row){
                  $tab=array("Id"=>"$row[Id]");
                }
              }
              catch(Exception $e){
                // Affichage d'un message d'erreur en cas de problème lors de la connexion à la base de données
                die("Erreur : " . $e->getMessage());
              }
            }
              try{
                require("../Page_PHP_Structure/connexion.php");  // inclut le fichier de connexion à la base de données  
                // prépare la requête pour sélectionner les suggestions correspondantes à l'Id du client connecté
                $reqPrep1="SELECT objet,description,image FROM Suggestion WHERE Id='$tab[Id]'";
                $req1 =$conn->prepare($reqPrep1);
                $req1->execute(); // exécute la requête préparée
                $resultat = $req1->fetchAll(); // récupère tous les résultats de la requête
                $conn= NULL; // ferme la connexion à la base de données
                echo"<h1>Vos Demandes</h1>"; // affiche un titre
                $i=1; // initialise un compteur pour le numéro de la demande
                foreach($resultat as $row){ // boucle à travers chaque résultat de la requête
                    // affiche un tableau HTML avec les détails de la demande
                    echo "
                        <table id='table'>
                            <caption>Demande n°$i</caption>
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
                                <td class='td'><img src=\".\images\\" .basename($row['image']) . "\"></td>
                            </tr>
                        </table>";
                    $i++; // incrémente le compteur
                }
            }
            catch(Exception $e){ // gère les erreurs potentielles
                die("Erreur : " . $e->getMessage()); // affiche un message d'erreur
            }
            
          
            
            ?>
          </div>
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
