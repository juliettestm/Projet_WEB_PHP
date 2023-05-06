<?php
session_start();
	if(isset($_SESSION["authentifie"])==true){
		try{
			require("connexion.php"); 
			$reqPrep1="SELECT Id FROM clients WHERE pseudo='$_SESSION[nom]'";
			$req1 =$conn->prepare($reqPrep1);
				  $req1->execute();
			$resultat = $req1->fetchAll();
			$conn= NULL;
			foreach($resultat as $row){
				$tab=array("Id"=>"$row[Id]");
			}
		}                 
		catch(Exception $e){
			die("Erreur : " . $e->getMessage());
        }
		try{
			require("connexion.php"); 
		$reqPrep1="DELETE FROM suggestion WHERE `Id`=$tab[Id]";
			$req1 =$conn->prepare($reqPrep1);
            $req1->execute();
		}                 
		catch(Exception $e){
			die("Erreur : " . $e->getMessage());
        }
		try{
			require("connexion.php"); 
		$reqPrep1="DELETE FROM quizz WHERE `Id`=$tab[Id]";
			$req1 =$conn->prepare($reqPrep1);
            $req1->execute();
		}                 
		catch(Exception $e){
			die("Erreur : " . $e->getMessage());
        }
		try{
			require("connexion.php"); 
		$reqPrep1="DELETE FROM clients WHERE `Id`=$tab[Id]";
			$req1 =$conn->prepare($reqPrep1);
            $req1->execute();
			header("Location:logout.php");
		}                 
		catch(Exception $e){
			die("Erreur : " . $e->getMessage());
        }
	}

?>