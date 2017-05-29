<?php

session_start();

if ($_SESSION['login'] == false || empty($_SESSION['login'])) {
    header('location:../index.php');
}

include '../php/_connexion.php';

$res = "SELECT Super_User, Membre_actif FROM membre WHERE Identifiant = '".$_SESSION['user']."'";


$data = $cnx->prepare($res);
$data->execute();
$data = $data->fetch(PDO::FETCH_ASSOC);

if ($data['Membre_actif'] == 'false') {
    session_destroy();
    header('location:../index.php');
}

?>

<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>OSCCOP - Administration</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../css/images/logo_osccop_short.png" />

    <!-- Bootstrap - Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/styles/convert/style.css">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

  </head>

  <body>

    <div class="container-fluid">

      <div class="row">

        <!-- LEFT SECTION - NAVIGATION SIDE BAR -->
        <div class="col-sm-2 accordion text-center">

          <h3 class="admin_header">Menu <i class="fa fa-wrench" aria-hidden="true"></i></h3>

          <?php

            if ($data['Super_User'] == 'true') {

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
        </div> <!-- End of col-sm-2 -->

        <!-- RIGHT SECTION - ADMIN CONTENTS -->
        <div class="col-sm-10 admin_content">

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

              // DATABASE - PODCASTS
              include('admin/_dbpodcasts.php');

            } elseif (isset($_GET['page']) && $_GET['page'] == 'dblocations') {

              // DATABASE - LOCATIONS
              include('admin/_dblocations.php');
            }

          ?>

        </div> <!-- End of .col-sm-10 -->

      </div> <!-- End of .row -->

    </div> <!-- End of .container-fluid -->

  </body>

  <!-- Bootstrap - Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <!-- Custom JS -->
  <script type="text/javascript" src="../js/accordion.js"></script>

</html>
