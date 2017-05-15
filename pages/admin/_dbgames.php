<!-- DATABASE - GAMES -->
<div class="small-10 columns" style="border: 1px black solid">
  <div class="row expanded">
    <div class="small-12 columns header_section">
      <h1>Jeux</h1>
    </div>
  </div>
  <div class="row expanded">
    <div class="col-lg-6">
      <div class="section">
        <h3>Ajout/Modification / Suppression</h3>
      </div>
      <div class="">
        <label for="search">Rechercher</label>
        <input type="text" name="search" id="search">
        <label for="typeOfSearch">Recherche par:</label>
        <select class="typeOfSearch" name="typeOfSearch">
          <option value="jeu">Jeu</option>
          <option value="console">Console</option>
        </select>
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
        <form class="" action="" method="" enctype="multipart/form-data">
          <label for="name_game">Nom</label>
          <input type="text" name="name_game" id="name_game">
          <label for="console">Console associée</label>
          <input type="text" name="console" id="console">
          <label for="image_game">Image</label>
          <input type="file" name="image_game" id="image_game">
          <input type="button" name="send" value="Modifier">
          <input type="button" name="delete" value="Retirer">
          <input type="button" name="edit" value="Editer">
        </form>
      </div>
    </div>
  </div>
</div>
<script src="/osccop_project/js/gameManagement.js"></script>
