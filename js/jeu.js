$(document).ready(function() {
    var gameData;
    $('#lookingForGame').keyup(function() {
        $("#gamelist").html("");
        let inputValue = $(this).val();
        if (inputValue.length >= 0) {
            $.ajax({
                method: "POST",
                url: "gamesearch.php",
                data: {
                    game: inputValue
                },
                datatype: "json",
                success: (data) => {
                    gameData = JSON.parse(data);
                    for (let i = 0; i < gameData.length; i++) {
                        $("#gamelist").append("<div class='game' id='G" + gameData[i].id_jeu + "'>" + gameData[i].nom_jeu + " <small>" + gameData[i].nom_console + "</small>  <a class='selectGame' href='#'><strong>+</strong></a></div>");
                    }
                    $('a.selectGame').click(function() {
                        let gIndex = $(".game").index($(this).parents());
                        let gId = $(this).parents().attr("id").substr(1);
                        console.log(gId);
                        let alreadySelected = false;
                        $(".choosengame .game").each(function() {
                            let eId = $(this).attr("id").substr(1);
                            if (eId == gId) {
                                alreadySelected = true;
                            }
                        });
                        if (!alreadySelected) {
                            $(".choosengame").append("<div class='game' id='C" + gameData[gIndex].id_jeu + "'>" + gameData[gIndex].nom_jeu + " <small>" + gameData[gIndex].nom_console + "</small>  <a class='removeGame' href='#'><strong>-</strong></a></div>");
                        }
                        $('a.removeGame').click(function(){
                          let cId = $(this).parents().attr("id");
                          $("#"+cId).remove();
                        })
                    });
                },
                error: function(request, status, error) {
                    console.log(error);
                }
            });
        }
    });
});
