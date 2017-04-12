<?php

session_start();

$identifiant = isset($_POST['username'])? $_POST['username'] : "";
$password = isset($_POST['mdp'])? $_POST['mdp'] : "";

include '_connexion.php';

$res = mysqli_query($cnx,"SELECT Identifiant, Mdp, Hash FROM membre WHERE Identifiant = '$identifiant'");

// print_r($res);

while ($data = mysqli_fetch_assoc($res)) {

  if ( hash_equals($data['Hash'], crypt($password, $data['Hash'])) ) {
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
