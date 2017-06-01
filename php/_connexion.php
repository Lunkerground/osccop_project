<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try {
    $cnx = new PDO('mysql:dbname=osccop;host=localhost', 'root', 'kissman');
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

  // try {
  //   $cnx = new PDO('mysql:dbname=osccop;host=localhost', 'root', 'Bi0shock');
  // } catch (PDOException $e) {
  //   echo 'Connexion échouée : ' . $e->getMessage();
  // }

?>
