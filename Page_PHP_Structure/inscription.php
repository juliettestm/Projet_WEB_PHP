<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>TP4 : web dynamique</title>
        <meta charset="utf-8" />
        <style>
			body{padding:3%;}
            h1{text-align:center;}
            h2{color:red;}
			table,td,th{border: solid; border-collapse:collapse;text-align:center;}
        </style>
         </head>
         <body>
         <!-- Formulaire d'ajout -->
		<h2>Ajouter un adhérent</h2>
		<form name="ajout" action="inscription.php" method="post">
			<fieldset>
				<legend>Ajouter un adhérent</legend>
				
				<label for="nom">Nom : </label>
				<input type="text" id="nom" name="nom"><br/>
				
				<label for="prenom">Prénom : </label>
				<input type="text" id="prenom" name="prenom"><br/>
				
				<label for="email">Email : </label>
				<input type="email" id="email" name="email"><br/>
				
				<label for="dateN">Date de naissance : </label>
				<input type="date" id="dateN" name="dateN"><br/>

				<label for="pseudo">Pseudo : </label>
				<input type="text" id="pseudo" name="pseudo"><br/>

				<label for="Motdepasse">Votre mot de passe : </label>
				<input type="password" id="Motdepasse" name="Motdepasse"><br/>

				<input Type="submit" name="Inscription" value="Inscription">
			</fieldset>
		</form>
		<?php

	if(isset($_POST["Inscription"])){
		try{
			require("connexion.php");               
			$nom=$_POST["nom"];
			$prenom=$_POST["prenom"];
			$email=$_POST["email"];
			$date=$_POST["dateN"];
			$login=$_POST["pseudo"]
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