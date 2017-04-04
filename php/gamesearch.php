<?php
include_once 'connexion.php';

if (isset($_POST['game'])) {
    $i = 0;
    $gameData = array();
    $game = $_POST['game'];
    $req = mysqli_query($cnx, "SELECT jeu.id_jeu, jeu.nom_jeu, console.id_console,console.nom_console FROM jeu INNER JOIN console ON jeu.id_console=console.id_console WHERE jeu.nom_jeu LIKE '%$game%'");
    while ($data = mysqli_fetch_assoc($req)) {
        $gameData[$i] = $data;
        $i++;
    }
    echo json_encode($gameData);
    mysqli_close($cnx);
}
