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
<form method="post" action="formulaire.php" id="formLetter" class="formLetter">
			<fieldset style="width:50%;" id='fieldset2'>
				<legend>Sondage</legend>
				
				<label>Civilité :</label>
				<input style="display:inline-block;" type="radio" class="bouton" name="civilite" id="male" value="M"/><label for="male" required="required">Monsieur</label>
				<input  style="display:inline-block;" type="radio"  class="bouton" name="civilite" id="female" value="Mme"/><label for="female">Madame</label>
				
				<hr>
				<label for="nom" required="required" pattern="/^[A-Za-z '-]+$" maxlength="40">Nom :</label>
				<input type="text" class="bouton" name="nom" id="nom" />
		 			
				
				<hr>
				<label for="connexion"  required="required">Connexion :</label>
				<select name="connexion" class="bouton" id="connexion">
					<option value="">Depuis combien de temps êtes-vous inscrit au site </option>
					<option value="Semestriel">1 semaine</option>
					<option value="Mensuel">1 mois</option>
					<option value="Annuel">1 année</option>
					
				</select>
				
				<hr>
				<label>Votre planète préférée :</label>
				<br>
				<input  style="display:inline-block;"class="bouton" type="checkbox" id="mcr" name="planètes[]" value="Mercure" /><label for="mcr">Mercure</label><br>
				<input style="display:inline-block;" class="bouton" type="checkbox" id="vns" name="planètes[]" value="Vénus"/><label for="vns">Vénus</label><br>
				<input style="display:inline-block;" class="bouton" type="checkbox" id="trr" name="planètes[]" value="Terre" /><label for="trr">Terre</label><br>
				<input style="display:inline-block;" class="bouton" type="checkbox" id="mar" name="planètes[]" value="Mars" /><label for="mar">Mars</label><br>
				<input style="display:inline-block;" class="bouton" type="checkbox" id="jup" name="planètes[]" value="Jupiter" /><label for="jup">Jupiter</label><br>
				<input style="display:inline-block;" class="bouton" type="checkbox" id="sat" name="planètes[]" value="Saturne" /><label for="sat">Saturne</label><br>
				<input style="display:inline-block;" class="bouton" type="checkbox" id="ura" name="planètes[]" value="Uranus" /><label for="ura">Uranus</label><br>
				<input style="display:inline-block;" class="bouton" type="checkbox" id="nep" name="planètes[]" value="Neptune" /><label for="nep">Neptune</label><br>
				<hr>
				<label>Quizz de 10 questions:</label><br>
				<label>Quel est le surnom de la Terre ?</label><br>
				<input style="display:inline-block;" type="radio" class="bouton" name="1" id="un" value="true"/><label for="un" >La planete Bleu</label>
				<input  style="display:inline-block;" type="radio"  class="bouton" name="1" id="unbis" value="false"/><label for="unbis">La planete verte</label>
				<br>	<br>
				<label>Quelles sont les planetes les plus proche du soleil ?</label><br>
				<input style="display:inline-block;" type="radio" class="bouton" name="2" id="deux" value="false"/><label  for="deux">Les planetes gazeuzes</label>
				<input  style="display:inline-block;" type="radio"  class="bouton" name="2"id="deuxbis" value="true"/><label for="deuxbis">Les planete rocheuse</label>
				<br>	<br>
				<label>Quel planete est Surnomé la géantes</label><br>
				<input style="display:inline-block;" type="radio" class="bouton" name="3" id="trois" value="true"/><label for="trois" >Jupiter</label>
				<input  style="display:inline-block;" type="radio"  class="bouton" name="3" id="troisbis" value="false"/><label for="troisbis">Saturne</label>
				<input style="display:inline-block;" type="radio" class="bouton" name="3" id="troistrois" value="false"/><label for="troistrois" >Uranus</label>
				<input  style="display:inline-block;" type="radio"  class="bouton" name="3" id="troisquatre" value="false"/><label for="troisquatre">Neptune</label>
				<br>	<br>
				<label>Quelle planetes ne fait pas partie du systeme solaire ?</label><br>
				<input style="display:inline-block;" type="radio" class="bouton" name="4" id="quatre" value="false"/><label for="quatre" >Vénus</label>
				<input  style="display:inline-block;" type="radio"  class="bouton" name="4" id="quatrebis" value="false"/><label for="quatrebis">Mars</label>
				<input style="display:inline-block;" type="radio" class="bouton" name="4" id="quatretrois" value="true"/><label for="quatretrois" >Pluton</label>
				<input  style="display:inline-block;" type="radio"  class="bouton" name="4" id="quatrequatre" value="false"/><label for="quatrequatre">mercure</label>
				<hr>
				<label for="idee">Suggestion de question :</label>
				<textarea name="idee"  id="idee" rows="3" cols="33"></textarea>

				<hr>
				<input type="submit" class="bouton" name="quizz" Value="Envoyer le formulaire"/>
				
			</fieldset>
		</form>
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