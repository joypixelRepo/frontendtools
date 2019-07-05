$('form#contactForm').on('submit', function(e){
  e.preventDefault();
  
  // DOM elements
  var form = $(this);
  var submitBtn = form.find('*[type="submit"]');
  var loading = form.find('.form-send-animation');

  // form POST elements
  var datos = form.serialize();

  $.ajax({
    url: '/action/sendMessage',
    type:"POST",
    cache: false,
    data: datos,
    beforeSend: function(){
      submitBtn.hide();
      submitBtn.attr('disabled', true);
      loading.show();
    },
    complete: function(){
      
    },
    success: function(response){
      if(response == 'ok') {
        swal({
          title: 'Mensaje enviado',
          text: 'El mensaje ha sido enviado correctamente. Nos pondremos en contacto contigo en la mayor brevedad posible.',
          type: 'success',
          timer: '8000',
          confirmButtonText: 'Aceptar',
          confirmButtonColor: '#263238',
          allowOutsideClick: true,
        });
        //bootstrapNotify('success', 5000, 'El mensaje ha sido enviado con éxito.');
      } 
      else if(response == 'fail_captcha') {
        bootstrapNotify('danger', 5000, 'El captcha no ha sido validado. Inténtalo de nuevo.');
        submitBtn.show();
        submitBtn.attr('disabled', false);
      }
      else {
        bootstrapNotify('danger', 5000, 'Ha ocurrido un error inesperado. Inténtalo de nuevo.');
        submitBtn.show();
        submitBtn.attr('disabled', false);
      }
      loading.hide();
    }
  });
});

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

$('.contact-detail a').hover(function() {
  if($(this).is(':hover')) {
    $(this).find('img').addClass('img-contact-hover');
  } else {
    $(this).find('img').removeClass('img-contact-hover');
  }
});



