<?php
include_once 'connexion.php';
function recursivelyConvertToUTF8($data, $from = 'ISO-8859-1')
{
    if (!is_array($data)) {
        return iconv($from, 'UTF-8', $data);
    }
    return array_map(function ($value) use ($from) {
        return recursivelyConvertToUTF8($value, $from);
    }, $data);
}
if (isset($_POST['game']) && isset($_POST['typeOfSearch'])) {
    $i = 0;
    $gameData = array();
    $input = $_POST['game'];
    if ($_POST['typeOfSearch'] == 'console') {
        $qry = "SELECT jeu.id_jeu, jeu.nom_jeu, console.id_console,console.nom_console FROM console INNER JOIN jeu ON console.id_console=jeu.id_console WHERE console.nom_console LIKE '%$input%'";
    } else {
        $qry = "SELECT jeu.id_jeu, jeu.nom_jeu, console.id_console,console.nom_console FROM jeu INNER JOIN console ON jeu.id_console=console.id_console WHERE jeu.nom_jeu LIKE '%$input%'";
    }
    $req = $cnx->prepare($qry);
    $req->execute();

    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $gameData[] = $data;
    }

    $dataJson = json_encode(recursivelyConvertToUTF8($gameData));
    echo $dataJson;
    $req->closeCursor();
}
$cnx = null;
