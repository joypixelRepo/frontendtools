const avatars_a = $('.avatars a');

$('#sign_in').on('submit', function(e){
	e.preventDefault();

	// inputs
	const name = $('*[name="full-name"]');
	const user = $('*[name="user"]');
	const email = $('*[name="email"]');
	const password = $('*[name="password"]');
	const passwordConfirm = $('*[name="passwordConfirm"]');
	const avatar = $('*[name="avatar"]');
	const errorsInput = $('#errors');
	const conditions = $('*[name="conditions"]');

	var errors = [];
	var errorTxt = [];
	$('input').next().removeClass('error');

	if(!/^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/g.test(name.val())) {
		errors.push(name.attr('name'));
		errorTxt.push('El campo nombre no es correcto.');
	}
	if(!/^[a-z0-9]{3,20}$/g.test(user.val())) {
		errors.push(user.attr('name'));
		errorTxt.push('El campo usuario no es correcto.');
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
		  $('*[name="'+error+'"]').next().addClass('error');
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

avatars_a.on('click', function(e){
	e.preventDefault();
	avatars_a.addClass('disabled').removeClass('enabled');
	$(this).addClass('enabled').removeClass('disabled');
	$('input[name="avatar"]').val($(this).attr('data-image'));
});