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
	<?php	
	
include("validerdonnees.php");
		$civilite=$_POST["civilite"]; 
		$nom=$_POST["nom"];
		$conn=$_POST["connexion"];
		$idee=$_POST["idee"];	
		$lesplanetes=$_POST["planètes"];
	
	if(!empty($nom) && strlen($nom)<=40 &&preg_match("/^[A-Za-z '-]+$/",$nom) &&  !empty($civilite) && !empty($conn) ){
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
			}
			else{
				header('location:quizz.php');	
			}	
	?>
	
	<h1>Résultat sondage: <?php echo "$civilite. $nom"; ?></h1>
	<table>
		
		<tr>
			<th>Connexion </th>
			<td ><?php echo $conn; ?> </td>
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