$('#comment-btn').on('click', function(e) {
  e.preventDefault();
  $(this).hide();
  $('#comment-form').show();
});

$('#comment-form').on('submit', function(e) {
  e.preventDefault();
  if($(this).find('*[name="comment"]').val().length <= 3) {
    alert('El comentario debe tener más de 3 caracteres.');
  } else {
    this.submit();
  }
});