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


var copyElements = document.querySelectorAll('a[data-action="copy"]');

for(var element of copyElements) {
  element.addEventListener('click', function(e) {
    e.preventDefault();
    // Elemento a copiar
    var code = element.parentElement.nextElementSibling;

    var textArea = document.createElement("textarea");
    textArea.value = code.value;
    document.body.appendChild(textArea);
    textArea.select();

    if(document.execCommand("copy")) {
      bootstrapNotify('success', 2000, 'Código copiado en tu portapapeles.');
    }
    else {
      bootstrapNotify('error', 2000, 'No se ha podido copiar el código.');
    }
    document.body.removeChild(textArea);
  });
}

function bootstrapNotify(notify_type, notify_timer, notify_message){
  $.notify({
    // options
    message: notify_message,
  },{
    // settings
    element: 'body',
    position: null,
    type: notify_type,
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: false,
    placement: {
      from: "bottom",
      align: "center"
    },
    spacing: 10,
    z_index: 1031,
    delay: 2000,
    timer: notify_timer,
    url_target: '_blank',
    mouse_over: null,
    animate: {
      enter: 'animated fadeInUp',
      exit: 'animated fadeOutDown'
    },
    onShow: null,
    onShown: null,
    onClose: null,
    onClosed: null,
  });
}