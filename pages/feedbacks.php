<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OSCCOP - Content</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/convert/style.css">

  </head>
  <body>

    <header>

      <!-- Navbar -->
      <?php include 'components/_navbar_sub.php' ?>

    </header>

    <div class="container-fluid">

      <div class="row">
        <div class="col-xs-12 col-sm-9">

          <!-- Section Title -->
          <div class="title_container">
            <h1>Compte-rendus</h1>
          </div>

          <!-- Section Content -->
          <div class="content_container">

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

            <div class="elements_container" style="display: flex; flex-wrap: wrap; justify-content: space-around">

              <div class="element" style="width: 15%; margin: 25px">
                <a href="#">
                  <div class="medias_container">
                    <img src="../images/test_affiche.jpg" alt="affiche" class="img-responsive">
                  </div>
                  <div class="text_container">
                    <p>Voir</p>
                  </div>
                </a>
              </div>

            </div> <!-- End of .elements_container -->

            <ul class="pagination">
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul>

          </div>

        </div> <!-- End of .col-sm-9 -->

        <div class="hidden-xs col-sm-3">

          <div class="row">
            <div class="col-sm-12">

              <div class="title_container">
                <h3>Expo Foot</h3>
              </div>

              <div class="content_container">

                <div class="text_container">
                  <p class="text-justify">Cum haec taliaque sollicitas eius aures everberarent expositas semper eius modi rumoribus et patentes, varia animo tum miscente consilia.</p>
                </div>

                <div class="medias_container">
                  <img src="../images/expo_foot.jpg" alt="expo foot" class="img-responsive">
                </div>

                <div class="text_container">
                  <p class="text-justify">Tandem id ut optimum factu elegit: et Vrsicinum primum ad se venire summo cum honore mandavit ea specie ut pro rerum tunc urgentium.</p>
                </div>

                <a href="#" class="second_links">Plus d'infos</a>

              </div>

            </div> <!-- End of col-sm-12 -->
          </div>

          <div class="row">
            <div class="col-sm-12">

              <div class="title_container">
                <h3>Le Coin Random</h3>
              </div>

              <div class="content_container">

                <div class="medias_container">
                  <img src="../images/dbzhd_snes.jpg" alt="" class="img-responsive">
                </div>

                <div class="text_container">
                  <p class="text-justify">Tandem id ut optimum factu elegit: et Vrsicinum primum ad se venire summo cum honore mandavit ea specie ut pro rerum tunc urgentium.</p>
                </div>

                <a href="#" class="second_links">Plus d'infos</a>

              </div>

            </div> <!-- End of .col-sm-12 -->
          </div>

        </div> <!-- End of .col-sm-3 -->
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

  </body>
</html>
