<?php
session_start();

	//ETAPE 2: Mettre à jours les données de la BD selon les valeurs modifiées envoyées par le formulaire ci-dessous
	if(isset($_POST["Modifier"])){
		try{
			require("connexion.php");             
			
			//Compléter ICI
			$reqPrep1="SELECT Id FROM clients WHERE pseudo='$_SESSION[nom]'";
			$req1 =$conn->prepare($reqPrep1);
            $req1->execute();
			$resultat = $req1->fetchAll();
			$conn= NULL;
		}                 
		catch(Exception $e){
			die("Erreur : " . $e->getMessage());
        }
		try{
			require("connexion.php"); 
			foreach($resultat as $row){
			//Compléter ICI
			$req1 = $conn->prepare("UPDATE clients SET nom = :nom, prenom = :prenom, email = :email, dateNaissance = :dateN ,pseudo= :pseudo WHERE id=$row[Id]");
			
            $req1->execute([
                "nom" => $_POST["nom"],
                "prenom" => $_POST["prenom"],
                "email" => $_POST["email"],
                "dateN" => $_POST["dateN"],
                "pseudo" => $_POST["nom"],
            ]);}
			$conn= NULL;	
			$_SESSION['nom']=$_POST["nom"];
			header("Location:Compteclient.php");
		
		}                 
		catch(Exception $e){
			die("Erreur : " . $e->getMessage());
        }
	}

?>

	