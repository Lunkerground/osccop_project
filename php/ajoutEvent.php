<?php
include "_connexion.php";

$titre = isset($_POST['eventName'])? $_POST['eventName']: "";
$date = date('d-m-Y', strtotime($_POST['eventDate']));
$affiche = isset($_FILES['eventPoster']['name'])? $_FILES['eventPoster']['name']: "";
$presentation = isset($_POST['eventPresentation'])? $_POST['eventPresentation']: "";
$games = isset($_POST['games'])? explode(",",$_POST['games']):"";
echo $titre."<br>";
echo $date."<br>";
echo $presentation."<br>";
echo $affiche."<br>";
var_dump($games);
// PENSER AU JEUX AJOUTER

$upload = move_uploaded_file($_FILES['eventPoster']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/osccop_project/images/upload/affiche/$affiche") or die(" Votre image n'a pas été uploadé correctement ".$_SERVER['DOCUMENT_ROOT']."/osccop_project/images/upload/affiche/$affiche");

$qry = "INSERT INTO evenement
                  (titre_event, date_event, img_event, txt_event)
               VALUES
                  ('$titre', '$date', 'affiches/$affiche', '$presentation')";

$req = $cnx->prepare($qry);
$req->execute();
$idEvent = $cnx->lastInsertId();
foreach ($games as $idGame) {
  $idGame =(int)$idGame;
  $qryGame = "INSERT INTO jeu_event (id_event, id_jeux) VALUES ($idEvent, $idGame)";
  $qryGame = $cnx->prepare($qryGame);
  $qryGame->execute();
}
    $req->closeCursor();
 ?>
