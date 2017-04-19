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
        console.log(titreDataAll);
        for (var i = 0; i < titreDataAll.length; i++) {
          $('#TEST').append('<li id="' + titreDataAll[i].id_event +
            '"> <a href="" data-toggle="modal" data-target="">' + titreDataAll[i].titre_event +
            '</a> </li>');
          $('#idArticleSuppr').val(titreDataAll[i].id_event);
        }
      }
    });
  });

