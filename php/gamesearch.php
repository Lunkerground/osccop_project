<?php
include_once '_connexion.php';
function recursivelyConvertToUTF8($data, $from = 'ISO-8859-1')
{
    if (!is_array($data)) {
        return iconv($from, 'UTF-8', $data);
    }
    return array_map(function ($value) use ($from) {
        return recursivelyConvertToUTF8($value, $from);
    }, $data);
}

if (isset($_GET['game']) && isset($_GET['typeOfSearch'])) {
    $i = 0;
    $gameData = array();
    $input = $_GET['game'];
    if ($_GET['typeOfSearch'] == 'console') {
        $qry = "SELECT jeu.id_jeu, jeu.nom_jeu, console.id_console,console.nom_console FROM console INNER JOIN jeu ON console.id_console=jeu.id_console WHERE console.nom_console LIKE '%$input%'";
        $rowNum = "SELECT COUNT(jeu.id_jeu) AS nbRow FROM console INNER JOIN jeu ON console.id_console=jeu.id_console WHERE console.nom_console LIKE '%$input%'";
    } else {
        $qry = "SELECT jeu.id_jeu, jeu.nom_jeu, console.id_console,console.nom_console FROM jeu INNER JOIN console ON jeu.id_console=console.id_console WHERE jeu.nom_jeu LIKE '%$input%'";
        $rowNum = "SELECT COUNT(jeu.id_jeu) AS nbRow FROM jeu INNER JOIN console ON jeu.id_console=console.id_console WHERE jeu.nom_jeu LIKE '%$input%'";
    }

    $rowCount = $cnx->prepare($rowNum);
    $rowCount->execute();
    $gameData[] = $rowCount->fetch(PDO::FETCH_ASSOC);

    $req = $cnx->prepare($qry);
    $req->execute();

    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $gameData[] = $data;
    }

    $dataJson = json_encode(recursivelyConvertToUTF8($gameData));
    echo $dataJson;
    $rowCount->closeCursor();
    $req->closeCursor();
}
$cnx = null;
