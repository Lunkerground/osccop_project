$('#modEvent').click(function () {
    $('#eventModalModif').modal('show')

    // Je récupère toutes les données du formulaire
    let myform = document.getElementById('modEventForm')
    let formContent = new FormData(myform)

    var art = $('#eventPresentationModif').text();
    console.log(art);

    // je rentre toute les données précédemment acquise dans le modal pour validation
    modContentToModal(
        formContent.get('modEventNameModif'),
        formContent.get('modEventDateModif'),
        CKEDITOR.inline('modalEventTextModif').setData(art)
    )
    console.log(formContent.get('modEventPoster'))
    $('#validate').click(function () {
        $.ajax({
                url: '../php/ajoutEvent.php',
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
