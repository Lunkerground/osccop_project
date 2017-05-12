var titreDataAll;
$('#mois,#annee').change(function() {
    $('#TEST').html("");
    var monthValue = $("#mois").val();
    var yearValue = $("#annee").val();
    $.ajax({
            method: "POST",
            url: "../php/lookingforevent.php",
            data: {
                'mois': monthValue,
                'annee': yearValue,
            },
            datatype: "json",
            success: (data) => {
            titreDataAll = JSON.parse(data);
    for (var i = 0; i < titreDataAll.length; i++) {
        $('#TEST').append('<li id="' + titreDataAll[i].id_event +
            '"> ' + titreDataAll[i].titre_event +
            '<a href="?page=events&event=' + titreDataAll[i].id_event + '" data-toggle="modal" data-target=""><i class="fa fa-wrench" aria-hidden="true"></i></a> </li>');
        $('#idArticleSuppr').val(titreDataAll[i].id_event);
    }
}
});
});