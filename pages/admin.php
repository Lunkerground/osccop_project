<?php

session_start();

if ($_SESSION['login'] == false || empty($_SESSION['login'])) {
  header('location:../index.php');
}

include '../php/_connexion.php';

$res = mysqli_query($cnx, "SELECT Super_User, Membre_actif FROM membre WHERE Identifiant = '".$_SESSION['user']."'");

$data = mysqli_fetch_assoc($res);

if ($data['Membre_actif'] == 'false') {
  session_destroy();
  header('location:../index.php');
}

 ?>

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

        <?php

        if ($data['Super_User'] == 'true'){
          echo '
          <ul>
            <li class="toggleSubMenu"><span>Administration</span>
              <ul class="subMenu">
                <li><a href="?page=events">Evénements / Compte-rendus</a></li>
                <li><a href="?page=">Presse</a></li>
                <li><a href="?page=">Présentation</a></li>

                <!-- Temporary waiting to fix it properly -->
                <li><a href="?page=dbconsoles">BDD - Consoles</a></li>
                <li><a href="?page=dbgames">BDD - Jeux</a></li>
                <li><a href="?page=dblocations">BDD - Lieux</a></li>
                <li><a href="?page=dbmembers">BDD - Membres</a></li>

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
          ';
        }

          ?>

          <li class="toggleSubMenu"><span>Membres</span>
            <ul class="subMenu">
              <li><a href="#!">Médias / Tests</a></li>
            </ul>
          </li>
        </ul>
      </div>

      <!-- RIGHT SECTION - ADMIN CONTENTS -->

      <!-- DATABASE - MEMBERS -->

      <?php

        if (isset($_GET['page']) && $_GET['page'] == 'events') {

          include('admin/_dbevent.php');

        } elseif (isset($_GET['page']) && $_GET['page'] == 'dbmembers') {

          // DATABASE - MEMBERS
          include('admin/_dbmembers.php');

        } elseif (isset($_GET['page']) && $_GET['page'] == 'dbgames') {

          // DATABASE - GAMES
          include('admin/_dbgames.php');

        } elseif (isset($_GET['page']) && $_GET['page'] == 'dbconsoles') {

          // DATABASE - CONSOLES
          include('admin/_dbconsoles.php');

        } elseif (isset($_GET['page']) && $_GET['page'] == 'dbpodcasts') {

          // DATABASE - PODCASTS
          include('admin/_dbpodcasts.php');

        } elseif (isset($_GET['page']) && $_GET['page'] == 'dblocations') {

          // DATABASE - LOCATIONS
          include('admin/_dblocations.php');

        }

      ?>


    </div>

    <!-- Jquery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Foundation - Compressed JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js" integrity="sha256-Nd2xznOkrE9HkrAMi4xWy/hXkQraXioBg9iYsBrcFrs=" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script type="text/javascript" src="../js/accordion.js"></script>

</html>
