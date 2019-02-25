const app = {
  init: function() {
    $('#modalMessage').modal('show');
    $('#deleteUser').on('click', function() {
      $('#modalAlert').modal('show');
    });
  }
};

app.init();
