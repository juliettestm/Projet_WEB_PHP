<?php
session_start();
?>
<?php	
		
	include("validerdonnees.php");
			$civilite=$_POST["civilite"]; 
			$nom=$_POST["nom"];
			$connexion=$_POST["connexion"];
			$idee=$_POST["idee"];	
			$lesplanetes=$_POST["planètes"];

		$planete="";
		if(!empty($nom) && strlen($nom)<=40 &&preg_match("/^[A-Za-z '-]+$/",$nom) &&  !empty($civilite) && !empty($connexion) ){
				if(isset($_POST["quizz"] ) && $_SERVER['REQUEST_METHOD']=='POST') {
					$civilite=valider_donnees($_POST["civilite"]); 
					$nom=valider_donnees($_POST["nom"]);
					$connexion=valider_donnees($_POST["connexion"]);
					$idee=valider_donnees($_POST["idee"]);	
					
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
					require("connexion.php");             
					//Compléter ICI
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
						$reqPrep1="INSERT INTO `Quizz` ( `ID`,`Connexion`, `Idee`,`planete`) VALUES ( '$tab[Id]','$connexion','$idee','$planete')";
						$req1 =$conn->prepare($reqPrep1);
						$req1->execute();
						$conn= NULL;
				 }
				 catch(Exception $e){
					die('Erreur : '.$e->getMessage());
					
				}
				}
			}
				 else{	
					header('location:quizz.php');
				 }
				 $bonrep=0;
				for($i=1;$i<6;$i++){
				if(($_POST["$i"])=="true"){
					$bonrep++;
				}
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
					
					if(isset($lesplanetes) && count($lesplanetes)>0){
						echo "<ul>";
						foreach ($lesplanetes as $row){
							echo"<li>$row</li>";
						}
						echo "</ul>";
					}else 
						echo "Aucune planète";
					
				?>
				</ul>	
			</td>
		</tr>
		<tr>
			<th>Réponse quizz</th>
			<td><?php echo $bonrep;?>/5 <?php if($bonrep!=5){echo"Retentez votre chance! <br>Indice: Lisez bien toute nos page";}else{echo"Félicitation!";}?></td>
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