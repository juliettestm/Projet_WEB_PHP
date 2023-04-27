<?php
session_start();

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
	try{
		require("connexion.php"); 
		$reqPrep="SELECT pseudo FROM clients ";
		$req =$conn->prepare($reqPrep);
		$req->execute();
		$resultat = $req->fetchAll();
		$conn= NULL;
		} 
		catch(Exception $e){
			die("Erreur : " . $e->getMessage());
			}
		foreach($resultat as $row) {
			if(($row['pseudo'])==($_POST["pseudo"])){
				$double=1;
				echo" <fieldset id='fieldset2'>
				<h3>Ce pseudo: $_POST[pseudo] existe déjà ! </h3>
				</fieldset>";
			}
		}
if(isset($double)==FALSE){
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
		"pseudo" => $_POST["pseudo"],
	]);}
	$conn= NULL;	
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
