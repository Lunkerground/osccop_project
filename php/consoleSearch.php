<?php
include_once '_connexion.php';

$gameData = array();
function recursivelyConvertToUTF8($data, $from = 'ISO-8859-1')
{
    if (!is_array($data)) {
        return iconv($from, 'UTF-8', $data);
    }
    return array_map(function ($value) use ($from) {
        return recursivelyConvertToUTF8($value, $from);
    }, $data);
}


$qry = "SELECT * FROM console WHERE 1 ORDER BY nom_console ASC";
$req = $cnx->prepare($qry);
$req->execute();

while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
    $gameData[] = $data;
}

$dataJson = json_encode(recursivelyConvertToUTF8($gameData));
echo $dataJson;

$req->closeCursor();
$cnx = null;
