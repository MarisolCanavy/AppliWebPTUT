<?php

$bdd = new PDO('mysql:host=localhost;dbname=icare','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.
?>
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
       <?php
        include "header.php" ;
       ?>
    </header>
    <main>
        <div class="grid-container">
            <div class="grid-y grid-margin-y">
                <div class="cell small-4">
                    <div class="cell">
                        <section class="tag-cloud-section">
                            <h5 class="tag-cloud-title">INFIRMIER.E.S DISPONIBLE.S</h5>
                            <section class="tag-cloud">
                                <?php
                                $rechercheInfirmier=$bdd->prepare("SELECT nom,prenom from infirmier");
                                $rechercheInfirmier->execute();
                                $nbInfirmier = $rechercheInfirmier->rowCount(); 
                                for ($i = 1; $i <= $nbInfirmier; $i++) 
                                {            
                                  $listeInf = $rechercheInfirmier->fetch();
                                  echo "<a class='tag-cloud-individual-tag' onclick='afficheItineraire()''>",$listeInf['nom']," ",$listeInf['prenom'],"</a>";
                                }
                                ?>
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
                                            <?php
                                            $recherchePatient=$bdd->prepare("SELECT nom,prenom from patient");
                                            $recherchePatient->execute();
                                            $nbPatient = $recherchePatient->rowCount(); 
                                            for ($i = 1; $i <= $nbPatient; $i++) 
                                            {            
                                              $listePat = $recherchePatient->fetch();
                                              echo "<a class='tag-cloud-individual-tag'
                                                onclick='positionnerMarqueur()'>",$listePat['nom']," ",$listePat['prenom'],"</a>";
                                            }
                                            ?>
                                        </section>
                                    </section>
                                </div>
                                <div class="cell auto">
                                    <section class="cell tag-cloud-section" style="transform: translateY(100%);">
                                        <strong>Infirmier: </strong>
                                        <select id="infirmier" onchange="#">
                                            <?php
                                            $rechercheInfirmier=$bdd->prepare("SELECT nom,prenom from infirmier");
                                            $rechercheInfirmier->execute();
                                            $nbInfirmier = $rechercheInfirmier->rowCount(); 
                                            for ($i = 1; $i <= $nbInfirmier; $i++) 
                                            {            
                                              $listeInf = $rechercheInfirmier->fetch();
                                              echo "<option value='#'>",$listeInf['nom']," ",$listeInf['prenom'],"</option>";
                                            }
                                            ?>
                                        </select>
                                        <strong>Patient: </strong>
                                        <select id="patient">
                                            <?php
                                            $recherchePatient=$bdd->prepare("SELECT nom,prenom from patient");
                                            $recherchePatient->execute();
                                            $nbPatient = $recherchePatient->rowCount(); 
                                            for ($i = 1; $i <= $nbPatient; $i++) 
                                            {            
                                              $listePat = $recherchePatient->fetch();
                                              echo "<option value='#'>",$listePat['nom']," ",$listePat['prenom'],"</option>";
                                            }
                                            ?>
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