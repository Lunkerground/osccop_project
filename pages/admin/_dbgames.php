<!-- DATABASE - GAMES -->
<div class="col-lg-10" style="border: 1px black solid">
  <div class="row expanded">
    <div class="col-lg-12 header_section">
      <h1>Jeux</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="section">
        <h3>Ajout/Modification / Suppression</h3>
      </div>
      <div class="">
        <label for="search">Rechercher</label>
        <input type="text" name="search" id="search" />
        <label for="typeOfSearch">Recherche par:</label>
        <select class="typeOfSearch" name="typeOfSearch">
          <option value="jeu">Jeu</option>
          <option value="console">Console</option>
        </select>
        <div id="nbGame"></div>
        <div class="col-lg-12">
          <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm"></ul>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12" id="gamelist">
        </div>
      </div>
    </div>
    <div class="col-lg-6 image">
      <img src="#" alt="image de jeu" width=100%>
    </div>
  </div>
    <form id="gameManagementForm" enctype="multipart/form-data">
      <fieldset>
        <legend id="actionLegend">Ajouter un jeu</legend>
        <input type="hidden" name="action" value="new" />
        <label for="name_game">Nom</label>
        <input type="text" name="name_game"/>
        <label for="console">Console associée</label>
        <select name="console">
          <?php
          $qry = "SELECT * FROM console WHERE 1 ORDER BY nom_console ASC";
          $req = $cnx->prepare($qry);
          $req->execute();
          while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
              echo "<option value='".$data['id_console']."'>".$data['nom_console']."</option>";
          }
          $req->closeCursor();
           ?>
        </select>

        <label for="image_game">Image</label>
        <input type="file" name="image_game" id="inputImage" onchange="readURL(this)"/>
        <input type="button" name="submit" value="Modifier"/>
      </fieldset>
    </form>

  </div>
  <!-- Modal Confirmation -->
  <div class="modal fade" id="GameModalConfirm" role="dialog">
      <div class="modal-dialog" style="background-color:white;">
          <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="modalEventTitleModif"></h4>
          </div>
          <div class="modal-body">

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

<script src="/osccop_project/js/gameManagement.js"></script>
