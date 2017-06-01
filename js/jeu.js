var NBGAMEMAXTODISPLAY = 10
var gameData
var queryOffset = 0
var currentPage = 0
var numberOfGameFound = 0
var nbPage = 0

$(document).ready(function () {
  let games = []
  let idGame = []

  CKEDITOR.replace('eventPresentation')

  request('') // requete pour afficher tout les jeux par défaut

  // il se passe des trucs si je commence à remplir le champ de recherche de jeu...
  $('#lookingForGame').keyup(function () {
    let inputValue = $(this).val()
    queryOffset = 0
    request(inputValue)
  })

  // Que se passe-t'il si j'appuie sur le bouton valider de la création d'événement
  $('#addEvent').click(function () {
    var editorText = CKEDITOR.instances.eventPresentation.getData()

    $('#modalEventText').html(editorText)
    $('#eventModal').modal('show')
    // Je récupère toutes les données du formulaire
    let myform = document.getElementById('addEventForm')
    let formContent = new FormData(myform)

    // Je récupère la liste des jeux sélectionnés et leurs id
    $('.choosedgame .selectGame').each(function () {
      games.push('<p>' + $(this).html() + '</p>')
      idGame.push($(this).attr('id').substr(1))
    })
    // que j'ajoute aux les données du formulaire
    formContent.append('games', idGame)
    formContent.append('eventPresentation', editorText)

      // je rentre toute les données précédemment acquise dans le modal pour validation
    addContentToModal(
      formContent.get('eventName'),
      formContent.get('eventDate'),
      games
    )

    $('#validate').click(function () {
      $.ajax({
        url: '../php/ajoutEvent.php',
        data: formContent,
        type: 'POST',
        contentType: false,
        processData: false,
        success: () => {
          $('#eventModal').modal('hide')
          $('#addEventForm')[0].reset()
          $('.choosedgame').html('')
          idGame = []
          games = []
          alertMessage('SUCCESS', 'Ce nouvel événement a été correctement ajouté à la base de donnée')
        }
      })
    })
  })
})

// Fonction de requête pour la recherche de jeux
var request = (inpVal) => {
  $.ajax({
    method: 'GET',
    url: '../php/gamesearch.php',
    data: {
      game: inpVal,
      typeOfSearch: $('select[name=typeOfSearch]').val()
    },
    datatype: 'json',
    success: (data) => {
      gameData = JSON.parse(data)
      numberOfGameFound = parseInt(gameData[0].nbRow)
      gameData.shift()

      // ajoute la pagination si le nombre de jeux à afficher dépasse la limite
      nbPage = Math.ceil(numberOfGameFound / NBGAMEMAXTODISPLAY)
      if (numberOfGameFound > NBGAMEMAXTODISPLAY) {
        pagination(nbPage, currentPage)
      } else {
        pagination(nbPage, currentPage)
      }
      // affiche les jeux correspondant à la recherche
      resultDisplay(
        gameData,
        queryOffset,
        (NBGAMEMAXTODISPLAY - 1),
        numberOfGameFound
      )
    }
  })
}

