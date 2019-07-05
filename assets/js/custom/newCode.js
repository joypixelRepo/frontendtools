// const box_codes = $('.box-codes');
// const row_content = $('.row-content');
// const executable = $('input[name="executable"]');

// if(executable.is(':checked')) {
// 	box_codes.css('display', 'flex');
// 	row_content.css('display', 'none');
// } else {
// 	box_codes.css('display', 'none');
// 	row_content.css('display', 'flex');
// }

// executable.on('change', function(){
// 	if($(this).is(':checked')) {
// 		box_codes.slideDown(150);
// 		row_content.slideUp(150);
// 	} else {
// 		box_codes.slideUp(150);
// 		row_content.slideDown(150);
// 	}
// });

// VALIDATIONS
const alerts = $('.alerts');
const form = $('form');
const title = $('textarea[name="title"]');
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

	if(title.val().length <= 3 || title.val().length > 100) {
		errors.push('El título debe contener entre 4 y 100 caracteres.');
	}

	if(description.val().length > 255) {
		errors.push('La descripción no puede contener más de 255 caracteres.');
	}
	
	if($('.check-categories input:checked').length == 0) {
		errors.push('Debes seleccionar al menos una categoría.');
	}

	if(errors.length > 0) {
		for (var i = 0; i < errors.length; i++) {
      alerts.append('<div class="row"><div class="col-12"><span class="alert-message">' + errors[i] + '</span></div></div>');
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
});

title.on('keyup', function() {
  if(title.val().length > 0) {
    $('h1.titles').html(title.val());
  } else {
    $('h1.titles').html('Escribe el título');
  }
});

var git = $('input[data_category="git"]');
var mysql = $('input[data_category="mysql"]');
var php = $('input[data_category="php"]');
var reactjs = $('input[data_category="reactjs"]');
var xampp = $('input[data_category="xampp"]');
var terminal = $('input[data_category="terminal"]');

const checkboxes = $('.check-categories input[type="checkbox"]');

checkboxes.on('change', function() {
  checkCheckboxes();
});

if($('#edit-entry')) {
  checkCheckboxes();
}

function checkCheckboxes() {
  if(
    $('input[data_category="css3"]').is(':checked') ||
    $('input[data_category="javascript"]').is(':checked') ||
    $('input[data_category="svg"]').is(':checked') ||
    $('input[data_category="jquery"]').is(':checked') ||
    $('input[data_category="bootstrap4"]').is(':checked')
    ) {
    $('.box-codes').css('display', 'flex');
  } else {
    $('.box-codes').css('display', 'none');
  }

  if(git.is(':checked')) {
    $('.box-git').css('display', 'flex');
  } else {
    $('.box-git').css('display', 'none');
  }

  if(mysql.is(':checked')) {
    $('.box-mysql').css('display', 'flex');
  } else {
    $('.box-mysql').css('display', 'none');
  }

  if(php.is(':checked')) {
    $('.box-php').css('display', 'flex');
  } else {
    $('.box-php').css('display', 'none');
  }

  if(reactjs.is(':checked')) {
    $('.box-reactjs').css('display', 'flex');
  } else {
    $('.box-reactjs').css('display', 'none');
  }

  if(xampp.is(':checked')) {
    $('.box-xampp').css('display', 'flex');
  } else {
    $('.box-xampp').css('display', 'none');
  }

  if(terminal.is(':checked')) {
    $('.box-terminal').css('display', 'flex');
  } else {
    $('.box-terminal').css('display', 'none');
  }

  $('.CodeMirror').each(function(i, el){
      el.CodeMirror.refresh();
  });
}

$('.check-categories input.logo-checkbox').on('change', function() {
  if($(this).is(':checked')) {
    $(this).prev().addClass('category-selected');
  }
  else {
    $(this).prev().removeClass('category-selected');
  }
});

title.on('focusout', function() {
  checkTitle(title);
});

function checkTitle(title) {
  let entryId = '';
  if(title.attr('data-entry-id') != undefined) {
    entryId = '&entryId='+title.attr('data-entry-id');
  }
  $.ajax({
    url: '/action/checkTitle?title='+title.val()+entryId,
    cache: false,
    beforeSend: function(){
      
    },
    complete: function(){
      
    },
    success: function(response){
      if(response == 'exist') {
        form.find('button[type="submit"]').prop('disabled', true);
        title.addClass('error');
        const message = 'El título de la entrada está ocupado. Por favor, elige otro.';
        $('#errorTitle').html(message);
      } else {
        form.find('button[type="submit"]').prop('disabled', false);
        title.removeClass('error');
        $('#errorTitle').html('');
      }
    }
  });
}


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