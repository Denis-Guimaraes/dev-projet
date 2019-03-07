const app = {
  init: function() {
    $('#modalMessage').modal('show');
    $('#deleteUser').on('click', function() {
      $('#modalAlert').modal('show');
    });
    $('#open-modalPassword').on('click', function() {
      $('#modalPassword').modal('show');
    });
    $('.delete-letter').on('click', app.deleteLetter);
    app.animationBasiqueOnload();
    $('.content-animation').on('click', app.animationBasique);
  },

  deleteLetter: function() {
    const $link = $(this).data('link');
    $('.delete-letter-link').first().attr('href', $link);
    $('#modalLetterDelete').modal('show');
  },

  animationBasiqueOnload: function() {
    const $class = $('.content-animation').first().next().data('animation');
    $('.content-animation').first().next().addClass($class + '-show');
  },

  animationBasique: function() {
    const $class = $(this).next().data('animation');
    if ($(this).next().hasClass($class + '-show')) {
      $(this).next().removeClass($class + '-show');
    } else {
      $(this).next().addClass($class + '-show');
    }
  },
};

app.init();
