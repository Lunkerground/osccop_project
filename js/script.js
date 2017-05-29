let games = [];
let idGame = [];

$('#modEvent').click(function () {
    $('#eventModalModif').modal('show')

    // Je récupère toutes les données du formulaire
    let myform = document.getElementById('modEventForm')
    let formContent = new FormData(myform)


    var editorText = CKEDITOR.instances.eventPresentationModif.getData();
    var art = $('#eventPresentationModif').text();

    var id = $('#idEvent').val();
    console.log(id);
    console.log(editorText);

    var date = formContent.get('modEventDate')
    date = date.split("-")
    date = date[2] + "-" + date[1] + "-" + date[0]
    console.log(date);

    formContent.append('modEventPresentation', editorText);
    formContent.append('id_event', id);
    formContent.append('gamesMod', idGameMod);


    $('.choosedgame .gameName').each(function () {
      games.push('<p>' + $(this).html() + '</p>');
      idGameMod.push($(this).parents('.game').attr('id').substr(1))
    });

    // je rentre toute les données précédemment acquise dans le modal pour validation
    modContentToModal(
        formContent.get('modEventName'),
        date,
        CKEDITOR.inline('modalEventTextModif').setData(art)
    )
    console.log(formContent.get('modEventPoster'))
    $('#validateMod').click(function () {
        $.ajax({
                url: '../php/modifierEvent.php',
                data: formContent,
                type: 'POST',
                contentType: false,
                processData: false,
                success: () => {
                $('#eventModalModif').modal('hide')
        $("#modEventForm")[0].reset()
        $('.choosedgame').html("")
        idGame = []
        games = []
        alertMessage('SUCCESS', 'Ce nouvel événement a été correctement ajouté à la base de donnée')
    }
    })
    })
})


var modContentToModal = (eventtitlemod, eventdatemod) => {
    $('#modalEventTitleModif').html(eventtitlemod);
    $('#modalEventDateModif').html(eventdatemod);
}
