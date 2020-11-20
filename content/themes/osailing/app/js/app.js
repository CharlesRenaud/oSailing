require('jquery.scrollex');

var app = {
  init: function() {
    console.log('init');

    // Mise en place de Rellax
    //https://www.npmjs.com/package/rellax

    // Rellax est disponible ici car déclaré dans notre fichier de conf Webpack (ProvidePlugin)

    var rellax = new Rellax('.header', {
      speed: 3
    });

    // Mise en place de Scrollex
    // https://www.npmjs.com/package/jquery.scrollex

    // Je commence par cibler toutes mes sections dans mon main
    //console.log($('.main > section'));

    $('.main > section').each(function() {
      // pour chaque section

      //console.log(this);
      // this = ma section

      // Je "jquerise" mon élément
      // $(this) = ma section jsquerisée
      //console.log($(this));

      var id = $(this).attr('id');

      //console.log(id);

      // J'applique scrollex sur mon element (ma section)
      $(this).scrollex({
        // J'indique a scrolex de se baser sur le milieu de la page
        //https://github.com/ajlkn/jquery.scrollex#mode-top-and-bottom
        mode: 'middle',

        // Lorsque mon élément rentre sur la page (milieu de la page car mode: 'middle')
        // https://github.com/ajlkn/jquery.scrollex#enter
        enter: function() {
          // console.log(this);
          // console.log('est entré sur la page');
          app.handleEnterElement(id);
        },

        // Lorsque mon élément sort de la page (idem pour milieu)
        // https://github.com/ajlkn/jquery.scrollex#leave
        leave: function() {
          // console.log(this);
          // console.log('est sorti de la page');
          app.handleLeaveElement(id);
        }
      });
    });

    // Mise en place du Smoothscroll
    // Je vais cibler mes elements de type <a>.
    // Problème, je ne souhaite pas déclencher de smoothscroll sur mes
    // éventuels liens vers des pages externes (ex: <a href="http://oclock.io">).
    // Je vais donc cibler mes elements de type <a> qui ont un href
    // avec un # (non vide) (ex: <a href="#toto">).
    /*
      a[href*="#"] => Je veux tout les elements A avec un href qui comporte une ancre (vide ou non  => *)
      :not([href="#"]) => Parmis ceux là, je ne veux pas ceux qui sont strictement égale à # (href="#")
      Au final: je veux tout les éléments A avec un href qui comporte une ancre non vide !
    */
    $('a[href*="#"]:not([href="#"])').on('click', app.handleLinksClick);
  },
  handleEnterElement: function(element_id) {
    $('.navigation a[href="#' + element_id + '"]').addClass('active');
  },
  handleLeaveElement: function(element_id) {
    $('.navigation a[href="#' + element_id + '"]').removeClass('active');
  },
  handleLinksClick: function(evt) {
    console.log(evt);

    // Je supprime l'évenement par défaut de l'ancre.
    evt.preventDefault();

    // Je récupère l'élément sur lequel on a clické
    var clickedElement = evt.target;

    console.log(clickedElement);
    console.log(clickedElement.hash);

    // object.hash => Me permet de récuperer la valeur du href
    // https://developer.mozilla.org/en-US/docs/Web/API/HTMLHyperlinkElementUtils/hash

    // Je jqueryse l'élément sur lequel je souhaite me rendre
    var $target = $(clickedElement.hash);

    // $target contient donc l'élement de ma page où je doit scroller
    console.log($target);

    // Je regarde si la propriété .length me retourne quelque chose
    // En gros, je vérifie si mon élément existe bien !
    if ($target.length) {
      // Je viens calculer la position de mon élément ciblé
      // par rapport au haut de ma page
      var targetPosition = $target.offset().top;

      // Je viens animer le scroll
      $('html, body').animate(
        {
          scrollTop: targetPosition
        },
        2000
      );
    }
  }
};

$(app.init);
