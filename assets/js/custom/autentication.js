const avatars_a = $('.avatars a');

avatars_a.on('click', function(e){
	e.preventDefault();
	avatars_a.addClass('disabled').removeClass('enabled');
	$(this).addClass('enabled').removeClass('disabled');
	$('input[name="avatar"]').val($(this).attr('data-image'));
});