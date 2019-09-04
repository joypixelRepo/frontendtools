// https://baconipsum.com/json-api/
$("#baconButton").click(function(){
	$.getJSON('https://baconipsum.com/api/?type=all-meat&'+values().textType+'='+values().number+values().startWith, 
		function(baconGoodness){
			if (baconGoodness && baconGoodness.length > 0){
				$("#baconIpsumOutput").html('');
				for (var i = 0; i < baconGoodness.length; i++)
					$("#baconIpsumOutput").append('<p>' + baconGoodness[i] + '</p>');
				$("#baconIpsumOutput").show();
				showCounts();
			}
		});
});

function values() {
	var start = '';
	if($('#start_with').is(':checked')) {
		start = '&start-with-lorem=1';
	}

	return {
		textType: getType(),
		number: $('#number').val(),
		startWith: start
	}
}

function getType() {
	var textType = 'paras';
	$('input:radio[name="sentencesOrParagraph"]').each(function(index) {
	  if($(this).is(':checked')) {
	    textType = $(this).val();
	  }
	});
	return textType;
}

function showCounts() {
	$('#charactersCount').html($('#baconIpsumOutput').text().trim().length+' caracteres');
	$('#paragraphsCount').html($('#baconIpsumOutput p').length+' párrafos');
}

$('#copy').on('click', function() {
	//creamos un input que nos ayudara a guardar el texto temporalmente
	var $temp = $("<input>");
	//lo agregamos a nuestro body
	$("body").append($temp);
	//agregamos en el atributo value del input el contenido html encontrado
	//en el td que se dio click
	//y seleccionamos el input temporal
	$temp.val($('#baconIpsumOutput').text()).select();
	//ejecutamos la funcion de copiado
	document.execCommand('copy');
	//eliminamos el input temporal
	$temp.remove();
	alert(LANG_JS.copied_code);
});