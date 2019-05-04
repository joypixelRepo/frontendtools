const cookie = Cookies.get('fet_cookies_accept');
if(!cookie) {
  $('#cookies').css('display', 'block');
  $('#accept-cookies').on('click', function(e) {
    e.preventDefault();
    console.log('Cookies');
    Cookies.set('fet_cookies_accept', 1, {expires: 365});
    $('#cookies').slideUp(100);
  });
}

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

$('a.user-sidebar').on('mouseover touchstart', function() {
  $(this).find('img').removeClass('filter-gray');
});
$('a.user-sidebar').on('mouseout touchend', function() {
  $(this).find('img').addClass('filter-gray');
});

