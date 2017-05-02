<?php

include "../php/_connexion.php";

$res = "SELECT date_event FROM evenement ORDER BY id_event DESC LIMIT 1";

$data = $cnx->prepare($res);
$data->execute();
$data = $data->fetch(PDO::FETCH_ASSOC);

$date = explode("/", $data["date_event"]);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Ajout/modification événement</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
  <div class="small-10 columns" style="border: 1px black solid">
    <div class="row expanded">
      <div class="small-12 columns header_section">
        <h1>Evenement</h1>
      </div>

      <div class="row expanded">

        <div class="small-6 large-6 columns">
          <div class="section">
            <h3>Ajout</h3>
          </div>
          <div class="">
            <form class="form" id="addEventForm">
              <label for="eventName">Nom de l"événement</label>
              <input type="text" name="eventName" id="name">
              <label for="eventDate">Date de l"événement</label>
              <input type="date" name="eventDate" id="time">
              <label for="eventPoster">Affiche</label>
              <input type="file" name="eventPoster" id="affiche" onchange="readURL(this)">
              <label for="eventPresentation">Presentation</label>
              <textarea name="eventPresentation" rows="8" cols="40"></textarea>
              <fieldset>
                <legend>Ajouter des jeux</legend>
                <div class="row">

                  <div class="large-6 columns">
                    <label for="typeOfSearch">Recherche par:
                        <select class="typeOfSearch" name="typeOfSearch">
                          <option value="jeu">Jeu</option>
                          <option value="console">Console</option>
                        </select>
                      </label>
                    <label for="lookingForGame">recherche de jeux
                        <input type="text" id="lookingForGame" class="form-control" placeholder="recherche de jeu">
                      </label>
                  </div>
                </div>
                <div class="row">
                  <div class="large-6 columns">
                    <div id="nbGame"></div>
                    <div id="pages"></div>
                    <div id="gamelist"></div>
                  </div>
                  <div class="choosedgame large-6 columns"></div>
                </div>
              </fieldset>
              <p>
                <a class="button" id="addEvent">Valider l"événement </a>
              </p>
            </form>
          </div>

          <div class="large-6 columns">

            <div class="section">
              <h3>Modification / Suppression</h3>
            </div>

            <select class="small-6 columns" name="mois" id="mois">
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

            <select class="annee small-6 columns" name="annee" id="annee">

                <option value="" selected>Selectionner une année ...</option>
              <?php
                for ($i = 2011; $i <= $date[2]; ++$i) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
              </select>

          </div>

          <ul id="TEST"></ul>

        </div>
      </div>
    </div>


  </div>
  <div class="modal fade" id="eventModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="modalEventTitle"></h4>
        </div>
        <div class="modal-body">
          <p id="modalEventDate"></p>
          <p id="modalEventText"></p>
          <img id="modalEventPoster" src="#" width="200px">
          <p id="modalEventGames"></p>
        </div>
      </div>
  </div>

</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="http://localhost/osccop_project/js/jeu.js"></script>
<script src="../js/date.js"></script>
<script type="text/javascript" src="http://localhost/osccop_project/js/eventvalidation.js"></script>


</html>
