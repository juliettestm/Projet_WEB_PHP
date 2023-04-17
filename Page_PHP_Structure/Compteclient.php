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
		<form action="modifier.php" id="formLetter" class="formLetter" method="post">
			<fieldset>
				
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
