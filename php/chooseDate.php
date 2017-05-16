<?php

session_start();

include '_connexion.php';

$res = "SELECT date_event FROM evenement ORDER BY id_event DESC LIMIT 1";

$data = $cnx->prepare($res);
$data->execute();
$data = $data->fetch(PDO::FETCH_ASSOC);

$date = explode("/", $data['date_event']);

?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   </head>
   <body>

     <select class="" name="mois" id='mois'>
       <option value="" selected>Selectionner un mois ...</option>
       <option value="01">Janvier</option>
       <option value="02">Fevrier</option>
       <option value="03">Mars</option>
       <option value="04">Avril</option>
       <option value="05">Mai</option>
       <option value="06">Juin</option>
       <option value="07">Juillet</option>
       <option value="08">Août</option>
       <option value="09">Septembre</option>
       <option value="10">Octobre</option>
       <option value="11">Novembre</option>
       <option value="12">Décembre</option>
     </select>

     <select class="annee" name="annee" id='annee'>
         <option value="" selected>Selectionner une année ...</option>
         <?php
         for ($i = 2011; $i <= $date[2]; $i++) {
           echo "<option value='$i'>$i</option>";
         }
          ?>
     </select>

     <ul id='TEST'></ul>

   </body>

   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

   <script src="../js/date.js"></script>

   </script>

 </html>
