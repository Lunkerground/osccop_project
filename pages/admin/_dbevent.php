<?php

  $res = "SELECT * FROM evenement ORDER BY id_event DESC LIMIT 1";

  $data = $cnx->prepare($res);
  $data->execute();
  $data = $data->fetch(PDO::FETCH_ASSOC);

  $event = isset($_GET['event'])? $_GET['event']: '';

  $res2 = "SELECT * FROM evenement WHERE id_event  = '$event'";

  $data2 = $cnx->prepare($res2);
  $data2->execute();
  $data2 = $data2->fetch(PDO::FETCH_ASSOC);

  $date = explode("-", $data2["date_event"]);

?>

<div class="container-fluid">

  <div class="admin_header text-center" style="margin:0 -15px">
    <h3><strong>Évènements / Compte-rendus</strong></h3>
  </div>

  <div class="row">

    <!-- ACTION - ADD SECTION -->
    <div class="col-sm-6">

      <div class="title_section page-header">
        <h3><strong>Ajout</strong></h3>
      </div>

      <form id="addEventForm" enctype="multipart/form-data">

        <div class="form-group">
          <label for="eventName">Nom de l'évènement</label>
          <input class="form-control input-sm " type="text" name="eventName" required>
        </div>

        <div class="form-group">
          <label for="eventDate">Date de l'évènement</label>
          <input class="form-control" type="date" name="eventDate" required>
        </div>

        <div class="form-group">
          <label for="eventPoster">Affiche</label>
          <input type="file" name="eventPoster" onchange="readURL(this)"  accept="image/*" class="file">
          <div class="input-group">
            <input type="text" class="form-control input-lg" disabled placeholder="Choisissez une image">
            <span class="input-group-btn">
              <button class="browse btn btn-default input-lg" type="button"><i class="fa fa-upload" aria-hidden="true"></i></button>
            </span>
          </div>
        </div>

        <div class="form-group">
          <label for="eventPresentation">Texte</label>
          <textarea class="form-control" name="eventPresentation" id="eventPresentation" rows="8"></textarea>
        </div>

      </form>

      <h4>Jeux présents à l'évènement</h4>

      <div class="row">

        <div class="col-sm-6">
          <div class="form-group">
            <label for="typeOfSearch">Recherche par :</label>
            <select class="typeOfSearch form-control" name="typeOfSearch">
              <option value="jeu">Jeu</option>
              <option value="console">Console</option>
            </select>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for="lookingForGame">Nom de la recherche :</label>
            <input class="form-control" type="search" id="lookingForGame" class="form-control" placeholder="Entrez un nom">
          </div>
        </div>

      </div>

      <div class="row">

        <div class="col-sm-6">
          <div id="nbGame"></div>
          <div id="gamelist"></div>
          <div>
            <nav aria-label="Page navigation">
              <ul class="pagination pagination-sm"></ul>
            </nav>
          </div>
        </div>

        <div class="col-sm-6 ">
          <div>
            <p><strong>Jeux sélectionnés :</strong></p>
          </div>
          <div class="choosedgame "></div>
          <a class="btn btn-default pull-right" id="addEvent">Valider l'événement </a>
        </div>

      </div>

    </div> <!-- End of ADD SECTION -->

    <div class="col-sm-6 ">

      <div class="title_section page-header">
        <h3><strong>Modification / Suppression</strong></h3>
      </div>

      <label>Sélectionnez l'évènement :</label>

      <div class="row">

        <div class="col-sm-6">

          <div class="form-group">
            <select class="form-control" name="mois" id="mois">
              <option value="" selected disabled>Mois</option>
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
          </div>

        </div>

        <div class="col-sm-6">

          <div class="form-group">
            <select class="form-control annee " name="annee" id="annee">
              <option value="" selected disabled>Année</option>
              <?php
                for ($i = 2011; $i <= $date[2]; ++$i) {
                    echo "<option value='$i'>$i</option>";
                }
              ?>
            </select>
          </div>

        </div>

      </div>

      <ul id="TEST"></ul>

      <div class="row">

        <?php

          $event = isset($_GET['event'])? $_GET['event']: '';

          $res2 = "SELECT * FROM evenement WHERE id_event  = '$event'";

          $data2 = $cnx->prepare($res2);
          $data2->execute();
          $data2 = $data2->fetch(PDO::FETCH_ASSOC);
          if ($event){

        ?>

          <div class="form-group col-lg-12">

              <form id="modEventForm" method="POST" action="../php/modifierEvent.php" enctype="multipart/form-data">
                  <label for="modEventName">Nom de l'évènement</label>
                  <input class="form-control input-sm " type="text" name="modEventName" id="name" value= "<?php echo $data2['titre_event']?>" >
                  <label for="modEventDate">Date de l'évènement</label>
                  <input class="form-control" type="date" name="modEventDate" id="time" value="<?php echo $date[2]."-".$date[1]."-".$date[0] ?>">
                  <label for="modEventPoster">Affiche</label>
                  <input class="form-control" type="file" name="modEventPoster" id="affiche" onchange="readURL(this)">
                  <label for="eventPresentationModif">Présentation</label>
                  <textarea name="eventPresentationModif" id="eventPresentationModif" rows="8" cols="44"><?php echo $data2['txt_event'] ?></textarea>
                  <input type="hidden" name="idEvent" id='idEvent' value="<?php echo $event?>">
                  <p>
                      <a class="btn btn-default" id="modEvent">Valider l'évènement </a>
                  </p>
                  <input type="submit" name="name" value="TEST">
              </form>

          </div>

        <?php

          }

        ?>

      </div>

    </div> <!-- End of MODIF / SUPP SECTION -->

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
            <img class="modalEventPoster" src="../upload/<?php echo $data['img_event'] ?>" width="200px">
            <div id="modalEventGamesModif"></div>
        </div>
        <div class="modal-footer">
            <button type="button" id="cancel" class="btn btn-default" data-dismiss="modal">Annuler</button>
            <button type="button" id="validateMod" class="btn btn-default">Valider</button>
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
<script src="../js/jeu.js"></script>
<script src="../js/script.js"></script>
<script src="../js/date.js"></script>

<script>

  CKEDITOR.replace( 'eventPresentationModif' );

  timer = setInterval(updateDivMod,100);
  function updateDivMod(){
      var editorTextModif = CKEDITOR.instances.eventPresentationModif.getData();
      $('#modalEventTextModif').html(editorTextModif);
  }

</script>

<script type="text/javascript">

  $(document).on('click', '.browse', function() {
    var file = $(this).parent().parent().parent().find('.file');

    file.trigger('click');
  });

  $(document).on('change', '.file', function() {
    $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
  });

</script>

<script>

  $(function() {

    $( "#eventDate" ).datepicker({
      dateFormat: "yy-mm-dd"
    });

    $( "#modEventDate" ).datepicker({
      dateFormat: "yy-mm-dd"
    });

  });

</script>

<script>

  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });

</script>
