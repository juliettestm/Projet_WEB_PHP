<?php
 	//Exercice 2 : Question 2
     
    //Démarrer la session
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
				echo"<h1>Vous n'êtes pas encore inscrit! </h1>";
			}
			else{foreach($resultat as $row){
				$tab=array("Mdp"=>"$row[Mdp]");
			}
			
			if($mdp==$tab["Mdp"]){ //si un utilisateur normal (client): s'assurer que le nom et le mot-de-passe sont corrects
				$_SESSION["nom"]=$login; //Variable de session "nom"
				$_SESSION["authentifie"]=true;//Variable de session "authentifie"
				$_SESSION["admin"]=false; //Variable de session "admin"
				header("Location:../index.php"); //redirection vers la page general.php
				}	
				elseif($mdp!=$resultat){
					echo"<h1>Votre mot de passe ou votre identifiant est invalide</h1>";
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
 <!--  <?php  //include("header.php");?>
  <link
      rel="stylesheet"
      href="../css_dossier/Css_Planètes/serv_client.css"
    >
</head>
<body>
<?php  //include("aside.php");?>
<div class="Main_grid">-->
		<!-- Formulaire d'authentification-->
     	<form action="" method="post">
     		<fieldset>
     			<legend>Formulaire d'authentification</legend>
     			<label>Login :</label>
     			<input type="text"class="bouton" name="login" placeholder="Entrez votre login" required>
     			<label>Password :</label>
     			<input type="password"class="bouton" name="passwd"  placeholder="Entrez votre mot de passe" required>
     			<input type="submit" class="bouton" name="Exo2Envoyer" value="Envoyer"/>
     		</fieldset>
     	</form>
