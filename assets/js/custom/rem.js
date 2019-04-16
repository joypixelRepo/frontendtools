$(document).ready(function() {
	var defaultBodyPixels = $('.irs-single');
	var pixels = $('#pixels');
	var rem = $('#rem');

	pixels.keyup(function() {
		var value = $(this).val();
		rem.val(value/defaultBodyPixels.text());
		rem.parent().addClass('focused');
		if(pixels.val() == '') {
			rem.val('');
			rem.parent().removeClass('focused');
		}
	});

	rem.keyup(function() {
		var value = $(this).val();
		pixels.val(value*defaultBodyPixels.text());
		pixels.parent().addClass('focused');
		if(rem.val() == '') {
			pixels.val('');
			pixels.parent().removeClass('focused');
		}
	});

});