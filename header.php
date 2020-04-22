 <div class="sticky-container" data-sticky-container style="height: 4rem;">
            <div class="sticky xticky-topbar is-stuck is-at-top" data-sticky="ne76bl-cticky"
                data-options="anchor: page; marginTop: 0; stickyOn: small;"
                style="max-width: 1680px; margin-top: 0em; top: 0px; bottom: auto;" data-events="resize">
                <div class="top-bar" role="banner">
                    <div class="top-bar-left">
                        <ul class="menu dropdown">
                            <li class="menu-text"> iCare</li>
                            <li><a href="plannification.php">Plannification</a></li>
                            <li><a href="planning.php">Planning</a></li>
                            <li class="has-submenu is-dropdown-submenu-parent opens-right" id="maCreation">
                                <a href="#">Création</a>
                                <ul class="submenu menu vertical is-dropdown-submenu first-sub"
                                    id="afficherInfosCreation">
                                    <li><a href="creationPatient.php">Fichier Patient</a></li>
                                    <li><a href="creationInfirmier.php">Fichier Infirmier</a></li>
                                </ul>
                            </li>
                            <li><a href="messagerie.html">Messagerie</a></li>
                            <li><input type="search" placeholder="Faire une recherche" id="recherche"></li>
                            <li><button type="button" class="button">Recherche</button></li>
                            <!-- action php en fonction de la recherche-->
                        </ul>
                    </div>
                    <div class="top-bar-right">
                        <ul class="dropdown menu">
                            <li><img class="photo-de-profil" src="img/emma.png" alt="#"></li>
                            <li class="has-submenu is-dropdown-submenu-parent opens-right" id="monCompte">
                                <a href="#">Mon Compte</a>
                                <!-- insérer un effet à la déconnexion-->
                                <ul class="submenu menu vertical is-dropdown-submenu first-sub"
                                    id="afficherInfosCompte">
                                    <li><a href="profil.php">Mon profil</a></li>
                                    <li><a href="parametres.php">Paramètres</a></li>
                                    <li><a href="deconnexion.php">Déconnexion</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>