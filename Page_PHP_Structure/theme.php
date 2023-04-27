<?php
session_start();
	
	?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php  include("../Page_PHP_Structure/header.php");?>
  <link
      rel="stylesheet"
      href="../css_dossier/Css_Planètes/serv_client.css"
    >
    
</head>
<body>
<?php  include("../Page_PHP_Structure/aside.php");?>

<div class="Main_grid">
        <!--Début du main-->
        <main>
          <div>
	<form method="post" class="formLetter" id="formLetter"action="theme.php">		
			<label>Choisir votre thème préféré : </label>
			<select class="bouton" id="bouton" name="Choixtheme">
				<option value="orange">Mercure (Orange)</option>
				<option value="vert">Venus (Vert)</option>
				<option value="bleu">Terre (Bleu)</option>
				<option value="rouge">Mars (Rouge)</option>
				<option value="jaune">Jupiter (Jaune)</option>
				<option value="violet">Saturne (Violet par defaut)</option>
				<option value="marron">Uranus (Marron)</option>
				<option value="gris">Neptune (Gris)</option>
			</select>
			<input type="submit" class="bouton" id="bouton" name="theme" Value="Appliquer"/>
		</form>
		</div>
        </main>
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