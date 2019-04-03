$(document).ready(function() {

	// initialize colorpickers
	$('.colorpicker').colorpicker();

	// initial values
	function params() {
		return {
			type: getType(),
			direction: getDirection(),
			start: $('#startColor').val(),
			end: $('#endColor').val()
		}
	}

	// print example gradient
	printGradient(params().type, params().direction, params().start, params().end);

	function printGradient(type, direction, startColor, endColor) {
		if(type == 'radial-gradient') {
			direction = '';
		} 
		else if(type == 'linear-gradient') {
			direction = direction+', '
		}
		var css = type+'('+direction+startColor+', '+endColor+')';
		$('#gradientResult, .switchColor').css('background-image', css);
		$('#code').html('background-image: ' + css + ';');
		$('input[name="direction"]').each(function(index) {
			if($(this).attr('data-direction').trim() === direction.replace(',','').trim()) {
				$(this).prop('checked', true);
			} else {
				$(this).prop('checked', false);
			}
		});
	}

	// gradient examples
	$('.gradient').each(function(index) {
		if($(this).attr('gradient-type') == 'radial-gradient') {
			direction = '';
		} 
		else if($(this).attr('gradient-type') == 'linear-gradient') {
			direction = $(this).attr('gradient-direction')+', ';
		}
	  $(this).css('background-image', $(this).attr('gradient-type')+'('+direction+$(this).attr('gradient-start')+', '+$(this).attr('gradient-end')+')');
	  $(this).on('click', function() {
	  	printGradient($(this).attr('gradient-type'), $(this).attr('gradient-direction'), $(this).attr('gradient-start'), $(this).attr('gradient-end'));
	  	$('#startColor').val($(this).attr('gradient-start'));
			$('#endColor').val($(this).attr('gradient-end'));
	  });
	});

	$('input[name="direction"]').on('click', function(){
		printGradient(params().type, params().direction, params().start, params().end);
	});
	
  $('.colorpicker-with-alpha').on('mousemove click keyup keydown change touchmove',function() {
	  printGradient(params().type, params().direction, params().start, params().end);
	});

	$('#random-button').on('click', function() {
		// TODO crear direcciones aleatorias
		var directions = [
			'to left top',
			'to top',
			'to right top',
			'to left',
			'',
			'to right',
			'to left bottom',
			'to bottom',
			'to right bottom'
		];

		random = Math.floor(Math.random()*directions.length);

		var startColor = getRandomColor();
		var endColor = getRandomColor();
		$('#startColor').val(startColor);
		$('#endColor').val(endColor);
		var type = 'linear-gradient';
		if(directions[random] == '') {
			type = 'radial-gradient';
		}
		printGradient(type, directions[random], startColor, endColor);
	});

	function getDirection() {
		var direction = 'to right';
		$('input[name="direction"]').each(function(index) {
		  if($(this).is(':checked')) {
		  	direction = $(this).attr('data-direction');
		  }
		});
		return direction;
	}

	function getType() {
		var type = 'linear-gradient';
		$('input[name="direction"]').each(function(index) {
		  if($(this).is(':checked')) {
		  	type = $(this).attr('data-type');
		  }
		});
		return type;
	}

	function getRandomColor() {
		var letters = '0123456789ABCDEF';
		var color = '#';
		for (var i = 0; i < 6; i++) {
			color += letters[Math.floor(Math.random() * 16)];
		}
		return color;
	}

	$('#copy').on('click', function() {
		//creamos un input que nos ayudara a guardar el texto temporalmente
		var $temp = $("<input>");
		//lo agregamos a nuestro body
		$("body").append($temp);
		//agregamos en el atributo value del input el contenido html encontrado
		//en el td que se dio click
		//y seleccionamos el input temporal
		$temp.val($('#code').text()).select();
		//ejecutamos la funcion de copiado
		document.execCommand('copy');
		//eliminamos el input temporal
		$temp.remove();
		alert('Texto copiado al portapapeles:'+"\n"+$temp.val());
	});

});