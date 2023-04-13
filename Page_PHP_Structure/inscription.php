<?php
session_start();
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
		<form name="ajout" action="inscription.php"class="formLetter" method="post">
			<fieldset>
				<legend>Inscription pour le Voyage du systeme</legend>
				
				<label for="nom">Nom : </label>
				<input type="text" class="bouton"id="nom" name="nom"><br/>
				
				<label for="prenom">Prénom : </label>
				<input type="text"class="bouton" id="prenom" name="prenom"><br/>
				
				<label for="email">Email : </label>
				<input type="email"class="bouton" id="email" name="email"><br/>
				
				<label for="dateN">Date de naissance : </label>
				<input type="date" class="bouton"id="dateN" name="dateN"><br/>

				<label for="pseudo">Pseudo : </label>
				<input type="text" class="bouton"id="pseudo" name="pseudo"><br/>

				<label for="Motdepasse">Votre mot de passe : </label>
				<input type="password"class="bouton" id="Motdepasse" name="Motdepasse"><br/>

				<input Type="submit" class="bouton" name="Inscription" value="Inscription">
			</fieldset>
		</form>
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


		<?php

	if(isset($_POST["Inscription"])){
		try{
			require("connexion.php");               
			$nom=$_POST["nom"];
			$prenom=$_POST["prenom"];
			$email=$_POST["email"];
			$date=$_POST["dateN"];
			$login=$_POST["pseudo"];
			$mdp=$_POST["Motdepasse"];
			//Compléter ICI
			$reqPrep1="INSERT INTO `Clients` ( `Nom`, `Prenom`, `Email`, `DateNaissance`,`pseudo`,`mdp`) VALUES ( '$nom','$prenom','$email','$date','$login','$mdp')";
			$req1 =$conn->prepare($reqPrep1);
            $req1->execute();
			
			$conn= NULL;
			header("Location:../index.php");
		}                 
		catch(Exception $e){
			die("Erreur : " . $e->getMessage());
        }
	}

?>
    </body>
</html>