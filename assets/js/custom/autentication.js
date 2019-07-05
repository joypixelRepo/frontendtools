const avatars_a = $('.avatars a');
const form = $('#sign_up');

if(form.length > 0) {

	// inputs
	const name = $('*[name="full-name"]');
	const user = $('*[name="user"]');
	const email = $('*[name="email"]');
  const emailConfirm = $('*[name="emailConfirm"]');
	const password = $('*[name="password"]');
	const passwordConfirm = $('*[name="passwordConfirm"]');
	const avatar = $('*[name="avatar"]');
	const errorsInput = $('#errors');
	const conditions = $('*[name="conditions"]');
  const job = $('*[name="job"]');

	user.on('focusout', function() {
		checkUser(user);
	});

  email.on('focusout', function() {
    checkEmail(email);
  });

  passwordConfirm.on('focusout', function() {
    if(password.val().length > 0 && passwordConfirm.val().length > 0) {
      checkPassword(password, passwordConfirm);
    }
  });

	function checkUser(user) {
		$.post('/user/userExist?user='+user.val(), function(data) {
		  if(data == 1) {
        swal({
          title: 'Error',
          text: 'Usuario ocupado.',
          type: 'error',
          confirmButtonText: 'Aceptar',
          confirmButtonColor: '#263238',
          allowOutsideClick: true,
        });
		  	//user.val('');
		  	user.addClass('error');
		  	$('*[type="submit"]').prop('disabled', true);
		  } else {
		  	user.removeClass('error');
		  	$('*[type="submit"]').prop('disabled', false);
		  }
		});
	}

  function checkEmail(email) {
    $.post('/user/emailExist?email='+email.val(), function(data) {
      if(data == 1) {
        swal({
          title: 'Error',
          text: 'Correo electrónico ocupado.',
          type: 'error',
          confirmButtonText: 'Aceptar',
          confirmButtonColor: '#263238',
          allowOutsideClick: true,
        });
        email.addClass('error');
        $('*[type="submit"]').prop('disabled', true);
      } else {
        email.removeClass('error');
        $('*[type="submit"]').prop('disabled', false);
      }
    });
  }

  function checkPassword(password, passwordConfirm) {
    if(password.val() != passwordConfirm.val()) {
      swal({
        title: 'Error',
        text: 'Las contraseñas no coinciden.',
        type: 'error',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#263238',
        allowOutsideClick: true,
      });
      password.addClass('error');
      passwordConfirm.addClass('error');
      $('*[type="submit"]').prop('disabled', true);
    } else {
      password.removeClass('error');
      passwordConfirm.removeClass('error');
      $('*[type="submit"]').prop('disabled', false);
    }
  }

	$(form).on('submit', function(e){
		e.preventDefault();

		var errors = [];
		var errorTxt = [];
		$('input').removeClass('error');

		if(!/^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/g.test(name.val())) {
			errors.push(name.attr('name'));
			errorTxt.push('El campo nombre no es correcto.');
		}
		if(!/^[a-z0-9]{3,20}$/g.test(user.val())) {
			errors.push(user.attr('name'));
			errorTxt.push('El campo usuario no es correcto.');
		}
    if(job.val() == '-1') {
      errors.push(job.attr('name'));
      errorTxt.push('Debes seleccionar a qué te dedicas.');
    }
		if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email.val())) {
			errors.push(email.attr('name'));
			errorTxt.push('El campo email no es correcto.');
		}
		if(password.val() != passwordConfirm.val()) {
			errors.push(password.attr('name'));
			errors.push(passwordConfirm.attr('name'));
			errorTxt.push('Las contraseñas no coinciden.');
		}
    if(email.val() != emailConfirm.val()) {
      errors.push(email.attr('name'));
      errors.push(emailConfirm.attr('name'));
      errorTxt.push('Los emails no coinciden.');
    }
		if(avatar.val().length == 0) {
			errors.push(avatar.attr('name'));
			errorTxt.push('Debes seleccionar un avatar.');
		}
		if(!conditions.prop('checked')) {
			errors.push(conditions.attr('name'));
			errorTxt.push('Debes aceptar las condiciones generales de uso.');
		}

		// check errors
		if(!jQuery.isEmptyObject(errors)) {
			errors.forEach(function(error, index) {
			  $('*[name="'+error+'"]').addClass('error');
			});
			var errorAlerts = '';
			errorTxt.forEach(function(error, index) {
				errorAlerts += '<p>'+error+'</p>';
			});
			errorsInput.html(errorAlerts);
		} else {
			this.submit();
		}

	});
}

avatars_a.on('click', function(e){
	e.preventDefault();
	avatars_a.addClass('disabled').removeClass('enabled');
	$(this).addClass('enabled').removeClass('disabled');
	$('input[name="avatar"]').val($(this).attr('data-image'));
});