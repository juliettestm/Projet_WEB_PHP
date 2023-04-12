<?php
 	//Exercice 2 : Question 2
     
    //Démarrer la session
	session_start();
	
	//Script du traitement du formulaire d'authentification
	if(isset($_POST['Exo2Envoyer'])){
		$login=$_POST['login'];
		$mdp=$_POST['passwd'];
		
		if($login=="client" && $mdp=="client123"){ //si un utilisateur normal (client): s'assurer que le nom et le mot-de-passe sont corrects
			$_SESSION["nom"]=$login; //Variable de session "nom"
			$_SESSION["authentifie"]=true;//Variable de session "authentifie"
			$_SESSION["admin"]=false; //Variable de session "admin"
			header("Location: general.php"); //redirection vers la page general.php
		}
		else if ($login=="admin" && $mdp=="admin123"){//si utilisateur Admin
			$_SESSION["nom"]=$login;;//Variable de session "nom"
			$_SESSION["authentifie"]=true;//Variable de session "authentifie"
			$_SESSION["admin"]=true;//Variable de session "admin"
			header("Location: gestion.php");; //redirection vers la page gestion.php
		}
	}	  
	
?>
<!DOCTYPE html>
<html lang="fr">

<?php
			//Exercice 2 : Question 5
		
			if(isset($_SESSION["authentifie"])==true){ // si un utilisateur est authentifié
				echo"<br><a href='logout.php'>Déconnexion</a></p>";
			}
			else{ // sinon on affiche le formulaire
		
		?>		
		<!-- Formulaire d'authentification-->
     	<form action="" method="post">
     		<fieldset>
     			<legend>Formulaire d'authentification</legend>
     			<label>Login :</label>
     			<input type="text" name="login" placeholder="Entrez votre login" required>
     			<label>Password :</label>
     			<input type="password" name="passwd"  placeholder="Entrez votre mot de passe" required>
     			<input type="submit" name="Exo2Envoyer" value="Envoyer"/>
     		</fieldset>
     	</form>
		<?php
			} 
		?>