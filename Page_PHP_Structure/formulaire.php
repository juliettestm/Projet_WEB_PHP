<?php
session_start();
?>
<?php	
		
	include("validerdonnees.php");

	// Récupération des données envoyées par le formulaire
	$civilite=$_POST["civilite"]; 
	$nom=$_POST["nom"];
	$connexion=$_POST["connexion"];
	$idee=$_POST["idee"];	
	$lesplanetes=$_POST["planètes"];
	
	// Initialisation d'une variable pour compter le nombre de bonnes réponses
	$bonrep=0;
	
	// Parcours des réponses du quizz pour compter le nombre de bonnes réponses
	for($i=1;$i<6;$i++){
		if(($_POST["$i"])=="true"){
			$bonrep++;
		}
	}
	
	// Initialisation d'une variable pour stocker les planètes sélectionnées
	$planete="";
	
	// Vérification de la validité des données envoyées par le formulaire
	if(!empty($nom) && strlen($nom)<=40 && preg_match("/^[A-Za-z '-]+$/",$nom) && !empty($civilite) && !empty($connexion) ){
	
		// Vérification de la soumission du formulaire et de la méthode d'envoi (POST)
		if(isset($_POST["quizz"]) && $_SERVER['REQUEST_METHOD']=='POST') {
	
			// Validation des données avec la fonction valider_donnees()
			$civilite=valider_donnees($_POST["civilite"]); 
			$nom=valider_donnees($_POST["nom"]);
			$connexion=valider_donnees($_POST["connexion"]);
			$idee=valider_donnees($_POST["idee"]);	
			
			// Vérification des planètes sélectionnées
			if(isset($_POST["planètes"])) {
				$lesplanetes = $_POST["planètes"];
				foreach ($_POST["planètes"] as $val){
					$planete="$planete $val";
				} 
			}
			else{
				header('location:quizz.php');	
			}	
			
			try{
				// Connexion à la base de données
				require("connexion.php");             
	
				// Récupération de l'ID du client à partir de son pseudo stocké en session
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
				// Gestion des erreurs de connexion à la base de données
				die("Erreur : " . $e->getMessage());
			}
			
			try{
				// Connexion à la base de données
				require("connexion.php");  
				
				// Insertion des données dans la table Quizz
				$reqPrep1="INSERT INTO `Quizz` ( `ID`,`Connexion`, `Idee`,`planete`,`reponsequizz`) VALUES ( '$tab[Id]','$connexion','$idee','$planete','$bonrep')";
				$req1 =$conn->prepare($reqPrep1);
				$req1->execute();
				$conn= NULL;
			}
			catch(Exception $e){
				// Gestion des erreurs d'insertion dans la base de données
				die('Erreur : '.$e->getMessage());
					
				}
				}
			}
				 else{	
					header('location:quizz.php');
				 }
				
		?>
		


<!DOCTYPE html>
<html lang="fr">
<head>
  <?php  include("../Page_PHP_Structure/header.php");?>
  <link
      rel="stylesheet"
      href="../css_dossier/Css_Planètes/tableau.css"
    >
</head>
<body>
<?php  include("../Page_PHP_Structure/aside.php");?>
<div class="Main_grid">
	
	<h1>Résultat sondage: <?php echo "$civilite. $nom"; ?></h1>
	<table>
		
		<tr>
			<th>Inscription</th>
			<td ><?php echo $connexion; ?> </td>
		</tr>
		<tr>
			<th>Planètes préférées </th>
			<td>
				<?php 
					
					if(isset($lesplanetes) && count($lesplanetes)>0){ // Vérifie si $lesplanetes existe et contient au moins un élément
						echo "<ul>"; 
						foreach ($lesplanetes as $row){ // Parcourt chaque élément de $lesplanetes
							echo"<li>$row</li>"; // Ajoute un élément à la liste avec la valeur de $row
						}
						echo "</ul>"; 
					}else{ // Si $lesplanetes est vide ou n'existe pas
						echo "Aucune planète";
					}
					
				?>
				</ul>	
			</td>
		</tr>
		<tr>
			<th>Réponses quizz</th>
			<td><?php echo $bonrep;?>/5 <?php if($bonrep!=5){echo"Retentez votre chance! <br>Indice: Lisez bien toutes nos pages";}else{echo"Félicitation !";}?></td>
		</tr>
		<tr>
			<th>Suggestion de question</th>
			<td><?php echo $idee;?> </td>
		</tr>
	</table>
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