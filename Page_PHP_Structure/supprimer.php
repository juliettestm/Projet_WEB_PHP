<?php
session_start();
	if(isset($_SESSION["authentifie"])==true){
    
		// Récupération de l'ID de l'utilisateur en fonction de son pseudo
		try{
			require("connexion.php"); // Connexion à la base de données
			$reqPrep1="SELECT Id FROM clients WHERE pseudo='$_SESSION[nom]'"; // Requête SQL pour récupérer l'ID de l'utilisateur
			$req1 =$conn->prepare($reqPrep1); // Préparation de la requête
			$req1->execute(); // Exécution de la requête
			$resultat = $req1->fetchAll(); // Récupération des résultats de la requête
			$conn= NULL; // Fermeture de la connexion
			foreach($resultat as $row){
				$tab=array("Id"=>"$row[Id]"); // Stockage de l'ID de l'utilisateur dans un tableau
			}
		}                 
		catch(Exception $e){ // Gestion des erreurs
			die("Erreur : " . $e->getMessage()); // Arrêt du script en cas d'erreur
		}
		
		// Suppression des suggestions de l'utilisateur
		try{
			require("connexion.php"); // Connexion à la base de données
			$reqPrep1="DELETE FROM suggestion WHERE `Id`=$tab[Id]"; // Requête SQL pour supprimer les suggestions de l'utilisateur
			$req1 =$conn->prepare($reqPrep1); // Préparation de la requête
			$req1->execute(); // Exécution de la requête
		}                 
		catch(Exception $e){ // Gestion des erreurs
			die("Erreur : " . $e->getMessage()); // Arrêt du script en cas d'erreur
		}
		
		// Suppression des quizz de l'utilisateur
		try{
			require("connexion.php"); // Connexion à la base de données
			$reqPrep1="DELETE FROM quizz WHERE `Id`=$tab[Id]"; // Requête SQL pour supprimer les quizz de l'utilisateur
			$req1 =$conn->prepare($reqPrep1); // Préparation de la requête
			$req1->execute(); // Exécution de la requête
		}                 
		catch(Exception $e){ // Gestion des erreurs
			die("Erreur : " . $e->getMessage()); // Arrêt du script en cas d'erreur
		}
		
		// Suppression de l'utilisateur
		try{
			require("connexion.php"); // Connexion à la base de données
			$reqPrep1="DELETE FROM clients WHERE `Id`=$tab[Id]"; // Requête SQL pour supprimer l'utilisateur
			$req1 =$conn->prepare($reqPrep1); // Préparation de la requête
			$req1->execute(); // Exécution de la requête
			header("Location:logout.php"); // Redirection vers la page de déconnexion
		}                 
		catch(Exception $e){ // Gestion des erreurs
			die("Erreur : " . $e->getMessage()); // Arrêt du script en cas d'erreur
		}
	}
	
	?>