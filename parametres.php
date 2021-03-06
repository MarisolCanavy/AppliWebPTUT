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
        <div class="top-bar" role="banner">
            <div class="top-bar-left">
                <ul class="menu">
                    <li class="menu-text"> iCare</li>
                    <li><a href="plannification.php">Plannification</a></li>
                    <li><a href="#">Planning</a></li>
                    <li><a href="#">Messagerie</a></li>
                    <li><a href="#">Alertes</a></li>
                    <li><input type="search" placeholder="Effectuer une recherche"></li>
                    <li><button type="button" class="button">Recherche</button></li>
                </ul>
            </div>
            <div class="top-bar-right">
                <ul class="menu">
                    <li><img class="photo-de-profil" src="img/emma.png"></li>
                    <li><a href="#">Mon profil</a></li>
                    <li><a href="#">Paramètres</a></li>
                    <li><a href="#">Déconnexion</a></li>
                </ul>
            </div>
        </div>
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
                                    <h1>Modifier les données de connexion</h1>
                                    <p> Voici les informations relatives à votre profil, pour les modifier,
                                        c'est
                                        simple
                                        !
                                        Corrigez les et cliquez sur "terminer" !</p>
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
                            <h2> Informations de base </h2>
                            <div class="cell small-8">
                                <h3>Mail</h3>
                                <input><?php echo $_SESSION['email'];?></input>
                                <h3>Mot de passe</h3>
                                <input></input>
                            </div>
                        </div>
                        <div class="cell shrink">
                            <h2> Modifications du compte </h2>
                            <div class="grid-x">
                                <div class="cell small-8">
                                    <p>Supprimer le compte et les données qui y sont associés</p>
                                </div>
                                <div class="cell auto text-center">
                                    <button>
                                        <a href="#">Fermer le compte</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<footer>

</footer>