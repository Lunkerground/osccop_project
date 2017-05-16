// Fonction pour égaliser la hauteur des blocs

function adaptiveHeight(selector) {

  var bigger = 0;

  $(selector).each(function() {

    if (this.clientHeight > bigger) {

      bigger = this.clientHeight;

    };

  });

  $(selector).each(function() {

    $(this).css('height', bigger + 'px');

  });

}

// Appel de fonction sur les blocs correspondants

adaptiveHeight('.headerHeight');

adaptiveHeight('.eventHeight');

adaptiveHeight('.contentHeight');
