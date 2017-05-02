$(document).ready(function () {
  let formContent = {}
  let games = []
  let idGame = []
  $('#addEvent').click(function () {
    $('#eventModal').modal('show')
    $('#addEventForm input').each(function () {
      addToContent(
        formContent,
        $(this).attr('name'),
        $(this).val()
      )
    })
    addToContent(
      formContent,
      $('#addEventForm textarea').attr('name'),
      $('#addEventForm textarea').val()
    )
    $('.choosedgame .gameName').each(function () {
      games.push($(this).html())
      idGame.push($(this).parents('.game').attr('id').substr(1))
    })
  })
})
var addToContent = (object, key, value) => {
  if (key !== undefined) {
    object[key] = value
  }
}
var addContentToModal = (eventtitle, eventdate, eventtext, eventgames) => {
  $('#modalEventTitle').append(eventtitle)
  $('#modalEventDate').append(eventdate)
  $('#modalEventText').append(eventtext)
  $('#modalEventGames').append(eventgames)
}
