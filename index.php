<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>OSCCOP - Accueil</title>

    <!-- Bootstrap - Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/convert/style.css">

  </head>
  <body>

    <header>

      <!-- Banner -->
      <div class="banner">

      </div>

      <!-- Navbar -->
      <?php

        include('pages/components/navbar.php');

      ?>

      <div class="container-fluid">

        <!-- Important Informations - Next Dates + Football Games Expo -->
        <div class="row main_important">

          <!-- Next Events to come -->
          <div class="col-xs-12 col-sm-6 next_events">
            <div class="row">

              <!-- Section Title -->
              <div class="col-xs-12">
                <h1 class="text-left"><span class="yellow">Évènements à venir</span></h1>
              </div>

              <!-- First Event to come -->
              <div class="col-xs-12 col-sm-6">
                <div class="medias_container">
                  <img src="images/test_affiche.jpg" alt="affiche">
                </div>
                <div class="text_container text-center">
                  <p>Les 20 ans de la Playstation</p>
                  <p>Date</p>
                  <p><a href="#" class="blue third_links">+ d'infos</a></p>
                </div>
              </div>

              <!-- Second Event to come -->
              <div class="col-xs-12 col-sm-6">
                <div class="medias_container">
                  <img src="images/test_affiche.jpg" alt="affiche">
                </div>
                <div class="text_container text-center">
                  <p>Title</p>
                  <p>Date</p>
                  <p><a href="#" class="blue third_links">+ d'infos</a></p>
                </div>
              </div>

              <!-- Section Button -->
              <div class="col-xs-12">
                <a href="#" class="yellow second_links">Plus d'évènements</a>
              </div>

            </div>
          </div> <!-- End of .next_events -->

          <!-- Football Exposition -->
          <div class="col-xs-12 col-sm-6 expo_foot">
            <div class="row">

              <!-- Section Title -->
              <div class="col-xs-12">
                <h1 class="text-right"><span class="blue">Exposition Foot</span></h1>
              </div>

              <!-- Expo Text -->
              <div class="col-xs-12 col-sm-6">
                <div class="text_container">
                  <p class="text-justify">Cum haec taliaque sollicitas eius aures everberarent expositas semper eius modi rumoribus et patentes, varia animo tum miscente consilia, tandem id ut optimum factu elegit: et Vrsicinum primum ad se venire summo cum honore mandavit ea specie ut pro rerum tunc urgentium.</p>
                </div>
              </div>

              <!-- Expo Img -->
              <div class="col-xs-12 col-sm-6">
                <div class="medias_container">
                  <img src="images/expo_foot.jpg" alt="expo foot">
                </div>
              </div>

              <!-- Section Button -->
              <div class="col-xs-12">
                <a href="" class="blue second_links">Plus d'informations</a>
              </div>

            </div>

          </div> <!-- End of .expo_foot -->

        </div> <!-- End of .main_important -->

        <!-- Sections' Presentation -->
        <div class="row section_presentation">

          <!-- Media Section -->
          <div class="col-xs-12 col-sm-6 media_section">
            <div class="title_container">
              <h3>Médias</h3>
            </div>
            <div class="content_container">

            </div>
          </div>

          <!-- Feedbacks + Random Section -->
          <div class="col-xs-12 col-sm-6 feed_random">
            <div class="row">

              <!-- Feedbacks -->
              <div class="col-xs-12 feedback_section">
                <div class="title_container">
                  <h3>Compte-rendus</h3>
                </div>
                <div class="content_container">

                </div>
              </div>

              <!-- Random -->
              <div class="col-xs-12 random_section">
                <div class="title_container">
                  <h3>Le coin Random</h3>
                </div>
                <div class="content_container">
                  <div class="first_random" style="display: flex; padding: 25px">
                    <div class="medias_container" style="width: 40%">
                      <img src="images/dbzhd_snes.jpg" alt="">
                    </div>
                    <div class="text_container" style="width: 60%; margin-left: 25px">
                      <p class="text-justify">Cum haec taliaque sollicitas eius aures everberarent expositas semper eius modi rumoribus et patentes, varia animo tum miscente consilia, tandem id ut optimum factu elegit: et Vrsicinum primum ad se venire summo cum honore mandavit ea specie ut pro rerum tunc urgentium.</p>
                    </div>
                  </div>
                  <div class="second_random" style="display: flex; padding: 25px">
                    <div class="medias_container" style="width: 40%">
                      <img src="images/gamecube.jpg" alt="">
                    </div>
                    <div class="text_container" style="width: 60%; margin-left: 25px">
                      <p class="text-justify">Cum haec taliaque sollicitas eius aures everberarent expositas semper eius modi rumoribus et patentes, varia animo tum miscente consilia, tandem id ut optimum factu elegit: et Vrsicinum primum ad se venire summo cum honore mandavit ea specie ut pro rerum tunc urgentium.</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div> <!-- End of .container-fluid -->

    </header>

    <!-- Jquery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Bootstrap - Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>
