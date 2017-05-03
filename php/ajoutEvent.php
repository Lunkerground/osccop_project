<?php

$nom = isset($_POST['name'])? $_POST['name']: "";
$date = date('d-m-Y', strtotime($_POST['time']));
$affiche = isset($_FILES['affiche']['name'])? $_FILES['affiche']['name']: "";
$presentation = isset($_POST['presentation'])? $_POST['presentation']: "";

echo $nom."<br>";
echo $date."<br>";
echo $presentation."<br>";
echo $affiche."<br>";

// PENSER AU JEUX AJOUTER

$res = move_uploaded_file($_FILES['affiche']['tmp_name'], '../images/upload/affiches/'.$affiche);


 ?>
