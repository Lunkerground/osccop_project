var titreDataAll;
var monthValue;
var yearValue;

var requeteEvent = () => {
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
        $('#listeEvent').append('<li id="' + titreDataAll[i].id_event +
          '"> ' + titreDataAll[i].titre_event +
          '<a href="?page=events&event=' + titreDataAll[i].id_event + '" data-toggle="modal" data-target=""><i class="fa fa-wrench" aria-hidden="true"></i></a> <a href="" data-toggle="modal" data-target="" onclick= "supprEvent(this)"><i class="fa fa-times" aria-hidden="true" style = "color: #CC3300"></i></a></li>');
        $('#idArticleSuppr').val(titreDataAll[i].id_event);
      }
    }
  });
}

$('#mois,#annee').change(function() {
  $('#listeEvent').html("");
  monthValue = $("#mois").val();
  yearValue = $("#annee").val();
  requeteEvent();
});

var supprEvent = (event) => {
  console.log($(event).parents().attr('id'));
  $.ajax({
    method: "POST",
    url: "../php/suppressionEvent.php",
    data: {
      id: $(event).parents().attr('id')
    },
    datatype: "json",
    success: (data) => {
      $('#listeEvent').html("")
      requeteEvent();
    }
  })

};
