<?php

$bdd = new PDO('mysql:host=localhost;dbname=icare','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.


if(isset($_POST["forminscription"])){ 
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $password = ($_POST['password']);
    $password2 = ($_POST['password2']); 
    $annule=false;

  if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['password']) AND !empty($_POST['password2'])){

    $nomlength=strlen($nom); 
    $prenomlength=strlen($prenom);
    if($nomlength<=25)
    {
      if($prenomlength<=25)
      {   
        if(filter_var($mail,FILTER_VALIDATE_EMAIL))
        {
          if($mail==$mail2)
          {
            $asklistemail=$bdd->prepare("SELECT email FROM profil");
            $asklistemail->execute();
            $nbmail = $asklistemail->rowCount(); 
            for ($i = 1; $i <= $nbmail; $i++) 
            {            
              $listemail = $asklistemail->fetch();
              if ($mail==$listemail['email'])
              {
                $annule=true;
              }
            }
            if($annule==true)
            {
              $erreur = "Le mail que vous avez entré est déjà utilisé";             
            }
            else{
              if($password==$password2)
              {
                $password=password_hash($password, PASSWORD_DEFAULT);
                try
                {
                $insertuser=$bdd->prepare("INSERT INTO profil(nom,prenom,email,password) VALUES (?,?,?,?)");
                $insertuser->execute(array($nom,$prenom,$mail,$password));
                $erreur = "Votre compte a bien été créé <a href='index.php'> Me connecter</a>";
                header('Location:inscription.php');
                }
                catch(PDOException $e)
                {
                  die('Error' . $e->getMessage());
                }
              }          
              else{
                $erreur="Vos mots de passe ne correspondent pas !";
              }
            }
          }
          else{
            $erreur="Vos adresses mails ne correspondent pas !";
          }
        }
        else{
          $erreur="Votre adresse mail n'est pas valide !";
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

<Html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inscription">
    <meta name="keywords" content="">
    <meta name="author" content="Numa Goestchel, Marisol Canavy">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Gelasio&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <!-- INSERER SCRIPT JS
    <script type="text/javascript" src="js/main.js"></script> -->
    <title>Inscription</title>
</head>

<body>
    <form class="log-in-form" method="POST">
        <h1 class="text-center"> S'inscire </h1>
        <table>
            <tr>
                <td align="right">
                    <label for="nom">Nom:</label>
                </td>
                <td>
                    <input type="text" placeholder="Votre nom" id="nom" name="nom"
                        value="<?php if(isset($nom)){echo $nom;}?>">
                <td>
            </tr>
            <tr>
                <td align="right">
                    <label for="prenom">Prenom:</label>
                </td>
                <td>
                    <input type="text" placeholder="Votre prenom" id="prenom" name="prenom"
                        value="<?php if(isset($prenom)){echo $prenom;}?>">
                <td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mail">Mail:</label>
                </td>
                <td>
                    <input type="text" placeholder="Mail" id="mail" name="mail"
                        value="<?php if(isset($mail)){echo $mail;}?>">
                <td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mail2">Confirmer votre mail:</label>
                </td>
                <td>
                    <input type="text" placeholder="Confirmer votre mail" id="mail2" name="mail2"
                        value="<?php if(isset($mail2)){echo $mail2;}?>">
                <td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mdp">Votre mot de passe:</label>
                </td>
                <td>
                    <input type="password" placeholder="Votre mot de passe" id="password" name="password">
                <td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mdp2">Confirmer votre mot de passe</label>
                </td>
                <td>
                    <input type="password" placeholder="Confirmer votre mot de passe" id="password2" name="password2">
                <td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="forminscription" value="Je m'inscris">
                </td>
        </table>
        <br>
    </form>
    <?php
      if(isset($erreur)){
        echo "<font color='red'>".$erreur."</font>";
      }
      ?>
</body>

</html>