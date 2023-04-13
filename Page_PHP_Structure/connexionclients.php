<?php
session_start();
	//Script du traitement du formulaire d'authentification
	if(isset($_POST['Exo2Envoyer'])){
		
		$login=$_POST['login'];
		$mdp=$_POST['passwd'];
		try{
			require("connexion.php"); 
			$reqPrep1="SELECT Mdp FROM clients WHERE pseudo = '$login'";
			$req1 =$conn->prepare($reqPrep1);
            $req1->execute();
			$resultat = $req1->fetchAll();
			if ($resultat==NULL){
				$a=2;
			}
			elseif($resultat!=NULL){
				foreach($resultat as $row){
				$tab=array("Mdp"=>"$row[Mdp]");
			
			
			if($mdp==$tab["Mdp"]){ //si un utilisateur normal (client): s'assurer que le nom et le mot-de-passe sont corrects
				$_SESSION["nom"]=$login; //Variable de session "nom"
				$_SESSION["authentifie"]=true;//Variable de session "authentifie"
				$_SESSION["admin"]=false; //Variable de session "admin"
				header("Location:../index.php"); //redirection vers la page general.php
				}	
				elseif($mdp!=$resultat){
					$c=3;
				} 
			}
			$conn= NULL;
			}
		
		}                 
		catch(Exception $e){
			die('Erreur : '.$e->getMessage());
			
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
		<!-- Formulaire d'authentification-->
     	<form action="" method="post" class="formLetter">
     		<fieldset>
     			<legend>Formulaire d'authentification</legend>
     			<label>Login :</label>
     			<input type="text"class="bouton" name="login" placeholder="Entrez votre login" required>
     			<label>Password :</label>
     			<input type="password"class="bouton" name="passwd"  placeholder="Entrez votre mot de passe" required>
     			<input type="submit"id="soumission" class="bouton" name="Exo2Envoyer" value="Envoyer"/>
     		</fieldset>
			<?php
	if(isset($_POST['Exo2Envoyer'])){

			if (isset($a)==TRUE){
				echo" <fieldset id='fieldset2'>
				<h3>Vous n'êtes pas encore inscrit! </h3>
				</fieldset>";
			}
			elseif($c==3){
				echo" <fieldset id='fieldset2'>
				<h3>Votre mot de passe ou votre identifiant est invalide</h3>
				</fieldset>";
			}  
		}
			?>
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

