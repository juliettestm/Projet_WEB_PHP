<video
      id="background-video"
      muted=""
      autoplay="autoplay"
      playsinline
      loop
    >
      <source src="../Images/video/fdw.mp4" type="video/mp4" ></video
    ><!--video arrière plan-->
    <a href="#" id="HDP">.</a> <!-- On crée un lien non définit avec un . pour le bouton haut de page --> 
    <div class="Container_grid">
      <div class="Header_grid">
        <!--Début du header -->
        <header>
          <nav class="navbar">
            <!--Début de la navbar divisé en 5 parties-->
            <button class="button">
              <!--premiere partie-->
              <a id="home" href="../index.php">Accueil</a></button
            ><!--Fin de la premiere partie-->
            <label for="btn" class="icon">
              <img src="../svg/menu.svg" alt="img menu" >
            </label>
            <input type="checkbox" id="btn" >
            <div class="dropdowns">
              <div class="dropdown" id="drop1">
                <!--Deuxieme partie divisé en trois items-->
                <button class="button">
                  Actualités<img
                    src="../svg/chevron.svg"
                    alt="Image fleche en bas"
                  ><!--Tout sur l'actualité avec une image "fléche vers le bas"-->
                </button>
                <div class="dropdown-menu">
                  <div class="dropitem">
                    <!--Début du premier item-->
                    <button>
                      <a
                        class="al"
                        href="https://www.futura-sciences.com/sciences/actualites/astronomie-evenements-astronomiques-ne-pas-manquer-2022-65785/"
                        target="_blank"
                        >Les évènements à ne pas rater</a
                      ><!--Lien permettant de ne rater aucun evenement en cliquant dessus nous ramenant sur le site de furura science-->
                    </button>
                  </div>
                  <!--Fin du premier item-->
                  <div class="dropitem">
                    <!--Début du deuxieme item-->
                    <button>
                      <a
                        class="al"
                        href="https://www.futura-sciences.com/sciences/espace/astronomie/actualites/"
                        target="_blank"
                        >Actualités sur l'astronomie</a
                      ><!--Lien permettant de voir l'actualité de l'astronomie sur le site futura sciences-->
                    </button>
                  </div>
                  <!--Fin du deuxieme item-->
                  <div class="dropitem">
                    <!--Début du troisieme item-->
                    <button>
                      <a
                        class="al"
                        href="https://fr.euronews.com/tag/mission-spatiale"
                        target="_blank"
                        >Prochaines expéditions</a
                      ><!--Lien permettant de voir les prochaines expéditions sur euronews-->
                    </button>
                  </div>
                  <!--Fin du troisieme item-->
                </div>
              </div>
              <!--Fin de la Deuxieme partie-->
              <div class="dropdown">
                <button class="button">
                  <!--Troisieme partie divisée en Trois items-->
                  Partenariats<img
                    src="../svg/chevron.svg "
                    alt="Image fleche en bas"
                  ><!--Nos partenaires-->
                </button>
                <div class="dropdown-menu">
                  <div class="dropitem">
                    <!--Début du premier item-->
                    <button>
                      <a class="al" href="https://www.nasa.gov/" target="_blank"
                        >NASA</a
                      ><!--Lien qui renvoie vers la nasa-->
                    </button>
                  </div>
                  <!--fin du premier item-->
                  <div class="dropitem">
                    <!--Début du Deuxieme item-->
                    <button>
                      <a
                        class="al"
                        href="https://www.esa.int/Space_in_Member_States/France"
                        target="_blank"
                        >ESA-France</a
                      ><!--Lien qui renvoie vers ESA France-->
                    </button>
                  </div>
                  <!--Fin du Deuxieme item-->
                  <div class="dropitem">
                    <!--Début du troisieme item-->
                    <button>
                      <a class="al" href="https://cnes.fr/fr" target="_blank"
                        >CNES</a
                      ><!--Lien qui renvoie vers le CNES-->
                    </button>
                  </div>
                  <!--Fin du troisieme item-->
                </div>
              </div>
              <!--Fin de la troisieme partie-->
              <div class="dropdown">
                <button class="button">
                  <!--Quatrieme partie divisée en trois items-->
                  Produits dérivés
                  <img
                    src="../svg/chevron.svg"
                    alt="Image fleche en bas"
                  ></button
                ><!--Nos produits dérivée-->
                <div class="dropdown-menu">
                  <div class="dropitem">
                    <!--Début du premier item-->
                    <button>
                      <a
                        class="al"
                        href="https://www.maison-astronomie.com/fr/"
                        target="_blank"
                        >Maison-astronomie</a
                      ><!--Lien renvoyant vers un site d'astronomie-->
                    </button>
                  </div>
                  <!--Fin du premier item-->
                  <div class="dropitem">
                    <!--Début du deuxieme item-->
                    <button>
                      <a
                        class="al"
                        href="https://www.nasa-shop.fr/"
                        target="_blank"
                        >Nasa shop</a
                      ></button
                    ><!--Lien renvoyant vers le site de la NASA-->
                  </div>
                  <!--Fin du deuxieme item-->
                  <div class="dropitem">
                    <!--Début du troisieme item-->
                    <button>
                      <a
                        class="al"
                        href="https://www.cite-espace.com/"
                        target="_blank"
                        >Cite-espace</a
                      ><!--Lien renvoyant vers le site de la Cité espace-->
                    </button>
                  </div>
                  <!--Fin du troisieme item-->
                </div>
              </div>
              <!--Fin de la quatriéme partie-->
              <div class="dropdown">
                <button class="button">
                  <!--Cinquieme partie-->
                  Mon Compte<!--parties qui renvoie vers d'autres info-->
                  <img src="../svg/chevron.svg" alt="Image fleche en bas" >
                </button>
                <div class="dropdown-menu">
                  <div class="dropitem">
                    <!--Début du premier item-->
                    <button>
                      <a
                        class="al"
                        href="../Page_PHP_Structure/connexionclients.php"
                        target="_blank"
                        >Connexion</a
                      ><!--Lien vers les missions spatiales sur wikipedia-->
                    </button>
                  </div>
                  <!--Fin du premier item-->
                  <div class="dropitem">
                    <!--Début du deuxieme item-->
                    <button>
                      <a
                        class="al"
                        href="../Page_PHP_Structure/inscription.php"
                        target="_blank"
                        >Inscription</a
                      ><!--Lien renvoyant vers les fusées du sites science et vie-->
                    </button>
                  </div>
                  <!--Fin du deuxieme item-->
                </div>
              </div>
              <!--Fin de la cinquieme partie-->
            </div>
          </nav>
          <!--Fin de la navbar -->
        </header>
      </div>
      <!--Fin du header-->
      <div class="Aside">
        <!--Début de l'Aside-->
        <div id="contener">
          <div id="Titre">
            <h2>Les planètes</h2>
            <!--Afficher un titre-->
          </div>
          <div class="contener_list">
            <!--Container de l'image des planetes-->
            <a class="gauche" href="soleil.php" title="Soleil">
              <img
                id="Soleil"
                class="imageaside"
                src="../Images/Images.png/BeauSoleil-removebg.png"
                alt="Image soleil"
              ><!--Affichage de l'image du soleil avec un lien qui permet d'accéder a la page php du soleil-->
            </a>
            <a href="mercure.php" title="Mercure">
              <img
                id="Mercure"
                class="imageaside"
                src="../Images/Images.png/mercure.png"
                alt="Image mercure"
              ><!--Affichage de l'image du mercure avec un lien qui permet d'accéder a la page php du mercure-->
            </a>
            <a href="venus.php" title="Vénus">
              <img
                id="Venus"
                class="imageaside"
                src="../Images/Images.png/venus.png"
                alt="Image Venus"
              ><!--Affichage de l'image du Vénus avec un lien qui permet d'accéder a la page php du Vénus-->
            </a>
            <a href="terre.php" title="Terre">
              <img
                id="Terre"
                class="imageaside"
                src="../Images/Images.png/terre.png"
                alt="Image Terre"
              ><!--Affichage de l'image du Terre avec un lien qui permet d'accéder a la page php du Terre-->
            </a>
            <a href="mars.php" title="Mars">
              <img
                id="Mars"
                class="imageaside"
                src="../Images/Images.png/mars.png"
                alt="Image Mars"
              ><!--Affichage de l'image du Mars avec un lien qui permet d'accéder a la page php du Mars-->
            </a>
            <a href="jupiter.php" title="Jupiter">
              <img
                id="Jupiter"
                class="imageaside"
                src="../Images/Images.png/jupiter.png"
                alt="Image Jupiter"
              ><!--Affichage de l'image du Jupiter avec un lien qui permet d'accéder a la page php du Jupiter-->
            </a>
            <a href="saturne.php" title="Saturne">
              <img
                id="Saturne"
                class="imageaside"
                src="../Images/Images.png/saturne.png"
                alt="Image Saturne"
              ><!--Affichage de l'image du Saturne avec un lien qui permet d'accéder a la page php du Saturne-->
            </a>
            <a href="uranus.php" title="Uranus">
              <img
                id="Uranus"
                class="imageaside"
                src="../Images/Images.png/uranus.png"
                alt="Image Uranus"
              ><!--Affichage de l'image du Uranus avec un lien qui permet d'accéder a la page php du Uranus-->
            </a>
            <a href="neptune.php" title="Neptune">
              <img
                id="Neptune"
                class="imageaside"
                src="../Images/Images.png/neptune.png"
                alt="Image Neptune"
              ><!--Affichage de l'image du Neptune avec un lien qui permet d'accéder a la page php du Neptune-->
            </a>
          </div>
          <!--Fin du Container de l'image des planetes-->
        </div>
      </div>
      <!--Fin de l'Aside-->