var NBGAMEMAXTODISPLAY = 13
var gameData
var queryOffset = 0
$(document).ready(function () {
  request('') // requete pour afficher tout les jeux par défaut

  // il se passe des trucs si je commence à remplir le champ de recherche de jeu...
  $('#search').keyup(function () {
    let inputValue = $(this).val()
    queryOffset = 0
    request(inputValue)
  })
})
var request = (inpVal) => {
  $.ajax({
    method: 'GET',
    url: '/osccop_project/php/gamesearch.php',
    data: {
      game: inpVal,
      typeOfSearch: $('select[name=typeOfSearch]').val()
    },
    datatype: 'json',
    success: (data) => {
      gameData = JSON.parse(data)
      let numberOfGameFound = parseInt(gameData[0].nbRow)
      gameData.shift()

      // ajoute la pagination si le nombre de jeux à afficher dépasse la limite
      if (numberOfGameFound > NBGAMEMAXTODISPLAY) {
        $('#pages').html('')
        for (let p = 1; p <= Math.ceil(numberOfGameFound / NBGAMEMAXTODISPLAY); p++) {
          $('.pagination').append("<li><a class='pagenb'>" + p + ' </a></li>')
        }
        $('a.pagenb').click(function () {
          queryOffset = $('.pagenb').index($(this)) * NBGAMEMAXTODISPLAY
          $('#gamelist').html('')
          resultDisplay(
            gameData,
            queryOffset,
            NBGAMEMAXTODISPLAY,
            numberOfGameFound
          )
        })
      } else {
        $('#pages').html('')
      }
      resultDisplay(
        gameData,
        queryOffset,
        NBGAMEMAXTODISPLAY,
        numberOfGameFound
      )
    }
  })
}
var resultDisplay = (data, offset, limit, gameCount) => {
  $('#gamelist').html('')
  $('#nbGame').html('')
  let limitOfGame = limit
  if (gameCount === 0) {
    $('#nbGame').append('<strong>Aucun</strong> jeu trouvé')
  } else if (gameCount === 1) {
    $('#nbGame').append('<strong>1</strong> jeu trouvé')
  } else {
    $('#nbGame').append('<strong>' + gameCount + '</strong> jeux trouvés')
  }
  if ((gameCount - offset) < limit) {
    limitOfGame = gameCount - offset - 1
  }
  // affiche les jeux
  for (let i = offset; i <= (offset + limitOfGame); i++) {
    $('#gamelist').append('<div class="game row" id="G' + data[i].id_jeu + '"><div class="col-lg-10">' + data[i].nom_jeu + ' <small>' + data[i].nom_console + '</small></div><div class="col-lg-1"><a class="editGame"><span class="glyphicon glyphicon-pencil"></span></a></div><div class="col-lg-1"><a class="deleteGame"><span class="glyphicon glyphicon-remove"></span></a></div></div>')
  }
  // Ajout de jeu dans la selection
  $('.editGame').click(function () {

  })
  $('.deleteGame').click(function () {

  })
}
