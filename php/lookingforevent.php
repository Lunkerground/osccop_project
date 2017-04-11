<?php
$cnx = mysqli_connect('localhost', 'root', 'codeurKiFFeur', 'osccop') or die('error='.mysqli_connect_errno());

    $i = 0;
    $titreDataAll = array();
    $mois = $_POST['mois'];
    $annee = $_POST['annee'];
    if ($mois != "") {
      $res = mysqli_query($cnx, "SELECT titre_event, id_event FROM evenement WHERE date_event LIKE '%/$mois/$annee%'");
    }
    elseif ($annee != "") {
      $res = mysqli_query($cnx, "SELECT titre_event, id_event FROM evenement WHERE date_event LIKE '%/$annee'");
    }
    while ($data = mysqli_fetch_assoc($res)) {
      $titreDataAll[$i] = $data;
      $i++;
    }
    echo json_encode($titreDataAll);
    mysqli_close($cnx);

?>
