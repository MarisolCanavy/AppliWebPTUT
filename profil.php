<?php

session_start();
$bdd = new PDO('mysql:host=localhost;dbname=icare','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
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
    <title>iCare</title>
</head>

<body>
    <header>
       <?php
        include "header.php" ;
       ?>
    </header>
    <main style="transform: translateY(5rem);">
        <div class="grid-container">
            <div class="grid-x grid-margin-y">
                <div class="cell small-4">
                    <div class="cell">
                        <section>
                            <section class="tag-cloud menu vertical left">
                                <a href="profil.php"><i class="fas fa-pencil-alt"></i> Modifier le profil</a>
                                <a href="parametres.php"><i class="fas fa-user-alt"></i> Paramètres du compte</a>
                            </section>
                        </section>
                    </div>
                </div>
                <div class="cell auto">
                    <div class="grid-y">
                        <div class="cell shrink">
                            <div class="grid-x">
                                <div class="cell small-8">
                                    <h1>Modifier le profil</h1>
                                    <p> Voici les informations relatives à votre profil, pour les modifier,
                                        c'est
                                        simple
                                        !
                                        Corrigez les et cliquez sur "terminer"</p>
                                </div>
                                <div class="cell auto">
                                    <div class="tag-cloud">
                                        <div class="tag-cloud menu">
                                            <button>
                                                <a href="#"> Annuler</a>
                                            </button>
                                            <button>
                                                <a href="#"> Terminer</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cell shrink">
                            <h2>Photo</h1>
                                <img class="photo-de-profil" src="img/emma.png" />
                                <button>
                                    <a href="#"> Modifier</a>
                                </button>
                        </div>
                        <div class="cell shrink">
                            <div class="grid-x">
                                <div class="cell small-6">
                                    <h2>Nom</h2>
                                    <input><?php echo $_SESSION['nom'];?></input>
                                </div>
                                <div class="cell small-6">
                                    <h2>Prénom</h2>
                                    <input><?php echo $_SESSION['prenom'];?></input>
                                </div>
                            </div>
                        </div>
                        <div class="cell shrink">
                            <h2>Date de Naissance</h2>
                            <input></input>
                        </div>
                        <div class="cell shrink">
                            <h2>Adresse</h2>
                            <div>
                                <input></input>
                                <input></input>
                                <input></input>
                            </div>
                        </div>
                        <div class="cell shrink">
                            <h2>Commentaire</h2>
                            <input></input>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<footer>

</footer>