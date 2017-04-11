<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>OSCCOP - Administration</title>

    <!-- Foundation - Compressed CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css" integrity="sha256-itWEYdFWzZPBG78bJOOiQIn06QCgN/F0wMDcC4nOhxY=" crossorigin="anonymous" />

    <!-- CSS -->
    <link rel="stylesheet" href="../css/convert/style.css">

  </head>
  <body>

    <div class="row expanded">

      <!-- LEFT SECTION - NAVIGATION SIDE BAR -->
      <div class="small-2 columns accordion" style="border: 1px black solid">
        <p>OSCCOP<br/>Espace Administration</p>
        <ul>
          <li class="toggleSubMenu"><span>Administration</span>
            <ul class="subMenu">
              <li><a href="#!">Evénements / Compte-rendus</a></li>
              <li><a href="#!">Presse</a></li>
              <li><a href="#!">Présentation</a></li>

              <!-- Temporary waiting to fix it properly -->
              <li><a href="#!">BDD - Consoles</a></li>
              <li><a href="#!">BDD - Jeux</a></li>
              <li><a href="#!">BDD - Lieux</a></li>
              <li><a href="#!">BDD - Membres</a></li>

              <!-- <li class="toggleSubMenu"><span>Base de Données</span>
                <ul class="subMenu">
                  <li><a href="#!">Consoles</a></li>
                  <li><a href="#!">Jeux</a></li>
                  <li><a href="#!">Lieux</a></li>
                  <li><a href="#!">Membres</a></li>
                </ul>
              </li> -->

            </ul>
          </li>
          <li class="toggleSubMenu"><span>Membres</span>
            <ul class="subMenu">
              <li><a href="#!">Médias / Tests</a></li>
            </ul>
          </li>
        </ul>
      </div>

      <!-- RIGHT SECTION - ADMIN CONTENTS -->

      <!-- DATABASE - MEMBERS -->
      <div class="small-10 columns" style="border: 1px black solid">
        <div class="row expanded">
          <div class="small-12 columns header_section">
            <h1>Membres</h1>
          </div>
        </div>
        <div class="divider"></div>
        <div class="row expanded">
          <div class="small-6 columns">
            <div class="section">
              <h3>Ajout</h3>
            </div>
            <div class="">
              <form class="" action="" method="">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname">
                <label for="surname">Pseudo</label>
                <input type="text" name="surname" id="surname">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
                <input type="button" name="send" value="Ajouter">
              </form>
            </div>
          </div>
          <div class="small-6 columns">
            <div class="section">
              <h3>Modification / Suppression</h3>
            </div>
            <div class="">
              <form class="" action="" method="">
                <label for="search">Rechercher</label>
                <input type="text" name="search" id="search">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname">
                <label for="surname">Pseudo</label>
                <input type="text" name="surname" id="surname">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
                <input type="button" name="send" value="Modifier">
              </form>
            </div>
          </div>
          <!-- <div class="small-6 columns">
            <div class="section">
              <h3>Suppression</h3>
            </div>
            <div class="">
              <form class="" action="" method="">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname">
                <label for="surname">Pseudo</label>
                <input type="text" name="surname" id="surname">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
                <input type="button" name="send" value="Supprimer">
              </form>
            </div>
          </div> -->
        </div>
      </div>

    </div>

    <!-- Jquery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Foundation - Compressed JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js" integrity="sha256-Nd2xznOkrE9HkrAMi4xWy/hXkQraXioBg9iYsBrcFrs=" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script type="text/javascript" src="../js/accordion.js"></script>

</html>