// fonction pour afficher la liste des jeux de la recherche
var resultDisplay = (data, offset, limit, gameCount) => {
  $('#gamelist').html('')
  $('#nbGame').html('')
  let limitOfGame = limit
  if (gameCount === 0) {
    $('#nbGame').append('<strong>Aucun</strong> jeu trouvé')
  } else if (gameCount === 1) {
    $('#nbGame').append('<strong>1</strong> jeu trouvé')
  } else {
    $('#nbGame').append('<p><strong>Résultat : ' + gameCount + '</strong> jeux trouvés</p>')
  }
  if ((gameCount - offset) < limit) {
    limitOfGame = gameCount - offset - 1
  }
  // affiche les jeux
  for (let i = offset; i <= (offset + limitOfGame); i++) {
    $('#gamelist').append('<a class="selectGame" id="G' + data[i].id_jeu + '" data-toggle="tooltip" title="' + data[i].nom_console + '"><div class="game"><p><span class="glyphicon glyphicon-plus" style="color:green"></span> <strong>' + data[i].nom_jeu + '</strong></p></div></a>')
  }
  // Ajout de jeu dans la selection
  $('#gamelist .selectGame').click(function () {
    let gIndex = $('.selectGame').index($(this))
    let gId = $(this).attr('id').substr(1)

    // vérfie si le jeu fait déjà parti de la sélection
    let alreadySelected = false
    $('.choosedgame .selectGame').each(function () {
      let eId = $(this).attr('id').substr(1)
      if (eId === gId) {
        alreadySelected = true
      }
    })
    // s'il ne fait pas partie de la selection, il est ajouté
    if (!alreadySelected) {
      selectedDisplay(
        gameData[(gIndex + queryOffset)].id_jeu,
        gameData[(gIndex + queryOffset)].nom_jeu,
        gameData[(gIndex + queryOffset)].nom_console
      )
    }
    // retirer un jeu de la liste des selectionnés
    $('.choosedgame .selectGame').click(function () {
      let cId = $(this).attr('id')
      $('#' + cId).remove()
    })
  })
}

// fonction pour l'affichage de l'affiche dans le modal
var readURL = (input) => {
  if (input.files && input.files[0]) {
    var reader = new FileReader()
    reader.onload = function (e) {
      $('.modalEventPoster').attr('src', e.target.result)
    }
    reader.readAsDataURL(input.files[0])
  }
}

// fonction pour l'affichage des jeux qui ont été sélectionnés
var selectedDisplay = (gameId, gameName, consoleName) => {
  $('.choosedgame').append('<a class="selectGame" id="C' + gameId + '"><div class="game" ><p><span class="glyphicon glyphicon-remove" style="color:red"></span> <strong>' + gameName + '</strong></p></div></a>')
}

// fonctin de remplissage du modal de prévisualisation/validation
var addContentToModal = (eventtitle, eventdate, eventgames) => {
  $('#modalEventTitle').html(eventtitle)
  $('#modalEventDate').html(eventdate)
  $('#modalEventGames').html(eventgames)
}

var alertMessage = (messageTitle, messageText) => {
  $('#modalMessageTitle').html(messageTitle)
  $('#MessageText').html(messageText)
  $('#messageModal').modal('show')
}

var pagination = (nbP, currP) => {
  $('.pagination').html('')
  if (nbP > 0) {
    if (currP === nbP - 1) {
      $('.pagination').html('<li><a class="previous" onclick="previous()"><span class="glyphicon glyphicon-triangle-left"><span></a></li>')
    } else if (currP === 0) {
      $('.pagination').html('<li><a class="next" onclick="next()"><span class="glyphicon glyphicon-triangle-right"><span></a></li>')
    } else {
      $('.pagination').html('<li><a class="previous" onclick="previous()"><span class="glyphicon glyphicon-triangle-left"><span></a></li><li><a class="next" onclick="next()"><span class="glyphicon glyphicon-triangle-right"><span></a></li>')
    }
  }
}
var next = () => {
  $('#gamelist').html('')
  if (currentPage < nbPage) {
    currentPage += 1
    pagination(nbPage, currentPage)
    queryOffset = currentPage * NBGAMEMAXTODISPLAY
    resultDisplay(
      gameData,
      queryOffset,
      (NBGAMEMAXTODISPLAY - 1),
      numberOfGameFound
    )
  }
}
var previous = () => {
  $('#gamelist').html('')
  if (currentPage > 0) {
    currentPage -= 1
    pagination(nbPage, currentPage)
    queryOffset = currentPage * NBGAMEMAXTODISPLAY
    resultDisplay(
      gameData,
      queryOffset,
      (NBGAMEMAXTODISPLAY - 1),
      numberOfGameFound
    )
  }
}
