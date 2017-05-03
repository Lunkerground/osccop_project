var NBGAMEMAXTODISPLAY = 13
var gameData
var queryOffset = 0
$(document).ready(function () {
  let formContent = {}
  let games = []
  let idGame = []
  request('') // requete pour afficher tout les jeux par défaut

  // il se passe des trucs si je commence à remplir le champ de recherche de jeu...
  $('#lookingForGame').keyup(function () {
    let inputValue = $(this).val()
    queryOffset = 0
    request(inputValue)
  })

  // Que se passe-t'il si j'appuie sur le bouton valider de la création d'événement
  $('#addEvent').click(function () {
    $('#eventModal').modal('show')

    // Je récupère toutes les données des tags "input" du formulaire
    $('#addEventForm input').each(function () {
      addToContent(
        formContent,
        $(this).attr('name'),
        $(this).val()
      )
    })
    // Je récuprèe les données du textarea du formulaire
    addToContent(
      formContent,
      $('#addEventForm textarea').attr('name'),
      $('#addEventForm textarea').val()
    )

    // Je récupère la liste des jeux sélectionnés et leurs id
    $('.choosedgame .gameName').each(function () {
      games.push('<p>' + $(this).html() + '</p>')
      idGame.push($(this).parents('.game').attr('id').substr(1))
    })

    // je rentre toute les données précédemment acquise dans le modal pour validation
    addContentToModal(formContent.eventName, formContent.eventDate, formContent.eventPresentation, games)
  })
})

// Fonction de requête pour les jeux
var request = (inpVal) => {
  $.ajax({
    method: 'GET',
    url: 'http://localhost/osccop_project/php/gamesearch.php',
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
          $('#pages').append("<a class='pagenb'>" + p + ' </a>')
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
        resultDisplay(
          gameData,
          queryOffset,
          NBGAMEMAXTODISPLAY,
          numberOfGameFound
        )
      }
      // affiche les jeux correspondant à la recherche
      resultDisplay(
        gameData,
        queryOffset,
        NBGAMEMAXTODISPLAY,
        numberOfGameFound
      )
    },
    error: function (request, status, error) {
      console.log(error)
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
    $('#gamelist').append('<div class="game row" id="G' + data[i].id_jeu + '"><div class="col-lg-10">' + data[i].nom_jeu + ' <small>' + data[i].nom_console + '</small></div><div class="col-lg-2"><a class="selectGame">+</a></div></div>')
  }
  // Ajout de jeu dans la selection
  $('.selectGame').click(function () {
    let gIndex = $('.game').index($(this).parents().parents())
    let gId = $(this).parents().parents().attr('id').substr(1)
    console.log(gId);
    // vérfie si le jeu fait déjà parti de la sélection
    let alreadySelected = false
    $('.choosedgame .game').each(function () {
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
    $('.removeGame').click(function () {
      let cId = $(this).parents().parents().attr('id')
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
  $('.choosedgame').append('<div class="game row" id="C' + gameId + '"><div class="col-lg-10 gameName">' + gameName + ' <small>' + consoleName + '</small></div><div class="col-lg-2"> <a class="removeGame">X</a></div></div>')
}

// fonction pour le stockage des données du formulaire
var addToContent = (object, key, value) => {
  if (key !== undefined) {
    object[key] = value
  }
}

// fonctin de remplissage du modal de prévisualisation/validation
var addContentToModal = (eventtitle, eventdate, eventtext, eventgames) => {
  $('#modalEventTitle').append(eventtitle)
  $('#modalEventDate').append(eventdate)
  $('#modalEventText').append(eventtext)
  $('#modalEventGames').append(eventgames)
}
