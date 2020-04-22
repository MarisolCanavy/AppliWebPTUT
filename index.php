<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=icare','root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.

    if (isset($_POST['formconnexion'])){
        $mailconnect = htmlspecialchars($_POST['mailconnexion']);
        $passwordconnect= ($_POST['mdpconnexion']);
        if(!empty($mailconnect) AND !empty($passwordconnect)){
            $requser = $bdd->prepare("SELECT * FROM profil WHERE email=?");
            $requser->execute(array($mailconnect));
            $userexist = $requser->rowCount();
            $userinfo = $requser->fetch();
            if($userexist==1){
                if (password_verify($passwordconnect, $userinfo['password'])){ 
                    $_SESSION['id']=$userinfo['id'];
                    echo $userinfo['id'];
                    $_SESSION['nom']=$userinfo['nom'];
                    $_SESSION['prenom']=$userinfo['prenom'];
                    $_SESSION['email']=$userinfo['email'];
                    header("Location:acceuil.php?id=".$_SESSION['id']);
                } 
                else{echo "Mauvais identifiant ou mot de passe! 2";
                }
            }
            else{
                echo "Mauvais identifiant ou mot de passe!";
                
            }
        }
        else{$erreur = "Tous les champs doivent être complétés !";}
    }
?>

<!DOCTYPE html>
<html lang="fr">
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
      <input type="email" placeholder="monmail@exemple.fr" name="mailconnexion" required>
    </label>
    <label>Mot de Passe
      <input type="password" placeholder="Mot de Passe" name="mdpconnexion" required>
      <!-- Mettre un truc clicable pour montrer le mdp-->
    </label>
    <p><input type="submit" class="button expanded" value="Connexion" name="formconnexion" >
    </input></p>
    <p class="text-center" ><a href="#" >Mot de passe oublié</a></p>
    <p class="text-center" ></a>Vous n'avez pas de compte? <a href="inscription.php" >S'inscrire</a></p>
    </form>
          <?php
      if(isset($erreur)){
        echo "<font color='red'>".$erreur."</font>";
      }
      ?>
    </body>

<footer>
    <p class="text-center">© Copyright 2020 PTUT</p>
</footer>
</html>