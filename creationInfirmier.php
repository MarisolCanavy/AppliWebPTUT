<?php

$bdd = new PDO('mysql:host=localhost;dbname=icare','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.

    $valide='';
if(isset($_POST['creationInfirmier'])){ 
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $dateNaissance = htmlspecialchars($_POST['dateNaissance']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $codePostal = htmlspecialchars($_POST['codePostal']); 
    $ville = htmlspecialchars($_POST['ville']); 
    $telephone = htmlspecialchars($_POST['telephone']); 
    $commentaire = htmlspecialchars($_POST['commentaire']); 
    $annule=false;

  if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['dateNaissance']) AND !empty($_POST['adresse']) AND !empty($_POST['codePostal']) AND !empty($_POST['ville']) AND !empty($_POST['telephone']) AND !empty($_POST['commentaire'])){

    $nomlength=strlen($nom); 
    $prenomlength=strlen($prenom);
    if($nomlength<=25)
    {
      if($prenomlength<=25)
      {  
        $asklistemail=$bdd->prepare("SELECT email FROM infirmier");
        $asklistemail->execute();
        $nbmail = $asklistemail->rowCount(); 
        for ($i = 1; $i <= $nbmail; $i++) 
        {            
          $listemail = $asklistemail->fetch();
          if ($email==$listemail['email'])
          {
            $annule=true;
          }
        }
        if($annule==true)
        {
          $valide = "Le mail que vous avez entré est déjà utilisé";             
        }
        else{
        $insertuser=$bdd->prepare("INSERT INTO infirmier(nom,prenom,email,dateNaissance,adresse,codePostal,ville,telephone,commentaire) VALUES (?,?,?,?,?,?,?,?,?)");
        $insertuser->execute(array($nom,$prenom,$email,$dateNaissance,$adresse,$codePostal,$ville,$telephone,$commentaire));
        $valide="Fichier envoyé";
        header('Location:creationInfirmier.php');
        }
      }
      else{
        $erreur="Votre prenom ne doit pas depasser 25 caractères !";
      } 
    }
    else{
    $erreur="Votre nom ne doit pas depasser 25 caractères !";
    } 
  }
  else{
    $erreur="Tous les champs doivent être completes !";
  }
} 
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Création Fichier Infirmier">
    <meta name="keywords" content="#">
    <meta name="author" content="Marisol Canavy">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Gelasio&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <!-- INSERER SCRIPT JS -->
    <title>Création Fichier Infirmier</title>
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
                                    <li><a href="profil.php">Mon profil</a></li>
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
        <form class="log-in-form" id="formPatient" method='POST' style="width: 70%;">
            <h1 class="text-center">Créer un fichier infirmier</h1>
            <h2 class="text-left">Informations personnelles</h2>
            <div class="grid-x grid-margin-x">
                <div class="cell auto">
                    <label>Nom
                        <input type="text" placeholder="Dupont" id="nom" name="nom" required>
                    </label>
                </div>
                <div class="cell auto">
                    <label>Prénom
                        <input type="text" placeholder="François" id="prenom" name="prenom" required>
                    </label>
                </div>
                <div class="cell auto">
                    <label>Date de Naissance
                        <input type="date" placeholder="01/11/1950" id="dateNaissance" name="dateNaissance" required>
                    </label>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class=" cell auto ">
                    <label>Adresse</label>
                    <input type="text" placeholder="16 rue Emile Zola" id="adresse" name="adresse" required>
                </div>
                <div class="cell small-3 medium-2 ">
                    <label>Code Postal
                        <input type="number" placeholder="11000" id="codePostal" name="codePostal" required>
                    </label>
                </div>
                <div class="cell auto">
                    <label>Ville
                        <input type="text" placeholder="Carcassonne" id="ville" name="ville" required>
                    </label>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell auto">
                    <label>Numéro de téléphone
                        <input type="tel" placeholder="06 03 35 31 43" id="telephone" name="telephone" required>
                    </label>
                </div>
                <div class="cell auto">
                    <label>Mail
                        <input type="email" placeholder="dupont.francois@gmail.fr" id="email" name="email" required>
                    </label>
                </div>
            </div>

            <h2 class="text-left">Commentaires</h2>
            <div class="grid-x grid-margin-x">
                
                <div class="cell small-12" >
                    <label>
                        <textarea type="text" placeholder="Il souffre de ...." rows="5" id="commentaire" name="commentaire" required></textarea>
                    </label>
                </div>
            </div>

            <p><input type="submit" class="button expanded" name="creationInfirmier" value="Créer le fichier"></input></p>
            <!--<p><a class="button expanded" href="#">Créer le fichier</a></p>-->
        </form>
        <?php
        echo $valide; 
        ?>
    </main>
    <!-- SCRIPT JS-->
    <script type="text/javascript" src="js/doc.js"></script>
</body>

<footer>
    <p class="text-center">© Copyright 2020 PTUT</p>
</footer>