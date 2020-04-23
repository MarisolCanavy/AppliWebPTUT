<?php

$bdd = new PDO('mysql:host=localhost;dbname=icare','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.

    $valide='';
if(isset($_POST['creationPatient'])){ 
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $dateNaissance = htmlspecialchars($_POST['dateNaissance']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $codePostal = htmlspecialchars($_POST['codePostal']); 
    $ville = htmlspecialchars($_POST['ville']); 
    $telephone = htmlspecialchars($_POST['telephone']); 
    $commentaire = htmlspecialchars($_POST['commentaire']); 
    $poids = htmlspecialchars($_POST['poids']); 
    $taille = htmlspecialchars($_POST['taille']); 
    $typeHabitation = htmlspecialchars($_POST['typeHabitation']); 
    $annule=false;

  if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['dateNaissance']) AND !empty($_POST['adresse']) AND !empty($_POST['codePostal']) AND !empty($_POST['ville']) AND !empty($_POST['telephone']) AND !empty($_POST['commentaire']) AND !empty($_POST['poids']) AND !empty($_POST['taille']) AND !empty($_POST['typeHabitation'])){

    $nomlength=strlen($nom); 
    $prenomlength=strlen($prenom);
    if($nomlength<=25)
    {
      if($prenomlength<=25)
      {  
        $asklistemail=$bdd->prepare("SELECT email FROM patient");
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
        $insertuser=$bdd->prepare("INSERT INTO patient(nom,prenom,email,dateNaissance,adresse,codePostal,ville,telephone,commentaire,taille,poids,typeHabitation) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $insertuser->execute(array($nom,$prenom,$email,$dateNaissance,$adresse,$codePostal,$ville,$telephone,$commentaire,$taille,$poids,$typeHabitation));
        $valide="Fichier envoyé";
        header('Location:creationPatient.php');
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
        <form class="log-in-form" id="formPatient" method='POST' style="width: 70%;">
            <h1 class="text-center">Créer un fichier patient</h1>
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
                <div class=" cell small-2 medium-2">
                    <label>Type de batiment</label>
                    <select  id="typeHabitation" name="typeHabitation" required>
                        <option value="state1">Maison</option>
                        <option value="state2">Appartement</option>
                        <option value="state3">Villa</option>
                    </select>
                </div>
                <div class=" cell small-6 medium-5 ">
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

            <h2 class="text-left">Informations médicales</h2>
            <div class="grid-x grid-margin-x">
                <div class="cell auto">
                    <label>Taille
                        <input type="number" placeholder="1.70" id="taille" name="taille" required>
                    </label>
                </div>
                <div class="cell auto">
                    <label>Poids
                        <input type="number" placeholder="67" id="poids" name="poids" required>
                    </label>
                </div>
                <div class="cell small-12" >
                    <label>Commentaires
                        <textarea type="text" placeholder="Il souffre de ...." rows="5" id="commentaire" name="commentaire" required></textarea>
                    </label>
                </div>
            </div>

            <p><input type="submit" class="button expanded" name="creationPatient" value="Créer le fichier"></input></p>
            <!--<p><a class="button expanded" href="#">Créer le fichier</a></p>-->
        </form>
    </main>
    <!-- SCRIPT JS-->
    <script type="text/javascript" src="js/doc.js"></script>
</body>

<footer>
    <p class="text-center">© Copyright 2020 PTUT</p>
</footer>