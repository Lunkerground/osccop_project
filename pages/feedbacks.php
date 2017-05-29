<?php include '../php/_connexion.php'; ?>

<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OSCCOP - Compte-rendus</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../css/images/logo_osccop_short.png" />

    <!-- Bootstrap - Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/styles/convert/style.css">

  </head>
  <body>

    <header>

      <img src="../css/images/logo_pedagojeux.png" alt="logo pedagojeux" class="pedagologo">

      <!-- Banner -->
      <div class="banner">
        <img src="../css/images/banner.png" alt="Bannière" class="img-responsive">
      </div>

      <!-- Navbar -->
      <?php include 'components/_navbar_main.php' ?>

    </header>

    <div class="container-fluid">

      <div class="row">

        <!-- Page Content -->
        <div class="col-xs-12 col-sm-9 feedbacks">

          <!-- Section Title -->
          <div class="title_container">
            <h1>Compte-rendus</h1>
          </div>

          <!-- Section Content -->
          <div class="content_container">

            <!-- Sorting Block -->
            <div class="sorting_container">
              <form class="form-inline">
                <div class="form-group">

                  <label class="yellow">Afficher par :</label>

                  <select class="form-control">
                    <option selected disabled hidden>Année</option>
                    <!-- Add Year Options here -->
                  </select>

                  <select class="form-control">
                    <option selected disabled hidden>Mois</option>
                    <!-- Add Month Option here -->
                  </select>

                  <select class="form-control">
                    <option selected disabled hidden>Lieu</option>
                    <!-- Add Location Option here -->
                  </select>

                </div>
              </form>
            </div> <!-- End of .sorting_container -->

            <!-- Section of displayed elements -->
            <div class="elements_container">

              <?php

                // SQL Request to get all about Events
                $res_events = $cnx->prepare('SELECT * FROM evenement ORDER BY id_event DESC LIMIT 8');
                $res_events->execute();

                while ($data = $res_events->fetch(PDO::FETCH_ASSOC)) {

                  echo

                  '<a href="#" class="third_links">
                    <div class="element text_container elementHeight">
                      <div class="medias_container">
                        <img src="../upload/' . $data['img_event'] . '" alt="affiche" class="img-responsive">
                      </div>
                      <div class="text_container text-center">
                        <p>' . $data['titre_event'] . '<br/>
                        <small>' . $data['date_event'] . '</small></p>
                      </div>
                    </div>
                  </a>';

                }

              ?>

            </div> <!-- End of .elements_container -->

            <div class="text-center">
              <div class="page">
                <a href="#"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
              </div>
            </div>

          </div>

        </div> <!-- End of .col-sm-9 -->

        <div class="hidden-xs col-sm-3 complements">

          <div class="row">

            <div class="col-sm-12">

              <!-- Section Title -->
              <div class="title_container">
                <h3 class="text-left">Exposition Foot</h3>
              </div>

              <div class="content_container" style="padding:25px">

                <!-- Expo Img -->
                <div class="medias_container" style="margin-bottom:25px">
                  <img src="../css/images/expo_foot.jpg" alt="expo foot" class="img-responsive">
                </div>

                <!-- Expo Text -->
                <div class="text_container">
                  <p class="text-justify">L’émergence ici c’est l’émulsion, c’est pas l’immersion donc le rédynamisme de l'orthodoxisation tend à porter d'avis sur ce qu'on appelle la renaissance africaine dans la sous-régionalité, mais oui.</p>
                  <br>
                  <p class="text-center"><a href="" class="blue third_links">Plus d'informations</a></p>
                </div>

              </div>

            </div>

          </div>

          <div class="row">

            <div class="col-sm-12 random">

              <div class="title_container">
                <h3>Le coin Random</h3>
              </div>

              <div class="content_container" style="padding:25px">

                <div class="first_random">

                  <?php

                    $rdm = rand(1, 2);

                    switch ($rdm) {

                      case 1:

                        $res_rndm_game = $cnx->prepare('SELECT * FROM jeu ORDER BY RAND() LIMIT 1');
                        $res_rndm_game->execute();

                        $res_count_game = $cnx->prepare('SELECT COUNT(*) FROM jeu');
                        $res_count_game->execute();

                        $nbrjeu = $res_count_game->fetch(PDO::FETCH_ASSOC);

                        while ($data = $res_rndm_game->fetch(PDO::FETCH_ASSOC)) {

                          echo

                          '<div class="medias_container">
                            <img src="../upload/' . $data['img_jeu'] . '" alt="" class="img-responsive">
                          </div>

                          <div class="text_container">
                            <p class="text-justify">Voici <strong>' . $data['nom_jeu'] . '</strong>, l\'un des ' . $nbrjeu['COUNT(*)'] . ' jeux utilisés lors d\'un évènement OSCCOP.</p>
                            <br/>
                            <p class="text-center"><a href="#">Voir un évènement associé à ce jeu</a></p>
                          </div>';

                        };

                        break;

                      case 2:

                        $res_rndm_console = $cnx->prepare('SELECT * FROM console ORDER BY RAND() LIMIT 1');
                        $res_rndm_console->execute();

                        $res_count_console = $cnx->prepare('SELECT COUNT(*) FROM console');
                        $res_count_console->execute();

                        $nbrconsole = $res_count_console->fetch(PDO::FETCH_ASSOC);

                        while ($data = $res_rndm_console->fetch(PDO::FETCH_ASSOC)) {

                          echo

                          '<div class="medias_container">
                            <img src="../upload/' . $data['img_console'] . '" alt="" class="img-responsive">
                          </div>

                          <div class="text_container">
                            <p class="text-justify">Voici la <strong>' . $data['nom_console'] . '</strong>, l\'une des ' . $nbrconsole['COUNT(*)'] . ' consoles utilisées lors d\'un évènement OSCCOP.</p>
                            <br/>
                            <p class="text-center"><a href="#">Voir un évènement associé à cette console</a></p>
                          </div>';

                        };

                        break;

                    }

                  ?>

                </div> <!-- End of .first_random -->

              </div> <!-- End of .content_container -->

            </div>

          </div>

        </div> <!-- End of .col-sm-3  -->

      </div>

    </div> <!-- End of .container-fluid -->

    <footer>

      <!-- Footer -->
      <?php include 'components/_footer.php' ?>

    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Custom JS - Adaptive Height -->
    <script type="text/javascript" src="../js/adaptive_height.js"></script>

  </body>
</html>
