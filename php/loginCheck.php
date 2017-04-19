<?php

session_start();

$identifiant = isset($_POST['username'])? $_POST['username'] : "";
$password = isset($_POST['mdp'])? $_POST['mdp'] : "";

include '_connexion.php';

$res = "SELECT Identifiant, Mdp, Hash FROM membre WHERE Identifiant = '$identifiant'";

$data = $cnx->prepare($res);
$data->execute();
while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

  if ( hash_equals($row['Hash'], crypt($password, $row['Hash'])) ) {
    $_SESSION['login'] = true;
    $_SESSION['user'] = $identifiant;
    header('location:../pages/admin.php');
  }
  else {
    $_SESSION['login'] = false;
    header('location:../index.php');
  }
}


 ?>
