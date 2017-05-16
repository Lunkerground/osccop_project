<?php

include "../php/_connexion.php";

$res = "SELECT date_event FROM evenement ORDER BY id_event DESC LIMIT 1";

$data = $cnx->prepare($res);
$data->execute();
$data = $data->fetch(PDO::FETCH_ASSOC);

$date = explode("-", $data["date_event"]);

?>
<div class="" style="border: 1px black solid">
  <div class="row">
    <div class="col-sm-12 col-lg-12  header_section">
      <h1>Evenement</h1>
    </div>
      <div class="col-sm-6 col-lg-6 ">
        <div class="section">
          <h3>Ajout</h3>
        </div>
        <div class="">
          <form id="addEventForm" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-lg-12">
                <label for="eventName">Nom de l"événement</label>
                <input class="form-control input-sm " type="text" name="eventName" required>
                <label for="eventDate">Date de l"événement</label>
                <input class="form-control" type="date" name="eventDate" required>
                <label for="eventPoster">Affiche</label>
                <input class="form-control" type="file" name="eventPoster" onchange="readURL(this)"  accept="image/*">
                <label for="eventPresentation">Presentation</label>
                <textarea class="form-control" name="eventPresentation" id="eventPresentation" rows="8"></textarea>
              </div>

            </div>
          </form>
            <h4>Ajouter des jeux</h4>
            <div class="row">
              <div class="col-lg-6 col-lg-offset-3">
                <label for="typeOfSearch">Recherche par:</label>
                <select class="typeOfSearch" name="typeOfSearch">
                  <option value="jeu">Jeu</option>
                  <option value="console">Console</option>
                </select>
                <div class="form-group">
                <label for="lookingForGame">recherche de jeux</label>
                <input class="form-control" type="search" id="lookingForGame" class="form-control" placeholder="recherche de jeu">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 ">
                <div id="nbGame"></div>
                <div>
                  <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm"></ul>
                  </nav>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6" id="gamelist"></div>
              <div class="choosedgame col-lg-6 "></div>
            </div>
            <p>
              <a class="btn btn-default" id="addEvent">Valider l'événement </a>
            </p>
        </div>

      </div>
      <div class="col-lg-6 ">
        <h3>Modification / Suppression</h3>
        <select class="col-sm-6 " name="mois" id="mois">
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

        <select class="annee col-sm-6 " name="annee" id="annee">
          <option value="" selected>Selectionner une année ...</option>
          <?php
            for ($i = 2011; $i <= $date[2]; ++$i) {
                echo "<option value='$i'>$i</option>";
            }
          ?>
        </select>
        <ul id="TEST"></ul>

        <?php

        $event = isset($_GET['event'])? $_GET['event']: '';

        $res2 = "SELECT * FROM evenement WHERE id_event  = '$event'";

        $data2 = $cnx->prepare($res2);
        $data2->execute();
        $data2 = $data2->fetch(PDO::FETCH_ASSOC);
        if ($event){

        ?>

          <div class="form-group col-lg-12">

              <form id="modEventForm" enctype="multipart/form-data">
                  <label for="modEventNameModif">Nom de l'événement</label>
                  <input class="form-control input-sm " type="text" name="modEventNameModif" id="name" value= "<?php echo $data2['titre_event']?>" >
                  <label for="modEventDateModif">Date de l'événement</label>
                  <input class="form-control" type="date" name="modEventDateModif" id="time" value="<?php echo $date[2]."-".$date[1]."-".$date[0] ?>">
                  <label for="modEventPoster">Affiche</label>
                  <input class="form-control" type="file" name="modEventPoster" id="affiche" onchange="readURL(this)">
                  <label for="modEventPresentation">Presentation</label>
                  <textarea name="eventPresentationModif" id="eventPresentationModif" rows="8" cols="44"><?php echo $data2['txt_event'] ?></textarea>
                  <p>
                      <a class="btn btn-default" id="modEvent">Valider l'événement </a>
                  </p>
              </form>

          </div>
        <?php
      }
        ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="eventModal" role="dialog">
  <div class="modal-dialog" style="background-color:white;">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" id="modalEventTitle"></h4>
    </div>
    <div class="modal-body">
      <p id="modalEventDate"></p>
      <p id="modalEventText"></p>
      <img class="modalEventPoster" src="#" width="200px">
      <div id="modalEventGames"></div>
    </div>
    <div class="modal-footer">
      <button type="button" id="cancel" class="btn btn-default" data-dismiss="modal">Annuler</button>
      <button type="button" id="validate" class="btn btn-default">Valider</button>
    </div>
  </div>
</div>

<!-- Modal Modif -->
<div class="modal fade" id="eventModalModif" role="dialog">
    <div class="modal-dialog" style="background-color:white;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="modalEventTitleModif"></h4>
        </div>
        <div class="modal-body">
            <p id="modalEventDateModif"></p>
            <p id="modalEventTextModif"></p>
            <img class="modalEventPoster" src="#" width="200px">
            <div id="modalEventGamesModif"></div>
        </div>
        <div class="modal-footer">
            <button type="button" id="cancel" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <button type="button" id="validate" class="btn btn-default">Valider</button>
        </div>
    </div>
</div>

<!-- Messagerie! -->
<div class="modal fade" id="messageModal" role="dialog">
  <div class="modal-dialog" style="background-color:white;">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" id="modalMessageTitle"></h4>
    </div>
    <div class="modal-body" id="MessageText">
    </div>
    <div class="modal-footer">
      <button type="button" id="cancel" class="btn btn-default" data-dismiss="modal">Fermer</button>
    </div>
  </div>
</div>




<script src="../js/ckeditor/ckeditor.js"></script>
<script src="http://localhost/osccop_project/js/jeu.js"></script>
<script src="http://localhost/osccop_project/js/script.js"></script>
<script src="../js/date.js"></script>

<script>

    CKEDITOR.replace( 'eventPresentationModif' );

    timer = setInterval(updateDivMod,100);
    function updateDivMod(){
        var editorTextModif = CKEDITOR.instances.eventPresentationModif.getData();
        $('#modalEventTextModif').html(editorTextModif);
    }

</script>
