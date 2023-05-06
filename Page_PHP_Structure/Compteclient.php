<?php
session_start();
include("validerdonnees.php");
try{
    require("connexion.php"); 
    $reqPrep="SELECT Nom,Prenom,Email,DateNaissance,pseudo FROM clients WHERE pseudo = '$_SESSION[nom]'";
    $req =$conn->prepare($reqPrep);
    $req->execute();
    $resultat = $req->fetchAll();
    $conn= NULL;
    }                 
catch(Exception $e){
die("Erreur : " . $e->getMessage());
}
//ETAPE 2: Mettre à jours les données de la BD selon les valeurs modifiées envoyées par le formulaire ci-dessous

?>



<head>
 <?php  include("header.php");?>
 <link
      rel="stylesheet"
      href="../css_dossier/Css_Planètes/tableau.css"
    >
    <link
      rel="stylesheet"
      href="../css_dossier/Css_Planètes/serv_client.css"
    >
</head>
<body>
<?php  include("aside.php");?>
<div class="Main_grid">

<h1>Informations sur : <?php foreach($resultat as $cle=>$val){ echo "$val[Nom] $val[Prenom]"; ?></h1>
	<table id='table'>
		<tr>
			<th class='th'>Email </th>
			<td class='td'><?php echo "$val[Email]"; ?></td>
		</tr>
		<tr>
			<th class='th'>Date de naissance </th>
			<td class='td'><?php echo "$val[DateNaissance]"; ?> </td>
		</tr>
		<tr>
			<th class='th'>login </th>
			<td class='td'><?php echo "$val[pseudo]"; }?> </td>
		</tr>
	</table>


    <h1>Modifier mes informations</h1>
		<form action="Compteclient.php" id="formLetter" class="formLetter" method="post">
			<fieldset >
				
				<label for="nom">Nom : </label>
				<input type="text"class="bouton" id="nom" name="nom" value="<?php  echo $val['Nom'];  ?>"><br/>
				
				<label for="prenom">Prénom : </label>
				<input type="text" class="bouton"id="prenom" name="prenom" value="<?php echo  $val['Prenom'];  ?>"><br/>
				
				<label for="email">Email : </label>
				<input type="mail"class="bouton" id="email" name="email" value="<?php  echo $val['Email'] ;  ?>"><br/>
				
				<label for="dateN">Date de naissance: </label>
				<input type="date" class="bouton"id="dateN" name="dateN" value="<?php  echo $val['DateNaissance'];  ?>"><br/>
					
                <label for="pseudo">login : </label>
				<input type="text" class="bouton"id="pseudo" name="pseudo" value="<?php echo $val['pseudo'];  ?>"><br/>
				<input Type="submit"class="bouton" name="Modifier" value="Modifier">
</fieldset>
<?php
if(isset($_POST["Modifier"])){
	// Validation et récupération des données du formulaire
	$pseudo=valider_donnees($_POST["pseudo"]);
	$nom=valider_donnees($_POST["nom"]);
	$prenom=valider_donnees($_POST["prenom"]);
	$email=valider_donnees($_POST["email"]);
	$date=valider_donnees($_POST["dateN"]);
	
	try{
		// Connexion à la base de données
		require("connexion.php"); 
		
		// Requête pour récupérer tous les pseudos existants dans la table 'clients'
		$reqPrep="SELECT pseudo FROM clients ";
		$req =$conn->prepare($reqPrep);
		$req->execute();
		$resultat = $req->fetchAll();
		
		// Fermeture de la connexion à la base de données
		$conn= NULL;
	} 
	catch(Exception $e){
		die("Erreur : " . $e->getMessage());
	}
	
	// Vérification de l'existence d'un pseudo identique dans la table 'clients'
	foreach($resultat as $row) {
		if(($row['pseudo'])==($pseudo)){
			$double=1;
			echo" <fieldset id='fieldset2'>
			<h3>Ce pseudo: $pseudo existe déjà ! </h3>
			</fieldset>";
		}
	}
	
	// Vérification que le pseudo n'est pas déjà pris ou qu'il s'agit bien du pseudo actuel de l'utilisateur
	if(isset($double)==FALSE || $_POST["pseudo"]==$_SESSION['nom'] ){
		try{
			// Connexion à la base de données
			require("connexion.php");             
			
			// Requête pour récupérer l'ID de l'utilisateur actuel
			$reqPrep1="SELECT Id FROM clients WHERE pseudo='$_SESSION[nom]'";
			$req1 =$conn->prepare($reqPrep1);
			$req1->execute();
			$resultat = $req1->fetchAll();
			
			// Fermeture de la connexion à la base de données
			$conn= NULL;
		}                 
		catch(Exception $e){
			die("Erreur : " . $e->getMessage());
		}
		
		try{
			// Connexion à la base de données
			require("connexion.php"); 
			
			// Requête pour mettre à jour les informations de l'utilisateur actuel dans la table 'clients'
			foreach($resultat as $row){
				$req1 = $conn->prepare("UPDATE clients SET nom = :nom, prenom = :prenom, email = :email, dateNaissance = :dateN ,pseudo= :pseudo WHERE id=$row[Id]");
				
				$req1->execute([
					"nom" => $nom,
					"prenom" => $prenom,
					"email" => $email,
					"dateN" => $date,
					"pseudo" => $pseudo,
				]);
			}
			
			// Fermeture de la connexion à la base de données
			$conn= NULL;	
			
			// Mise à jour de la variable de session 'nom' avec le nouveau pseudo de l'utilisateur
			$_SESSION['nom']=$_POST["pseudo"];

	
				echo" <fieldset id='fieldset2'>
					<h3>Votre compte a bien été modifié</h3>
					</fieldset>";
					header("Location:Compteclient.php");
			}                 
			catch(Exception $e){
				die("Erreur : " . $e->getMessage());
			}
			}
		
	}
	?>
		</form>
        </div>
		<div class="Footer_grid">
        <!--Début du Footer appliqué a chaque page grâce a une class-->
        <footer>
        <?php  include("footer.php");?>
        </footer>

      </div>
      <!--Fin du Footer-->
    </div>
  </body>
</html>
