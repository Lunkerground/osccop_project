<?php

include "_connexion.php";

$res = "SELECT * FROM evenement WHERE id_event  = '".$_POST['idEvent']."'";

$data = $cnx->prepare($res);
$data->execute();
$data = $data->fetch(PDO::FETCH_ASSOC);

$ancienneAffiche = $data['img_event'];

var_dump($_POST);

$id_event = $_POST['idEvent'];
$titre = isset($_POST['modEventName'])? $_POST['modEventName']: "";
$date = date('d-m-Y', strtotime(isset($_POST['modEventDate'])? $_POST['modEventDate']: ""));
$presentation = isset($_POST['modEventPresentation'])? $_POST['modEventPresentation']: "";
  if ($_FILES['modEventPoster']['name'] == "") {
    $affiche = $ancienneAffiche;
  }
  else {
    $affiche = 'affiches/'.$_FILES['modEventPoster']['name'];
  }

  $qry = "UPDATE evenement SET titre_event = '$titre', date_event = '$date', img_event = '$affiche', txt_event = '$presentation' WHERE id_event = '$id_event'";


  $req = $cnx->prepare($qry);
  $req->execute();

echo $date;
// echo $affiche;
// var_dump($_FILES);
// echo $data['img_event'];

 ?>
