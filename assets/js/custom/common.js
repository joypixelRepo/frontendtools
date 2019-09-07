$(document).ready(function() {
  // destroy bootstrap select for not show bootstrap select
  $('select').selectpicker('destroy');
});

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

var searchForm = $('form.search-form');

// clean any characters from #search-form
searchForm.on('submit', function(e) {
  e.preventDefault();

  const characters = /([,.])/g;
  let keys = $('input[name="keys"]');
  let cleanKeys = keys.val().toLowerCase();
  cleanKeys = keys.val().replace(characters,'');

  keys.val(cleanKeys);
  this.submit();
});

// open search form
// if press ctrl+f
var map = {17: false, 70: false};
$(document).keydown(function(e) {
  if (e.keyCode in map) {
    map[e.keyCode] = true;
    if (map[17] && map[70]) {
      $('.search-bar').addClass('open');
      $('form.search-form input[name="keys"]').focus();
    }
  }
}).keyup(function(e) {
  if (e.keyCode in map) {
    map[e.keyCode] = false;
  }
});
// end open search form

var search_form_keywords = $('.search-form input[name="keys"]');
var search_ajax_result = $('.search-ajax-result');
var overlay = $('.overlay');

// replace in search form
search_form_keywords.on('keyup', function(e) {
  // keycodes => escape(27), up arrow(38), down arrow(40), enter(13)
  if(e.keyCode != 27 && e.keyCode != 38 && e.keyCode != 40 && e.keyCode != 13) {
    var keywords = $(this).val();
    if(keywords.length >= 3) {
      setTimeout(function(){
        $.get("/v/searchKeywordsAjax?keys="+keywords, function(data, status) {
          search_ajax_result.empty();
          overlay.css('display', 'none');
          var entries = jQuery.parseJSON(data);

          var htmlResult = '';

          // link advanced search
          htmlResult += '<a href="/?keys='+keywords+'" class="advanced-search-first-link">';
          htmlResult += LANG_JS['advanced_search'];
          htmlResult += '</a>';
          // end link advanced search

          $.each(entries, function(key, value ) {

            htmlResult += '<a href="/v/exec?u='+value.url+'">';
            
            var category = '';
            htmlResult += '<span class="search-ajax-category">';
            $.each(value.categories, function(ky, val) {
              htmlResult += '<img src="'+val.category_logo+'" alt="logo"/>';
            });
            htmlResult += '</span>';

            htmlResult += '<span class="search-ajax-title">'+value.title+'</span>';
            
            if(value.description) {
              htmlResult += '<span class="search-ajax-description">'+value.description+'</span>';
            }

            htmlResult += '</a>';
            
          });

          search_ajax_result.append(htmlResult);

          var search_ajax_result_a = $('.search-ajax-result a');
          // call to navigation menu method (jquery keynav plugin)
          if(search_ajax_result_a.length > 0) {
            menukeynav(search_ajax_result_a);
          }

          var keys = search_form_keywords.val().split(" ");

          for(var key in keys) {
            var regExp = new RegExp(keys[key], 'i');
            $(".search-ajax-result .search-ajax-title, .search-ajax-result .search-ajax-description").each(function() {
              $(this).html($(this).html().replace(regExp, "<span class='fluorescent'>"+keys[key]+"</span>"));
            });
          }
          if(keys.length > 0) {
            overlay.css('display', 'block');
          }

        });
      }, 500);
    } else {
      search_ajax_result.empty();
      overlay.css('display', 'none');
    }
  } else {
    // keycodes => up arrow(38), down arrow(40), enter(13)
    if(e.keyCode != 38 && e.keyCode != 40 && e.keyCode != 13) {
      search_ajax_result.empty();
      overlay.css('display', 'none');
    }
  }
});

// keys is in VController->index()
// replace in homepage -> /?keys=...
if(keys.length > 0) {
  for(var key in keys) {
    var regExp = new RegExp(keys[key], "i");
    $(".link-box h1, .link-box .code-description").each(function() {
      $(this).html($(this).html().replace(regExp, "<span class='fluorescent'>"+keys[key]+"</span>"));
    });
  }
}

var close_search = $('.search-form .close-search');
close_search.on('click', function() {
  search_ajax_result.empty();
  overlay.css('display', 'none');
});

// jquery keynav plugin
function menukeynav(links) {
  // plugin jquery.keynav.js
  updateControls = function() {
    $('#navigation a').removeClass();
    $((window.keyNavigationDisabled?'#disable':'#enable')).addClass('selected');
  }

  a=links.keynav(function() {
      return window.keyNavigationDisabled;
  });

  $('#disable').click(function(){
    window.keyNavigationDisabled=true;
    updateControls();
  });

  $('#enable').click(function(){
    window.keyNavigationDisabled=false;
    updateControls();
  });
}

$('a.user-sidebar').on('mouseover touchstart', function() {
  $(this).find('img').removeClass('filter-gray');
});
$('a.user-sidebar').on('mouseout touchend', function() {
  $(this).find('img').addClass('filter-gray');
});
