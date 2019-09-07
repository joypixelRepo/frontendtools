$(document).ready(function() {
  // button advanced search
  $('#toogle_advanced_search').on('click', function(e) {
	  e.preventDefault();
	  $('.advanced-search-form').slideToggle(120);
	});

});