<?php
include_once('_connexion.php');

    $i = 0;
    $titreDataAll = array();
    $mois = $_POST['mois'];
    $annee = $_POST['annee'];
    if ($mois != "") {
      $res = "SELECT titre_event, id_event FROM evenement WHERE date_event LIKE '%-$mois-$annee%'";
    }
    elseif ($annee != "") {
      $res = "SELECT titre_event, id_event FROM evenement WHERE date_event LIKE '%-$annee'";
    }
    $data = $cnx->prepare($res);
    $data->execute();
    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
      $titreDataAll[] = $row;
    }
    echo json_encode($titreDataAll);

?>
