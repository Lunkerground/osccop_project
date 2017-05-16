<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  try {
      $cnx = new PDO('mysql:dbname=osccop;host=localhost', 'root', 'codeurKiFFeur');
  } catch (PDOException $e) {
      echo 'Connexion échouée : ' . $e->getMessage();
  }
