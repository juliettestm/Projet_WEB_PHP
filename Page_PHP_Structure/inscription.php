<?php
session_start();

include("../Page_PHP_Structure/validerdonnees.php");


if(isset($_POST["Inscription"])){
	try{
		require("connexion.php"); 
		$reqPrep="SELECT pseudo FROM clients ";
		$req =$conn->prepare($reqPrep);
		$req->execute();
		$resultat = $req->fetchAll();
		$conn= NULL;
		} 
		catch(Exception $e){
			die("Erreur : " . $e->getMessage());
			}
		foreach($resultat as $row) {
			echo"$row[pseudo]";
			if(($row['pseudo'])==($_POST["pseudo"])){
				$double=1;

			}
			
		}               
	if(isset($double)==FALSE){
	try{
		require("connexion.php");               
		$nom=valider_donnees($_POST["nom"]);
		$prenom=valider_donnees($_POST["prenom"]);
		$email=valider_donnees($_POST["email"]);
		$date=valider_donnees($_POST["dateN"]);
		$login=valider_donnees($_POST["pseudo"]);
		$mdp=valider_donnees($_POST["Motdepasse"]);

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
		<form name="ajout" id="formLetter" action="inscription.php"class="formLetter" method="post">
		<?php
			if(isset($double)==TRUE){
				echo" <fieldset id='fieldset2'>
				<h3>Ce pseudo: $_POST[pseudo] existe déjà ! </h3>
				</fieldset>";
			}
			?>
			<fieldset>
				<legend>Inscription pour le Voyage du systeme</legend>
				
				<label for="nom">Nom : </label>
				<input type="text" class="bouton"id="nom" required name="nom"><br/>
				
				<label for="prenom">Prénom : </label>
				<input type="text"class="bouton" id="prenom"required name="prenom"><br/>
				
				<label for="email">Email : </label>
				<input type="email"class="bouton" id="email"required name="email"><br/>
				
				<label for="dateN">Date de naissance : </label>
				<input type="date" class="bouton"id="DateN" required name="dateN"><br/>

				<label for="pseudo">Pseudo : </label>
				<input type="text" class="bouton"id="pseudo"required name="pseudo"><br/>

				<label for="Motdepasse">Votre mot de passe : </label>
				<input type="password"class="bouton" id="pwd"required name="Motdepasse"><br/>

				<input Type="submit" class="bouton" name="Inscription" required value="Inscription">
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


		