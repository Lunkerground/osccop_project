<?php
include_once '_connexion.php';

$gameId = isset($_GET['id'])?$_GET['id']:"";
try {
    // sql to delete a record
  $sql = "DELETE FROM jeu WHERE id_jeu='$gameId'";

    // use exec() because no results are returned
  $cnx->exec($sql);
  echo "OK";
}
catch(PDOException $e)
{
  echo $sql . "<br>" . $e->getMessage();
}

$cnx = null;
 ?>
