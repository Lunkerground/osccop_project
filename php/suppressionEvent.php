<?php

include "_connexion.php";

$id_event = $_POST['id'];

  $qry = "DELETE FROM `evenement` WHERE id_event = '$id_event'";

  $req = $cnx->prepare($qry);
  $req->execute();

 ?>
