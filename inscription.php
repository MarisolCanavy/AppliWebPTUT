<?php

$bdd = new PDO('mysql:host:localhost;dbname=icare','root','');

if(isset($_POST["forminscription"])){ 
    $nom = htmlspecialchars($_POST['nom']);
    $prénom = htmlspecialchars($_POST['prénom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $password = ($_POST['password']);
    $password2 = ($_POST['password2']); 

  if(!empty($_POST['nom']) AND !empty($_POST['prénom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['password']) AND !empty($_POST['password2'])){

    $nomlength=strlen($nom); 
    $prénomlength=strlen($prénom);
    if($nomlength<=25)
    {
      if($prénomlength<=25)
      {   
       if(filter_var($mail,FILTER_VALIDATE_EMAIL)){
        if($mail==$mail2){
            if($password==$password2){
              $password=password_hash($password, PASSWORD_DEFAULT);
              $insertuser=$bdd->prepare('INSERT INTO infirmier(nom,prénom,email,password) VALUES (?,?,?,?)');
              $insertuser->execute(array($nom,$prénom,$mail,$password));
              $erreur = "Votre compte a bien été créé";
            }
            else{
              $erreur="Vos mots de passe ne correspondent pas !";
            }
          }else{
            $erreur="Vos adresses mails ne correspondent pas !";
          }
        }
        else{
          $erreur="Votre adresse mail n'est pas valide !";
        }
      }
      else{
        $erreur="Votre prénom ne doit pas dépasser 25 caractères !";
      } 
    }
    else{
      $erreur="Votre nom ne doit pas dépasser 25 caractères !";
    } 
  }
  else{
    $erreur="Tous les champs doivent être complétés !";
  }
}
?>
<Html>
  <head>
    <title>Inscription</title>
    <meta charset="utf-8">
  </head>
  <body>
    <div align="center">
      <h2>Inscription</h2>
      <form method="POST" action="">
        <table>
          <tr>
            <td align="right">
            <label for="nom">Nom:</label>  
            </td> 
            <td>   
              <input type="text" placeholder="Votre nom" id="nom" name="nom" value="<?php if(isset($nom)){echo $nom;}?>">
            <td>
          </tr>
          <tr>
            <td align="right">
            <label for="prénom">Prénom:</label>  
            </td> 
            <td>   
              <input type="text" placeholder="Votre prénom" id="prénom" name="prénom" value="<?php if(isset($prénom)){echo $prénom;}?>">
            <td>
          </tr>
          <tr>
            <td align="right">
            <label for="mail">Mail:</label>  
            </td> 
            <td>   
              <input type="text" placeholder="Mail" id="mail" name="mail" value="<?php if(isset($mail)){echo $mail;}?>">
            <td>
          </tr>
          <tr>
            <td align="right">
            <label for="mail2">Confirmer votre mail:</label>  
            </td> 
            <td>   
              <input type="text" placeholder="Confirmer votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)){echo $mail2;}?>">
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
