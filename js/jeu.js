var NBGAMEMAXTODISPLAY = 13
var gameData
var queryOffset = 0

$(document).ready(function () {
  let games = []
  let idGame = []


  CKEDITOR.replace( 'eventPresentation' );

  request(''); // requete pour afficher tout les jeux par défaut

  // il se passe des trucs si je commence à remplir le champ de recherche de jeu...
  $('#lookingForGame').keyup(function () {
    let inputValue = $(this).val()
    queryOffset = 0
    request(inputValue)
  })

  // Que se passe-t'il si j'appuie sur le bouton valider de la création d'événement
  $('#addEvent').click(function () {

    var editorText = CKEDITOR.instances.eventPresentation.getData();

    $('#modalEventText').html(editorText);
      $('#eventModal').modal('show');
    // Je récupère toutes les données du formulaire
    let myform = document.getElementById('addEventForm')
    let formContent = new FormData(myform)

    // Je récupère la liste des jeux sélectionnés et leurs id
    $('.choosedgame .gameName').each(function () {
      games.push('<p>' + $(this).html() + '</p>')
      idGame.push($(this).parents('.game').attr('id').substr(1))
    })
    // que j'ajoute aux les données du formulaire
    formContent.append('games', idGame);
    formContent.append('eventPresentation', editorText);

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
          $("#addEventForm")[0].reset()
          $('.choosedgame').html("")
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
      let numberOfGameFound = parseInt(gameData[0].nbRow)
      gameData.shift()

      // ajoute la pagination si le nombre de jeux à afficher dépasse la limite
      if (numberOfGameFound > NBGAMEMAXTODISPLAY) {
        $('.pagination').html('')
        for (let p = 1; p <= Math.ceil(numberOfGameFound / NBGAMEMAXTODISPLAY); p++) {
          $('.pagination').append("<li><a href='#' class='pagenb'>" + p + ' </a></li>')
        }
        $('a.pagenb').click(function (e) {
          e.preventDefault()
          queryOffset = $('.pagenb').index($(this)) * NBGAMEMAXTODISPLAY;
          $('#gamelist').html('')
          resultDisplay(
            gameData,
            queryOffset,
            NBGAMEMAXTODISPLAY,
            numberOfGameFound
          )
        })
      } else {
        $('.pagination').html('')
      }
      // affiche les jeux correspondant à la recherche
      resultDisplay(
        gameData,
        queryOffset,
        NBGAMEMAXTODISPLAY,
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
    $('#nbGame').append('<strong>' + gameCount + '</strong> jeux trouvés')
  }
  if ((gameCount - offset) < limit) {
    limitOfGame = gameCount - offset - 1
  }
  // affiche les jeux
  for (let i = offset; i <= (offset + limitOfGame); i++) {
    $('#gamelist').append('<div class="game row" id="G' + data[i].id_jeu + '"><div class="col-lg-10">' + data[i].nom_jeu + ' <small>' + data[i].nom_console + '</small></div><div class="col-lg-2"><a class="selectGame"><span class="glyphicon glyphicon-plus"></span></a></div></div>')
  }
  // Ajout de jeu dans la selection
  $('.selectGame').click(function () {
    let gIndex = $('.game').index($(this).parents().parents())
    let gId = $(this).parents().parents().attr('id').substr(1)

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
      let cId = $(this).parents().parents().attr('id');
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
  $('.choosedgame').append('<div class="game row" id="C' + gameId + '"><div class="col-lg-10 gameName">' + gameName + ' <small>' + consoleName + '</small></div><div class="col-lg-2"> <a class="removeGame"><span class="glyphicon glyphicon-remove"></span></a></div></div>')
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
