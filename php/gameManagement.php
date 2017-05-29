<?php
include_once '_connexion.php';
$gameName = isset($_POST["name_game"])? $_POST["name_game"] : "";
$consoleId = isset($_POST["console"])? $_POST["console"] : "";
$idGame =  isset($_POST["action"])? $_POST["action"] : "";

if ($idGame == "new") {
    var_dump($_FILES);
    if ($_FILES['image_game']['name'] !== "") {
        $gameImg = "jeux/".$_FILES['image_game']['name'];
        $imgPath = $_SERVER['DOCUMENT_ROOT']."/osccop_project/images/upload/$gameImg"
        // $upload = move_uploaded_file($_FILES['image_game']['tmp_name'], $imgPath) or die(" Votre image n'a pas été uploadé correctement ");
    } else {
        $gameImg = "jeux/defaultImg.jpeg";
    }
    $query = "INSERT INTO jeu (nom_jeu, img_jeu, id_console)
              VALUES ('$gameName', '$gameImg', '$consoleId')";
} else {
    if ($_FILES['image_game']['name'] !== "") {
        $query = "UPDATE jeu
                  SET nom_jeu = '$gameName', id_console = '$consoleId'
                  WHERE id_jeu = '$idGame'";
    } else {
        $gameImg = "jeux/".$_FILES['image_game']['name'];
        $imgPath = $_SERVER['DOCUMENT_ROOT']."/osccop_project/images/upload/$gameImg"
        $upload = move_uploaded_file($_FILES['image_game']['tmp_name'], $imgPath) or die(" Votre image n'a pas été uploadé correctement ");
        $query = "UPDATE jeu
                  SET nom_jeu = '$gameName', id_console = '$consoleId', jeu_img = '$gameImg'
                  WHERE id_jeu = '$idGame'";
    }
}
$qry = $cnx->prepare($query);
$qry->execute();
$qry->closeCursor;
$cnx = null;
echo 'OK';
