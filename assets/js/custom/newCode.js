// VALIDATIONS
const alerts = $('.alerts');
const form = $('form');
const title = $('textarea[name="title"]');
const description = $('textarea[name="description"]');
const content = $('input[name="content"]');

form.on('submit', function(e){
	e.preventDefault();

	var errors = [];
	alerts.html('');

	if(title.val().length <= 3 || title.val().length > 100) {
		errors.push(LANG_JS.entry_title_length);
	}

	if(description.val().length > 255) {
		errors.push(LANG_JS.description_title_length);
	}
	
	if($('.check-categories input:checked').length == 0) {
		errors.push(LANG_JS.select_category);
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
    $('h1.titles').html(LANG_JS.write_title);
  }
});

var git = $('input[data_category="git"]');
var mysql = $('input[data_category="mysql"]');
var php = $('input[data_category="php"]');
var laravel = $('input[data_category="laravel"]');
var reactjs = $('input[data_category="reactjs"]');
var apache = $('input[data_category="apache"]');
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

  if(laravel.is(':checked')) {
    $('.box-laravel').css('display', 'flex');
  } else {
    $('.box-laravel').css('display', 'none');
  }

  if(reactjs.is(':checked')) {
    $('.box-reactjs').css('display', 'flex');
  } else {
    $('.box-reactjs').css('display', 'none');
  }

  if(apache.is(':checked')) {
    $('.box-apache').css('display', 'flex');
  } else {
    $('.box-apache').css('display', 'none');
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
        const message = LANG_JS.title_taken;
        $('#errorTitle').html(message);
      } else {
        form.find('button[type="submit"]').prop('disabled', false);
        title.removeClass('error');
        $('#errorTitle').html('');
      }
    }
  });
}
