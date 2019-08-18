$(document).ready(function() {

  $('select').selectpicker('destroy');

  $('#toogle_advanced_search').on('click', function(e) {
	  e.preventDefault();
	  $('.advanced-search-form').slideToggle(120);
	});

  if(keys) {
    for(var key in keys) {
      var regExp = new RegExp(keys[key], "i");
      $(".link-box h1, .link-box .code-description").each(function() {
        $(this).html($(this).html().replace(regExp, "<span class='fluorescent'>"+keys[key]+"</span>"));
      });
    }
  }

});