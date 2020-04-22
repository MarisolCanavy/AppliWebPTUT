<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Création Fichier Patient">
    <meta name="keywords" content="#">
    <meta name="author" content="Marisol Canavy">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Gelasio&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <!-- INSERER SCRIPT JS -->
    <title>Création Fichier Patient</title>
</head>

<body>
    <header>
        <?php
        include "header.php" ;
       ?>
    </header>
    <main>
        <form class="log-in-form" id="formPatient" style="width: 70%;">
            <h1 class="text-center">Créer un fichier patient</h1>
            <h2 class="text-left">Informations personnelles</h2>
            <div class="grid-x grid-margin-x">
                <div class="cell auto">
                    <label>Nom
                        <input type="text" placeholder="Dupont" id="name" required>
                    </label>
                </div>
                <div class="cell auto">
                    <label>Prénom
                        <input type="text" placeholder="François" id="surname" required>
                    </label>
                </div>
                <div class="cell auto">
                    <label>Date de Naissance
                        <input type="date" placeholder="01/11/1950" id="dateNaiss" required>
                    </label>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class=" cell small-2 medium-2">
                    <label>Type de batiment</label>
                    <select required>
                        <option value="state1">Maison</option>
                        <option value="state2">Appartement</option>
                        <option value="state3">Villa</option>
                    </select>
                </div>
                <div class=" cell small-6 medium-5 ">
                    <label>Adresse</label>
                    <input type="text" placeholder="16 rue Emile Zola" id="road" required>
                </div>
                <div class="cell small-3 medium-2 ">
                    <label>Code Postal
                        <input type="number" placeholder="11000" id="zipcode" required>
                    </label>
                </div>
                <div class="cell auto">
                    <label>Ville
                        <input type="text" placeholder="Carcassonne" id="city" required>
                    </label>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell auto">
                    <label>Numéro de téléphone
                        <input type="tel" placeholder="06 03 35 31 43" id="tellNumber" required>
                    </label>
                </div>
                <div class="cell auto">
                    <label>Mail
                        <input type="email" placeholder="dupont.francois@gmail.fr" id="email" required>
                    </label>
                </div>
            </div>

            <h2 class="text-left">Informations médicales</h2>
            <div class="grid-x grid-margin-x">
                <div class="cell auto">
                    <label>Taille
                        <input type="number" placeholder="1.70" id="taille" required>
                    </label>
                </div>
                <div class="cell auto">
                    <label>Poids
                        <input type="number" placeholder="67" id="poids" required>
                    </label>
                </div>
                <div class="cell small-12" >
                    <label>Commentaires
                        <textarea type="text" placeholder="Il souffre de ...." rows="5" id="commentaire" required></textarea>
                    </label>
                </div>
            </div>

            <p><input type="submit" class="button expanded" value="Créer le fichier"></input></p>
            <!--<p><a class="button expanded" href="#">Créer le fichier</a></p>-->
        </form>
    </main>
    <!-- SCRIPT JS-->
    <script type="text/javascript" src="js/doc.js"></script>
</body>

<footer>
    <p class="text-center">© Copyright 2020 PTUT</p>
</footer>