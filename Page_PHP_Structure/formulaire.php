<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Formulaire Action </title>
	<style>
		body{padding:3%;}
		table {
			border-collapse: collapse;
			border: solid 1px;
			width:50%;
		}
		td,th {
			border: solid 1px;
			text-align:left;
		}
	</style>
</head>
<body>
	<?php
			function valider_donnees($donnees){
				$donnees = trim($donnees);
				$donnees = stripslashes($donnees);
				$donnees = htmlspecialchars($donnees);
				return $donnees;
			}
			
			$civilite=$_POST["civilite"]; 
			$nom=$_POST["nom"];
			$conn=$_POST["connexion"];
			$idee=$_POST["idee"];	
			$lesplanetes=$_POST["planètes"];


			

			
			
			
		
			if(isset($_POST["Envoyer"] ) && $_SERVER['REQUEST_METHOD']=='POST') {
				$civilite=valider_donnees($_POST["civilite"]); 
				$nom=valider_donnees($_POST["nom"]);
				$conn=valider_donnees($_POST["connexion"]);
				$idee=valider_donnees($_POST["idee"]);	
				
			 }
			 else{	
				header('location:quizz.php');
			 }
			
			if(isset($_POST["planètes"])) 
				foreach ($_POST["planètes"] as $val){
					$lesplanetes[]=valider_donnees($val);
				}
			if(!empty($nom) && strlen($nom)<=40 &&preg_match("/^[A-Za-z '-]+$/",$nom) &&  !empty($civilite) && !empty($conn) ){
				$civilite=$_POST["civilite"]; 
				$nom=$_POST["nom"];
				$conn=$_POST["connexion"];
				$idee=$_POST["idee"];	
				$lesplanetes=$_POST["planètes"];
			}
			else{
				header('location:quizz.php');
			}
				
	?>
	
	<h1>Résultat sondage: <?php echo "$civilite. $nom"; ?></h1>
	<table>
		
		<tr>
			<th>Connexion </th>
			<td><?php echo $conn; ?> </td>
		</tr>
		<tr>
			<th>Planètes préférées </th>
			<td>
				<?php 
					
					if(isset($lesplanetes) && count($lesplanetes)>0){
						echo "<ul>";
						foreach ($lesplanetes as $val){
							echo"<li>$val</li>";
						}
						echo "</ul>";
					}else 
						echo "Aucune planète";
					
				?>
				</ul>	
			</td>
		</tr>
		<tr>
			<th>Sugestion </th>
			<td><?php echo $idee;?> </td>
		</tr>
	</table>
	
</body>
</html>