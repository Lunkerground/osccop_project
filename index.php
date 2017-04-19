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

              <div class="col-xs-12">
                <h1 class="text-left">Évènements à venir</h1>
              </div>

              <!-- First Event to come -->
              <div class="col-xs-12 col-sm-6" style="padding: 15px;">
                <div style="background-color: grey; height: 200px; width: 50%; float: left;">

                </div>
                <div style="background-color: white; height: 200px; width: 50%; float: left;" class="text-center">
                  <h3>Title</h3>
                  <h3>Date</h3>
                  <h3><a href="#">+ d'infos</a></h3>
                </div>
              </div>

              <!-- Second Event to come -->
              <div class="col-xs-12 col-sm-6" style="padding: 15px;">
                <div style="background-color: grey; height: 200px; width: 50%; float: left;">

                </div>
                <div style="background-color: white; height: 200px; width: 50%; float: left;" class="text-center">
                  <h3>Title</h3>
                  <h3>Date</h3>
                  <h3><a href="#">+ d'infos</a></h3>
                </div>
              </div>

              <div class="col-xs-12">
                <button type="button" name="button">Voir les anciens évènements</button>
              </div>

            </div>
          </div>

          <!-- Football Exposition -->
          <div class="col-xs-12 col-sm-6 expo_foot">
            <div class="row">

              <div class="col-xs-12">
                <h1 class="text-right">Exposition Foot</h1>
              </div>

              <!-- Expo Text -->
              <div class="col-xs-12 col-sm-6" style="padding: 15px;">
                <div style="background-color: white; height: 200px">

                </div>
              </div>

              <!-- Expo Img -->
              <div class="col-xs-12 col-sm-6" style="padding: 15px;">
                <div style="background-color: white; height: 200px">

                </div>
              </div>

              <div class="col-xs-12">
                <button type="button" name="button">Plus d'informations</button>
              </div>

            </div>

          </div>

        </div>

      </div>

    </header>

    <!-- Jquery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- Bootstrap - Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>
