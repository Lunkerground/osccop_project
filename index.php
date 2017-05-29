<?php include 'php/_connexion.php'; ?>

<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>OSCCOP - Accueil</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="css/images/logo_osccop_short.png" />

    <!-- Bootstrap - Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/styles/convert/style.css">

  </head>
  <body>

    <header>

      <img src="css/images/logo_pedagojeux.png" alt="logo pedagojeux" class="pedagologo">

      <!-- Banner -->
      <div class="banner">
        <img src="css/images/banner.png" alt="Bannière" class="img-responsive">
      </div>

      <?php include 'pages/components/_navbar_main.php' ?>

      <div class="container-fluid">

        <!-- Important Informations - Next Dates + Football Games Expo -->
        <div class="row main_important">

          <!-- Next Events to come -->
          <div class="col-xs-12 col-sm-6 next_events headerHeight">
            <div class="row">

              <!-- Section Title -->
              <div class="col-xs-12">
                <h3 class="text-left"><span class="yellow">Évènements à venir</span></h3>
              </div>

              <!-- Most Recent Events -->
              <?php

                $res_events = $cnx->prepare('SELECT * FROM evenement ORDER BY id_event DESC LIMIT 2');
                $res_events->execute();

                while ($data = $res_events->fetch(PDO::FETCH_ASSOC)) {

                  echo

                  '<div class="col-xs-12 col-sm-6 text_container eventHeight">
                    <div class="medias_container">
                      <img src="upload/' . $data['img_event'] . '" alt="affiche" class="img-responsive">
                    </div>

                    <div class="text-center">
                      <p><strong>' . $data['titre_event'] . '</strong></p>
                      <hr>
                      <p>' . $data['date_event'] . '</p>
                      <hr>
                      <p><a href="#" class="blue third_links">+ d\'infos</a></p>
                    </div>
                  </div>';

                }

              ?>

              <!-- Section Button -->
              <div class="col-xs-12">
                <a href="#" class="yellow second_links">Plus d'évènements</a>
              </div>

            </div>
          </div> <!-- End of .next_events -->

          <!-- Football Exposition -->
          <div class="col-xs-12 col-sm-6 expo_foot headerHeight">

            <div class="row">

              <!-- Section Title -->
              <div class="col-xs-12">
                <h3 class="text-right"><span class="blue">Exposition Foot</span></h3>
              </div>

              <!-- Expo Text -->
              <div class="col-xs-12">

                <div class="text_container">
                  <p class="text-justify">L’émergence ici c’est l’émulsion, c’est pas l’immersion donc le rédynamisme de l'orthodoxisation tend à porter d'avis sur ce qu'on appelle la renaissance africaine dans la sous-régionalité, mais oui.</p>
                </div>

                <!-- Expo Img -->
                <div class="medias_container">
                  <img src="css/images/expo_foot.jpg" alt="expo foot" class="img-responsive">
                </div>

              </div>

              <!-- Section Button -->
              <div class="col-xs-12">
                <a href="" class="blue second_links">Plus d'informations</a>
              </div>

            </div>

          </div> <!-- End of .expo_foot -->

        </div> <!-- End of .main_important -->

      </div> <!-- End of .container-fluid -->

    </header> <!-- End of header section -->

    <div class="container-fluid">

      <!-- Sections' Presentation -->
      <div class="row section_presentation">

        <!-- Media Section -->
        <div class="col-xs-12 col-sm-6 media_section contentHeight">

          <div class="title_container">
            <h3>Médias</h3>
          </div>

          <div class="content_container">

            <div class="tests_videos_container">

              <div class="medias_container">
                <img src="css/images/dbzhd_snes.jpg" alt="" class="img-responsive">
              </div>

              <div class="text_container">
                <div class="title_container">
                  <h3>Title</h3>
                </div>
                <p class="text-justify">Imbiber, porter la congolexicomatisation inter-continentaliste vise à cadrer mes frères propres avec la formule 1+(2x5), bonnes fêtes.</p>
              </div>

            </div> <!-- End of .tests_videos_container -->

            <div class="podcasts_container">

              <div class="medias_container">
                <img src="css/images/dbzhd_snes.jpg" alt="" class="img-responsive">
              </div>

              <div class="text_container">
                <div class="title_container">
                  <h3>Title</h3>
                </div>
                <p class="text-justify"> Chapitre abstrait 3 du conpendium : la réflexologie inter-continentaliste continue à réglementer les grabuses lastiques vers l'humanisme, c’est clair. </p>
              </div>

            </div> <!-- End of .podcasts_container -->

            <div class="tests_written_container">

              <div class="medias_container">
                <img src="css/images/dbzhd_snes.jpg" alt="" class="img-responsive">
              </div>

              <div class="text_container">
                <div class="title_container">
                  <h3>Title</h3>
                </div>
                <p class="text-justify"> Parallèlement, la contextualisation éventualiste sous cet angle là consiste à établir le conpemdium possédant la francophonie, je vous en prie. </p>
              </div>

            </div> <!-- End of .tests_written_container -->

          </div> <!-- End of .content_container -->

        </div> <!-- End of .media_section -->

        <!-- Feedbacks + Random Section -->
        <div class="col-xs-12 col-sm-6 feed_random contentHeight">
          <div class="row">

            <!-- Feedbacks -->
            <div class="col-xs-12 feedback_section">

              <div class="title_container">
                <h3>Derniers compte-rendus</h3>
              </div>

              <div class="content_container">

                <?php

                  $res_cr = $cnx->prepare('SELECT * FROM evenement ORDER BY id_event DESC LIMIT 1');
                  $res_cr->execute();

                  while ($data = $res_cr->fetch(PDO::FETCH_ASSOC)) {

                    echo

                    '<div class="medias_container">
                      <img src="upload/' . $data['img_event'] . '" alt="" class="img-responsive">
                    </div>

                    <div class="text_container">
                      <div class="title_container">
                        <h4 class="text-left">' . $data['titre_event'] . '<br/><small>' . $data['date_event'] . '</small></h4>
                      </div>
                      <p class="text-justify">' . substr($data['txt_event'], 0, 100) . ' ... <a href="">Voir plus</a></p>
                    </div>';

                  }

                ?>

              </div>
            </div>

            <!-- Random -->
            <div class="col-xs-12 random_section">

              <div class="title_container">
                <h3>Le coin Random</h3>
              </div>

              <div class="content_container">

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
                            <img src="upload/' . $data['img_jeu'] . '" alt="" class="img-responsive">
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
                            <img src="upload/' . $data['img_console'] . '" alt="" class="img-responsive">
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

            </div> <!-- End of .random_section -->

          </div>
        </div> <!-- End of .feed_random -->

      </div> <!-- End of .section_presentation -->

    </div> <!-- End of .container-fluid -->

    <footer>

      <?php include 'pages/components/_footer.php' ?>

    </footer>

    <!-- Jquery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Bootstrap - Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Custom JS - Adaptive Height -->
    <script type="text/javascript" src="js/adaptive_height.js"></script>

  </body>
</html>
