const app = {
  init: function() {
    $('#modalMessage').modal('show');
    $('#deleteUser').on('click', function() {
      $('#modalAlert').modal('show');
    });
    app.animationBasiqueOnload();
    $('.content-animation').on('click', app.animationBasique);
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
