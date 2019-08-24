$('#comment-btn').on('click', function(e) {
  e.preventDefault();
  $(this).hide();
  $('#comment-form').show();
});

$('#comment-form').on('submit', function(e) {
  e.preventDefault();
  if($(this).find('*[name="comment"]').val().length <= 3) {
    alert(LANG_JS.comment_length);
  } else {
    this.submit();
  }
});


var copyElements = document.querySelectorAll('a[data-action="copy"]');

for(var element of copyElements) {
  element.addEventListener('click', function(e) {
    e.preventDefault();
    // Elemento a copiar
    var code = this.parentElement.nextElementSibling;

    var textArea = document.createElement("textarea");
    textArea.value = code.value;
    document.body.appendChild(textArea);
    textArea.select();

    if(document.execCommand("copy")) {
      messageNotify('success', 2000, LANG_JS.copied, LANG_JS.copied_code);
    }
    else {
      messageNotify('error', 2000, LANG_JS.not_copied, LANG_JS.no_copied_code);
    }
    document.body.removeChild(textArea);
  });
}

function messageNotify(notify_type, notify_timer, notify_title, notify_message){
  swal({
    title: notify_title,
    text: notify_message,
    type: notify_type,
    timer: notify_timer,
    confirmButtonText: LANG_JS.accept_txt,
    confirmButtonColor: '#263238',
    allowOutsideClick: true,
  });
}

// add target="_blank" to all links that appears into ´code-description´ class
var code_description = $('.code-description');
if(code_description.length > 0) {
  const links = $(code_description).find('a');
  if(links.length > 0) {
    links.attr('target','_blank');
  }
}
