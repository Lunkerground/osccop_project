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

    formContent.append('modEventPresentation', editorText);
    formContent.append('id_event', id);

    // je rentre toute les données précédemment acquise dans le modal pour validation
    modContentToModal(
        formContent.get('modEventName'),
        formContent.get('modEventDate'),
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
