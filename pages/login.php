<?php

session_start();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="../php/loginCheck.php" method="post">
      <label for="username">Identifiant :</label>
      <input type="text" name="username" value="">
      <label for="mdp">Mot de passe :</label>
      <input type="password" name="mdp" value="">
      <input type="submit" name="name" value="Connexion">
    </form>
  </body>
</html>
