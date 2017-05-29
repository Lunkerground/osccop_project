var NBGAMEMAXTODISPLAY = 13
var gameData
var queryOffset = 0
var consoleName = ''
var gameName = ''
var gameImage = ''
$(document).ready(function () {
  request('') // requete pour afficher tout les jeux par défaut

  // il se passe des trucs si je commence à remplir le champ de recherche de jeu...
  $('#search').keyup(function () {
    let inputValue = $(this).val()
    queryOffset = 0
    request(inputValue)
  })
  $('input[name=submit]').click(function (e) {
    e.preventDefault
    let myform = document.getElementById('gameManagementForm')
    let formContent = new FormData(myform)
    let confirmContent = ''
    let confirmTitle = ''
    let newImage = document.getElementById('inputImage')
    readURL(newImage)
    if (formContent.get('action') !== 'new') {
      confirmTitle = 'Edition de jeu'
      confirmContent = '<p>Voici les changement que vous allez effectuer</p><table><tr><td></td><th>Ancien</th><th>Nouveau</th></tr><tr><th>Nom du jeu</th><td>' + gameName + '</td><td>' + formContent.get('name_game') + '</td></tr><tr><th>Console</th><td>' + consoleName + '</td><td>' + $('select[name=console] option:selected').text() + '</td></tr><tr><th>Image</th><td><img src="../images/upload/' + gameImage + '" width="100px"/></td><td><img id="newImage" src="#" width="100px"/></td></tr></table>'
    } else {
      confirmTitle = 'Ajout de jeu'
      confirmContent = '<p>Vous allez ajouter ce jeu bas de donnée<p><p><strong>Nom</strong>: ' + formContent.get('name_game') + '</p>'
    }
    addContentToModal(confirmTitle, confirmContent)
    $('#GameModalConfirm').modal('show')
    $('#GameModalConfirm #validate').click(function () {
      $('#GameModalConfirm').modal('hide')
      $.ajax({
        url: '/osccop_project/php/gameManagement.php',
        data: formContent,
        type: 'POST',
        contentType: false,
        processData: false,
        success: (data) => {
          let messageContent
          if (data == 'OK') {
            messageContent = 'Le jeu ' + gameName + ' sur ' + consoleName + ' a été correctement ajouter à la base de donnée'
            request('')
          } else {
            messageContent = 'Une erreur est survenue<br>' + data
          }
          alertMessage('SUCCESS', messageContent)
        }
      })
    })
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
        $('.pagination').html('')
        for (let p = 1; p <= Math.ceil(numberOfGameFound / NBGAMEMAXTODISPLAY); p++) {
          $('.pagination').append("<li><a href='#' class='pagenb'>" + p + ' </a></li>')
        }
        $('a.pagenb').click(function (e) {
          e.preventDefault()
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
        $('.pagination').html('')
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
  $('#gamelist').append('<div class="newGame">++ Nouveau jeu ++ </div>')
  $('.newGame').click(function () {
    $('#actionLegend').text('Ajouter un jeu')
    $('input[name=name_game]').val('')
    $('input[name=action]').val('new')
  })
  for (let i = offset; i <= (offset + limitOfGame); i++) {
    $('#gamelist').append('<div class="game row" id="G' + i + '"><div class="col-lg-10">' + data[i].nom_jeu + ' <small>' + data[i].nom_console + '</small></div><div class="col-lg-1"><a class="editGame" onclick="editGame(this)"><span class="glyphicon glyphicon-pencil"></span></a></div><div class="col-lg-1"><a class="deleteGame" onclick= "deleteGame(this)" ><span class="glyphicon glyphicon-remove"></span></a></div></div>')
  }
}

// Editer un jeu
var editGame = (element) => {
  $('#actionLegend').text('Editer un jeu')
  var blockId = $(element).parents().parents().attr('id').substr(1)
  $('input[name=name_game]').val(gameData[blockId].nom_jeu)
  $('select[name=console]').val(gameData[blockId].id_console)
  $('input[name=action]').val(gameData[blockId].id_jeu)
  $('.image img').attr('src', '../images/upload/' + gameData[blockId].img_jeu)
  consoleName = gameData[blockId].nom_console
  gameName = gameData[blockId].nom_jeu
  gameImage = gameData[blockId].img_jeu
}

// Retirer un jeu de la bdd
var deleteGame = (element) => {
  let blockId = $(element).parents().parents().attr('id').substr(1)
  let confirmContent = 'Confirmez-vous la suppression du jeu ' + gameData[blockId].nom_jeu + ' sur ' + gameData[blockId].nom_console + ' de la base de donnée?'
  addContentToModal('Suppression de jeu', confirmContent)
  $('#GameModalConfirm').modal('show')
  $('#GameModalConfirm #validate').click(function () {
    $('#GameModalConfirm').modal('hide')
    let consoleName = gameData[blockId].nom_console
    let gameName = gameData[blockId].nom_jeu
    $.ajax({
      method: 'GET',
      url: '/osccop_project/php/deleteGame.php',
      data: {
        id: gameData[blockId].id_jeu
      },
      datatype: 'json',
      success: (data) => {
        let messageContent
        if (data === 'OK') {
          messageContent = 'Le jeu ' + gameName + ' sur ' + consoleName + ' a été correctement effacer de la base de donnée'
          request('')
        } else {
          messageContent = 'Une erreur est survenue<br>' + data
        }
        alertMessage('SUCCESS', messageContent)
      }
    })
  })
}

var addContentToModal = (title, content) => {
  $('#GameModalConfirm .modal-title').html(title)
  $('#GameModalConfirm .modal-body').html(content)
}

var alertMessage = (messageTitle, messageText) => {
  $('#modalMessageTitle').html(messageTitle)
  $('#MessageText').html(messageText)
  $('#messageModal').modal('show')
}

// fonction pour l'affichage de l'affiche dans le modal
var readURL = (input) => {
  if (input.files && input.files[0]) {
    var reader = new FileReader()
    reader.onload = function (e) {
      $('.image img, #newImage').attr('src', e.target.result)
    }
    reader.readAsDataURL(input.files[0])
  }
}
