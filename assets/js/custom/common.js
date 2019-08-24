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

var search_form_keywords = $('.search-form input[name="keys"]');
var search_ajax_result = $('.search-ajax-result');

search_form_keywords.on('keyup', function(e) {
  if(e.keyCode != 27) { // escape key = keycode 27
    var keywords = $(this).val();
    if(keywords.length >= 2) {
      $.get("/v/searchKeywordsAjax?keys="+keywords, function(data, status) {
        search_ajax_result.empty();
        var entries = jQuery.parseJSON(data);

        var htmlResult = '';

        $.each(entries, function(key, value ) {

          htmlResult += '<a href="/v/exec?u='+value.url+'">';
          
          var category = '';
          htmlResult += '<span class="search-ajax-category">';
          $.each(value.categories, function(ky, val ) {
            htmlResult += '<img src="'+val.category_logo+'" alt="logo"/>';
          });
          htmlResult += '</span>';

          htmlResult += '<span class="search-ajax-title">'+value.title+'</span>';
          htmlResult += '<span class="search-ajax-description">'+value.description+'</span>';
          htmlResult += '</a>';
          
        });

        search_ajax_result.append(htmlResult);

      });
    }
  } else {
    search_ajax_result.empty();
  }
});

var close_search = $('.search-form .close-search');
close_search.on('click', function() {
  search_ajax_result.empty();
});

$('a.user-sidebar').on('mouseover touchstart', function() {
  $(this).find('img').removeClass('filter-gray');
});
$('a.user-sidebar').on('mouseout touchend', function() {
  $(this).find('img').addClass('filter-gray');
});
