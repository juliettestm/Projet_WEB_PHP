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

		if(!empty($nom) && !empty(prenom) && !empty($email) && !empty($date) && !empty($login) && !empty($mdp) && strlen($nom) <= 40 && strlen($prenom) <= 40 && strlen($login) <= 40 && preg_match("^[A-Za-z '-]+$^",$nom) && preg_match("^[A-Za-z '-]+$^",$prenom) && preg_match("^[A-Za-z '-]+$^",$login) && preg_match("^[a-zA-Z.-]+@[a-zA-Z.]$^",$email)){
			$reqPrep1="INSERT INTO `Clients` ( `Nom`, `Prenom`, `Email`, `DateNaissance`,`pseudo`,`mdp`) VALUES ( '$nom','$prenom','$email','$date','$login','$mdp')";
			$req1 =$conn->prepare($reqPrep1);
			$req1->execute();
		
			$conn= NULL;
			header("Location:../index.php");
		}
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

<?php
		// define variables and set to empty values
		$nomErr = $emailErr = $pseudoErr = $prenomErr = $mdpErr = $dateNaissanceErr = "";
		$nom = $email = $pseudo = $prenom = $mdp = $dateNaissance = "";

		if (empty($_POST["nom"])) {
			$nomErr = "Le nom est obligatoire";
		} else {
			$nom = test_input($_POST["nom"]);
			if (!preg_match("/^[a-zA-Z-' ]*$/",$nom)) {
				$nameErr = "Seules les lettres et les espaces sont autorisés";
			}
		}

		if (empty($_POST["prenom"])) {
			$prenomErr = "Le prenom est obligatoire";
		} else {
			$prenom = test_input($_POST["prenom"]);
			if (!preg_match("/^[a-zA-Z-' ]*$/",$prenom)) {
				$nameErr = "Seules les lettres et les espaces sont autorisés";
			}
		}

		if (empty($_POST["email"])) {
			$emailErr = "L'email est obligatoire";
		} else {
			$email = test_input($_POST["email"]);
			
		}

		if (empty($_POST["pwd"])) {
			$mdpErr = "Le mot de passe est obligatoire";
		} else {
			$mdp = test_input($_POST["pwd"]);
		}

		if (empty($_POST["DateN"])) {
			$dateNaissanceErr = "La date de naissance est obligatoire";
		} else {
			$dateNaissance = test_input($_POST["DateN"]);
		}

		if (empty($_POST["pseudo"])) {
			$pseudoErr = "Le pseudo est obligatoire";
		} else {
			$pseudo = test_input($_POST["pseudo"]);
			if (!preg_match("/^[a-zA-Z-' ]*$/",$pseudo)) {
				$nameErr = "Seules les lettres et les espaces sont autorisés";
			}
		}


		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		?>
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

				<span class="error">* <?php echo "* informations obligatoire";?></span>
				
				<label for="nom">Nom * : </label>
				<input type="text" class="bouton"id="nom" required pattern="^[A-Za-z '-]+$" maxlength="40" name="nom"><br/>
				
				
				<label for="prenom">Prénom * : </label>
				<input type="text"class="bouton" id="prenom"required pattern="^[A-Za-z '-]+$" maxlength="40" name="prenom"><br/>
				
				
				<label for="email">Email * : </label>
				<input type="email"class="bouton" id="email"required pattern = "^[a-zA-Z.-]+@[a-zA-Z.]$" name="email"><br/>
				
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


		