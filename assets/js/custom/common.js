$('[data-toggle="tooltip"]').tooltip();

function toggleFullscreen(elem) {
  elem = elem || document.documentElement;
  if(!document.fullscreenElement && !document.mozFullScreenElement &&
    !document.webkitFullscreenElement && !document.msFullscreenElement) {
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.msRequestFullscreen) {
      elem.msRequestFullscreen();
    } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) {
      elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if(document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}

// clean any characters from #search-form
$('.search-form').on('submit', function(e) {
  e.preventDefault();

  const characters = /([,.])/g;
  let keys = $('input[name="keys"]');
  let cleanKeys = keys.val().toLowerCase();
  cleanKeys = keys.val().replace(characters,'');

  keys.val(cleanKeys);
  this.submit();
});

