<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=icare','root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs

    if(isset($_GET['id']) AND $_GET['id']>0){
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare("SELECT * FROM profil WHERE id=?");
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Accueil">
    <meta name="keywords" content="#">
    <meta name="author" content="Marisol Canavy">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Gelasio&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <title>Accueil</title>
</head>

<body>
    <header>
       <?php
        include "header.php" ;
       ?>
    </header>
    <main>
        <div class="grid-container fluid">
            <div class="grid-x grid-margin-x">
                <!--Droite texte + flèche-->
                <div class="cell small-4">
                    <div class="cell" style="transform: translateY(50%);">
                        <h1>Bonjour, <?php echo $_SESSION['prenom'];?></h1> <br> <!-- récuperer le nom et l'afficher-->
                        <h2>Comment allez-vous?</h2> <br>
                        <p>Prête pour une nouvelle journée?</p><br>
                        <p><a class="button expanded" href="plannification.html">Commencer la plannification</a></p>
                    </div>
                </div>
                <!-- Droite gauche illustration-->
                <div class="cell auto">
                    <div class="illustration">
                        <img src="img/calendar-colour-800px.png">
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
<?php

?>