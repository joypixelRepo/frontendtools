const box_codes = $('.box-codes');
const row_content = $('.row-content');
const executable = $('input[name="executable"]');

if(executable.is(':checked')) {
	box_codes.css('display', 'flex');
	row_content.css('display', 'none');
} else {
	box_codes.css('display', 'none');
	row_content.css('display', 'flex');
}

executable.on('change', function(){
	if($(this).is(':checked')) {
		box_codes.slideDown(150);
		row_content.slideUp(150);
	} else {
		box_codes.slideUp(150);
		row_content.slideDown(150);
	}
});

// VALIDATIONS
const alerts = $('.alerts');
const form = $('form');
const title = $('input[name="title"]');
const description = $('textarea[name="description"]');
const content = $('input[name="content"]');
// const categories = $('.check-categories input');

// categories.on('click', function(e){
// 	e.preventDefault();
// 	if($(this).attr('data_category') == 'git' && $(this).is(':checked') && otherChecked($(this), 'git')) {
// 		alert('La categoría seleccionada no permite seleccionar más categorías');
// 	}
// });

// function otherChecked(element, categoryName) {
// 	console.log(element.attr('data_category'));
// 	console.log(categoryName);
// 	//categories.each(function(index) {
// 	  if(element.attr('data_category') != categoryName) {
// 	  	console.log('entra');
// 	  	return true;
// 	  }
// 	//});
// }

form.on('submit', function(e){
	e.preventDefault();

	//console.log(editorHtml.getDoc().getValue("\n").length);

	var errors = [];
	alerts.html('');

	if(title.val().length <= 3 || title.val().length > 255) {
		errors.push('El título debe contener entre 4 y 255 caracteres.');
	}

	if(description.val().length > 255) {
		errors.push('La descripción no puede contener más de 255 caracteres.');
	}
	
	if($('.check-categories input:checked').length == 0) {
		errors.push('Debes seleccionar al menos una categoría.');
	}

	if(errors.length > 0) {
		for (var i = 0; i < errors.length; i++) {
      alerts.append('<span class="alert-message">' + errors[i] + '</span>');
    }
	} else {
		this.submit();
	}
});

$('#full-html, #full-css, #full-js').on('click', function(e){
	e.preventDefault();

	const dataFull = $('body').find('*[data-full="'+$(this).attr('id')+'"]');
	const codeMirror = dataFull.find('.CodeMirror');

	if(!dataFull.hasClass('full-screen')) {
		dataFull.removeClass('col-lg-4, col-12');
		dataFull.addClass('full-screen');
		codeMirror.height(500);
	} else {
		dataFull.addClass('col-lg-4, col-12');
		dataFull.removeClass('full-screen');
		codeMirror.height(300);
	}
})


// $("form#edit-entry-form :input").change(function() {
// 	//console.log('Form change detect');
// 	exitPage();
// });

// function exitPage () {
// 	window.addEventListener("beforeunload", function (e) {
// 	  var confirmationMessage = "\o/";

// 	  (e || window.event).returnValue = confirmationMessage; //Gecko + IE
// 	  return confirmationMessage;                            //Webkit, Safari, Chrome
// 	});
// }