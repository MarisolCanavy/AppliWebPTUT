<?php

    $bdd = new PDO('mysql:host:127.0.0.1;dbname=icare','root','');

    if (isset($_POST['formconnexion'])){
        $mailconnect = htmlspecialchars($_POST['adressemail']);
        $passwordconnect= password_hash(($_POST['motdepasse']), PASSWORD_DEFAULT);
        if(!empty($mailconnect) AND !passwordconnect($passwordconnect)){
            $requser = $bdd->prepare("SELECT idInfirmier,password FROM Infirmier WHERE nom= Bernard");
            $requser->execute(array($nom));
            $userifo = $requser->fetch();
            $isPasswordCorrect = password_verify($passwordconnect, $userifo['password']);
            if(!$userifo){
                echo "Mauvais identifiant ou mot de passe!";
            }
            else{
                if ($isPasswordCorrect){
                    session_start();
                    $_SESSION['idInfirmier']=$userinfo['idInfirmier'];
                    $_SESSION['nom']=$userinfo['nom'];
                    $_SESSION['email']=$userinfo['email'];
                    header("Location:acceuil.html");
                } 
                else{echo "Mauvais identifiant ou mot de passe!";
                }
            }
        }
        else{$erreur = "Tous les champs doivent être complétés !";}
    }
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Acceuil Page">
    <meta name="keywords"
        content="article, articles, e-sante, e-santé, junior-entreprise, cnje, junior-entreprises, tarn, castres, junior-entreprise e-sante, junior-entreprise tarn">
    <meta name="author" content="Marisol Canavy">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" >
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Gelasio&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <!-- INSERER SCRIPT JS
    <script type="text/javascript" src="js/main.js"></script> -->
    <title>Connexion</title>
</head>

<header>
    <!--pas de header car unique page de connexion-->
</header>
<body>
    <form class="log-in-form" method="POST" action="">
    <h1 class="text-center">Se connecter</h4>
    <label>Mail
      <input type="email" placeholder="monmail@exemple.fr" id="adressemail" required>
    </label>
    <label>Mot de Passe
      <input type="password" placeholder="Mot de Passe" id="motdepasse" required>
      <!-- Mettre un truc clicable pour montrer le mdp-->
    </label>
    <p><input type="submit" class="button expanded" value="Connexion" name="formconnexion" >
    </input></p>
    <p class="text-center" ><a href="#" >Mot de passe oublié</a></p>
    <p class="text-center" ></a>Vous n'avez pas de compte? <a href="inscription.php" >S'inscrire</a></p>
    </form>
    </body>

<footer>
    <p class="text-center">© Copyright 2020 PTUT</p>
</footer>