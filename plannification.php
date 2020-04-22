<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Plannification">
    <meta name="keywords" content="#">
    <meta name="author" content="Marisol Canavy">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Gelasio&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <!-- INSERER SCRIPT JS
    <script type="text/javascript" src="js/main.js"></script> -->
    <script type="text/javascript" src="js/map.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7td1HhAOlS7anji57xGNO5qulQAFNipA&callback=initMap"></script>
    <title>Plannification</title>
</head>

<body>
    <header>
        <div class="sticky-container" data-sticky-container style="height: 4rem;">
            <div class="sticky xticky-topbar is-stuck is-at-top" data-sticky="ne76bl-cticky"
                data-options="anchor: page; marginTop: 0; stickyOn: small;"
                style="max-width: 1680px; margin-top: 0em; top: 0px; bottom: auto;" data-events="resize">
                <div class="top-bar" role="banner">
                    <div class="top-bar-left">
                        <ul class="menu dropdown">
                            <li class="menu-text"> iCare</li>
                            <li><a href="plannification.html">Plannification</a></li>
                            <li><a href="planning.html">Planning</a></li>
                            <li class="has-submenu is-dropdown-submenu-parent opens-right" id="maCreation">
                                <a href="#">Création</a>
                                <ul class="submenu menu vertical is-dropdown-submenu first-sub"
                                    id="afficherInfosCreation">
                                    <li><a href="creationPatient.html">Fichier Patient</a></li>
                                    <li><a href="creationInfirmier.html">Fichier Infirmier</a></li>
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
                                    <li><a href="monprofil.html">Mon profil</a></li>
                                    <li><a href="monprofil.html">Mon compte</a></li>
                                    <li><a href="paramètres.html">Paramètres</a></li>
                                    <li><a href="connexion.html">Déconnexion</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="grid-container">
            <div class="grid-y grid-margin-y">
                <div class="cell small-4">
                    <div class="cell">
                        <section class="tag-cloud-section">
                            <h5 class="tag-cloud-title">INFIRMIER.E.S DISPONIBLE.S</h5>
                            <section class="tag-cloud">
                                <a class="tag-cloud-individual-tag" onclick="afficheItineraire()">Jere</a>
                                <a class="tag-cloud-individual-tag" onclick="afficheItineraire2()">Alice</a>
                                <a class="tag-cloud-individual-tag" href="#">Gilles</a>
                                <a class="tag-cloud-individual-tag" href="#">Juliette</a>
                                <a class="tag-cloud-individual-tag" href="#">Lucas</a>
                            </section>
                        </section>
                    </div>
                </div>
                <div class="cell" style="height: 600px;">
                    <div class="grid-x grid-margin-x" style="height: inherit;">
                        <div class="cell auto">
                            <div id="map"></div>
                        </div>
                        <div class="cell small-4">
                            <div class="grid-y grid-margin-y">
                                <div class="cell auto">
                                    <section class="cell tag-cloud-section">
                                        <h5 class="tag-cloud-title"> <a onclick="affichePlusieursMarqueurs()"
                                                style="color: inherit;">Liste de.s
                                                patient.s à prendre en charge : </a></h5>
                                        <section class="tag-cloud menu vertical">
                                            <!-- Afficher tous les marqueurs : fonction js + php -->
                                            <a class="tag-cloud-individual-tag"
                                                onclick="positionnerMarqueur()">Danielle</a>
                                            <a class="tag-cloud-individual-tag" href="#">Armande</a>
                                            <a class="tag-cloud-individual-tag" href="#">Jean</a>
                                        </section>
                                    </section>
                                </div>
                                <div class="cell auto">
                                    <section class="cell tag-cloud-section" style="transform: translateY(100%);">
                                        <strong>Infirmier: </strong>
                                        <select id="infirmier" onchange="#">
                                            <option value="#">Jere</option>
                                            <option value="#">Alice</option>
                                            <option value="#">Gilles</option>
                                            <option value="#">Juliette</option>
                                            <option value="#">Lucas</option>
                                        </select>
                                        <strong>Patient: </strong>
                                        <select id="patient">
                                            <option value="#">Danielle</option>
                                            <option value="#">Armande</option>
                                            <option value="#">Jean</option>
                                        </select>
                                        <p><a class="button expanded" href="#">Associer</a></p>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- SCRIPT JS-->
    <script type="text/javascript" src="js/doc.js"></script>
</body>

<footer>
    <p class="text-center">© Copyright 2020 PTUT</p>
</footer>