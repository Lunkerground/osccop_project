<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>test recherche de jeu</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="input-group">
            <span class="input-group-addon">Recherche de jeu</span>
            <input type="text" id='lookingForGame' class="form-control" placeholder="recherche de jeu">
          </div>
        </div>
        <div class="col-sm-4">
          <label for="typeOfSearch">Recherche par:</label>
            <select class="typeOfSearch" name="typeOfSearch">
              <option value="jeu">Jeu</option>
              <option value="console">Console</option>
            </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div id='pages'></div>
          <div id="gamelist"></div>
        </div>
        <div class="choosengame col-md-3 col-sm-6"></div>
      </div>
      <button type="button" name="button">Envoyer</button>
    </div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="../js/jeu.js"></script>
  </body>
</html>
