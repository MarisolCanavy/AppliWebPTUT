<?php

session_start();
$bdd = new PDO('mysql:host=localhost;dbname=icare','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.

?>
<Html>
  <head>
    <title>Mon Profil</title>
    <meta charset="utf-8">
  </head>
  <body>
    <div align="center">
      <h2>Profil de <?php echo $_SESSION['prenom'];?> <?php echo $_SESSION['nom'];?></h2>
      <br/>
      Mail : <?php echo $_SESSION['email'];?>
     
  </body>
</html>