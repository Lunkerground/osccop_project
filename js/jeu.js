/*jshint esversion: 6 */
var gameData;
var nbGameMaxDisplay = 20;
var queryOffset = 0;
var numberOfGameFound;
$(document).ready(function() {
  request(""); // requete pour afficher tout les jeux par défaut
  $('#lookingForGame').keyup(function() {
    let inputValue = $(this).val();
    queryOffset = 0;
    request(inputValue);
  });
});

var request = (inpVal) => {
  $.ajax({
    method: "GET",
    url: "../php/gamesearch.php",
    data: {
      game: inpVal,
      typeOfSearch: $("select[name=typeOfSearch]").val()
    },
    datatype: "json",
    success: (data) => {
      nbGameMaxDisplay = 20;
      gameData = JSON.parse(data);
      numberOfGameFound = gameData[0].nbRow;
      gameData.shift();

      // ajoute la pagination si le nombre de jeux à afficher dépasse la limite
      if (numberOfGameFound > nbGameMaxDisplay) {
        $('#pages').html("");
        for (let p = 1; p <= Math.ceil(numberOfGameFound / nbGameMaxDisplay); p++) {
          $('#pages').append("<a href='#' class='pagenb'>" + p + " </a>");
        }
        $('a.pagenb').click(function() {
          queryOffset = $(".pagenb").index($(this)) * nbGameMaxDisplay;
          $("#gamelist").html("");
          resultDisplay(gameData, queryOffset, nbGameMaxDisplay);
        });
      } else {
        $('#pages').html("");
        resultDisplay(gameData, queryOffset, nbGameMaxDisplay);
      }
      //affiche les jeux correspondant à la recherche
      resultDisplay(gameData, queryOffset, nbGameMaxDisplay);
    },
    error: function(request, status, error) {
      console.log(error);
    }
  });
};
var resultDisplay = (data, offset, limit) => {
  $("#gamelist").html("");
  $('#nbGame').html("");
  let limitOfGame = limit;
  if (numberOfGameFound <= 1) {
    $("#nbGame").append("<strong>" + numberOfGameFound + "</strong> jeu trouvé");
  } else {
    $("#nbGame").append("<strong>" + numberOfGameFound + "</strong> jeux trouvés");
  }
  if ((numberOfGameFound - offset) < limit) {
    limitOfGame = numberOfGameFound - offset - 1;
    console.log("limit:" + limitOfGame);
  }
  // affiche les jeux
  for (let i = offset; i <= (offset + limitOfGame); i++) {
    $("#gamelist").append("<div class='game' id='G" + data[i].id_jeu + "'>" + data[i].nom_jeu + " <small>" + data[i].nom_console + "</small>  <a class='selectGame' href='#'><strong>+</strong></a></div>");
  }
  //Ajout de jeu dans la selection
  $('a.selectGame').click(function() {
    let gIndex = $(".game").index($(this).parents());
    let gId = $(this).parents().attr("id").substr(1);
    //vérfie si le jeu fait déjà parti de la sélection
    let alreadySelected = false;
    $(".choosengame .game").each(function() {
      let eId = $(this).attr("id").substr(1);
      if (eId == gId) {
        alreadySelected = true;
      }
    });
    //s'il ne fait pas partie de la selection, il est ajouté
    if (!alreadySelected) {
      selectedDisplay(gameData[(gIndex + queryOffset)].id_jeu, gameData[(gIndex + queryOffset)].nom_jeu, gameData[(gIndex + queryOffset)].nom_console);
    }
    //retirer un jeu de la liste des selectionnés
    $('a.removeGame').click(function() {
      let cId = $(this).parents().attr("id");
      $("#" + cId).remove();
    });
  });
};

var selectedDisplay = (gameId, gameName, consoleName) => {
  $(".choosengame").append("<div class='game' id='C" + gameId + "'>" + gameName + " <small>" + consoleName + "</small>  <a class='removeGame' href='#'><strong>-</strong></a></div>");
};
