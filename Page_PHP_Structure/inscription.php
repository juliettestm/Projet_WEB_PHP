<?php
session_start();

include("../Page_PHP_Structure/validerdonnees.php");


if (isset($_POST["Inscription"]) && $_SERVER['REQUEST_METHOD'] == 'POST'){
	try{
		require("connexion.php"); 
		$reqPrep="SELECT pseudo FROM clients ";
		$req =$conn->prepare($reqPrep);
		$req->execute();
		$resultat = $req->fetchAll();
		$conn= NULL;
	} catch(Exception $e){
		die("Erreur : " . $e->getMessage());
	}
	
	foreach($resultat as $row) {
		if(($row['pseudo'])==($_POST["pseudo"])){
			$double=1; // Si le pseudo est déjà utilisé, le mettre à 1
		}
	}               
	
	// Si le pseudo entré n'est pas déjà utilisé, ajouter un nouveau client à la table "Clients"
	if(isset($double)==FALSE){
		try{
			require("connexion.php");               
			$nom=valider_donnees($_POST["nom"]);
			$prenom=valider_donnees($_POST["prenom"]);
			$email=valider_donnees($_POST["email"]);
			$date=valider_donnees($_POST["dateN"]);
			$login=valider_donnees($_POST["pseudo"]);
			$mdp=valider_donnees($_POST["Motdepasse"]);
	
			// Vérifie que toutes les données entrées sont valides avant de les ajouter à la table "Clients"
			if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($date) && !empty($login) && !empty($mdp) && strlen($nom) <= 40 && strlen($prenom) <= 40 && strlen($login) <= 40 && preg_match("/^[A-Za-z '-]+$/",$nom) && preg_match("/^[A-Za-z '-]+$/",$prenom) && preg_match("/^[A-Za-z '-]+$/",$login) && preg_match("/^[a-zA-Z.-]+@[a-zA-Z.]+.[a-zA-Z.]$/",$email ) ){
				$reqPrep1="INSERT INTO `Clients` ( `Nom`, `Prenom`, `Email`, `DateNaissance`,`pseudo`,`mdp`) VALUES ( '$nom','$prenom','$email','$date','$login','$mdp')";
				$req1 =$conn->prepare($reqPrep1);
				$req1->execute();
				$conn= NULL;
				header("Location:../index.php"); // Redirige l'utilisateur vers la page d'accueil
			}
		} catch(Exception $e){
			die("Erreur : " . $e->getMessage());
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

				<span> <?php echo "* informations obligatoires ";?></span>
				<span> <?php echo " <br>";?></span>
				<span> <?php echo " <br>";?></span>
				
				<label for="nom">Nom * : </label>
				<input type="text" class="bouton"id="nom" required pattern="^[A-Za-z '-]+$" maxlength="40" name="nom"><br/>
				
				
				<label for="prenom">Prénom * : </label>
				<input type="text"class="bouton" id="prenom"required pattern="^[A-Za-z '-]+$" maxlength="40" name="prenom"><br/>
				
				
				<label for="email">Email * : </label>
				<input type="email"class="bouton" id="email"required pattern="^[a-zA-Z.-]+@[a-zA-Z.]+.[a-zA-Z.]$" name="email"><br/>
				
				<label for="dateN">Date de naissance * : </label>
				<input type="date" class="bouton"id="DateN" required name="dateN"><br/>

				<label for="pseudo">Pseudo * : </label>
				<input type="text" class="bouton"id="pseudo"required pattern="^[A-Za-z '-]+$" maxlength="40" name="pseudo"><br/>
				

				<label for="Motdepasse">Votre mot de passe * : </label>
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


		