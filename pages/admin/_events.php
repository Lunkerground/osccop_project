<div class="small-10 small-offset-2 columns" style="border: 1px black solid">
  <div class="row expanded">
    <div class="small-12 columns header_section">
      <h1>Évènements / Compte-rendus</h1>
    </div>
  </div>
  <div class="row expanded">
    <div class="small-12 columns">
      <div class="section">
        <h3>Nouveau</h3>
      </div>

      <form class="" action="" method="" enctype="multipart/form-data">
        <div class="row expanded">
          <div class="small-6 columns'">
            <label for="event_title">Nom de l'évènement</label>
            <input type="text" name="event_title" id="event_title">
            <label for="date_event">Date de l'évènement</label>
            <input type="date" name="date_event" id="date_event">
            <label for="image_event">Affiche de l'évènement</label>
            <input type="file" name="image_event" id="image_event">
            <label for="location_event">Lieu de l'évènement</label>
            <select name="location_event" id="location_event">
              <?php
                echo '<option value=""></option>';
              ?>
            </select>
          </div>

          <div class="small-6 columns'">
            <label for="text_event">Description de l'évènement</label>
            <textarea name="text_event" rows="8" cols="80"></textarea>
            <input type="button" name="send" value="Ajouter">
          </div>
        </div>
      </form>

    </div>
