<?php

include '../php/_connexion.php';

$res = mysqli_query($cnx, 'SELECT date_event FROM evenement ORDER BY id_event DESC LIMIT 1');

$data = mysqli_fetch_assoc($res);

$date = explode('/', $data['date_event']);

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


  <div class="small-10 columns" style="border: 1px black solid">
     <div class="row expanded">
      <div class="small-12 columns header_section">
        <h1>Evenement</h1>
      </div>

    <div class="row expanded">

      <div class="small-6 columns">
        <div class="section">
          <h3>Ajout</h3>
        </div>
        <div class="">
          <form class="" action="../php/ajoutEvent.php" method="POST" enctype="multipart/form-data">
            <label for="name">Nom de l'événement</label>
            <input type="text" name="name" id="name">
            <label for="time">Date de l'événement</label>
            <input type="date" name="time" id="time">
            <label for="affiche">Affiche</label>
            <input type="file" name="affiche" id="affiche">
            <label for="presentation">Presentation</label>
            <textarea name="presentation" rows="8" cols="40"></textarea>
            <input type="submit" name="send" value="Ajouter">
          </form>
        </div>
      </div>

      <div class="small-6 columns">

        <div class="section">
          <h3>Modification / Suppression</h3>
        </div>

        <select class="small-6 columns" name="mois" id='mois'>
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

        <select class="annee small-6 columns" name="annee" id='annee'>
          <option value="" selected>Selectionner une année ...</option>
          <?php
          for ($i = 2011; $i <= $date[2]; ++$i) {
              echo "<option value='$i'>$i</option>";
          }
          ?>
        </select>

      </div>

       <ul id='TEST'></ul>

     </div>

   </div>

</div>

   </body>

   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

   <script type="text/javascript">

    var titreDataAll;
    $('#mois,#annee').change(function(){
      $('#TEST').html("");
      var monthValue = $("#mois").val();
      var yearValue = $("#annee").val();
          $.ajax({
              method: "POST",
              url : "../php/lookingforevent.php",
              data: {
                  'mois' : monthValue,
                  'annee' : yearValue,
              },
              datatype: "json",
              success: (data) => {
                titreDataAll = JSON.parse(data);
                console.log(titreDataAll);
                for (var i = 0; i < titreDataAll.length; i++) {
                  $('#TEST').append('<li id="'+titreDataAll[i].id_event+'"> <a href="" data-toggle="modal" data-target="">' + titreDataAll[i].titre_event + '</a> </li>');
                  $('#idArticleSuppr').val(titreDataAll[i].id_event);
                }
              }
          });
    });

   </script>

 </html>
