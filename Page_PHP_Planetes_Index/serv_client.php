<?php
session_start();

	function valider_donnees($donnees){
		$donnees=trim($donnees);
		$donnees=stripslashes($donnees);
		$donnees=htmlspecialchars($donnees);
		return $donnees;
	}

		if($_SERVER['REQUEST_METHOD']== 'POST' && !empty($_POST['servclient'])){
			if($_FILES['image']['size']<90000000000000000000000000000000000000000000000 && ($_FILES['image']['type'] =="image/jpeg" || $_FILES['image']['type'] =="image/gif" || $_FILES['image']['type'] =="image/png")){
				move_uploaded_file($_FILES['image']['tmp_name'],"./images/". basename($_FILES['image']['name']));
                $ok=1;
			}
		}  
        
    if(isset($_POST['servclient'])){
      if(isset($_SESSION["authentifie"])==true){
      try{
        require("../Page_PHP_Structure/connexion.php");             
        //Compléter ICI
        $reqPrep1="SELECT Id,email FROM clients WHERE pseudo='$_SESSION[nom]'";
        $req1 =$conn->prepare($reqPrep1);
              $req1->execute();
        $resultat = $req1->fetchAll();
        $conn= NULL;
        foreach($resultat as $row){
          $tab=array("Id"=>"$row[Id]","email"=>"$row[email]");
      }
    }
        catch(Exception $e){
        die("Erreur : " . $e->getMessage());
          }
        }
      else{
        $tab=array("Id"=>"0","email"=>"$_POST[email]");
      } 
      try{
        require("../Page_PHP_Structure/connexion.php");               
        $objet=valider_donnees($_POST["objet"]);
        $description=valider_donnees($_POST["description"]);
        $image=$_FILES['image']['name'];
    
        //Compléter ICI
        $reqPrep1="INSERT INTO `Suggestion` ( `ID`, `objet`, `description`,`email`,`image`) VALUES ( '$tab[Id]','$objet','$description','$tab[email]','$image')";
        $req1 =$conn->prepare($reqPrep1);
        $req1->execute();
        
        $conn= NULL;
      
      }    
      catch(Exception $e){
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
                <!-- Deuxieme partie les Demande spécifique de l'utilisateur-->
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
            if(isset($_SESSION["authentifie"])==true ){
              try{
                require("../Page_PHP_Structure/connexion.php");             
                //Compléter ICI
                $reqPrep1="SELECT Id FROM clients WHERE pseudo='$_SESSION[nom]'";
                $req1 =$conn->prepare($reqPrep1);
                      $req1->execute();
                $resultat = $req1->fetchAll();
                $conn= NULL;
                foreach($resultat as $row){
                  $tab=array("Id"=>"$row[Id]");
              }
            }
                catch(Exception $e){
                die("Erreur : " . $e->getMessage());
                  }
              try{
                require("../Page_PHP_Structure/connexion.php");             
                //Compléter ICI
                $reqPrep1="SELECT objet,description,image FROM Suggestion WHERE Id='$tab[Id]'";
                $req1 =$conn->prepare($reqPrep1);
                      $req1->execute();
                $resultat = $req1->fetchAll();
                $conn= NULL;
                echo"<h1>Vos Demande</h1>";
                $i=1;
                foreach($resultat as $row){
                  echo"
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
                    $i++;
              }
            }
            catch(Exception $e){
              die("Erreur : " . $e->getMessage());
            }
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
