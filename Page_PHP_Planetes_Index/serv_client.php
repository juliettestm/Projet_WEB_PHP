!DOCTYPE html>
<html lang="fr">
<head>
  <?php  include("../Page_PHP_Structure/header.php");?>
</head>
<body>
<?php  include("../Page_PHP_Structure/aside.php");?>

<div class="Main_grid">
        <!--Début du main-->
        <main>
          <div>
            <form method="post" action="#" class="formLetter">
              <fieldset>
                <legend>Informations sur vous</legend><!--Premiere partie les informationd sur l'utilisateur-->

                <label>Genre:</label
                ><!--Damande du genre-->
                <br >
                <br >
                <input class="boutonrad" type="radio" name="genre" id="mme" >
                <label for="mme">Féminin</label>
                <br ><!--Avec la classe bouton l'identifiant Madame-->
                <br >
                <input class="boutonrad" type="radio" name="genre" id="mr" >
                <label for="mr">Masculin</label>
                <!--Avec la classe bouton l'identifiant Monsieur-->
                <br ><br >

                <label for="nom">Nom :</label
                ><!--Demande du nom-->
                <input
                  required
                  class="bouton"
                  type="text"
                  name="nom"
                  id="nom"
                  placeholder="Votre nom"
                ><!-- l'utilisateur va remplir son nom dans l'input -->
                <br ><br >

                <label for="prenom">Prénom :</label
                ><!--Demande du prénom-->
                <input
                  required
                  class="bouton"
                  type="text"
                  name="prenom"
                  id="prenom"
                  placeholder="Votre prénom"
                ><!-- l'utilisateur va rentrer son prénom dans l'input-->
                <br ><br >

                <label for="courriel">Courriel : </label
                ><!-- Demande du courier-->
                <input
                  required
                  class="bouton"
                  type="email"
                  name="courriel"
                  id="courriel"
                  placeholder="Mail"
                ><!-- l'utilisateur va rentrer son couriel dans l'input-->
              </fieldset>
              <fieldset id="fieldset2">
                <legend>Votre demande</legend>
                <!-- Deuxieme partie les Demande spécifique de l'utilisateur-->

                <label for="objet">Objet du message :</label
                ><!--L'objet du message-->
                <select id="objet" name="objet" required>
                  <option value="0">- Séléctionner -</option>
                  <!--A choix multiple-->
                  <option value="sugg">Suggestions</option>
                  <!--Premier choix suggestion -->
                  <option value="recl">Reclamations</option>
                  <!-- Deuxieme choix Reclamation-->
                  <option value="insc">Inscription</option>
                  <!--Troisieme choix Inscription-->
                  <option value="prob">Problèmes techniques</option>
                  <!--Quatrieme choix probléme technique-->
                  <option value="autr">Autre...</option>
                </select>
                <br ><br >
                <label for="description">Message :</label>
                <br ><!--Le Message-->
                <textarea
                  rows="10"
                  cols="50"
                  name="description"
                  id="description"
                  maxlength="200"
                ></textarea
                ><!--A remplir pour nous expliquer le besoin de l'utilisateur-->
                <br ><br >

                <label for="document">Document:</label
                ><!--Les documents si l'utilisateur veut en ajouter-->
                <input
                  class="bouton"
                  type="file"
                  id="document"
                  name="document"
                >
                <br ><br >
                <input
                  class="bouton"
                  type="submit"
                  name="Envoyer"
                  id="soumission"
                  value="Envoyer"
                ><!--Le bouton envoyer -->
                <input class="bouton" type="reset" ><!--Ou le bouton Effacer-->
              </fieldset>
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
